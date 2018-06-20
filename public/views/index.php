<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

<html>
<body>
	<div class="container">
		<div class="row">
			<?php foreach ($top as $key)
			{ ?>
				<div class="jumbotron">
					<h1 class="display-4"><?php echo $key['titre']; ?></h1>
					<p class="lead"><i><?php echo $key['annee_prod'] . " - " . $key['duree_min'] . " min"; ?></i></p>
					<hr class="my-4">
					<div class="text-center">
						<img src="https://i.ytimg.com/vi/vc4mBGIDEeU/maxresdefault.jpg" class="img-fluid rounded" alt="...">
					</div>
					<p><?php echo $key['resum']?></p>
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