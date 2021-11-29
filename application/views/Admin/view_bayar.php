<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/list'); ?>">list peminjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
    </ol>
</nav>
<div class="container">
    <div class="card">
        <div class="card-body card-block">
            <?php
            foreach ($view_laporan as $detail) {
                $date = date('Y-m-d');
            ?>

            <form action="<?php echo site_url('admin/update_bayar'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <input type="hidden" name="id" value="<?= $detail->id_barang ?>">
                    <div class="col col-md-3"><label for="id_peminjaman" class=" form-control-label">ID</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="id_peminjaman" name="id_peminjaman"
                    value="<?php echo $detail->id_peminjaman; ?>" class="form-control" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="nama_peminjam" class=" form-control-label">Nama
                            Peminjam</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nama_peminjam" name="nama_peminjam"
                            value="<?php echo $detail->nama_peminjam; ?>" class="form-control" readonly></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal
                            Kembali</label></div>
                    <div class="col-12 col-md-9"><input type="date" id="tanggal_kembali" name="tanggal_kembali"
                            class="form-control" value="<?php echo $date; ?>" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="kelas" class=" form-control-label">Kelas</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas"
                            value="<?php echo $detail->kelas; ?>" class="form-control" <?php echo $detail->kelas; ?>
                            readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="nama_barang" class=" form-control-label">Nama Barang</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="nama_barang" name="nama_barang"
                            value="<?php echo $detail->nama_barang; ?>" class="form-control" readonly></div>
                    <div class="col-12 col-md-9"><input type="hidden" id="id_barang" name="id_barang"
                            value="<?php echo $detail->id_barang; ?>" class="form-control" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="jumlah_pinjam" class=" form-control-label">Jumlah
                            Pinjam</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="jumlah_pinjam" name="jumlah_pinjam"
                            class="form-control" value="<?php echo $detail->jumlah_pinjam; ?>" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="kondisi_pinjam" class=" form-control-label">Kondisi Barang
                            Saat Pinjam</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="kondisi_pinjam" name="kondisi_pinjam"
                            class="form-control" value="<?php echo $detail->kondisi_saat_pinjam; ?>" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="denda" class=" form-control-label">Biaya Pengantian</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="denda" name="denda" class="form-control"
                            value="<?php echo $detail->biaya_penggantian_barang; ?>" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?php echo site_url('admin/list_pengembalian/') ?>"><button type="button"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </button></a>
                    </div>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>




