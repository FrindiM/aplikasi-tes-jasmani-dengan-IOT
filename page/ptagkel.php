 <div class="container-fluid">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <a href="index.php?page=lari" class=" btn btn-md btn-primary shadow-sm mt-4"><span class="material-icons">
                 arrow_back
             </span> <br> Kembali</a>
     </div>
     <!-- Page Heading -->
     <h1 class="h3 mb-2 mt-3 text-gray-800">Edit Data Tag</h1>
     <p class="mb-4">Mengatur informasi dari masing-masing tag </p>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
         </div>
         <?php
            $query = "SELECT * FROM tag_id";
            $result = mysqli_query($conn, $query);
            ?>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Id Tag</th>
                             <th>No Tag</th>
                             <th>Nama Peserta</th>
                             <th>Jenis Kelamin</th>
                             <th>Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row['tag_id'] ?></td>
                                <td><?= $row['no_tag'] ?></td>
                                <td>
                                    <form method="POST" action="ledit.php">
                                        <input type="hidden" name="tag_id" value="<?= $row['tag_id'] ?>">
                                        <input class="form-control" type="text" name="nama_peserta" value="<?= $row['nama'] ?>">
                                </td>
                                <td>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                        </select>
                                </td>
                                <td>
                                        <button class="btn btn-primary mb-2" type="submit" name="simpan">Simpan</button>
                                    </form>
                                    <form method="POST" action="ledit.php">
                                        <input type="hidden" name="tag_id" value="<?= $row['tag_id'] ?>">
                                        <button class="btn btn-danger" type="submit" name="reset">Reset</button>
                                    </form>
                            </tr>
                        <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>