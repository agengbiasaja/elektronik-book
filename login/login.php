<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- MY CSS -->
     <link rel="stylesheet" href="style.css" />

	<title>WE-BOOK</title>
	<link rel="stylesheet" type="text/css" href="setel.css">
</head>
<style>
    /* Google Fonts Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: 'Poppins', sans-serif;
}


.nav {
  display: flex;
  gap: 0.5rem;
}

.b {
	border-radius: 25px;
	width: 300px;
  flex: 1;
  background-color: #0000FF;
  color: #fff;
  border: 1px solid;
  padding: 0.5rem;
  text-align: center;
  text-decoration: none;
  transition: all 0.5s ease-out;
}

.b:hover,
.b:focus {
  background-color: #fff;
  color: #333;
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

<body>
<?php require 'cek-login.php'; ?>
<div class="scroll-bg"></div>
	<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
      echo "<script>
      alert('Username atau Password Anda Salah');
  </script>";
		}
	}
	?>

	<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-glass" style="borde-radius: 1rem;"  >
          <div class="card-body p-5 text-center" >

		<form action="cek-login.php" method="post">
    <div class="text-center">
</body>
</div>
		<h3 class="mb-5 fs-1">We-book</h3>

		<div class="form-outline mb-4">	
			<input type="text"  name="username" class="form-control form-control-lg" placeholder="Username" required="required">
		</div>
		<div class="form-outline mb-4">	
			<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required="required">

			<br></br>
	
			<div class="d-grid gap-2 col-12 mx-auto">
			<nav><input type="submit" class="b" value="LOGIN" name="masuk" ></nav>
</div><br> 
			<p>Belum punya akun? <a href="daftar.php">DAFTAR</a></p> 
			<br/>
			<nav><a class="btn btn-secondary"href="/we-book/index.php" role="button">Kembali</a></nav>
		</form>
  </section>
</div>
</div>
</div>
</div>
</div>

</div>

</body>
</html>