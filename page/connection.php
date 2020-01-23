<?php
//koneksi ke database
$server = "localhost";
$usernames = "root";
$passwords = "";
// $database = "belajarti"; //nama_database
$database = "belajarti";

//membuat koneksi ke database
$mysqli = mysqli_connect($server, $usernames,$passwords, $database);

//check error. Jika error tutup koneksi dengan mysql
if(mysqli_connect_errno()){
	echo 'Koneksi gagal, ada masalah pada : '.mysqli_connect_error();
	exit();
	mysqli_close($mysqli); //menutup koneksi
}
?>