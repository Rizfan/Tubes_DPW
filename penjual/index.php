<?php

include __DIR__ . '/../src/proses/proses_session.php';
if (session_manager("get_session", ["username", "role"])['role'] != "Penjual") {
    redirect_to_role_page(
        "http://localhost/Tubes_DPW/"
    );
}
$id_penjual = session_manager("get_session", ['id_penjual'])['id_penjual'];
// var_dump($id_penjual);

$tittle = "Dashboard";
include '../layout/master_dashboard.php';
include '../src/database/dashboard.php';
?>
<section id="dashboard">

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transaksi Proses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php count_riwayat_transaksi_proses() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi Selesai
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php count_riwayat_transaksi_selesai($id_penjual) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>


<?php
include '../layout/footer.php';
?>