<?php
// Koneksi ke database
$servername = "jolteon";  // Ganti dengan alamat server database Anda
$username = "werislin_kings";    // Ganti dengan username database Anda
$password = "Glivero011";    // Ganti dengan password database Anda
$dbname = "werislin_j";      // Ganti dengan nama database Anda

// Menerima data dari permintaan HTTP GET
$LAB = $_GET["LAB"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$LAD = $_GET["LAD"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$LBB = $_GET["LBB"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$LBD = $_GET["LBD"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$LC = $_GET["LC"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$LB = $_GET["LB"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RB = $_GET["RB"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RC = $_GET["RC"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RBD = $_GET["RBD"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RAD = $_GET["RAD"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RBB = $_GET["RBB"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$RAB = $_GET["RAB"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$L = $_GET["L"];  // Ubah "LAB" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$R = $_GET["R"];  // Ubah "LAD" sesuai dengan nama parameter yang Anda gunakan di ESP8266
// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan query untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO jane (LAB, LAD, LBB, LBD, LC, LB, RB, RC,RBD, RAD, RBB, RAB, L, R) VALUES ('$LAB', '$LAD', '$LBB', '$LBD', '$LC', '$LB', '$RB', '$RC', '$RBD', '$RAD', '$RBB', '$RAB', '$L', '$R')";  // Ubah "table_name" dan "column1", "column2" sesuai dengan nama tabel dan kolom di database Anda

// Menjalankan query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
