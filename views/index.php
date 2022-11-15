<!DOCTYPE html>
<html>
<head>
  <title>Rysunki</title>
  <link rel="stylesheet" href="\style">
</head>
<body>

<h2>Wszystkie dostępne rysynki</h2>

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

</body>
</html>