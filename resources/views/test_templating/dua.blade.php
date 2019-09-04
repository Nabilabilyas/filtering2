@extends('template.master')

 @section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>
          
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Test</a></li>
        <li class="active">cobaaja</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
          <div class="box-body">
           <div class="container">
              <h1>Data Penjual</h1>
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
          </div>
        </div>
    </section>           
    <!-- /.box -->
      @endsection