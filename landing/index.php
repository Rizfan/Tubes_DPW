<?php

require_once './../src/proses/proses_session.php';

$current_session = session_manager("get_session", [
    "username",
    "role",
]);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Bybit Store</title>


    <!-- <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"> -->

</head>

<body>

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
                    <a class="nav-link" href="../user/keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../user/index.php">Riwayat</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">

            <?php

            if ($current_session["username"] != null) {

            ?>
                <a href="./../src/proses/proses_logout.php" class="btn btn-primary my-2-sm-0 mr-3" role="button" aria-pressed="true">Logout</a>
                <a herf="./"><?= $current_session["username"] ?></a>
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


    <div class="container mt-3">
        <!-- <section id="image-carousel" class="splide" aria-label="Beautiful Images">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="../assets/img/1.jpeg" alt="">
                    </li>
                    <li class="splide__slide">
                        <img src="../assets/img/2.jpeg" alt="">
                    </li>
                    <li class="splide__slide">
                        <img src="../assets/img/3.jpeg" alt="">
                    </li>
                </ul>
            </div>
        </section> -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/upload/produk/1442200225_20200213_103459.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/upload/produk/112193035_20200213_103459.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/upload/produk/27163977_20200213_103459.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Produk Unggulan
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="../assets/upload/produk/1442200225_20200213_103459.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Benih Rispan</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="../assets/upload/produk/1442200225_20200213_103459.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Benih Sandro</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Bibit Lele
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Benih Rispan</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Benih Sandro</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



    <script>
        new Splide('#image-carousel').mount();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

</body>

<?php
include '../layout/footer1.php'
?>