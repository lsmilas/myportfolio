<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fos_db"; // تأكد من أن اسم قاعدة البيانات صحيح
$port = 3307; // تحديد المنفذ المخصص

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
