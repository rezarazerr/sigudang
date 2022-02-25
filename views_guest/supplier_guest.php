<?php
	include_once '../koneksi.php';

	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Supplier</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="../assets/img/icon_wh.png">
	</head>
	<body>
	
		<?php include "header_guest.php"; ?>
		
		<div class="container table-responsive mt-5">
		
			<div class="font-weight-bold text-center mt-5 mb-5">
				<h3>Data Supplier</h3>
			</div>
		
			<table class="table table-striped bg-light" style="border-top: #a8a8a8 4px solid; border-bottom: #a8a8a8 4px solid">
			  <thead class="thead">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama Supplier</th>
			      <th scope="col">Kontak</th>
			      <th scope="col">Alamat</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach($supplier as $datasupplier) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $datasupplier['supplier_name']; ?></td>
			      <td><?php echo $datasupplier['supplier_contact']; ?></td>
			      <td><?php echo $datasupplier['supplier_address']; ?></td>
			    </tr>
			    <?php $no++; } ?>
			  </tbody>
			</table>

		</div>

		<?php include "footer_guest.php"; ?>


		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>