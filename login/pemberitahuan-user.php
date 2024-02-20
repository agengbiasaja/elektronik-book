<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>
<?php

function insertpemberitahuanpembelian()
{
    include "koneksi.php";

    $username = $_POST['username'];
    $notif = addslashes("<i class='fa fa-exchange'></i> #" .$username. " telah membeli buku");
    $level = "admin";
    $status = "belum dibaca";

    $sql = "INSERT INTO pemberitahuan(isi_pemberitahuan, level, status)
             VALUES('" .$notif. "' , '" .$level. "' , '" .$status. "')";
    $sql .= mysqli_query($koneksi, $sql);
}

?>