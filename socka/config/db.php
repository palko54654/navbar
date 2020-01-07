<?php
$server = "127.0.0.1";
$user   = "root";
$pass   = "";
$database   = "cldb";
$db = mysqli_connect($server, $user, $pass, $database);
mysqli_query($db, 'SET CHARACTER SET utf8');
?>