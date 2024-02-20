<?php include 'koneksi.php'; 
?>
 <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>
<!doctype html>
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
     <link rel="stylesheet" href="/we-book/css/setel.css" />
    <title>We-Book</title>
  </head>

  <style>
    /* Google Fonts Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
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

  <body style="height:px">
 
 
  <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow p-1 mb-5 bg-body-tertiary rounded fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand fs-1 navbar-brand lg-5" href="#">WE-BOOK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" aria-current="page" href="pustaka.php">Library</a>
        </li>
        
        <!--dropdown-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jenis Buku
          </a>
          <ul class="dropdown-menu">
          <div class="dropdown-content">
          <?php 
		  
      $kategori = mysqli_query($koneksi, "SELECT * FROM jenis ORDER BY id_jenis DESC");
      if(mysqli_num_rows($kategori) > 0){
        while($k = mysqli_fetch_array($kategori)){
    ?>
            <a href="data-buku1.php?id_jenis=<?php echo $k['id_jenis'] ?>">
          <p><?php echo $k['nama_jenis'] ?></p>
      </a>
    <?php }}else{ ?>
      <p>Kategori tidak ada</p>
    <?php } ?>
    </div>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
      </ul>
  
      
  <form class="d-flex" role="search" action="data-buku.php">
  <a data-bs-toggle="modal" data-bs-target="#exampleModal"class="navbar-brand" href="logout.php">LOGOUT <i class="bi bi-box-arrow-left"></i></a>
        <input class="form-control me-2" type="search" name="search" placeholder="masukan pencarian..." aria-label="off">
        <button class="btn btn-success" type="submit" name="cari">Search</button>
      </form>
    </div>
  </div>
</nav>
<br><br><br>
<!--akhir navbar-->
<br></br>


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
?>

<div class="section">
	<div class="container">
		<h3>Buku Terbaru</h3>
		
		<?php 
					$dimas = query("SELECT * FROM buku ORDER BY kode_buku DESC LIMIT 100");
					?>

					<?php foreach( $dimas as $row) : ?>	
					<a href="detail-buku.php?kode_buku=<?= $row['kode_buku'] ?>">
						<div class="col-4">
							<img src="gambar buku/<?= $row['gambar_buku'] ?>">
							<p class="nama"><?= $row['judul_buku'] ?></p>
							<p class="harga">Rp. <?= $row['harga_buku'] ?></p>
						</div>
					</a>
					<?php endforeach; ?>

		</div>
	</div>
</div>
<br><br><br><br>
<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-white">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Kunjungi sosial media kami:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
      <i class="bi bi-facebook"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="bi bi-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="bi bi-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="bi bi-instagram"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>Company name
          </h6>
          <p>
            <h6>WE-BOOK</h6> Sebuah website penyedia berbagai macam buku
            digital dan berbagai macam kategori yang tersedia.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a class="text-reset">Buku free</a>
          </p>
          <p>
            <a class="text-reset">Novel</a>
          </p>
          <p>
            <a class="text-reset">Komik</a>
          </p>
          <p>
            <a class="text-reset">Pendidikan</a>
          </p>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p>
            <i class="bi bi-envelope me-3 text-secondary"></i>
            WEBOOK@gmail.com
          </p>
          <p><i class="bi bi-phone me-3 text-secondary"></i> +62 963 721 6593</p>
          <p><i class="bi bi-phone me-3 text-secondary"></i> +62 963 721 6593</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">WE-BOOK</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer --> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin Log Out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <a class="btn btn-primary" class="btn btn-danger" href="logout.php" role="button">Yakin</a>
      </div>
    </div>
  </div>
</div>	
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>


</body>  
</html>

