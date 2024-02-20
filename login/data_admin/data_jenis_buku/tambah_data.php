<?php include '../../koneksi.php'; ?>
<?php 
error_reporting(0);
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['admin'])){
		header("location:../../login.php");
		exit;
	}
 
	?>
<?php

require 'proses-tambah.php';

if( isset($_POST["btn_simpan"])) {

    if( tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil ditambahkan!');
        </script>";
    
    } else {
        echo mysqli_error($koneksi);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <!-- MY CSS -->
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

        .product-card {
  position: absolute;
  right:170px;
  max-width: 1000px;
  width: 100%;
  border-radius: 25px;
  padding: 20px 30px 30px 30px;
  background: #fff;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
  z-index: 3;
  overflow: hidden;
}
</style>
<body>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <br>
    <form action="" method="post" enctype="multipart/form-data">

            <fieldset>
                <div class="product-card ">
            <div class="container col-xl-10">
                        
                            <h5>Tambah Jenis Buku</h5>
                            <div class="card-body">

                <div class="row mb-3">
                <label  class="col-sm-2 col-form-label ">Jenis Buku</label>
                <div  class="col-sm-5"> 
                <input class="form-control" type="text" name="nama_jenis" autocomplete="off" required="required"/>
                </div>               
                </div>               
                <label>                     
                    <a class="btn btn-secondary" href="data-jenis-buku-admin.php" role="button">kembali</a>
                    <input class="btn btn-success" type="submit" name="btn_simpan" value="Simpan"/>
                </label>
                <br>
            </fieldset>
        </form>

</body>
</html>