<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'crud';

$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    echo "error" . $mysqli->error;
}