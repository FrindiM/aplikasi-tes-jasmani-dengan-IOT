 <?php
    include "config.php";

    $query = "SELECT * FROM shuttle ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    
    
    function statusSensor($conn){
    // Query untuk mengambil data sensor dari database
    $sql = "SELECT * FROM sensor_ready WHERE id IN (1, 2)";

    $result = $conn->query($sql);
            
    // Menginisialisasi variabel
    $totalSensors = 2;
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

function hapusBarisKosong($conn)
{
    // Query SQL untuk menghapus baris kosong pada kolom p1
    $sql = "DELETE FROM shuttle WHERE p1 = ''";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Baris kosong pada kolom berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT COUNT(*) AS count FROM shuttle WHERE p1 = ''";
$result1 = $conn->query($sql);
$row1 = $result1->fetch_assoc();
$count = $row1['count'];

if ($count > 0) {
    hapusBarisKosong($conn);
}


function hitungskor($conn, $id){
    $sql = "SELECT jenis_kelamin, p3 FROM shuttle WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // Mendapatkan baris pertama dari hasil query
    $row = $result->fetch_assoc();
    $jenisKelamin = $row['jenis_kelamin'];
    $p3 = $row['p3'];

    // Inisialisasi variabel skor
    $skor = 0;
    
    if ($jenisKelamin == "perempuan") {
        // Skor untuk perempuan
        if ($p3 <= 17.6) {
            $skor = 100;
        } elseif ($p3 <= 17.7) {
            $skor = 99;
        } elseif ($p3 <= 17.8) {
            $skor = 98;
        } elseif ($p3 <= 17.9) {
            $skor = 97;
        } elseif ($p3 <= 18.0) {
            $skor = 96;
        } elseif ($p3 <= 18.1) {
            $skor = 95;
        } elseif ($p3 <= 18.2) {
            $skor = 94;
        } elseif ($p3 <= 18.3) {
            $skor = 93;
        } elseif ($p3 <= 18.4) {
            $skor = 92;
        } elseif ($p3 <= 18.5) {
            $skor = 91;
        } elseif ($p3 <= 18.6) {
            $skor = 90;
        } elseif ($p3 <= 18.7) {
            $skor = 89;
        } elseif ($p3 <= 18.8) {
            $skor = 88;
        } elseif ($p3 <= 18.9) {
            $skor = 87;
        } elseif ($p3 <= 19.0) {
            $skor = 86;
        } elseif ($p3 <= 19.1) {
            $skor = 85;
        } elseif ($p3 <= 19.2) {
            $skor = 84;
        } elseif ($p3 <= 19.3) {
            $skor = 83;
        } elseif ($p3 <= 19.4) {
            $skor = 82;
        } elseif ($p3 <= 19.5) {
            $skor = 81;
        } elseif ($p3 <= 19.6) {
            $skor = 80;
        } elseif ($p3 <= 19.7) {
            $skor = 79;
        } elseif ($p3 <= 19.8) {
            $skor = 78;
        } elseif ($p3 <= 19.9) {
            $skor = 77;
        } elseif ($p3 <= 20.0) {
            $skor = 76;
        } elseif ($p3 <= 20.1) {
            $skor = 75;
        } elseif ($p3 <= 20.2) {
            $skor = 74;
        } elseif ($p3 <= 20.3) {
            $skor = 73;
        } elseif ($p3 <= 20.4) {
            $skor = 72;
        } elseif ($p3 <= 20.5) {
            $skor = 71;
        } elseif ($p3 <= 20.6) {
            $skor = 70;
        } elseif ($p3 <= 20.7) {
            $skor = 69;
        } elseif ($p3 <= 20.8) {
            $skor = 68;
        } elseif ($p3 <= 20.9) {
            $skor = 67;
        } elseif ($p3 <= 21.0) {
            $skor = 66;
        } elseif ($p3 <= 21.1) {
            $skor = 65;
        } elseif ($p3 <= 21.2) {
            $skor = 64;
        } elseif ($p3 <= 21.3) {
            $skor = 63;
        } elseif ($p3 <= 21.4) {
            $skor = 62;
        } elseif ($p3 <= 21.5) {
            $skor = 61;
        } elseif ($p3 <= 21.6) {
            $skor = 60;
        } elseif ($p3 <= 21.7) {
            $skor = 59;
        } elseif ($p3 <= 21.8) {
            $skor = 58;
        } elseif ($p3 <= 21.9) {
            $skor = 57;
        } elseif ($p3 <= 22.0) {
            $skor = 56;
        } elseif ($p3 <= 22.1) {
            $skor = 55;
        } elseif ($p3 <= 22.2) {
            $skor = 54;
        } elseif ($p3 <= 22.3) {
            $skor = 53;
        } elseif ($p3 <= 22.4) {
            $skor = 52;
        } elseif ($p3 <= 22.5) {
            $skor = 51;
        } elseif ($p3 <= 22.6) {
            $skor = 50;
        } elseif ($p3 <= 22.7) {
            $skor = 49;
        } elseif ($p3 <= 22.8) {
            $skor = 48;
        } elseif ($p3 <= 22.9) {
            $skor = 47;
        } elseif ($p3 <= 23.0) {
            $skor = 46;
        } elseif ($p3 <= 23.1) {
            $skor = 45;
        } elseif ($p3 <= 23.2) {
            $skor = 44;
        } elseif ($p3 <= 23.3) {
            $skor = 43;
        } elseif ($p3 <= 23.4) {
            $skor = 42;
        } elseif ($p3 <= 23.5) {
            $skor = 41;
        } elseif ($p3 <= 23.6) {
            $skor = 40;
        } elseif ($p3 <= 23.7) {
            $skor = 39;
        } elseif ($p3 <= 23.8) {
            $skor = 38;
        } elseif ($p3 <= 23.9) {
            $skor = 37;
        } elseif ($p3 <= 24.0) {
            $skor = 36;
        } elseif ($p3 <= 24.1) {
            $skor = 35;
        } elseif ($p3 <= 24.2) {
            $skor = 34;
        } elseif ($p3 <= 24.3) {
            $skor = 33;
        } elseif ($p3 <= 24.4) {
            $skor = 32;
        } elseif ($p3 <= 24.5) {
            $skor = 31;
        } elseif ($p3 <= 24.6) {
            $skor = 30;
        } elseif ($p3 <= 24.7) {
            $skor = 29;
        } elseif ($p3 <= 24.8) {
            $skor = 28;
        } elseif ($p3 <= 24.9) {
            $skor = 27;
        } elseif ($p3 <= 25.0) {
            $skor = 26;
        } elseif ($p3 <= 25.1) {
            $skor = 25;
        } elseif ($p3 <= 25.2) {
            $skor = 24;
        } elseif ($p3 <= 25.3) {
            $skor = 23;
        } elseif ($p3 <= 25.4) {
            $skor = 22;
        } elseif ($p3 <= 25.5) {
            $skor = 21;
        } elseif ($p3 <= 25.6) {
            $skor = 20;
        } elseif ($p3 <= 25.7) {
            $skor = 19;
        } elseif ($p3 <= 25.8) {
            $skor = 18;
        } elseif ($p3 <= 25.9) {
            $skor = 17;
        } elseif ($p3 <= 26.0) {
            $skor = 16;
        } elseif ($p3 <= 26.1) {
            $skor = 15;
        } elseif ($p3 <= 26.2) {
            $skor = 14;
        } elseif ($p3 <= 26.3) {
            $skor = 13;
        } elseif ($p3 <= 26.4) {
            $skor = 12;
        } elseif ($p3 <= 26.5) {
            $skor = 11;
        } elseif ($p3 <= 26.6) {
            $skor = 10;
        } elseif ($p3 <= 26.7) {
            $skor = 9;
        } elseif ($p3 <= 26.8) {
            $skor = 8;
        } elseif ($p3 <= 26.9) {
            $skor = 7;
        } elseif ($p3 <= 27.0) {
            $skor = 6;
        } elseif ($p3 <= 27.1) {
            $skor = 5;
        } elseif ($p3 <= 27.2) {
            $skor = 4;
        } elseif ($p3 <= 27.3) {
            $skor = 3;
        } elseif ($p3 <= 27.4) {
            $skor = 2;
        } elseif ($p3 <= 27.5) {
            $skor = 1;
        } else {
            $skor = 0;
        }

    } elseif ($jenisKelamin == "laki-laki") {
        // Skor untuk laki-laki
        if ($p3 <= 16.20) {
            $skor = 100;
        } elseif ($p3 <= 16.30) {
            $skor = 99;
        } elseif ($p3 <= 16.40) {
            $skor = 98;
        } elseif ($p3 <= 16.50) {
            $skor = 97;
        } elseif ($p3 <= 16.60) {
            $skor = 96;
        } elseif ($p3 <= 16.70) {
            $skor = 95;
        } elseif ($p3 <= 16.80) {
            $skor = 94;
        } elseif ($p3 <= 16.90) {
            $skor = 92;
        } elseif ($p3 <= 17.00) {
            $skor = 90;
        } elseif ($p3 <= 17.10) {
            $skor = 88;
        } elseif ($p3 <= 17.20) {
            $skor = 86;
        } elseif ($p3 <= 17.30) {
            $skor = 84;
        } elseif ($p3 <= 17.40) {
            $skor = 82;
        } elseif ($p3 <= 17.50) {
            $skor = 80;
        } elseif ($p3 <= 17.60) {
            $skor = 78;
        } elseif ($p3 <= 17.70) {
            $skor = 76;
        } elseif ($p3 <= 17.80) {
            $skor = 74;
        } elseif ($p3 <= 17.90) {
            $skor = 72;
        } elseif ($p3 <= 18.00) {
            $skor = 70;
        } elseif ($p3 <= 18.10) {
            $skor = 68;
        } elseif ($p3 <= 18.20) {
            $skor = 66;
        } elseif ($p3 <= 18.30) {
            $skor = 64;
        } elseif ($p3 <= 18.40) {
            $skor = 62;
        } elseif ($p3 <= 18.50) {
            $skor = 60;
        } elseif ($p3 <= 18.60) {
            $skor = 58;
        } elseif ($p3 <= 18.70) {
            $skor = 56;
        } elseif ($p3 <= 18.80) {
            $skor = 54;
        } elseif ($p3 <= 18.90) {
            $skor = 52;
        } elseif ($p3 <= 19.00) {
            $skor = 51;
        } elseif ($p3 <= 19.10) {
            $skor = 49;
        } elseif ($p3 <= 19.20) {
            $skor = 47;
        } elseif ($p3 <= 19.30) {
            $skor = 45;
        } elseif ($p3 <= 19.40) {
            $skor = 43;
        } elseif ($p3 <= 19.50) {
            $skor = 41;
        } elseif ($p3 <= 19.60) {
            $skor = 40;
        } elseif ($p3 <= 19.70) {
            $skor = 38;
        } elseif ($p3 <= 19.80) {
            $skor = 36;
        } elseif ($p3 <= 19.90) {
            $skor = 34;
        } elseif ($p3 <= 20.00) {
            $skor = 32;
        } elseif ($p3 <= 20.10) {
            $skor = 30;
        } elseif ($p3 <= 20.20) {
            $skor = 28;
        } elseif ($p3 <= 20.30) {
            $skor = 26;
        } elseif ($p3 <= 20.40) {
            $skor = 24;
        } elseif ($p3 <= 20.50) {
            $skor = 22;
        } elseif ($p3 <= 20.60) {
            $skor = 21;
        } elseif ($p3 <= 20.70) {
            $skor = 19;
        } elseif ($p3 <= 20.80) {
            $skor = 17;
        } elseif ($p3 <= 20.90) {
            $skor = 15;
        } elseif ($p3 <= 21.00) {
            $skor = 13;
        } elseif ($p3 <= 21.10) {
            $skor = 11;
        } elseif ($p3 <= 21.20) {
            $skor = 10;
        } elseif ($p3 <= 21.30) {
            $skor = 8;
        } elseif ($p3 <= 21.40) {
            $skor = 6;
        } elseif ($p3 <= 21.50) {
            $skor = 4;
        } elseif ($p3 <= 21.60) {
            $skor = 2;
        } else {
            $skor = 0;
        }
    }
    $sqll = "UPDATE shuttle SET skor = '$skor' WHERE id = $id";
    if (mysqli_query($conn, $sqll)) {
    return $skor;
    }
    
    }
}

?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
     
    
     
     
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php?page=home" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                 arrow_back
             </span> <br> Kembali</a>
        <a href="index.php?page=sptag" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                settings
            </span> <br> Ubah Nama</a>

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
     
     <!-- Page Heading -->

     <h1 class="h3 mb-2 mt-3 text-gray-800">Unduh Report</h1>
     <p class="mb-4">Report akan diunduh dalam format file exel</p>
     <a href="unduhs.php" class="btn btn-sm btn-primary mb-3">Unduh Laporan</a>
     
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table id="myTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama</th>
                             <th>Jenis Kelamin</th>
                             <th>Putaran 1</th>
                             <th>Putaran 2</th>
                             <th>Putaran 3</th>
                             <th>Skor</th>
                             <th>Opsi</th>
                         </tr>
                     </thead>
                     <tbody>


                         <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td></td><td>" . $row["nama"] . "</td><td>" . $row["jenis_kelamin"] . "</td><td>" . $row["p1"] . "</td><td>" . $row["p2"] . "</td><td>" . $row["p3"] . "</td><td>" . hitungskor($conn, $row["id"]) . "</td><td>
                                        <form method='POST' action='ledit.php'>
                                            <input type='hidden' name='id3' value='" . $row["id"] . "'>
                                            <button class='btn btn-danger' type='submit' name='hapus3'>Hapus</button>
                                        </form>
                                    </td></tr>";
                                }
                            }
                        ?>


                     </tbody>
                 </table>
                 <script>
                     var table = document.getElementById("myTable");
                     var counter = 1;
                     for (var i = 1, row; row = table.rows[i]; i++) {
                         var cell = row.cells[0];
                         cell.innerHTML = counter;
                         counter++;
                     }
                 </script>
             </div>
         </div>
     </div>
 </div>