<?php

	include_once 'koneksi.php';
	$barang = mysqli_query($koneksi, "SELECT * FROM m_item");
	$banyakbarang = mysqli_num_rows($barang);

	$supplier = mysqli_query($koneksi, "SELECT * FROM m_supplier");
	$banyaksupplier = mysqli_num_rows($supplier);

	$mutasi = mysqli_query($koneksi, "SELECT * FROM m_mutasi");
	$banyakmutasi = mysqli_num_rows($mutasi);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manajemen Gudang</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="assets/img/icon_wh.png">
	</head>
	
	<body>
	
		<?php include "header.php"; ?>
		
		<div class="container" style="margin-top:120px">
		
		
			
			<div class="card-deck">
				<div class="card bg-light">
					<img class="card-img-top" src="assets/img/archive.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">
					<div class="card-body">
						<h5 class="card-title" align="center">Barang</h5>
						<p class="card-text" align="justify">Menu ini berisi daftar barang dan menu CRUD barang. Total barang yang saat ini sudah ada : </p>
				  
						<a href="barang.php"><p class="text-center font-weight-bold mt-4 text-dark"><?php echo $banyakbarang; ?> Barang</p></a>
					</div>
				</div>
				
				<div class="card bg-light">
					<img class="card-img-top" src="assets/img/boy.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">
					<div class="card-body">
						<h5 class="card-title" align="center">Supplier</h5>
						<p class="card-text" align="justify">Menu ini berisi daftar supplier dan menu CRUD supplier. Banyak supplier yang sudah terdaftar : </p>
				  
						<a href="supplier.php"><p class="text-center font-weight-bold mt-4 text-dark"><?php echo $banyaksupplier; ?> Supplier</p></a>
					</div>
				</div>
			  
				<div class="card bg-light">
					<img class="card-img-top" src="assets/img/trolley2.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">
					<div class="card-body">
						<h5 class="card-title" align="center">Mutasi Barang</h5>
						<p class="card-text" align="justify">Menu ini adalah menu mutasi dimana data keluarnya barang dicatat. Total mutasi yang sudah dilakukan : </p>
				  
						<a href="mutasi.php"><p class="text-center font-weight-bold mt-4 text-dark"><?php echo $banyakmutasi; ?> kali mutasi</p></a>
					</div>
				</div>
			</div>
			
			
			<div class="text-center mt-3">
				<a href="barang.php" class="btn btn-md" title="Mutasi!"><i class="fa fa-truck" style="color: #666666"></i> 
					<p class="text-dark">Mutasi Barang!</p>
				</a>
			</div>
			
		</div>
		
		<?php include "footer.php"; ?>


		
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>