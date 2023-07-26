<?php

require_once './../src/proses/proses_session.php';

$current_session = session_manager("get_session", [
    "username",
    "role",
]);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle ?></title>

    <?php if (str_contains($tittle, "Dashboard")) { ?>
        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

        <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <?php } else { ?>

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

        <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <?php } ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light py-3 shadow bg-light">
                    <div class="container">
                        <a class="navbar-brand" href="index.php">
                            <img src="../assets/img/logo.png" width="" height="40" class="d-inline-block align-top" alt="">

                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Search" style="width: 100%;"> -->
                        <!-- <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button> -->
                        <!-- </form> -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link" href="../user/keranjang.php"><i class="fa fa-shopping-cart"></i></a>
                                </li>

                                <?php

                                if ($current_session["username"] != null) {

                                ?>
                                    <li class="nav-item dropdown mr-2">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <?= $current_session["username"] ?>
                                        </a>
                                        <div class="dropdown-menu">
                                            <?php if ($current_session["role"] == "Admin") { ?>
                                                <a href="./../admin/index.php" class="dropdown-item" aria-pressed="true">Dashboard</a>
                                            <?php } elseif ($current_session['role'] == "Penjual") { ?>
                                                <a href="./../penjual/index.php" class="dropdown-item" aria-pressed="true">Dashboard</a>
                                            <?php } else { ?>
                                                <a href="./../user/index.php" class="dropdown-item" aria-pressed="true">Dashboard</a>
                                            <?php } ?>

                                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item" aria-pressed="true">Logout</a>
                                        </div>
                                    </li>
                                <?php

                                } else {

                                ?>
                                    <li class="nav-item">
                                        <a href="./../register.php" class="btn btn-outline-primary mr-2" aria-pressed="true">Daftar</a>
                                        <a href="./../login.php" class="btn btn-primary" aria-pressed="true">Masuk</a>
                                    </li>
                                <?php

                                }

                                ?>

                            </ul>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label for="search">Cari Produk</label>
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container mt-2">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div> -->