<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

	<div class="container">
		<div class="container bg-secondary text-white text-center rounded">
			<h1>Top des films les plus vus</h1>
		</div>
		<div class="row">
			<?php foreach ($top as $key)
			{ $img = getPoster($key['titre']);
				?>
				<div class="jumbotron">
					<h1 class="display-5"><?=$key['titre']; ?></h1>
					<p class="lead"><i><?= $key['annee_prod'] . " - " . $key['duree_min'] . " min"; ?></i></p>
					<img alt="<?=$key['titre'];?>" src="<?=$img;?>">
					<hr class="my-4">
					<p><?= $key['resum']?></p>
					<a class="btn btn-primary btn-lg" href="#" role="button">Voir la fiche</a>
				</div>
			<?php } ?>
		</div>
	</div>

<?php
include 'inc/footer.php';
?>