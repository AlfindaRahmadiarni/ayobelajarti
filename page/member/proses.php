<?php
include '../connection.php'; //memanggil file connection.php untuk koneksi ke database
session_start(); //memulai session
if(isset($_SESSION['username'])){ //jika session username terisi

if(isset($_POST['submit'])){ //jikamemilih inputan bernama submit
	//inisialisasi variabel
	$pilihan=$_POST['pilihan'];
	$id=$_POST['id'];
	$jumlah=$_POST['jumlah'];
	$kunci=$_POST['kunci'];
	
	$score=0;
	$benar=0;
	$salah=0;
	$kosong=0;

	//deklarasi array
	$idP = array();
	$jwb = array();
	$jwbBenar = array();
	$stt = array();

	for ($i=0;$i<$jumlah;$i++){ //looping sejumlah nilai jumlah
		$nomor=$id[$i]; //var menampung idPertanyaan 
		$kunciJawaban=$kunci[$i]; //var untuk menampung kunci jawaban
		
		if (empty($pilihan[$nomor])){ //jika user tidak memilih jawaban
			$kosong++; //menambah 1 nilai dari variabel kosong
		}else{ //jika jawaban tidak kosong
			$jawaban=$pilihan[$nomor]; //var untuk menampung jawaban user
				
			//membuat query baru untuk memilih data di database
			$query=mysqli_query($mysqli, "SELECT * FROM pertanyaan WHERE idPertanyaan='$nomor' and jawabanBenar='$jawaban'");
			
			$cek=mysqli_num_rows($query); //mencocokkan jawabanBenar dengan jawaban user
			
			if($cek){
				//jika jawaban cocok, maka menambah 1 nilai dari var benar
				$benar++;
			}else{
				//jika salah, maka menambah 1 nilai dari var salah
				$salah++;
			}

			if($jawaban == $kunciJawaban){ //jika jawaban user dan jawabanBenar sama
				$status = 1; //isi var status dengan nilai 1
			} else { //jika jawaban tidak sama
				$status = 0; //isi var status dengan nilai 0
			}
					
			//inisialisasi array
			$idP[$i] = $nomor;
			$jwb[$i] = $jawaban;
			$jwbBenar[$i] = $kunciJawaban;
			$stt[$i] = $status;
		} 

		$score = $benar*20; //perhitungan score
		date_default_timezone_set('Asia/Jakarta'); //mengatur waktu sesuai daerah jakarta
		$tanggal = date("Y-m-d H:i:s"); //inisialisasi var tanggal
		$uname = $_SESSION['username']; //inisialisasi var uname
	}

	//membuat query untuk memasukkan data ke database
	$hasilquery = mysqli_query($mysqli,"INSERT INTO record(username, tanggal, benar, salah, kosong, score) VALUES 
				('$uname', '$tanggal', '$benar', '$salah','$kosong', '$score')");

	//mengambil nilai score di table user
	$skor = mysqli_query($mysqli,"SELECT * FROM user WHERE username = '$uname'");
	if(mysqli_num_rows($skor)){
		while ($data = mysqli_fetch_array($skor)){
			$dataskor = $data['score'];
			$datawin = $data['win'];
		}
	}

	if($benar == 5){
		$win = 1;
	} else {
		$win = 0;
	}
	
	//mengupdate kolom scoredi table user dengan menambahkannya dengan skor yang baru
	$hasilquery2 = mysqli_query($mysqli,"UPDATE user SET score = '$dataskor'+'$score', win = '$datawin' + '$win' WHERE username = '$uname'");
}

//mengambil nilai idRecord yang paling baru
$record = mysqli_query($mysqli,"SELECT idRecord FROM record WHERE tanggal='$tanggal'");
$idRecord = mysqli_fetch_array($record);

	//membuat query untuk menyimpan data ke tabel detailrecord
	$queryDetail= 'INSERT INTO detailrecord(idRecord, idPertanyaan, jawaban, jawabanBenar, status) VALUES ';
	for($i=0;$i<5;$i++){
		$queryDetail .= '('.$idRecord['idRecord'].', '.$idP[$i].', "'.$jwb[$i].'", "'.$jwbBenar[$i].'", '.$stt[$i].')';
		if($i < 4){
			$queryDetail .= ',';
		} else {
			$queryDetail .= ';';
		}
	}

	//melakukan Penyimpanan Kedalam Database
	$detail = mysqli_query($mysqli, $queryDetail);

	header('Location: score.php'); //diarahkan ke file score.php
} else { ?> <!-- jika session username tidak terisi -->
	<script type="text/javascript">
		alert("Silahkan Login dulu");
	</script>

<?php header("Location: ../../index.php"); } ?>
		
