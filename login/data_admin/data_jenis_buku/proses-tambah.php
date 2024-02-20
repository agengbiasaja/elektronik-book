<?php include '../../koneksi.php'; ?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['admin'])){
		header("location:../../login.php");
		exit;
	}
 
	?>
<?php

function tambah($dati) { 
    global $koneksi;

        $nama_jenis = htmlspecialchars($dati["nama_jenis"]);

        

            // sql
            $sql = "INSERT INTO jenis (id_jenis, nama_jenis)VALUES
            ('', '".$nama_jenis."')";
            mysqli_query($koneksi, $sql);
            
            //cek
      return mysqli_affected_rows($koneksi);
    }
 ?> 