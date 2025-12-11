<?php 
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $data  = mysqli_fetch_assoc($query);

    if ($data) {
        if (!password_verify($password, $data['password'])) {
            $error = "Password salah!";
        } 
        elseif ($data['role'] !== $role) {
            $error = "Role tidak sesuai!";
        } 
        else {
            $_SESSION['login']    = true;
            $_SESSION['username'] = $data['username']; 
            $_SESSION['email']    = $data['email'];
            $_SESSION['role']     = $data['role'];

            if ($data['role'] === 'admin') {
                header("Location: admin/admin_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SIPUS</title>
    <link rel="stylesheet" href="style.css">

    <style>
/* ===== BASE (SAMA PERSIS ABOUT) ===== */
*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
body{
    background:url('img/bg.jpg') no-repeat center center fixed;
    background-size:cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
}
.bg-video{
    position:fixed;
    top:0;left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
}

/* LAPIS GELAP BIAR TEKS JELAS */
.video-overlay{
    position:fixed;
    top:0;left:0;
    width:100%;
    height:100%;
    background:rgba(40,30,20,0.55); /* coklat gelap */
    z-index:-1;
}
/* ===== WARNA TEMA GLOBAL ===== */
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

/* ===== NAVBAR (IDENTIK ABOUT) ===== */
.navbar{
    position:fixed;
    top:0;left:0;
    width:100%;
    height:auto;
    z-index:1000;
    padding:14px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(55,42,33,.65);
    border-bottom:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
}

/* LOGO */
.navbar img{
    width:46px!important;
    height:46px!important;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--emas-soft);
    box-shadow:0 0 12px var(--emas-glow);
}

/* TEKS SIPUS */
.navbar span{
    color:var(--emas-soft)!important;
    font-weight:700;
    font-size:22px;
    text-shadow:0 0 6px var(--emas-glow);
}

/* MENU */
.navbar a{
    margin-left:25px;
    text-decoration:none;
    font-weight:600;
    color:var(--text-cream);
    transition:.2s;
}
.navbar a:hover{
    color:var(--emas-bright);
}

/* ===== LOGIN CARD (GLASSMORPHISM ABOUT) ===== */
.login-box{
    width:360px;
    margin:120px auto 140px auto;
    padding:35px 30px;
    background:rgba(255,255,255,.65);
    border:1px solid var(--border-soft);
    border-radius:16px;
    text-align:center;
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

/* BUTTON (SAMA PERSIS ABOUT) */
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

/* ERROR */
.error{
    color:#b00000;
    margin-bottom:10px;
    font-size:14px;
}

/* LINK */
.login-box a{
    color:#5a3e2b;
    font-weight:600;
    text-decoration:none;
}
.login-box a:hover{
    text-decoration:underline;
}

/* ===== FOOTER (IDENTIK ABOUT) ===== */
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
.login-box select{
    width:95%;
    padding:11px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #d5c7bc;
    outline:none;
    background:#fff;
    color:#3a2f29;
}
.login-box select:focus{
    border-color:var(--emas-soft);
}
</style>
</head>

<body>
<video autoplay muted loop playsinline class="bg-video">
    <source src="img/book2.mp4" type="video/mp4">
</video>
<div class="video-overlay"></div>

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

    <!-- ===================== LOGIN FORM ===================== -->
    <div class="login-box">
        <h2>Login SIPUS</h2>

        <?php if(!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
    <input type="email" name="email" placeholder="Email" required autocomplete="off">
    <input type="password" name="password" placeholder="Password" required autocomplete="new-password">

    <!-- PILIHAN ROLE -->
    <select name="role" required>
        <option value="" disabled selected>Pilih Role</option>
        <option value="admin">Admin</option>
        <option value="user">Pengguna</option>
    </select>

    <button type="submit">Login</button>
</form>

        <p style="margin-top: 10px;">
            <a href="forgot_password.php" style="color:#5a3e2b;">Lupa Password?</a>
        </p>

        <a href="register.php" class="link-daftar" style="color:#5a3e2b;">Belum punya akun? Daftar</a>
    </div>

    <footer>
         © 2025 SIPUS - Universitas Lampung
    </footer>

</body>
</html>
