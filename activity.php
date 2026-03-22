<?php 
include 'config.php'; 

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
    <title>กิจกรรมนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .top-navbar { background-color: #62c4a2; color: white; padding: 10px 20px; font-size: 14px; }
        .sidebar-box { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .profile-img { width: 100px; height: 100px; background: #eee; border-radius: 50%; margin: 0 auto 15px; border: 3px solid #62c4a2; }
        .menu-list { list-style: none; padding: 0; margin-top: 20px; }
        .menu-list li a { display: block; padding: 10px; color: #555; text-decoration: none; border-bottom: 1px solid #eee; }
        .menu-list li a:hover, .menu-list li a.active { color: #62c4a2; font-weight: bold; background: #f0fdf9; }
        .info-card { background: white; border-radius: 10px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); min-height: 500px; }
        .table-activity thead { background-color: #62c4a2; color: white; }
        .hours-badge { background-color: #e8f5e9; color: #2e7d32; padding: 5px 10px; border-radius: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="top-navbar d-flex justify-content-between">
    <div>มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</div>
    <div>ยินดีต้อนรับ: <?= $user['fullname'] ?> | <a href="logout.php" class="text-white">ออกจากระบบ</a></div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-box text-center">
                <div class="profile-img d-flex align-items-center justify-content-center">
                    <span style="font-size: 40px;">👤</span>
                </div>
                <h5><?= $user['fullname'] ?></h5>
                <p class="text-muted small">ID: <?= $user['username'] ?></p>
                <ul class="menu-list text-start">
                    <li><a href="student.php">📝 ข้อมูลนักศึกษา</a></li>
                    <li><a href="grade.php">📊 ผลการเรียน</a></li>
                    <li><a href="activity.php" class="active">🏆 กิจกรรม</a></li>
                    <li><a href="dashboard.php">🏠 กลับหน้าหลัก</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="info-card">
                <h4 class="mb-4 text-success">🏆 บันทึกกิจกรรมนักศึกษา</h4>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="p-3 border rounded text-center bg-light">
                            <small class="text-muted">ชั่วโมงกิจกรรมรวม</small>
                            <h2 class="text-success m-0">18</h2>
                        </div>
                    </div>
                </div>

                <table class="table table-hover table-activity">
                    <thead class="text-center">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อกิจกรรม/โครงการ</th>
                            <th>วันที่เข้าร่วม</th>
                            <th>ประเภทกิจกรรม</th>
                            <th>จำนวนชั่วโมง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>ปฐมนิเทศนักศึกษาใหม่ ประจำปีการศึกษา 2568</td>
                            <td class="text-center">1 มิ.ย. 2568</td>
                            <td>กิจกรรมบังคับ</td>
                            <td class="text-center"><span class="hours-badge">6 ชม.</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>อบรมเชิงปฏิบัติการการเขียนโปรแกรม PHP</td>
                            <td class="text-center">15 ก.ค. 2568</td>
                            <td>วิชาการ</td>
                            <td class="text-center"><span class="hours-badge">6 ชม.</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>กิจกรรมจิตอาสาพัฒนาสิ่งแวดล้อม</td>
                            <td class="text-center">12 ส.ค. 2568</td>
                            <td>บำเพ็ญประโยชน์</td>
                            <td class="text-center"><span class="hours-badge">6 ชม.</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>