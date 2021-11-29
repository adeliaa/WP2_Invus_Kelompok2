<!-- Begin Page Content -->
<div class="container">
  <div class="jumbotron" style="height:204px; margin-top:15px;margin-bottom:15px;">
  <h1 style=>Hallo <?php echo $this->session->userdata("username"); ?></h1>
  <p style="margin-bottom:0px">Selamat Datang di Website Inventory Sekolah!</p>
  <p>Silahkan lengkapi data anda dengan mengubah profile!</p>
</div>
<div class="card mb-3" style="max-width: 530px;">
 <div class="row no-gutters">
 <div class="col-md-4">
  <?php if($user['image'] == 'default.png'){ ?>
    <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="...">
  <?php }else{?>
    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="..." style="">
  <?php } ?>
 </div>
 <div class="col-md-8">
 <div class="card-body">
 <h5 class="card-title"><?= $user['nama_peminjam']; ?></h5>
 <a class="card-text" style="margin-top:0px;"><?= $user['username']; ?></p>
 <a class="card-text"><small class="text-muted">Kelas: <br><b><?= $user['kelas']; ?></b></small><br>
 <a class="card-text"><small class="text-muted">No.Telp: <br><b><?= $user['no_telp']; ?></b></small><br>
 <a class="card-text"><small class="text-muted">Alamat: <br><b><?= $user['alamat']; ?></b></small><br>
  </div>
 <div class="btn btn-info ml-3 my-3" style="border-radius: 16px;">
 <a href="<?= base_url('peminjam/profile'); ?>" class="text text-white"><i class="fa fa-user-o"></i> Ubah Profil</a>
 </div>
 </div>
 </div>
 </div>
</div>
<!-- /.container-fluid -->
</div>
  </div>
<!-- End of Main Content -->
