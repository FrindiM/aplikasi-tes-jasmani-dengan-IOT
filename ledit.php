<?php
include "config.php";
// Cek apakah tombol "Simpan" pada form telah ditekan
if (isset($_POST['simpan'])) {
    $tag_id = $_POST['tag_id'];
    $nama_peserta = $_POST['nama_peserta'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Perbarui data nama peserta di database
    $query = "UPDATE tag_id SET nama = '$nama_peserta', jenis_kelamin = '$jenis_kelamin' WHERE tag_id = '$tag_id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui";
        header("Location: index.php?page=ptag");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['simpan2'])) {
    $tag_id = $_POST['tag_id'];
    $nama_peserta = $_POST['nama_peserta'];

    // Perbarui data nama peserta di database
    $query = "UPDATE tag_id2 SET nama = '$nama_peserta' WHERE tag_id = '$tag_id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui";
        header("Location: index.php?page=sptag");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['simpan3'])) {
    $nomor = $_POST['nomor'];
    $nama_peserta = $_POST['nama_peserta'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Perbarui data nama peserta dan jenis kelamin di database
    $query = "UPDATE renang_id SET nama = '$nama_peserta', jenis_kelamin = '$jenis_kelamin' WHERE nomor = '$nomor'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui";
        header("Location: index.php?page=prenang");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// Cek apakah tombol "Reset" pada form telah ditekan
if (isset($_POST['reset'])) {
    $tag_id = $_POST['tag_id'];
    // Reset data nama peserta ke awal yaitu "Gelang"
    $query = "UPDATE tag_id SET nama = 'Gelang' WHERE tag_id = '$tag_id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil direset";
        header("Location: index.php?page=ptag");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['reset2'])) {
    $tag_id = $_POST['tag_id'];
    // Reset data nama peserta ke awal yaitu "Gelang"
    $query = "UPDATE tag_id2 SET nama = 'Gelang' WHERE tag_id = '$tag_id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil direset";
        header("Location: index.php?page=sptag");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['reset3'])) {
    $nomor = $_POST['nomor'];
    // Reset data nama peserta ke awal yaitu "Gelang"
    $query = "UPDATE renang_id SET nama = 'jalur' WHERE nomor = '$nomor'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil direset";
        header("Location: index.php?page=prenang");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['hapus'])) {
    $sql = "UPDATE sensor_status SET isi='hidup' WHERE id_data=1";
    mysqli_query($conn, $sql);
    $query = "TRUNCATE TABLE sensordata";
    if (mysqli_query($conn, $query)) {
        echo "Kolom berhasil dikosongkan";
        header("Location: index.php?page=lari");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['hapus2'])) {
    $sql = "UPDATE sensor_status2 SET isi='hidup' WHERE id_data=1";
    mysqli_query($conn, $sql);
    $query = "TRUNCATE TABLE sensordata2";
    if (mysqli_query($conn, $query)) {
        echo "Kolom berhasil dikosongkan";
        header("Location: index.php?page=lari");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $data = $_POST['data'];

    // Buat koneksi ke database
    include 'config.php';

    // Siapkan query untuk mengupdate data di tabel
    $sql = "UPDATE sensor_status SET isi='$data' WHERE id_data='$id'";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
        echo "<script>window.close();</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST['id2'])) {
    $id = $_POST['id2'];
    $data = $_POST['data2'];

    // Buat koneksi ke database
    include 'config.php';

    // Siapkan query untuk mengupdate data di tabel
    $sql = "UPDATE sensor_status2 SET isi='$data' WHERE id_data='$id'";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
        echo "<script>window.close();</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST['reset_renang'])) {
    // Hapus semua data dari tabel renang
    $query = "TRUNCATE TABLE renang";
    mysqli_query($conn, $query);
    header("Location: index.php?page=renang");
}

if(isset($_POST['hapus1'])) {
        
    $id = $_POST['id1'];
    $query = "DELETE FROM rekap_lari WHERE id = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        echo "Deletion Failed!";
    } else {
        header("Location: index.php?page=lreport");
    }
}

if(isset($_POST['hapus2'])) {
        
    $id = $_POST['id2'];
    $query = "DELETE FROM renang_rekap WHERE id = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        echo "Deletion Failed!";
    } else {
        header("Location: index.php?page=rreport");
    }
}

if(isset($_POST['hapus3'])) {
        
    $id = $_POST['id3'];
    $query = "DELETE FROM shuttle WHERE id = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        echo "Deletion Failed!";
    } else {
        header("Location: index.php?page=srun");
    }
}