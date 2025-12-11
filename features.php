<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Features - SIPUS</title>

    <style>
/* ===== BASE ===== */
*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
body{
    background: url('img/bg.jpg') no-repeat center center fixed;
    background-size: cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
    animation:fadeBody 1s ease;
}

@keyframes fadeBody{
    from{opacity:0;}
    to{opacity:1;}
}

/* WARNA TEMA */
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

/* NAVBAR */
.navbar{
    position:fixed;top:0;left:0;width:100%;z-index:100;
    padding:14px 32px;
    display:flex;justify-content:space-between;align-items:center;
    background:rgba(55,42,33,.65);
    border-bottom:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
    animation:fadeDown .8s ease;
}
@keyframes fadeDown{
    from{opacity:0;transform:translateY(-25px);}
    to{opacity:1;transform:translateY(0);}
}
.navbar nav a{
    margin-left:25px;
    text-decoration:none;
    font-weight:600;
    color:var(--text-cream);
    transition:.25s ease;
}
.navbar nav a:hover{
    color:var(--emas-bright);
    text-shadow:0 0 12px var(--emas-glow);
}

/* LOGO */
.navbar img{
    width:46px !important;
    height:46px !important;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--emas-soft);
    box-shadow:0 0 12px var(--emas-glow);
    transition:.35s ease;
}
.navbar img:hover{
    transform:scale(1.1);
    box-shadow:0 0 20px var(--emas-glow);
}
.navbar span{
    color:var(--emas-soft) !important;
    font-weight:700;
    text-shadow:0 0 6px var(--emas-glow);
}

/* CARD UTAMA */
.card{
    max-width:900px;
    margin:110px auto 160px auto;
    background:rgba(255,255,255,.55);
    border:1px solid var(--border-soft);
    border-radius:18px;
    padding:35px 30px;
    text-align:center;
    backdrop-filter:blur(14px);
    box-shadow:0 10px 25px rgba(0,0,0,.55);
    transform:translateY(30px);
    opacity:0;
    transition:.9s ease;
}
.card.show{
    opacity:1;
    transform:translateY(0);
}
.card h2{
    color:#5a3e2b;
    margin-bottom:25px;
    text-shadow:0 0 8px rgba(255,255,255,.6);
}

/* GRID FITUR */
.features-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:22px;
}

.feature-box{
    background:rgba(255,255,255,.6);
    border-radius:16px;
    padding:18px;
    box-shadow:0 6px 16px rgba(0,0,0,.3);
    transition:.35s ease;
    opacity:0;
    transform:translateY(40px) scale(.95);
}
.feature-box.show{
    opacity:1;
    transform:translateY(0) scale(1);
}

.feature-box:hover{
    transform:translateY(-6px) scale(1.04);
    box-shadow:0 12px 30px var(--emas-glow);
}
.feature-box img{
    width:100%;
    height:150px;
    object-fit:cover;
    border-radius:14px;
    margin-bottom:12px;
}
.feature-box h3{
    color:#5a3e2b;
    font-weight:600;
    font-size:17px;
}

/* BUTTON */
.back-btn{
    display:inline-block;
    margin-top:30px;
    padding:12px 25px;
    background:linear-gradient(90deg,var(--emas-soft),var(--emas-bright));
    color:#3d2e15;
    text-decoration:none;
    font-weight:700;
    border-radius:10px;
    transition:.3s ease;
}
.back-btn:hover{
    box-shadow:0 8px 20px var(--emas-glow);
    transform:translateY(-3px) scale(1.05);
}

/* FOOTER */
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
    </style>
</head>

<body>

<header class="navbar">
    <div style="display: flex; align-items: center; gap: 10px;">
        <img src="img/logo.jpg" alt="Logo SIPUS">
        <span style="font-size: 20px; font-weight: 700;">SIPUS</span>
    </div>

    <nav>
        <a href="about.php">Tentang</a>
        <a href="features.php">Fitur</a>
        <a href="contact.php">Kontak</a>
    </nav>
</header>

<div class="card" id="mainCard">
    <h2>Fitur SIPUS</h2>

    <div class="features-grid">
        <div class="feature-box"><img src="img/koleksi.jpg"><h3>Koleksi Buku</h3></div>
        <div class="feature-box"><img src="img/status.jpg"><h3>Status Buku</h3></div>
        <div class="feature-box"><img src="img/informasi.jpg"><h3>Informasi Perpustakaan</h3></div>
    </div>

    <a href="index.php" class="back-btn">Kembali</a>
</div>

<footer>
    © 2025 SIPUS - Universitas Lampung
</footer>


<!-- ==== ANIMASI JS ==== -->
<script>
// Animasi card utama
window.addEventListener("load", ()=>{
    document.getElementById("mainCard").classList.add("show");

    // animasi muncul grid item satu per satu
    const items = document.querySelectorAll(".feature-box");
    items.forEach((box, i)=>{
        setTimeout(()=>{ box.classList.add("show"); }, 200 * (i+1));
    });
});

// Parallax subtle saat mouse bergerak
document.addEventListener("mousemove", (e)=>{
    const card = document.getElementById("mainCard");
    const moveX = (e.clientX - window.innerWidth/2) * 0.002;
    const moveY = (e.clientY - window.innerHeight/2) * 0.003;
    card.style.transform = `translate(${moveX}px, ${30 + moveY}px)`;
});
</script>

</body>
</html>
