<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/css-dashboard-admin.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cssdashboardadmin.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- بارگذاری کتابخانه Chart.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- بارگذاری jQuery -->

    <style>
        /* استایل کلی جدول */
table {
    width: 100%;
    border-collapse: collapse; /* حذف فاصله‌های بین سلول‌ها */
    margin: 20px 0; /* فاصله بالا و پایین جدول */
}

/* استایل سرستون‌ها */
th {
    background-color: #f4f4f4; /* رنگ پس‌زمینه روشن برای سرستون‌ها */
    color: #333; /* رنگ متن سرستون‌ها */
    padding: 12px; /* فاصله داخلی سرستون‌ها */
    text-align: left; /* تراز متن به چپ */
    border-bottom: 2px solid #ddd; /* خط پایین سرستون‌ها */
}

/* استایل سلول‌های جدول */
td {
    padding: 10px; /* فاصله داخلی سلول‌ها */
    border-bottom: 1px solid #ddd; /* خط پایین سلول‌ها */
    text-align: left; /* تراز متن به چپ */
}

/* استایل سطرهای جدول */
tr:nth-child(even) {
    background-color: #f9f9f9; /* رنگ پس‌زمینه سطرهای زوج */
}

tr:hover {
    background-color: #f1f1f1; /* رنگ پس‌زمینه هنگام حرکت موس روی سطر */
}

/* استایل کلی جدول برای صفحه‌های کوچک */
@media screen and (max-width: 600px) {
    table {
        width: 100%;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

/* Button Styles */
.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Table Styles */
.user-table {
    width: 100%;
    border-collapse: collapse;
}

.user-table th, .user-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.user-table th {
    background-color: #007bff;
    color: #fff;
}

.user-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Form Styles */
.form {
    display: flex;
    flex-direction: column;
    max-width: 500px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

    </style>
</head>
<body>

    <!-- سایدبار -->
    <div class="sidebar" style="float: right;">
        <div class="logo">
            <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo">
        </div>
        <ul>
            <li>
                <a href="<?php echo site_url('dashboard-admin'); ?>" class="active">برگشت به داشبورد</a>
            </li>
            <!-- <li>
                <a class="toggle">مدیریت کاربران</a>
                <ul>
                    <li><a href="<?php echo site_url('user_management/create'); ?>">افزودن کاربر</a></li>
                    <li><a href="<?php echo site_url('user_management'); ?>">مشاهده کاربران</a></li>                    </ul>
            </li>
            <li>
                <a href="<?php echo site_url('manage-content'); ?>" class="toggle">مدیریت محتوا</a>
                <ul>
                    <li><a href="<?php echo site_url('add-content'); ?>">افزودن محتوا</a></li>
                    <li><a href="<?php echo site_url('view-content'); ?>">مشاهده محتوا</a></li>
                </ul>
            </li>
            <li><a href="<?php echo site_url('settings'); ?>">تنظیمات</a></li>
        </ul> -->
    </div>

    <!-- هدر -->
    <div class="header">
        <div>
            <a href="<?php echo site_url('home'); ?>">بازدید سایت</a>
        </div>
        <div class="profile">
        <a style="background-color: #456515; padding:5px; border-radius:5px;" href="<?php echo site_url('profile'); ?>"><?php echo $this->session->userdata('username'); ?></a>
        <img src="<?php echo base_url('assets/images/my-prof.jpg'); ?>" alt="Profile">
        </div>
    </div>

    <!-- محتوای اصلی -->
    <div class="content">
        <div class="container">
        <h1>ساخت کاربری</h1>
        <form action="<?php echo site_url('user_management/store'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="username">نام کاربری:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">ایمیل:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">رمز عبور:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">ساخت کاربر</button>
        </form>
    </div>

    </div>
</body>
</html>
