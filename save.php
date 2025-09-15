<?php
require 'connect.php'; // ไฟล์เชื่อมต่อ DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $branch = $_POST['branch'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $year = $_POST['year'] ?? '';
    $q1 = intval($_POST['q1'] ?? 0);
    $q2 = intval($_POST['q2'] ?? 0);
    $q3 = intval($_POST['q3'] ?? 0);
    $q4 = intval($_POST['q4'] ?? 0);
    $q5 = intval($_POST['q5'] ?? 0);
    $q6 = intval($_POST['q6'] ?? 0);
    $q7 = intval($_POST['q7'] ?? 0);
    $suggestion = $_POST['suggestion'] ?? '';

    $stmt = $link->prepare("INSERT INTO survey 
        (branch, gender, year, q1,q2,q3,q4,q5,q6,q7,suggestion)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssiiiiiiis", 
        $branch,$gender,$year,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$suggestion);
    
    if ($stmt->execute()) {
        echo "บันทึกข้อมูลเรียบร้อยแล้ว <a href='report.php'>ดูรายงาน</a>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }
}
?>
