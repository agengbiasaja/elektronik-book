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


function ubah($dati) {
    global $koneksi;

    $id_jenis = $dati["id_jenis"];
    $nama_jenis = htmlspecialchars($dati["nama_jenis"]);
    
        // sql
        $sql = "UPDATE jenis SET
                nama_jenis = '$nama_jenis'
                WHERE id_jenis = '$id_jenis'
                ";
        mysqli_query($koneksi, $sql);
        
        //cek
  return mysqli_affected_rows($koneksi);
}


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