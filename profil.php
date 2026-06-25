<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'profil'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - HusnaLearning</title>
    <style>
        /* Reset & Standar Dasar (Sesuai dengan Index) */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
            /* Latar belakang gradasi lembut mengalir ke bawah, seirama dengan index */
             background: linear-gradient(180deg, #f0fdf4 0%, #e0f2fe 100%); 
            color: #1e293b; 
            line-height: 1.8;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* -----------------------------------------------------------------
           CSS HEADER & NAVIGASI (Sesuai Persis dengan Index)
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
            box-shadow: 0 10px 35px rgba(0, 168, 143, 0.1);
            backdrop-filter: blur(10px);
        }
        .logo-area { flex-shrink: 0; display: flex; align-items: center; }
        .logo-area img { height: 45px; width: auto; display: block; }
        
        .nav-menus { display: flex; align-items: center; list-style: none; margin: 0 20px; padding: 0; }
        .nav-menus > li { position: relative; white-space: nowrap; }
        .nav-menus a { color: #334155; text-decoration: none; font-size: 15px; font-weight: 600; padding: 10px 14px; display: flex; align-items: center; transition: color 0.3s; }
        .nav-menus a:hover, .nav-menus .active { color: #00a88f; }
        .nav-menus .has-submenu::after { content: " ▾"; font-size: 12px; margin-left: 4px; }

        /* Dropdown Menu */
        .dropdown-menu { position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(10px); background: white; min-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); list-style: none; padding: 8px 0; opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .dropdown-trigger:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0px); }
        .dropdown-menu li a { padding: 12px 24px; font-size: 14px; font-weight: 500; color: #475569; display: block; text-align: left; }
        .dropdown-menu li a:hover { background-color: #f0fdf4; color: #00a88f; }

        /* Tombol Navigasi bertema Gradasi */
        .btn-header-daftar { 
            background: linear-gradient(135deg, #00a88f, #007bff); 
            color: white !important; 
            padding: 12px 26px !important; 
            border-radius: 30px; 
            font-weight: 700; 
            font-size: 14px; 
            box-shadow: 0 5px 20px rgba(0, 168, 143, 0.3); 
            text-decoration: none; 
            display: inline-block; 
            transition: all 0.3s ease; 
        }
        .btn-header-daftar:hover { transform: translateY(-2px); box-shadow: 0 7px 22px rgba(0, 168, 143, 0.45); }

        /* -----------------------------------------------------------------
           HERO BANNER PROFILE (Menggunakan Gambar Halaman Depan dengan Overlay)
        ----------------------------------------------------------------- */
       .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('aka.png');
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
           SECTION: KONTEN SEJARAH & VISI MISI (DIPERBANYAK)
        ----------------------------------------------------------------- */
        .profile-content-section {
            padding: 100px 20px;
        }
        .profile-card {
            max-width: 1300px;
            margin: 0 auto;
            background: white;
            padding: 60px;
            border-radius: 32px;
            box-shadow: 0 15px 45px rgba(0, 168, 143, 0.04);
        }
        .profile-card h2 {
            font-size: 38px;
            color: #0f172a;
            margin-bottom: 25px;
            font-weight: 800;
            border-left: 6px solid #00a88f;
            padding-left: 20px;
        }
        .profile-card p {
            font-size: 18px;
            color: #475569;
            margin-bottom: 40px;
            text-align: justify;
        }

        /* Grid Visi Misi */
        .visimisi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 40px;
            margin-top: 50px;
            margin-bottom: 60px;
        }
        .visimisi-box {
            background: #f8fafc;
            padding: 40px;
            border-radius: 24px;
            border: 1px solid rgba(0, 168, 143, 0.08);
        }
        .visimisi-box h3 {
            font-size: 26px;
            color: #0f172a;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .visimisi-box ul {
            list-style: none;
        }
        .visimisi-box li {
            font-size: 17px;
            color: #475569;
            margin-bottom: 15px;
            position: relative;
            padding-left: 30px;
        }
        .visimisi-box li::before {
            content: "✓";
            color: #00a88f;
            font-weight: bold;
            position: absolute;
            left: 0;
            font-size: 18px;
        }

        /* -----------------------------------------------------------------
           SECTION: EMAGE / GALERI RUANGAN BIMBEL (TAMBAHAN REQUES)
        ----------------------------------------------------------------- */
        .room-gallery {
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid #f1f5f9;
        }
        .room-gallery h2 {
            text-align: center;
            border-left: none;
            padding-left: 0;
            margin-bottom: 15px;
        }
        .room-subtitle {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 50px auto !important;
            font-size: 16px !important;
            color: #64748b !important;
        }
        .room-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
        }
        .room-card {
            background: #f8fafc;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            border: 1px solid rgba(0,0,0,0.04);
            transition: all 0.4s ease;
        }
        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 168, 143, 0.12);
        }
        .room-img-box {
            width: 100%;
            height: 250px;
            overflow: hidden;
            background: #e2e8f0;
        }
        .room-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .room-card:hover .room-img-box img {
            transform: scale(1.06);
        }
        .room-info {
            padding: 30px;
        }
        .room-info h4 {
            font-size: 22px;
            color: #0f172a;
            margin-bottom: 12px;
            font-weight: 700;
        }
        .room-info p {
            font-size: 15px;
            color: #64748b;
            margin-bottom: 0;
            text-align: justify;
        }

        /* Responsif Media Queries */
        @media (max-width: 992px) {
            .hero-container h2 { font-size: 38px; }
            .profile-card { padding: 30px; }
            .visimisi-grid { grid-template-columns: 1fr; }
            .room-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero-section">
    <div class="hero-container">
        <h2>Tentang HusnaLearning</h2>
        <p>Membangun generasi cerdas, berintegritas, dan siap berkompetisi global melalui inovasi sistem pembelajaran modern terpadu.</p>
    </div>
</div>

<div class="profile-content-section">
    <div class="profile-card">
        
        <h2>Sejarah Singkat</h2>
        <p>HusnaLearning didirikan dengan komitmen penuh untuk menghadirkan bimbingan belajar bermutu tinggi yang adaptif terhadap perkembangan dunia pendidikan yang dinamis. Bermula dari sebuah kepedulian mendalam untuk mempermudah para siswa menaklukkan berbagai rintangan kurikulum sekolah, kami bertumbuh menjadi lembaga bimbingan tepercaya pilihan utama orang tua. Kami percaya bahwa setiap siswa terlahir unik dan memiliki potensi emas terpendam, yang mana akan terasah secara optimal apabila didukung oleh formula pendekatan personal yang tepat, visualisasi materi yang kreatif, serta ekosistem belajar yang suportif.</p>
        
        <p>Hingga hari ini, HusnaLearning secara konsisten terus memperluas jaringan inovasi pendidikan, memperbarui kualitas modul ajar terpadu, dan merekrut barisan tentor berkapasitas tinggi guna memastikan seluruh proses belajar-mengajar dapat berjalan efektif, menginspirasi, serta berorientasi penuh pada prestasi masa depan siswa.</p>

        <div class="visimisi-grid">
            <div class="visimisi-box">
                <h3>Visi Kami</h3>
                <p style="font-size: 17px; color: #475569; margin-bottom: 0; text-align: left;">Menjadi lembaga bimbingan belajar terdepan dan terpercaya dalam mencetak generasi penerus bangsa yang unggul, berprestasi akademis tinggi, berkarakter kuat, cerdas secara logika, serta memiliki kesiapan matang untuk berkompetisi di kancah nasional maupun global.</p>
            </div>
            <div class="visimisi-box">
                <h3>Misi Kami</h3>
                <ul>
                    <li>Menyelenggarakan pembelajaran berkualitas unggul lewat penguasaan konsep dasar secara kreatif dan mudah dipahami.</li>
                    <li>Menyediakan fasilitas ruang bimbingan modern, aman, serta super nyaman berbasis teknologi visual edukasi terapan.</li>
                    <li>Membentuk mentalitas juara yang berdisiplin tinggi, tangguh, adaptif, serta pantang menyerah menghadapi ujian.</li>
                    <li>Membangun komunikasi sinergis berkala bersama orang tua demi memantau grafik tumbuh kembang belajar anak secara berkala.</li>
                </ul>
            </div>
        </div>

        <div class="room-gallery">
            <h2>Fasilitas & Ruang Kelas Eksklusif</h2>
            <p class="room-subtitle">Mari intip lingkungan belajar kondusif di HusnaLearning yang dirancang bersih, sejuk, dan modern demi menjaga fokus serta kenyamanan optimal para siswa.</p>
            
            <div class="room-grid">
                <div class="room-card">
                    <div class="room-img-box">
                        <img src="kls.png" alt="Ruang Kelas Reguler HusnaLearning">
                    </div>
                    <div class="room-info">
                        <h4>Ruang Kelas Reguler</h4>
                        <p>Fasilitas ruang belajar ber-AC dengan penataan kursi meja ergonomis. Dilengkapi teknologi multimedia pembelajaran interaktif guna mematangkan penyerapan materi harian sekolah tanpa distraksi bising.</p>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-img-box">
                        <img src="f2.png" alt="Ruang Kelas VIP HusnaLearning">
                    </div>
                    <div class="room-info">
                        <h4>Ruang Privat Eksklusif VIP</h4>
                        <p>Ruangan super tenang khusus yang didesain demi mengakomodasi sesi belajar intensif satu-on-satu (one siswa, one tentor). Sangat cocok untuk konsultasi pekerjaan rumah (PR) ataupun pembedahan trik bank soal HOTS.</p>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-img-box">
                        <img src="f3.png" alt="Ruang Baca & Diskusi HusnaLearning">
                    </div>
                    <div class="room-info">
                        <h4>Area Baca & Diskusi Komunal</h4>
                        <p>Area santai namun produktif bagi para siswa yang ingin hadir lebih awal. Dapat dimanfaatkan untuk meminjam referensi literatur buku lengkap, melakukan kerja kelompok, maupun bersantai menjelang jam belajar dimulai.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>