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

<div class="content-wrapper">
  <div class="container-fluid">
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Pengguna</li>
  </ol>

<!-- modal untuk tambah data user -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="username">Username</label>
        <input class="form-control ins" id="username" name="username" type="text" placeholder="Enter Your Username">
        <label for="password">Password:</label>
        <input class="form-control ins" id="password" name="password" type="password" placeholder="Enter Your Password">
        <label for="nama">Nama</label>
        <input class="form-control ins" id="nama" name="nama" type="text" placeholder="Enter Your Name">
        <label for="level">Level</label><br>
        <input type="radio" name="level" value="1" id="level">Admin <br>
        <input type="radio" name="level" value="0" id="level" checked="true">Member
        <input type="hidden" id="rowId" val="0">
      </div>
      <div class="modal-footer">
        <input type="button" id="simpan" value="Simpan" class="btn btn-primary" onclick="uploadData('addnew');">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

<!-- modal untuk edit data user -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="username">Username</label>
        <input class="form-control ins" id="username2" name="username2" type="text">
        <label for="password">Password:</label>
        <input class="form-control ins" id="password2" name="password2" type="password">
        <label for="nama">Nama</label>
        <input class="form-control ins" id="nama2" name="nama2" type="text">
        <input type="hidden" id="rowId2" name='rowId2'>

        <!-- combobox untuk menampilkan data level yang tersimpan di db -->
          <?php 
            echo "<label for='level'>Level</label>";
            $query = mysqli_query($mysqli, "SELECT * FROM user");
            echo "<select class='form-control ins' name='level2' id='level2'>";
            echo "<option value='0'>0</option>";
            echo "<option value='1'>1</option>";
            echo "</select>";
          ?>  
      </div>
      <div class="modal-footer">
        <input type="button" id="edit" value="Update" class="btn btn-primary">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

  <!-- Menampilkan data pengguna -->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-user"></i> Data Pengguna</div>
    <div class="card-body">
      <div class="row">
      <input type="button" class="btn btn-primary" value="Tambah Pengguna" id="addnew">
      <div class="col-md-12"><br></div>
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama</th>
              <th>Level</th>
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
  //jika menekan tombol addnew, maka akan menampilkan modal addUser
  $(document).ready(function(){
    $('#addnew').on('click', function(){
      $('#addUser').modal('show');
    });
    displayData(0,50);
  });

  //fungsi untuk menampilkan data
  function displayData(start,limit){
    $.ajax({
      url: '../proses/userproses.php',
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
    var username = $('#username');
    var password = $('#password');
    var nama = $('#nama');
    var level = $('input:radio[name=level]:checked');
    if(cekInsert(username) && cekInsert(password) && cekInsert(nama) && cekInsert(level)){
      $.ajax({
        url: '../proses/userproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: data,
          username: username.val(),
          password: password.val(),
          nama: nama.val(),
          level: level.val()
        }, success: function (response) {
          //alert(response);
          $(".table").DataTable().destroy();
          $('tbody').empty();
          $("#addUser").modal('hide');
          $('#addUser').on('hidden.bs.modal', function(){
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
      url: '../proses/userproses.php',
      method: 'POST',
      dataType: 'json',
      data: {
        key: 'selectRow',
        data: row
      }, success: function (response) {
        $('#rowId2').val(response.id);
        $('#username2').val(response.username);
        $('#password2').val(response.password);
        $('#nama2').val(response.nama);
        $('#level2').val(response.level);
        $('#editUser').modal('show');
        $('#edit').attr('onclick',"updateRow('update')");
      }
    });
  }

  //fungsi untuk mengupdate data di db
  function updateRow(update){
    var row = $('#rowId2');
    var username = $('#username2');
    var password = $('#password2');
    var nama = $('#nama2');
    var level = $('#level2');
    if(cekInsert(username) && cekInsert(password) && cekInsert(nama)){
      $.ajax({
        url: '../proses/userproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: update,
          row: row.val(),
          username: username.val(),
          password: password.val(),
          nama: nama.val(),
          level: level.val()
        }, success: function (response) {
          //alert(response);
            $(".table").DataTable().destroy();
            $('tbody').empty();
            $("#editUser").modal('hide');
            $('#editUser').on('hidden.bs.modal', function(){
              $('.ins').val("");
          });
          displayData(0,50);
        }
      });
    } else{
      alert("empty");
    }
  }

  // fungsi untuk menghapus data di db
  function dels(row){
    $.ajax({
      url: '../proses/userproses.php',
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
    if(input.val() == '' ){
      input.css('border', '1px solid red');
      return false;
    } else {
      input.css('border', '');
      return true;
    }
  }
</script>