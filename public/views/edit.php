<?php
if (!isConnected() || !isAdmin($_COOKIE['username'])) {
    header('Location: ./index.php?page=news');
}

if (isset($_POST) AND $_POST != NULL) {
		$idFilms = idFilms(array_keys($_POST));
	}
	else {
		die('NON');
	}
?>


<?php
include('inc/header.php');
include('inc/navbar.php');
include('inc/banner.php');
?>

<div class="container">
<?php
foreach ($idFilms as $key) { ?>
	<form method="post" action="edit.html">
		<div class="form-group">
			<label for="id_film">ID :</label>
			<input type="text" class="form-control disabled" id="id_film" name="id_film" value="<?=$key['id_film'];?>">
		</div>
		<div class="form-group">
			<label for="titre">Titre :</label>
			<input type="text" class="form-control" id="titre" name="titre" value="<?=$key['titre'];?>">
		</div>
		<div class="form-group">
			<label for="resum">Contenu :</label>
			<textarea id="resum" name="resum" class="form-control" cols="30" rows="10"><?=$key['resum'];?></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php } ?>
</div>

<?php
if(isset($_POST["resum"]) && isset($_POST["titre"]))
{
	$postArray = array($_POST['titre'], $_POST['resum'], $_POST['id_film']);
	updateEdit($postArray);
}
?>

<?php
include('inc/footer.php')
?>