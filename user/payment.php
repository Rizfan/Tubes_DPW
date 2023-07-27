<?php
include __DIR__ . './../src/proses/proses_session.php';
$get_qr = session_manager("get_session", [
    "qr_code",
]);
$tittle = 'Pembayaran';
include_once '../layout/navbar.php';

?>

<section id="keranjang" class="mt-4">
    <div class="card text-center">
        <div class="card-header">
            QR
        </div>
        <div class="card-body">
            <h5 class="card-title">Scan QR Berikut</h5>
            <hr>
            <img class="mx-auto d-block" width="500px" src="<?= $get_qr['qr_code'] ?>" alt="" srcset="">
        </div>
        
    </div>
</section>