<?php
include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
session_start(); //memulai session
if(isset($_SESSION['username'])){ //jika session username terisi
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ayo Belajar TI</title> <!-- judul tab -->
  
  <!-- file css yang dibutuhkan -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" >
</head>

<!-- body -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php">AYOBELAJARTI</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Data User</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="kategori.php">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Data Kategori</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="pertanyaan.php">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">Data Pertanyaan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="rank.php">
            <i class="fa fa-fw fa-trophy"></i>
            <span class="nav-link-text">Data Ranking</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Data Record</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="record.php">Record</a>
            </li>
            <li>
              <a href="detailrecord.php">Detail Record</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler"> <!-- navigasi atas -->
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>    

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih tombol "Logout" untuk keluar dari halaman admin</div>
      <div class="modal-footer">
        <form action="../logout.php" method="post">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!-- <a class="btn btn-primary" href="../../index.php">Logout</a> -->
          <input type="submit" class="btn btn-primary" name="logout" value="Logout">
        </form>
      </div>
    </div>
  </div>
</div>

<?php } else { ?> <!-- jika session username kosong, akan diarahkan ke halaman utama -->
  <script type="text/javascript">
    alert("Silahkan Login dulu");
  </script>

<?php header("Location: ../../index.php"); } ?>

    <!-- File js yang dibutuhkan -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../../js/sb-admin.min.js"></script>
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../js/dataTables.responsive.js"></script>
  </div>
</body>
</html>
