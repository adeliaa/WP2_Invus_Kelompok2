
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('peminjam/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
  </ol>
</nav>
		<div class="container text-center">
		<table class="table table-hover table-light" style="widht:auto;">
  <thead>
    <tr>
      <th scope="col">ID Anggota</th>
      <th scope="col">Nama Anggota</th>
      <th scope="col">Username</th>
      <th scope="col">Kelas</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($anggota as $a){
      ?>
      <tr>
      <td><?php echo $a->id?></th>
      <td><?php echo $a->nama_peminjam?></td>
      <td><?php echo $a->username?></td>
      <td><?php echo $a->kelas?></td>
      <td><a class="btn btn-info btn-sm" href="<?php echo site_url('admin/edit_anggota/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-edit"></i> Edit </a>
        <!--<a class="btn btn-danger btn-sm" href="<?php //echo site_url('admin/add/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-plus"></i> hapus</a> -->
        <a class="btn btn-success btn-sm" href="<?php echo site_url('admin/detail_anggota/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-plus"></i> Detail</a></td>                      
                            
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
