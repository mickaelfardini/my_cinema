<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>
<div class="container">
	<div class="row">
		<div class="accordion w-100 text-center" id="accordionAbos">
			<div class="container">
				<?php
				$i = 0;
				foreach($subs as $key)
					{ ?>
						<div class="card">
							<div class="card-header" id="heading<?=$key['id_abo'];?>">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$key['id_abo'];?>" aria-expanded="true" aria-controls="collapse<?=$key['id_abo'];?>">
										<?= $key['nom'];?>
									</button>
								</h5>
							</div>

							<div id="collapse<?=$key['id_abo'];?>" class="collapse <?php if($i == 0) { ?>show<?php } ?>" aria-labelledby="heading<?=$key['id_abo'];?>" data-parent="#accordionAbos">
								<div class="card-body">
									<p>Prix : <?= $key['prix']; ?></p>
									<p>Duree : <?= $key['duree_abo']; ?></p>
									<p>Descriptif :</p>
									<p><?= $key['resum']; ?></p>
								</div>
							</div>
						</div>
						<?php $i++;} ?>
					</div>
				</div>
			</div>
		</div>

		<?php
		include 'inc/footer.php';
		?>