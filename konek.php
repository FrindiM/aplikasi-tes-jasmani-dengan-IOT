<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor";
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari POST
$sensor_id = $_POST["sensor_id"];
$tag_id = $_POST["tag_id"];
$waktu = $_POST["waktu"];

// Memeriksa apakah tag sudah ada di database
$sql = "SELECT * FROM putaran WHERE tag_id = '$tag_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Jika tag sudah ada, update jumlah putaran dan waktu total
    $row = $result->fetch_assoc();
    $jumlah_putaran = $row["jumlah_putaran"] + 1;
    $waktu_total = $row["waktu_total"] + $waktu;
    $sql = "UPDATE putaran SET jumlah_putaran = '$jumlah_putaran', waktu_total = '$waktu_total' WHERE tag_id = '$tag_id'";
    $conn->query($sql);
} else {
    // Jika tag belum ada, tambahkan data baru
    $jumlah_putaran = 1;
    $waktu_total = $waktu;
    $sql = "INSERT INTO putaran (tag_id, jumlah_putaran, waktu_total) VALUES ('$tag_id', '$jumlah_putaran', '$waktu_total')";
    $conn->query($sql);
}

// Menyimpan data waktu tiap tag melewati sensor ke dalam tabel waktu_sensor
$sql = "INSERT INTO waktu_sensor (tag_id, sensor_id, waktu) VALUES ('$tag_id', '$sensor_id', '$waktu')";
$conn->query($sql);

// Menutup koneksi
$conn->close();
