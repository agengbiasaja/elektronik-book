<?php include 'koneksi.php'; ?>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if(!isset($_SESSION['pembeli'])){
		header("location:login.php");
		exit;
	}
 
	?>

<?php

function upload() {
    
    $nama_foto_bukti = $_FILES['foto_bukti']['name'];
    $ukuran_foto_bukti = $_FILES['foto_bukti']['size'];
    $error_foto_bukti = $_FILES['foto_bukti']['error'];
    $tempat_foto_bukti = $_FILES['foto_bukti']['tmp_name'];

    //cek apakah ada gambar
    if( $error_foto_bukti === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
        }
       
     //cek apakah itu gambar
     $ekstensifotovalid = ['jpg', 'jpeg', 'png', "jfif"];
     $ekstensifoto = explode('.', $nama_foto_bukti);
     $ekstensifoto = strtolower(end($ekstensifoto));   
     if( !in_array($ekstensifoto, $ekstensifotovalid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
    return false;
     }

     //cek ukuran
     if( $ukuran_foto_bukti > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
    return false;
     }
    // generate nama file
    $nama_foto_bukti_baru = uniqid();
    $nama_foto_bukti_baru .= '.';
    $nama_foto_bukti_baru .= $ekstensifoto;

     //lolos pengecekan
     move_uploaded_file($tempat_foto_bukti, 'foto bukti/'. $nama_foto_bukti_baru);

     return  $nama_foto_bukti_baru;

}
?>
<?php



function tambah($dati) { 
    global $koneksi;

        $kode_buku = $dati["kode_buku"];
        $username = $dati["username"];
        $dari_bank = $dati["dari_bank"];
        $dari_rekening = $dati["dari_rekening"];
        $nama_pemilik = $dati["nama_pemilik"];
        $foto_bukti = upload();
        if( !$foto_bukti) {
            return false;
        }

        $sql1 = "INSERT INTO pustaka VALUES ('', '$username', '$kode_buku', 'belum ada di library user')";
        $sql2 = "INSERT INTO transfer_bank VALUES ('', '$username', '$kode_buku', 'belum berhasil', '4324242 343435','$dari_bank', '$dari_rekening', 
        '$nama_pemilik', '$foto_bukti')"; 
        mysqli_query($koneksi, $sql1);
        mysqli_query($koneksi, $sql2);
        
        //cek
  return mysqli_affected_rows($koneksi);
}
?>