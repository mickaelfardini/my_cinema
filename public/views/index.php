<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

<html>
<body>
	<div class="container">
		<div class="row">

<!-- 			<?php
			foreach ($films as $key) {
				echo '
				<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="card text-center mb-3">
				<img class="card-img-top" src="public/img/card.svg" alt="Card image cap">
				<h6 class="card-title">' . $key['titre'] . '</h6>
				<p class="card-text">' . substr($key['resum'], 0, 100) . '...</p>
				<a href="index.php?page=news" class="btn btn-primary pull-down">Continue</a>
				</div>
				</div>
				';
			}
			?> -->
			<?php
			foreach ($films as $key)
			{
				echo "
				<div class=\"col-xs-12 col-sm-6 col-md-4\">
				<div class=\"card\">
				<div class=\"card-header\">
				" . $key['up_nom'] . "
				</div>
				<div class=\"card-body\">
				<h5 class=\"card-title\">" . $key['titre'] . "</h5>
				<p class=\"card-text\">" . substr($key['resum'], 0, 90) . "...</p>
				<a href=\"#\" class=\"btn btn-primary\">Read More</a>
				</div>
				</div>
				</div>";
			}
			?>
		</div>
	</div>
</body>
</html>

<?php
include 'inc/footer.php';
?>