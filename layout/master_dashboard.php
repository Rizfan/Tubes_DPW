<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle ?></title>

    <?php if (str_contains($tittle, "Dashboard") || str_contains($tittle, "Profile") || str_contains(session_manager("get_session", ['role'])['role'], "User")) { ?>
        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="../assets/css/sb-admin-2.min.css">

        <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <?php } else { ?>

        <!-- Custom fonts for this template-->
        <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="../../assets/css/sb-admin-2.min.css">

        <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <?php } ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <?php $role = session_manager("get_session", ['username', 'role'])['role'];
        if ($role == "Admin") { ?>

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php if (str_contains($tittle, "Dashboard")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php if (str_contains($tittle, "Dashboard")) {
                                                    echo "#";
                                                } else {
                                                    echo "../index.php";
                                                } ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Manage
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if (str_contains($tittle, "Pengguna")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Pengguna")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../admin/user/index.php";
                                                        } ?>">
                        <i class="fas fa-users"></i>
                        <span>Data Users</span>
                    </a>
                </li>

                <li class="nav-item <?php if (str_contains($tittle, "Penjual")) {
                                        echo "active";
                                    } ?>">
                    <!-- <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Penjual")) {
                                                                    echo "#";
                                                                } else {
                                                                    echo "../admin/penjual/index.php";
                                                                } ?>">
                    <i class="fas fa-store"></i>
                    <span>Data Penjual</span>
                </a> -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-store"></i>
                        <span>Data Penjual</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Manage</h6>
                            <a class="collapse-item" href="../admin/penjual/index.php">Data Penjual</a>
                            <a class="collapse-item" href="../admin/penjual/produk.php?id=0">Data Produk</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item <?php if (str_contains($tittle, "Dompet")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Dompet")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../admin/dompet/index.php";
                                                        } ?>">
                        <i class="fas fa-wallet"></i>
                        <span>Data Dompet</span>
                    </a>
                </li>

                <li class="nav-item <?php if (str_contains($tittle, "Transaksi")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Transaksi")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../admin/transaksi/index.php";
                                                        } ?>">
                        <i class="fas fa-clipboard-list "></i>
                        <span>Data Transaksi</span>
                    </a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php } elseif ($role  == "Penjual") { ?>

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Penjual</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php if (str_contains($tittle, "Dashboard")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php if (str_contains($tittle, "Dashboard")) {
                                                    echo "#";
                                                } else {
                                                    echo "../index.php";
                                                } ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Manage
                </div>


                <li class="nav-item <?php if (str_contains($tittle, "Transaksi")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Transaksi")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../penjual/transaksi/index.php";
                                                        } ?>">
                        <i class="fas fa-clipboard-list "></i>
                        <span>Data Transaksi</span>
                    </a>
                </li>

                <li class="nav-item <?php if (str_contains($tittle, "Produk")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Produk")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../penjual/produk/produk.php";
                                                        } ?>">
                        <i class="fas fa-clipboard-list "></i>
                        <span>Data Produk</span>
                    </a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php } else {
        ?>

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">User</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php if (str_contains($tittle, "Dashboard")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php if (str_contains($tittle, "Dashboard")) {
                                                    echo "#";
                                                } else {
                                                    echo "../user/index.php";
                                                } ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Manage
                </div>

                <li class="nav-item <?php if (str_contains($tittle, "Transaksi")) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="<?php if (str_contains($tittle, "Transaksi")) {
                                                            echo "#";
                                                        } else {
                                                            echo "../user/transaksi.php";
                                                        } ?>">
                        <i class="fas fa-clipboard-list "></i>
                        <span>Riwayat Transaksi</span>
                    </a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php } ?>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session_manager("get_session", ["username", "role"])['username'] ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../user/profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $tittle ?></h1>
                    </div>