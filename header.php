<?php
	session_start();
	if(!$_SESSION['is_login']){
		echo "<script>window.location.replace('login.php');</script>";
	}
?>


<div class="fixed-top mb-5">
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-bottom: #a8a8a8 4px solid">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div>
			<a class="navbar-brand" href="#"><img src="assets/img/icon_wh.png" alt="" style="max-width: 35px;"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="supplier.php">Daftar Supplier</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="barang.php">Daftar Barang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mutasi.php">Mutasi Barang</a>
				</li>
					
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class=" nav-link text-white mr-3">
					<?php
						$tanggal= mktime(date("m"),date("d"),date("Y"));
						echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
					?> 
					</a>
				</li>
			
				<li class="nav-item">
					<a class="nav-link text-danger" href="logout.php">Log Out</a>
				</li>
			</ul>	
		  </div>
	</nav>

</div>