<?php
// Koneksi ke database
$servername = "jolteon";  // Ganti dengan alamat server database Anda
$username = "werislin_gliv";    // Ganti dengan username database Anda
$password = "Glivero011";    // Ganti dengan password database Anda
$dbname = "werislin_glivganteng";      // Ganti dengan nama database Anda

// Menerima data dari permintaan HTTP GET
$data1 = $_GET["data1"];  // Ubah "data1" sesuai dengan nama parameter yang Anda gunakan di ESP8266
$data2 = $_GET["data2"];  // Ubah "data2" sesuai dengan nama parameter yang Anda gunakan di ESP8266
// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan query untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO glep (data1, data2) VALUES ('$data1', '$data2')";  // Ubah "table_name" dan "column1", "column2" sesuai dengan nama tabel dan kolom di database Anda

// Menjalankan query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
