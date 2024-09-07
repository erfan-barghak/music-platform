<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cssdashboardadmin.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- بارگذاری کتابخانه Chart.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- بارگذاری jQuery -->


</head>
<body>

    <!-- سایدبار -->
    <div class="sidebar" style="float: right;">
    <div class="logo">
        <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo">
    </div>
    <ul>
        <li>
            <a href="<?php echo site_url('dashboard-admin'); ?>" class="active">داشبورد</a>
        </li>
        <li>
            <a href="<?php echo site_url('user_management'); ?>" class="toggle">مدیریت کاربران</a>
            <ul>
                <li><a href="<?php echo site_url('user_management/create'); ?>">افزودن کاربر</a></li>
                <li><a href="<?php echo site_url('user_management'); ?>">مشاهده کاربران</a></li>
            </ul>
        </li>
        <li>
            <ui>
                <li><a href="<?php echo site_url('music_management/create'); ?>">افزودن موزیک</a></li>
                <li><a href="<?php echo site_url('music_management'); ?>">مشاهده موزیک‌ها</a></li>
            </ui>
        </li>
        <li>
            <ui>
                <li><a href="<?php echo site_url('admin/ads/create'); ?>">افزودن اسلایدر</a></li>
                <li><a href="<?php echo site_url('admin/ads'); ?>">مشاهده اسلایدر ها</a></li>
            </ui>
        </li>
        <!-- <li><a href="<?php echo site_url('settings'); ?>">تنظیمات</a></li> -->
    </ul>
</div>


    <!-- هدر -->
    <div class="header">
        <div>
            <a href="<?php echo site_url('home'); ?>">بازدید سایت</a>
        </div>
        <div class="profile">
            <a style="background-color: #456515; padding:5px; border-radius:5px;" href="<?php echo site_url('admin_profile'); ?>"><?php echo $this->session->userdata('username'); ?></a>
            <img src="<?php echo base_url('assets/images/my-prof.jpg'); ?>" alt="Profile">
        </div>
    </div>

    <!-- محتوای اصلی -->
    <div class="content" style="float: left;">
        <h1 style="padding:10px;">داشبورد مدیریت</h1>

        <div class="container">
        <h2>ثبت نام های ماهانه</h2>
        <canvas id="userChart" width="600" height="150"></canvas>
        </div>

        <!-- کارت‌های داشبورد -->
        <div class="dashboard-cards">
            <div class="card">
                <h3>تعداد کاربران ثبت‌نام شده</h3>
                <p>تعداد کاربران ثبت‌نام‌شده: <?php echo isset($total_users) ? $total_users : 0; ?></p>

            </div>

            <div class="card">
                <h3>موزیک‌های افزوده شده</h3>
                <p>موزیک های افزوده شده : <?php echo $music_count; ?></p>
            </div>
        </div>

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
                <th>کد زیرمجموعه گیری</th>
                <th>تاریخ ثبت نام</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td><?php echo $user['referral_code']; ?></td>
                <td><?php echo $user['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>هیچ کاربری وجود ندارد.</p>
<?php endif; ?>

        </div>

    </div>




    <script>
        // دریافت داده‌ها از PHP
        fetch('assets/chart/get_registration_chart.php')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('userChart').getContext('2d');
                const userChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'ثبت نام های ماهانه',
                            data: data.data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>


    

</body>
</html>
