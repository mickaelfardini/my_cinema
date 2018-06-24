<?php
include('inc/header.php');
include('inc/navbar.php');
?>

<?php
if (isset($_COOKIE['username'])) {
	header('Location: ./index.php?page=news');
	return true;
}
?>
<div class="container text-center">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Enregistrement</h2>
			<form method="POST" class="mb-5">
				<div class="form-group">
					<label for="InputUser">Identifiant</label>
					<input type="text" class="form-control" id="InputUser" name="username" placeholder="Username">
				</div>

				<div class="form-group">
					<label for="InputPswd">Mot de Passe</label>
					<input type="password" class="form-control" id="InputPswd" name="password" placeholder="Password">
				</div>

				<div class="form-group">
					<label for="InputPswd2">Mot de Passe</label>
					<input type="password" class="form-control" id="InputPswd2" name="password2" placeholder="Retype your password">
				</div>
				<input type="submit" class="btn btn-primary" />
			</form>
		</div>
	</div>
</div>

<?php

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])){
	if($_POST["password"] == $_POST["password2"]){
		$postArray = array($_POST['username'], $_POST['password']);
		register($postArray);
	} 
}
?>

<?php
include('inc/footer.php')
?>