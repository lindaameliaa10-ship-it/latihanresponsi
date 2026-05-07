<?php
$host = "localhost";
$username = "root";
$password = "";
$nama_db = "latres_web_si-d";

$koneksi = new mysqli($host, $username, $password, $nama_db);
if($koneksi->connect_error){
    die("Koneksi gagal: ". $koneksi->connect_error);
}
