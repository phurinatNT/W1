<?php
require 'connect.php';
$sql = "SELECT suggestion FROM survey WHERE suggestion <> ''";
$res = $link->query($sql);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>ข้อเสนอแนะ</title></head>
<body>
<h3>ข้อเสนอแนะจากผู้ตอบแบบสอบถาม</h3>
<ul>
<?php while($row=$res->fetch_assoc()){ echo "<li>".htmlspecialchars($row['suggestion'])."</li>"; } ?>
</ul>
</body>
</html>
