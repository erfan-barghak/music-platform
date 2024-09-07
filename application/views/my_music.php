<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موزیک‌های من</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-my-music.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/css-footer.css'); ?>">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 0;
        }

        header h1 {
            display: inline;
            margin: 0 20px;
        }

        header nav ul {
            display: inline;
            list-style: none;
            padding: 0;
            margin: 0;
            float: right;
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

        .main {
            padding: 20px;
        }

        .slider {
            margin: 20px 0;
        }

        .slides {
            display: flex;
            overflow: hidden;
            width: 100%;
        }

        .slide {
            min-width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slide img {
            width: 100%;
            height: auto;
        }

        .caption {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        section {
            margin: 20px 0;
        }

        section h2 {
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        .btn-more {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .btn-more:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline-block;
        }

        footer ul li {
            display: inline;
            margin-right: 15px;
        }

        footer ul li a {
            color: white;
            text-decoration: none;
        }

        footer ul li a:hover {
            text-decoration: underline;
        }

        .user-music {
    padding: 20px;
}

.music-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.music-item {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
    width: 200px;
    text-align: center;
    background-color: #f9f9f9;
    padding: 10px;
}

.music-item img {
    width: 100%;
    height: auto;
    display: block;
}

.music-details {
    padding: 10px;
}

.music-details h3 {
    font-size: 16px;
    margin: 0;
}

.music-details p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

.music-details a {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 3px;
}

.music-details a:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>موزیک‌های من</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">خانه</a></li>
                    <li><a href="<?php echo site_url('dashboard-user'); ?>">داشبورد کاربری</a></li>
                    <li><a href="<?php echo site_url('logout'); ?>">خروج</a></li>
                </ul>
            </nav>
            <?php if ($this->session->userdata('profile_picture')): ?>
            <div class="profile-picture">
                <img src="<?php echo base_url('uploads/profile_pictures/' . $this->session->userdata('profile_picture')); ?>" alt="Profile Picture" width="50">
            </div>
        <?php endif; ?>
        </div>
    </header>

    <main>
    <section class="user-music">
        <h2>موزیک‌های شما</h2>
        <div class="music-list">
            <?php if (!empty($user_music)): ?>
                <?php foreach ($user_music as $music): ?>
                    <div class="music-item">
                        <img src="<?php echo htmlspecialchars($music['image']); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" class="music-image">
                        <div class="music-details">
                            <h3><?php echo htmlspecialchars($music['title']); ?></h3>
                            <p>هنرمند: <?php echo htmlspecialchars($music['artist']); ?></p>
                            <p>آلبوم: <?php echo htmlspecialchars($music['album']); ?></p>
                            <p>تاریخ انتشار: <?php echo htmlspecialchars($music['release_date']); ?></p>
                            <a href="<?php echo htmlspecialchars($music['download_url']); ?>" target="_blank">دانلود موزیک</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>موزیکی برای نمایش وجود ندارد.</p>
            <?php endif; ?>
        </div>
    </section>

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 سایت موزیک. تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
</body>
</html>
