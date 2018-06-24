<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

	<div class="container">
		<div class="container bg-secondary text-white rounded">
			<h1>Recherche</h1>
			<form action="index.html" method="GET">
				<div class="form-row">
					<div class="form-group col-6">
						<label for="SearchFilm">Film</label>
						<input type="text" class="form-control" name="title" id="SearchFilm" placeholder="Ex : Goodfellas ...">
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
						<input type="text" class="form-control" name="time" id="inputTime" value="" placeholder="Ex : 90">
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
		<?php
		if (count($_GET) > 2)
		{
			$films = checkPost($_GET, $offset);?>
			<h2>Resultat :</h2>

		<?php } else { ?>
			<h2>Pas d'idee ?</h2>
		<?php } ?>
		<div class="row">
			<?php
			foreach ($films as $key)
			{
				$url = "http://www.omdbapi.com/?apikey=904c8570&t=" . urlencode($key['titre']);
				$content = file_get_contents($url);
				$img = json_decode($content, true);
				$img = $img['Response'] == "True" ? $img['Poster'] : "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1642e2d867c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1642e2d867c%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.125%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
				?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="card">
							<!--<div class="card-header">
								<?= $key['up_nom'] . " - <i>" . $key['duree_min'] . " min</i>"; ?>
							</div> -->
							<img alt="<?=$key['titre'];?>" src="<?=$img;?>">
							<div class="card-body">
								<h5 class="card-title text-truncate"><?= $key['titre']; ?></h5>
								<p class="card-text text-truncate"><?= $key['resum']; ?></p>
								<a href="#" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<hr class="my-4">
			<?php include 'inc/pagination.php'; ?>
		</div>
		<script src="public/inc/pagination.js"></script>
	<?php
	include 'inc/footer.php';
	?>