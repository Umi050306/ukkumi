<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Ulasanbuku</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku LEFT JOIN user on user.id_user = ulasanbuku.id_user LEFT JOIN buku on buku.id_buku = ulasanbuku.id_buku");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['ulasanbuku']; ?></td>
                                <td><?php echo $data['rating']; ?></td>
                                 <td>
                                    <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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