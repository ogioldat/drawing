<nav>
    
<a href="/">
<span class="material-symbols-outlined">
arrow_back
</span>
</a>
<h4>ID rysunku: 
    <?php echo $data->id; ?>
</h4>
<div></div>
</nav>
      <div class="canvas_screen">
        <canvas id="my-canvas"></canvas>
      </div>
      <div class="tool_bar">
        <div class="colors">
          <button type="button" value="red"></button>
          <button type="button" value="blue"></button>
          <button type="button" value="green"></button>
          <button type="button" value="yellow"></button>
        </div>
        <div class="brushes">
          <button type="button" value="1">Cieńki</button>
          <button type="button" value="2">Średni</button>
          <button type="button" value="3">Gruby</button>
        </div>
        <button type="button" id="clear">Wyczyść</button>
      </div> 
      <style>
 @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
* {
    box-sizing: border-box;
    margin: 0 auto;
    font-family: 'Roboto', sans-serif;
  }
  
nav{
    display: flex;
    height: 5vh;
    justify-content: space-around;
    align-items: center;
    width: 100vw
}

  
body{
  display: flex;
  flex-direction: column;

}

  #my-canvas{
    width: 100%;
    height: 100%;
    background-color: white;
  }
  
  .canvas_screen{
    background-color: #637371;
    width: 100vw;
    height: 65vh;
    padding: 1vh;
  }

  .tool_bar{
    width: 100%;
    height: 30vh;
    background-color: #BFBFBF;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .colors {
    padding: 10px 0 5px 0;
    text-align: center;
  }
  
  .colors button {
    border: 1px solid #00000026;
    cursor: pointer;
    width: 20vw;
    height: 30px;
    margin-bottom: 5px
  }
  
  .colors button:nth-of-type(1) {
    background-color: red;
  }
  
  .colors button:nth-of-type(2) {
    background-color: blue;
  }
  
  .colors button:nth-of-type(3) {
    background-color: green;
  }
  
  .colors button:nth-of-type(4) {
    background-color: yellow;
  }  

  .brushes {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .brushes button {
    width: 90vw;
    border: 0;
    margin-bottom: 5px;
    padding: 5px;
    height: 30px;
    outline: none;
    cursor: pointer;
  }
    
  #clear {
    width: 90%;
    border: 0 solid;
    margin-bottom: 5px;
    padding: 5px;
    height: 30px;
    outline: none;
    cursor: pointer;
    background-color: #fa3838e3;
    color: white;
  }
  a {
    text-decoration: none;
    color: black;
}
      </style>      
