<?php

// buat query untuk mengambil data dari tabel
$query = "SELECT id, nodeID, tag, reading_time FROM sensordata";
$result = mysqli_query($conn, $query);

// memasukkan data ke dalam variabel
$data = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = $row;
}

function getTagId($conn, $id)
{
    $query = "SELECT tag_id FROM tag_id WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['tag_id'];
}

function getSensorData($conn, $nodeID, $tag)
{
    $sql = "SELECT * FROM sensordata WHERE nodeID = '$nodeID' AND tag = '$tag' ORDER BY reading_time DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li class="list-group-item">SENSOR ' . $nodeID . ' - ' . $row["reading_time"] . '</li>';
    }
}

function hitung_putaran($conn, $tag)
{
    $query = "SELECT * FROM sensordata WHERE nodeID = '1' AND tag = '$tag'";
    $result = mysqli_query($conn, $query);

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
    }

    $count--;

    if ($count == -1) {
        $count = 0;
    }
    echo '<div class="text-dark text-center">Jumlah Putaran : ' . $count . '</div>';
}

function hitung_jarak($conn, $tag)
{
    $queryy = "SELECT * FROM sensordata WHERE tag = '$tag'";
    $resultt = mysqli_query($conn, $queryy);
    $seluruh = 0;
    while ($row = mysqli_fetch_assoc($resultt)) {
        $seluruh++;
    }

    $jarak = ($seluruh) * 100 - 100;
    if ($jarak == -100) {
        $jarak = 0;
    }
    echo '<div class="text-dark text-center">Jumlah Jarak : ' . $jarak . '</div>';
}

$tag1 = getTagId($conn, 1);
$tag2 = getTagId($conn, 2);
$tag3 = getTagId($conn, 3);
$tag4 = getTagId($conn, 4);
$tag5 = getTagId($conn, 5);
$tag6 = getTagId($conn, 6);
$tag7 = getTagId($conn, 7);
$tag8 = getTagId($conn, 8);
$tag9 = getTagId($conn, 9);
$tag10 = getTagId($conn, 10);

function simpan_data($conn, $tag)
{
    $query = "SELECT * FROM sensordata WHERE nodeID = '1' AND tag = '$tag'";
    $result = mysqli_query($conn, $query);

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
    }

    $count--;

    $queryy = "SELECT * FROM sensordata WHERE tag = '$tag'";
    $resultt = mysqli_query($conn, $queryy);
    $seluruh = 0;
    while ($row = mysqli_fetch_assoc($resultt)) {
        $seluruh++;
    }
    $jarak = ($seluruh) * 100 - 100;

    if ($count == -1) {
        $count = 0;
    }

    if ($jarak == -100) {
        $jarak = 0;
    }

    

   
    
    // Memeriksa jenis kelamin dari tabel jenis_kelamin
    $sql = "SELECT * FROM tag_id WHERE tag_id = '$tag'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Output data dari setiap baris
        while($row = mysqli_fetch_assoc($result)) {
            $jenis_kelamin = $row["jenis_kelamin"];
            
            $skor = 0;
    
            // Menghitung skor berdasarkan jumlah putaran lari keliling yang berbeda
            // echo "Jenis kelamin yang dipilih: " . $jenis_kelamin;
            if ($jenis_kelamin == "Laki-laki") {
                // Hitung skor berdasarkan jarak
                if ($jarak < 1400) {
                    $skor = 0;
                } elseif ($jarak < 1500) {
                    $skor = 4;
                } elseif ($jarak < 1600) {
                    $skor = 9;
                } elseif ($jarak < 1700) {
                    $skor = 13;
                } elseif ($jarak < 1800) {
                    $skor = 18;
                } elseif ($jarak < 1900) {
                    $skor = 23;
                } elseif ($jarak < 2000) {
                    $skor = 28;
                } elseif ($jarak < 2100) {
                    $skor = 32;
                } elseif ($jarak < 2200) {
                    $skor = 37;
                } elseif ($jarak < 2300) {
                    $skor = 42;
                } elseif ($jarak < 2400) {
                    $skor = 47;
                } elseif ($jarak < 2500) {
                    $skor = 51;
                } elseif ($jarak < 2600) {
                    $skor = 56;
                } elseif ($jarak < 2700) {
                    $skor = 61;
                } elseif ($jarak < 2800) {
                    $skor = 66;
                } elseif ($jarak < 2900) {
                    $skor = 70;
                } elseif ($jarak < 3000) {
                    $skor = 75;
                } elseif ($jarak < 3100) {
                    $skor = 80;
                } elseif ($jarak < 3200) {
                    $skor = 84;
                } elseif ($jarak < 3300) {
                    $skor = 89;
                } elseif ($jarak < 3400) {
                    $skor = 98;
                } else {
                    $skor = 100;
                }
            } else if ($jenis_kelamin == "Perempuan") {
                if ($jarak < 1000) {
                    $skor = 0;
                } elseif ($jarak < 1100) {
                    $skor = 1;
                } elseif ($jarak < 1200) {
                    $skor = 6;
                } elseif ($jarak < 1300) {
                    $skor = 11;
                } elseif ($jarak < 1400) {
                    $skor = 15;
                } elseif ($jarak < 1500) {
                    $skor = 20;
                } elseif ($jarak < 1600) {
                    $skor = 25;
                } elseif ($jarak < 1700) {
                    $skor = 30;
                } elseif ($jarak < 1800) {
                    $skor = 34;
                } elseif ($jarak < 1900) {
                    $skor = 39;
                } elseif ($jarak < 2000) {
                    $skor = 44;
                } elseif ($jarak < 2100) {
                    $skor = 48;
                } elseif ($jarak < 2200) {
                    $skor = 53;
                } elseif ($jarak < 2300) {
                    $skor = 58;
                } elseif ($jarak < 2400) {
                    $skor = 63;
                } elseif ($jarak < 2500) {
                    $skor = 67;
                } elseif ($jarak < 2600) {
                    $skor = 72;
                } elseif ($jarak < 2700) {
                    $skor = 77;
                } elseif ($jarak < 2800) {
                    $skor = 81;
                } elseif ($jarak < 2900) {
                    $skor = 86;
                } elseif ($jarak < 3000) {
                    $skor = 91;
                } elseif ($jarak < 3100) {
                    $skor = 96;
                } else {
                    $skor = 100;
                }
            }
        }
    } else {
        echo "Tidak ada data";
    }
    $query = "UPDATE tag_id SET putaran = '$count', jarak = '$jarak', skor = '$skor' WHERE tag_id = '$tag'";
    if (mysqli_query($conn, $query)) {
        
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


simpan_data($conn, $tag1);
simpan_data($conn, $tag2);
simpan_data($conn, $tag3);
simpan_data($conn, $tag4);
simpan_data($conn, $tag5);
simpan_data($conn, $tag6);
simpan_data($conn, $tag7);
simpan_data($conn, $tag8);
simpan_data($conn, $tag9);
simpan_data($conn, $tag10);

function hapus($conn)
{
    $query = "UPDATE tag_id SET nama=NULL, putaran=NULL, jarak=NULL";
    if (mysqli_query($conn, $query)) {
        echo "Kolom berhasil dikosongkan";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


if(isset($_POST['jenis_kelamin'])) {
  $jenisKelamin = $_POST['jenis_kelamin'];
  // Lakukan pengolahan data selanjutnya di sini
  $query = "UPDATE jenis_kelamin SET jenis_kelamin = '$jenisKelamin'";
    if (mysqli_query($conn, $query)) {
        echo "Jenis kelamin yang dipilih: " . $jenisKelamin;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    
}


function hapuskosong($conn){
    $sql_delete = "DELETE FROM sensordata WHERE tag = '' OR tag IS NULL";
    if (mysqli_query($conn, $sql_delete)) {
    
    }
}


function pindahlost($conn){
    // memilih data yang akan dipindahkan
    $query = "SELECT nodeID, datalost FROM sensordata WHERE datalost IS NOT NULL";
    $result = mysqli_query($conn, $query);

    // memindahkan data ke kolom baru pada baris baru
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['nodeID'];
        $kolom_lama = $row['datalost'];
        $query_insert = "INSERT INTO sensordata (nodeID, tag) VALUES ('$id', '$kolom_lama')";
        mysqli_query($conn, $query_insert);
    }

    // mengosongkan datalost setelah pemindahan data selesai
    $query_delete = "UPDATE sensordata SET datalost=NULL WHERE datalost IS NOT NULL";
    mysqli_query($conn, $query_delete);
}

pindahlost($conn);
hapuskosong($conn);

function statusSensor($conn){
    // Query untuk mengambil data sensor dari database
    $sql = "SELECT * FROM sensor_ready";
    $result = $conn->query($sql);
            
    // Menginisialisasi variabel
    $totalSensors = 4;
    $activeSensors = 0;
    $inactiveSensors = 0;
            
    // Menghitung jumlah sensor aktif dan tidak aktif
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['status'] == 1) {
                $activeSensors++;
            } else {
                $inactiveSensors++;
            }
        }
    }
            
    // Menampilkan status sensor dalam bentuk card
    if ($activeSensors == $totalSensors) {
        // Jika semua sensor aktif
        echo '<div class="card bg-success">Sensor Hidup</div>';
    } elseif ($inactiveSensors > 0) {
        // Jika ada sensor tidak aktif
        echo '<div class="card bg-danger">Sensor Mati</div>';
        echo '<div class="card">Sensor yang Mati:</div>';
            
        $result->data_seek(0); // Mengembalikan pointer result ke awal
            
        while ($row = $result->fetch_assoc()) {
            if ($row['status'] == 0) {
                echo '<div class="card">' . $row['id'] . '</div>';
            }
        }
    } else {
        // Jika tidak ada sensor yang aktif atau tidak aktif
        echo '<div class="card">Tidak ada data sensor</div>';
    }
}

function statusServer($conn){
    $sql = "SELECT isi FROM sensor_status";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Cek nilai status
            $status = $row["isi"];
            $statusText = ($status == "hidup") ? "Server Aktif" : "Server Tidak Aktif";
            $statusClass = ($status == "hidup") ? "bg-success" : "bg-danger";
    
            // Tampilkan card Bootstrap
            echo '<div class="card ' . $statusClass . ' mb-2">';
            echo '<p class="card-text">' . $statusText . '</p>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada data status dalam database.";
    }
}

?>



<div class="container-fluid bg-light">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php?page=home" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                arrow_back
            </span> <br> Kembali</a>
        <a href="index.php?page=ptag" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                settings
            </span> <br> Pengaturan</a>
        <a href="index.php?page=lreport" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                <span class="material-symbols-outlined">
                    data_thresholding
                </span>
            </span> <br> Lapoan</a>
    </div>
    
    <div class="text-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">
      Status Server dan Sensor
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
        
        <?php
        statusServer($conn);
        statusSensor($conn);
        ?>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="refreshPagee()" class="btn btn-primary">Refresh</button>
            <script>
            function refreshPagee() {
                location.reload();
            }
            </script>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="row">
        <!-- card 2 -->
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Timer</h6>
                </div>
                <div class="card-body text-center">
                    <h1 id="datetime"></h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="minutes">Minutes:</label>
                            <input type="number" class="form-control" id="minutes" min="1" max="60" value="12">
                        </div>
                        <div class="form-group">
                            <label for="seconds">Seconds:</label>
                            <input type="number" class="form-control" id="seconds" min="0" max="59" value="0">
                        </div>
                        <div class="form-group">
                            <h1 id="timer">00:00</h1>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <button class="btn btn-primary" id="start">Start</button>
                                    <!--<button class="btn btn-secondary" id="pause">Pause</button>-->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!--<form action=" ledit.php" method="POST">-->
                                    <button id="reset" name="hapus" class="btn btn-danger mt-3">Reset waktu</button>
                                <!--</form>-->
                            </div>
                            <div class="col-lg-4">
                                <form action=" ledit.php" method="POST">
                                    <button name="hapus" class="btn btn-danger mt-3">Reset data</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- rekap -->
        <div class="col-xl-6 col-md-6 col-sm-12">
            <?php
            $query = "SELECT * FROM tag_id";
            $result = mysqli_query($conn, $query);
            ?>
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No Tag</th>
                                    <th>Nama Peserta</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jumlah Putaran</th>
                                    <th>Jarak ditempuh(m)</th>
                                    <th>Jumlah Skor</th>
                                    <th>Lihat Detai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['no_tag']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['putaran']; ?></td>
                                        <td><?php echo $row['jarak']; ?></td>
                                        <td><?php echo $row['skor']; ?></td>
                                        <td><a class="btn btn-primary" href="ldetail.php?tag_id=<?php echo $row['tag_id']; ?>&nama=<?php echo $row['nama']; ?>" target="_blank">Lihat Detail</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-success mt-3" href="lsimpan.php">simpan data</a>
            </div>
        </div>

        <!-- card 1 -->

        <div class=" col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 1</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag1);
                        getSensorData($conn, '2', $tag1);
                        getSensorData($conn, '3', $tag1);
                        getSensorData($conn, '4', $tag1);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag1);
                    hitung_jarak($conn, $tag1)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 2</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag2);
                        getSensorData($conn, '2', $tag2);
                        getSensorData($conn, '3', $tag2);
                        getSensorData($conn, '4', $tag2);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag2);
                    hitung_jarak($conn, $tag2)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 3</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag3);
                        getSensorData($conn, '2', $tag3);
                        getSensorData($conn, '3', $tag3);
                        getSensorData($conn, '4', $tag3);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag3);
                    hitung_jarak($conn, $tag3)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 4</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag4);
                        getSensorData($conn, '2', $tag4);
                        getSensorData($conn, '3', $tag4);
                        getSensorData($conn, '4', $tag4);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag4);
                    hitung_jarak($conn, $tag4)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 5</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag5);
                        getSensorData($conn, '2', $tag5);
                        getSensorData($conn, '3', $tag5);
                        getSensorData($conn, '4', $tag5);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag5);
                    hitung_jarak($conn, $tag5)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 6</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag6);
                        getSensorData($conn, '2', $tag6);
                        getSensorData($conn, '3', $tag6);
                        getSensorData($conn, '4', $tag6);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag6);
                    hitung_jarak($conn, $tag6)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 7</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag7);
                        getSensorData($conn, '2', $tag7);
                        getSensorData($conn, '3', $tag7);
                        getSensorData($conn, '4', $tag7);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag7);
                    hitung_jarak($conn, $tag7)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 8</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag8);
                        getSensorData($conn, '2', $tag8);
                        getSensorData($conn, '3', $tag8);
                        getSensorData($conn, '4', $tag8);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag8);
                    hitung_jarak($conn, $tag8)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 9</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag9);
                        getSensorData($conn, '2', $tag9);
                        getSensorData($conn, '3', $tag9);
                        getSensorData($conn, '4', $tag9);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag9);
                    hitung_jarak($conn, $tag9)
                    ?>
                </div>
            </div>
        </div>
        <!-- card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-dark shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAG 10</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- 1 -->
                        <?php
                        getSensorData($conn, '1', $tag10);
                        getSensorData($conn, '2', $tag10);
                        getSensorData($conn, '3', $tag10);
                        getSensorData($conn, '4', $tag10);
                        ?>
                    </ul>
                    <br> <br>
                    <?php
                    hitung_putaran($conn, $tag10);
                    hitung_jarak($conn, $tag10)
                    ?>
                </div>
            </div>
        </div>
        <div style="visibility: hidden;" id="hasilTimer"></div>

        <script type="text/javascript">
            // jam
            var datetime = null,
                date = null;

            var update = function() {
                date = moment(new Date())
                datetime.html(date.format('h:mm:ss a'));
            };

            $(document).ready(function() {
                datetime = $('#datetime')
                update();
                setInterval(update, 1000);
            });

            // Timer
            var interval;
            var minutes = 0;
            var seconds = 0;
            var isPaused = false;

            function startTimer() {
                $("#start").attr("disabled", true);
                interval = setInterval(function() {
                    if (!isPaused) {
                        if (seconds == 0) {
                            if (minutes == 0) {
                                var id = 1; // ganti dengan nilai yang sesuai
                                var data = "mati"; // ganti dengan nilai yang sesuai

                                var form = document.createElement("form");
                                form.setAttribute("method", "post");
                                form.setAttribute("action", "ledit.php");
                                form.setAttribute("target", "_blank");

                                var idField = document.createElement("input");
                                idField.setAttribute("type", "hidden");
                                idField.setAttribute("name", "id");
                                idField.setAttribute("value", id);

                                var dataField = document.createElement("input");
                                dataField.setAttribute("type", "hidden");
                                dataField.setAttribute("name", "data");
                                dataField.setAttribute("value", data);

                                form.appendChild(idField);
                                form.appendChild(dataField);

                                document.body.appendChild(form);

                                form.submit();

                                location.reload(true);
                                $("#start").attr("disabled", false);
                            }
                            minutes--;
                            seconds = 59;
                        } else {
                            seconds--;
                        }

                        updateTimer();
                    }
                }, 1000);
            }

            function pauseTimer() {
                isPaused = true;
            }

            function resetTimer() {
                clearInterval(interval);
                minutes = 0;
                seconds = 0;
                isPaused = false;
                updateTimer();
            }

            function updateTimer() {
                var timer = document.getElementById("timer");
                timer.innerHTML = formatTime(minutes) + ":" + formatTime(seconds);
            }

            function formatTime(time) {
                if (time < 10) {
                    return "0" + time;
                } else {
                    return time;
                }
            }
            function sleep(ms) {
              return new Promise(resolve => setTimeout(resolve, ms));
           }

            $(document).ready(function() {
                updateTimer();
                
                $("#hasilTimer").load("waktuLari.php");
                
                async function check(){
                    const dataTimer = document.getElementById("hasilTimer");
                    await sleep(1500);
                    const value = dataTimer.innerHTML;
                    if(value.toString().length !== 0){
                        const dateNow = Math.floor(new Date().getTime()/1000.0);
                        const dateTimer = parseInt(value) / 1000.0;
                        const result = dateTimer - dateNow;
                        if(result > 0){
                            minutes = parseInt(Math.floor(result / 60));
                            seconds = parseInt(result % 60);
                            isPaused = false;
                            startTimer();
                            dataTimer.innerHTML = "";
                        }
                        
                        
                    }
                }
                check();
                $("#start").click(function() {
                    minutes = parseInt($("#minutes").val());
                    seconds = parseInt($("#seconds").val());
                    fetch("https://bbi.my.id/RFID/addWaktu.php?m=" + minutes + "&d=" + seconds)
                    isPaused = false;
                    startTimer();
                });

                // $("#pause").click(function() {
                //     pauseTimer();
                // });

                $("#reset").click(function() {
                    fetch("https://bbi.my.id/RFID/stopWaktu.php");
                    $("#start").attr("disabled", false);
                    resetTimer();
                });
            });
        </script>
    </div>
</div>