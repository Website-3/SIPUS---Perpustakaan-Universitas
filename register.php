<?php 
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // cek email sudah ada atau belum
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Email sudah terdaftar!";
    } else {

        // hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // insert user
        $query = mysqli_query($koneksi, 
            "INSERT INTO users (username, email, password, role) 
             VALUES ('$nama', '$email', '$hash', 'user')"
        );

        if ($query) {
            $success = "Pendaftaran berhasil! Silakan login.";
        } else {
            $error = "Terjadi kesalahan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - SIPUS</title>
    <link rel="stylesheet" href="style.css">

    <style>
/* ===== BASE SIPUS ===== */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

body{
    background:url('img/bgl.jpg') no-repeat center center fixed;
    background-size:cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
}

/* ===== WARNA UTAMA ===== */
:root{
    --coklat-d1:#3a2f29;
    --coklat-d2:#4a3a31;
    --coklat-mid:#6b5143;
    --coklat-soft:#8b6d5c;

    --emas-soft:#e6d3a3;
    --emas-bright:#f7e9c3;
    --emas-glow:rgba(247,229,173,.55);

    --text-cream:#f7efe6;
    --border-soft:rgba(255,255,255,.12);
}

/* ===== NAVBAR ===== */
.navbar{
    position:fixed;
    top:0;left:0;
    width:100%;
    padding:14px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(55,42,33,.65);
    border-bottom:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
    z-index:1000;
}
.navbar a{
    margin-left:25px;
    text-decoration:none;
    font-weight:600;
    color:var(--text-cream);
}
.navbar a:hover{
    color:var(--emas-bright);
}

/* LOGO & SIPUS */
.navbar img{
    width:46px;
    height:46px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--emas-soft);
    box-shadow:0 0 12px var(--emas-glow);
}
.navbar span{
    font-size:22px;
    font-weight:700;
    color:var(--emas-soft);
    text-shadow:0 0 6px var(--emas-glow);
}

/* ===== CARD FORM ===== */
.login-box{
    width:360px;
    margin:120px auto 150px auto;
    background:rgba(255,255,255,.65);
    padding:35px 30px;
    border-radius:16px;
    text-align:center;
    border:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,.55);
}
.login-box h2{
    color:#5a3e2b;
    margin-bottom:20px;
}

/* INPUT */
.login-box input{
    width:95%;
    padding:11px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #d5c7bc;
    outline:none;
}
.login-box input:focus{
    border-color:var(--emas-soft);
}

/* BUTTON */
.login-box button{
    width:95%;
    padding:11px;
    margin-top:10px;
    background:linear-gradient(90deg,var(--emas-soft),var(--emas-bright));
    color:#3d2e15;
    font-weight:700;
    border:none;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}
.login-box button:hover{
    transform:translateY(-3px);
    box-shadow:0 8px 18px var(--emas-glow);
}

/* MESSAGE */
.error{
    color:#b00000;
    margin-bottom:10px;
    font-size:14px;
}
.success{
    color:#207a3a;
    margin-bottom:10px;
    font-size:14px;
}

/* LINK */
.link-login{
    margin-top:12px;
    display:block;
    font-weight:600;
    color:#5a3e2b;
    text-decoration:none;
}
.link-login:hover{
    text-decoration:underline;
}

/* ===== FOOTER ===== */
footer{
    width:100%;
    padding:14px;
    text-align:center;
    position:fixed;
    bottom:0;
    background:rgba(55,42,33,.65);
    color:var(--emas-bright);
    border-top:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
}

/* ===== POPUP ===== */
.popup{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.45);
    backdrop-filter:blur(4px);
    justify-content:center;
    align-items:center;
    z-index:2000;
}
.popup-content{
    background:rgba(255,255,255,.85);
    padding:25px;
    border-radius:14px;
    width:320px;
    text-align:center;
    border:1px solid var(--border-soft);
    box-shadow:0 10px 25px rgba(0,0,0,.45);
}
.popup-content button{
    margin-top:12px;
    padding:8px 22px;
    background:linear-gradient(90deg,var(--emas-soft),var(--emas-bright));
    border:none;
    color:#3d2e15;
    font-weight:700;
    border-radius:10px;
    cursor:pointer;
}
</style>

</head>

<body>

    <header class="navbar">
    <div style="display:flex; align-items:center; gap:12px;">
        <img src="img/logo.jpg">
        <span style="font-size:22px; font-weight:700; color:white;">SIPUS</span>
        </div>

        <div class="nav-right">
            <a href="about.php">Tentang</a>
            <a href="features.php">Fitur</a>
            <a href="contact.php">Kontak</a>
        </div>
    </header>


    <div class="login-box">
        <h2>Daftar Akun</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
            <button type="submit">Daftar</button>
        </form>

        <a class="link-login" href="login.php">Sudah punya akun? Login</a>
    </div>

    <footer>
         © 2025 SIPUS - Universitas Lampung
    </footer>
    <!-- MODAL NOTIFIKASI -->
<div id="popup" class="popup">
    <div class="popup-content">
        <p id="popup-message"></p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>

<style>
.popup {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.4);
    backdrop-filter: blur(3px);
    justify-content: center;
    align-items: center;
    z-index: 2000;
}

.popup-content {
    background: #fff7f0;
    padding: 25px;
    border-radius: 12px;
    width: 320px;
    text-align: center;
    border: 2px solid #a47551;
}

.popup-content button {
    margin-top: 10px;
    padding: 8px 20px;
    background: #a47551;
    border: none;
    color: white;
    border-radius: 8px;
}
</style>

<script>
function showPopup(message) {
    document.getElementById("popup-message").innerText = message;
    document.getElementById("popup").style.display = "flex";
}
function closePopup() {
    document.getElementById("popup").style.display = "none";
}
</script>


</body>
</html>
