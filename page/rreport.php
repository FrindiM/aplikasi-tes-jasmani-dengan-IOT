 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?php
        $query = "SELECT * FROM renang_rekap";
        $result = mysqli_query($conn, $query);
        ?>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <a href="index.php?page=renang" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                 arrow_back
             </span> <br> Kembali</a>
     </div>
     <h1 class="h3 mb-2 mt-3 text-gray-800">Unduh Report</h1>
     <p class="mb-4">Report akan diunduh dalam format file exel</p>
     <a href="unduhl.php" class="btn btn-sm btn-primary mb-3">Unduh Laporan</a>
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
                             <th>Jenis Kelamin</th>
                             <th>Nomor Urut</th>
                             <th>Waktu</th>
                             <th>Skor</th>
                             <th>Waktu Tes</th>
                             <th>Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                             <tr>
                                 <td><?php echo $row['nama']; ?></td>
                                 <td><?php echo $row['jenis_kelamin']; ?></td>
                                 <td><?php echo $row['nomor']; ?></td>
                                 <td><?php echo $row['waktu']; ?></td>
                                 <td><?php echo $row['skor']; ?></td>
                                 <td><?php echo $row['tanggal']; ?></td>
                                 <td>
                                     <form method="POST" action="ledit.php">
                                         <input type="hidden" name="id2" value="<?= $row['id'] ?>">
                                         <button class="btn btn-danger" type="submit" name="hapus2">Hapus</button>
                                     </form>
                                 </td>
                             </tr>
                         <?php endwhile; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>