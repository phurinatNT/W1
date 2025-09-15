<?php
$host = "localhost";   // หรือ 127.0.0.1
$user = "root";        // ค่าเริ่มต้นของ XAMPP
$pass = "root";            // ค่าเริ่มต้นไม่มีรหัสผ่าน
$database = "webapp2025"; // ใส่ชื่อฐานข้อมูลที่คุณสร้างไว้

$link = mysqli_connect($host, $user, $pass, $database);
if (!$link) {
    die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8mb4"); // รองรับภาษาไทย
?>
