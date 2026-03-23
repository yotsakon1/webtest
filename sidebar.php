<?php 
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit(); 
}
?>
<style>
.sidebar {
    width: 250px;
    height: 100vh;
    background: #003366;
    position: fixed;
    color: white;
}
.sidebar a {
    color: white;
    display: block;
    padding: 12px;
    text-decoration: none;
}
.sidebar a:hover {
    background: #0056b3;
}
.content {
    margin-left: 250px;
    padding: 20px;
}
</style>

<div class="sidebar">
    <h4 class="p-3">Admin Panel</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="student.php">นักศึกษา</a>
    <a href="news.php">ข่าว</a>
    <a href="search.php">ค้นหา</a>
    <a href="index.php">หน้าเว็บ</a>
    <a href="logout.php">Logout</a>
</div>