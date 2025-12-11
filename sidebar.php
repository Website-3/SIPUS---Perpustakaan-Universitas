<div class="sidebar">
    <h2 class="logo">SIPUS</h2>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="koleksi.php" class="active">Koleksi Buku</a></li>
        <li><a href="status.php">Status Buku</a></li>
        <li><a href="informasi.php">Informasi Perpustakaan</a></li>
        <li><a href="akun.php">Account</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
</div>

<style>
.sidebar {
    width: 220px;
    background: #5a3e2b;
    color: white;
    height: 100vh;
    position: fixed;
    padding: 20px;
    box-sizing: border-box;
}
.sidebar .logo {
    font-size: 1.8rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
}
.sidebar ul { list-style: none; padding: 0; }
.sidebar ul li { margin: 18px 0; }
.sidebar ul li a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    display: block;
    padding: 8px 15px;
    border-radius: 8px;
    transition: background 0.3s;
}
.sidebar ul li a:hover,
.sidebar ul li a.active {
    background: #a47551;
}
.sidebar ul li a.logout {
    background: #a83232 !important;
}
</style>
