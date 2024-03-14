<html>
<body>

<?php

$dbname = 'bbimyid_sensor';
$dbuser = 'bbimyid_frindi';  
$dbpass = '*Fm21062000'; 
$dbhost = 'imola'; 


$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
    echo "Error: " . mysqli_connect_error();
	exit();
}

function konversi($angka)
{
    //konversi skor dari waktu
    $waktu = str_replace(':', '.', $angka);
    
    // $angka_bulat = round($waktu, 1); // membulatkan angka ke 1 desimal
    // $angka_akhir = floor($angka_bulat * 10) / 10; // mengganti digit terakhir dengan angka 0
    $angka_format = number_format($waktu, 2, '.', ''); // format output menjadi selalu dua digit di belakang koma
    return $angka_format;
}
 

echo "connection success!<br><br>";

$a1 = $_GET["p1"];
$a2 = $_GET["p2"];
$a3 = $_GET["p3"];
$a4 = $_GET["p4"];
$a5 = $_GET["p5"];
$a6 = $_GET["p6"];
$a7 = $_GET["p7"];
$a8 = $_GET["p8"];

$p1 = konversi($a1);
$p2 = konversi($a2);
$p3 = konversi($a3);
$p4 = konversi($a4);
$p5 = konversi($a5);
$p6 = konversi($a6);
$p7 = konversi($a7);
$p8 = konversi($a8);

$query = "INSERT INTO shuttle (p1, p2, p3, p4, p5, p6, p7, p8) VALUES ('$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8')";

$result = mysqli_query($connect,$query); 

echo "Insertion Success!<br>";

?>
</body>
</html>