<!-- Al igual que cada clase tiene su index con la lista de datos que hay en la bbdd, creamos el archivo show para mostrar una selección específica -->

   <main>
        <div class="row title">
            <div class="col-md-3 col-md-offset-3 text-center">
                <img src="<?= $basePath; ?>/public/img/trofeo.png" alt="Trofeo de campeonato">
            </div>
            <div class="col-md-6 text-left">
                <h1>Campeonatos de liga 2017/2018</h1>
            </div>
        </div>
        <div class="row championshipoptions">
            <form action="" method="POST">
                <div class="col-xs-12 col-md-3 text-center options">
                    <img  src="<?= $basePath; ?>/public/img/mas.png" alt="Añadir nuevo torneo">
                    <h2>Campeonato</h2>
<!--                     <input type="text" placeholder="Nombre campeonato">
                    <input type="submit" name="newChampionship" value="Añadir"> -->
                    <li><?= $championship->getName(); ?></li>
                </div>


                <div class="col-xs-12 col-md-3 text-center options">
                    <img  src="<?= $basePath; ?>/public/img/bloc.png" alt="Añadir nuevo jugador">
                    <h2>Inscripción</h2>
                    <?php $nameplayer = $_SESSION['username'] ?>
                   <input type="text" value="<?=$nameplayer ?>" disabled>
                   <?php if($championship->countPlayers()>=8): ?>
                        Inscripción Cerrada
                    <?php elseif(isset($_SESSION['username'])): 
                        if ($championship->playerOnChamp($currentUser->getId())):?>
                            <br> Ya inscrito.
                        <?php else: ?>
                            <input type="submit" name="newPlayer" value="Añadir">
                        <?php endif ?>
                    <?php else: ?>
                        Loguéate para inscribirte
                    <?php endif ?>
                    <ul>
                        <?php foreach($championship->getPlayers() as $player): ?>
                            <li><?= $player ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </form>
            <div class="col-xs-12 col-md-3 text-center options">
                <img src="<?= $basePath; ?>/public/img/pala.png" alt="Comprobar parejas del torneo">
                <h2>Rondas de partido</h2>
                <input type="submit" value="Ver más">
                <ul>
                    <?php foreach($championship->showMatches() as $match): ?>
                        <li><?= $match ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-xs-12 col-md-3 text-center options">
                <img src="<?= $basePath; ?>/public/img/diana.png" alt="Campeonatos inscritos">
                <h2>Finalizados</h2>
                <ul>
                    <li> Copa del Rey </li>
                    <li> Liga de Campeones </li>
                </ul>
                <!-- <input type="submit" value="Ver más"> -->
            </div>
        </div>
    </main>



















<br>


