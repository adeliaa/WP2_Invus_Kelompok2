
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/list'); ?>">Data Barang</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Barang</li>
  </ol>
</nav>
		<div class="container">
        <div class="card">

                      <div class="card-body card-block">

                        <form action="<?= site_url('admin/save_barang'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Barang</label></div>
                               <div class="col-12 col-md-9"><input type="text" name="nama" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="stok" class=" form-control-label">Stok</label></div>
                               <div class="col-12 col-md-9"><input type="number" name="stok" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="kondisi" class=" form-control-label">Kondisi Barang</label></div>
                               <div class="col-12 col-md-9">
                                 <select name="kondisi" class="form-control">
                                   <option value="Berfungsi">Berfungsi</option>
                                   <option value="Rusak">Rusak</option>
                                   <option value="Hilang">Hilang</option>
                                 </select>
                               </div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="gambar" class=" form-control-label">Gambar</label></div>
                               <div class="col-12 col-md-9"><input type="file" name="gambar" class="form-control" required></div>
                          </div>
                            <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
              <!-- Button Save -->
              <button type="submit" class="btn btn-success btn-sm">
  						<i class="fa fa-save"></i> Simpan
  						</button>

							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-arrow-circle-left"></i> Kembali
							</button>
							</div>
						  </div>

                        </form>
                        <?php

                        ?>
                    </div>


                    </div>
                  </div>