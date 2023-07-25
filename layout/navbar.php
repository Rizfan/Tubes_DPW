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
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <?php } else { ?>

        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
                <nav class="navbar navbar-expand-lg navbar-light py-4" style="background-color: #EEEEEE;">
                    <a class="navbar-brand" href="index.php">
                        <img src="../assets/img/logo.png" width="" height="40" class="d-inline-block align-top" alt="">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Search" style="width: 1050px;">
                        <!-- <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Keranjang</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">

                        <?php

                        if ($current_session["username"] != null) {

                        ?>
                            <a href="./../src/proses/proses_logout.php" class="btn btn-primary my-2-sm-0 mr-3" role="button" aria-pressed="true">Logout</a>

                        <?php

                        } else {

                        ?>
                            <a href="./../register.php" class="btn btn-primary my-2-sm-0 mr-3" role="button" aria-pressed="true">Daftar</a>
                            <a href="./../login.php" class="btn btn-primary my-2-sm-0" role="button" aria-pressed="true">Masuk</a>

                        <?php

                        }

                        ?>




                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div> -->