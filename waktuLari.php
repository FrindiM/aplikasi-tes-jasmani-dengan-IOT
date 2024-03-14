<?php 
include "config.php";
$query = "SELECT * FROM waktu_jalan WHERE jalan='0' ORDER BY id DESC LIMIT 1";

if ($result = mysqli_query($conn, $query)) {
    $row = mysqli_fetch_assoc($result);
    echo $row["waktu"];
} else {
    echo "";
}
?>