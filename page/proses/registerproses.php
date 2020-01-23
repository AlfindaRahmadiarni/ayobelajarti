<?php
include ("../connection.php");//memanggil file koneksi.php untuk koneksi dengan database
session_start(); //memulai session

if(isset($_POST["register"])){ //jika mensubmit inputan bernama register
	
	// membuat dan mengisi variabel berdasarkan isi dari inputan
	$uname = $_POST['uname']; 
	$pwd = sha1($_POST['pwd']);
	$nama = $_POST['nama'];

	//memilih semua username dari table user
	$query = mysqli_query($mysqli, "SELECT username FROM user WHERE username='$uname'");

	//menambahkan query sql untuk memasukkan data ke database
	$data = mysqli_query($mysqli, "INSERT INTO user (username, password, nama) VALUES ('$uname', '$pwd', '$nama')"); 

	//melakukan pengecekan dengan sql query
	 if(mysqli_num_rows($query)){
	 	while($row=mysqli_fetch_assoc($query)){ 
	 		exit('uname ada'); 
	 	}	
	}
	//untuk mengetahui apakah data berhasil disimpan atau tidak
	if($data){ 
		$_SESSION['username'] = $uname; 
		$_SESSION['level'] = "0";//mengisi session username
		exit('Register Berhasil. Silahkan Login untuk berpindah ke halaman selanjutnya');
	} else {
		exit('Gagal');
	}
} 
?>