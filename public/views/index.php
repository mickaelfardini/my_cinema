<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>

<html>
<body>
	<div class="container">
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