
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
  </ol>

</nav>
		<div class="container text-center">
      <div class="col-md-1" style="margin-bottom:2%">
        <a href="<?= site_url('admin/add_barang'); ?>" class="btn btn-dark rounded">Tambah Barang</a>
      </div>
		<table class="table table-hover table-light">
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

      $breadcumbs = ""
      ?>
      <tr>
      <td><img style="width:100px" src="<?php echo base_url(); ?>assets/img/<?php echo $barang->gambar?>"></th>
      <td><?php echo $barang->nama_barang?></td>
      <td><?php echo $barang->kondisi?></td>
      <td><?php echo $barang->stok?></td>
      <td>
       <!-- <a class="btn btn-success btn-sm" href="<?php //echo site_url('admin/add/'.$barang->id_barang);?>" class="btn btn-small"><i class="fa fa-plus"></i> Pinjam</a> -->
        <a class="btn btn-warning btn-sm" href="<?php echo site_url('admin/edit_barang/'.$barang->id_barang);?>" class="btn btn-small"><i class="fa fa-pencil"></i> Ubah</a>
        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Barang <?php echo $barang->nama_barang?>?');" href="<?= site_url('admin/delete_barang/'.$barang->id_barang) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
