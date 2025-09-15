<?php
require 'connect.php';

// 1) จำนวนตามสาขาวิชา
$sql1 = "SELECT branch, COUNT(*) as total FROM survey GROUP BY branch";
$res1 = $link->query($sql1);

// 2) จำนวนตามเพศ
$sql2 = "SELECT gender, COUNT(*) as total FROM survey GROUP BY gender";
$res2 = $link->query($sql2);

// 3) จำนวนตามชั้นปี
$sql3 = "SELECT year, COUNT(*) as total FROM survey GROUP BY year";
$res3 = $link->query($sql3);

// 4) คะแนนเฉลี่ยรายข้อ
$sql4 = "SELECT AVG(q1) as q1, AVG(q2) as q2, AVG(q3) as q3, AVG(q4) as q4, 
                AVG(q5) as q5, AVG(q6) as q6, AVG(q7) as q7 
         FROM survey";
$res4 = $link->query($sql4);
$avg = $res4->fetch_assoc();

// 5) คะแนนเฉลี่ยรวม
$sql5 = "SELECT (AVG(q1+q2+q3+q4+q5+q6+q7)/7) as total_avg FROM survey";
$res5 = $link->query($sql5);
$total_avg = $res5->fetch_assoc()['total_avg'];
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>รายงานสรุปผล</title></head>
<body>
<h3>1) จำนวนนักศึกษาแยกตามสาขา</h3>
<?php while($row=$res1->fetch_assoc()) echo $row['branch'].": ".$row['total']."<br>"; ?>

<h3>2) จำนวนนักศึกษาแยกตามเพศ</h3>
<?php while($row=$res2->fetch_assoc()) echo $row['gender'].": ".$row['total']."<br>"; ?>

<h3>3) จำนวนนักศึกษาแยกตามชั้นปี</h3>
<?php while($row=$res3->fetch_assoc()) echo "ปี ".$row['year'].": ".$row['total']."<br>"; ?>

<h3>4) ค่าเฉลี่ยแต่ละข้อ</h3>
<?php foreach($avg as $k=>$v) echo "ข้อ ".substr($k,1).": ".number_format($v,2)."<br>"; ?>

<h3>5) ค่าเฉลี่ยรวมทั้งหมด</h3>
<?php echo number_format($total_avg,2); ?>
</body>
</html>
