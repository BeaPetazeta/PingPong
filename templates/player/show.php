
<h1> Datos del Participante</h1>
<table>
	<tr>
		<th>Nombre</th>
		<td><?= $player->getName(); ?></td>
	</tr>
	<tr>
		<th>Nick</th>
		<td><?= $player->getNick(); ?></td>
	</tr>
	<tr>
		<th>Correo Electrónico</th>
		<td><?= $player->getMail(); ?></td>
	</tr>


</table>
<h2>Partidos del Usuario</h2>
<?php if(count($matches)<1):?>
	<p>No existen partidos jugados para este jugador</p>
<?php else:  ?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Campeonato</th>
			<th>Jugador 1</th>
			<th>Jugador 2</th>
			<th>Resultado</th>
		</tr>

		<?php foreach($matches as $match): ?>
			<tr>
				<td><?= $match->getDate(); ?></td>
				<td><?= $match->getRound()->getChampionship(); ?></td>
				<td><?= $match->getPlayer1(); ?></td>
				<td><?= $match->getPlayer2(); ?></td>
				<td><?= $match->getResult(); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif;  ?>