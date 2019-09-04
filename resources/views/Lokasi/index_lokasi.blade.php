<!DOCTYPE html>
<html>
<head>
	<title>Master Lokasi</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
	<h2>LOKASI</h2><hr>
	<button type="button" id="buttonAdd" class="btn btn-info">Tambah Data</button><br><br>

	<span id="notif">	
		
	</span>

		<table id="myTableLokasi" class="table table-hover table-stripped table-bordered">
			<thead>
				<tr style="vertical-align: center; text-align: center;">
					<th class="align-middle">Kode Lokasi</th>
					<th class="align-middle">Nama Lokasi</th>
					<th class="align-middle">Kode Pos Lokasi</th>
					<th class="align-middle">Status</th>
					<th class="align-middle">Edit</th>
					<th class="align-middle">Delete</th>
					<th class="align-middle">Detail</th>
				</tr>
			</thead>
		</table>
	<!-- Div container -->
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formLokasi">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title-add" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <input class="form-control input-lg" type="text" name="action" id="action"><br><br>

		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Lokasi</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="kode_lokasi" id="kode_lokasi" placeholder="Kode Pelajaran..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Lokasi</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Pelajaran..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Kode Pos Lokasi</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="jam_ajar" id="jam_ajar" placeholder="Jam Ajar..." required="">
		        		</td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_act" class="btn btn-primary"></button>
		      </div>
		  </form>
	    </div>
	  </div>
	</div>

	</html>