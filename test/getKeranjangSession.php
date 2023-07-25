<?php

require '.././src/proses/proses_session.php';

foreach (session_manager("get_session", [
    "keranjang",
])['keranjang'] as $key => $value) {
    echo $value;
}

echo "<br>";

var_dump(
    session_manager("get_session", [
        "keranjang",
    ])
);