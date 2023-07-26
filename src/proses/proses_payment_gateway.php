<?php

const BASE_API = 'https://hotelmurah.com/';

/**
 * Curl Function
 *
 * Curl Function for Accesing API
 *
 * @param Type $url Url API
 * @param Type $method Method Request
 * @param Type $postfields Postfields Request
 * @param Type $followlocation Follow Redirect Request
 * @param Type $headers Custom Headers Request
 * @param Type $conf_proxy Custom Proxy Request
 *
 * @return type Array
 **/
function curl(
    $url,
    $method = null,
    $postfields = null,
    $followlocation = null,
    $headers = null,
    $proxy = null,
    $agent = null
) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    if ($agent) {
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    }
    if ($proxy) {
        $parts = parse_url($proxy);
        if (!$parts || !isset($parts['scheme'], $parts['host']) || ($parts['scheme'] !== 'http' && $parts['scheme'] !== 'https')) {
            echo "Invalid proxy URL " . $proxy . "";
            die();
        }
        if (isset($parts['user'])) {
            $proxyAuth = $parts['user'] . ':' . $parts['pass'];
        } else {
            $proxyAuth = false;
        }
        curl_setopt($ch, CURLOPT_PROXY, $parts['host']);
        curl_setopt($ch, CURLOPT_PROXYPORT, $parts['port']);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLOPT_HTTPPROXYTUNNEL);
        curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);
        if ($proxyAuth) {
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
        }
    }
    if ($followlocation !== null) {
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, $followlocation['Max']);
    }
    if ($method == "PUT") {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    }
    if ($method == "GET") {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    }
    if ($method == "POST") {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    }
    if ($headers !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    $result = curl_exec($ch);
    $header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    return array(
        'HttpCode' => $httpcode,
        'Header' => $header,
        'Body' => $body,
        'Cookiev2' => http_build_query($cookies, '', '; '),
        'Cookie' => $cookies,
        'Requests Config' => [
            'Url' => $url,
            'Header' => $headers,
            'Method' => $method,
            'Post' => $postfields,
        ],
    );
}

function get_cookie()
{
    $request_cookie = curl(
        constant('BASE_API') . 'pulsa/top-up-linkaja',
        'GET',
        null,
        null,
        [
            'Host: hotelmurah.com',
            'Connection: keep-alive',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        ],
        null,
        null
    );

    if (@$request_cookie['Cookie']['hotelmurah_csrf_cookie_name'] != null && @$request_cookie['Cookie']['ci_session'] != '') {
        return [
            'cookiev1' => $request_cookie['Cookie'],
            'cookiev2' => $request_cookie['Cookiev2'],
        ];
    } else {
        return false;
    }

}

function is_order_validated($cookie, $cust_target)
{

    $request_is_order_validated = curl(
        constant('BASE_API') . 'pulsa/index.php/ewallet/isOrderValidated',
        'POST',
        'cust_number=' . $cust_target . '&id=44&tipe_produk=13&web=web&hm_csrf_hash_name=' . $cookie['cookiev1']['hotelmurah_csrf_cookie_name'],
        null,
        [
            'Host: hotelmurah.com',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'Cookie: ' . $cookie['cookiev2'],
        ],
        null,
        null
    );

    if (@json_decode($request_is_order_validated['Body'], true)['title'] == 'Success') {
        return json_decode($request_is_order_validated['Body'], true)['data'];
    } else {
        return false;
    }

}

function detail_order($cookie, $data)
{

    $request_detail_order = curl(
        constant('BASE_API') . 'pulsa/Ewallet/detailOrder',
        'POST',
        'hm_csrf_hash_name=' . $cookie['cookiev1']['hotelmurah_csrf_cookie_name'] . '&data=' . $data,
        null,
        [
            'Host: hotelmurah.com',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'Referer: https://hotelmurah.com/pulsa/top-up-linkaja',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'Cookie: ' . $cookie['cookiev2'],
        ],
        null,
        null
    );

    print_r($request_detail_order);

}

function submit_order($cookie, $data_order_valid, $cust_target)
{

    $request_submit_order = curl(
        constant('BASE_API') . 'pulsa/ewallet/submitorder',
        'POST',
        'stats=&data=' . urlencode($data_order_valid) . '&payment_type=100&id_pay=101&payment_pay=gopay&no_ovo=' . $cust_target . '&type_pembayaran=m13&source=&validasiTelkomsel=&hm_csrf_hash_name=' . $cookie['cookiev1']['hotelmurah_csrf_cookie_name'],
        null,
        [
            'Host: hotelmurah.com',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'Referer: https://hotelmurah.com/pulsa/Ewallet/detailOrder',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'Cookie: ' . $cookie['cookiev2'],
        ],
        null,
        null
    );

    if (@json_decode($request_submit_order['Body'], true)['tokenPayment'] != '') {
        return @json_decode($request_submit_order['Body'], true)['tokenPayment'];
    } else {
        return false;
    }

}

function get_qr_code($trx_id)
{

    $requests_qr_code = curl(
        'https://app.midtrans.com/snap/v2/transactions/' . $trx_id . '/charge',
        'POST',
        '{"payment_params":{"acquirer":["gopay"]},"payment_type":"qris"}',
        null,
        [
            'Host: app.midtrans.com',
            'Content-Type: application/json',
            'Cookie: preferredPayment-M098309=gopay',
        ],
        null,
        null
    );
    return json_decode($requests_qr_code['Body'], true)['qris_url'];
}

$getCookie = get_cookie();
print_r($getCookie);

$validate_order = is_order_validated($getCookie, '082223127698');
print_r($validate_order);

$detail_order = detail_order($getCookie, $validate_order);
print_r($detail_order);

$is_submit_order = submit_order($getCookie, $validate_order, '082223127698');
print_r($is_submit_order);

$get_qr_code = get_qr_code($is_submit_order);
print_r($get_qr_code);