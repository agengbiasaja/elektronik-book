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

function hapus($kode_buku) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku = $kode_buku");

    return mysqli_affected_rows($koneksi);
}
?>

<?php
$kode_buku = $_GET["kode_buku"];

if( hapus($kode_buku) > 0) {
    echo "<script>
    alert('data berhasil dihapus!');
    document.location.href = 'data-buku-admin.php';
    </script>";
}else{
    echo "<script>
    alert('data gagal dihapus!');
    document.location.href = 'data-buku-admin.php';
    </script>";
}
?>








