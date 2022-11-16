<nav>
  <a href="/">
    <span class="material-symbols-outlined"> arrow_back </span>
  </a>
  <h4>ID rysunku: <?php echo $data->id; ?> </h4>
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

<script>
  <?php  include "../views/scripts/script.js"; ?>
</script>