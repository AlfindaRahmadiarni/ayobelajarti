<?php
include"sidebaradmin.php"; //memanggil file sidebaradmin.php sebagai template halaman admin
?> 

<style type="text/css">
/*mengatur textbox untuk search*/
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: 130px;
}
</style>

<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Kategori</li>
  </ol>

<!-- modal untuk tambah data kategori -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control ins" id="kategori" name="kategori" placeholder="Enter Category">
        <input type="hidden" id="rowId" val="0">
      </div>
      <div class="modal-footer">
        <input type="button" id="simpan" value="Simpan" class="btn btn-primary" onclick="uploadData('addnew');">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

<!-- modal untuk edit data kategori -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control ins" id="kategori2" name="kategori2" placeholder="Enter Category">
        <input type="hidden" id="rowId2" val="0">
      </div>
      <div class="modal-footer">
        <input type="button" id="edit" value="Update" class="btn btn-primary">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

<!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-sitemap"></i> Data Kategori</div>
    <div class="card-body">
      <div class="row">
      <input type="button" class="btn btn-primary" value="Tambah Kategori" id="addnew">
      <div class="col-md-12"><br></div>
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Kategori</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
    </div>
  </div>
</div>
</div>
    
<?php include"footer.php"; ?> <!-- memanggil file footer.php -->

<script type="text/javascript">
  //jika menekan tombol addnew, maka akan menampilkan modal addCategory
  $(document).ready(function(){
    $('#addnew').on('click', function(){
      $('#addCategory').modal('show');
    });
    displayData(0,50);
  });

  //fungsi untuk menampilkan data
  function displayData(start,limit){
    $.ajax({
      url: '../proses/kategoriproses.php',
      method: 'POST',
      dataType: 'text',
      data: {
        key: 'getData',
        start: start,
        limit: limit
      }, success: function (response) {
        if(response != 'limitMax'){
          $('tbody').append(response);
          start += limit;
          displayData(start,limit);
        }else {
          $(".table").DataTable({
            responsive: true
          });
        }
      }
    });
  }

  //fungsi untuk menyimpan data ke database
  function uploadData(data){
    var kategori = $('#kategori');
    if(cekInsert(kategori)){
      $.ajax({
        url: '../proses/kategoriproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: data,
          kategori: kategori.val()
        }, success: function (response) {
          $(".table").DataTable().destroy();
          $('tbody').empty();
          $("#addCategory").modal('hide');
          $('#addCategory').on('hidden.bs.modal', function(){
              $('.ins').val("");
          });
          displayData(0,50);
        }
      });
    }
  }

  //fungsi untuk menampilkan data di form sesuai dengan database
  function edit(row){
    $.ajax({
      url: '../proses/kategoriproses.php',
      method: 'POST',
      dataType: 'json',
      data: {
        key: 'selectRow',
        data: row
      }, success: function (response) {
        $('#rowId2').val(response.id);
        $('#kategori2').val(response.kategori);
        $('#editCategory').modal('show');
        $('#edit').attr('onclick',"updateRow('update')");
      }
    });
  }

  //fungsi untuk mengupdate data di db
  function updateRow(update){
    var row = $('#rowId2');
    var kategori = $('#kategori2');
    if(cekInsert(kategori)){
      $.ajax({
        url: '../proses/kategoriproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: update,
          row: row.val(),
          kategori: kategori.val()
        }, success: function (response) {
          $(".table").DataTable().destroy();
          $('tbody').empty();
          $("#editCategory").modal('hide');
          $('#editCategory').on('hidden.bs.modal', function(){
              $('.ins').val("");
          });
          displayData(0,50);
        }
      });
    }
  }

  // fungsi untuk menghapus data di db
  function dels(row){
    $.ajax({
      url: '../proses/kategoriproses.php',
      method: 'POST',
      dataType: 'text',
      data: {
        key: 'delete',
        data: row
      }, success: function (response) {
        //alert(response);
        $(".table").DataTable().destroy();
        $('tbody').empty();
          displayData(0,50);
      }
    });
  }

  // fungsi untuk mengecek inputan
  function cekInsert(input){
    if(input.val() == ''){
      input.css('border', '1px solid red');
      return false;
    } else {
      input.css('border', '');
      return true;
    }
  }
</script>

