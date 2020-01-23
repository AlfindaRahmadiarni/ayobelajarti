<?php
if(isset($_POST['key'])){ //jika inputan key terisi
  include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
  if($_POST['key']=='addnew'){ //jika key bernilai addnew
    //inisialisasi variabel
    $soal = mysqli_escape_string($mysqli,$_POST['soal']);
    $kategori = mysqli_escape_string($mysqli,$_POST['kategori']);
    $jawaban1 = mysqli_escape_string($mysqli,$_POST['jawaban1']);
    $jawaban2 = mysqli_escape_string($mysqli,$_POST['jawaban2']);
    $jawaban3 = mysqli_escape_string($mysqli,$_POST['jawaban3']);
    $jawabanBenar = mysqli_escape_string($mysqli,$_POST['jawabanBenar']);

    $hasilquery = mysqli_query($mysqli,"INSERT INTO pertanyaan (soal, kategori, jawaban1, jawaban2, jawaban3, jawabanBenar) VALUES ('$soal', '$kategori', '$jawaban1', '$jawaban2', '$jawaban3', '$jawabanBenar')"); //memasukkan data ke tabel pertanyaan
    exit('Data Soal Berhasil Disimpan');
  }
  if($_POST['key']=='getData'){ //jika key bernilai getData
    //inisialisasi variabel
    $start = mysqli_escape_string($mysqli,$_POST['start']);
    $limit = mysqli_escape_string($mysqli,$_POST['limit']);

    //menampilkan data pertanyaan dan menambahkan tombol edit dan delete di setiap baris
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM pertanyaan LIMIT $start, $limit");
    if(mysqli_num_rows($hasilquery)){
      $response = "";
      while($data = mysqli_fetch_array($hasilquery)){
        $response .= '
          <tr>
            <td>'.$data['idPertanyaan'].'</td>
            <td>'.$data['soal'].'</td>
            <td>'.$data['kategori'].'</td>
            <td>'.$data['jawaban1'].'</td>
            <td>'.$data['jawaban2'].'</td>
            <td>'.$data['jawaban3'].'</td>
            <td>'.$data['jawabanBenar'].'</td>
            <td>
            <input type="button" value="Edit" onclick="edit('.$data['idPertanyaan'].')" class="btn table-responsive btn-primary">
            <input type="button" value="Delete" onclick="dels('.$data['idPertanyaan'].')" class="btn table-responsive btn-danger">
            </td>
          </tr>
        ';
      }
      exit($response);
    }else {
      exit('limitMax');
    }
    exit('Data User Berhasil Disimpan');
  }
  if($_POST['key']=='selectRow'){ //jika key bernilai selectRow
    $id = mysqli_escape_string($mysqli,$_POST['data']); //inisialisasi variabel

    //memilih dan menampilkan data dari tabel pertanyaan sesuai dengan idPertanyaan yang dipilih
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM pertanyaan WHERE idPertanyaan = $id");
    if(mysqli_num_rows($hasilquery)){
      $data = mysqli_fetch_array($hasilquery);
      $temp = array(
        'id' => $data['idPertanyaan'],
        'soal' => $data['soal'],
        'kategori' => $data['kategori'],
        'jawaban1' => $data['jawaban1'],
        'jawaban2' => $data['jawaban2'],
        'jawaban3' => $data['jawaban3'],
        'jawabanBenar' => $data['jawabanBenar']
      );
      exit(json_encode($temp));
    }
  }
  if($_POST['key']=='update'){ //jika key bernilai update
     //inisialisasi variabel
    $id = mysqli_escape_string($mysqli,$_POST['row']);
    $soal =  mysqli_escape_string($mysqli,$_POST['soal']);
    $kategori =  mysqli_escape_string($mysqli,$_POST['kategori']);
    $jawaban1 =  mysqli_escape_string($mysqli,$_POST['jawaban1']);
    $jawaban2 =  mysqli_escape_string($mysqli,$_POST['jawaban2']);
    $jawaban3 =  mysqli_escape_string($mysqli,$_POST['jawaban3']);
    $jawabanBenar =  mysqli_escape_string($mysqli,$_POST['jawabanBenar']);

    //mengupdate data di tabel pertanyaan
    $hasilquery = mysqli_query($mysqli,"UPDATE pertanyaan SET soal='$soal', kategori='$kategori', jawaban1='$jawaban1', jawaban2='$jawaban2', jawaban3='$jawaban3', jawabanBenar='$jawabanBenar' WHERE idPertanyaan='$id'");
    exit('Data Berhasil Diupdate');
  }
  if($_POST['key']=='delete'){ //jika key bernilai delete
    $id = mysqli_escape_string($mysqli,$_POST['data']); //inisialisasi variabel
    $hasilquery = mysqli_query($mysqli,"DELETE FROM pertanyaan WHERE idPertanyaan=$id"); //query untuk menghapus data pertanyaan sesuai idPertanyaan
    exit('Data Berhasil Dihapus');
  }
  mysqli_close($mysqli); //menutup koneksi
}
?> 