<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f5f5;
}

/* 🔷 Header */
.topbar {
    background: white;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* 🔷 Banner */
.banner {
    background: linear-gradient(rgba(255,140,0,0.7), rgba(255,140,0,0.7)),
                url('https://images.unsplash.com/photo-1523240795612-9a054b0db644');
    background-size: cover;
    color: white;
    border-radius: 15px;
    padding: 40px;
    margin: 20px;
}

/* 🔷 avatar */
.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #ddd;
    margin-right: 20px;
}

/* 🔷 card menu */
.menu-card {
    background: white;
    border-radius: 15px; /* ทำขอบมนให้สวยงาม */
    padding: 25px 20px;
    text-align: center;
    transition: 0.2s ease;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05); /* เพิ่มเงาด้านล่างเล็กน้อย */
    border: 1px solid #eee;
}
.menu-card:hover {
    transform: translateY(-5px); /* ลอยขึ้นเมื่อวางเมาส์ */
    box-shadow: 0 8px 20px rgba(0,0,0,0.15); /* เพิ่มเงาให้เข้มขึ้นเวลา Hover */
}

/* ตกแต่งไอคอนปฏิทิน */
.calendar-icon-img {
    width: 80px; /* ขนาดไอคอน */
    height: auto;
    margin-bottom: 15px;
}

.icon {
    font-size: 40px;
    margin-bottom: 10px;
}
</style>
</head>
<body>

<div class="topbar">
    <div><b>REGIS SYSTEM</b></div>
    <div>
        👤 <?= $user['fullname']; ?> 
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="banner d-flex align-items-center">
    <div class="avatar"></div>
    <div>
        <h3>ยินดีต้อนรับ</h3>
        <h1><?= $user['fullname']; ?></h1>
        <p>บริการสำหรับ<?= $user['role']; ?></p>
    </div>
</div>

<div class="container">
    <div class="row g-4 justify-content-center">

        <div class="col-md-3">
            <a href="student.php" style="text-decoration: none; color: inherit; display: block;">
                <div class="menu-card">
                    <div class="icon">📚</div>
                    <h5>ระบบทะเบียน</h5>
                    <p>ลงทะเบียนเรียน / ตารางเรียน</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="grade.php" style="text-decoration: none; color: inherit; display: block;">
                <div class="menu-card">
                    <div class="icon">📊</div>
                    <h5>ผลการเรียน</h5>
                    <p>ตรวจสอบเกรด</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="activity.php" style="text-decoration: none; color: inherit; display: block;">
                <div class="menu-card">
                    <div class="icon">🏆</div>
                    <h5>กิจกรรม</h5>
                    <p>กิจกรรมที่เข้าร่วม</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
    <a href="search_subject.php" style="text-decoration: none; color: inherit; display: block;">
        <div class="menu-card">
            <div class="icon">📄</div> <h5>วิชาที่เปิดสอน</h5>
            <p>ค้นหาวิชาที่เปิดสอน</p>
        </div>
    </a>
</div>

        <div class="col-md-3">
            <a href="calendar_page.php" style="text-decoration: none; color: inherit; display: block;">
                <div class="menu-card">
                    <h5>ปฏิทินการศึกษา</h5>
                    <p>กำหนดการต่าง ๆ สำหรับนักศึกษา</p>
                    <button onclick="goToCalendar()" class="btn btn-light">ดูปฏิทิน</button>
    </div>
                </div>
            </a>
        </div>

    </div>
</div>
    </div>
</div>
</div>

</body>
</html>