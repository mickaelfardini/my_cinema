<?php
if (!isConnected()) {
	header('Location: index.html');
}

include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>
	<div class="container">
		<h2>Mon historique :</h2>
			<div class="row">
			<?php
			foreach ($films as $key)
			{
				$img = getPoster($key['titre']);
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
								<a class="btn btn-primary btn-lg" href="film.html?film=<?=$key['id_film']?>" role="button">Voir la fiche</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<hr class="my-4">
			<div class="row">
	<div class="container">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item <?php if($_GET['id'] <= 1) { ?>disabled<?php }?>">
					<a class="page-link" href="myfilms-<?=$_GET['id']-1;?>.html" tabindex="-1">Prev</a>
				</li>
				<?php for($i = 1; $i <= $nbr_page; $i++) {?>
					<li id= "<?=$i;?>" class="page-item <?php if($i == $_GET['id']){?>active<?php }?>"><a class="page-link" href="myfilms-<?=$i?>.html"><?=$i?></a></li>
				<?php }?>
				<li class="page-item <?php if($_GET['id'] >= $nbr_page) { ?>disabled<?php }?>">
					<a class="page-link" href="myfilms-<?=$_GET['id']+1;?>.html">Next</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
		</div>
		<script src="public/inc/pagination.js"></script>
	<?php
	include 'inc/footer.php';
	?>