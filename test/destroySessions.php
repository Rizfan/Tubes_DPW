<?php

require '.././src/proses/proses_session.php';


print_r(
    session_manager("destroy_session", null)
);