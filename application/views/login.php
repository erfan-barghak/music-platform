<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سیستم</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        /* استایل‌های کلی برای بدنه صفحه */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* باکس فرم لاگین */
        .login-box {
            background-color: #ffffff;
            width: 400px;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            direction: rtl; /* تنظیم جهت متن به راست */
        }

        /* عنوان صفحه لاگین */
        .login-box h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        /* استایل فیلدهای فرم */
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            direction: ltr; /* تنظیم جهت متن به چپ برای فیلدها */
        }

        /* دکمه لاگین */
        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* تغییر رنگ دکمه لاگین در هنگام هاور */
        .login-box button:hover {
            background-color: #45a049;
        }

        /* پیغام خطا */
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* استایل لینک‌ها */
        .login-box a {
            color: #3498db;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }

        .login-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>ورود به سیستم</h2>
    <?php echo form_open('login/submit'); ?>

    <!-- فیلد ایمیل -->
    <div>
        <input type="text" name="email" placeholder="ایمیل" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email', '<div class="error">', '</div>'); ?>
    </div>

    <!-- فیلد رمز عبور -->
    <div>
        <input type="password" name="password" placeholder="رمز عبور">
        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
    </div>

    <!-- پیام خطا (در صورت وجود) -->
    <?php if (isset($error)) { ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <!-- دکمه لاگین -->
    <button type="submit">ورود</button>

    <!-- لینک برای فراموشی رمز عبور -->
    <a href="#">رمز عبور خود را فراموش کرده‌اید؟</a>

    <?php echo form_close(); ?>
</div>

</body>
</html>
