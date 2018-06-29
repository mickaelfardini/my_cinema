<?php
if (!isConnected()) {
	header('Location: index.html');
}

include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>
<div class="container">
	<div class="row">
		<div class="col-4">
			<img src="<?=$img?>" alt="<?=$film['titre']?>">
		</div>
		<div class="col-8">
			<h4><b>Titre</b> :</h4>
			<h5><?=$film['titre']?></h5>
			<br>
			<h5><b>Synopsis</b> :</h5>
			<p><?=$film['resum']?></p>
			<br>
			<h5><b>Annee</b> :</h5>
			<p><?=$film['annee_prod']?></p>
			<br>
			<h5><b>Duree</b> :</h5>
			<p><?=$film['duree_min']?> min</p>
			<p><small class="text-muted"></small></p>
			<?php if ($comments) { ?>
			<table>
				<?php foreach ($comments as $avis) { ?>
					<tr>
				<th><b>Avis</b> :</th>
						<td><?= $avis['content'] ?></td>
					</tr>
				<?php } ?>
			</table>
			<br>
		<?php } ?>
		</div>
	</div>
	<?php if (isConnected()) { ?>
			<div class="row">
					<div class="offset-4 col-7">
				<form method="POST">
					<div class="form-group">
						<label for="Avis">Donnez un avis</label>
						<textarea name="avis" class="form-control" id="Avis" rows="4"></textarea>
					</div>
					<div class="form-group form-check">
						<input name="viewed" type="checkbox" class="form-check-input" id="viewed">
						<label class="viewed" for="viewed">J'ai vu ce film</label>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	<?php } ?>
</div>
<script src="public/inc/pagination.js"></script>
<?php
include 'inc/footer.php';
?>