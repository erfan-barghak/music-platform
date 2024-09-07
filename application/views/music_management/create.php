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

/* استایل فرم */
.music-form-container {
    width: 100%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.music-form-container label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #333;
}

.music-form-container input[type="text"],
.music-form-container input[type="date"],
.music-form-container textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.music-form-container textarea {
    resize: vertical;
    min-height: 120px;
}

.music-form-container input[type="text"]:focus,
.music-form-container input[type="date"]:focus,
.music-form-container textarea:focus {
    border-color: #66afe9;
    outline: none;
}

.music-form-container input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.music-form-container input[type="submit"]:hover {
    background-color: #45a049;
}

/* استایل برای لیبل و سلکت */
label {
    font-size: 16px;
    color: #f4f4f4;
    margin-bottom: 8px;
    display: inline-block;
}

select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    background-color: #333;
    color: #f4f4f4;
    border: 1px solid #666;
    border-radius: 8px;
    appearance: none;
    outline: none;
    cursor: pointer;
    transition: border-color 0.3s ease;
}

select:hover {
    border-color: #f39c12;
}

select:focus {
    border-color: #f39c12;
    box-shadow: 0 0 5px rgba(243, 156, 18, 0.5);
}

option {
    background-color: #333;
    color: #f4f4f4;
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
    <h1 class="music-form-container-h1">افزودن موزیک جدید</h1>
    <form class="music-form-container" action="<?php echo site_url('music_management/store'); ?>" method="post">
    <label for="title">عنوان:</label>
    <input type="text" name="title" required>
    <br>
    <label for="image">تصویر:</label>
    <input type="text" name="image" required>
    <br>
    <label for="artist">هنرمند:</label>
    <input type="text" name="artist" required>
    <br>
    <label for="album">آلبوم:</label>
    <input type="text" name="album" required>
    <br>
    <label for="release_date">تاریخ انتشار:</label>
    <input type="date" name="release_date">
    <br>
    <label for="category">دسته‌بندی:</label>
    <select name="category_id" id="category" required>
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>">
            <?php echo htmlspecialchars($category['name']); ?>
        </option>
    <?php endforeach; ?>
    </select>

    <br>
    <label for="play_date">تاریخ پخش:</label>
    <input type="date" name="play_date">
    <br>
    <label for="add_date">تاریخ افزودن:</label>
    <input type="date" name="add_date">
    <br>
    <label for="download_url">لینک دانلود:</label>
    <input type="text" name="download_url">
    <br>
    <label for="poets_text">متن ترانه:</label>
    <textarea name="poets_text" required><?php echo isset($music['poets_text']) ? $music['poets_text'] : ''; ?></textarea>
    <br>
    <input type="submit" value="ذخیره">
    </form>
    </div>




</body>
</html>
