
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php// echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item"><a href="<?php// echo site_url('admin/anggota'); ?>">Data Anggota</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Anggota</li>
  </ol>
</nav> 
<div class="container" style = "width:auto; overflow:hidden">
        <div class="card">

                      <div class="card-body card-block">
                        <?php
                            foreach($anggota as $detail){
                        ?>
            
                        <form action="<?php echo site_url('admin/anggota'); ?>" method="" enctype="multipart/form-data" class="form-horizontal">
                            
                            
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="id" class=" form-control-label">id</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="id" name="id" value="<?php echo $detail->id; ?>" class="form-control" readonly></div>
                          </div>

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" username="username" name="username" value="<?php echo $detail->username; ?>" class="form-control" readonly></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nama_peminjam" class=" form-control-label">Nama Anggota</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama_peminjam" name="nama_peminjam" value="<?php echo $detail->nama_peminjam; ?>" class="form-control" readonly></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="kelas" class=" form-control-label">Kelas</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas" value="<?php echo $detail->kelas; ?>" class="form-control" <?php echo $detail->kelas; ?> readonly></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="no_telp" class=" form-control-label">No.Telp</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="no_telp" name="no_telp" value="<?php echo $detail->no_telp; ?>" class="form-control" readonly></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $detail->alamat; ?>" readonly></div>
                          </div> 
                          
                            <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-arrow-circle-left"></i> Kembali
							</button>
							</div>
						  </div>
      
                        </form>
                        <?php
                            }
                        ?>                      
                    </div>
                   
                     
                    </div>
                  </div>

     

   
    