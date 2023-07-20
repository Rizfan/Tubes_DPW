<?php

/**
 * dompet Sederss
 */

require_once '.././src/database/dompet.php';
require_once '.././src/utils.php';
require_once '.././src/database/penjual.php';

// Create dompet
$penjual = get_all_penjual();
$i = 0;
foreach ($penjual as $d) {
    $id_penjual = ($d['id_penjual']);
    $saldo = rand(100000000, 999999999);

    create_dompet($id_penjual, $saldo);

    echo "Dompet " . $i++ . " created <br>";
}
