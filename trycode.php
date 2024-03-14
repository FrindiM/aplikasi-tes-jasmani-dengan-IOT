<?php
include 'config.php';

// Query untuk mengambil data sensor dari database
$sql = "SELECT * FROM sensor_ready";
$result = $conn->query($sql);

// Menginisialisasi variabel
$totalSensors = 4;
$activeSensors = 0;
$inactiveSensors = 0;

// Menghitung jumlah sensor aktif dan tidak aktif
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == 1) {
            $activeSensors++;
        } else {
            $inactiveSensors++;
        }
    }
}

// Menampilkan status sensor dalam bentuk card
if ($activeSensors == $totalSensors) {
    // Jika semua sensor aktif
    echo '<div class="card">Sensor ON</div>';
} elseif ($inactiveSensors > 0) {
    // Jika ada sensor tidak aktif
    echo '<div class="card">Server OFF</div>';
    echo '<div class="card">Sensor OFF:</div>';

    $result->data_seek(0); // Mengembalikan pointer result ke awal

    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == 0) {
            echo '<div class="card">' . $row['id'] . '</div>';
        }
    }
} else {
    // Jika tidak ada sensor yang aktif atau tidak aktif
    echo '<div class="card">Tidak ada data sensor</div>';
}

// Menutup koneksi ke database
$conn->close();
?>
