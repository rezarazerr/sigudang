
<!Doctype html>
	<body>

		<?php 
			include_once 'koneksi.php';
			if(isset($_COOKIE['sukses']))
			{
				echo '<script type="text/javascript">
					alert('.$_COOKIE["sukses"].')
					</script>';
			}
			$mutasi 	= mysqli_query($koneksi, "SELECT * FROM m_mutasi,m_item WHERE m_mutasi.mutasi_item_id=m_item.item_id");
			$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");
			$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item");
			
			// nama file
			$filename="Catatan_Mutasi_Barang-".date('Ymd').".xls";

			//header info for browser
			ob_end_clean();
			header("Content-Type: application/vnd-ms-excel"); 
			header('Content-Disposition: attachment; filename="' . $filename . '";');

		?>

		<center>
		CATATAN MUTASI BARANG
		<h5>
			<?php
				$tanggal= mktime(date("m"),date("d"),date("Y"));
				echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
				date_default_timezone_set('Asia/Jakarta');
				$jam=date("H:i:s");
				echo "| Pukul : <b>". $jam." ". " WIB</b>";
				$a = date ("H");
			?> 
		</h5>
		</center>

		<table style="border: #000000 1px solid; text-align:center;">
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

	</body>
</html>

