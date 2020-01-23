<?php
if(isset($_POST['key'])){ //jika inputan key terisi
  include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
  if($_POST['key']=='addnew'){ //jika key bernilai addnew
    $kategori = mysqli_escape_string($mysqli,$_POST['kategori']); //inisialisasi var kategori
    $hasilquery = mysqli_query($mysqli,"INSERT INTO kategori (kategori) VALUES ('$kategori')"); //memasukkan data ke tabel kategori
    exit('Data Kategori Berhasil Disimpan');
  }

  if($_POST['key']=='getData'){ //jika key bernilai getData
    //inisialisasi variabel
    $start = mysqli_escape_string($mysqli,$_POST['start']);
    $limit = mysqli_escape_string($mysqli,$_POST['limit']);

    //menampilkan data kategori dan menambahkan tombol edit dan delete di setiap baris
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM kategori LIMIT $start, $limit");
    if(mysqli_num_rows($hasilquery)){ 
      $response = "";
      while($data = mysqli_fetch_array($hasilquery)){
        $response .= '
          <tr>
            <td>'.$data['idKategori'].'</td>
            <td>'.$data['kategori'].'</td>
            <td>
            <input type="button" value="Edit" onclick="edit('.$data['idKategori'].')" class="btn btn-primary">
            <input type="button" value="Delete" onclick="dels('.$data['idKategori'].')" class="btn btn-danger">
            </td>
          </tr>
        ';
      }
      exit($response);
    }else {
      exit('limitMax');
    }
    exit('Data Kategori Berhasil Disimpan');
  }


  if($_POST['key']=='selectRow'){ //jika key bernilai selectRow
    $id = mysqli_escape_string($mysqli,$_POST['data']); //inisialisasi variabel

    //memilih dan menampilkan data dari tabel kategori sesuai dengan idKategori yang dipilih
    $hasilquery = mysqli_query($mysqli,"SELECT * FROM kategori WHERE idKategori = $id");
    if(mysqli_num_rows($hasilquery)){
      $data = mysqli_fetch_array($hasilquery);
      $temp = array(
        'id' => $data['idKategori'],
        'kategori' => $data['kategori']
      );
      exit(json_encode($temp));
    }
  }
  
  if($_POST['key']=='update'){ //jika key bernilai update
    //inisialisasi variabel
    $id = mysqli_escape_string($mysqli,$_POST['row']);
    $kategori =  mysqli_escape_string($mysqli,$_POST['kategori']);

    //mengupdate data di tabel kategori
    $hasilquery = mysqli_query($mysqli,"UPDATE kategori SET kategori='$kategori' WHERE idKategori='$id'");
    exit('Data Kategori Berhasil Diupdate');
  }

  if($_POST['key']=='delete'){ //jika key bernilai delete
    $id = mysqli_escape_string($mysqli,$_POST['data']); //inisialisasi variabel
    $hasilquery = mysqli_query($mysqli,"DELETE FROM kategori WHERE idKategori=$id"); //query untuk menghapus data kategori sesuai idKategori
    exit('Data Berhasil Dihapus');
  }
  mysqli_close($mysqli); //menutup koneksi
}
?> 