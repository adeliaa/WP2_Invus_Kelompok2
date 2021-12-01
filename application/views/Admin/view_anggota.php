<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/index'); ?>">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
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
        <td><a class="btn btn-warning btn-sm" href="<?php echo site_url('admin/edit_anggota/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-edit"></i> Edit </a>
          <!--<a class="btn btn-danger btn-sm" href="<?php //echo site_url('admin/add/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-plus"></i> hapus</a> -->
          <a class="btn btn-success btn-sm" href="<?php echo site_url('admin/detail_anggota/'.$a->id);?>" class="btn btn-small"  style="border-radius:16px;"><i class="fa fa-file-text-o"></i> Detail</a>
          <a style="border-radius:16px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Anggota <?php echo $a->nama_peminjam?>?');" href="<?= site_url('admin/delete_anggota/'.$a->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a></td>                      
                              
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>