<?php 
include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
session_start(); //memulai session
	if(isset($_SESSION['username'])){ //jika session username tidak kosong
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ayo Belajar TI</title> <!-- judul tab -->

	<!-- file css yang dibutuhkan -->
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<style type="text/css">
		/*h1*/
		h1{ 
			color:darkgrey;
			text-align: center;
			font-family: 'arial';
		}
	</style>
</head>
<body style="background-color: #272822"> <!-- mengubah warna background -->
	<?php
	echo "<br><h1>Hai, ".$_SESSION['username']."</h1>";

	//mengambil nilai idRecord maksimal dari tabel record
	$record = mysqli_query($mysqli,"SELECT MAX(idRecord) from record where username='$_SESSION[username]'");
	$idRecord = mysqli_fetch_row($record); //menyimpan nilai $record

	//memilih semua data dari idRecord paling terakhir
	$query = mysqli_query($mysqli, "SELECT * FROM record where idRecord = '$idRecord[0]'");
	while ($show = mysqli_fetch_array($query)){ //menampilkan nilai dari beberap kolom di tabel record
	    echo "<br><a class='btn btn-primary btn-block'><h2>Score Anda : ".$show['score']."</h2></a>";
	    echo "<br><h1>Total Jawaban Benar : ".$show['benar'];
	    echo "<br><br>Total Jawaban Salah : ".$show['salah'];
	    echo "<br><br>Total Jawaban Kosong: ".$show['kosong']."</h1><br><br>";
	    echo "<a class='btn btn-primary btn-block' href='member.php'><h3>OK</h3></a><br><br><br>";
	  }
} else { ?> <!-- jika session username tidak terisi -->
	<script type="text/javascript">
		alert("Silahkan Login dulu");
	</script>
<?php header("Location: ../../index.php"); } ?>
</body>
</html>
