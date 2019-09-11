<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
<style>
.width {width: 280px;}
 div#myTable_length{ text-align: left; }
 div#myTable_info{ text-align: left; }
</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>

</head>
<body>
<!-- ------------------------------------------------------------------------------- -->
<!--Tampilan Awal -->

		<div class="container">
		<div style="text-align: right;">
			<p><img style="float: left; margin: 0px 15px 15px 0px;" height="15%" width="15%" src="/images/oles.png">
			<h1 style="text-align: center;">OLES</h1><hr>
			<h1 style="text-align: center;">Cara Tepat Jual Lambat</h1>
			<button class="btn btn-primary light btn-lg" onclick="window.location.href='/home'">Halaman Utama</button>
			<button class="btn btn-primary btn-lg" onclick="window.location.href='/setting'">Pengaturan</button>
			<hr>
			<br>
			<br>

		</div>
		
		<div style="text-align: center;">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<button class="btn btn-primary btn-lg width" onclick="window.location.href='/kategori'">Kategori</button>		
		    <button class="btn btn-primary btn-lg width" onclick="window.location.href='/Lokasi'">Lokasi</button>		    
		    <button class="btn btn-primary btn-lg width" onclick="window.location.href='/penjual'">Penjual</button> 
		    <button class="btn btn-warning btn-lg width active" onclick="window.location.href='/barang'">Barang</button>	
		</div>

		</div>
		<div>
			<br>
			<h2 style="text-align: center; color:red ">BARANG</h2>
			<hr>
			<button type="button" class="btn btn-primary width" id="buttonAdd">Tambah</button>
			<br><br>
		</div>
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
						<th>Hapus</th>
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
			    <form id="formBarang">
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
			        		<td><input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang"></td>
			        	</tr>
			        	<tr>
			        		<td>Nama Barang</td>
			        		<td>:</td>
			        		<td><input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang"></td>
			        	</tr>
			        	<tr>
			        		<td>Harga Barang</td>
			        		<td>:</td>
			        		<td><input type="text" name="harga_barang" id="harga_barang" placeholder="Harga Barang"></td>
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
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        <button type="submit" class="btn btn-primary" id="tombol_action"></button>
			      </div>
			    </form>
			</div>
		</div>
	</div>
	<!-- --------------------------------------------------------------------------------------- -->
	<!-- modal delete -->
	<div class="modal fade" id="modal_delete" >
		<div class="modal-dialog" >
			<div class="modal-content" style="margin-top: 100px" >
				<div class="modal-header" style="background-color:turquoise">
				</div>
					<div class="modal-body">
					<h4 class="modal-title" style="text-align: center;">Hapus data ?</h4>
					</div>
				<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button class="btn btn-danger" id="delete_button">Hapus</button>
				</div>
			</div>
		</div>		
	</div>
	<!-- modal detail -->
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
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	      </div>
		</form>
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
				<h4 class="modal-title" style="text-align: center;"> Aktifkan data ? </h4>
			</div>
			<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
				<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-danger" id="activate">Aktifkan</button>
				
			</div>
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

		$('#formBarang').on('submit',function(e) {
			e.preventDefault();
			var action=$("#action").val();
			var kode_barang=$('#kode_barang').val();
			var nama_barang=$('#nama_barang').val();
			var harga_barang=$('#harga_barang').val();
			//alert(kode_barang);
			if (action=='Tambah') {
				//alert('ajax untuk tambah');
				if (kode_barang==''){
					alert('Mohin diisi Kode Barang');
				}else if(nama_barang == ''){
					alert('Mohon diisi Nama Barang');
				}else if(harga_barang == ''){
					alert('Mohon diisi Harga Barang');
				}else if(kode_barang.length>5||kode_barang.length<5) {
					alert('Karakter harus berisi 5 digit');
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
				if (kode_barang==''){
					alert('Mohin diisi Kode Barang');
				}else if(nama_barang == ''){
					alert('Mohon diisi Nama Barang');
				}else if(harga_barang == ''){
					alert('Mohon diisi Harga Barang');
				}else if(kode_barang.length>5||kode_barang.length<5) {
					alert('Karakter harus berisi 5 digit');
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


		//Edit
		$(document).on('click','.edit', function(){
			var id= $(this).attr('id');
			// alert (id);
			$.ajax({
				url:"/barang/edit/"+id,
				dataType:"json",
				success:function(html){
					$("#kode_barang").attr('readonly', true).val(html.data[0].kode_barang);
					$("#nama_barang").val(html.data[0].nama_barang);
					$("#harga_barang").val(html.data[0].harga_barang);
					$("#kode_lokasi").val(html.data[0].kode_lokasi);
					$("#kode_kategori").val(html.data[0].kode_kategori);
					$("#kode_penjual").val(html.data[0].kode_penjual);					
					$("#action").val("Edit");
					$(".modal-title-add").text("Edit Data");
					$("#tombol_action").text("Update Data");
					$("#myModal").modal("show");
				}
			});
		});//penutup edit

		/*Delete*/
		var id_delete;
			$(document).on('click','.delete',function(){
				id_delete=$(this).attr('id');
				//alert(id);
				$(".modal-title").text('Hapus Data ?');
				$("#modal_delete").modal('show');
				
			});	//penutup delete(show modal)

			//action delete
			$("#delete_button").click(function(){
				$.ajax({
					url:"/barang/delete/"+id_delete,
					beforeSend:function(){
						$("#delete_button").text('Menghapus...');
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

			//--------------------------------------------------------------------------------------
//aktif

//modal Detail
		$(document).on('click','.detail', function(){
			var id= $(this).attr('id');			
			// alert (id);
			$.ajax({
				url:"/barang/detail/"+id,
				dataType:"json",
				success:function(html){
					$("#kode_barang_detail").text(html.data[0].kode_barang);
					$("#nama_barang_detail").text(html.data[0].nama_barang);
					$("#harga_barang_detail").text(html.data[0].harga_barang);
					$("#kode_lokasi_detail").text(html.data[0].kode_lokasi);
					$("#kode_kategori_detail").text(html.data[0].kode_kategori);
					$("#kode_penjual_detail").text(html.data[0].kode_penjual);
					$("#tombol_action").text("Update Data");
					$("#myModalDetail").modal("show");
				}
			});
		});//penutup 

//-----------------------------------------------------------------------

//--------------------------------------------------------------------------------------

		//modal Aktif
		var kode;	
		$(document).on('click','.aktif', function(){
			kode=$(this).attr("id");
			//alert (id);
			$("#modal_aktif").modal('show');
		});//penutup delete

		//action activate
		$("#activate").click(function(){
			$.ajax({
				url:"/barang/aktif/"+kode,
				beforeSend:function(){
					$("#activate").text('Mengaktifkan...');
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