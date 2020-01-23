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

table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting {
    padding-right: 9px;
  }

</style>

<div class="content-wrapper">
  <div class="container-fluid">
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Pertanyaan</li>
  </ol>

<!-- modal untuk tambah data pertanyaan -->
<div class="modal fade" id="addSoal" tabindex="-1" role="dialog" aria-labelledby="addSoalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pertanyaan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="soal">Soal</label>
        <input class="form-control ins" id="soal" name="soal" type="text" placeholder="Enter Question">
        <label for="kategori">Kategori</label>

        <!-- combobox yang isinya berasal dari tabel kategori -->
        <?php 
          $query = mysqli_query($mysqli, "SELECT * FROM kategori order by idKategori");
          echo "<select class='form-control ins' name='kategori' id='kategori'>";
          echo "<option value='' selected>-Pilih Kategori-</option>";
            
          while ($q=mysqli_fetch_array($query)) {
            echo "<option value=$q[kategori]>$q[kategori]</option>";
          }
          echo "</select>";
        ?>

        <label for="jwb1">Jawaban 1:</label>
        <input class="form-control ins" id="jawaban1" name="jawaban1" type="text" placeholder="Enter Answer 1">
        <label for="jwb2">Jawaban 2</label>
        <input class="form-control ins" id="jawaban2" name="jawaban2" type="text" placeholder="Enter Answer 2">
        <label for="jwb3">Jawaban 3</label>
        <input class="form-control ins" id="jawaban3" name="jawaban3" type="text" placeholder="Enter Answer 3">
        <label for="jawabanBenar">Jawaban</label><br>
        <input type="radio" name="jawabanBenar" id="jawabanBenar" value="jawaban1">jawaban 1 <br>
        <input type="radio" name="jawabanBenar" id="jawabanBenar" value="jawaban2">jawaban 2 <br>
        <input type="radio" name="jawabanBenar" id="jawabanBenar" value="jawaban3">jawaban 3 <br>
        <input type="hidden" id="rowId" val="0">
      </div>
      <div class="modal-footer">
        <input type="button" id="simpan" value="Simpan" class="btn btn-primary" onclick="uploadData('addnew');">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

<!-- modal untuk edit data pertanyaan -->
<div class="modal fade" id="editSoal" tabindex="-1" role="dialog" aria-labelledby="editSoalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pertanyaan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="soal">Soal</label>
        <input class="form-control ins" id="soal2" name="soal2" type="text">
        <label for="kategori">Kategori</label>

        <!-- combobox yang menampilkan kategori sesuai nilai di tabel pertanyaan -->
        <?php 
          $query = mysqli_query($mysqli, "SELECT * FROM kategori order by idKategori");
          echo "<select class='form-control ins' name='kategori2' id='kategori2'>";
          echo "<option value=''>-Pilih Kategori-</option>";
            
          while ($q=mysqli_fetch_array($query)) {
            echo "<option value=$q[kategori]>$q[kategori]</option>";
          }
          echo "</select>";
        ?>

        <label for="jwb1">Jawaban 1</label>
        <input class="form-control ins" id="jawaban12" name="jawaban12" type="text">
        <label for="jwb2">Jawaban 2</label>
        <input class="form-control ins" id="jawaban22" name="jawaban22" type="text">
        <label for="jwb3">Jawaban 3</label>
        <input class="form-control ins" id="jawaban32" name="jawaban32" type="text">

        <!-- combobox yang menampilkan jawabanBenar yg tersimpan dalam db -->
        <?php 
          echo "<label for='jawabanBenar'>Jawaban Benar</label>";
          $query = mysqli_query($mysqli, "SELECT * FROM pertanyaan");
          echo "<select class='form-control ins' name='jawabanBenar2' id='jawabanBenar2'>";
          echo "<option value='jawaban1'>Jawaban 1</option>";
          echo "<option value='jawaban2'>Jawaban 2</option>";
          echo "<option value='jawaban3'>Jawaban 3</option>";
          echo "</select>";
        ?>
        <input type="hidden" id="rowId2" val="0">
      </div>
      <div class="modal-footer">
        <input type="button" id="edit" value="Update" class="btn btn-primary">
        <input type="button" id="batal" value="Batal" class=" btn btn-secondary" data-dismiss="modal";">
      </div>
    </div>
  </div>
</div>

  <!-- Menampilkan data pertanyaan -->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-question"></i> Data Pertanyaan</div>
    <div class="card-body">
      <div class="row">
      <input type="button" class="btn btn-primary" value="Tambah Pertanyaan" id="addnew">
      <div class="col-md-12"><br></div>
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Soal</th>
              <th>Kategori</th>
              <th>Jawaban 1</th>
              <th>Jawaban 2</th>
              <th>Jawaban 3</th>
              <th>Jawaban</th>
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
  //jika menekan tombol addnew, maka akan menampilkan modal addSoal

  $('#example').dataTable( {
  "columnDefs": [
    { "width": "20%", "targets": 0 }
    ]
  });

  $(document).ready(function(){
    $('#addnew').on('click', function(){
      $('#addSoal').modal('show');
    });
    displayData(0,50);
  });

  //fungsi untuk menampilkan data
  function displayData(start,limit){
    $.ajax({
      url: '../proses/pertanyaanproses.php',
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
    var soal = $('#soal');
    var kategori = $('#kategori');
    var jawaban1 = $('#jawaban1');
    var jawaban2 = $('#jawaban2');
    var jawaban3 = $('#jawaban3');
    var jawabanBenar = $('input:radio[name=jawabanBenar]:checked');
    if(cekInsert(soal) && cekInsert(kategori) && cekInsert(jawaban1) && cekInsert(jawaban2) && cekInsert(jawaban3) && cekInsert(jawabanBenar)){
      $.ajax({
        url: '../proses/pertanyaanproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: data,
          soal: soal.val(),
          kategori: kategori.val(),
          jawaban1: jawaban1.val(),
          jawaban2: jawaban2.val(),
          jawaban3: jawaban3.val(),
          jawabanBenar: jawabanBenar.val()
        }, success: function (response) {
          $(".table").DataTable().destroy();
          $('tbody').empty();
          $("#addSoal").modal('hide');
          $('#addSoal').on('hidden.bs.modal', function(){
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
      url: '../proses/pertanyaanproses.php',
      method: 'POST',
      dataType: 'json',
      data: {
        key: 'selectRow',
        data: row
      }, success: function (response) {
        $('#rowId2').val(response.id);
        $('#soal2').val(response.soal);
        $('#kategori2').val(response.kategori);
        $('#jawaban12').val(response.jawaban1);
        $('#jawaban22').val(response.jawaban2);
        $('#jawaban32').val(response.jawaban3);
        $('#jawabanBenar2').val(response.jawabanBenar);
        $('#editSoal').modal('show');
        $('#edit').attr('onclick',"updateRow('update')");
      }
    });
  }

  //fungsi untuk mengupdate data di db  
  function updateRow(update){
    var row = $('#rowId2');
    var soal = $('#soal2');
    var kategori = $('#kategori2');
    var jawaban1 = $('#jawaban12');
    var jawaban2 = $('#jawaban22');
    var jawaban3 = $('#jawaban32');
    var jawabanBenar = $('#jawabanBenar2');
    if(cekInsert(soal) && cekInsert(kategori) && cekInsert(jawaban1) && cekInsert(jawaban2) && cekInsert(jawaban3) && cekInsert(jawabanBenar)){
      $.ajax({
        url: '../proses/pertanyaanproses.php',
        method: 'POST',
        dataType: 'text',
        data: {
          key: update,
          row: row.val(),
          soal: soal.val(),
          kategori: kategori.val(),
          jawaban1: jawaban1.val(),
          jawaban2: jawaban2.val(),
          jawaban3: jawaban3.val(),
          jawabanBenar: jawabanBenar.val()
        }, success: function (response) {
            $(".table").DataTable().destroy();
            $('tbody').empty();
            $("#editSoal").modal('hide');
            $('#editSoal').on('hidden.bs.modal', function(){
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
      url: '../proses/pertanyaanproses.php',
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