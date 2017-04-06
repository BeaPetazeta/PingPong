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

<!-- Si no hay jugadores nos muestra un mensaje de información -->
Lista de jugadores:
<?php if(count($players)<1):
	echo "No hay jugadores inscritos en este campeonato";
else: ?>

<ul>
	<?php
	foreach($players as $player): ?>
		<li><?= $player->getName(); ?></li>
	<?php endforeach ?>
</ul>
<?php endif ?>
