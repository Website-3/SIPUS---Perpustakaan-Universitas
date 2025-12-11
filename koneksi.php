<?php
$koneksi = mysqli_connect("localhost:3307", "root", "", "sipus");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
