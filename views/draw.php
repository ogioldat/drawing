<script>
    const xhttp = new XMLHttpRequest()

    function updateDrawing(id) {
        console.log('sending request', {id})
        xhttp.open("PUT", `/draw/${id}`, true);
        xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        const payload = {
            base64Canvas: "siema mordo"
        }
        xhttp.send(JSON.stringify(payload));
    }

    
</script>

<h2>No to do dzieła</h2>

<a href="/">Powrót</a>

<h3>ID rysunku: 
    <?php echo $data->id; ?>
</h3>

<div id="canvas">

</div>

<!-- UPDATE TEST -->
<button  onclick='updateDrawing("<?php echo $data->id ?>")' type="submit">
    Test na zmianę canvasa
</button>