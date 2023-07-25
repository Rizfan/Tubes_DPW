<?php

require_once './src/proses/proses_session.php';

// Redirect ke index jika sudah login akan masuk ke halaman sesuai role
if (session_manager("get_session", "username") != null) {
    header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                            </div>

                            <?php
                                if (@$_REQUEST['status'] == 'failed'){
                            ?>

                            <div class="alert alert-danger" role="alert">
                                Gagal mendaftar akun
                            </div>

                            <?php
                                }
                            ?>

                            <form class="user" method="POST" action="./src/proses/proses_register.php">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleUsername"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Nomor Telepon" name="no_telp">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-primary btn-user btn-block"
                                            name="validasi_no">Validasi</button>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Kata sandi" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Kata Sandi?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Sudah Punya Akun? Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>
    <script src="./assets/vendor/jquery/jquery.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('button[name="validasi_no"]').click(function() {
            var no_telp = $('input[name="no_telp"]').val();
            $.ajax({
                url: "http://47.88.53.4:3333/api/ewallet/linkaja/" + no_telp,
                type: "GET",
                header: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Host": "47.88.53.4:3333",
                    "User-Agent": "insomnia/2023.4.0"
                },
                success: function(data) {
                    if (data.status === true) {
                        $('input[name="no_telp"]').attr('readonly', true);
                        $('button[name="validasi_no"]').attr('disabled', true);
                        $('button[name="validasi_no"]').html('Validasi Berhasil');
                        $('button[name="validasi_no"]').removeClass('btn-primary');
                        $('button[name="validasi_no"]').addClass('btn-success');
                    } else {
                        alert('Nomor telepon tidak terdaftar pada LinkAja');
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
    </script>
</body>

</html>