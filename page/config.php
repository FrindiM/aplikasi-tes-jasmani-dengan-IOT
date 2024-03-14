<?php
$hostname = "localhost"; // nama host MySQL
$username = "root"; // username untuk koneksi ke MySQL
$password = ""; // password untuk koneksi ke MySQL
$database = "sensor"; // nama database yang akan digunakan

// membuat koneksi ke MySQL
$conn = mysqli_connect($hostname, $username, $password, $database);

// cek koneksi apakah berhasil atau tidak
if (!$conn) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}
