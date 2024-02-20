<?php include '../../koneksi.php'; ?>
<?php 
require 'proses-ubah.php';
$produk = mysqli_query($koneksi, "SELECT * FROM jenis WHERE id_jenis = '".$_GET['id_jenis']."' ");
$p = mysqli_fetch_object($produk);

if( isset($_POST["btn_ubah"])) {

    if( ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'data-jenis-buku-admin.php';
        </script>";
    
    } else {
        echo mysqli_error($koneksi);
    }
}
error_reporting(0);
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['admin'])){
		header("location:../../login.php");
		exit;
	}
 
	?>


<!DOCTYPE html>
<html>
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
    <title>Update</title>
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
</head>
<body>
	
	 
    <br>
	<form action="" method="post" enctype="multipart/form-data"> 
            <fieldset>
            <div class="product-card ">
            <div class="container col-xl-10">
                        
                            <h5>update Jenis Buku</h5>
                            <div class="card-body">
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">Jenis Buku</label>
                <div class="col-sm-5"> 
                <input type="hidden" name="id_jenis" value="<?php echo $p->id_jenis ?>"/>
                <input class="form-control" type="text" name="nama_jenis" required="required" value="<?php echo $p->nama_jenis ?>"/>
</div>
</div>            
                <label>
                <a class="btn btn-secondary" href="data-jenis-buku-admin.php"  role="button">kembali</a>
                    <input class="btn btn-success" type="submit" name="btn_ubah" value="Simpan"/>
                </label>
                <br>
            </fieldset>
        </form>
</body>
</html>