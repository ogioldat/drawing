<h2>Wszystkie rysynki</h2>

<!-- <script>
    const xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function () {
        console.log(this)
    }
    
    xhttp.open("POST", "/draw", true);
    xhttp.send();
</script> -->
<div>
    <?php 
        foreach($data as $index => $drawing) {
            echo "
            <div>
                <a alt='link do rysunku' href='/draw/$drawing->id'>
                    ID: $drawing->id
                </a>
            </div>";
        }
    ?>
</div>

<form action="draw" method="POST">
    <button type="submit">Nowy rysunek</button>
</form>


!!