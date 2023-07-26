<?php
require_once './../src/proses/proses_session.php';
if (session_manager("get_session", ['username', 'id_penjual'])['id_penjual'] != NULL) {
    redirect_to_role_page("http://localhost/Tubes_DPW/penjual/index.php");
}
$id_user = session_manager("get_session", ['id_user'])['id_user'];

$tittle = 'Dashboard';
require_once './../src/database/dashboard.php';
include '../layout/master_dashboard.php';

?>

<section id="dashboard">

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Riwayat Transaksi
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php count_riwayat_transaksi($id_user) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<?php
include '../layout/footer.php';
?>