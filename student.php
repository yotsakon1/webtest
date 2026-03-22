<?php 
include 'config.php'; 

// 1. เช็คว่า Login หรือยัง
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user']; // ดึงข้อมูลคนที่ Login มาเก็บไว้ในตัวแปร $user
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .top-navbar { background-color: #62c4a2; color: white; padding: 10px 20px; font-size: 14px; }
        .sidebar-box { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .profile-img { width: 120px; height: 120px; background: #eee; border-radius: 50%; margin: 0 auto 15px; border: 5px solid #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .info-card { background: white; border-radius: 10px; padding: 30px; min-height: 500px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .status-badge { background: #e8f5e9; color: #2e7d32; padding: 2px 10px; border-radius: 15px; font-size: 13px; }
        .nav-link-custom { display: block; padding: 10px; border-bottom: 1px solid #eee; color: #555; text-decoration: none; }
        .nav-link-custom:hover { background: #f0f0f0; }
        .nav-link-custom.active { background: #00bcd4; color: white; border-radius: 5px; }
    </style>
</head>
<body>

<div class="top-navbar d-flex justify-content-between align-items-center">
    <div>ระบบทะเบียนกลาง มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา ( สำหรับนักศึกษา )</div>
    <div>👤 <?= $user['fullname'] ?> <a href="logout.php" class="text-white ms-2 text-decoration-none">| ออกจากระบบ</a></div>
</div>

<div class="container-fluid mt-4">
    <div class="row px-3">
        <div class="col-md-3">
            <div class="sidebar-box text-center">
                <div class="profile-img">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="100%">
                </div>
                <h5><?= $user['fullname'] ?></h5>
                
                <div class="text-start mt-4">
                    <a href="#" class="nav-link-custom active">📘 ข้อมูลนักศึกษา / Student Profile</a>
                    <a href="#" class="nav-link-custom">👤 ประวัติส่วนตัว / Profile</a>
                    <a href="#" class="nav-link-custom">👨‍👩‍👧 ประวัติครอบครัว / Family</a>
                    <a href="#" class="nav-link-custom">🎓 ประวัติการศึกษา / Education</a>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">กลับหน้าหลัก</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="info-card">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <h5 class="m-0 text-primary">📝 ข้อมูลนักศึกษา / Student Information</h5>
                    <div>
                        <button class="btn btn-info btn-sm text-white">🔑 เปลี่ยนรหัสผ่าน</button>
                        <button class="btn btn-success btn-sm">✏️ แก้ไขข้อมูล</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">รหัสนักศึกษา / Student ID :</div>
                    <div class="col-md-9"><?= $user['username'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">ชื่อ - สกุล / Name :</div>
                    <div class="col-md-9"><?= $user['fullname'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">สถานะนักศึกษา / Status :</div>
                    <div class="col-md-9"><span class="status-badge">ปกติ</span></div>
                </div>

                <hr class="my-4">

                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">คณะ / Faculty :</div>
                    <div class="col-md-9">วิทยาศาสตร์และเทคโนโลยีการเกษตร</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">สาขาวิชา / Major :</div>
                    <div class="col-md-9">วท.บ.เทคโนโลยีสารสนเทศ</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 text-end fw-bold text-muted">ชั้นปีที่ / Year :</div>
                    <div class="col-md-9">1</div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>