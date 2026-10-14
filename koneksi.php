<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "skanet_malik";

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_errno) {
    die("Database tidak terhubung: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8mb4");

?>