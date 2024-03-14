<?php

    //simpan data ke database
    include "config.php";

    //ambil data dari ESP
    $nomor = $_GET['nomor'];
    $waktu = $_GET['waktu'];

    //konversi skor dari waktu
    $waktu = str_replace(':', '.', $waktu);
    
    // $angka_bulat = round($waktu, 1); // membulatkan angka ke 1 desimal
    // $angka_akhir = floor($angka_bulat * 10) / 10; // mengganti digit terakhir dengan angka 0
    $angka_format = number_format($waktu, 2, '.', ''); // format output menjadi selalu dua digit di belakang koma
    
    function getNama($conn, $nomor)
    {
        $query = "SELECT nama FROM renang_id WHERE nomor = $nomor";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['nama'];
    }
    $nama = getNama($conn, $nomor);
    
    function jenisKelamin($conn, $nomor)
    {
        $query = "SELECT jenis_kelamin FROM renang_id WHERE nomor = $nomor";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['jenis_kelamin'];
    }
    $jenisKelamin = jenisKelamin($conn, $nomor);
    
    // skor laki-laki
    $times_lk = array(
        14.00 => 100,
        14.70 => 99,
        15.40 => 98,
        16.10 => 97,
        16.80 => 96,
        17.50 => 95,
        18.20 => 94,
        18.90 => 93,
        19.60 => 92,
        20.30 => 91,
        21.00 => 90,
        21.70 => 89,
        22.40 => 88,
        23.10 => 87,
        23.80 => 86,
        24.50 => 85,
        25.20 => 84,
        25.90 => 83,
        26.60 => 82,
        27.30 => 81,
        28.00 => 80,
        28.70 => 79,
        29.40 => 78,
        30.10 => 77,
        30.80 => 76,
        31.50 => 75,
        32.20 => 74,
        32.90 => 73,
        33.60 => 72,
        34.30 => 71,
        35.00 => 70,
        35.70 => 69,
        36.40 => 68,
        37.10 => 67,
        37.80 => 66,
        38.50 => 65,
        39.20 => 64,
        39.90 => 63,
        40.60 => 62,
        41.30 => 61,
        42.00 => 60,
        42.70 => 59,
        43.40 => 58,
        44.10 => 57,
        44.80 => 56,
        45.50 => 55,
        46.20 => 54,
        46.90 => 53,
        47.60 => 52,
        48.30 => 51,
        49.00 => 50,
        49.70 => 49,
        50.40 => 48,
        51.10 => 47,
        51.80 => 46,
        52.50 => 45,
        53.20 => 44,
        53.90 => 43,
        54.60 => 42,
        55.00 => 41,
    );

    // skor perempuan
    $times_pr = array(
        20.00 => 100,
        20.70 => 99,
        21.30 => 98,
        22.00 => 97,
        22.70 => 96,
        23.40 => 95,
        24.00 => 94,
        24.70 => 93,
        25.40 => 92,
        26.00 => 91,
        26.70 => 90,
        27.40 => 89,
        28.00 => 88,
        28.70 => 87,
        29.40 => 86,
        30.10 => 85,
        30.70 => 84,
        31.40 => 83,
        32.10 => 82,
        32.70 => 81,
        33.40 => 80,
        34.10 => 79,
        34.70 => 78,
        35.40 => 77,
        36.10 => 76,
        36.80 => 75,
        37.40 => 74,
        38.10 => 73,
        38.80 => 72,
        39.40 => 71,
        40.10 => 70,
        40.80 => 69,
        41.40 => 68,
        42.10 => 67,
        42.80 => 66,
        43.50 => 65,
        44.10 => 64,
        44.80 => 63,
        45.50 => 62,
        46.10 => 61,
        46.80 => 60,
        47.50 => 59,
        48.10 => 58,
        48.80 => 57,
        49.50 => 56,
        50.20 => 55,
        50.80 => 54,
        51.50 => 53,
        52.20 => 52,
        52.80 => 51,
        53.50 => 50,
        54.20 => 49,
        54.80 => 48,
        55.50 => 47,
        56.20 => 46,
        56.90 => 45,
        57.50 => 44,
        58.20 => 43,
        58.90 => 42,
        60.00 => 41,
    );
    
    if ($jenisKelamin == 'Laki-laki') {
        foreach ($times_lk as $key => $value) {
            if ($angka_format <= $key) {
                $skor = $value;
                break;
            } else {
                $skor = 40;
            }
        }
    } elseif ($jenisKelamin == 'Perempuan') {
        foreach ($times_pr as $key => $value) {
            if ($angka_format <= $key) {
                $skor = $value;
                break;
            } else {
                $skor = 40;
            }
        }
    } else {
        $skor = 40;
    }
    
    $query1 = "INSERT INTO renang (nomor, nama, jenis_kelamin, waktu, skor) VALUES ('$nomor', '$nama', '$jenisKelamin', '$angka_format', '$skor')";

    $result1 = mysqli_query($conn,$query1);
    
    $query2 = "INSERT INTO renang_rekap (nomor, nama, jenis_kelamin, waktu, skor) VALUES ('$nomor', '$nama', '$jenisKelamin', '$angka_format', '$skor')";

    $result2 = mysqli_query($conn,$query2);
    
    echo "Insertion Success!<br>";

    mysqli_close($conn);

?>
