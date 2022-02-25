<?php
	include_once 'koneksi.php';
	if(isset($_COOKIE['sukses']))
	{
		echo '<script type="text/javascript">
			alert('.$_COOKIE["sukses"].')
			</script>';
	}
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Supplier</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="assets/img/icon_wh.png">
	</head>
	<body>
	
		<?php include "header.php"; ?>
		
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
			      <th scope="col">Action <a type="button" class="btn btn-sm ml-2" href="javascript:void(0)" onclick="modal_supplier()" style="background-color: #a8a8a8"><i class="fa fa-plus" style="color: #fff"></i></a></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach($supplier as $datasupplier) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $datasupplier['supplier_name']; ?></td>
			      <td><?php echo $datasupplier['supplier_contact']; ?></td>
			      <td><?php echo $datasupplier['supplier_address']; ?></td>
			      <td>
			      	<a href="javascript:void(0)" onclick="edit_supplier('<?php echo $datasupplier['supplier_id']?>')" class="btn btn-sm bg-warning" title="Edit"><i class="fa fa-pencil" style="color: #fff"></i></a>
			      	<a href="processsupplier.php?do=delete&id=<?php echo $datasupplier['supplier_id']?>" class="btn btn-sm bg-danger" title="Hapus!"><i class="fa fa-trash" style="color: #fff"></i></a>
			      </td>
			    </tr>
			    <?php $no++; } ?>
			  </tbody>
			</table>

		</div>

		<?php include "footer.php"; ?>
		
		<!-- Tampilan Pop Up Tambah Supplier -->
		
		<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="formjudul">Tambah Supplier</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="processsupplier.php?do=add" method="POST">
		        	<div class="form-group row">
		        		<label for="namasupplier" class="col-sm-4 col-form-label">Nama Supplier</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Nama Supplier" id="namasupplier" name="namasupplier">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="kontaksupplier" class="col-sm-4 col-form-label">Kontak</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Kontak Supplier" id="kontaksupplier" name="kontaksupplier">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
		        		<div class="col-sm-8">
		        			<textarea name="alamat" id="alamat" class="form-control"></textarea>
		        		</div>
		        	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		    		</form>
		      </div>
		    </div>
		  </div>
		</div>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>