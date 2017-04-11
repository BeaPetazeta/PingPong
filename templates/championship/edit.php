<main>
    <div class="row">
        <div class="col-xs-12 col-md-12 text-center">
            <form method="POST">
                <label for="name">Nombre Campeonato</label>
                <input type="text" name="name" value="<?= $championship->getName(); ?>">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</main>

