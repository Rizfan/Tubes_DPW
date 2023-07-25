<?php

require __DIR__ . '/../proses/proses_session.php';

session_manager("destroy_session");
redirect_to_role_page("http://localhost/Tubes_DPW/landing/");