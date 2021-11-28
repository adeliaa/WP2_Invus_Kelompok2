
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/index'); ?>">Beranda</a></li>
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
            
            <?= form_open_multipart('peminjam/profile_update'); ?>
    
            <div class="row form-group">
                               <div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="username" name="username" value="<?php echo $detail->username; ?>" class="form-control" readonly></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="password" class=" form-control-label">Ganti Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="password" name="password" class="form-control">
                               <div class="col col-md-3"></div>
                               <div class="col-12 col-md-9"><a><?php echo form_error('password'); ?></a></div>
                          </div>
                          </div>
                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Lengkap</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $detail->nama_peminjam; ?>" required>
                               <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
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

                          <div class="form-group row">
                          <div class="col-sm-2">Gambar</div>
                          <div class="col-sm-10">
                          <div class="row">
                          <div class="col-sm-3">
                          <img src="<?=base_url('assets/img/profile/') . $detail->image; ?>" class="img-thumbnail" alt="">
                          </div>
                          <div class="col-sm-9">
                          <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">Pilih file</label>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
 <div class="form-group row justify-content-end">
 <div class="col-sm-10">
 <button type="submit" class="btn btn-primary">Ubah</button>
 <a href="<?php echo site_url('peminjam')?>"><button type="button" class="btn btn-dark"> Kembali</button><a>
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