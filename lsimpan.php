<?php
// koneksi ke database
include "config.php";

// mengambil data pelari dari tabel "pelari"
$sql = "SELECT * FROM tag_id WHERE jarak <> 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        $nama = $row["nama"];
        $kelamin = $row["jenis_kelamin"];
        $notag = $row["no_tag"];
        $putaran = $row["putaran"];
        $jarak = $row["jarak"];
        $skor = $row["skor"];

        // panggil fungsi rekap dengan parameter yang diperoleh dari database
        rekap($conn, $nama, $kelamin, $notag, $putaran, $jarak, $skor);
    }
} else {
    echo "Tidak ada data";
}

$conn->close();

function rekap($conn, $nama, $kelamin, $notag, $putaran, $jarak, $skor)
{
    $sql = "INSERT INTO rekap_lari (nama, jenis_kelamin, nomor, putaran, jarak, skor)
            VALUES ('" . $nama . "', '" . $kelamin . "', '" . $notag . "', '" . $putaran . "', '" . $jarak . "', '" . $skor . "')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
