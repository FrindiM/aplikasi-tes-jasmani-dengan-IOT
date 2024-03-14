<?php

$dbname = 'werislin_bbi';
$dbuser = 'werislin_bbimyid';  
$dbpass = '4,Mq*,U*kz03'; 
$dbhost = 'jolteon'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
    echo "Error: " . mysqli_connect_error();
    exit();
}

function konversi($angka)
{
    $waktu = str_replace(':', '.', $angka);
    $angka_format = number_format($waktu, 2, '.', '');
    return $angka_format;
}

$a1 = $_GET["p1"];
$a2 = $_GET["p2"];
$a3 = $_GET["p3"];

if (isset($_GET['p3'])) {
    $p3 = konversi($a3);
} elseif (isset($_GET['p1']) || isset($_GET['p2'])) {
    $p1 = konversi($a1);
    $p2 = konversi($a2);
}

$sql = "SELECT nama, jenis_kelamin FROM tag_id2";
$result1 = $connect->query($sql);

if ($result1->num_rows > 0) {
    // Mengambil baris pertama dari hasil query
    $row = $result1->fetch_assoc();
    $nama = $row["nama"];
    $jenisKelamin = $row["jenis_kelamin"];

}

$query = "SELECT * FROM shuttle ORDER BY id DESC LIMIT 1"; // mengambil data terakhir dari database
$result1 = mysqli_query($connect, $query); 

if(mysqli_num_rows($result1) > 0){
    $row = mysqli_fetch_assoc($result1);
    if ($a3 != "") { // jika a8 terisi, maka akan dimasukkan terlebih dahulu ke baris baru
        $query = "INSERT INTO shuttle (nama, jenis_kelamin, p1, p2, p3) VALUES ('$nama', '$jenisKelamin', '', '', '$p3')";
        $result1 = mysqli_query($connect,$query); 
    }
    if ($row['p3'] == "") { // jika baris terakhir hanya berisi a1 hingga a7, maka data a8 akan dimasukkan ke baris tersebut
        $query = "UPDATE shuttle SET p3='$p3' WHERE id={$row['id']}";
        $result1 = mysqli_query($connect,$query); 
        echo "Update Success!<br>";
    } else { // jika baris terakhir sudah berisi a1 hingga a8, maka data a1 hingga a7 akan dimasukkan ke baris baru
        $query = "INSERT INTO shuttle (nama, jenis_kelamin, p1, p2) VALUES ('$nama', '$jenisKelamin', '$p1', '$p2')";
        $result1 = mysqli_query($connect, $query);
        echo "Insertion Success!<br>";
    }
} else {
    $query = "INSERT INTO shuttle (nama, jenis_kelamin, p1, p2, p3) VALUES ('$nama', '$jenisKelamin', '$p1', '$p2', '$p3')";
    $result1 = mysqli_query($connect, $query);
    echo "Insertion Success!<br>";
}

?>
