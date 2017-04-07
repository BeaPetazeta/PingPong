
<h2>Puntuación de partidos</h2>

<form action="" method="POST">

	Puntuación jugador 1:
		<input type="text" name="pointsPlayer1">
	Puntuación jugador 2:
		<input type="text" name="pointsPlayer2">
	<input type="submit" value="Enviar">

</form>


<ul>
    <li><?= $match->getPlayer1() ?> (<?= $match->getPointsPlayer1() ?>)</li>
    <li><?= $match->getPlayer2() ?> (<?= $match->getPointsPlayer2() ?>)</li>
</ul>

<?php
    if(null != $match->getWinner()){
       echo "El ganador del partido es: " . $match->getWinner() . "<br> <h1> FELICIDADES! </h1>";
    }else{
        echo "Este partido todavia no se ha jugado";
    }
?>
