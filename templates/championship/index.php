
	<ul>
    <?php foreach ($championships as $championship) : ?>
        <?php $idChampionship = $championship['id']; ?>
    	<li><a href="../championship/show/<?= $idChampionship; ?>"><?= $championship['name'] ?></a></li>
    <?php endforeach; ?>
	</ul>