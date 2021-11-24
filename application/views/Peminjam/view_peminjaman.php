
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/list'); ?>">Daftar Barang</a></li>
    <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
  </ol>
</nav>
		<div class="container">
        <div class="card">

                      <div class="card-body card-block">
                        <?php
                            foreach($tb_barang as $detail){
                        ?>
            
                        <form action="<?php echo site_url('peminjam/save'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                            
                          <div class="row form-group">
                                <div class="col-12 col-md-9"><input type="hidden" id="id_barang" name="id_barang" value="<?php echo $detail->id_barang; ?>" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nama_barang" class=" form-control-label">Nama Barang</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama_barang" name="nama_barang" value="<?php echo $detail->nama_barang; ?>" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="jumlah_pinjam" class=" form-control-label">Jumlah Pinjam</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="jumlah_pinjam" name="jumlah_pinjam" class="form-control" required></div>
                          </div>
                          
                          <div class="row form-group">
                               <div class="col col-md-3"><label for="tanggal_pinjam" class=" form-control-label">Tanggal Pinjam</label></div>
                               <div class="col-12 col-md-9"><input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" required></div>       
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="tanggal_pengembalian" class=" form-control-label">Tanggal Pengembalian</label></div>
                               <div class="col-12 col-md-9"><input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control" required></div>       
                          </div>
                          
                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kondisi_saat_pinjam">Kondisi Barang</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="kondisi_saat_pinjam" class="form-control" name="kondisi_saat_pinjam">
                                    <option value="Berfungsi">Berfungsi</option>
                                    <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
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