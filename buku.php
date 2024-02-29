<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                 <?php
                     if($_SESSION['user']['level']!= 'peminjam'){
                 ?>
                <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
                <?php
                     }
                ?>
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                        <!--search engine --->
                        <!-- <form action="" method="post" class="mt-5">
                            <div class="input-group d-flex justify-content-end mb-3">
                                <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari data buku...">
                                <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form> -->
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori_buku on buku.id_kategori =kategori_buku.id_kategori");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['penulis']; ?></td>
                                <td><?php echo $data['penerbit']; ?></td>
                                <td><?php echo $data['tahun_terbit']; ?></td>
                                <td>
                                    <?php
                                        if($_SESSION['user']['level']!= 'peminjam'){
                                    ?>
                                    <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($_SESSION['user']['level']!= 'admin'){
                                    ?>
                                    <a href="?page=pinjam_buku&&id=<?php echo $data['id_buku']; ?>" class="btn btn-primary">Pinjam</a>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
             </div>
        </div>
    </div>
</div>