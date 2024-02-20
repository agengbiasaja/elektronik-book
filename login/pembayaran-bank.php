<?php include 'koneksi.php';
error_reporting(0); 
?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>
  <?php

require 'proses-beli.php';

if( isset($_POST["btn_simpan"])) {

  if( tambah($_POST) > 0) {
      echo "<script>
      alert('buku berhasil dibeli!');
      </script>";
  
  } else {
      echo mysqli_error($koneksi);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <!-- MY CSS -->
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/we-book/css/setel.css" />
     <style>
/* Google Fonts Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body{
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  
}
.product-card {
  position: relative;
  max-width: 1000px;
  width: 100%;
  border-radius: 25px;
  padding: 20px 30px 30px 30px;
  background: #fff;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
  z-index: 3;
  overflow: hidden;
}
.product-card .logo-cart{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.product-card .logo-cart img{
  height: 60px;
  width: 60px;
  object-fit: cover;
}
.product-card .logo-cart i{
  font-size: 27px;
  color: #707070;
  cursor: pointer;
  transition: color 0.3s ease;
}
.product-card .logo-cart i:hover{
  color: #333;
}
.product-card .main-images{
  position: relative;
  height: 210px;
}
.product-card .main-images img{
  position: absolute;
  height: 300px;
  width: 300px;
  object-fit: cover;

  left: 12px;
  top: -40px;
  z-index: -1;
  opacity: 0;
  transition: opacity 0.5s ease;
}
.product-card .main-images img.active{
  opacity: 1;
}
.product-card .shoe-details .shoe_name{
  font-size: 24px;
  font-weight: 500;
  color: #161616;
}
.product-card .shoe-details p{
  font-size: 12px;
  font-weight: 400;
  color: #333;
  text-align: justify;
}
.product-card .shoe-details .stars i{
  margin: 0 -1px;
  color: #333;
}
.product-card .color-price .color-option{
  display: flex;
  align-items: center;
}
.color-price{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}
.color-price .color-option .color{
  font-size: 18px;
  font-weight: 500;
  color: #333;
  margin-right: 8px;
}
.color-option  .circles{
  display: flex;
}
.color-option  .circles .circle{
  height: 18px;
  width: 18px;
  background: #0071C7;
  border-radius: 50%;
  margin: 0 4px;
  cursor: pointer;
  transition: all 0.4s ease;
}
.color-option  .circles .circle.blue.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #0071C7;
}
.color-option  .circles .circle.pink{
  background: #FA1795;
}
.color-option  .circles .circle.pink.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #FA1795;
}
.color-option  .circles .circle.yellow{
  background: #F5DA00;
}
.color-option  .circles .circle.yellow.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #F5DA00;
}
.color-price .price{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.color-price .price .price_num{
  font-size: 25px;
  font-weight: 600;
  color: #707070;
}
.color-price .price .price_letter{
  font-size: 30px;
  font-weight: 600;
  margin-top: -4px;
  color: #707070;
}
.product-card .button{
  position: relative;
  height: 50px;
  width: 100%;
  border-radius: 25px;
  margin-top: 30px;
  overflow: hidden;
}
.product-card .button .button-layer{
  position: absolute;
  height: 100%;
  width: 300%;
  left: -100%;
  background-image: linear-gradient(135deg,#9708CC, #43CBFF,#9708CC, #43CBFF );
  transition: all 0.4s ease;
  border-radius: 25PX;
}
.product-card .button:hover .button-layer{
  left: 0;
}
.product-card .button button{
  position: relative;
  height: 100%;
  width: 100%;
  background: none;
  outline: none;
  border: none;
  font-size: 18px;
  font-weight: 600;
  letter-spacing: 1px;
  color: #fff;
}

.bo{
  position: absolute;
  top: 20px;
  right: 25px;

}

     </style>
    <title>Document</title>
</head>
<body>




<?php

function query($query){
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
  }
  return $rows;
}
$kode_buku = $_GET['kode_buku'];
$username = $_SESSION['username'];

//ambil data
$ageng = query("SELECT * FROM buku WHERE kode_buku = $kode_buku")[0];

 ?>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow p-1 mb-5 bg-body-tertiary rounded fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand fs-1 navbar-brand lg-5" href="halaman_pembeli.php">WE-BOOK</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-1 mb-lg-0">
			<li class="nav-item">
			<a class="nav-link active" aria-current="page" href="halaman_pembeli.php">Home</a>
</li>
          </ul>
        </li>
      </ul>
		<a class="navbar-brand" href="logout.php">LOGOUT <i class="bi bi-box-arrow-left"></i></a>
			
	</div>

</nav>
<br><br><br><br>
<!--akhir navbar-->
<!--akhir navbar-->



<div class="product-card">
  <div class="logo-cart">
    
    <i class='bx bx-shopping-bag'></i>
  </div>
  <div class="main-images">
    <img id="blue" class="blue active" src="../images/bri.png" alt="blue">
    <img id="pink" class="pink" src="../images/bca.png" alt="blue" >
    <img id="yellow" class="yellow" src="../images/mandiri.png" alt="blue">
  </div>

  
  <div class="shoe-details">
    <div class="bo">
      
      
         <form action="" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="kode_buku" value="<?= $ageng["kode_buku"]; ?>">
        <input type="hidden" name="username" value="<?= $username; ?>">
        
                <div class="row mb-3">    
                <label class="col-sm-4 col-form-label ">Dari Bank</label>
                <div class="col-sm-6">
                <input class="form-control" type="text" name="dari_bank" autocomplete="off" required="required"/>
                </div>
                </div>

                <div class="row mb-3">    
                <label class="col-sm-4 col-form-label ">Dari no rekening</label>
                <div class="col-sm-6">
                <input class="form-control" type="text" name="dari_rekening" autocomplete="off" required="required"/>
                </div>
                </div>

                <div class="row mb-3">    
                <label class="col-sm-4 col-form-label ">Nama pemilik</label>
                <div class="col-sm-6">
                <input class="form-control" type="text" name="nama_pemilik" autocomplete="off" required="required"/>
                </div>
                </div>

                <div class="row mb-3">    
                <label class="col-sm-4 col-form-label ">Upload bukti pembayraan</label>
                <div class="col-sm-6">
                <input  class="form-control" type="file" name="foto_bukti">
                </div>
                </div><br><br>
                <input class="btn btn-success" type="submit" name="btn_simpan" value="BAYAR"/>
  

        </form>
</div>
<br>
    <div class="stars">
      <i class='bx bxs-star' ></i>
      <i class='bx bxs-star' ></i>
      <i class='bx bxs-star' ></i>
      <i class='bx bxs-star' ></i>
      <i class='bx bx-star' ></i>
    </div>
  </div>
  <div class="color-price">
    <div class="color-option">
      <span class="color">Pilih:</span>
      <div class="circles">
        <span class="circle blue active"  id="blue"></span>
        <span class="circle pink " id="pink"></span>
        <span class="circle yellow " id="yellow"></span>
      </div>
    </div>
    <div class="price">
    
<?php
    $dimas = query("SELECT * FROM buku WHERE kode_buku = '".$_GET['kode_buku']."' ");
?>
        <?php foreach( $dimas as $row) : ?>	
      <span class="price_num">Total</span>
      <span class="price_letter">Rp. <?= $row['harga_buku'] ?></span>
      <?php endforeach; ?>
    </div>
  </div>
  
    




<script>
  let circle = document.querySelector(".color-option");

circle.addEventListener("click", (e)=>{
  let target = e.target;
  if(target.classList.contains("circle")){
    circle.querySelector(".active").classList.remove("active");
    target.classList.add("active");
    document.querySelector(".main-images .active").classList.remove("active");
    document.querySelector(`.main-images .${target.id}`).classList.add("active");
  }
});
</script>
</body>
</html>