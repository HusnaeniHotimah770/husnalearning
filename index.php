<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'beranda'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HusnaLearning - Bimbel Sukses & Berprestasi</title>
    <style>
        /* Reset & Standar Dasar */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
            /* Latar belakang gradasi lembut mengalir ke bawah, diselaraskan agar mewah */
            background: linear-gradient(180deg, #f0fdf4 0%, #e0f2fe 100%); 
            color: #1e293b; 
            line-height: 1.8;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* -----------------------------------------------------------------
           CSS HEADER & NAVIGASI (Dipertahankan Sesuai Kode Asli)
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
           HERO SECTION (ANTI TABRAKAN WARNA TEKS & GAMBAR)
        ----------------------------------------------------------------- */
        .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.6)), url('depan1.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 260px 0 160px 0;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }
        .hero-content {
            max-width: 680px; 
            width: 100%;
        }
        .hero-content h2 {
            font-size: 56px; 
            line-height: 1.2;
            margin-bottom: 24px;
            font-weight: 800;
            letter-spacing: -1px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .hero-content p {
            font-size: 20px; 
            margin-bottom: 45px;
            opacity: 0.95;
            max-width: 100%;
            line-height: 1.6;
            text-shadow: 0 2px 12px rgba(0,0,0,0.4);
        }
        .hero-buttons {
            display: flex;
            gap: 20px;
        }
        .btn-hero-daftar {
            background: linear-gradient(135deg, #008b76, #007bff);
            color: white;
            text-decoration: none;
            padding: 16px 42px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 6px 20px rgba(0, 139, 118, 0.3);
            transition: all 0.3s ease;
        }
        .btn-hero-daftar:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 139, 118, 0.45);
        }
        .btn-hero-wa {
            background: white;
            color: #0f172a;
            text-decoration: none;
            padding: 16px 42px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        .btn-hero-wa:hover {
            background: #f8fafc;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        /* -----------------------------------------------------------------
           SECTION: PARTNER BELAJAR
        ----------------------------------------------------------------- */
        .partner-section {
            padding: 140px 20px;
            background: transparent; 
        }
        .partner-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 80px;
        }
        .partner-text {
            flex: 1.1;
        }
        .partner-text h3 {
            font-size: 15px;
            color: #008b76; 
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            font-weight: 800;
        }
        .partner-text h2 {
            font-size: 44px; 
            color: #0f172a;
            line-height: 1.25;
            margin-bottom: 25px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .partner-text p {
            font-size: 17.5px; 
            color: #475569;
            margin-bottom: 35px;
            text-align: justify;
            line-height: 1.7;
        }
        .partner-image-area {
            flex: 0.9;
            border-radius: 32px;
            min-height: 440px; 
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.04);
            background: white;
            padding: 12px;
            border: 1px solid #f1f5f9;
        }
        .partner-image-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 22px;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .partner-image-area:hover img {
            transform: scale(1.04);
        }

        /* -----------------------------------------------------------------
           SECTION: PROGRAM BELAJAR SEMUA JENJANG
        ----------------------------------------------------------------- */
        .program-section {
            padding: 140px 20px;
            background: rgba(255, 255, 255, 0.45); 
            border-top: 1px solid #e2e8f0;
        }
        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 80px auto;
        }
        .section-header h2 {
            font-size: 42px; 
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }
        .section-header p {
            color: #64748b;
            font-size: 18px;
            line-height: 1.6;
        }
        .program-grid {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 40px;
        }
        .program-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 4px 25px rgba(15, 23, 42, 0.02);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }
        .program-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 45px rgba(0, 139, 118, 0.1);
            border-color: rgba(0, 139, 118, 0.08);
        }
        .program-img-box {
            width: 100%;
            height: 250px; 
            background: #f1f5f9;
            overflow: hidden;
        }
        .program-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .program-card:hover .program-img-box img {
            transform: scale(1.08);
        }
        .program-info {
            padding: 35px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .program-info h3 {
            font-size: 24px; 
            color: #0f172a;
            margin-bottom: 14px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }
        .program-info p {
            color: #64748b;
            font-size: 15.5px;
            margin-bottom: 30px;
            line-height: 1.6;
            flex-grow: 1;
        }
        .btn-program-info {
            background: #f1f5f9;
            color: #0f172a;
            text-decoration: none;
            text-align: center;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .program-card:hover .btn-program-info {
            background: linear-gradient(135deg, #008b76, #007bff);
            color: white;
            box-shadow: 0 5px 15px rgba(0, 139, 118, 0.25);
        }
            .cta-section {
                padding: 80px 50px;
                background: linear-gradient(135deg, #0f172a 0%, #0056b3 100%);
                color: white;
                text-align: center;
                border-radius: 35px;
                margin: 80px auto;
                max-width: 1300px; /* Batasi lebar agar tidak terlalu panjang di layar besar */
                position: relative;
                overflow: hidden;
            }

            .cta-container {
                max-width: 800px; /* Batasi lebar teks agar nyaman dibaca */
                margin: 0 auto;   /* Pusatkan container di dalam section */
                position: relative;
                z-index: 2;
            }

            .cta-container h2 {
                font-size: 42px; 
                font-weight: 800;
                margin-bottom: 20px;
                letter-spacing: -0.5px;
                line-height: 1.2;
                color: #ffffff;
            }

            .cta-container p {
                font-size: 19px; 
                opacity: 0.9;
                margin-bottom: 40px;
                line-height: 1.7;
            }

            .btn-cta-daftar {
                background: white;
                color: #0056b3; /* Disesuaikan dengan warna gradasi */
                text-decoration: none;
                padding: 18px 45px;
                border-radius: 50px;
                font-weight: 700;
                font-size: 17px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                display: inline-block;
                transition: all 0.3s ease;
            }

            .btn-cta-daftar:hover {
                background: #f8fafc;
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            }

            /* Responsif untuk Mobile */
            @media (max-width: 768px) {
                .cta-section { padding: 60px 20px; border-radius: 25px; margin: 40px 20px; }
                .cta-container h2 { font-size: 32px; }
                .cta-container p { font-size: 16px; }
            }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <h2>Bimbel Terbaik di Indonesia untuk SD, SMP, & SMA</h2>
            <p>Bersiaplah meraih prestasi tertinggi Anda bersama HusnaLearning, bimbel terpercaya dengan sistem pendampingan belajar interaktif demi kenyamanan dan prestasi siswa di seluruh Indonesia.</p>
            
            <div class="hero-buttons">
                <a href="pendaftaran.php" class="btn-hero-daftar">Daftar Sekarang ❯</a>
                <a href="https://wa.me/6289671227131" target="_blank" class="btn-hero-wa">Hubungi Kami</a>
            </div>
        </div>
    </div>
</div>

<div class="partner-section" id="profil">
    <div class="partner-container">
        <div class="partner-text">
            <h3>Partner Belajar Terbaik</h3>
            <h2>Belajar Jadi Seru, Mudah, dan Menyenangkan!</h2>
            <p>Kami percaya bahwa proses belajar yang hebat berawal dari kenyamanan. Di HusnaLearning, siswa didampingi oleh tentor profesional dengan pendekatan interaktif yang interaktif dan adaptif. Tidak ada lagi hafalan rumus kaku—kami memandu pemahaman konsep matang lewat visualisasi kreatif serta diskusi seru yang memicu rasa ingin tahu siswa.</p>
        </div>
        <div class="partner-image-area">
            <img src="guru.png" alt="Partner Belajar Terbaik HusnaLearning">
        </div>
    </div>
</div>

<div class="program-section" id="program">
    <div class="section-header">
        <h2>Program Belajar Pilihan Untuk Semua Jenjang</h2>
        <p>Pilih program bimbingan terarah yang disesuaikan penuh dengan kurikulum sekolah dan target kelulusan impian putra-putri Anda.</p>
    </div>

    <div class="program-grid">
        <div class="program-card">
            <div class="program-img-box">
                <img src="sd.png" alt="Bimbel SD">
            </div>
            <div class="program-info">
                <h3>Bimbingan SD (Kelas 4-6)</h3>
                <p>Membangun fondasi dasar penalaran logika Matematika, IPA, dan Bahasa Indonesia yang kuat dengan metode belajar visual yang menyenangkan.</p>
                <a href="program.php?jenjang=sd" class="btn-program-info">Info Lebih Lanjut</a>
            </div>
        </div>

        <div class="program-card">
            <div class="program-img-box">
                <img src="smp.png" alt="Bimbel SMP">
            </div>
            <div class="program-info">
                <h3>Bimbingan SMP (Kelas 7-9)</h3>
                <p>Pendampingan akademis mendalam untuk menaklukkan ujian sekolah, tugas harian, serta persiapan matang masuk SMA/SMK Favorit.</p>
                <a href="program.php?jenjang=smp" class="btn-program-info">Info Lebih Lanjut</a>
            </div>
        </div>

        <div class="program-card">
            <div class="program-img-box">
                <img src="sma.png" alt="Bimbel SMA & UTBK">
            </div>
            <div class="program-info">
                <h3>Bimbingan SMA & UTBK</h3>
                <p>Strategi sukses pemahaman materi tingkat tinggi (HOTS) serta drilling bank soal intensif lolos UTBK SNBT Perguruan Tinggi Negeri.</p>
                <a href="program.php?jenjang=sma" class="btn-program-info">Info Lebih Lanjut</a>
            </div>
        </div>
    </div>
</div>

<div class="cta-section">
    <div class="cta-container">
        <h2>Siap untuk Meraih Prestasi Terbaikmu?</h2>
        <p>Jangan tunda masa depan cemerlang. Bergabunglah bersama ribuan siswa berprestasi lainnya di HusnaLearning sekarang juga!</p>
        <a href="pendaftaran.php" class="btn-cta-daftar">Mulai Pendaftaran Sekarang</a>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>