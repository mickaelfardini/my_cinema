<?php
if (!isConnected() || !isAdmin($_COOKIE['username'])) {
	header('Location: index.html');
}

include('inc/header.php');
include('inc/navbar.php');
include('inc/banner.php');
?>

<div class="container">

	<?php
	if (isConnected() && isAdmin($_COOKIE['username'])) {
		if (!isset($_GET['id_member']))
			{?>
				<table class="table table-dark pull-right">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nom</th>
							<th scope="col">Prenom</th>
							<th scope="col">Abonement</th>
							<th scope="col">Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($members as $key) {
							?>
							<tr>
								<th scope="row"><?=$key['id_membre'];?></th>
								<td><?=$key['nom'];?></td>
								<td><?=$key['prenom'];?></td>
								<td><?=$key['aboname'];?></td>
								<td>
									<form method="GET">
										<button type="submit" class="btn btn-primary" value="<?=$key['id_membre'];?>" name="id_member">Edit</button></form></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php
						if (isset($_POST) && $_POST != NULL) {
							delete((array_keys($_POST)));
						}
					} else {
						foreach ($member as $key) { ?>
							<form method="post">
								<div class="form-group">
									<label for="id_film">ID :</label>
									<input type="text" class="form-control disabled" id="id_film" name="id_film" value="<?=$key['id_membre'];?>">
								</div>
								<div class="form-row">
									<div class="form-group col-6">
										<label for="nom">Nom :</label>
										<input type="text" class="form-control" id="titre" name="nom" value="<?=$key['nom'];?>">
									</div>
									<div class="form-group col-6">
										<label for="prenom">Prenom :</label>
										<input type="text" class="form-control" id="titre" name="prenom" value="<?=$key['prenom'];?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-6">
										<label for="email">E-mail :</label>
										<input type="text" class="form-control" id="titre" name="email" value="<?=$key['email'];?>">
									</div>
									<div class="form-group col-6">
										<label for="id_abo">Abonnement :</label>
										<input type="text" class="form-control" id="titre" name="id_abo" value="<?=$key['id_abo'];?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-6">
										<label for="ville">Ville :</label>
										<input type="text" class="form-control" id="titre" name="ville" value="<?=$key['ville'];?>">
									</div>
									<div class="form-group col-6">
										<label for="cpostal">Code Postal :</label>
										<input type="text" class="form-control" id="titre" name="cpostal" value="<?=$key['cpostal'];?>">
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Envoyer</button>
							</form>
						<?php }}}?>
					</div>

					<?php
					if(isset($_POST["resum"]) && isset($_POST["titre"]))
					{
						$postArray = array($_POST['titre'], $_POST['resum'], $_POST['id_film']);
						updateEdit($postArray);
						// A faire en rentrant
					}
					?>
					<?php
					include('inc/footer.php')
					?>