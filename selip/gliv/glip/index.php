<?php
// Koneksi ke database
$servername = "jolteon";  // Ganti dengan alamat server database Anda
$username = "werislin_kings";    // Ganti dengan username database Anda
$password = "Glivero011";    // Ganti dengan password database Anda
$dbname = "werislin_j";      // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel glep
$sql = "SELECT * FROM jane";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Suhu</title>
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
    <h2>Data Suhu</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>LAB</th>
            <th>LAD</th>
            <th>LBB</th>
            <th>LBD</th>
            <th>LC</th>
            <th>LB</th>
            <th>RB</th>
            <th>RC</th>
            <th>RBD</th>
            <th>RAD</th>
            <th>RBB</th>
            <th>RAB</th>
            <th>L</th>
            <th>R</th>
            <th>Time</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan data pada tabel
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["LAB"]."</td>";
                echo "<td>".$row["LAD"]."</td>";
                echo "<td>".$row["LBB"]."</td>";
                echo "<td>".$row["LBD"]."</td>";
                echo "<td>".$row["LC"]."</td>";
                echo "<td>".$row["LB"]."</td>";
                echo "<td>".$row["RB"]."</td>";
                echo "<td>".$row["RC"]."</td>";
                echo "<td>".$row["RBD"]."</td>";
                echo "<td>".$row["RAD"]."</td>";
                echo "<td>".$row["RBB"]."</td>";
                echo "<td>".$row["RAB"]."</td>";
                echo "<td>".$row["L"]."</td>";
                echo "<td>".$row["R"]."</td>";
                echo "<td>".$row["timestamp"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='16'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Menutup koneksi ke database
$conn->close();
?>