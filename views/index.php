<div class="container">
  <h2>Wszystkie rysunki:</h2>
  <div class='draws-list'> <?php 
        foreach($data as $index => $drawing) {
            echo "
            
		<div class = 'draw'>
			<a alt='link do rysunku' href='/draw/$drawing->id'>
                    ID: $drawing->id
                </a>
		</div>";
        }
    ?> </div>
  <form action="draw" method="POST">
    <button type="submit">Nowy rysunek</button>
  </form>
</div>