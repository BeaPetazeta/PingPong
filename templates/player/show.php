<main>
	<div class="container">
        <div class="row option-player-tittle">
            <div class="col-md-2 col-md-offset-10">
                <h2>Empresa</h2>
            </div>
            <div class="col-xs-12 col-md-2 col-md-offset-1 ">
                <img src="<?= $basePath; ?>/public/img/profile2.png" alt="Imagen del jugador">
            </div>
            <div class="col-xs-12 col-md-6 text-center">
                <h1>Bienvenid@ <?= $player->getName(); ?></h1>
            </div>
            <div class="col-xs-12 col-md-3">
                <ul>
                    <li><?= $player->getName(); ?></li>
                    <li><?= $player->getMail(); ?></li>
                    <!-- El siguiente enlace llevará a edit profile -->
                    <li><a href="">Modificar datos</a></li>
                </ul>
            </div>
        </div>
    <div class="border"></div>
        <!-- finish contaner-fluid --> 
	<div class="row options-player">
        <div class="col-xs-12 col-md-3 col-md-offset-3 text-center">
            <img src="<?= $basePath; ?>/public/img/pala.png" alt="Imagen de pala de ping pong">
            <h2>Mis partidos</h2>
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


        </div>
        <div class="col-xs-12 col-md-3 text-center">
            <img src="<?= $basePath; ?>/public/img/trofeo.png" alt="Trofeo del campeonato">
            <h2>Mis campeonatos</h2>
            <ul class="text-left">
                <li>Campeonato-1</li>
                <li>Campeonato-2</li>
                <li>Campeonato-3</li>
            </ul>
        </div>
    </div>   
</main>