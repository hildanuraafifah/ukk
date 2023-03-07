
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Lelang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->
            <div class="sidebar-heading">
                 DASHBOARD
                </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Heading -->
             <div class="sidebar-heading">
                Data Administrator
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administrator</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/dataadmin'); ?>">Admin</a>
                        <a class="collapse-item" href="<?= base_url('admin/datamasyarakat'); ?>">Masyarakaat</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Barang
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin/databaranglelang'); ?>" data-toggle="collapse" data-target="#barang"
                    aria-expanded="true" aria-controls="barang">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Barang</span>
                </a>
                <div id="barang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/databaranglelang'); ?>"> <i class="fas fa-fw fa-list"></i> Barang lelang</a>
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin/laporan'); ?>" data-toggle="collapse" 
                data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Generate Laporan</span>
                </a>
                <div id="collapseUtilities"
                 class="collapse" aria-labelledby="headingUtilities"
                  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan </h6>
                        <a class="collapse-item" href="<?= base_url('admin/laporan'); ?>">Laporan Lelang</a>
                        <a class="collapse-item" href="<?= base_url('admin/datamasyarakat/cetak_laporan'); ?>">Laporan Masyarakat</a>
                        <a class="collapse-item" href="<?= base_url('admin/databaranglelang/cetak_laporan'); ?>">Laporan Barang</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>"
                data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper --> 
            <div id="content-wrapper" class="d-flex flex-column">


                 <!-- Main Content --> 
                 <div id="content">

                 <!-- Topbar -->
                 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) --> 
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                    </button>


                <!-- Topbar Search --> 
                <h4 class="font-weight-bold">Sistem Lelang</h4>

                <!-- Topbar Navbar --> 
                <ul class="navbar-nav ml-auto">

           <div class="topbar-divider d-none d-sm-block"></div>



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome Admin <?= $this->session->userdata('username')?></span>
                           <i class="fas fa-user"></i>
                        </a>
      </ul>

    </nav>
    <!-- End of Topbar --> 


    