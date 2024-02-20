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
function upload() {
    
    $nama_gambar_buku = $_FILES['gambar_buku']['name'];
    $ukuran_gambar_buku = $_FILES['gambar_buku']['size'];
    $error_gambar_buku = $_FILES['gambar_buku']['error'];
    $tempat_gambar_buku = $_FILES['gambar_buku']['tmp_name'];

    //cek apakah ada gambar
    if( $error_gambar_buku === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
        }
       
     //cek apakah itu gambar
     $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
     $ekstensigambar = explode('.', $nama_gambar_buku);
     $ekstensigambar = strtolower(end($ekstensigambar));   
     if( !in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
    return false;
     }

     //cek ukuran
     if( $ukuran_gambar_buku > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
    return false;
     }
    // generate nama file
    $nama_gambar_buku_baru = uniqid();
    $nama_gambar_buku_baru .= '.';
    $nama_gambar_buku_baru .= $ekstensigambar;

     //lolos pengecekan
     move_uploaded_file($tempat_gambar_buku, '../../gambar buku/'. $nama_gambar_buku_baru);

     return  $nama_gambar_buku_baru;

}

function kurang() {
    
    $nama_file_buku = $_FILES['file_buku']['name'];
    $ukuran_file_buku = $_FILES['file_buku']['size'];
    $error_file_buku = $_FILES['file_buku']['error'];
    $tempat_file_buku = $_FILES['file_buku']['tmp_name'];

    //cek apakah ada gambar
    if( $error_file_buku === 4) {
        echo "<script>
            alert('pilih file terlebih dahulu');
            </script>";
        return false;
        }
       
     //cek apakah itu gambar
     $ekstensifilevalid = ['txt','htm'];
     $ekstensifile = explode('.', $nama_file_buku);
     $ekstensifile = strtolower(end($ekstensifile));   
     if( !in_array($ekstensifile, $ekstensifilevalid)){
        echo "<script>
        alert('yang anda upload bukan file!');
        </script>";
    return false;
     }

    
    // generate nama file
    $nama_file_buku_baru = uniqid();
    $nama_file_buku_baru .= '.';
    $nama_file_buku_baru .= $ekstensifile;

     //lolos pengecekan
     move_uploaded_file($tempat_file_buku, '../../file buku/'. $nama_file_buku_baru);

     return  $nama_file_buku_baru;

}

function ubah($dati) {
    global $koneksi;

    $kode_buku = $dati["kode_buku"];
    $judul_buku = htmlspecialchars($dati["judul_buku"]);
    $penerbit = htmlspecialchars($dati["penerbit"]);
    $penulis = htmlspecialchars($dati["penulis"]);
    $jenis_buku = htmlspecialchars($dati["id_jenis"]);
    $tahun_terbit = htmlspecialchars($dati["tahun_terbit"]);
    $harga_buku = htmlspecialchars($dati["harga_buku"]);

    $gambar_lama = htmlspecialchars($dati["gambar_lama"]);

     //cek apakah user pilih gambar baru atau tidak
     if( $_FILES['gambar_buku']['error'] === 4 ) {
        $gambar_buku = $gambar_lama;
     } else {
        $gambar_buku = upload();
     }
    $file_lama = htmlspecialchars($dati["file_lama"]);
    if( $_FILES['file_buku']['error'] === 4 ) {
        $file_buku = $file_lama;
     } else {
        $file_buku = kurang();
     }

        // sql
        $sql = "UPDATE buku SET
                judul_buku = '$judul_buku',
                penerbit = '$penerbit',
                penulis = '$penulis',
                id_jenis = '$jenis_buku',
                tahun_terbit = '$tahun_terbit',
                harga_buku = '$harga_buku',
                gambar_buku = '$gambar_buku',
                file_buku = '$file_buku'
                WHERE kode_buku = $kode_buku
        
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