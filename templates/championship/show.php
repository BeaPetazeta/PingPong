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
<ul>
	<?php
	foreach($championship->getPlayers() as $player): ?>
		<li><?= $player ?></li>
	<?php endforeach ?>
</ul>
<br>
<?php if($championship->countPlayers()>=8): ?>
    Inscripción Cerrada
<?php elseif(isset($_SESSION['username']) && !$championship->playerOnChamp($currentUser->getId())): ?>
    <a href="">Inscribirme</a>
<?php else: ?>
    Loguéate para inscribirte
<?php endif ?>

