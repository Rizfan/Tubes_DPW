<?php

require '.././src/database/users.php';

// Get All User
$users = get_all_user();
echo json_encode($users);