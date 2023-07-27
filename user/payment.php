<?php
include __DIR__ . './../src/proses/proses_session.php';
$get_qr = session_manager("get_session", [
    "qr_code",
]);
$tittle = 'Pembayaran';
include_once '../layout/navbar.php';

?>

<section id="keranjang" class="mt-4">

    <div class="row">

        <img src="<?=$get_qr['qr_code']?>" alt="" srcset="">

    </div>
</section>