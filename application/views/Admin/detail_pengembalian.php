<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/list_pengembalian'); ?>">Data Pengembalian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Pengembalian</li>
    </ol>
</nav>
<div class="container">
    <div class="card">
        <div class="card-body card-block">
            <?php
            foreach ($pengembalian as $detail) {
                
            ?>
                <form action="<?php echo site_url('admin/update_pengembalian'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="id_peminjaman" class=" form-control-label">id</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="id_peminjaman" name="id_peminjaman" value="<?php echo $detail->id_peminjaman; ?>" class="form-control" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nama_peminjam" class=" form-control-label">Nama Peminjam</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama_peminjam" name="nama_peminjam" value="<?php echo $detail->nama_peminjam; ?>" class="form-control" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kelas" class=" form-control-label">Kelas</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas" value="<?php echo $detail->kelas; ?>" class="form-control" <?php echo $detail->kelas; ?> readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nama_barang" class=" form-control-label">Nama Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama_barang" name="nama_barang" value="<?php echo $detail->nama_barang; ?>" class="form-control" readonly></div>
                        <div class="col-12 col-md-9"><input type="hidden" id="id_barang" name="id_barang" value="<?php echo $detail->id_barang; ?>" class="form-control" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="jumlah_pinjam" class=" form-control-label">Jumlah Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="jumlah_pinjam" name="jumlah_pinjam" class="form-control" value="<?php echo $detail->jumlah_pinjam; ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_pinjam" class=" form-control-label">Tanggal Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" value="<?php echo $detail->tanggal_pinjam; ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_pengembalian" class=" form-control-label">Tanggal Pengembalian</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control" value="<?php echo $detail->tanggal_pengembalian; ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" value="<?php echo $detail->tanggal_kembali; ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kondisi_pinjam" class=" form-control-label">Kondisi Barang Saat Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="kondisi_pinjam" name="kondisi_pinjam" class="form-control" value="<?php echo $detail->kondisi_saat_pinjam; ?>" readonly></div>
                    </div>

                    <div class="row form-group"> <!--dibuat dropdown-->
                        <div class="col col-md-3"><label for="kondisi_pinjam" class=" form-control-label">Kondisi Barang Saat Kembali</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="kondisi_kembali" name="kondisi_kembali" class="form-control" value="<?php echo $detail->Kondisi_kembali; ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="denda" class=" form-control-label">Denda</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="denda" name="denda" class="form-control" value="<?php echo$detail->denda ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="biaya" class=" form-control-label">Biaya Penggantian Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo$detail->biaya_penggantian_barang ?>" readonly></div>
                    </div>


                    <div class="row form-group">
                        <div class="col col-md-3"></div>
                        <div class="col-12 col-md-9">
							<a href="<?php echo site_url('admin/list_pengembalian/')?>"><button type="button" class="btn btn-primary btn-sm">
							<i class="fa fa-arrow-circle-left"></i> Kembali
							</button></a>
                        </div>
                    </div>
                </form>
            <?php }?>
        </div>
    </div>
</div>
    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>    
    </body>
</html>