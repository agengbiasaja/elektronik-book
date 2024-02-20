<?php include 'koneksi.php'; ?>

<?php
 function daftar($data)  {
    global $koneksi;

    $nama = strtoupper(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $email = strtolower($data["email"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username' ");

    $hadi = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email' ");

 
    if(mysqli_fetch_assoc($result) )   {
        echo "<script>
        alert('username sudah ada!')
        </script>";
        return false;
    }
    

    //cek konfirmasi password 
    if( $password !== $password2 ) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
        alert('invalid email')
        </script>";
        return false;
    }

    if(mysqli_fetch_assoc($hadi) )   {
        echo "<script>
        alert('email sudah terdaftar!')
        </script>";
        return false;
    }
//enkripsi password

$password = password_hash($password, PASSWORD_DEFAULT);

// tambahkan user baru ke database
mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama' , '$username' , '$password' , 'pembeli' , '$email' )");

return mysqli_affected_rows($koneksi);
 }
 ?>

