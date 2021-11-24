        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="<?php echo base_url('assets/img/logoo.png');?>" alt="Logo"></a>
                <a class="navbar-brand hidden"><img src="<?php echo base_url('assets/img/logoo.png');?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo site_url('admin/index')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/list_barang')?>"> <i class="menu-icon fa fa-tasks"></i>Data Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/anggota')?>"> <i class="menu-icon fa fa-id-card"></i>Data Anggota</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/booking')?>"> <i class="menu-icon fa fa-print"></i>Data Booking</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/list_peminjaman')?>"> <i class="menu-icon fa fa-print"></i>Data Peminjaman</a>
                    </li>
					<li>
                        <a href="<?php echo site_url('admin/keuangan')?>"> <i class="menu-icon 	fa fa-dropbox"></i>Data Pengantian Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/denda')?>"> <i class="menu-icon fa fa-money"></i>Laporan Denda</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('admin/denda')?>"> <i class="menu-icon fa fa-money"></i>Data Pengembalian</a>
                    </li>
					<li>
						<a href="<?php echo base_url('login/logout')?>"> <i class="menu-icon fa fa fa-sign-out"></i>Logout</a>
					</li>
                    
					</li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-home"></i></a>
                    <div class="header-right"> 
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" style="font-size:20px;margin-right:10px"></i><?php echo $this->session->userdata("username"); ?></button>
                        <div id="myDropdown" class="dropdown-content">
                        <a href="<?php echo site_url('admin/profile')?>">Profile</a>
                        <a href="<?php echo base_url('login/logout')?>">Log Out</a>
                    </div>
                    </div>
                    </div>
				</div>
			</div>				
        </header>
        
        