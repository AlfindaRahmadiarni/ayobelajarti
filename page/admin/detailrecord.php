<?php
include "sidebaradmin.php"; //memanggil file sidebaradmin.php sebagai template halaman admin
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
    <li class="breadcrumb-item active">Data Detail Record</li>
  </ol>

  <!-- Menampilkan data dari table detailrecord-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i> Data Detail Record</div>
    <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Record</th>
              <th>ID Pertanyaan</th>
              <th>Jawaban</th>
              <th>Jawaban Benar</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
              $query = mysqli_query($mysqli, "SELECT * FROM detailrecord");
              while ($show = mysqli_fetch_array($query)){
                echo "<td>".$show['idRecord']."</td>";
                echo "<td>".$show['idPertanyaan']."</td>";
                echo "<td>".$show['jawaban']."</td>";
                echo "<td>".$show['jawabanBenar']."</td>";
                echo "<td>".$show['status']."</td>";
                echo "</tr>";
              } 
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include"footer.php"; ?> <!-- memanggil file footer.php -->

<!-- javascript untuk membuat dataTable responsive -->
<script type="text/javascript">
  $(".table").DataTable({
    responsive: true
  });
</script>