<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About - SIPUS</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
/* ===== BASE ===== */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}
:root {
    --coklat-d1:#3a2f29;
    --coklat-d2:#4a3a31;
    --coklat-mid:#6b5143;
    --coklat-soft:#8b6d5c;

    --emas-soft:#e6d3a3;
    --emas-bright:#f7e9c3;
    --emas-glow:rgba(247,229,173,0.55);

    --text-cream:#f7efe6;
    --border-soft:rgba(255,255,255,0.12);

    --card-bg: rgba(255,255,255,0.55);
}

body {
    background: url('img/bg.jpg') no-repeat center center fixed;
    background-size: cover;
    color: var(--text-cream);
    padding-top: 90px;
    overflow-x: hidden;
    transition: .3s;
}

/* ===== NAVBAR ===== */
.navbar {
    position: fixed;
    top: 0; left: 0;
    width: 100%;
    padding: 14px 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(55,42,33,0.65);
    border-bottom: 1px solid var(--border-soft);
    backdrop-filter: blur(12px);
    z-index: 100;
}

.nav-left {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 22px;
    font-weight: 700;
    color: var(--emas-soft);
}
.nav-left img {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid var(--emas-soft);
    box-shadow: 0 0 12px var(--emas-glow);
    transition: .3s;
}
.nav-left img:hover {
    transform: scale(1.07);
    box-shadow: 0 0 16px var(--emas-glow);
}

.navbar nav a {
    margin-left: 25px;
    font-weight: 600;
    text-decoration: none;
    color: var(--text-cream);
    transition: .2s;
}
.navbar nav a:hover {
    color: var(--emas-bright);
    text-shadow: 0 0 8px var(--emas-glow);
}
.navbar nav a.active { 
    color: var(--emas-bright) !important;
}

/* ===== CONTENT WRAPPER ===== */
.page-container {
    max-width: 900px;
    margin: 20px auto 120px auto;
    padding: 0 20px;
}

/* ===== ABOUT CARD ===== */
#aboutCard {
    background: var(--card-bg);
    padding: 35px;
    border-radius: 16px;
    border: 1px solid var(--border-soft);
    backdrop-filter: blur(14px);
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.45);
    opacity: 0;
    transform: translateY(30px);
    transition: 1s ease;
}
#aboutCard.show {
    opacity: 1;
    transform: translateY(0);
}
#aboutCard h2 {
    color: #4a3428;
    font-size: 28px;
    margin-bottom: 10px;
}
#aboutCard p {
    color: #6b4a39;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* ===== SECTION TITLE ===== */
.section-title {
    font-size: 26px;
    font-weight: 700;
    margin-top: 55px;
    margin-bottom: 20px;
    color: var(--emas-bright);
    text-shadow: 0 0 8px var(--emas-glow);
    opacity: 0;
    transform: translateY(20px);
    transition: .8s ease;
}
.section-title.show {
    opacity: 1;
    transform: translateY(0);
}

/* ===== GRID CARDS ===== */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    gap: 26px;
}

.card {
    background: var(--card-bg);
    padding: 25px;
    border-radius: 16px;
    border: 1px solid var(--border-soft);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.45);
    transition: .4s ease;
    opacity: 0;
    transform: translateY(40px) scale(.95);
}
.card.show {
    opacity: 1;
    transform: translateY(0) scale(1);
}
.card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 15px 40px var(--emas-glow);
}
.card-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #463325;
}
.card p {
    line-height: 1.6;
    color: #513a31;
}

/* ===== BACK BUTTON ===== */
.back-btn {
    display: inline-block;
    padding: 12px 25px;
    margin-top: 10px;
    background: linear-gradient(90deg, var(--emas-soft), var(--emas-bright));
    color: #3a2e15;
    font-weight: 700;
    border-radius: 10px;
    text-decoration: none;
    transition: .3s ease;
}
.back-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px var(--emas-glow);
}

/* ===== FOOTER ===== */
footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 14px;
    background: rgba(55,42,33,0.75);
    color: var(--emas-bright);
    text-align: center;
    border-top: 1px solid var(--border-soft);
    backdrop-filter: blur(8px);
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="nav-left">
        <img src="img/logo.jpg" alt="Logo SIPUS">
        SIPUS
    </div>
    <nav>
        <a href="about.php" class="active">Tentang</a>
        <a href="features.php">Fitur</a>
        <a href="contact.php">Kontak</a>
    </nav>
</header>

<!-- CONTENT -->
<div class="page-container">

    <!-- CARD ABOUT -->
    <div id="aboutCard">
        <h2>Tentang SIPUS</h2>
        <p>
            SIPUS adalah Sistem Informasi Perpustakaan Universitas yang menyediakan akses cepat,
            modern, dan terintegrasi untuk melihat koleksi, melakukan peminjaman, serta mengakses
            seluruh layanan perpustakaan secara digital.
        </p>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>

    <!-- SECTION VISI MISI -->
    <div class="section-title" id="judul1">Visi & Misi SIPUS</div>

    <div class="grid">
        <div class="card">
            <div class="card-title">Visi</div>
            <p>Menjadi sistem perpustakaan digital terbaik dengan pelayanan cepat, modern, dan mudah diakses kapan saja.</p>
        </div>

        <div class="card">
            <div class="card-title">Misi</div>
            <p>Mendukung kegiatan akademik melalui layanan informasi berkualitas, responsif, dan inovatif.</p>
        </div>

        <div class="card">
            <div class="card-title">Tujuan</div>
            <p>Meningkatkan efisiensi akses koleksi, peminjaman, serta kenyamanan dalam menggunakan layanan perpustakaan.</p>
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer>
    © 2025 SIPUS - Universitas Lampung
</footer>
<script>
// ===== ANIMASI KARTU UTAMA (FADE + SLIDE) =====
window.addEventListener("load", () => {
    const mainCard = document.getElementById("aboutCard");
    setTimeout(() => {
        mainCard.classList.add("show");
    }, 150);
});

// ===== ANIMASI MUNCUL SAAT SCROLL (FADE + FLOAT) =====
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.add("show");
        }
    });
},{ threshold: 0.2 });

document.querySelectorAll(".section-title, .card").forEach(el => observer.observe(el));

// ===== PARALLAX GERAK KURSOR HALUS =====
document.addEventListener("mousemove", e => {
    const card = document.getElementById("aboutCard");
    const x = (window.innerWidth / 2 - e.clientX) / 60;
    const y = (window.innerHeight / 2 - e.clientY) / 60;
    card.style.transform = `translate(${x}px, ${y}px)`;
});

// ===== PARALLAX BACKGROUND (MEWAH) =====
window.addEventListener("scroll", () => {
    const scrolled = window.scrollY * 0.25;
    document.body.style.backgroundPositionY = `-${scrolled}px`;
});

// ===== HOVER HALUS UNTUK KARTU =====
document.querySelectorAll(".card").forEach(card => {
    card.addEventListener("mouseenter", () => {
        card.style.transition = "transform .4s ease, box-shadow .4s ease";
        card.style.transform = "translateY(-6px) scale(1.04)";
    });
    card.addEventListener("mouseleave", () => {
        card.style.transform = "translateY(0) scale(1)";
    });
});

// ===== ANIMASI TEKS BERKEDIP HALUS =====
const titles = document.querySelectorAll(".section-title");
titles.forEach(t => {
    t.style.transition = "opacity 1s ease, transform 1s ease, text-shadow .6s ease";
});
</script>


</body>
</html>
