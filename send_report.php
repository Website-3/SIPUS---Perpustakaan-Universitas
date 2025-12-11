<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama  = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];

    // Kamu bisa simpan ke database / email - ini contoh minimal
    file_put_contents("pengaduan.txt",
        "Nama: $nama\nEmail: $email\nPesan: $pesan\n---\n",
        FILE_APPEND
    );

    echo "OK";
    exit;
}
?>
