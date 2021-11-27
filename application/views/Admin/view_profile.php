
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
							                    <a href="<?php echo site_url('admin/index/')?>"><button type="button" class="btn btn-primary btn-sm">
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

     

   
    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>

</html>