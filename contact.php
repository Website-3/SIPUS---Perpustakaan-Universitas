<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - SIPUS</title>

<style>
/* ===== BASE ===== */
*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
body{
    background:url('img/bg.jpg') no-repeat center center fixed;
    background-size:cover;
    color:var(--text-cream);
    padding-top:80px;
    overflow-x:hidden;
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
    position:fixed;
    top:0;left:0;
    width:100%;
    z-index:100;
    padding:14px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(55,42,33,.65);
    border-bottom:1px solid var(--border-soft);
    backdrop-filter:blur(10px);
}
.navbar nav a{
    margin-left:25px;
    text-decoration:none;
    font-weight:600;
    color:var(--text-cream);
    transition:.2s;
}
.navbar nav a:hover{
    color:var(--emas-bright);
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
.navbar span{
    color:var(--emas-soft)!important;
    font-weight:700;
    text-shadow:0 0 6px var(--emas-glow);
}

/* --- CONTAINER DUA KOLOM --- */
.contact-wrapper{
    width:100%;
    max-width:950px;
    margin:120px auto 120px auto;
    display:flex;
    justify-content:space-between;
    gap:30px;
    padding:0 20px;
}

/* CARD KONTAK */
.card{
    width:48%;
    background:rgba(255,255,255,.65);
    border:1px solid var(--border-soft);
    border-radius:16px;
    padding:35px 30px;
    text-align:center;
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,.55);
    opacity:0;
    transform:translateY(30px);
    transition:.8s ease;
}
.card.show{opacity:1;transform:translateY(0);}
.card h2{
    color:#5a3e2b;
    margin-bottom:15px;
}
.card p{
    color:#6b4a39;
    line-height:1.6;
    margin:8px 0;
}
.back-btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:linear-gradient(90deg,var(--emas-soft),var(--emas-bright));
    color:#3d2e15!important;
    text-decoration:none;
    font-weight:700;
    border-radius:10px;
    transition:.3s;
}
.back-btn:hover{
    box-shadow:0 8px 18px var(--emas-glow);
    transform:translateY(-3px);
}

/* FORM PENGADUAN */
.report-box{
    width:48%;
    background:rgba(255,255,255,.65);
    border:1px solid var(--border-soft);
    border-radius:16px;
    padding:30px;
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,.55);
    opacity:0;
    transform:translateY(40px);
    transition:.8s ease;
}
.report-box.show{opacity:1;transform:translateY(0);}
.report-box h3{
    text-align:center;
    margin-bottom:20px;
    color:#4a3428;
}

.input-field{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:10px;
    border:1px solid var(--coklat-soft);
    background:rgba(255,255,255,.75);
    font-size:15px;
}
.text-area{
    height:120px;
    resize:none;
}

/* BUTTON */
.send-btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,var(--emas-soft),var(--emas-bright));
    color:#3d2e15;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}
.send-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 8px 20px var(--emas-glow);
}

/* POPUP SUKSES */
.popup{
    position:fixed;
    top:50%;left:50%;
    transform:translate(-50%,-50%) scale(0.7);
    background:white;
    padding:30px 40px;
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,.4);
    text-align:center;
    opacity:0;
    pointer-events:none;
    transition:.3s;
}
.popup.show{
    opacity:1;
    transform:translate(-50%,-50%) scale(1);
    pointer-events:auto;
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
    <div style="display:flex;align-items:center;gap:10px;">
        <img src="img/logo.jpg" alt="Logo SIPUS">
        <span style="font-size:20px;font-weight:700;">SIPUS</span>
    </div>

    <nav>
        <a href="about.php">Tentang</a>
        <a href="features.php">Fitur</a>
        <a href="contact.php" style="color:#f1d9c3;font-weight:bold;">Kontak</a>
    </nav>
</header>

<!-- WRAPPER 2 KOLOM -->
<div class="contact-wrapper">

    <!-- KONTAK -->
    <div class="card">
        <h2>Kontak Kami</h2>
        <p>Email: <b>sipus@unila.ac.id</b></p>
        <p>Telepon: <b>085278697835</b></p>
        <p>Alamat: Gedung Perpustakaan Universitas Lampung</p>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>

    <!-- PENGADUAN -->
    <div class="report-box">
        <h3>Kotak Pengaduan</h3>

        <form id="reportForm">
            <input type="text" name="nama" class="input-field" placeholder="Nama Anda" required>
            <input type="email" name="email" class="input-field" placeholder="Email Anda" required>
            <textarea name="pesan" class="input-field text-area" placeholder="Tulis pesan atau kendala Anda..." required></textarea>

            <button type="submit" class="send-btn">Kirim Pengaduan</button>
        </form>
    </div>

</div>

<footer>
    © 2025 SIPUS - Universitas Lampung
</footer>

<!-- POPUP -->
<div class="popup" id="successPopup">
    <h3 style="color:#4a3428;margin-bottom:10px;">Pesan Terkirim!</h3>
    <p style="color:#4a3428;">Terima kasih, pesan Anda telah kami terima.</p>
</div>

<!-- SCRIPT ANIMASI -->
<script>
// Fade up
window.addEventListener("load", () => {
    document.querySelector(".card").classList.add("show");
    setTimeout(() => {
        document.querySelector(".report-box").classList.add("show");
    }, 200);
});

// Form submit → AJAX
document.getElementById("reportForm").addEventListener("submit", async function(e){
    e.preventDefault();

    let formData = new FormData(this);

    let send = await fetch("send_report.php", {
        method:"POST",
        body:formData
    });

    let result = await send.text();

    if(result === "OK"){
        document.getElementById("successPopup").classList.add("show");

        setTimeout(()=>{
            document.getElementById("successPopup").classList.remove("show");
        }, 2200);

        this.reset();
    }
});
</script>

</body>
</html>
