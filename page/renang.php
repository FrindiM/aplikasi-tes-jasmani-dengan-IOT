 <?php
    include "config.php";

    $query = "SELECT nomor, nama, jenis_kelamin, waktu, skor, tanggal FROM renang ORDER BY waktu DESC";
    $result = mysqli_query($conn, $query);
    
    function statusSensor($conn){
    // Query untuk mengambil data sensor dari database
    $sql = "SELECT * FROM renang_ready";
    $result = $conn->query($sql);
            
    // Menginisialisasi variabel
    $totalSensors = 5;
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
        echo '<div class="card bg-success">Alat Hidup</div>';
    } elseif ($inactiveSensors > 0) {
        // Jika ada sensor tidak aktif
        echo '<div class="card bg-danger">Alat Mati</div>';
        echo '<div class="card">Alat yang Mati:</div>';
            
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
    
    ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php?page=home" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                 arrow_back
             </span> <br> Kembali</a>
        <a href="index.php?page=prenang" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                settings
            </span> <br> Pengaturan</a>
        <a href="index.php?page=rreport" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                <span class="material-symbols-outlined">
                    data_thresholding
                </span>
            </span> <br> Lapoan</a>

     </div>
     <div class="text-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">
      Status Alat
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
    
     <!-- Page Heading -->

     <h1 class="h3 mb-2 mt-3 text-gray-800">Unduh Report</h1>
     <p class="mb-4">Report akan diunduh dalam format file exel</p>
     <a href="unduhr.php" class="btn btn-sm btn-primary mb-3">Unduh Laporan</a>
     <form action="ledit.php" method="POST">
    <button type="submit" name="reset_renang" class="btn btn-sm btn-danger mb-3">Reset</button>
    </form>
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
                             <th>Nomor urut</th>
                             <th>Nama</th>
                             <th>Jenis Kelamin</th>
                             <th>Waktu</th>
                             <th>Skor</th>
                             <th>Waktu tes</th>
                         </tr>
                     </thead>
                     <tbody>


                         <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td></td><td>" . $row["nomor"] . "</td><td>" . $row["nama"] . "</td><td>" . $row["jenis_kelamin"] . "</td><td>" . $row["waktu"] . "</td><td>" . $row["skor"] . "</td><td>" . $row["tanggal"] . "</td></tr>";
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