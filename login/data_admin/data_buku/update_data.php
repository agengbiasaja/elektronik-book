<?php include '../../koneksi.php'; ?>
<?php 
	

require 'proses-ubah.php';

$produk = mysqli_query($koneksi, "SELECT * FROM buku WHERE kode_buku = '".$_GET['kode_buku']."' ");
$p = mysqli_fetch_object($produk);

//cek button

if( isset($_POST["btn_ubah"])) {

    if( ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'data-buku-admin.php';
        </script>";
    
    } else {
        echo mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html>
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
<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- MY CSS -->
     <link rel="stylesheet" href="style.css" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
</head>
<body>
	
	 <br>
	<form action="" method="post" enctype="multipart/form-data"> 
            <fieldset>

            <div class="product-card ">
            <div class="container col-xl-10">
                <legend><h5>Tambah data</h5></legend>
                <div class="card-body">
                <input type="hidden" name="kode_buku" value="<?php echo $p->kode_buku ?>">
                <input type="hidden" name="gambar_lama" value="<?php echo $p->gambar_buku ?>">
                <input type="hidden" name="file_lama" value="<?php echo $p->file_buku ?>">


              


                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">judul buku</label>
                <div class="col-sm-5">
                <input class="form-control" type="text" name="judul_buku" autocomplete="off" required="required" value="<?php echo $p->judul_buku ?>"/>
				</div>
                </div>

                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">penerbit</label>
                <div class="col-sm-5">
                <input class="form-control" type="text" name="penerbit" autocomplete="off" required="required" value="<?php echo $p->penerbit ?>"/>
                </div>
                </div>

                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">penulis</label>
                <div class="col-sm-5">    
                <input class="form-control" type="text" name="penulis" autocomplete="off" required="required" value="<?php echo $p->penulis ?>"/>
				</div>
                </div>

               
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">Jenis Buku</label>
                <div class="col-sm-5"> 
                <select name="id_jenis" class="form-control" required>
					<option align="center" value="">--pilih--</option>	
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM jenis ORDER BY id_jenis DESC");
                    while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['id_jenis'] ?>" <?php echo ($r['id_jenis'] == $p->id_jenis)? 'selected':''; ?>><?php echo $r['nama_jenis'] ?></option>
                        <?php } ?>
				</select>
                    </div>
                    </div>

                <div class="row mb-3">
				<label class="col-sm-2 col-form-label ">tahun terbit</label>
                <div class="col-sm-5">    
                <input class="form-control" type="year" name="tahun_terbit" autocomplete="off" required="required" value="<?php echo $p->tahun_terbit?>"/></label> 
				</div>
                </div>
                
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label ">harga buku</label>
                <div class="col-sm-5">   
                <input class="form-control" type="text" name="harga_buku"  autocomplete="off" required="required" value="<?php echo $p->harga_buku ?>"/></label> 
				</div>
				</div>

                <label class="col-sm-2 col-form-label">gambar buku </label>
                <img src="../../gambar buku/<?php echo $p->gambar_buku ?>" width="50">
                <div class="col-sm-5"> 
                <input class="form-control" type="file" name="gambar_buku"  value="<?php echo $p->gambar_buku ?>"/> 
				</div>
                </div> 

                <label  class="col-sm-2 col-form-label">file buku</label> 
                <label ><?php echo $p->file_buku ?>"</label> 
                <div class="col-sm-5"> 
                <input  class="form-control" type="file" name="file_buku" value="<?php echo $p->file_buku ?>"/> 
				<br></br>            
                <label>
                <a class="btn btn-secondary" href="data-buku-admin.php" role="button">kembali</a>
                    <input class="btn btn-success" type="submit" name="btn_ubah" value="Simpan"/>
                </label>
                <br>
            </fieldset>
        </form>
        <div>
    <div>
</div>
</body>
</html>