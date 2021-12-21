<?php
include_once('inc/config.php');
if (isset($_POST['user_id']) && $_POST['user_id']!='') {
    $sql = "SELECT * FROM `users` WHERE `id` = ".$_POST['user_id']."";
    $data = mysqli_query($con, $sql);    
    while ($user = mysqli_fetch_assoc($data)) {
        die(json_encode($user));
    }
}