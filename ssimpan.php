<?php
// koneksi ke database
include "config.php";

// mengambil data pelari dari tabel "pelari"
$sql = "SELECT nama, no_tag, putaran, jarak FROM tag_id2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        $nama = $row["nama"];
        $notag = $row["no_tag"];
        $putaran = $row["putaran"];
        $jarak = $row["jarak"];

        // panggil fungsi rekap dengan parameter yang diperoleh dari database
        rekap($conn, $nama, $notag, $putaran, $jarak);
    }
} else {
    echo "Tidak ada data";
}

$conn->close();

function rekap($conn, $nama, $notag, $putaran, $jarak)
{
    $sql = "INSERT INTO rekap_lari2 (nama, nomor, putaran, jarak)
            VALUES ('" . $nama . "', '" . $notag . "', '" . $putaran . "', '" . $jarak . "')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
