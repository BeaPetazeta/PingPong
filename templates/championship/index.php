<main>
    <div class="row championship-style">
        <div class="col-xs-12 col-md-3 col-md-offset-3">
            <ul>
            <?php foreach ($championships as $championship) : ?>
                <?php $idChampionship = $championship['id']; ?>
                <li><a href="./championship/show/<?= $idChampionship; ?>"><?= $championship['name'] ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-6 text-left options">
            <form method="POST">
                <h4>Crear Campeonato</h4>
                <input type="text" name="championshipname" placeholder="Nombre campeonato">
                <input type="submit" name="newChampionship" value="Añadir">
            </form>
        </div>
    </div>
</main>

