<?php 
include '../connection.php'; //memanggil file connection.php untuk koneksi ke database
session_start(); //memulai session
	if(isset($_SESSION['username'])){ //jika session username tidak kosong
		if($_SESSION['level']==0){ //jika session level benilai 0
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ayo Belajar TI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- font untuk web -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- FIle css yang digunakan -->
	<link rel="stylesheet" href="../../css/animate.css">
	<link rel="stylesheet" href="../../css/icomoon.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="../../css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" >
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap.min.css"> -->
	<link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../css/style.css">

	<!-- Modernizr JS -->
	<script src="../../js/modernizr-2.6.2.min.js"></script>

	<!-- css untuk memodifikasi tampilan -->
	<style type="text/css">
	/*untuk navigasi*/
	.navbar-custom { 
    	background-color: #2D2826;
	}
	/*untuk simbol icon-bar*/
	.icon-bar{
		background-color: #AAB0B9;
	}
	/*untuk link*/
	a {
		/*color: #828291;*/
		color: #AAB0B9;
	}
	/*untuk home*/
	.gtco-cover .display-t, .gtco-cover .display-tc {
		height: 610px;
    	display: table;
    	width: 100%;
	}
	/*untuk content*/
	#gtco-features, #gtco-features-2, #gtco-testimonial, #gtco-services, #gtco-subscribe, #gtco-footer, .gtco-section {
    	padding: 2em 0;
    	clear: both;
	}
	/*untuk jarak tulisan di home*/
	.jarak{
		padding-top: 4em;
	}
	/*untuk info*/
	div.dataTables_wrapper div.dataTables_info {
	    padding-top: 8px;
	    white-space: none;
	}
	/*untuk pagination*/
	.pagination > li > a, .pagination > li > span {
	    position: relative;
	    float: left;
	    padding: 10px 20px;
	    line-height: 1;
	    text-decoration: none;
	    color: #F86B2F;
	}
	/*untuk hover pagination*/
	.pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus, .pagination > .active > span, .pagination > .active > span:hover, .pagination > .active > span:focus {
	    z-index: 2;
	    color: #fff;
	    background-color: #F86B2F;
	    border-color: #F86B2F;
	    cursor: default;
	}
	/*untuk keseluruhan konten*/
	body {
	    font-family: "Raleway", Arial, sans-serif;
	    font-weight: 400;
	    font-size: 14px;
	    line-height: 1.7;
	    color: #828282;
	    background: #fff;
	}
	/*untuk konten ranking*/
	#gtco-services{
		overflow-x:hidden;
		background:#fff;
		margin: 0;
	}
	/*untu h1-h5*/
	h1, h2, h3, h4, h5, h6, figure {
	    color: 212529;
	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	    font-weight: 350;
	    margin: 0 0 20px 0;
	}
	/*untuk dropdown select*/
	div.dataTables_wrapper div.dataTables_length select {
	    width: 100px;
	    height: 50px;
	    display: inline-block;
	}
	/*untuk textbox search*/
	div.dataTables_wrapper div.dataTables_filter input {
	    margin-left: 0.5em;
	    display: inline-block;
	    width: 130px;
	    height: 50px
	}
	.table-bordered{
		border: 1px solid darkgrey;
	}
	.table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td {
    	border: 1px solid darkgrey;
	}
	</style>

	</head>
	<body>
	<div class="gtco-loader"></div> <!-- untuk loader -->

<!-- untuk menu navigasi -->
<div id="myNavbar" class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a href="#" class="navbar-brand">AYOBELAJARTI</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active" style="text-transform: uppercase;"><a href="#gtco-header"><?php echo $_SESSION['username']; ?>'s HOME</a></li>
				<li><a href="#score">SCORE</a></li>
				<li><a href="#record">RECORD</a></li>
				<li><a href="#rank">RANK</a></li>
				<li><a href="#exampleModal" data-toggle="modal">LOGOUT</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- untuk home -->
<header id="gtco-header" class="gtco-cover gtco-cover-lg" role="banner" style="background-image:url(../../images/header.jpg);">
	<div class="overlay"></div>
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-center">
				<div class="display-t">
					<div class="display-tc animate-box" data-animate-effect="fadeIn">
						<div class="jarak">
							<h1 style="color: #F2F2F2;">Let's Learn IT</h1>
							<h3 style="color: #ABB1BA;">Because sometimes programming is much more interesting than gaming</h3>
							<p><a href="mulai.php" class="btn btn-primary btn-lg">Mulai</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- untuk score, giliran, dan menang -->
<div id="score" style="background-color: #efefef;">
	<div class="gtco-container">
		<div class="row" style="padding: 5em 0 5em 0;">
			<div class="col-md-4" align="center">
				<h1 style="color: #F86B2F">Your Score</h1><br>
				<h2>
				<?php
	              $query = mysqli_query($mysqli, "SELECT * FROM user where username = '$_SESSION[username]'");
	              while ($show = mysqli_fetch_array($query)){
	                echo $show['score'];
	              } 
	            ?>
				</h2>	
			</div>
			<div class="col-md-4" align="center">
				<h1 align="center" style="color: #F86B2F">Your Turn</h1><br>
				<h2 align="center">
				<?php
	              $query = mysqli_query($mysqli, "SELECT * FROM record where username = '$_SESSION[username]'");
	              $a=mysqli_num_rows($query);
	              echo $a;
	            ?>
				</h2>	
			</div>
			<div class="col-md-4" align="center">
				<h1 style="color: #F86B2F">Perfect Point</h1><br>
				<h2>
				<?php
	              $query = mysqli_query($mysqli, "SELECT * FROM user where username = '$_SESSION[username]'");
	              while ($show = mysqli_fetch_array($query)){
	                echo $show['win'];
	              } 
	            ?>
				</h2>	
			</div>
		</div>
	</div>
</div>

<!-- untuk record -->
<div id="record">
	<div class="gtco-container">
		<div class="table-responsive">
		<div class="col-md-10 col-md-offset-1" align="center" style="padding: 5em 0 5em 0;">
			<h1 align="center" style="color: #F86B2F">YOUR RECORD</h1><br>
			<h4>
			<table class="table table-bordered table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>No</th>
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
	              $a = 1;
	              $query = mysqli_query($mysqli, "SELECT * FROM record where username='$_SESSION[username]'");
	              $batas = mysqli_num_rows($query);
	              while ($show = mysqli_fetch_array($query)){
	                if($a <= $batas){
	                  echo "<td>".$a."</td>";
	                  $a++;
	                }
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

<!-- untuk ranking -->
<div id="rank" style="background-color: #f5f5f5;">
	<div class="gtco-container">
		<div class="table-responsive">
		<div class="col-md-10 col-md-offset-1" align="center" style="padding: 5em 0 5em 0;">
			<h1 align="center" style="color: #F86B2F">RANKING</h1><br>
			<h4>
			<table class="table table-bordered table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
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

<!-- untuk footer -->
<footer id="gtco-footer" role="contentinfo" style="background-color: #1F1F1F;">
	<div class="gtco-container">		
		<div class="row copyright">
			<div class="col-md-12">
				<p class="pull-right">
					<small class="block">&copy; 2017 AyoBelajarTI. All Rights Reserved.</small> 
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- modal untuk konfirmasi logout -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih tombol "Logout" untuk keluar dari halaman member</div>
      <div class="modal-footer">
      	<form action="../logout.php" method="post">
        	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        	<input type="submit" class="btn btn-primary" name="logout" value="Logout">
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- untuk kembali ke atas -->
<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<?php } else { //jika session level bernilai selain 0, maka akan diarahkan ke halaman admin 
	header("Location: ../admin/admin.php");
} ?>
<?php } else { //jika session usernauhme tidak terisi, maka akan diarahkan ke halaman utama
?>
<script type="text/javascript">
	alert("Silahkan Login dulu");
</script>
<?php header("Location: ../../index.php"); } ?>

<!-- file jss yang dibutuhkan -->
	<!-- jQuery -->
	<script src="../../js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../../js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="../../js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="../../js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../../js/jquery.magnific-popup.min.js"></script>
	<!-- Main -->
	<script src="../../js/main.js"></script>
	<script src="../../vendor/datatables/jquery.dataTables.js"></script>
	<script src="../../js/dataTables.bootstrap.min.js"></script>
    <!-- <script src="../../js/sb-admin-datatables.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script> -->
    <script src="../../js/dataTables.responsive.js"></script>

	</body>
</html>

<!-- javascript agar datatable responsive -->
<script type="text/javascript">
  $(".table").DataTable({
    responsive: true
  });
</script>