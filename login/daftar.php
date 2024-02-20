<?php include 'koneksi.php'; ?>

<?php

require 'proses-daftar.php';

if( isset($_POST["register"])) {

    if( daftar($_POST) > 0) {
        echo "<script>
        alert('user berhasil ditambahkan!');
        </script>";
    
    } else {
        echo mysqli_error($koneksi);
    }
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

     <!-- MY CSS -->
     <link rel="stylesheet" href="style.css" />

	<title>WE-BOOK</title>
	<link rel="stylesheet" type="text/css" href="style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar</title>
    <style>
      		    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
}
        @keyframes scrollBg {
  from {
    transform: translateY(0px);
  }
  to {
    transform: translateY(-330px);
  }
}

.scroll-bg {
  height: 100%;
  width: 100%;
  position: fixed;
  padding-bottom: 330px;
  background-color: #E8BA9B;
  background-image: url('../images/buku.jpeg');
  background-size: cover;
  
}
</style>
</head>
<body>
    <div class="scroll-bg"></div>

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;"  >
          <div class="card-body p-5 text-center" >


    <form action="" method="post">

    <h3 class="mb-5 fs-1">DAFTAR!!!</h3>

    <div class="form-outline mb-1">	
			<input type="text" name="nama" class="form-control form-control" placeholder="NAMA" required="required"> 
			<br>
            <input type="text" name="username" class="form-control form-control" placeholder="USERNAME" required="required">
            <br> 
			<input type="password" name="password" class="form-control form-control" placeholder="PASSWORD" required="required">
            <br>
			<input type="password" name="password2" class="form-control form-control" placeholder="PASSWORD" required="required">
            <br>
			<input type="text" name="email" class="form-control form-control" placeholder="EMAIL" required="required">
            <br> 
            <div class="d-grid gap-2 col-12 mx-auto">
			<input type="submit" class="btn btn-outline-primary" value="daftar" name="register" >
            <br>
</div>
</div>
<a class="btn btn-secondary"href="login.php" role="button">Sudah Punya Akun</a></body>
</html>