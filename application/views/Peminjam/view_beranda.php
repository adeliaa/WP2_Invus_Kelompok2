<!-- Begin Page Content -->
<div class="card mb-3" style="max-width: 540px;">
 <div class="row no-gutters">
 <div class="col-md-4">
 <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
 </div>
 <div class="col-md-8">
 <div class="card-body">
 <h5 class="card-title"><?= $user['nama_peminjam']; ?></h5>
 <p class="card-text" style="margin-top:0px;"><?= $user['username']; ?></p>
 <p class="card-text"><small class="text-muted">Kelas: <br><b><?= $user['kelas']; ?></b></small></p>
 <p class="card-text"><small class="text-muted">No.Telp: <br><b><?= $user['no_telp']; ?></b></small></p>
 <p class="card-text"><small class="text-muted">Alamat: <br><b><?= $user['alamat']; ?></b></small></p>
</div>
 <div class="btn btn-info ml-3 my-3">
 <a href="<?= base_url('peminjam/profile'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
 </div>
 </div>
 </div>
 </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
