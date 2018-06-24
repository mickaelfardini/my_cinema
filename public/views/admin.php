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
		?>
		<table class="table table-dark pull-right">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Titre</th>
					<th scope="col">Contenu</th>
					<th scope="col">Delete</th>
					<th scope="col">Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($films as $key) {
					?>
					<tr>
						<th scope="row"><?=$key['id_film'];?></th>
						<td><?=$key['titre'];?></td>
						<td><?=$key['resum'];?></td>
						<td>
							<form method="post" action="admin.html">
								<button type="submit" class="btn btn-primary" name="<?=$key['id_film'];?>">Delete</button></form></td>
								<td>
									<form method="post" action="edit.html">
										<button type="submit" class="btn btn-primary" name="<?=$key['id_film'];?>">Edit</button></form></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php
						if (isset($_POST) && $_POST != NULL) {
							delete((array_keys($_POST)));
						}
					}
					?>
				</div>

				<?php
				include('inc/footer.php')
				?>