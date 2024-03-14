<?php
include "config.php";
var_dump($_GET);
var_dump(isset($_GET["m"]));
var_dump((int)$_GET["m"]);
$epoch = (time() + ((int)$_GET["m"] * 60) + (int)$_GET["d"]) * 1000;
$sql = "INSERT INTO waktu_jalan VALUES (NULL, '".$epoch."','0')";
mysqli_query($conn, $sql);
?>