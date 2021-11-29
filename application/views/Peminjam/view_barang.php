
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
  </ol>
</nav>
<?php if($this->session->flashdata('Message')){?>
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 10px; width:100vh;">
    <strong><?= $this->session->flashdata('Message'); ?>!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<?php if($this->session->flashdata('Message1')){?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 10px; width:100vh;">
    <strong><?= $this->session->flashdata('Message1'); ?>!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>
		<div class="container text-center">
		<table class="table table-hover table-light" style="10px">
  <thead>
    <tr>
      <th scope="col">Foto Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Kondisi Barang</th>
      <th scope="col">Stok</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($tb_barang as $barang){
      ?>
      <tr>
      <td><img style="width:100px" src="<?php echo base_url(); ?>assets/img/<?php echo $barang->gambar?>"></th>
      <td><?php echo $barang->nama_barang?></td>
      <td><?php echo $barang->kondisi?></td>
      <td><?php echo $barang->stok?></td>
      <td><a class="btn btn-success btn-sm" href="<?php echo site_url('peminjam/add/'.$barang->id_barang);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-plus"></i> Pinjam</a>                      
                            
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>