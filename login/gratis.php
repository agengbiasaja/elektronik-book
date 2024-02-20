<?php
include 'koneksi.php';
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
     <link rel="stylesheet" href="/we-book/css/setel.css" />
    <title>Produk Gratis</title>
  </head>
  
<style>
		    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
}
</style>

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
?>

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
          <a class="nav-link active" aria-current="page" href="halaman_pembeli.php">Home</a>
        </li>
		</div>
	  </div>
	</nav>
	<br><br><br><br>


<div class="section">
	<div class="container">
		<h3>Gratis</h3>
		<div class="box">
		<?php 
					$dimas = query("SELECT * FROM buku WHERE harga_buku='gratis' ORDER BY kode_buku DESC");
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
</body>
</html>