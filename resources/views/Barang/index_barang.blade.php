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
			<button class="btn btn-primary light btn-sm" onclick="window.location.href='/home'">Home</button>
			<button class="btn btn-warning btn-sm active" onclick="window.location.href='/setting'">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/kategori'">Kategori</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/Lokasi'">Lokasi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/penjual'">Penjual</button>    
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/barang'">Barang</button>		    
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
						<th rowspan="2" class="align-middle">Kode Barang</th>
						<th rowspan="2" class="align-middle">Nama Barang</th>
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
			        		<td>Kode Barang</td>
			        		<td>:</td>
			        		<td><input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang" required></td>
			        	</tr>
			        	<tr>
			        		<td>Nama Barang</td>
			        		<td>:</td>
			        		<td><input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang" required></td>
			        	</tr>
			        	<tr>
			        		<td>Harga Barang</td>
			        		<td>:</td>
			        		<td><input type="text" name="harga_barang" id="harga_barang" placeholder="Harga Barang" required></td>
			         	</tr>
			        	<tr>
			        		<td>Lokasi</td>
			        		<td>:</td>
			        		<td>
			        			<select id="kode_lokasi" name="kode_lokasi">
			        				<option>Pilih</option>
			        				@foreach($lokasis as $lokasi)
									<option value="{{$lokasi->kode_lokasi}}">{{$lokasi->kode_lokasi}}</option>
									@endforeach
			        			</select>
		        		</td>
			         	</tr>
			         	<tr>
			        		<td>Kategori</td>
			        		<td>:</td>
			        		<td>
			        			<select id="kode_kategori" name="kode_kategori">
			        				<option>Pilih</option>
			        				@foreach($kategoris as $kategori)
									<option value="{{$kategori->kode_kategori}}">{{$kategori->kode_kategori}}</option>
									@endforeach
			        			</select>
			        		</td>
			         	</tr>
			         	<tr>
			        		<td>Penjual</td>
			        		<td>:</td>
			        		<td>
			        			<select id="kode_penjual" name="kode_penjual">
			        				<option>Pilih</option>
			        				@foreach($penjuals as $penjual)
									<option value="{{$penjual->kode_penjual}}">{{$penjual->kode_penjual}}</option>
									@endforeach
			        			</select>
			        		</td>
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
	        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<table class="table">
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td id="kode_barang_detail"></td>
				</tr>
				<tr>
					<td>Nama Barang</td>
					<td>:</td>
					<td id="nama_barang_detail"></td>
				</tr>
				<tr>
					<td>Harga Barang</td>
					<td>:</td>
					<td id="harga_barang_detail"></td>
				</tr>
				<tr>
					<td>Kode Lokasi</td>
					<td>:</td>
					<td id="kode_lokasi_detail"></td>
				</tr>
				<tr>
					<td>Kode Kategori</td>
					<td>:</td>
					<td id="kode_kategori_detail"></td>
				</tr>
				<tr>
					<td>Kode Penjual</td>
					<td>:</td>
					<td id="kode_penjual_detail"></td>
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
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myTable").DataTable({
			processing:true,
			serverside:true,
			ajax:{
				url:"/barang",
			},
			columns:[
				{
					data: 'kode_barang',
					name: 'kode_barang'
				},
				{
					data: 'nama_barang',
					name: 'nama_barang'
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
			$('.modal-title-add').text('Tambah Data Barang');
			$('#action').val('Tambah');
			$('#tombol_action').text('Tambah Data');
			$('#myModal').modal('show');
		});

		$('#myModal').on('hidden.bs.modal', function (e){
			$("#kode_barang").val('');
			$("#nama_barang").val('');
			$("#harga_barang").val('');
		});

		$('#formPenjual').on('submit',function(e) {
			e.preventDefault();
			var action=$("#action").val();
			var kode_barang=$('#kode_barang').val();
			//alert(kode_barang);
			if (action=='Tambah') {
				//alert('ajax untuk tambah');
				if (kode_barang.length>5||kode_barang.length<5) {
					alert('Character must be 5 Digits');
				}else{
					$.ajax({
					url:"/barang/add",
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
				if (kode_barang.length >5 || kode_barang.length <5) {
					alert('Character must be 5 Digits');
				}else{
					$.ajax({
					url:"/barang/update",
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

		$(document).on('click','.detail', function(){
			var id= $(this).attr('id');			
			// alert (id);
			$.ajax({
				url:"/barang/detail/"+id,
				dataType:"json",
				success:function(html){
					$("#kode_barang_detail").text(html.data[0].kode_penjual);
					$("#nama_barang_detail").text(html.data[0].nama_barang);
					$("#harga_barang_detail").text(html.data[0].harga_barang);
					$("#kode_lokasi_detail").text(html.data[0].kode_lokasi);
					$("#kode_kategori_detail").text(html.data[0].kode_barang);
					$("#kode_penjual_detail").text(html.data[0].kode_penjual);
					$("#tombol_action").text("Update Data");
					$("#myModalDetail").modal("show");
				}
			});
		});
	});
</script>
</html>