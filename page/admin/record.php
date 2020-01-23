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
    <li class="breadcrumb-item active">Data Record</li>
  </ol>

  <!-- Menampilkan data record -->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-book"></i> Data Record</div>
    <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Record</th>
              <th>Username</th>
              <th>Tanggal</th>
              <th>Benar</th>
              <th>Salah</th>
              <th>Kosong</th>
              <th>Score</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
              $query = mysqli_query($mysqli, "SELECT * FROM record");
              while ($show = mysqli_fetch_array($query)){
                echo "<td>".$show['idRecord']."</td>";
                echo "<td>".$show['username']."</td>";
                echo "<td>".$show['tanggal']."</td>";
                echo "<td>".$show['benar']."</td>";
                echo "<td>".$show['salah']."</td>";
                echo "<td>".$show['kosong']."</td>";
                echo "<td>".$show['score']."</td>";
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

<!-- js agar dataTable responsive -->
<script type="text/javascript">
  $(".table").DataTable({
    responsive: true
  });
</script>