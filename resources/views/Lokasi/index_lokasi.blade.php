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
					<th rowspan="2" class="align-middle">Kode Lokasi</th>
					<th rowspan="2" class="align-middle">Nama Lokasi</th>
					<th rowspan="2" class="align-middle">Status</th>
					<th colspan="3">Action</th>
				</tr>
				<tr style="text-align: center;">
					<th>Edit</th>
					<th>Delete</th>
					<th>Detail</th>
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
		        			<input class="form-control input-lg" type="text" name="kode_lokasi" id="kode_lokasi" placeholder="Kode Lokasi..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Lokasi</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Kode Pos Lokasi</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="kode_pos_lokasi" id="kode_pos_lokasi" placeholder="Kode Lokasi..." required="">
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
	<!-- Modal Detail -->
	<div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formLokasi">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->

		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Lokasi</td>
		        		<td id="kode_lokasi_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Lokasi</td>
		        		<td id="nama_lokasi_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Kode Pos Lokasi</td>
		        		<td id="kode_pos_lokasi_detail"></td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <!-- <button type="submit" id="tombol_act" class="btn btn-primary"></button> -->
		      </div>
		  </form>
	    </div>
	  </div>
	</div>
	<!-- Modal Delete -->
	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title-delete" id="exampleModalLabel">Detail Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->
		        <h4 class="modal-title" style="text-align: center;">Yakin mau diapus?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_delete" class="btn btn-danger"></button>
		      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Aktif -->
	<div class="modal fade" id="myModalAktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title-aktif" id="exampleModalLabel">Detail Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->
		        <h4 class="modal-title" style="text-align: center;">Aktifin data?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_aktif" class="btn btn-danger"></button>
		      </div>
	    </div>
	  </div>
	</div>
</body>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#buttonAdd").click(function(){
			$('.modal-title-add').text('Tambah Data');
			$('#action').val('tambah');
			$('#tombol_act').text('Add');
			$('#kode_lokasi').attr('readonly', false);
			// $("#formPelajaran")[0].reset();
			$('#myModal').modal('show');
		});

		$('#myModal').on('hidden.bs.modal', function(e){
			$("#formLokasi")[0].reset();	
		});

		$('#myTableLokasi').DataTable({
 			processing : true,
 			serverside : true,
 			ajax:{
 				url: "/",
 			},
 			columns:[
 				{
 					data : 'kode_lokasi',
 					name : 'kode_lokasi'
 				},
 				{
 					data : 'nama_lokasi',
 					name : 'nama_lokasi'
 				},
 				{
 					data : 'status',
 					name : 'status',
 					orderable : false
 				},
 				{
 					data : 'edit',
 					name : 'edit',
 					orderable : false
 				},
 				{
 					data : 'delete',
 					name : 'delete',
 					orderable : false
 				},
 				{
 					data : 'detail',
 					name : 'detail',
 					orderable : false
 				}
 			]
 		});

			$("#formLokasi").on("submit", function(e){
			event.preventDefault();
			var action = $("#action").val(); // get value
			var kode_lokasi = $("#kode_lokasi").val();
			// alert(action);
			if (action == "tambah") {
				// alert("Ajax untuk tambah");
				if (kode_lokasi.length > 5 || kode_lokasi.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
						url:"/Lokasi/add",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#myModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formLokasi")[0].reset();
								// $("#formPelajaran").DataTable().ajax.reload();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					});					
				}
			};
			if (action == "edit") {
				//alert("Ajax untuk edit");
				if (kode_lokasi.length > 5 || kode_lokasi.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
						url:"/Lokasi/update",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#myModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formLokasi")[0].reset();
								// $("#formPelajaran").DataTable().ajax.reload();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					});					
				}
			};
		
});
			
		// edit
		$(document).on('click','.edit',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/Lokasi/edit/"+id,
				dataType: "json",
				success:function(html){
					$("#kode_lokasi").val(html.data[0].kode_lokasi);
					$("#nama_lokasi").val(html.data[0].nama_lokasi);
					$("#kode_pos_lokasi").val(html.data[0].kode_pos_lokasi);

				}
			});
					$('#kode_lokasi').attr('readonly', true);
					$('#action').val('edit');
					$('.modal-title-add').text('Edit Data');
					$('#tombol_act').text('Update Data');
					$("#myModal").modal("show");
		});
			});



			// detail
			$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			// alert(id);

			$.ajax({
				url:"/Lokasi/detail/"+id,
				dataType: "json",
				success:function(html){
					console.log(html);
					$("#kode_lokasi_detail").text(html.data[0].kode_lokasi);
					$("#nama_lokasi_detail").text(html.data[0].nama_lokasi);
					$("#kode_pos_lokasi_detail").text(html.data[0].kode_pos_lokasi);
					$('.modal-title').text('Detail Data');
					$("#myModalDetail").modal("show");
				}
			});
		});

			// delete
		var id_delete;
		$(document).on('click','.delete',function(){
			id_delete = $(this).attr('id');
			$('.modal-title-delete').text('Delete Data');
			$('#tombol_delete').text('Delete Data');
			$('#myModalDelete').modal('show');
		});

		// action delete
		$("#tombol_delete").click(function(){
			$.ajax({
				url:"/Lokasi/delete/"+id_delete,
				beforeSend:function(){
					$("#tombol_delete").text('Deleting...');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalDelete").modal('hide');
						$("#tombol_delete").text('OK');
						$("#myTableLokasi").DataTable().ajax.reload();
					},500);
				}
			});
		});
		var id_aktif;
		$(document).on('click','.aktif',function(){
			id_aktif = $(this).attr('id');
			$('.modal-title-aktif').text('Aktif Data');
			$('#tombol_aktif').text('Aktif Data');
			$('#myModalAktif').modal('show');
		});

		// action aktif
		$("#tombol_aktif").click(function(){
			$.ajax({
				url:"/Lokasi/aktif/"+id_aktif,
				beforeSend:function(){
					$("#tombol_delete").text('Aktifing...');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalAktif").modal('hide');
						$("#tombol_aktif").text('OK');
						$("#myTableLokasi").DataTable().ajax.reload();
					},500);
				}
			});
		});

		

</script>

</html>