
<?php  
//require '../sidebar.html';
//require '../login/fungsi_login.php';
//$auth = new fungsi_login();
//$auth->verifikasi($_SESSION['level']);

//require_once 'fungsi_barang.php';
//$lib = new fungsi_barang();
//$data = $lib->list();
?>

<!-- Content -->
<div class="content">

    <!-- open sidebar menu -->
    <a class="btn btn-primary btn-customized open-menu" href="#" role="button">
        <i class="fas fa-align-left"></i> <span>Menu</span>
    </a>

	<!-- Top content -->
	<div class="top-content section-container" id="top-content">
			        <div class="container">
			            <div class="row">
			                <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
			                	<h1 class="wow fadeIn">Bootstrap 4 Template with <strong>Sidebar Menu</strong></h1>
			                	<div class="description wow fadeInLeft">
			                		<p>
			                			A template with Sidebar Menu made with the Bootstrap 4 framework. Download the template or learn how to create it, step by step, on 
			                			<a href="https://azmind.com"><strong>AZMIND</strong></a>.
			                		</p>
			                	</div>
			                	<div class="buttons wow fadeInUp">							
									<a class="btn btn-primary btn-customized scroll-link" href="#section-1" role="button">
										<i class="fas fa-book-open"></i> Learn More
									</a>
									<a class="btn btn-primary btn-customized-2 scroll-link" href="#section-3" role="button">
										<i class="fas fa-pencil-alt"></i> Our Projects
									</a>
								</div>
			                </div>
			            </div>
			        </div>
		        </div>
		

<!-- End content -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#" style="align=right">Active</a>
      </li>
</nav>
  <br><h1>LIST BUKU</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="">List Buku</a></li>
</ul>
<button class="btn" onclick="window.location.href='tambah_barang.php?>'" style="margin-left: 950px">Tambah Buku</button>
  <div class="container">
    <table>
  <tr>
    <th width="16%">Nama Buku</th>
    <th width="16%">Nama Penulis</th>
    <th width="32%">Sipnosis</th>
    <th width="5%">Stok</th>
    <th width="15%">Aksi</th>
  </tr>
        </tr> 
        

</table>
  </div>
</div>
</body>
</html>
