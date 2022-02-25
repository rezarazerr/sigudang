<?php

	include_once 'koneksi.php';
	if(isset($_COOKIE['sukses']))
	{
		echo '<script type="text/javascript">
			alert('.$_COOKIE["sukses"].')
			</script>';
	}
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");
	//$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Barang</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="assets/img/icon_wh.png">
	</head>
	
	<body>
	
		
		<?php include "header.php"; ?>
		
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
						<th scope="col">Action <a type="button" class="btn btn-sm ml-2" href="javascript:void(0)" onclick="modal_barang()" style="background-color: #a8a8a8"><i class="fa fa-plus" style="color: #fff"></i></a></th>
					</tr>
				</thead>
			  
				<?php
			  
					include "koneksi.php";
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
						<td>
							<a href="javascript:void(0)" onclick="edit_barang('<?php echo $databarang['item_id']?>')" class="btn btn-sm bg-warning" title="Edit"><i class="fa fa-pencil" style="color: #fff"></i></a>
							<a href="processbarang.php?do=delete&id=<?php echo $databarang['item_id']?>" class="btn btn-sm bg-danger" title="Hapus!"><i class="fa fa-trash" style="color: #fff"></i></a>
							<a href="javascript:void(0)" onclick="mutasi_barang('<?php echo $databarang['item_id']?>')" class="btn btn-sm bg-primary" title="Mutasi!"><i class="fa fa-truck" style="color: #fff"></i></a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>

		</div>

		<?php include "footer.php"; ?>



		<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form action="processbarang.php?do=add" method="POST" id="formbarang">
						<div class="modal-header">
							<h5 class="modal-title" id="formjudul">Tambah Barang</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						
						<div class="modal-body">
							<div class="form-group row">
								<label for="kodebarang" class="col-sm-4 col-form-label">Kode Barang</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" placeholder="Kode Barang" id="kodebarang" name="kodebarang">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="namabarang" class="col-sm-4 col-form-label">Nama Barang</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" placeholder="Nama Barang" id="namabarang" name="namabarang">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="harga" class="col-sm-4 col-form-label">Harga</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" placeholder="harga" id="harga" name="harga">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="supplier" class="col-sm-4 col-form-label">Supplier</label>
								<div class="col-sm-8">
									<select name="supplier" id="supplier" class="form-control">
										<?php
											foreach($supplier as $supplierdata){
												echo '<option value="'.$supplierdata['supplier_id'].'">'.$supplierdata['supplier_name'].'</option>';
											}
										?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="formmutasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					
					<form action="processmutasi.php?do=add" method="POST" id="formmutasiform">
				
						<div class="modal-header">
							<h5 class="modal-title" id="formtitle">Mutasi Barang</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						
						<div class="modal-body">
								<div class="form-group row">
									<label for="kodemutasibarang" class="col-sm-4 col-form-label">ID Barang</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Kode Barang" id="kodemutasibarang" name="kodemutasibarang" disabled>
									</div>
								</div>
								
								<div class="form-group row">
									<label for="tanggalmutasi" class="col-sm-4 col-form-label">Tanggal Mutasi</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="tanggalmutasi" name="tanggalmutasi">
									</div>
								</div>
								
								<div class="form-group row">
									<label for="mutasiquantity" class="col-sm-4 col-form-label">Quantity</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" placeholder="Quantity" id="mutasiquantity" name="mutasiquantity">
									</div>
								</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>						