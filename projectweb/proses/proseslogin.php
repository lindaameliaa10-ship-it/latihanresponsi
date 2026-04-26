<!-- login proses  -->
<?php
session_start();
include "../konek/koneksi.php";

$email = $_POST['email'];
$pass = $_POST['pass'];
 
$query = mysqli_query($conn, "SELECT * from user where email='$email'");
$data = mysqli_fetch_assoc($query);

if($data){
    if( $_SESSION['pass'] = $data['password']){
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        header("Location: ../berhasil.php");
        exit;
    }else{
    echo "Password salah";
    }
}else{
    echo "Email tidak ditemukan!";
}
