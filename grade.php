<?php 
include 'config.php'; 

// 1. เช็คว่า Login หรือยัง
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
    <title>ผลการเรียน - ระบบทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .top-navbar { background-color: #62c4a2; color: white; padding: 10px 20px; font-size: 14px; }
        
        /* Sidebar Style */
        .sidebar-box { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .profile-img { width: 100px; height: 100px; background: #eee; border-radius: 50%; margin: 0 auto 15px; border: 3px solid #62c4a2; }
        .menu-list { list-style: none; padding: 0; margin-top: 20px; }
        .menu-list li a { 
            display: block; 
            padding: 10px; 
            color: #555; 
            text-decoration: none; 
            border-bottom: 1px solid #eee;
        }
        .menu-list li a:hover, .menu-list li a.active { color: #62c4a2; font-weight: bold; background: #f0fdf9; }

        /* Content Card */
        .info-card { background: white; border-radius: 10px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); min-height: 500px; }
        .table-grade thead { background-color: #62c4a2; color: white; }
        .grade-a { color: green; font-weight: bold; }
        .grade-f { color: red; font-weight: bold; }
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
                    <li><a href="grade.php" class="active">📊 ผลการเรียน</a></li>
                    <li><a href="dashboard.php">🏠 กลับหน้าหลัก</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="info-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="m-0 text-primary">📊 ผลการเรียน / Transcript</h4>
                    <button class="btn btn-outline-secondary btn-sm" onclick="window.print()">🖨️ พิมพ์ใบรายงานผล</button>
                </div>

                <div class="alert alert-info">
                    <strong>GPA รวม: 3.50</strong> | หน่วยกิตสะสม: 15 หน่วยกิต
                </div>

                <table class="table table-bordered table-hover table-grade">
                    <thead class="text-center">
                        <tr>
                            <th width="15%">รหัสวิชา</th>
                            <th width="50%">ชื่อวิชา</th>
                            <th width="10%">หน่วยกิต</th>
                            <th width="10%">เกรด</th>
                            <th width="15%">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">IT-101</td>
                            <td>Introduction to Information Technology</td>
                            <td class="text-center">3</td>
                            <td class="text-center grade-a">A</td>
                            <td class="text-center text-success">ผ่าน</td>
                        </tr>
                        <tr>
                            <td class="text-center">IT-102</td>
                            <td>Web Programming with PHP</td>
                            <td class="text-center">3</td>
                            <td class="text-center">B+</td>
                            <td class="text-center text-success">ผ่าน</td>
                        </tr>
                        <tr>
                            <td class="text-center">MA-201</td>
                            <td>Statistics for IT</td>
                            <td class="text-center">3</td>
                            <td class="text-center">C</td>
                            <td class="text-center text-success">ผ่าน</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="mt-4 p-3 bg-light border-start border-4 border-primary">
                    <small class="text-muted">
                        * หมายเหตุ: หากมีข้อสงสัยเกี่ยวกับเกรดเฉลี่ย กรุณาติดต่อสำนักทะเบียนและประมวลผล
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>