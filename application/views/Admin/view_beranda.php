<div class="jumbotron">
  <h1>Hallo <?php echo $this->session->userdata("username"); ?></h1>
  <p>Selamat Datang di Website Inventory Sekolah!</p>
</div>

<h2 style="padding-left:30px">Data Peminjaman Hari ini</h1><br>
<div class="container text-center">
    <table class="table table-hover table-light" style="margin-left:15px;width:1035px">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Pinjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($view_laporan as $pinjam) {
            ?>
                <tr>
                    <td><?php echo $pinjam->id_peminjaman ?></th>
                    <td><?php echo $pinjam->nama_barang ?></td>
                    <td><?php echo $pinjam->jumlah_pinjam ?></td>
                    <td><?php echo $pinjam->tanggal_pinjam ?></td>
                    <td><?php echo $pinjam->tanggal_pengembalian ?></td>
                    <td><?php echo $pinjam->status ?></td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo site_url('admin/pengembalian/' . $pinjam->id_peminjaman); ?>" class="btn btn-small" style="border-radius:16px;"><i class="fa fa-share-square-o"></i> kembali</a>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>