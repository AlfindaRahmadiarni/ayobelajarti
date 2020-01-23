<?php
//mengeset session
session_start();

if(isset($_SESSION['username'])){ //jika session username terisi, maka
	if($_SESSION['level'] == '1'){ //jika session level berisi 1,
		header("Location: page/admin/admin.php"); //maka dialihkan ke halaman awal admin
	} else { //jika bukan berisi 1,
		header("Location: page/member/member.php"); //maka akan dialihkan ke halaman awal member
	}
	
} else { //jika session username tidak terisi, maka jalankan perintah dibawah ini
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ayo Belajar TI</title> <!-- judul tab -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- font yang digunakan -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- File CSS yang digunakan -->
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>


<!-- Sintak css untuk memodifikasi tampilan -->
	<style type="text/css">
	/*untuk tampilan home*/
	.gtco-cover .display-t, .gtco-cover .display-tc { 
		height: 610px;
    	display: table;
    	width: 100%;
	}
	/*untuk mengatur besar jarak di tiap content menu*/
	#gtco-features, #gtco-features-2, #gtco-testimonial, #gtco-services, #gtco-subscribe, #gtco-footer, .gtco-section {
    	padding: 2em 0;
    	clear: both;
	}
	/*untuk mengatur jarak tulisan yang ada di home*/
	.jarak{
		padding: 6em 0 0 0;
	}
	/*untuk mengatur tampilan body secara umum*/
	body {
	    font-family: "Raleway", Arial, sans-serif;
	    font-weight: 400;
	    font-size: 14px;
	    line-height: 1.7;
	    color: #828282;
	    background: #fff;
	}
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
	/*untuk mengatur tampilan h1-h5*/
	h1, h2, h3, h4, h5, h6, figure {
	    color: 212529;
	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	    font-weight: 350;
	    margin: 0 0 20px 0;
	}
	</style>
	</head>
	<body>
	<div class="gtco-loader"></div> <!-- untuk menampilkan efek loader--> 

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
						<li class="active" style="text-transform: uppercase;"><a href="#gtco-header">HOME</a></li>
						<li><a href="#menuregister" data-toggle="modal">REGISTER</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- untuk home -->
		<header id="gtco-header" class="gtco-cover gtco-cover-lg" role="banner" style="background-image:url(images/header.jpg);">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<div class="jarak">
									<h1 style="color: #F2F2F2;">Let's Learn IT</h1>
									<h3 style="color: #ABB1BA;">Because sometimes programming is much more interesting than gaming</h3>
									<p><a href="#menulogin" data-toggle="modal" class="btn btn-primary btn-lg">Login</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- untuk footer -->
		<footer id="gtco-footer" role="contentinfo">
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

	<!-- untuk menampilkan simbol kembali ke atas -->
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>


<!-- modal untuk login -->
<div class="modal fade" id="menulogin" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">User Login</h4>
			</div>
			<div class="modal-body">
				<label for="username">Username</label>
				<input class="form-control" id="username" name="username" type="text" aria-describedby="nameHelp" placeholder="Enter Your Username">
				<label for="password">Password</label>
				<input class="form-control" id="password" name="password" type="password" aria-describedby="nameHelp" placeholder="Enter Your Password">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit" id="login">Login</button>
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<div class="row col-md-6">
					<div class="errormess">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal untuk register -->
<div class="modal fade" id="menuregister" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Register Form</h4>
			</div>
			<div class="modal-body">
				<label for="username">Username</label>
				<input class="form-control" id="uname" name="uname" type="text" aria-describedby="nameHelp" placeholder="Enter Your Username">
				<label for="password">Password</label>
				<input class="form-control" id="pwd" name="pwd" type="password" placeholder="Enter Your Password">
				<label for="Name">Name</label>
				<input class="form-control" id="nama" name="nama" type="text" aria-describedby="nameHelp" placeholder="Enter Your Name">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit" id="register">Register</button>
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<div class="row col-md-6">
					<div class="errormess">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>
	
	<!-- File javascript yang dibutuhkan -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript">

// javascript yang akan dijalankan ketika menekan tombol login
	$(document).ready(function() {
	  $("#login").on('click', function() {
		 var username = $("#username").val(); //inisialisasi variabel username
		if (username === "") { //pengecekan isi variabel username
		   $('.errormess').html('Please Insert Your Username');	
	       return false;
	    }
		var password = $("#password").val(); //inisialisasi var password
		if (password === "") {
		   $('.errormess').html('Please Insert Your Password');	
	       return false;
	    }

	    // ajax untuk autentikasi user
		$.ajax({
		      method: "POST",
		      url: 'page/proses/loginprocess.php',
		      dataType: "text",
		      data: {
		      	login: 'login',
		      	username: username,
		      	password: password
		      },
		      success: function(data) {
			  if (data==='Login Failed') {
			  	$('.errormess').html('Wrong Login Data'); //jika salah login
			  } 
			  if(data === 'admin'){	
				document.location.href = 'page/admin/admin.php'; //jika login sebagai admin
			  } 
			  if(data === 'member'){
				document.location.href = 'page/member/member.php'; //jika login sebagai member
			}
		    }
		});
	  });
	});
</script>


<script type="text/javascript">
	// javascript yang dijalankan ketika menekan tombol register
	$(document).ready(function() {
	  $("#register").on('click', function() {
		var uname = $("#uname").val(); //inisialisasi var uname
		if (uname === "") { //jika variabel uname bernilai kosong
		   $('.errormess').html('Please Insert Your Username');	
	       return false;
	    }

		var pwd = $("#pwd").val(); //inisialisasi var pwd
		if (pwd === "") { //jika variabel pwd bernilai kosong
		   $('.errormess').html('Please Insert Your Password');	
	       return false;
	    }
	    var nama = $("#nama").val(); //inisialisasi var nama
		if (nama === "") { //jika var nama bernilai kosong
		   $('.errormess').html('Please Insert Your Name');	
	       return false;
	    }

// ajax untuk mendaftar akun baru
		$.ajax({
		      method: "POST",
		      url: 'page/proses/registerproses.php',
		      dataType: "text",
		      data: {
		      	register: 'register',
		      	uname: uname,
		      	pwd: pwd,
		      	nama: nama
		      },
		      success: function(data) {
			  if (data==='Gagal') { //jika exit di registerproses.php bernilai Gagal
			  	$('.errormess').html('Gagal Mendaftar. Silahkan coba lagi');
			  } else if(data==='uname ada'){ //jika exit di registerproses.php bernilai uname ada
				alert("Maaf, Username sudah digunakan. Mohon gunakan username yang lain");
			  } else { //jika tidak memenuhi kondisi, maka akan diarahkan ke halaman member
			  	document.location.href = 'page/member/member.php';
			  }
		    }
		});
	  });
	});
	</script>
	</body>
</html>