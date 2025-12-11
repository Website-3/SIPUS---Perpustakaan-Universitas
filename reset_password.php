<?php
require "koneksi.php";

if (!isset($_GET['token'])) {
    die("Token tidak ditemukan!");
}

$token = $_GET['token'];

// cek token
$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE reset_token='$token'");
if (mysqli_num_rows($cek) !== 1) {
    die("Token tidak valid!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($koneksi, "UPDATE users SET password='$password', reset_token=NULL WHERE reset_token='$token'");

    echo "<script>
            alert('Password berhasil direset!');
            window.location='login.php';
          </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Reset Password - SIPUS</title>

<style>
/* ===== BASE ===== */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{
    background:url('img/bgl.jpg') no-repeat center center fixed;
    background-size:cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
}

/* ===== WARNA TEMA (SAMA PERSIS) ===== */
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

/* ===== NAVBAR IDENTIK ===== */
.navbar{
    position:fixed;
    top:0;left:0;
    width:100%;
    z-index:1000;
    padding:14px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(55,42,33,.65);
    border-bottom:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
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

/* LOGO */
.navbar img{
    width:46px;
    height:46px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--emas-soft);
    box-shadow:0 0 12px var(--emas-glow);
}
.navbar span{
    color:var(--emas-soft);
    font-weight:700;
    font-size:22px;
    text-shadow:0 0 6px var(--emas-glow);
}

/* ===== CARD RESET ===== */
.container{
    width:360px;
    margin:120px auto 140px auto;
    background:rgba(255,255,255,.65);
    padding:35px 30px;
    border-radius:16px;
    text-align:center;
    border:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,.55);
    animation:fadeIn .5s ease;
}

.container h2{
    color:#5a3e2b;
    margin-bottom:18px;
}

.container input{
    width:95%;
    padding:11px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #d5c7bc;
    outline:none;
}
.container input:focus{
    border-color:var(--emas-soft);
}

/* BUTTON EMAS */
.container button{
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
.container button:hover{
    transform:translateY(-3px);
    box-shadow:0 8px 18px var(--emas-glow);
}

/* LINK */
.container a{
    color:#5a3e2b;
    font-weight:600;
    text-decoration:none;
}
.container a:hover{
    text-decoration:underline;
}

/* ===== FOOTER IDENTIK ===== */
footer{
    width:100%;
    padding:14px;
    text-align:center;
    background:rgba(55,42,33,.65);
    color:var(--emas-bright);
    position:fixed;
    bottom:0;
    border-top:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
}

/* FADE */
@keyframes fadeIn{
    from{opacity:0;transform:translateY(15px)}
    to{opacity:1;transform:translateY(0)}
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


<div class="container fade">
    <h2>Reset Password</h2>

    <form method="POST">
        <input type="password" name="password" placeholder="Password Baru" required>
        <button type="submit">Reset Password</button>
    </form>

    <p><a href="login.php">Kembali ke Login</a></p>
</div>

<footer>
    © 2025 SIPUS - Universitas Lampung
</footer>

</body>
</html>
