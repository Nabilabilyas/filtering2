<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
<style>
.width {width: 280px;}

</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>

</head>
<body>

<!--Tampilan Awal -->
	
	<div class="container">
		<div style="text-align: right;">
			<p><img style="float: left; margin: 0px 15px 15px 0px;" height="15%" width="15%" src="/images/oles.png">
			<h1 style="text-align: center;">OLES</h1><hr>
			<h1 style="text-align: center;">Cara Tepat Jual Lambat</h1>
			<button class="btn btn-primary light btn-lg" onclick="window.location.href='/home'">Halaman Utama</button>
			<button class="btn btn-warning btn-lg active" onclick="window.location.href='/setting'">Pengaturan</button>
			<hr>
			<br>
			<br>

		</div>
		
<!-- ----------------------------------------------------------------------------------------- -->
		<span id="notif">

		</span>
		<div style="text-align: center">
			<table class="table table-hover table-stripped table-bordered" id="bioTable" >
				<thead style="background-color: lightcyan">
					<tr>
						<th rowspan="2" class="align-middle">Nama Barang</th>
						<th rowspan="2" class="align-middle">Harga Barang</th>
						<th rowspan="2" class="align-middle">Nama Lokasi</th>
						<th rowspan="2" class="align-middle">Nama Kategori</th>
						<th rowspan="2" class="align-middle">Nama Penjual</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	
$("#bioTable").DataTable({
			processing : true,
			serverside : true,
			ajax:{
				url:"/kategori",
			},
			columns:[
				{
					data: 'nama_barang',
					name: 'nama_barang'
				},
				{
					data: 'harga_barang',
					name: 'harga_barang'
				},
				{
					data: 'nama_lokasi',
					name: 'nama_lokasi'
				},
				{
					data: 'nama_kategori',
					name: 'nama_kategori'
				},
				{
					data: 'nama_penjual',
					name: 'nama_penjual'
				}

			]
		});

//penutup yajra


</script>
</html>