
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Penggantian Barang</li>
  </ol>
</nav>
		<div class="container text-center">
		<table class="table table-hover table-light">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah Pinjam</th>
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Pengembalian</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($view_laporan as $pinjam){
      ?>
      <tr>
      <td><?php echo $pinjam->id_peminjaman ?></th>
      <td><?php echo $pinjam->nama_barang?></td>
      <td><?php echo $pinjam->jumlah_pinjam?></td>
      <td><?php echo $pinjam->tanggal_pinjam?></td>
      <td><?php echo $pinjam->tanggal_pengembalian?></td>
      <td><?php echo $pinjam->status?></td>      
      <td><a class="btn btn-success btn-sm" href="<?php echo site_url('peminjam/detail/'.$pinjam->id_peminjaman);?>" class="btn btn-small" style="border-radius:16px;"><i class="fa fa-file"></i> Detail</a>             
                            
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>