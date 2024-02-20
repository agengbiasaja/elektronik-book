<?php 
include 'koneksi.php'; 
?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    

	<title>We-book</title>
    <style>
		    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
}
.section {
	padding:25px 0;
}
.box {
	background-color: #fff;

	padding:15px;
	box-sizing: border-box;
	margin:10px 0 25px 0;
}
.box:after {
	content: '';
	display: block;
	clear: both;
}
.container {
	width: 80%;
	margin:0 auto;
}
.container:after {
	content: '';
	display: block;
	clear: both;
}
.col-4 img {
	width: 62%;
	float: center;
	
}
.col-4 {
	width:25%;
	height: 320px;

	float: left;
	padding:10px;
	box-sizing: border-box;
}
.col-4:hover {
	box-shadow: 0 0 3px #999;
}
.col-4 .harga {
	font-weight: bold;
	color:#C70039;
	float: center;
}
.col-4 .nama {
	color: #666;
	margin-bottom: 5px;
	float: center;
}
    </style>
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

	function cari($keyword) {
		$query = "SELECT * FROM buku LEFT JOIN jenis USING (id_jenis) WHERE judul_buku LIKE '%$keyword%' OR
		penerbit LIKE '%$keyword%' OR
		penulis LIKE '%$keyword%' OR
		id_jenis LIKE '%$keyword%' OR
		tahun_terbit LIKE '%$keyword%' OR
		harga_buku LIKE '%$keyword%'";
		return query($query);
	} 
}

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
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="pustaka.php">Library</a>
        </li>
        <li class="nav-item dropdown">
        
            
          </a>
          <ul class="dropdown-menu">
		  <div class="dropdown-content">
		  
          </ul>
        </li>
      </ul>
	  <!-- search -->
	  <form class="d-flex" role="search" action="data-buku.php" method=" ">
      <a class="navbar-brand" href="logout.php">LOGOUT <i class="bi bi-box-arrow-left"></i></a>
        <input class="form-control me-2" name="search" type="search" placeholder="masuukan pencarian..." aria-label="off">
        <button class="btn btn-success" type="submit" name="cari">Search</button>
      </form>	
	</div>
	</div>

</nav>
<br><br><br><br>
<!--akhir navbar-->


	<!-- kategory -->
	<div class="section">
		<div class="container">
			<h3>Hasil Pencarian Anda</h3>
			<div class="box">
				<?php 
					if($_GET['search'] != ''){
						$where = "judul_buku LIKE '%".$_GET['search']."%' ";
					}

					$dimas = query("SELECT * FROM buku WHERE $where ORDER BY kode_buku DESC");
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