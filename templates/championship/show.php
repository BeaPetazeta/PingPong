<!-- Al igual que cada clase tiene su index con la lista de datos que hay en la bbdd, creamos el archivo show para mostrar una selección específica -->

<h1>
	<?= $championship->getName(); ?>
</h1>

Lista de partidos:
<ul>
	<?php
	foreach($championship->showMatches() as $match): ?>
		<li><?= $match ?></li>
	<?php endforeach ?>
</ul>

<<<<<<< HEAD
=======

<!-- Si no hay jugadores nos muestra un mensaje de información -->
>>>>>>> d23b294c42743efd5f0350c5206c77054960f324
Lista de jugadores:
<ul>
	<?php
	foreach($players as $player): ?>
		<li><?= $player->getName(); ?></li>
	<?php endforeach ?>
</ul>


	
