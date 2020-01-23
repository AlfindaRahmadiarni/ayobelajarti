<?php  
session_start(); //memulai session
// $connect = mysqli_connect("localhost", "root", "", "belajarti"); //koneksi ke database
include "../connection.php";
 if(isset($_POST['login'])){ //jika memilih login
 	//inisialisasi variabel
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	if($username != "" and $password  != ""){ //jika var username dan password tidak kosong
		//membuat query untuk memilih data di database
		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level='1'";
		$hasilquery = mysqli_query($mysqli, $query); //mengambil nilai sesuai hasil query

		//membuat query2 untuk memilih data di database
		$query2 = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level='0'";
		$hasilquery2 = mysqli_query($mysqli, $query2); //mengambil nilai sesuai hasil query2

		// jika memenuhi query
		 if(mysqli_num_rows($hasilquery)){
		 	while($row=mysqli_fetch_assoc($hasilquery)){
		 		$_SESSION['username'] = $username;
		 		$_SESSION['level'] = '1';
		 		exit('admin');
		 	}	
		} else if(mysqli_num_rows($hasilquery2)){ //jika memenuhi query2
			while($row=mysqli_fetch_assoc($hasilquery2)){
		 		$_SESSION['username'] = $username;
		 		$_SESSION['level'] = '0';
		 		exit('member');
		 	}	
		} else { //jika tidak sesuai dengan query dan query2
			exit('Login Failed');
		}
	}
}
?>  