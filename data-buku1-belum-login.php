<?php 
error_reporting(0);
include 'login/koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
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

	<title>WE-BOOK</title>
    <style>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
            <a href="data-buku1-belum-login.php?id_jenis=<?php echo $k['id_jenis'] ?>">
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
  
      
  <form class="d-flex" role="search" action="data-buku-belum-login.php">
      <a class="navbar-brand" href="login/login.php" >LOGIN <i class="bi bi-box-arrow-right dropdown-toggle"></i></a>
        <input class="form-control me-2" type="search" name="search" placeholder="masuukan pencarian..." aria-label="off">
        <button class="btn btn-success" type="submit" name="cari">Search</button>
      </form>
    </div>
  </div>
</nav>
<br><br><br>
<!--akhir navbar-->


	<!-- kategory -->
	<div class="section">
		<div class="container">
			 <?php 
					if($_GET['id_jenis'] != ''){
						$where = "id_jenis LIKE '%".$_GET['id_jenis']."%' ";
					}$dimas = query("SELECT * FROM jenis WHERE $where");  ?>  
					<?php foreach( $dimas as $row) : ?>
					<h3>BUKU <?= $row['nama_jenis']?></h3>
						<?php endforeach; ?>
					
			
				<?php 
					if($_GET['id_jenis'] != ''){
						$where = "id_jenis LIKE '%".$_GET['id_jenis']."%' ";
					}

					$dimas = query("SELECT * FROM buku WHERE $where ORDER BY kode_buku DESC");
				?>	
                <?php foreach( $dimas as $row) : ?>
					<a href="detail-buku1.php?kode_buku=<?= $row['kode_buku'] ?>">
						<div class="col-4">
							<img src="login/gambar buku/<?= $row['gambar_buku'] ?>">
							<p class="nama"><?= $row['judul_buku'] ?></p>
							<p class="harga">Rp. <?= $row['harga_buku'] ?></p>
						</div>
					</a>
                    <?php endforeach; ?>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>