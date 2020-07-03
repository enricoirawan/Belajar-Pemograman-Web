<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="sidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard_admin') {
                                    echo 'active';
                                } ?>">
                <a class=" nav-link" href="<?= base_url('admin/dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if ($this->uri->segment(2) == 'data_barang') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?= base_url('admin/data_barang') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Barang</span></a>
            </li>

            <li class="nav-item <?php if ($this->uri->segment(2) == 'invoice') {
                                    echo 'active';
                                } ?>""\>
                <a class=" nav-link" href="<?= base_url('admin/invoice') ?>">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Invoices</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <?php if ($this->uri->segment(2) == 'dashboard_admin') { ?>
                    <?php } else { ?>
                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?= base_url('admin/Data_barang') ?>">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Cari ..." name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-primary" name="submit">
                                </div>
                            </div>
                        </form>
                    <?php } ?>

                    <ul>
                        <div class="nav navbar-nav navbar-right mt-3">
                            <?php if ($this->session->userdata('username')) { ?>
                                <li>
                                    <div>Selamat Datang <?= $this->session->userdata('username') ?></div>
                                </li>
                                <li class="ml-5">
                                    <?= anchor('auth/logout', 'Logout') ?>
                                </li>
                            <?php } else { ?>
                                <li><?= anchor('auth.login', 'Login') ?></li>
                            <?php } ?>
                        </div>
                    </ul>

                    </ul>

                </nav>
                <!-- End of Topbar -->