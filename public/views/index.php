<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

<html>
<body>
	<div class="container">
		<div class="container bg-secondary text-white text-center rounded">
			<h1>Top des films les plus vus</h1>
		</div>
		<div class="row">
			<?php foreach ($top as $key)
			{ ?>
				<div class="jumbotron">
						<h1 class="display-5"><?= $key['titre']; ?></h1>
						<p class="lead"><i><?= $key['annee_prod'] . " - " . $key['duree_min'] . " min"; ?></i></p>
						<hr class="my-4">
						<p><?= $key['resum']?></p>
						<a class="btn btn-primary btn-lg" href="#" role="button">Voir la fiche</a>
					</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>

<?php
include 'inc/footer.php';
?>