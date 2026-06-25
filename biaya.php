<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'biaya'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biaya Bimbingan - HusnaLearning</title>
    <style>
        /* Reset & Standar Dasar */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
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

        /* HERO BANNER */
        .hero-section{background-image: url('foto/ib.png');background-size: cover;background-position: center;background-repeat: no-repeat;width:100%;height:700px;display:flex;justify-content:center;align-items:center}
        .hero-container h2 { font-size: 56px; font-weight: 800; margin-bottom: 24px; text-shadow: 0 4px 20px rgba(0,0,0,0.5); }
        .hero-container p { font-size: 21px; max-width: 750px; margin: 0 auto; opacity: 0.95; }

        .biaya-section { padding: 120px 20px; }
        .biaya-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 40px; }
        
        .biaya-card { background: white; padding: 40px; border-radius: 40px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05); transition: all 0.4s ease; }
        .biaya-card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0, 139, 118, 0.1); }
        .student-info { display:flex; align-items:center; margin-bottom:25px; }
        .student-avatar { width:90px; height:90px; border-radius:50%; object-fit:cover; margin-right:20px; border:4px solid #ffffff; box-shadow:0 8px 20px rgba(0,0,0,.15); flex-shrink:0; }
        .student-name h4 { font-size: 20px; color: #0f172a; }
        .student-name span { color: #008b76; font-size: 14px; font-weight: 700; text-transform: uppercase; }
        .biaya-text { font-size: 17px; color: #475569; font-style: italic; line-height: 1.7; }
        /* CTA */
                .cta-premium {
            background: linear-gradient(135deg, #0f172a 0%, #0056b3 100%);
            color: white;
            border-radius: 35px;
            padding: 80px 50px;
            text-align: center;
            margin: 80px auto; /* Memberikan jarak lebih lega */
            max-width: 1300px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.1);
        }
        .cta-premium h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
            color: #ffffff; /* Memastikan judul terbaca jelas */
        }
        .cta-premium p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 650px;
            margin: 0 auto 40px auto;
        }
        .btn-cta-fasilitas { background: #ffffff; color: #0f172a; text-decoration: none; padding: 16px 45px; border-radius: 50px; font-weight: 700; font-size: 16px; display: inline-block; transition: all 0.3s ease; }
        .btn-cta-fasilitas:hover { transform: scale(1.03); background: #f8fafc; }

        @media (max-width: 992px) {
            .prestasi-container { grid-template-columns: 1fr; }
            .hero-container h2 { font-size: 40px; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<div class="hero-section"></div>
<div class="biaya-section">
    <div class="biaya-container">
         <div class="biaya-card">
            <div class="student-info">
                 <img src="sdp.png" alt="Alam" class="student-avatar">
                <div class="student-name">
                    <h4>Program SD</h4>
                    <span>Rp 450.000 / bulan</span>
                </div>
            </div>
            <p class="prestasi-text">"Pendampingan intensif untuk mata pelajaran sekolah, persiapan ulangan harian, serta bimbingan pekerjaan rumah (PR) agar belajar lebih menyenangkan bagi anak."</p>
        </div>
        <div class="biaya-card">
            <div class="student-info">
                 <img src="smpp.png" alt="Alam" class="student-avatar">
                <div class="student-name">
                    <h4>Program SMP</h4>
                    <span>Rp 600.000 / bulan</span>
                </div>
            </div>
            <p class="prestasi-text">"Fokus pada penguasaan konsep dasar mata pelajaran, persiapan ujian sekolah, serta pembentukan karakter belajar yang mandiri dan efektif."</p>
        </div>
        <div class="biaya-card">
            <div class="student-info">
                 <img src="smap.png" alt="Alam" class="student-avatar">
                <div class="student-name">
                    <h4>Program SMA</h4>
                    <span>Rp 800.000 / bulan</span>
                </div>
            </div>
            <p class="prestasi-text">"Pendalaman materi kurikulum sekolah secara komprehensif, latihan soal intensif, serta konsultasi pemilihan jurusan untuk jenjang universitas."</p>
        </div>
        <div class="biaya-card">
            <div class="student-info">
                 <img src="ut.png" alt="Alam" class="student-avatar">
                <div class="student-name">
                    <h4>Program UTBK</h4>
                    <span>Rp 1.200.000 / bulan</span>
                </div>
            </div>
            <p class="prestasi-text">"Program khusus untuk menembus PTN impian dengan simulasi tes rutin, bedah soal HOTS, serta strategi pengerjaan soal cepat dan tepat."</p>
        </div>
    </div>
</div>

<div class="cta-premium">
    <h2>Siap Memulai Perjalanan Belajar Anda?</h2>
    <p>Hubungi admin kami untuk konsultasi pemilihan paket yang paling tepat untuk kebutuhan Anda.</p>
    <a href="pendaftaran.php" class="btn-cta-fasilitas">Daftar Sekarang</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>