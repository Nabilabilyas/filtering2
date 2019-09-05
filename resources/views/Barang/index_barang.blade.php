<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>

</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">OLES</h1><hr>
		<div style="text-align: right;">
			<button class="btn btn-primary active">Home</button>
			<button class="btn btn-primary">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/kategori'">Kategori</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/Lokasi'">Lokasi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/penjual'">Penjual</button>    
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/Barang'">Barang</button>		    
		</div>
		<hr><br>

		<h2>Data Barang</h2>
		<hr>		
		<!-- Button trigger modal -->
		<div class="container">
			<button type="button" class="btn btn-primary" id="buttonAdd">Tambah</button>
			<br><br>
			<span id="notif">
				
			</span>
			<!-- <button type="button" class="btn btn-secondary" id="buttonEdit">Edit</button> -->			
		</div>
		<span id="1" style="margin: 2px;"></span>
		<div class="container" style="text-align: center;">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th rowspan="2" class="align-middle">Kode Penjual</th>
						<th rowspan="2" class="align-middle">Nama Penjual</th>
						<th rowspan="2" class="align-middle">Status</th>
						<th colspan="5" style="text-align: center;">Action</th>
					</tr>
					<tr>
						<th>Edit</th>
						<th>Delete</th>
						<th>Detail</th>
					</tr>					
				</thead>
			</table>
		</div>
	</div>		
	</div>
</body>
</html>