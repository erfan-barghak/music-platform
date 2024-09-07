<?php
$base_path = $_SERVER['DOCUMENT_ROOT'] . '/music-web/assets/chart/pChart2.1.4/class/';
require_once($base_path . 'pDraw.class.php');
require_once($base_path . 'pImage.class.php');
require_once($base_path . 'pData.class.php');

// اتصال به دیتابیس و بارگذاری داده‌ها
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "musicpl";

// ایجاد اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// دریافت داده‌های ثبت‌نام‌ها
$sql = "SELECT DATE_FORMAT(created_at, '%M %Y') as month, COUNT(id) as total FROM users GROUP BY DATE_FORMAT(created_at, '%Y-%m') ORDER BY DATE_FORMAT(created_at, '%Y-%m')";
$result = $conn->query($sql);

$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $labels[] = $row['month'];
        $data[] = $row['total'];
    }
}

$conn->close();

// تبدیل داده‌ها به JSON برای استفاده در JavaScript
echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
