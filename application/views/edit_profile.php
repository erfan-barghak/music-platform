<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش پروفایل</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <header>
        <h1>ویرایش پروفایل</h1>
        <button style="border: 1px solid; float:right; background:#333; "><a style="text-decoration: none; color: #f4f4f4;" href="<?php echo site_url('dashboard-admin'); ?>">برگشت</a></button>
        <style>
            /* استایل کلی برای بدنه */
body {
    font-family: 'Vazir', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* استایل هدر */
header {
    background-color: #333;
    padding: 20px;
    text-align: center;
    color: white;
}

header h1 {
    margin: 0;
}

/* استایل فرم ویرایش پروفایل */
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

/* استایل تصویر پروفایل */
img {
    display: block;
    margin-top: 10px;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
}

/* استایل مخصوص فرم */
form {
    margin-top: 20px;
}

/* استایل دکمه ذخیره تغییرات */
button[type="submit"] {
    display: block;
    width: 100%;
    margin-top: 20px;
    padding: 15px;
    font-size: 18px;
}

/* استایل فوتر */
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
    </header>

    <main>
        <div class="container">
            <h1>ویرایش پروفایل</h1>
            <?php echo form_open_multipart('profile/update'); ?>

            <div class="form-group">
                <label for="username">نام کاربری:</label>
                <input type="text" name="username" value="<?php echo set_value('username', $user->username); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">ایمیل:</label>
                <input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="profile_picture">تصویر پروفایل:</label>
                <input type="file" name="profile_picture">
            </div>

            <button type="submit">بروز رسانی</button>
            <?php echo form_close(); ?>
        </div>
    </main>

    <footer>
        <div>
            <p>&copy; 2024 سایت موزیک. تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
</body>
</html>
