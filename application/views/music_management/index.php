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

/* استایل پایه صفحه ساخت موزیک */
.music-form-container {
    width: 80%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.music-form-container-h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

.music-form-container form {
    display: flex;
    flex-direction: column;
}

.music-form-container label {
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

.music-form-container input[type="text"],
.music-form-container input[type="date"],
.music-form-container input[type="file"],
.music-form-container input[type="submit"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.music-form-container input[type="text"] {
    width: 100%;
}

.music-form-container input[type="date"] {
    width: 100%;
}

.music-form-container input[type="file"] {
    width: 100%;
}

.music-form-container input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 18px;
}

.music-form-container input[type="submit"]:hover {
    background-color: #0056b3;
}

.music-form-container .error {
    color: red;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 15px;
}

.music-form-container .success {
    color: green;
    font-size: 14px;
    margin-bottom: 15px;
}

.music-imagey{
    border-radius:15px;
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
    <h1 class="music-form-container-h1"> موزیک ها</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>عنوان</th>
                <th>تصویر</th>
                <th>هنرمند</th>
                <th>آلبوم</th>
                <th>تاریخ انتشار</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($music as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['title']; ?></td>
                    <td><img src="<?php echo htmlspecialchars($item['image']); ?>" width="50px" alt="<?php echo htmlspecialchars($item['title']); ?>" class="music-imagey">
                    </td>
                    <td><?php echo $item['artist']; ?></td>
                    <td><?php echo $item['album']; ?></td>
                    <td><?php echo $item['release_date']; ?></td>
                    <td>
                        <a href="<?php echo site_url('music_management/edit/'.$item['id']); ?>">ویرایش</a> |
                        <a href="<?php echo site_url('music_management/delete/'.$item['id']); ?>" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>




</body>
</html>
