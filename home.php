<h1 class="mt-4">Dashboard</h1>
<p>Perpustakaan Digital</p>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <?php
                                if($_SESSION['user']['level']!= 'peminjam'){
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori_buku"));
                                    ?>
                                    Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                    ?>  
                                    Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasanbuku"));
                                    ?>    
                                    Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                                        <div class="small text-white"><i class="fa-thin fa-user-secret"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                         if($_SESSION['user']['level']!= 'peminjam'){
                        ?>
                        <h1 class="mt-4">Peminjaman Buku</h1>
                        <div class="card">
                            <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                    </tr>
                                    <?php
                                    $i = 1;
                                        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user 
                                        LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                                        while($data = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['judul']; ?></td>
                                                <td><?php echo $data['tanggal_peminjaman']; ?></td>
                                                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                                                <td><?php echo $data['status_peminjaman']; ?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                        <?php
                           }
                        ?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">

                                <tr>
                                    <td width="200">Nama</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['nama']; ?></td>
                                </tr>

                                <tr>
                                    <td width="200">Level User</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['level']; ?></td>
                                </tr>

                                <tr>
                                    <td width="200">Tanggal Login</td>
                                    <td width="1">:</td>
                                    <td><?php echo date('d-m-y'); ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>