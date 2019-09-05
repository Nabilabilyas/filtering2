<!DOCTYPE html>
<html>

<head>
	<title>Master Penjual</title>
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
	<div class="container">
		
		<div style="text-align: right;">
			<p><img style="float: left; margin: 0px 15px 15px 0px;" height="15%" width="15%" src="/images/oles.png">
			<h1 style="text-align: center;">OLES</h1><hr>
			<h1 style="text-align: center;">Cara Tepat Jual Lambat</h1>
			<button class="btn btn-primary light btn-lg" onclick="window.location.href='/home'">Home</button>
			<button class="btn btn-warning btn-lg active" onclick="window.location.href='/setting'">Setting</button>
			<hr>
			<br>
			<br>
		</div>
		
		<div style="text-align: center;">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<button class="btn btn-primary width" onclick="window.location.href='/kategori'">Kategori</button>			
		    <button class="btn btn-primary width" onclick="window.location.href='/Lokasi'">Lokasi</button>	    
		    <button class="btn btn-warning btn-lg active width" onclick="window.location.href='/penjual'">Penjual</button> 
		    <button class="btn btn-primary width" onclick="window.location.href='/barang'">Barang</button>	
		</div>
		</div>


		<div>
			<h2 style="text-align: center; color:red ">Penjual</h2>
			<hr>
			<br><br>
		</div>	
		<!-- Button trigger modal -->
			<span id="notif">
				
			</span>
			<!-- <button type="button" class="btn btn-secondary" id="buttonEdit">Edit</button> -->			
		<div style="text-align: center">
			<table class="table table-hover table-stripped table-bordered" id="bioTable" >
				<thead style="background-color: lightcyan">
				<tr>
		        	<td class="align-middle">Nama Barang</td>
		        	<td id="{{ $gender->gender }}"></td>
		        </tr>
		        	<tr>
	        		<td class="align-middle">Harga Barang</td>
	        		<td id="{{ $gender->gender }}"></td>
		        	</tr>
	        	<tr>
	        		<td class="align-middle">Nama Lokasi</td>
	        		<td id="{{ $gender->gender }}"></td>
	        	</tr>
					<td class="align-middle">Nama Kategori</td>
	        		<td id="{{ $gender->gender }}"></td>
				</tr>
				</tr>
					<td class="align-middle">Nama Penjual</td>
	        		<td id="{{ $gender->gender }}"></td>
					</tr>
				</thead>
			</table>
		</div>

<tr>
</html>