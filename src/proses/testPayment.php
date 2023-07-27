<?php

include './proses_payment_gateway.php';

$getCookie = get_cookie();
var_dump($getCookie);
$validate_order = is_order_validated($getCookie, '082223127698');
var_dump($validate_order);
// $detail_order = detail_order($getCookie, $validate_order);
// var_dump($detail_order);
// $is_submit_order = submit_order($getCookie, $validate_order, '082223127698');
// var_dump($is_submit_order);
// $get_qr_code = get_qr_code($is_submit_order);