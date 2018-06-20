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
	<form method="post" action="">
		<div class="form-group">
			<label for="id_film">ID :</label>
			<input type="text" class="form-control disabled" name="id_film" value="<?php echo $key['id_film']; ?>">
		</div>
		<div class="form-group">
			<label for="titre">Titre :</label>
			<input type="text" class="form-control" name="titre" value="<?php echo $key['titre']; ?>">
		</div>
		<div class="form-group">
			<label for="resum">Contenu :</label>
			<textarea name="resum" class="form-control" name="content" cols="30" rows="10"><?php echo $key['resum']; ?></textarea>
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