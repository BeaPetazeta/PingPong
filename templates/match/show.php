
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
