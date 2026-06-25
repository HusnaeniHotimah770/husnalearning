<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'fasilitas'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Eksklusif - HusnaLearning</title>
    <style>
        /* Reset & Standar Dasar */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
            /* Latar belakang gradasi mengalir mewah, seirama dengan index dan profil */
            background: linear-gradient(180deg, #e0f2fe 0%, #f0fdf4 100%); 
            color: #1e293b; 
            line-height: 1.8;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* -----------------------------------------------------------------
           CSS HEADER & NAVIGASI (Sesuai Persis dengan Index & Profil)
        ----------------------------------------------------------------- */
        .navbar-container {
            width: 100%;
            padding: 20px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 12px 30px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 35px rgba(0, 168, 143, 0.08);
            backdrop-filter: blur(10px);
        }
        .logo-area { flex-shrink: 0; display: flex; align-items: center; }
        .logo-area img { height: 45px; width: auto; display: block; }
        
        .nav-menus { display: flex; align-items: center; list-style: none; margin: 0 20px; padding: 0; }
        .nav-menus > li { position: relative; white-space: nowrap; }
        .nav-menus a { color: #334155; text-decoration: none; font-size: 15px; font-weight: 600; padding: 10px 14px; display: flex; align-items: center; transition: color 0.3s; }
        .nav-menus a:hover, .nav-menus .active { color: #008b76; }
        .nav-menus .has-submenu::after { content: " ▾"; font-size: 12px; margin-left: 4px; }

        /* Dropdown Menu */
        .dropdown-menu { position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(10px); background: white; min-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.12); list-style: none; padding: 8px 0; opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .dropdown-trigger:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0px); }
        .dropdown-menu li a { padding: 12px 24px; font-size: 14px; font-weight: 500; color: #475569; display: block; text-align: left; }
        .dropdown-menu li a:hover { background-color: #f0fdf4; color: #008b76; }

        /* Tombol Navigasi bertema Gradasi */
        .btn-header-daftar { 
            background: linear-gradient(135deg, #008b76, #007bff); 
            color: white !important; 
            padding: 12px 26px !important; 
            border-radius: 30px; 
            font-weight: 700; 
            font-size: 14px; 
            box-shadow: 0 5px 20px rgba(0, 168, 143, 0.25); 
            text-decoration: none; 
            display: inline-block; 
            transition: all 0.3s ease; 
        }
        .btn-header-daftar:hover { transform: translateY(-2px); box-shadow: 0 7px 22px rgba(0, 168, 143, 0.35); }

        /* -----------------------------------------------------------------
           HERO BANNER FASILITAS
        ----------------------------------------------------------------- */
        .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('kls.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 260px 0 150px 0;
            text-align: center;
        }
        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }
        .hero-container h2 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .hero-container p {
            font-size: 21px;
            opacity: 0.95;
            max-width: 750px;
            margin: 0 auto;
            font-weight: 400;
            line-height: 1.6;
            text-shadow: 0 2px 12px rgba(0,0,0,0.4);
        }

        /* -----------------------------------------------------------------
           SECTION: DETAIL FASILITAS PREMIUM (GRID & LAYOUT ALTERNATIF)
        ----------------------------------------------------------------- */
        .facilities-section {
            padding: 120px 20px;
        }
        .facilities-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 100px; /* Jarak antar baris fasilitas */
        }
        
        /* Baris Fasilitas Individual */
        .facility-row {
            display: flex;
            align-items: center;
            gap: 80px;
            background: white;
            padding: 50px;
            border-radius: 40px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.02);
            transition: all 0.4s ease;
        }
        .facility-row:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 139, 118, 0.06);
        }
        
        /* Membalik posisi gambar dan teks pada baris genap untuk estetika mahal */
        .facility-row:nth-child(even) {
            flex-direction: row-reverse;
        }

        .facility-image {
            flex: 1;
            height: 400px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            background: #f1f5f9;
        }
        .facility-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .facility-row:hover .facility-image img {
            transform: scale(1.06);
        }

        .facility-text {
            flex: 1;
        }
        .facility-text .badge {
            display: inline-block;
            background: rgba(0, 139, 118, 0.08);
            color: #008b76;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .facility-text h3 {
            font-size: 34px;
            color: #0f172a;
            margin-bottom: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .facility-text p {
            font-size: 17px;
            color: #475569;
            margin-bottom: 25px;
            text-align: justify;
            line-height: 1.7;
        }

        /* List Keunggulan di dalam Fasilitas */
        .facility-features {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .facility-features li {
            font-size: 15.5px;
            color: #334155;
            position: relative;
            padding-left: 28px;
            font-weight: 500;
        }
        .facility-features li::before {
            content: "✦";
            color: #008b76;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        /* -----------------------------------------------------------------
           SECTION: CALL TO ACTION (CTA SEMATAN)
        ----------------------------------------------------------------- */
        .cta-premium {
            background: linear-gradient(135deg, #0f172a 0%, #0056b3 100%);
            color: white;
            border-radius: 35px;
            padding: 80px 50px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.1);
        }
        .cta-premium h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }
        .cta-premium p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 650px;
            margin: 0 auto 40px auto;
        }
        .btn-cta-fasilitas {
            background: #ffffff;
            color: #0f172a;
            text-decoration: none;
            padding: 16px 45px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-cta-fasilitas:hover {
            transform: scale(1.03);
            background: #f8fafc;
            box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        }

        /* Responsif Media Queries */
        @media (max-width: 992px) {
            .hero-container h2 { font-size: 40px; }
            .hero-container p { font-size: 18px; }
            .facility-row, .facility-row:nth-child(even) { flex-direction: column; padding: 35px; gap: 40px; }
            .facility-image { width: 100%; height: 300px; }
            .facility-text h3 { font-size: 28px; }
            .cta-premium h2 { font-size: 30px; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero-section">
    <div class="hero-container">
        <h2>Fasilitas Eksklusif</h2>
        <p>Infrastruktur modern dan ruang belajar berstandar tinggi yang dirancang khusus untuk mendukung fokus, kenyamanan, serta efektivitas belajar optimal siswa.</p>
    </div>
</div>

<div class="facilities-section">
    <div class="facilities-container">
        
        <!-- Fasilitas 1 -->
        <div class="facility-row">
            <div class="facility-image">
                <img src="kls.png" alt="Ruang Kelas Reguler HusnaLearning">
            </div>
            <div class="facility-text">
                <span class="badge">Kondusif & Modern</span>
                <h3>Ruang Kelas Reguler Premium</h3>
                <p>Ruang kelas reguler kami dikembangkan dengan rasio siswa yang dibatasi ketat demi menjaga kualitas interaksi belajar. Dilengkapi pendingin udara (AC) sentral serta sistem pencahayaan yang lembut di mata untuk memastikan konsentrasi penuh terjaga sepanjang sesi bimbingan.</p>
                <ul class="facility-features">
                    <li>Full Air Conditioner (AC)</li>
                    <li>Kursi & Meja Ergonomis</li>
                    <li>Smart LED Proyektor</li>
                    <li>Maksimal 10 Siswa / Kelas</li>
                </ul>
            </div>
        </div>

        <!-- Fasilitas 2 -->
        <div class="facility-row">
            <div class="facility-image">
                <img src="f2.png" alt="Ruang Kelas VIP HusnaLearning">
            </div>
            <div class="facility-text">
                <span class="badge">Eksklusif & Fokus</span>
                <h3>Ruang Privat Eksklusif VIP</h3>
                <p>Fasilitas ruang belajar privat satu-on-satu (one-on-one) dengan tingkat kekedapan suara tinggi. Didesain secara spesifik untuk memfasilitasi sesi konsultasi intensif, pembedahan tugas berat, atau akselerasi trik bank soal HOTS secara mendalam tanpa distraksi lingkungan luar.</p>
                <ul class="facility-features">
                    <li>Private Soundproof Room</li>
                    <li>Sistem Belajar One-on-One</li>
                    <li>Whiteboard Interaktif</li>
                    <li>Bebas Jadwal Tambahan</li>
                </ul>
            </div>
        </div>

        <!-- Fasilitas 3 -->
        <div class="facility-row">
            <div class="facility-image">
                <img src="f3.png" alt="Ruang Baca & Diskusi HusnaLearning">
            </div>
            <div class="facility-text">
                <span class="badge">Kreatif & Komunal</span>
                <h3>Area Baca & Diskusi Komunal</h3>
                <p>Zona kasual terpadu yang disediakan khusus bagi siswa untuk belajar mandiri, melakukan kerja kelompok, ataupun berdiskusi santai bersama rekan sejawat sebelum jam kelas dimulai. Dilengkapi dengan koleksi literatur referensi akademis terlengkap.</p>
                <ul class="facility-features">
                    <li>Koleksi Buku Referensi</li>
                    <li>Ruang Diskusi Terbuka</li>
                    <li>Akses High-Speed Wi-Fi</li>
                    <li>Port Pengisian Daya Gadget</li>
                </ul>
            </div>
        </div>

        <!-- Section Ajakan Gabung (CTA) Terintegrasi di bagian bawah -->
        <div class="cta-premium">
            <h2>Rasakan Pengalaman Belajar di Lingkungan Terbaik</h2>
            <p>Fasilitas berkelas menunjang pencapaian prestasi yang luar biasa. Daftarkan putra-putri Anda ke HusnaLearning sekarang.</p>
            <a href="pendaftaran.php" class="btn-cta-fasilitas">Ambil Kursi Belajar Anda</a>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>