<!-- Mostramos la lista de jugadores -->
<ul>
    <?php foreach ($players as $player) : ?>
        <li><?= $player->getName() ?></li>
    <?php endforeach; ?>
</ul>