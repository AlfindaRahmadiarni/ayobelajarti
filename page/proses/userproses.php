<?php
if(isset($_POST['key'])){ //jika inputan key terisi
  include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
  if($_POST['key']=='addnew'){ //jika key bernilai addnew
    //inisialisasi variabel
    $username = mysqli_escape_string($mysqli,$_POST['username']);
    $password = mysqli_escape_string($mysqli,sha1($_POST['password']));
    $nama = mysqli_escape_string($mysqli,$_POST['nama']);
    $level = mysqli_escape_string($mysqli,$_POST['level']);

    //memasukkan data ke tabel kategori
    $hasilquery = mysqli_query($mysqli,"INSERT INTO user (username, password, nama, level) VALUES ('$username', '$password', '$nama', '$level')"); 
    exit('Data User Berhasil Disimpan');
  }
  if($_POST['key']=='getData'){ //jika key bernilai getData
    //inisialisasi variabel
    $start = mysqli_escape_string($mysqli,$_POST['start']);
    $limit = mysqli_escape_string($mysqli,$_POST['limit']);

    //menampilkan data user dan menambahkan tombol edit dan delete di setiap baris
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM user LIMIT $start, $limit");
    if(mysqli_num_rows($hasilquery)){
      $response = "";
      while($data = mysqli_fetch_array($hasilquery)){
        $response .= '
          <tr>
            <td>'.$data['idUser'].'</td>
            <td>'.$data['username'].'</td>
            <td>'.$data['password'].'</td>
            <td>'.$data['nama'].'</td>
            <td>'.$data['level'].'</td>
            <td>
            <input type="button" value="edit" onclick="edit('.$data['idUser'].')" class="btn table-responsive btn-primary">
            <input type="button" value="delete" onclick="dels('.$data['idUser'].')" class="btn table-responsive btn-danger">
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

    //memilih dan menampilkan data dari tabel user sesuai dengan idUser yang dipilih
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM user WHERE idUser = $id");
    if(mysqli_num_rows($hasilquery)){
      $data = mysqli_fetch_array($hasilquery);
      $temp = array(
        'id' => $data['idUser'],
        'username' => $data['username'],
        'password' => $data['password'],
        'nama' => $data['nama'],
        'level' => $data['level']
      );
      exit(json_encode($temp));
    }
  }
  if($_POST['key']=='update'){ //jika key bernilai update
    //inisialisasi variabel
    $id = mysqli_escape_string($mysqli,$_POST['row']);
    $username =  mysqli_escape_string($mysqli,$_POST['username']);
    $password =  mysqli_escape_string($mysqli,sha1($_POST['password']));
    $nama =  mysqli_escape_string($mysqli,$_POST['nama']);
    $level =  mysqli_escape_string($mysqli,$_POST['level']);

    //mengupdate data di tabel user
    $hasilquery = mysqli_query($mysqli,"UPDATE user SET username='$username', password='$password', nama='$nama', level='$level' WHERE idUser='$id'");
    exit('Data Berhasil Diupdate');
  }
  if($_POST['key']=='delete'){ //jika key bernilai delete
    $id = mysqli_escape_string($mysqli,$_POST['data']); //inisialisasi variabel
    $hasilquery = mysqli_query($mysqli,"DELETE FROM user WHERE idUser=$id"); //query untuk menghapus data kategori sesuai idKategori
    exit('Data Berhasil Dihapus');
  }
  mysqli_close($mysqli); //menutup koneksi
}
?> 