<?php
// Ambil nilai dari data pos
$id = $_POST['id'];
$data = $_POST['data'];

// Buat koneksi ke database
include 'config.php';

// Siapkan query untuk mengupdate data di tabel
$sql = "UPDATE coba SET isi='$data' WHERE id_data='$id'";

// Jalankan query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diupdate";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
