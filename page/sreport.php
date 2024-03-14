 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?php
        $query = "SELECT * FROM rekap_lari2";
        $result = mysqli_query($conn, $query);
        ?>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <a href="index.php?page=srun" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                 arrow_back
             </span> <br> Kembali</a>
     </div>
     <h1 class="h3 mb-2 mt-3 text-gray-800">Unduh Report</h1>
     <p class="mb-4">Report akan diunduh dalam format file exel</p>
     <a href="unduhs.php" class="btn btn-sm btn-primary mb-3">Unduh Laporan</a>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Rekap </h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Nama Peserta</th>
                             <th>Nomor Tag</th>
                             <th>Jumlah Putaran</th>
                             <th>Jarak Tempuh</th>
                             <th>Waktu Tes</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                             <tr>
                                 <td><?php echo $row['nama']; ?></td>
                                 <td><?php echo $row['nomor']; ?></td>
                                 <td><?php echo $row['putaran']; ?></td>
                                 <td><?php echo $row['jarak']; ?></td>
                                 <td><?php echo $row['jarak']; ?></td>
                             </tr>
                         <?php endwhile; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>