<?php
$hostname = "jolteon"; // nama host MySQL
$username = "werislin_bbimyid"; // username untuk koneksi ke MySQL
$password = "4,Mq*,U*kz03"; // password untuk koneksi ke MySQL
$database = "werislin_bbi"; // nama database yang akan digunakan

// membuat koneksi ke MySQL
$conn = mysqli_connect($hostname, $username, $password, $database);

// cek koneksi apakah berhasil atau tidak
if (!$conn) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}


