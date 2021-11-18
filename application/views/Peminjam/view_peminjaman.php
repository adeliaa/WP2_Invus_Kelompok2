
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
  </ol>
</nav>
		<div class="container">
        <div class="card">

                      <div class="card-body card-block">
                        <?php
                            foreach($tb_barang as $detail){
                        ?>
            
                        <form action="<?php echo site_url('crudbarang/updatebarangDb'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                            
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Kode Barang</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="kd" name="kd" value="<?php echo $detail->id_barang; ?>" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Barang</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nb" name="nb" value="<?php echo $detail->nama_barang; ?>" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Jumlah Pinjam</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="merk" name="merk" class="form-control" required></div>
                          </div>
                          
                          <div class="row form-group">
                               <div class="col col-md-3"><label for="ns" class=" form-control-label">Tanggal Pinjam</label></div>
                               <div class="col-12 col-md-9"><input type="date" id="ns" name="ns" class="form-control" required></div>       
                          </div>
                          
                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Kondisi Barang</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="kb" class="form-control" name="kb">
                                    <option value="Berfungsi">Berfungsi</option>
                                    <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Lanjut
							</button>
							<button type="reset" class="btn btn-danger btn-sm">
							<i class="fa fa-ban"></i> Reset
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
