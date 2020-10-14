<?php

include('library.php');

$library = new Library();

$data = $library->show();

if (isset($_GET['hapus'])) {
	$id = $_GET['hapus'];
	$delete_status = $library->delete($id);
	if($delete_status)
	{
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Post</title>
	<link rel="stylesheet" href="asset/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="card mt-5 justify-content-center">
			<div class="card-header">
				<h3>Data Post</h3>
			</div>
			<div class="card-body">
				<a href="form_add.php" class="btn btn-outline-success">Tambah Post</a>
				<hr />
				<table class="table table-striped">
					<tr>
						<td>No</td>
						<td>Judul</td>
						<td>Content</td>
						<td>Opsi</td>
					</tr>
					<?php
						$no = 1;
						foreach ($data as $row) {
						    echo "<tr>";
						    echo "<td>".$no."</td>";
						    echo "<td>".$row['title']."</td>";
						    echo "<td>".$row['content']."</td>";
							echo "<td><a class='btn btn-outline-warning' href='edit_form.php?id=".$row['id']."'>Update</a>
	                        <a class='btn btn-outline-danger' href='index.php?hapus=".$row['id']."'>Hapus</a></td>";
	                        echo "</tr>";
	                        $no++;
						}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>