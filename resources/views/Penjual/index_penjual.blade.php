<!DOCTYPE html>
<html>
<head>
	<title>Penjual</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Data Penjual</h1>
		<hr>
		<!-- Button trigger modal -->
		<div>
			<button type="button" class="btn btn-primary" id="buttonAdd">Tambah</button>
			<br><br>
			<span id="notif">
				
			</span>
			<!-- <button type="button" class="btn btn-secondary" id="buttonEdit">Edit</button> -->			
		</div>
		<span id="1" style="margin: 2px;"></span>
		<div style="text-align: center;">
			<table class="table table-bordered" id="myTables">
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
	<!-- Modal Tambah -->
	<div class="modal" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			    <form id="formPenjual">
			    	@csrf
			      <div class="modal-header">
			        <h5 class="modal-title-add">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<input type="hidden" name="action" id="action">
			        <table class="table table-striped">
			        	<tr>
			        		<td>Kode Penjual</td>
			        		<td>:</td>
			        		<td><input type="text" name="kode_penjual" id="kode_penjual" placeholder="Kode Penjual" required></td>
			        	</tr>
			        	<tr>
			        		<td>Nama Penjual</td>
			        		<td>:</td>
			        		<td><input type="text" name="nama_penjual" id="nama_penjual" placeholder="Nama Penjual" required></td>
			        	</tr>
			        	<tr>
			        		<td>Usia Penjual</td>
			        		<td>:</td>
			        		<td><input type="text" name="usia_penjual" id="usia_penjual" placeholder="Usia Penjual" required></td>
			         	</tr>         	
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="tombol_action">Save changes</button>
			      </div>
			    </form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$("#myTables").DataTable({
			processing:true,
			serverside:true,
			ajax:{
				url:"/penjual",
			},
			columns:[
				{
					data: 'kode_penjual',
					name: 'kode_penjual'
				},
				{
					data: 'nama_penjual',
					name: 'nama_penjual'
				},				
				{
					data: 'status',
					name: 'status',
				},
				{
					data: 'edit',
					name: 'edit',
					orderable: false,
				},
				{
					data: 'delete',
					name: 'delete',
					orderable: false,
				},
				{
					data: 'detail',
					name: 'detail',
					orderable: false,
				}
			]
		});

		$('#buttonAdd').click(function() {
				$('.modal-title-add').text('Tambah Data Penjual');
				$('#action').val('Tambah');
				$('#tombol_action').text('Tambah Data');
				$('#myModal').modal('show');
			});

		$('#myModal').on('hidden.bs.modal', function (e){
			$("#kode_penjual").attr('readonly', false).val('');
			$("#nama_penjual").val('');
			$("#usia_penjual").val('');
		});

		$('#formPenjual').on('submit',function(e) {
			e.preventDefault();
			var action=$("#action").val();
			var kode_penjual=$('#kode_penjual').val();
			//alert(kode_penjual);
			if (action=='Tambah') {
				//alert('ajax untuk tambah');
				if (kode_penjual.length>5||kode_penjual.length<5) {
					alert('Character must be 5 Digits');
				}else{
					$.ajax({
					url:"/penjual/add",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType:"json",
					success:function(data) {
						var html='';
						$("#myModal").modal('hide');
						if (data.errors) {
							html = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Yah! </strong>'+data.errors+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						if (data.success) {
							html = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeay! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							//$('#formPenjual')[0].reset();
							$("#myTables").DataTable().ajax.reload();
						}
						$('#notif').html(html);
						}
					});//penutup ajax
				}
			}//if Tambah
		});
	});
</script>
</html>