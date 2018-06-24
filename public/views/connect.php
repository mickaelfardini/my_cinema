<?php
include('inc/header.php');
include('inc/navbar.php');
?>

<?php
if (isset($_COOKIE['username'])) {
	setcookie ("username", "", time() - 3);
	header('Location: index.html');
	return true;
}
?>
<div class="container text-center">
	<div class="row">
		<div class="col-sm-12">
			<h2>Connexion</h2>
			<?php
			if(isset($_POST["username"]) && isset($_POST["password"])){
				if(connect($postArray = array($_POST['username'], $_POST['password']))) {
					header('Location: index.html');
				}else{ echo "Username ou Mot de passe incorrect";	}
			} ?>
			<form method="POST" class="mb-5">

				<div class="col-md-4 mb-3">
					
				</div>
				<div class="form-group row">
					<label for="loginUser" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="loginUser" name="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group row">
					<label for="loginPwd" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="loginPwd" name="password" placeholder="Password">
					</div>
				</div>
				<div class=""> 
					<input type="submit" class="btn btn-primary align-content-md-center" />
				</div>
			</form>
		</div>
	</div>
</div>

<?php
include('inc/footer.php')
?>