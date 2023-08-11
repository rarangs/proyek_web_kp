<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>PT Hanbro Tekno Utama</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome, <h2><?= $this->session->login['nama'] ?></h2></span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>  </h3>
                <ul class="nav side-menu">
                  <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard') ?>">
                      <i class="fa fa-home"></i> Dashboard 
                    </a>
                  </li>

                  <li class="nav-item <?= $aktif == 'user' ? 'active' : '' ?>">
                    <a href="<?= base_url('user') ?>">
                      <i class="fa fa-user"></i> Master User 
                    </a>
                  </li>

                  <li><a><i class="fa fa-dollar"></i> Sales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item <?= $aktif == 'user' ? 'active' : '' ?>"><a href="<?= base_url('user') ?>">Customer</a></li>
                      <li class="nav-item <?= $aktif == 'quotation' ? 'active' : '' ?>"><a href="<?= base_url('quotation') ?>">Quotation</a></li>
                      <li class="nav-item <?= $aktif == 'pegawai' ? 'active' : '' ?>"><a href="<?= base_url('pegawai') ?>">Sales Order</a></li>

                    </ul>
                  <li class="<?= $aktif == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('pembelian')?>"><i class="fa fa-tag"></i> Invoice </a></li>
                  <li><a><i class="fa fa-edit"></i> Procurement <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('barang') ?>">Product</a></li>
                      <li class="nav-item <?= $aktif == 'kasir' ? 'active' : '' ?>"><a href="<?= base_url('kasir') ?>">Vendor</a></li>
                      <li class="nav-item <?= $aktif == 'kasir' ? 'active' : '' ?>"><a href="<?= base_url('kasir') ?>">Purchase Order</a></li>
                    </ul>
                  

                  <li class="<?= $aktif == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('pembelian')?>"><i class="fa fa-tag"></i> Histori </a></li>
                  <!-- <li><a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('barang') ?>">Barang</a></li>
                      <li class="nav-item <?= $aktif == 'kasir' ? 'active' : '' ?>"><a href="<?= base_url('kasir') ?>">Kasir</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item <?= $aktif == 'penjualan' ? 'active' : '' ?>"><a href="<?= base_url('penjualan') ?>">Transaksi Penjualan</a></li>
                    </ul>
                  </li>
                  <?php if ($this->session->login['role'] == 'admin') : ?>
                  <li><a><i class="fa fa-table"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li class="nav-item <?= $aktif == 'pengguna' ? 'active' : '' ?>"><a href="<?= base_url('pengguna') ?>">Manajemen Pengguna</a></li>
                    <li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>"><a href="<?= base_url('toko') ?>">Profile Toko</a></li>
                    </ul>
                  </li>
                  <?php endif ?> -->
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>