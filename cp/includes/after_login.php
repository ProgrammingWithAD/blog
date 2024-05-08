<?php
    include 'db_config.php';
    $thisPage=get_actual_link();
    is_login();
    $dh_user_id=$_SESSION['login']['user_id'];

