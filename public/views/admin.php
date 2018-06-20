<?php
if (!isConnected() || !isAdmin($_COOKIE['username'])) {
	header('Location: ./index.php?page=news');
}

include('inc/header.php');
include('inc/banner.php');
?>

<div class="container">

	<?php
	if (isConnected() && isAdmin($_COOKIE['username'])) {
		echo '
		<table class="table table-dark pull-right">
		<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Titre</th>
		<th scope="col">Contenu</th>
		<th scope="col">Url de l\'image</th>
		<th scope="col">Delete</th>
		<th scope="col">Edit</th>
		</tr>
		</thead>
		<tbody>';

		foreach ($news as $key) {

			echo '<tr>
			<th scope="row">' . $key['id'] . '</th>
			<td>' . $key['title'] . '</td>
			<td>' . $key['content'] . '</td>
			<td>' . $key['imgurl'] . '</td>
			<td>
			<form method="post" action="">
			<button type="submit" class="btn btn-primary" name="' . $key['id'] . '" id="' . $key['id'] . '">Delete</button></form></td>
			<td>
			<form method="post" action="index.php?page=edit">
			<button type="submit" class="btn btn-primary" name="' . $key['id'] . '" id="' . $key['id'] . '">Edit</button></form></td>
			</tr>';
		}
		echo '</tbody>
		</table>';

		if (isset($_POST) AND $_POST != NULL) {
			delete((array_keys($_POST)));
		}
	}
	?>
</div>

<?php
include('inc/footer.php')
?>