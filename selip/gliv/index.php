<?php
// Koneksi ke database
$servername = "jolteon";  // Ganti dengan alamat server database Anda
$username = "werislin_gliv";    // Ganti dengan username database Anda
$password = "Glivero011";    // Ganti dengan password database Anda
$dbname = "werislin_glivganteng";      // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel glep
$sql = "SELECT * FROM glep";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tag</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Data Tag</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tag ID</th>
            <th>Waktu</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan data pada tabel
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["data1"]."</td>";
                echo "<td>".$row["data2"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Menutup koneksi ke database
$conn->close();
?>