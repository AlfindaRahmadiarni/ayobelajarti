<?php
session_start(); //mengeset session
if(isset($_POST['logout'])){ //jika mensuubmit input bernama logout
	unset($_SESSION['username']); //unset session username
	header('location:../index.php'); //dialihkan ke halaman awal
}
?>