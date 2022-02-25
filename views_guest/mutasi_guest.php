<?php

	include_once '../koneksi.php';
	$mutasi 	= mysqli_query($koneksi, "SELECT * FROM m_mutasi,m_item WHERE m_mutasi.mutasi_item_id=m_item.item_id");
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");
	$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Data Mutasi Barang</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="../assets/img/icon_wh.png">
	</head>
	
	<body>
		<?php include "header_guest.php"; ?>
		
		<div class="container table-responsive mt-5">
		
			<div class="font-weight-bold text-center mt-5 mb-5">
				<h3>Data Mutasi Barang</h3>
			</div>
		
			<table class="table table-striped bg-light" style="border-top: #a8a8a8 4px solid; border-bottom: #a8a8a8 4px solid">
			  <thead class="thead">
			    <tr>
			      <th scope="col">No</th>
				  <th scope="col">Kode Barang</th>
				  <th scope="col">Nama Barang</th>				  
			      <th scope="col">Tanggal Mutasi</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Harga</th>
			    </tr>
			  </thead>
			  <tbody>
			  
			  	<?php $no=1; foreach($mutasi as $datamutasi) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
				  <td><?php echo $datamutasi['item_code']; ?></td>
				  <td><?php echo $datamutasi['item_name']; ?></td>
			      <td><?php echo $datamutasi['mutasi_date']; ?></td>
			      <td id="tablequantity"><?php echo $datamutasi['mutasi_quantity']; ?></td>
			      <td><?php echo $datamutasi['mutasi_price']; ?></td>
			    </tr>
			    <?php $no++;} ?>
			  </tbody>
			</table>
			
			<div class="text-center mt-2">
				<a href="../ekspor_excel.php">Cetak Data ke Excel</a>
			</div>
		</div>

		<?php include "footer_guest.php"; ?>


		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>