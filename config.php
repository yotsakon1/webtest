<?php
session_start();
// ... โค้ดเชื่อมต่อฐานข้อมูลของคุณ ...
?><?php
$conn = new mysqli("localhost","root","","academic_system");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
?>