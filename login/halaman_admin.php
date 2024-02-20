<?php include 'koneksi.php';
?>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['admin'])){
		header("location:login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- MY CSS -->
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/we-book/css/setel.css "/>
	<title>Halaman admin</title>
</head>
<style>
    /* Google Fonts Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
}
  </style>
<body>




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
          <a class="nav-link active" aria-current="page" href="halaman_admin.php">HOME</a>
        </li>
        <li class="nav-item dropdown">
         
    

   

				</div>
          </ul>
        </li>
      </ul>

      
      <a data-bs-toggle="modal" data-bs-target="#exampleModal"class="navbar-brand" href="logout.php">LOGOUT <i class="bi bi-box-arrow-left"></i></a>
        

    </div>
  </div>
</nav>
<br><br><br><br>
<!--akhir navbar-->


<br><br>

<!--card-->
<?php
$query_buku = mysqli_query($koneksi, "SELECT * FROM buku");
$row_buku = mysqli_num_rows($query_buku);
?>
<div class="container">
<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><i class="fa fa-user float-right"></i>Data Buku<h3>Total: <?= $row_buku; ?></h3>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="data_admin/data_buku/data-buku-admin.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>


<?php
$query_pembeli = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'pembeli'");
$row_pembeli = mysqli_num_rows($query_pembeli);
?>
<div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body"><i class="fa fa-users float-right"></i>Data Akun<h3>Total: <?= $row_pembeli; ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="data_admin/data-pembeli-admin.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>


<?php
$query_pembayaran = mysqli_query($koneksi, "SELECT * FROM transfer_bank");
$row_pembayaran = mysqli_num_rows($query_pembayaran);
?>
<div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body"><i class="fa fa-handshake float-right" aria-hidden="true"></i>Data Penjualan<h3>Total: <?= $row_pembayaran; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="data_admin/data-pembayaran-admin.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>


<?php
$query_jenis_buku = mysqli_query($koneksi, "SELECT * FROM jenis");
$row_jenis_buku = mysqli_num_rows($query_jenis_buku);
?>
<div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body"><i class="fa fa-credit-card float-right"></i>Jenis Buku<h3>Total: <?= $row_jenis_buku; ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="data_admin/data_jenis_buku/data-jenis-buku-admin.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>


<?php
$query_daftar_pustaka = mysqli_query($koneksi, "SELECT * FROM pustaka");
$row_daftar_pustaka = mysqli_num_rows($query_daftar_pustaka);
?>
<div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body"><i class="fa fa-credit-card float-right"></i>daftar pustaka<h3>Total: <?= $row_daftar_pustaka; ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="data_admin/data-pustaka-user-admin.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>
</body>
</html>
