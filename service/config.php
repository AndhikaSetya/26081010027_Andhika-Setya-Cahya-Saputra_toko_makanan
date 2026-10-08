<?php

$host ="localhost";
$user ="root";
$password ="";
$database = "toko_makanan";

$koneksi = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($koneksi->connect_error) {
    die('Maaf saya Pemula' . $koneksi->connect_error);
}