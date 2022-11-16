const canvas = document.getElementById('my-canvas');
const context = canvas.getContext("2d");
const boundings = canvas.getBoundingClientRect();

var mouseX = 0;
var mouseY = 0;

context.strokeStyle = 'black';
context.lineWidth = 1;
var isDrawing = false;

canvas.width = window.innerWidth * 0.9;
canvas.height = window.innerHeight * 0.7;


window.onload = function(){


var colors = document.getElementsByClassName('colors')[0];
  
colors.addEventListener('click', function(event) {
  console.log(event.target.value);
  context.strokeStyle = event.target.value || 'black';
});


var brushes = document.getElementsByClassName('brushes')[0];
  
brushes.addEventListener('click', function(event) {
  console.log(event.target.value);
  context.lineWidth = event.target.value || 1;
});



var colors = document.getElementsByClassName('colors')[0];
  
colors.addEventListener('click', function(event) {
  context.strokeStyle = event.target.value || 'black';
});


var brushes = document.getElementsByClassName('brushes')[0];

brushes.addEventListener('click', function(event) {
  context.lineWidth = event.target.value || 1;
});




canvas.addEventListener('mousedown', function(event) {
  setMouseCoordinates(event);
  isDrawing = true;


  context.beginPath();
  context.moveTo(mouseX, mouseY);
});

canvas.addEventListener('touchstart', function(event) {
  setTouchCoordinates(event);
  isDrawing = true;


  context.beginPath();
  context.moveTo(mouseX, mouseY);
});

canvas.addEventListener('mousemove', function(event) {
  setMouseCoordinates(event);

  if(isDrawing){
    context.lineTo(mouseX, mouseY);
    context.stroke();
  }
});

canvas.addEventListener('touchmove', function(event) {
  setTouchCoordinates(event);

  if(isDrawing){
    context.lineTo(mouseX, mouseY);
    context.stroke();
  }
});


canvas.addEventListener('mouseup', function(event) {
  setMouseCoordinates(event);
  isDrawing = false;
});

canvas.addEventListener('touchend', function(event) {
  setTouchCoordinates(event);
  isDrawing = false;
   updateDrawing( )
});

const xhttp = new XMLHttpRequest()

function updateDrawing(id) {
  console.log('sending request', {id})
  xhttp.open("PUT", `/draw/${id}`, true);
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  const payload = {
      base64Canvas: canvas.toDataURL().toString()
  }
  xhttp.send(JSON.stringify(payload));
}



// Handle Mouse Coordinates
function setMouseCoordinates(event) {
  mouseX = event.clientX 
  mouseY = event.clientY
}

function setTouchCoordinates(event) {

    mouseX = event.changedTouches[0].pageX - boundings.left;;
    mouseY = event.changedTouches[0].pageY- boundings.top;

}

// Handle Clear Button
var clearButton = document.getElementById('clear');

clearButton.addEventListener('click', function() {
  context.clearRect(0, 0, canvas.width, canvas.height);
});

}