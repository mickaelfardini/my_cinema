<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

<html>
<body>
	<div class="container">
		<div class="container bg-secondary text-white rounded">
			<h1>Recherche</h1>
			<form>
				<div class="form-group col-6">
					<label for="SearchFilm">Film</label>
					<input type="text" class="form-control" id="SearchFilm" aria-describedby="Rechercher un film" placeholder="Ex : Goodfellas ...">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="container">
		<h2>Pas d'idée ?</h2>
		<div class="row">
			<?php
			foreach ($films as $key)
				{ ?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="card">
							<div class="card-header">
								<?php echo $key['up_nom']; ?>
							</div>
							<div class="card-body">
								<h5 class="card-title"><?php echo $key['titre']; ?></h5>
								<p class="card-text"><?php echo substr($key['resum'], 0, 90); ?>...</p>
								<a href="#" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</body>
	</html>

	<?php
	include 'inc/footer.php';
	?>