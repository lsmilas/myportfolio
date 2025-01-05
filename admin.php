<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور (قد تكون فارغة في بيئات التطوير)
$dbname = "portfolio_db"; // اسم قاعدة البيانات
$port = 3307; // رقم المنفذ

// إنشاء الاتصال مع تحديد المنفذ
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعلام لاسترجاع جميع الرسائل من جدول "contacts"
$sql = "SELECT id, name, email, message FROM contacts ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - إدارة الرسائل</title>
    <link rel="stylesheet" href="style.css"> <!-- يمكنك إضافة التنسيق هنا -->
</head>
<body>

    <main>
        <h2>الرسائل الواردة</h2>

        <?php if ($result->num_rows > 0): ?>
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الرسالة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo nl2br($row['message']); ?></td> <!-- nl2br لعرض الفواصل والأسطر الجديدة في الرسالة -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>لا توجد رسائل لعرضها.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 جميع الحقوق محفوظة.</p>
    </footer>

</body>
</html>

<?php
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>




