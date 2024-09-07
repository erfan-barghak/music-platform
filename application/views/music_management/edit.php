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

/* استایل فرم */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* استایل برچسب‌ها */
form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

/* استایل فیلدهای ورودی */
form input[type="text"],
form input[type="date"],
form select,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* استایل فیلدهای ورودی در حالت تمرکز */
form input[type="text"]:focus,
form input[type="date"]:focus,
form select:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 3px rgba(0, 123, 255, 0.25);
}

/* استایل دکمه ارسال */
form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* استایل دکمه ارسال در حالت hover */
form input[type="submit"]:hover {
    background-color: #0056b3;
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
    <form action="<?php echo site_url('music_management/update/'.$music['id']); ?>" method="post">
    <?php echo form_hidden($this->security->get_csrf_hash()); ?>
    <h1 style="text-align: center;">ویرایش موزیک</h1>

    <label for="title">عنوان:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($music['title']); ?>" required>
    <br>
    <label for="image">تصویر:</label>
    <input type="text" name="image" value="<?php echo htmlspecialchars($music['image']); ?>" required>
    <br>
    <label for="artist">هنرمند:</label>
    <input type="text" name="artist" value="<?php echo htmlspecialchars($music['artist']); ?>" required>
    <br>
    <label for="album">آلبوم:</label>
    <input type="text" name="album" value="<?php echo htmlspecialchars($music['album']); ?>" required>
    <br>
    <label for="release_date">تاریخ انتشار:</label>
    <input type="date" name="release_date" value="<?php echo htmlspecialchars($music['release_date']); ?>" required>
    <br>
    <label for="category">دسته‌بندی:</label>
    <select name="category_id" id="category" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" <?php echo $music['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($category['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="play_date">تاریخ پخش:</label>
    <input type="date" name="play_date" value="<?php echo htmlspecialchars($music['play_date']); ?>">
    <br>
    <label for="add_date">تاریخ افزودن:</label>
    <input type="date" name="add_date" value="<?php echo htmlspecialchars($music['add_date']); ?>" required>
    <br>
    <label for="download_url">لینک دانلود:</label>
    <input type="text" name="download_url" value="<?php echo htmlspecialchars($music['download_url']); ?>" required>
    <br>
    <label for="poets_text">متن ترانه:</label>
    <textarea name="poets_text" rows="5" cols="50"><?php echo htmlspecialchars($music['poets_text']); ?></textarea>
    <br>
    <input type="submit" value="بروزرسانی">
</form>


</body>
</html>
