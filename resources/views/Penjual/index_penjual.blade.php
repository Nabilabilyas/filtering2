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
			<button class="btn btn-primary active">Home</button>
			<button class="btn btn-primary">Setting</button>
			<hr>
			<br>
			<br>
		</div>
		
		<div style="text-align: center;">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<button class="btn btn-primary width" onclick="window.location.href='/kategori'">Kategori</button>
			
			
		    <button class="btn btn-primary width" onclick="window.location.href='/Lokasi'">Lokasi</button>
		    
		    <button class="btn btn-warning btn-lg active width" onclick="window.location.href='/penjual'">Penjual</button> 
		    <button class="btn btn-primary width" onclick="window.location.href='/Barang'">Barang</button>	
		</div>
		</div>


		<div>
			<h2 style="text-align: center; color:red ">Penjual</h2>
			<hr>
			<button type="button" class="btn btn-primary" id="buttonTambah">Tambah</button>
			<br><br>
		</div>	
		<!-- Button trigger modal -->
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
	<!-- Modal Detail -->
	<div id="myModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Detail Penjual</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<table class="table">
				<tr>
					<td>Kode Penjual</td>
					<td>:</td>
					<td id="kode_penjual_detail"></td>
				</tr>
				<tr>
					<td>Nama Penjual</td>
					<td>:</td>
					<td id="nama_penjual_detail"></td>
				</tr>
				<tr>
					<td>Usia Penjual</td>
					<td>:</td>
					<td id="usia_penjual_detail"></td>
				</tr>
			</table>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	      </div>
		</form>
	    </div>
	  </div>	
	</div>
	<!-- Modal Delete -->
	<div class="modal fade" id="modal_delete">
		<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" style="text-align: center;"> Delete? </h4>
			</div>
			<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
				<button type="button" class="btn btn-danger" id="delete_button">Delete?</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				
			</div>
		</div>
		</div>
	</div>

	<!-- Modal Aktif -->
	<div class="modal fade" id="modal_aktif">
		<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" style="text-align: center;"> Activate this Data? </h4>
			</div>
			<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
				<button type="button" class="btn btn-danger" id="activate">Okay</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				
			</div>
		</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$("#myTable").DataTable({
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
			$("#kode_penjual").val('');
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
							$("#myTable").DataTable().ajax.reload();
						}
						$('#notif').html(html);
						}
					});//penutup ajax
				}
			}//if Tambah
			if (action=='Edit') {
				if (kode_penjual.length >5 || kode_penjual.length <5) {
					alert('Character must be 5 Digits');
				}else{
					$.ajax({
					url:"/penjual/update",
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
							//$('#formpenjualan')[0].reset();
							$("#myTable").DataTable().ajax.reload();
						}
						$('#notif').html(html);
						}
					});//penutup ajax
				}
			}//if edit
		});

		//modal Detail
		$(document).on('click','.detail', function(){
			var id= $(this).attr('id');			
			// alert (id);
			$.ajax({
				url:"/penjual/detail/"+id,
				dataType:"json",
				success:function(html){
					$("#kode_penjual_detail").text(html.data[0].kode_penjual);
					$("#nama_penjual_detail").text(html.data[0].nama_penjual);
					$("#usia_penjual_detail").text(html.data[0].usia_penjual);
					$("#tombol_action").text("Update Data");
					$("#myModalDetail").modal("show");
				}
			});
		});//penutup 

		//modal Edit
		$(document).on('click','.edit', function(){
			var id= $(this).attr('id');
			// alert (id);
			$.ajax({
				url:"/penjual/edit/"+id,
				dataType:"json",
				success:function(html){
					$("#kode_penjual").attr('readonly', true).val(html.data[0].kode_penjual);
					$("#nama_penjual").val(html.data[0].nama_penjual);
					$("#usia_penjual").val(html.data[0].usia_penjual);
					$("#action").val("Edit");
					$(".modal-title-add").text("Edit Data");
					$("#tombol_action").text("Update Data");
					$("#myModal").modal("show");
				}
			});
		});//penutup edit
		//modal Delete
		var kode;	
		$(document).on('click','.delete', function(){
			kode=$(this).attr("id");
			//alert (id);
			$("#modal_delete").modal('show');
		});//penutup delete

		//action delete
		$("#delete_button").click(function(){
			$.ajax({
				url:"/penjual/delete/"+kode,
				beforeSend:function(){
					$("#delete_button").text('Deleting...');
				},
				success:function(){
					setTimeout(function(){
						$("#modal_delete").modal('hide');
						$("#delete_button").text('OK');
						$("#myTable").DataTable().ajax.reload();
					},500);
				}
			});
		});

		//modal Aktif
		var kode;	
		$(document).on('click','.aktif', function(){
			kode=$(this).attr("id");
			//alert (id);
			$("#modal_aktif").modal('show');
		});//penutup delete

		//action delete
		$("#activate").click(function(){
			$.ajax({
				url:"/penjual/aktif/"+kode,
				beforeSend:function(){
					$("#delete_button").text('Activating...');
				},
				success:function(){
					setTimeout(function(){
						$("#modal_aktif").modal('hide');
						$("#activate").text('OK');
						$("#myTable").DataTable().ajax.reload();
					},500);
				}
			});
		});
	});
</script>
</html>