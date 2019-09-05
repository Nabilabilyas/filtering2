<!DOCTYPE html>
<html>
<head>
	<title>Master Kategori</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>

</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">OLES</h2><hr>
		<div style="text-align: right;">
			<button class="btn btn-primary active">Home</button>
			<button class="btn btn-primary">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/kategori'">Kategori</button>
		    <button class="btn btn-light btn-sm"  onclick="window.location.href='/Lokasi'">Lokasi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/penjual'">Penjual</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/'">Item</button>
		</div>
		<hr><br>

		<h4 style="text-align: center; color:red ">DATA KATEGORI</h4>
		<hr>
		<button type="button" class="btn btn-primary" id="buttonTambah">Tambah</button>
		<br><br>
		<span id="notif">
			
		</span>
	<!-- 	<button type="button" class="btn btn-primary" id="buttonEdit">Edit</button>
	 -->
		<div style="text-align: center">
			<table class="table table-hover table-stripped table-bordered" id="bioTable" >
				<thead style="background-color: lightcyan">
				<tr>
					<th rowspan="2" class="align-middle">Kode Kategori</th>
					<th rowspan="2" class="align-middle">Nama Kategori</th>
					<th rowspan="2" class="align-middle">Status</th>
					<th style="text-align: center;"colspan="3">Action</th>				
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

<!-- ---------------------------------------------------------------------------------------------- -->
<!-- Modal Tambah -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" >
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	     <form id="formKategori">	
	     	@csrf
		      <div class="modal-header" style="background-color: turquoise">
		        <h5 class="modal-title" id="formDataLabel" ></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input class=" form-control input-lg " type="text" name="action" id="action">
		       	<table class="table">
		      		<tr>
		      			<td >Kode Kategori</td>
		      			<td>:</td>
		      			<td>
		      				<input class=" form-control input-lg "type="text" id="kode_kategori" name="kode_kategori"  placeholder="Kode Kategori"  required="" autocomplete="" >
		      			</td>
		      		</tr>
		      		<tr>
		      			<td class="align-middle">Nama Kategori</td>
		      			<td>:</td>
		      			<td>
		      				<input class=" form-control input-lg " type="text" id="nama_kategori" name="nama_kategori"  placeholder="Nama Kategori" required="" >
		      			</td>
		      		</tr>
		      		<tr>
		      			<td class="align-middle">Biaya Kategori</td>
		      			<td>:</td>
		      			<td>
		      				<input class=" form-control input-lg " type="text" id="biaya_kategori" name="biaya_kategori" placeholder="Biaya Kategori" required="" >
		      			</td>
		      		</tr>
		      	</table>
		      </div>
		        <div class="modal-footer" style="background-color: turquoise">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary" id="action_button"></button>
		      </div>
     		</form>
		</div>
	</div>
</div>
<!-- -------------------------------------------------------------------------------------- -->
<!-- Modal Detail-->
<div class="modal" id="myModalDetail" tabindex="-1" role="dialog" >
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	     <form id="formKategori">	
	     	@csrf
		      <div class="modal-header" style="background-color: turquoise">
		        <h5 class="modal-title" id="formDataLabel" ></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        </button>
		      </div>
		      <div class="modal-body">
		       	<table class="table">
		      		<tr>
		      			<td >Kode Kategori</td>
		      			<td id="kode_kategori_detail"></td>
		      		</tr>
		      		<tr>
		      			<td class="align-middle">Nama Kategori</td>
		      			<td id="nama_kategori_detail"></td>
		      		</tr>
		      		<tr>
		      			<td class="align-middle">Biaya Kategori</td>
		      			<td id="biaya_kategori_detail"></td>
		      		</tr>
		      	</table>
		      </div>
		        <div class="modal-footer" style="background-color: turquoise">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
					<h4 class="modal-title" style="text-align: center;">Hapus Jangan Ragu</h4>
					</div>
				<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
					<button class="btn btn-danger" id="delete_button">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>		
	</div>

<!-- ------------------------------------------------------------------------------------- -->
	<div class="modal fade" id="modal_aktif" >
		<div class="modal-dialog" >
			<div class="modal-content" style="margin-top: 100px" >
				<div class="modal-header" style="background-color:turquoise">
				</div>
					<div class="modal-body">
					<h4 class="modal-title" style="text-align: center;">Hapus Jangan Ragu</h4>
					</div>
				<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
					<button class="btn btn-success" id="aktif_button">Aktif</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>		
	</div>

</body>
<!-- ================================================================================ -->
<!-- Java Script -->
<!-- Tambah -->

<script type="text/javascript">
	$(document).ready(function(){
		$("#buttonTambah").click(function(){
			$(".modal-title").text('Tambah Kategori');
			$("#action").val("Tambah");
			$("#kode_kategori").attr('readonly',false);
			$("#action_button").text("Add");
			$("#myModal").modal('show');
		});

//menghilangakn data di tambah
	$('#myModal').on('hidden.bs.modal',function(e){
		$("#formKategori")[0].reset();
	})


//yajra-------------------
$("#bioTable").DataTable({
			processing : true,
			serverside : true,
			ajax:{
				url:"/kategori",
			},
			columns:[
				{
					data: 'kode_kategori',
					name: 'kode_kategori'
				},
				{
					data: 'nama_kategori',
					name: 'nama_kategori'
				},
				{
					data: 'aktif',
					name: 'aktif',
					orderable: false
				},
				{
					data: 'edit',
					name: 'edit',
					orderable: false

				},{
					data: 'delete',
					name: 'delete',
					orderable: false

				},
				{
					data: 'detail',
					name: 'detail',
					orderable: false
				}

			]
		});

//penutup yajra

//add
	$("#formKategori").on('submit',function(e){
		event.preventDefault();
		var action= $("#action").val();//get value 
		var kode_kategori =$("#kode_kategori").val();
			/*alert(id);*/
		if (action=='Tambah') {
	/*				alert("ajax untuk tambah");
	*/				if (kode_kategori.length > 5 || kode_kategori.length <5) {
				alert('Karakter harus 5 digit');
			}else{
				$.ajax({
				url:"/kategori/add",
				method: "POST",
				data : new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:"json",
				success:function(data){
					var html='';
					$("#myModal").modal('hide');
					if (data.errors) {
						html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.errors+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							/*$("#formPelajaran").DataTable().ajax.reload();*/
					}
					if (data.success) {
						html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							$("#formKategori")[0].reset();
							/*$("#formPelajaran").DataTable().ajax.reload();*/
							$("#bioTable").DataTable().ajax.reload();
					}

					$("#notif").html(html);
				}
			});	
		}
	}	

	//Update------
		if (action=='Edit') {
	/*				alert("ajax untuk edit");
	*/			if (kode_kategori.length > 5 || kode_kategori.length <5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
					url:"/kategori/update",
					method: "POST",
					data : new FormData(this),
					contentType:false,
					cache:false,
					processData:false,
					dataType:"json",
					success:function(data){
						var html='';
						$("#myModal").modal('hide');
						if (data.errors) {
							html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.errors+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								/*$("#formPelajaran").DataTable().ajax.reload();*/
						}
						if (data.success) {
							html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formKategori")[0].reset();
								/*$("#formPelajaran").DataTable().ajax.reload();*/
								$("#bioTable").DataTable().ajax.reload();
						}

						$("#notif").html(html);
					}
				});	
			}
		}
	});//penutup add
//------------------------------------------------------------------------------------------
//Detail JavaScript
$(document).on('click','.detail',function(){
				var id=$(this).attr('id');
				/*alert(id);*/
				$.ajax({
					url:"/kategori/detail/"+id,
					dataType:"json",
					success:function(html){
/*						console.log(html);
*/						$("#kode_kategori_detail").text(html.data[0].kode_kategori);
						$("#nama_kategori_detail").text(html.data[0].nama_kategori);
						$("#biaya_kategori_detail").text(html.data[0].biaya_kategori);			

						$(".modal-title").text('Detail Data');
						$("#myModalDetail").modal("show");
					}
				});		
			});//penutup Detail

//-----------------------------------------------------------------------------------------
//Edit javaScript
$(document).on('click','.edit',function(){
				var id=$(this).attr('id');
				/*alert(id);*/
				$.ajax({
					url:"/kategori/edit/"+id,
					dataType:"json",
					success:function(html){
						$("#kode_kategori").val(html.data[0].kode_kategori);
						$("#nama_kategori").val(html.data[0].nama_kategori);
						$("#biaya_kategori").val(html.data[0].biaya_kategori);

						$("#kode_kategori").attr('readonly',true);
						$("#action").val("Edit");
						$(".modal-title").text('Edit Data');
						$("#action_button").text("Update");
						$("#myModal").modal("show");
					}
				});		
				
			});//penutup Edit

//--------------------------------------------------------------------------------------------
/*Delete*/
		var id_delete;
			$(document).on('click','.delete',function(){
				id_delete=$(this).attr('id');
				//alert(id);
				$(".modal-title").text('Hapus Data');
				$("#modal_delete").modal('show');
				
			});	//penutup delete(show modal)

			//action delete
			$("#delete_button").click(function(){
				$.ajax({
					url:"/kategori/delete/"+id_delete,
					beforeSend:function(){
						$("#delete_button").text('hapussss...');
					},
					success:function(){
						setTimeout(function(){
						$("#modal_delete").modal('hide');
						$("#delete_button").text('Delete');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});	
		});
//--------------------------------------------------------------------------------------
//aktif
		var id_aktif;
			$(document).on('click','.aktif',function(){
				id_aktif=$(this).attr('id');
				//alert(id);
				$(".modal-title").text('Aktif Data');
				$("#modal_aktif").modal('show');
				
			});	//penutup delete(show modal)

//action aktif
			$("#aktif_button").click(function(){
				$.ajax({
					url:"/kategori/aktif/"+id_aktif,
					beforeSend:function(){
						$("#aktif_button").text('hapussss...');
					},
					success:function(){
						setTimeout(function(){
						$("#modal_aktif").modal('hide');
						$("#aktif_button").text('Aktif');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});	
		});

//-----------------------------------------------------------------------

});//Penutup script
</script>
</html>