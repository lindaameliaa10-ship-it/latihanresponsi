<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "trashbank";

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
    die("Koneksi gagal1".mysqli_connect_error());
}