<?php include 'koneksi.php'; ?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>
<!DOCTYPE html>
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

body{
  font-size: 20px ;
}
  </style>
    <title>WE-BOOK</title>
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


<?php
$dimas = mysqli_query($koneksi,"SELECT * FROM buku WHERE kode_buku = '".$_GET['kode_buku']."' ");
$p = mysqli_fetch_object($dimas);
?>

<?php foreach( $dimas as $row) : ?>	
<div class="container">
<iframe src="file buku/<?= $row['file_buku'] ?>" height="2000" width="1000" title="Iframe Example"></iframe></p>';
</div>
<?php endforeach; ?>

</body>
</html>