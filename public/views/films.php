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
			<form action="films.html" method="POST" role="form">
				<div class="form-row">
					<div class="form-group col-6">
						<label for="SearchFilm">Film</label>
						<input type="text" class="form-control" name="title" id="SearchFilm" aria-describedby="Rechercher un film" placeholder="Ex : Goodfellas ...">
					</div>
					<div class="form-group col-6">
						<label for="inputGender">Genre</label>
						<select id="inputGender" name="gender" class="form-control">
							<option selected value="">Genre</option>
							<?php foreach ($gender as $key)
							{ ?>
							<option value="<?=$key['nom']?>"><?=$key['nom']?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-4">
						<label for="inputYear">Annee</label>
						<select id="inputYear" name="year" class="form-control">
							<option selected value="">Choisir une annee</option>
						</select>
					</div>
					<div class="form-group col-4">
						<label for="inputTime">Duree</label>
						<input type="text" class="form-control" name="time" id="inputTime" aria-describedby="Duree en minute du film" value="" placeholder="Ex : 90">
					</div>
					<div class="form-group col-4">
						<label for="getNbr">Limite par page</label>
						<select id="getNbr" name="limit" class="form-control">
							<option selected value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
	<div class="container">
		<?php if (!empty($_POST))
		{ 
			$films = checkPost($_POST);?>
			<h2>Resultat :</h2>

		<?php } else { ?>
			<h2>Pas d'idee ?</h2>
		<?php } ?>
		<div class="row">
			<?php
			echo "<pre> " . var_export($_GET, true) . "</pre>";
			foreach ($films as $key)
				{?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="card">
							<div class="card-header">
								<?= $key['up_nom'] . " - <i>" . $key['duree_min'] . " min</i>"; ?>
							</div>
							<div class="card-body">
								<h5 class="card-title text-truncate"><?= $key['titre']; ?></h5>
								<p class="card-text text-truncate"><?= $key['resum']; ?></p>
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