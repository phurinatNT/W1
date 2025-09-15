<?php
require 'connect.php'; // ไฟล์เชื่อมต่อ DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ดึงข้อมูลและป้องกันการโจมตีเบื้องต้นด้วย mysqli_real_escape_string
    $branch = isset($_POST['branch']) ? mysqli_real_escape_string($link, $_POST['branch']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($link, $_POST['gender']) : '';
    $year = isset($_POST['year']) ? mysqli_real_escape_string($link, $_POST['year']) : '';
    $q1 = isset($_POST['q1']) ? intval($_POST['q1']) : 0;
    $q2 = isset($_POST['q2']) ? intval($_POST['q2']) : 0;
    $q3 = isset($_POST['q3']) ? intval($_POST['q3']) : 0;
    $q4 = isset($_POST['q4']) ? intval($_POST['q4']) : 0;
    $q5 = isset($_POST['q5']) ? intval($_POST['q5']) : 0;
    $q6 = isset($_POST['q6']) ? intval($_POST['q6']) : 0;
    $q7 = isset($_POST['q7']) ? intval($_POST['q7']) : 0;
    $suggestion = isset($_POST['suggestion']) ? mysqli_real_escape_string($link, $_POST['suggestion']) : '';

    // สร้าง SQL แบบ query ปกติ (ค่าตัวเลขไม่ต้องมี ' ')
    // แทรกข้อมูลโดยใช้ชื่อคอลัมน์ให้ตรงกับโครงสร้างฐานข้อมูล (major แทน branch)
    $sql = "INSERT INTO survey (major, gender, year, q1, q2, q3, q4, q5, q6, q7, suggestion) VALUES ('" 
            . $branch . "', '" . $gender . "', '" . $year . "', "
            . $q1 . ", " . $q2 . ", " . $q3 . ", " . $q4 . ", "
            . $q5 . ", " . $q6 . ", " . $q7 . ", '" . $suggestion . "')";

    if (mysqli_query($link, $sql)) {
        echo "บันทึกข้อมูลเรียบร้อยแล้ว <a href='report.php'>ดูรายงาน</a>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($link);
    }
}
?>
