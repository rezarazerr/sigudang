<?php

	include_once '../koneksi.php';
	
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");
	//$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Barang</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="../assets/img/icon_wh.png">
	</head>
	
	<body>
	
		
		<?php include "header_guest.php"; ?>
		
		<div class="container table-responsive mt-5 mb-5">
			
			<div class="font-weight-bold text-center mt-5 mb-5">
				<h3>Data Barang</h3>
			</div>
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="mt-5">
				<div class="form-row">
					<div class="form-group col-md-4">
						
						<?php
						$kata_kunci="";
						if (isset($_POST['kata_kunci'])) {
							$kata_kunci=$_POST['kata_kunci'];
						}
						?>
						<input type="text" name="kata_kunci" placeholder="Kata Kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
					</div>
					<div class="form-group col-md-8">
						<input type="submit" class="btn btn-dark" value="Cari">
						<a href="barang.php" input type="button" class="btn btn-dark">Tampilkan Semuanya<a>
					</div>
				</div>
			</form>						
			
			<table class="table table-striped bg-light" style="border-top: #a8a8a8 4px solid; border-bottom: #a8a8a8 4px solid">
				<thead class="thead">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Kode Barang</th>
						<th scope="col">Nama Barang</th>
						<th scope="col">Quantity</th>
						<th scope="col">Harga</th>
					</tr>
				</thead>
			  
				<?php
			  
					include "../koneksi.php";
					if (isset($_POST['kata_kunci'])) {
						$kata_kunci=trim($_POST['kata_kunci']);
						$sql="select * from m_item where item_code like '%".$kata_kunci."%' or item_name like '%".$kata_kunci."%' or item_price like '%".$kata_kunci."%' order by item_code asc";

					}else {
						$sql="select * from m_item order by item_code asc";
					}

				?> 		
			  
				<tbody>
					<?php $no=1;
					$hasil=mysqli_query($koneksi,$sql);
					while ($databarang = mysqli_fetch_array($hasil)) { ?>
					<tr>
						<th scope="row"><?php echo $no; ?></th>
						<td><?php echo $databarang['item_code']; ?></td>
						<td><?php echo $databarang['item_name']; ?></td>
						<td id="tablequantity"><?php echo $databarang['item_quantity']; ?></td>
						<td><?php echo $databarang['item_price']; ?></td>
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