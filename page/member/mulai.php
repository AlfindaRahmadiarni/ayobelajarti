<?php 
include "../connection.php"; //memanggil file connection.php untuk koneksi ke database

session_start(); //memulai session
if(isset($_SESSION['username'])){ //jika session username terisi
?>

<!DOCTYPE html>
<html>
<head>
	<!-- <title>Ayo Belajar TI</title> judul tab -->

	<!-- file css yang digunakan -->
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link href="../../css/agency.min.css" rel="stylesheet">

	<!-- css untuk modifikasi tampilan -->
	<style type="text/css">
	/*navigas*/
	.navbar-custom {
    	background-color: #2D2826;
	}
	/*simbol icon-bar*/
	.icon-bar{
		background-color: darkgrey;
	}
	/*link*/
	a {
		color: #AAB0B9;
	}
	/*hover link*/
	a:hover {
    	color: darkorange;
	}
	/*jarak tulisan di home*/
	.jarak{
		padding-top: 5em;
	}
	/*untuk lingkaran*/
	.timeline>li .timeline-image {
	    position: absolute;
	    z-index: 100;
	    text-align: center;
	    color: #fff;
	    border: 7px solid #e9ecef;
	    border-radius: 100%;
	    background-color: #F86B2F;
	}
	/*button primary*/
	.btn-primary{
		background-color: #F86B2F;
		border-radius: 100%;
		border: 7px solid #e9ecef;
	}
	/*btn primary hover, focus, dan active*/
	.btn-primary:active, .btn-primary:focus, .btn-primary:hover {
	    background-color: #e8431e!important;
	    border-color: darkgrey!important;
	    color: #fff;
	}
	/*konten di about*/
	#about{
		padding-top: 2em;
	}
	</style>
</head>
<body>

<!-- untuk menu navigasi -->
<div class="container">
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
				<li><a href="member.php">CANCEL</a></li>
			</ul>
		</div>
	</div>
</div>
	
<div class="jarak"></div> <!-- jarak antara navigasi dan konten -->

<!-- content -->
<section id="about">
<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h3 class="text-muted">Selamat Mengerjakan  <?php echo $_SESSION['username']; ?> :)</h3> <br><br><br>
  </div>
</div>

<?php
	$hasil=mysqli_query($mysqli, "SELECT * FROM pertanyaan ORDER BY RAND() LIMIT 5"); //memilih dan mengacak 5 soal
	$jumlah=mysqli_num_rows($hasil); //jumlah soal
		$urut=0; //untuk nomer
	while($row =mysqli_fetch_array($hasil)) //perulangan untuk memilih kolom
	{
		//inisialisasi variabel
		$id=$row["idPertanyaan"];
		$soal=$row["soal"];
		$kategori=$row['kategori'];
		$pil1=$row["jawaban1"];
		$pil2=$row["jawaban2"];
		$pil3=$row["jawaban3"];
		$kunci=$row["jawabanBenar"];
?>

<!-- form untuk menampilkan pertanyaan dan pilihan jawaban -->
<form name="form1" method="post" action="proses.php"> 
<table>
	<div class="row">
  		<div class="col-lg-12">
    		<ul class="timeline">
<?php 
	if($urut % 2 == 0){ //jika bernomor genap
?>

   	<!-- ============================================================================================== -->
				<li>
					<input type="hidden" name="id[]" value=<?php echo $id; ?>> <!-- untuk idPertanyaan -->
					<input type="hidden" name="kunci[]" value=<?php echo $kunci; ?>> <!-- untuk jawabanBenar -->
					<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>> <!-- untuk jumlah soal -->
					<div class="timeline-image">
						<h1 style="color: lightgrey;"><?php echo $urut=$urut+1; ?></h1> <!-- untuk menampilkan nomor -->
					</div>
					<div class="timeline-panel">
						<div class="timeline-heading">
							<h5>Kategori: <?php echo "$kategori"; ?></h5> <!-- untuk menampilkan kategori -->
							<h4 class="subheading"><?php echo "$soal"; ?></h4> <!-- untuk menampilkan soal -->
						</div>
						<div class="timeline-body">
							<p class="text-muted">
								<!-- untuk menampilkan pilihan jawaban -->
							    <b>A.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban1"> 
							      <?php echo "$pil1"; ?><br>
							    <b>B.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban2"> 
							      <?php echo "$pil2"; ?><br>
							    <b>C.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban3"> 
							      <?php echo "$pil3"; ?>
							      <br>
							</p>
						</div>
					</div>
				</li>

<!-- ======================================================================================================= -->

<?php } else {?> <!-- jika bukan genap -->

<!-- ======================================================================================================= -->

				<li class="timeline-inverted">
					<input type="hidden" name="id[]" value=<?php echo $id; ?>> <!-- untuk idPertanyaan -->
					<input type="hidden" name="kunci[]" value=<?php echo $kunci; ?>> <!-- untuk jawabanBenar -->
					<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>> <!-- untuk jumlah soal -->
					<div class="timeline-image">
						<h1 style="color: orange;"><?php echo $urut=$urut+1; ?></h1> <!-- untuk menampilkan nomor -->
					</div>
					<div class="timeline-panel">
						<div class="timeline-heading">
							<h5>Kategori: <?php echo "$kategori"; ?></h5> <!-- untuk menampilkan kategori -->
							<h4 class="subheading"><?php echo "$soal"; ?></h4> <!-- untuk menampilkan soal -->
						</div>
						<div class="timeline-body">
							<p class="text-muted">
								<!-- untuk menampilkan pilihan jawaban -->
							    <b>A.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban1"> 
							      <?php echo "$pil1"; ?><br>
							    <b>B.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban2"> 
							      <?php echo "$pil2"; ?><br>
							    <b>C.</b> <input name="pilihan[<?php echo $id; ?>]" type="radio" value="jawaban3"> 
							      <?php echo "$pil3"; ?>
							      <br>
							</p>
						</div>
					</div>
				</li>

<!-- ================================================================================================== -->
<?php } } ?> <!-- end of looping and else -->
<!-- ================================================================================================== -->
				<li class="timeline-inverted">
					<h4 align="center"><input type="submit" class="btn btn-primary" name="submit" value="Selesai" style="color: white; padding: 3em 3em; font-weight: bold; font-size: 14pt;" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></h4> <!-- button selesai untuk mengumpulkan jawaban -->
				</li>
</table>
</form>
			</ul>
    	</div>
    </div>
  </div>
</section>

        
<!-- footer -->
<footer id="gtco-footer" role="contentinfo" style="background-color: #1F1F1F;">
	<div class="gtco-container">		
		<div class="row copyright">
			<div class="col-md-12">
				<p class="pull-right">
					<small><h5 style="color: white;" align="right">&copy; 2017 AyoBelajarTI. All Rights Reserved.</h5></small> 
				</p>
			</div>
		</div>
	</div>
</footer>

<?php } else { ?> <!-- jika session username tidak terisi -->
	<script type="text/javascript">
		alert("Silahkan Login dulu");
	</script>
<?php header("Location: ../../index.php"); } ?>

</body>
</html>

<!-- file js yang dibutuhkan -->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>