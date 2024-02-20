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
//function hapus

function hapus($id_jenis) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jenis WHERE id_jenis = $id_jenis");

    return mysqli_affected_rows($koneksi);
}
?>

<?php
$id_jenis = $_GET["id_jenis"];

if( hapus($id_jenis) > 0) {
    echo "<script>
    alert('data berhasil dihapus!');
    document.location.href = 'data-jenis-buku-admin.php';
    </script>";
}else{
    echo "<script>
    alert('data gagal dihapus!');
    document.location.href = 'data-jenis-buku-admin.php';
    </script>";
}
?>








