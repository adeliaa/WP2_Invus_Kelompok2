<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pengembalian</li>
    </ol>
</nav>
<?php if($this->session->flashdata('Message')){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 10px; width:100vh;">
        <strong><?= $this->session->flashdata('Message'); ?>!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
<div class="container text-center">
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Pinjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
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
                    <td><?php echo $pinjam->tanggal_kembali ?></td>
                    <td><?php echo $pinjam->status ?></td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo site_url('admin/detail_pengembalian/' . $pinjam->id_peminjaman); ?>" class="btn btn-small"><i class="fa fa-file"></i> Detail</a>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>