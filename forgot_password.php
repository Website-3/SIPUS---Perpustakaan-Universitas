<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) === 1) {

        $token = bin2hex(random_bytes(16));
        mysqli_query($koneksi, "UPDATE users SET reset_token='$token' WHERE email='$email'");

       header("Location: forgot_password.php?sent=1&go=$token");
exit();
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Lupa Password - SIPUS</title>

<style>
/* ===== BASE (PERSIS ABOUT) ===== */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{
    background:url('img/bgl.jpg') no-repeat center center fixed;
    background-size:cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
}

/* ===== WARNA TEMA ===== */
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

/* ===== NAVBAR (IDENTIK) ===== */
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

/* LOGO + SIPUS */
.navbar img{
    width:46px!important;
    height:46px!important;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--emas-soft);
    box-shadow:0 0 12px var(--emas-glow);
}
.navbar span{
    color:var(--emas-soft)!important;
    font-weight:700;
    font-size:22px;
    text-shadow:0 0 6px var(--emas-glow);
}

/* ===== FORM CARD ===== */
.login-box{
    width:360px;
    margin:120px auto 140px auto;
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

/* ===== FOOTER ===== */
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

/* ===== POPUP ===== */
.popup{
    position:fixed;
    inset:0;
    display:none;
    justify-content:center;
    align-items:center;
    background:rgba(0,0,0,.45);
    backdrop-filter:blur(4px);
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
.popup-content p{
    color:#3a2f29;        /* coklat gelap */
    font-weight:600;
    line-height:1.5;
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
    <h2>Lupa Password</h2>

    <?php if(isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <?php if(isset($_GET['sent'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        showPopup("Link reset password berhasil dibuat!");

        // AUTO REDIRECT KE HALAMAN RESET PASSWORD
        setTimeout(() => {
            window.location = "reset_password.php?token=<?= $_GET['go'] ?>";
        }, 1800); // 1.8 detik biar popup sempet muncul
    });
</script>
<?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Masukkan email Anda" required>
        <button type="submit">Kirim Link Reset</button>
    </form>

    <p style="margin-top:10px;">
        <a href="login.php" style="color:#5a3e2b;">Kembali ke Login</a>
    </p>
</div>

<footer>
    © 2025 SIPUS - Universitas Lampung
</footer>

<div id="popup" class="popup">
    <div class="popup-content">
        <p id="popup-message"></p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>

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
