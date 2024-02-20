<?php include '../../koneksi.php'; ?>
<?php 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- MY CSS -->
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css" />
	<title>Halaman admin</title>
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


function cari($keyword) {
    $query = "SELECT * FROM buku LEFT JOIN jenis USING (id_jenis) WHERE judul_buku LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%' OR
    penulis LIKE '%$keyword%' OR
    nama_jenis LIKE '%$keyword%' OR
    tahun_terbit LIKE '%$keyword%' OR
    harga_buku LIKE '%$keyword%'";
    return query($query);
}
    ?>


<?php

$dimas = query("SELECT * FROM buku LEFT JOIN jenis USING (id_jenis) ORDER BY kode_buku DESC");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $dimas = cari($_POST["keyword"]);
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
          <a class="nav-link active" aria-current="page" href="../../halaman_admin.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
          </a>
          <ul class="dropdown-menu">
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
      </ul>

      <form class="d-flex" role="search" action="" method="post">
      <a class="navbar-brand" href="../../logout.php"> </i></a>
        <input class="form-control me-2" name="keyword" type="search" placeholder="Masukkan Pencarian" aria-label="off">
        <button class="btn btn-success" type="submit" name="cari">Search</button>
      </form>

    </div>
  </div>
</nav>
<br><br><br><br><br>
<!--akhir navbar-->
   
<!--table-->
<div class="container">
<div class="card">
  <h5 class="card-header ">DATA BUKU</h5>
  <div class="card-body">
  <a class="btn btn-success position-relative m-2" href="tambah_data.php" role="button" ><i class="bi bi-plus-square"></i> Tambah Buku</a>
  <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 1000px">
    <table class="table table-striped table-bordered">
        <thead class="table-primary sticky-top">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Judul buku</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Penulis</th>
            <th scope="col">Jenis Buku</th>
            <th scope="col">Tahun Terbit</th>
            <th scope="col">Harga Buku</th>
            <th scope="col">Cover</th>
            <th scope="col">File Buku</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <?php $i = 1; ?>    
    <?php foreach( $dimas as $row) : ?>
       <tr>
        <td><?= $i; ?></td>
        <td><?= $row["judul_buku"]; ?></td>
        <td><?= $row["penerbit"]; ?></td>
        <td><?= $row["penulis"]; ?></td>
        <td><?= $row["nama_jenis"]; ?></td>
        <td><?= $row["tahun_terbit"]; ?></td>
        <td><?= $row["harga_buku"]; ?></td>
        <td><img src="../../gambar buku/<?php echo $row["gambar_buku"]; ?>" width="50" align='center'></td>
        <td><?= $row["file_buku"]; ?></td>
        <td>
          <a class="btn btn-success" href="update_data.php?kode_buku=<?= $row["kode_buku"]; ?>" role="button" ><i class="bi bi-pencil-square"></i></a> 
          <a class="btn btn-success btn btn-danger"   href="hapus_data.php?kode_buku=<?= $row["kode_buku"]; ?>" onclick="return confirm('yakin ingin menghapus buku ini?');"><i class="bi bi-trash3-fill"></i></a>
        </td>
       </tr>  
      <?php $i++; ?>
     <?php endforeach; ?>
    </table>
</div>
</div>
</div>
</div>
<br><br>
<!--tutup table-->



</body>
</html>
