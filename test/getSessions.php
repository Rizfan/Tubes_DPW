<?php

require '.././src/proses/proses_session.php';

var_dump(
        session_manager("get_session", [
                "username",
                "role",
                "keranjang",
        ])
);

echo "<br>";
