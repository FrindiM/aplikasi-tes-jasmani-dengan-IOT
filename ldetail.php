<?php
// ambil tag_id dari parameter GET
$tag_id = $_GET['tag_id'];
$nama = $_GET['nama'];
// koneksikan ke database
include "config.php";

// ambil data dari tabel tag_id
$query = "SELECT * FROM tag_id WHERE tag_id = '$tag_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// ambil data dari tabel sensordata
$query_sensordata = "SELECT * FROM sensordata WHERE tag = '$tag_id' ORDER BY reading_time DESC";
$result_sensordata = mysqli_query($conn, $query_sensordata);

// tampilkan data pada tabel
?>
<?php
include "page/head.php";
include "page/header.php";
?>
<div class="container">
    <h3 class="mt-3 mb-3">Data Tag dengan Nama <?php echo $nama; ?></h3>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nomor Sensor</th>
            <th>Waktu</th>
        </tr>
        <?php
        $i = 1;
        while ($row_sensordata = mysqli_fetch_assoc($result_sensordata)) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row_sensordata['nodeID'] . "</td>";
            echo "<td>" . $row_sensordata['reading_time'] . "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
    <a class="btn btn-primary mt-3" href="unduhdetaill.php?tag_id=<?php echo $tag_id; ?>">Unduh Laporan</a>
</div>
<?php
include "page/foot.php";

?>
<script>
    setInterval(function() {
        location.reload();
    }, 5000);
</script>

</html>