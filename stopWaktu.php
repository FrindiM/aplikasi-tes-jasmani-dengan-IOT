<?php

include "config.php";
$sql = "UPDATE waktu_jalan SET jalan=1 ORDER BY id DESC LIMIT 1;";
mysqli_query($conn, $sql);
?>