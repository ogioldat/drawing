let x = 0;
let y = 0;
let isDrawing = false;

function setMouseCoordinates(event) {
  x = event.clientX
  y = event.clientY
}

function setTouchCoordinates(event, canvas) {
  const boundings = canvas.getBoundingClientRect();
  x = event.changedTouches[0].pageX - boundings.left;;
  y = event.changedTouches[0].pageY - boundings.top;
}

function getIdFromUrl() {
  const pattern = new URLPattern('/draw/:id', window.location.origin)
  const { id } = pattern.exec(window.location.href).pathname.groups

  return id
}

function updateDrawing(base64Canvas) {
  const id = getIdFromUrl()
  console.log('sending request', { id })
  const xhttp = new XMLHttpRequest();

  xhttp.open("PUT", `/api/draw/${id}`, true);
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  const payload = {
    base64Canvas
  }
  xhttp.send(JSON.stringify(payload));
}

function onCanvasDataLoad(callback) {
  const id = getIdFromUrl()
  console.log('sending request', { id })
  const xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (xhttp.readyState === 4) {
      const {base64Canvas} = JSON.parse(xhttp.response)
      callback(base64Canvas);
    }
  }

  xhttp.open("GET", `/api/draw/${id}`, true);
  xhttp.send();
}

function injectBase64ImageToCanvas(context, base64Canvas) {
  const image = new Image();
  image.onload = function() {
    context.drawImage(image, 0, 0);
  };
  image.src = base64Canvas
}

function initMouseEvents(canvas, context) {
  canvas.addEventListener('mousedown', (event) => {
    console.log('drawing')

    setMouseCoordinates(event);
    isDrawing = true;

    context.beginPath();
    context.moveTo(x, y);
  });

  canvas.addEventListener('mouseup', (event) => {
    console.log('should update data')
    // const base64Canvas = context.getImageData(10, 20, 80, 230)
    const base64Canvas = canvas.toDataURL()
    // context.drawImage(base64Canvas, 0, 0)
    updateDrawing(base64Canvas)
    // context.putImageData(imgData, 0, 0)

    setMouseCoordinates(event);
    isDrawing = false;
  });

  canvas.addEventListener('mousemove', (event) => {
    setMouseCoordinates(event);

    if (isDrawing) {
      context.lineTo(x, y);
      context.stroke();
    }
  });
}

function initTouchEvents(canvas, context) {
  canvas.addEventListener('touchstart', (event) => {
    setTouchCoordinates(event, canvas);
    isDrawing = true;

    context.beginPath();
    context.moveTo(x, y);
  });

  canvas.addEventListener('touchend', (event) => {
    setTouchCoordinates(event, canvas);
    isDrawing = false;
    updateDrawing()
  });

  canvas.addEventListener('touchmove', (event) => {
    setTouchCoordinates(event, canvas);

    if (isDrawing) {
      context.lineTo(x, y);
      context.stroke();
    }
  });
}

window.onload = function () {
  const canvas = document.getElementById('my-canvas');
  const context = canvas.getContext("2d", { willReadFrequently:true });

  onCanvasDataLoad(
    (base64Image) => injectBase64ImageToCanvas(context, base64Image)
  )
  
  context.strokeStyle = 'black';
  context.lineWidth = 1;

  canvas.width = window.innerWidth * 0.9;
  canvas.height = window.innerHeight * 0.7;

  const colors = document.getElementById('colors');
  const brushes = document.getElementById('brushes');
  const clearButton = document.getElementById('clear');

  colors.addEventListener('click', (event) => {
    context.strokeStyle = event.target.value || 'black';
  });

  brushes.addEventListener('click', (event) => {
    context.lineWidth = event.target.value || 1;
  });

  clearButton.addEventListener('click', () => {
    context.clearRect(0, 0, canvas.width, canvas.height);
    updateDrawing(null)
  });

  initMouseEvents(canvas, context)
  initTouchEvents(canvas, context)
}