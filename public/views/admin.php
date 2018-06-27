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
				<hr class="my-4">
				<div class="row">
					<div class="container">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item <?php if($_GET['id'] <= 1) { ?>disabled<?php }?>">
									<a class="page-link" href="admin.html" tabindex="-1">First</a>
								</li>
								<?php for($i = 1; $i <= $nbr_page; $i++) {?>
									<li id= "<?=$i;?>" class="page-item <?php if($i == $_GET['id']){?>active<?php }?>"><a class="page-link" href="admin-<?=$i?>.html"><?=$i?></a></li>
								<?php }?>
								<li class="page-item <?php if($_GET['id'] >= $nbr_page) { ?>disabled<?php }?>">
									<a class="page-link" href="admin-<?=$nbr_page;?>.html">Last</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<script src="public/inc/pagination.js"></script>

				<?php
				include('inc/footer.php')
				?>