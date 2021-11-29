
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Profile</li>
  </ol>
</nav>
<div class="container">
  <div class="card">
    <div class="card-body card-block">
      <?php
        foreach($anggota as $detail){
      ?>
        <form action="<?php echo site_url('admin/update_anggota/'.$detail->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
            <div class="col-12 col-md-9"><input type="text" id="username" name="username" value="<?php echo $detail->username; ?>" class="form-control" readonly></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="password" class=" form-control-label">Ganti Password</label></div>
          <div class="col-12 col-md-9"><input type="text" id="password" name="password" class="form-control"></div>
          <div class="col col-md-3"></div>
          <div class="col-12 col-md-9"><a><?php echo form_error('password'); ?></a></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Lengkap</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $detail->nama_peminjam; ?>" required></div>
        </div>
                          
        <div class="row form-group">
          <div class="col col-md-3"><label for="kelas" class=" form-control-label">Kelas</label></div>
          <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas" class="form-control" value="<?php echo $detail->kelas; ?>" required></div>       
        </div>
                          
        <div class="row form-group">
          <div class="col col-md-3"><label for="no_telp" class=" form-control-label">No Telp</label></div>
          <div class="col-12 col-md-9"><input type="text" id="no_telp" name="no_telp" class="form-control" value="<?php echo $detail->no_telp; ?>" required></div>       
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat</label></div>
          <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $detail->alamat; ?>" required></div>       
        </div>

        <div class="row form-group"> 
          <div class="col col-md-3"></div>
        </div>
        <div class="row form-group">
					<div class="col col-md-3"></div>
					<div class="col-12 col-md-9">
            <button type="submit" class="btn btn-success btn-sm">
  					  <i class="fa fa-save"></i> Simpan
  					</button>
            <button type="reset" class="btn btn-danger btn-sm">
						  <i class="fa fa-ban"></i> Reset
						</button>
						<a href="<?php echo site_url('admin/anggota/')?>"><button type="button" class="btn btn-primary btn-sm">
						  <i class="fa fa-arrow-circle-left"></i> Kembali
						</button></a>
					</div>
				</div>
      </form>
    <?php } ?>                      
  </div>
</div>
