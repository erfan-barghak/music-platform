<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت‌نام</title>
    <style>
        /* افزودن CSS برای ظاهر زیبا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .signup-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-box .form-group {
            margin-bottom: 15px;
        }

        .signup-box .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .signup-box .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .signup-box button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .signup-box button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="signup-box">
    <h2>ثبت‌نام</h2>
    <form action="<?php echo base_url('signup/submit'); ?>" method="post">
        <div class="form-group">
            <label for="username">نام کاربری</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">رمز عبور</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="referral_code">کد رفرال (اختیاری)</label>
            <input type="text" id="referral_code" name="referral_code">
        </div>
        <button type="submit">ثبت‌نام</button>
    </form>
</div>

</body>
</html>
