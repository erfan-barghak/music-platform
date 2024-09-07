<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد کاربر</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
            color: white;
        }
        header h1 {
            margin: 0;
        }
        header nav ul {
            list-style-type: none;
            padding: 0;
        }
        header nav ul li {
            display: inline;
            margin-right: 20px;
        }
        header nav ul li a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        header nav ul li a:hover {
            background-color: #555;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .user-info, .subordinates {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .user-info h2, .subordinates h3 {
            margin-top: 0;
        }
        .user-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .user-info table, .user-info th, .user-info td {
            border: 1px solid #ddd;
        }
        .user-info th, .user-info td {
            padding: 8px;
            text-align: left;
        }
        .user-info th {
            background-color: #f2f2f2;
        }
        .user-info img {
            display: block;
            margin: 10px auto;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .btn-edit {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-edit:hover {
            background-color: #45a049;
        }
        .user-list {
            list-style: none;
            padding: 0;
        }
        .user-list li {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <nav>
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">خانه</a></li>
                    <?php if ($this->session->userdata('user_id')): ?>
                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                            <li><a href="<?php echo site_url('dashboard-admin'); ?>">داشبورد مدیریت</a></li>
                            <li><a href="<?php echo site_url('manage-users'); ?>">مدیریت کاربران</a></li>
                            <li><a href="<?php echo site_url('manage-content'); ?>">مدیریت محتوا</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo site_url('my-music'); ?>">موزیک‌های من</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a href="<?php echo site_url('login'); ?>">ورود</a></li>
                        <li><a href="<?php echo site_url('signup'); ?>">ثبت نام</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h1 style="padding: 10px;">داشبورد شما</h1>

            <div class="user-info">
                <?php if ($user->profile_picture): ?>
                    <img src="<?php echo base_url('uploads/profile_pictures/' . $user->profile_picture); ?>" alt="Profile Picture">
                <?php else: ?>
                    <p>تصویر پروفایل آپلود نشده است.</p>
                <?php endif; ?>

                <h2 style="padding: 10px;">اطلاعات کاربری</h2>
                <table>
                    <tr>
                        <th>نام کاربری</th>
                        <td><?php echo $user->username; ?></td>
                    </tr>
                    <tr>
                        <th>ایمیل</th>
                        <td><?php echo $user->email; ?></td>
                    </tr>
                    <tr>
                        <th>کد دعوت</th>
                        <td><?php echo $user->referral_code; ?></td>
                    </tr>
                </table>
                
                <a href="<?php echo site_url('profile/edit'); ?>" class="btn-edit">ویرایش پروفایل</a>
                <a href="<?php echo site_url('logout'); ?>" class="btn-edit">خروج</a>
            </div>

            <div class="subordinates">
                <h3>زیرمجموعه‌های شما</h3>
                <ul class="user-list">
                    <?php if (!empty($subordinates)): ?>
                        <?php foreach ($subordinates as $subordinate): ?>
                            <li>
                                <p><strong>نام:</strong> <?php echo $subordinate->username; ?></p>
                                <p><strong>ایمیل:</strong> <?php echo $subordinate->email; ?></p>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>زیرمجموعه‌ای یافت نشد.</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </main>

    <footer>
        <div>
            <p>&copy; 2024 سایت موزیک. تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
</body>
</html>
