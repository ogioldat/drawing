<div class="container">
<h2>Wszystkie rysunki:</h2>
<div class = 'draws-list'>
    <?php 
        foreach($data as $index => $drawing) {
            echo "
            <div class = 'draw'>
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
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    *{
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        margin: 0 auto;
    }

    body {
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    width: 100vw;
    flex-direction: column;
    background-color: #506266;
}
.container{
    background-color: white;
    width: 90vw;
    padding: 10px;
    border-radius: 25px;
    -webkit-box-shadow: 8px 8px 24px 0px rgba(16, 69, 79, 1);
-moz-box-shadow: 8px 8px 24px 0px rgba(16, 69, 79, 1);
box-shadow: 8px 8px 24px 0px rgba(16, 69, 79, 1);
}

.draws-list {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow:hidden; 
    overflow-y:scroll;
    height: 40vh;
    margin-bottom: 20px;

}
.draw{
    padding: 10px
}


button {
    width: 70vw;
    border: 0;
    margin-bottom: 5px;
    padding: 10px;
    outline: none;
    cursor: pointer;
    background-color: #fa3838e3;
    color: white;
    border-radius: 25px;
  }

  a {
    text-decoration: none;
    color: black;
}



</style>