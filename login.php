<?php
$tittle = "Login";
include 'layout/navbar.php';
?>

<section id="Login">
    <center>

        <div class="row justify-content-center mb-4">
            <div class="col">
                <div class="col-md-5">
                    <div class="card text-left">
                        <div class="card-header">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="login_proses.php" method="POST">
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                </div>
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</section>

<?php
include 'layout/footer1.php';
?>