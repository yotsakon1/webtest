<?php 
include 'config.php'; 
$role = $_GET['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: rgba(0,0,0,0.6);
}

/* กล่องกลาง */
.login-box {
    width: 400px;
    background: white;
    border-radius: 12px;
    padding: 20px;
    margin: 100px auto;
    position: relative;
}

/* ปุ่มปิด */
.close-btn {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 20px;
    cursor: pointer;
}

/* role */
.role-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 10px;
    cursor: pointer;
}
.role-item:hover {
    background: #f5f5f5;
}
</style>

</head>

<body>

<div class="login-box">

<span class="close-btn" onclick="window.location='index.php'">×</span>

<h4>ระบบทะเบียน</h4>
<p>กรุณาเลือกบทบาทของคุณ</p>

<!-- 🔷 STEP 1: เลือก ROLE -->
<?php if($role == ''){ ?>

<div class="role-item" onclick="selectRole('student')">นักศึกษา</div>
<div class="role-item" onclick="selectRole('teacher')">อาจารย์</div>
<div class="role-item" onclick="selectRole('staff')">เจ้าหน้าที่</div>

<?php } else { ?>

<!-- 🔷 STEP 2: ฟอร์ม LOGIN -->
<h5 class="text-primary">Role: <?= $role ?></h5>

<form method="POST">
<input type="hidden" name="role" value="<?= $role ?>">

<input name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

<button name="login" class="btn btn-primary w-100">Login</button>
</form>

<?php } ?>

<hr>

<!-- 🔷 ภาษา -->
<b>Language</b><br>
<input type="radio" checked> ไทย
<input type="radio" > English
<input type="radio" > 中文

</div>

<script>
function selectRole(role){
    window.location.href = "login.php?role=" + role;
}
</script>

</body>
</html>

<?php
// 🔷 LOGIN PROCESS
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);
    $r = $_POST['role'];

    $sql = "SELECT * FROM users 
            WHERE username='$u' 
            AND password='$p' 
            AND role='$r'";

    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $_SESSION['user'] = $res->fetch_assoc();
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Login ไม่ถูกต้อง');</script>";
    }
}
?>