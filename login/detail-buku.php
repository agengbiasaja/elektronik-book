<?php include 'koneksi.php'; ?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>


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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail buku|WE-book</title>
	<link rel="stylesheet" type="text/css" href=".../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
		
        .col-2 {
	width: 50%;
	min-height: 200px;
	padding:10px;
	box-sizing: border-box;
	float: left;
}
.col-2 img {
	border:1px solid #f9f9f9;
	padding:5px;
	box-sizing: border-box;
}
.col-2 h3 {
	margin-bottom: 10px;
}
.col-2 h4 {
	color: #C70039;
}
.col-2 p {
	margin:15px 0;
	text-align: justify;
	line-height: 25px;
	font-size:14px;
}


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
<br><br><br><br><br>
<!--akhir navbar-->

	<!-- product detail -->
	<div class="product-card ">
            <div class="container col-xl-15">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
                <?php

                      $dimas = query("SELECT * FROM buku WHERE kode_buku = '".$_GET['kode_buku']."' ");

                       ?>
                    <?php foreach( $dimas as $row) : ?>
					<img src="gambar buku/<?= $row['gambar_buku'] ?>" width="50%">
				</div>
				<div class="col-2">
					<h3><?= $row['judul_buku'] ?></h3>
					<h4>Rp. <?= $row['harga_buku'] ?></h4>
                    <h4>penulis: <?= $row['penulis'] ?></h4>
                    <h4>penerbit: <?= $row['penerbit'] ?></h4>
                    <h4>diterbitkan tahun: <?= $row['tahun_terbit'] ?></h4>
					<a class="btn btn-success" href="pembayaran-bank.php?kode_buku=<?= $row["kode_buku"]; ?>"role="button">BELI</a>

					
                    <?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

	
</body>
</html>