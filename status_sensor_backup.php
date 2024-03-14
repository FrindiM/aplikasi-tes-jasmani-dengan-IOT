<?php
//simpan data ke database
include "config.php";

// Menerima parameter ID dan status
$id = $_GET['id'];
$status = $_GET['status'];

// Memeriksa apakah ID yang diterima adalah 5
if ($id == 5) {
    // Mengupdate seluruh kolom status menjadi 0
    $sql = "UPDATE sensor_ready SET status = 0";
} else {
    // Mengupdate kolom status berdasarkan ID yang diterima
    $sql = "UPDATE sensor_ready SET status = $status WHERE id = $id";
}

$result = mysqli_query($conn,$sql);

$conn->close();
?>
