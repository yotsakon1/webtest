<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ระบบงานวิชาการ</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f6f8;
}

/* 🔷 TOP NAV */
.topbar {
    background: white;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* 🔷 HERO */
.hero {
    height: 400px;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(138,90,0,0.8)),
                url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1') center/cover;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.hero h1 {
    font-size: 42px;
    font-weight: bold;
}

.hero p {
    font-size: 20px;
}

/* 🔶 MENU BAR */
.menu-bar {
    background: #8a5a00;
    border-radius: 15px;
    padding: 20px;
    margin-top: -50px;
    color: white;
}

.menu-item {
    text-align: center;
}

.menu-item i {
    font-size: 30px;
}

/* 🔷 NEWS */
.news-card {
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* 🔷 FOOTER */
.footer {
    background: #0d2b52;
    color: white;
    padding: 20px;
    text-align: center;
    margin-top: 50px;
}
</style>

</head>

<body>

<!-- 🔷 TOPBAR -->
<div class="topbar d-flex justify-content-between align-items-center">
    <div>
        <b>สำนักส่งเสริมวิชาการและงานทะเบียน</b>
    </div>

    <div>
        <a href="#" class="me-3">เกี่ยวกับ</a>
        <a href="#" class="me-3">นักศึกษา</a>
        <a href="login.php">Login</a>
    </div>
</div>

<!-- 🔷 HERO -->
<div class="hero">
    <div>
        <h1>สำนักส่งเสริมวิชาการและงานทะเบียน</h1>
        <p>มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</p>
    </div>
</div>

<!-- 🔶 MENU -->
<div class="container">
<div class="menu-bar shadow">
<div class="row">

    <div class="container">
    <div class="menu-bar shadow">
        <div class="row align-items-center">

            <div class="col-md-3 border-end-custom">
                <a href="login.php" class="menu-item-link">
                    <span>➔</span> <span>เข้าสู่ระบบทะเบียน</span>
                </a>
            </div>

            <div class="col-md-3 border-end-custom">
                <a href="https://academic.rmutl.ac.th/app/calendar" class="menu-item-link">
                    <span>📅</span> <span>ปฏิทินการศึกษา</span>
                </a>
            </div>

            <div class="col-md-3 border-end-custom">
                <a href="https://admission.rmutl.ac.th/" class="menu-item-link" target="_blank">
                    <span>✨</span> <span>รับสมัครนักศึกษาใหม่</span>
                </a>
            </div>

            <div class="col-md-3">
                <a href="https://academic.rmutl.ac.th/app/faq" class="menu-item-link">
                    <span>❓</span> <span>Q&A คำถามที่พบบ่อย</span>
                </a>
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>

<!-- 🔷 NEWS -->
<div class="container mt-5">
<h3>ข่าวประชาสัมพันธ์</h3>
<hr>

<div class="row">

<?php
include 'config.php';
$res = $conn->query("SELECT * FROM news ORDER BY id DESC LIMIT 4");

while($row = $res->fetch_assoc()){
?>
<div class="col-md-6">
    <div class="card news-card p-3 mb-3">
        <h5><?= $row['title'] ?></h5>
        <p><?= $row['content'] ?></p>
    </div>
</div>
<?php } ?>

</div>
</div>

<!-- 🔷 FOOTER -->
<div class="footer">
    © 2026 ระบบงานวิชาการ
</div>

</body>
</html>