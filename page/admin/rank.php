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
    <li class="breadcrumb-item active">Data Peringkat</li>
  </ol>

  <!-- Menampilkan ranking -->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-trophy"></i> Data Peringkat</div>
    <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Peringkat</th>
              <th>Username</th>
              <th>Score</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
              $a = 1;
              $query = mysqli_query($mysqli, "SELECT * FROM user where level = '0' order by score desc");
              $batas = mysqli_num_rows($query);
              while ($show = mysqli_fetch_array($query)){
                if($a <= $batas){
                  echo "<td>".$a."</td>";
                  $a++;
                }
                echo "<td>".$show['username']."</td>";
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

<?php include"footer.php"; ?> <!-- memanggil file foter.php -->

<!-- js agar dataTable responsive -->
<script type="text/javascript">
  $(".table").DataTable({
    responsive: true
  });
</script>