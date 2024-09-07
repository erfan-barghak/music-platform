<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت</title>
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
            <a href="<?php echo site_url('user_management'); ?>" class="toggle">مدیریت کاربران</a>
            <ul>
                <li><a href="<?php echo site_url('add-user'); ?>">افزودن کاربر</a></li>
                <li><a href="<?php echo site_url('user_management'); ?>">مشاهده کاربران</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('music_management'); ?>" class="toggle">مدیریت موزیک</a>
            <ul>
                <li><a href="<?php echo site_url('music_management/create'); ?>">افزودن موزیک</a></li>
                <li><a href="<?php echo site_url('music_management'); ?>">مشاهده موزیک‌ها</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('manage-content'); ?>" class="toggle">مدیریت محتوا</a>
            <ul>
                <li><a href="<?php echo site_url('add-content'); ?>">افزودن محتوا</a></li>
                <li><a href="<?php echo site_url('view-content'); ?>">مشاهده محتوا</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url('settings'); ?>">تنظیمات</a></li> -->
    </ul>
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
    <div class="content" style="float: left;">
        <h1 style="padding:10px;">داشبورد مدیریت</h1>
        <div>
        <h1>لیست کاربران</h1>
<?php 
if (isset($users) && !empty($users) && is_array($users)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تاریخ ثبت‌نام</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>هیچ کاربری وجود ندارد.</p>
<?php endif; ?>

        </div>

    </div>

</body>
</html>
