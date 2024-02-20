<?php include 'koneksi.php'; ?>

<?php 
// mengaktifkan session pada php
session_start(); 

// menangkap data yang dikirim dari form login
if (isset($_POST['masuk'])) { 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username'");
// cek user
if(mysqli_num_rows($login) === 1) {
	 
	//cek password
	$row = mysqli_fetch_assoc($login);
	if(password_verify($password, $row["password"]) ) {

		

 // cek jika user login sebagai admin
	     if ($row['level']=="admin"){
 
 // buat session login dan username
		  $_SESSION['username'] = $username;
		  $_SESSION['admin'] = "admin";
 // alihkan ke halaman dashboard admin
		  header("location:halaman_admin.php");
          exit;
 // cek jika user login sebagai pembeli
	      }else if($row['level']=="pembeli"){
 // buat session login dan username
		  $_SESSION['username'] = $username;
		  $_SESSION['pembeli'] = "pembeli";
 // alihkan ke halaman dashboard pembeli
		  header("location:halaman_pembeli.php");
          exit;
		  }else{
          header("location:login.php?pesan=gagal");
          }    
}else{
    header("location:login.php?pesan=gagal");
	}
		
}else{
    header("location:login.php?pesan=gagal");
}

}
?>