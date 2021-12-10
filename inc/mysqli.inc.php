<?php

// Create connection
global $db_servername, $db_username, $db_password, $db_name;
$con = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
