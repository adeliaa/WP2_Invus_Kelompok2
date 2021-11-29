
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Profile</li>
  </ol>
</nav>
<?php if($this->session->flashdata('Message')){?>
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 10px; width:100vh;">
    <strong><?= $this->session->flashdata('Message'); ?>!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>
		<div class="container">
      <div class="card">
        <div class="card-body card-block">
          <?php
            foreach($tb_user as $detail){
          ?>
              <form action="<?php echo site_url('admin/profile_update'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                          
                <div class="col col-md-3"></div>
                  <div class="row form-group">
						        <div class="col col-md-3"></div>
							      <div class="col-12 col-md-9">
                      <button type="submit" class="btn btn-success btn-sm">
  						          <i class="fa fa-save"></i> Simpan
  						        </button>
                      <button type="reset" class="btn btn-danger btn-sm">
							          <i class="fa fa-ban"></i> Reset
							        </button>
							        <a href="<?php echo site_url('admin/index/')?>"><button type="button" class="btn btn-primary btn-sm">
							          <i class="fa fa-arrow-circle-left"></i> Kembali
							        </button></a>
							      </div>
						        </div>
              </form>
          <?php } ?>                      
        </div>
      </div>
    </div>
