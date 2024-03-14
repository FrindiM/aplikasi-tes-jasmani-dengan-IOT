<?php
//simpan data ke database
include "config.php";

// Mengecek apakah kunci 'id' ada dalam array $_GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Memeriksa apakah ID yang diterima adalah 5
    if ($id == 6) {
        // Mengupdate seluruh kolom status menjadi 0
        $sql = "UPDATE renang_ready SET status = 0";
        $stmt = $conn->prepare($sql);
    } else {
        // Mengupdate kolom status berdasarkan ID yang diterima
        $sql = "UPDATE renang_ready SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $status, $id);
    }

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Parameter 'id' tidak tersedia.";
}

$conn->close();
?>
