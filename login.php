<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
		<link rel="shortcut icon" href="assets/img/icon_wh.png">
	</head>
	
	<body class="bg-light">
		<div class="container">
			<div class="row" style="margin-top:200px">
			
				<div class="col-md-8 text-center mb-2 mt-2">
					
					<div class="mt-4">
						<h2>SISTEM INFORMASI</h2>
						<h2>MANAJEMEN STOK BARANG</h2>
					</div>
					
					<div class="card-deck">
						<img class="card-img-top" src="assets/img/archive.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">
						<img class="card-img-top" src="assets/img/boy.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">
						<img class="card-img-top" src="assets/img/trolley2.png" alt="Card image cap" style="max-width: 150px; margin: auto; margin-top:40px;">

					</div>
					
				</div>
			
			
				<div class="col-md-4">
					<div class="card bg-white">
						<div class="card-header bg-transparent mt-2 mb-2">
							<h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
						</div>
						
						<div class="card-body">
							<form action="processlogin.php" method="post">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username">
								</div>
								
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								
								<div class="text-center text-danger">
									<?php
										if (isset($_GET["status"])){
											echo "<p> Username/Password salah! </p>";
										}
									?>
								</div>
								
								
								<div class="form-group text-center mt-5">
									<input type="submit" name="" value="Login" class="btn btn-primary btn-block">
								</div>
								
								<div class="form-group text-center">
									<a href="views_guest/index_guest.php" input type="button" class="btn btn-dark btn-block">Masuk Sebagai Guest<a>
								</div>

								
							</form>
						</div>
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