<!DOCTYPE html>
<html lag="fa" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پخش کننده موزیک</title>
    <style>

        /* باکس اطلاعات موزیک */
        .music-info-box {
            direction: rtl;
            background-color: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        /* تصویر موزیک */
        .music-image {
            width: 150px;
            height: 150px;
            border-radius: 5%;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* اطلاعات موزیک */
        .music-info {
            text-align: right;
            margin-left: 20px;
        }

        .music-info h2 {
            font-size: 24px;
            margin: 10px 0;
        }

        .music-info p {
            font-size: 16px;
            margin: 5px 0;
        }

        /* باکس پخش‌کننده موزیک */
        .audio-player-box {
            background-color: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        /* دکمه‌های کنترل پخش */
        .custom-controls {
            margin-top: 20px;
            border-radius: 10%;
            display: flex;
        }

        .custom-controls button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 10%;
            margin: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-controls button:hover {
            background-color: #45a049;
        }

        /* نوار پیشرفت */
        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 15px;
            position: relative;
            cursor: pointer;
        }

        .progress-bar-inner {
            height: 100%;
            width: 0;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: width 0.25s;
        }

        /* دایره روی نوار پیشرفت */
        .progress-circle {
            width: 16px;
            height: 16px;
            background-color: #fff;
            border: 2px solid #4CAF50;
            border-radius: 50%;
            position: absolute;
            top: -3px;
            left: 0;
            transform: translateX(-50%);
        }

        /* دکمه دانلود */
        .btn-download {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1589;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
            transition: background-color 0.3s;
        }

        .btn-download:hover {
            background-color: #45a049;
        }

        /* Base styles */
header {
    position: relative;
    background-color: #333;
    color: #fff;
    padding: 10px;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu-toggle {
    display: none;
    background: #444;
    border: none;
    color: #fff;
    font-size: 24px;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
}

.main-nav {
    display: flex;
    align-items: center;
}

.main-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.main-nav ul li {
    margin-left: 20px;
}

.main-nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 4px;
}

.main-nav ul li a:hover {
    background-color: #555;
}

/* Mobile styles */
@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }

    .main-nav {
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: #333;
        transition: transform 0.3s ease;
        transform: translateX(100%);
        overflow-y: auto;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .main-nav.active {
        transform: translateX(0);
    }

    .main-nav ul {
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 0;
        width: 65%;
        height: 50px;
    }

    .main-nav ul li {
        margin-top: 30px;
    }

    .main-nav ul li a {
        font-size: 25px;
        padding: 20px;
    }

    .close-menu {
        display: block;
        background: #444;
        border: none;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 10px;
        border-radius: 4px;
    }

    .site-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #fff;
    }
}

/* Hide the close button in desktop view */
@media (min-width: 769px) {
    .close-menu {
        display: none;
    }
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

        .box-items-dl-pl{
            border: 1px solid gray;
            background-color: #1506;
            margin: 10px;
            padding: 10px;
            border-radius: 20px;
        }

        .box-items-dl-pl button{
            border: 1px solid gray;
            background-color: #1589;
            margin: 5px;
            padding: 10px;
            border-radius: 20px;
        }

        .box-items-dl-pl button:hover{
            background-color: #45a049;
        }

        .lyrics-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            height: auto;
        }
        .lyrics-box h3 {
            font-size: 25px;
            margin-bottom: 10px;
        }
        .lyrics-box p {
            font-size: 18px;
            white-space: pre-wrap; /* برای نمایش صحیح پاراگراف‌ها */
        }

    </style>
</head>
<body>

    <!-- هدر -->
    <header>
    <div class="container">
        <h1 style="font-size: 25px;">سایت موزیک</h1>
        <button class="menu-toggle">☰</button>
        <nav class="main-nav">
            <button class="close-menu">&times;</button>
            <ul>
                <?php if ($this->session->userdata('user_id')): ?>
                    <!-- منوی کاربران وارد شده -->
                    <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <!-- منوی مدیر -->
                        <li><a href="<?php echo site_url('dashboard-admin'); ?>">داشبورد مدیریت</a></li>
                        <li><a href="<?php echo site_url('manage-users'); ?>">مدیریت کاربران</a></li>
                        <li><a href="<?php echo site_url('manage-content'); ?>">مدیریت محتوا</a></li>
                    <?php else: ?>
                        <!-- منوی کاربر عادی -->
                        <li><a href="<?php echo site_url('my-music'); ?>">موزیک‌های من</a></li>
                        <li><a href="<?php echo site_url('dashboard-user'); ?>">داشبورد کاربری</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo site_url('logout'); ?>">خروج</a></li>
                <?php else: ?>
                    <!-- منوی کاربران وارد نشده -->
                    <li><a href="<?php echo site_url('login'); ?>">ورود</a></li>
                    <li><a href="<?php echo site_url('signup'); ?>">ثبت نام</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

    <!-- باکس اطلاعات موزیک -->
    <div class="music-info-box">
        <!-- تصویر موزیک -->
        <img src="<?php echo htmlspecialchars($music['image']); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" class="music-image">

        <!-- اطلاعات موزیک -->
        <div class="music-info">
            <h2><?php echo htmlspecialchars($music['title']); ?></h2>
            <p><strong>هنرمند:</strong> <?php echo htmlspecialchars($music['artist']); ?></p>
            <p><strong>آلبوم:</strong> <?php echo htmlspecialchars($music['album']); ?></p>
            <p><strong>تاریخ انتشار در سایت:</strong> <?php echo htmlspecialchars($music['release_date']); ?></p>
        </div>
    </div>

    <!-- باکس پخش‌کننده موزیک -->
    <div class="audio-player-box">
        <!-- نوار پیشرفت -->
        <div class="progress-bar" id="progress-bar">
            <div class="progress-bar-inner" id="progress"></div>
            <div class="progress-circle" id="progress-circle"></div>
        </div>

        <!-- دکمه‌های کنترل پخش -->
        <div class="box-items-dl-pl">
            <button id="play-btn">▶️</button>
            <button id="pause-btn" style="display: none;">⏸️</button>
            <button id="rewind-btn">⏪</button>
            <button id="forward-btn">⏩</button>
            <?php if (!empty($download_url)): ?>
            <a href="<?php echo htmlspecialchars($download_url); ?>" class="btn-download" download>دانلود موزیک</a>
            <?php else: ?>
            <p>لینک دانلود در دسترس نیست.</p>
            <?php endif; ?>
        </div>

                    <!-- متن موزیک -->
                <?php if (!empty($music['poets_text'])): ?>
                <div class="lyrics-box">
                <h3>متن ترانه</h3>
                <p><?php echo nl2br(htmlspecialchars($music['poets_text'])); ?></p>
                </div>
                <?php else: ?>
                <p>متن ترانه موجود نیست.</p>
                 <?php endif; ?>

    </div>


    <!-- فوتر -->
    <footer>
        <div class="footer">
            <p>&copy; 2024 سایت موزیک. تمامی حقوق محفوظ است.</p>
            <!-- <p>توضیحات کوتاه درباره سایت.</p>
            <ul>
                <li><a href="#">لینک داخلی 1</a></li>
                <li><a href="#">لینک داخلی 2</a></li>
                <li><a href="#">لینک مفید 1</a></li>
                <li><a href="#">لینک مفید 2</a></li>
            </ul> -->
        </div>
    </footer>

    <!-- پخش‌کننده موزیک -->
    <audio id="audio-player" src="<?php echo htmlspecialchars($music['download_url']); ?>" preload="auto"></audio>

    <script>
        const audioPlayer = document.getElementById('audio-player');
        const playBtn = document.getElementById('play-btn');
        const pauseBtn = document.getElementById('pause-btn');
        const rewindBtn = document.getElementById('rewind-btn');
        const forwardBtn = document.getElementById('forward-btn');
        const progressBar = document.getElementById('progress');
        const progressCircle = document.getElementById('progress-circle');
        const progressBarContainer = document.getElementById('progress-bar');

        // پخش کردن موزیک
        playBtn.addEventListener('click', () => {
            audioPlayer.play();
            playBtn.style.display = 'none';
            pauseBtn.style.display = 'inline-block';
        });

        // متوقف کردن موزیک
        pauseBtn.addEventListener('click', () => {
            audioPlayer.pause();
            playBtn.style.display = 'inline-block';
            pauseBtn.style.display = 'none';
        });

        // عقب بردن موزیک
        rewindBtn.addEventListener('click', () => {
            audioPlayer.currentTime -= 10;
        });

        // جلو بردن موزیک
        forwardBtn.addEventListener('click', () => {
            audioPlayer.currentTime += 10;
        });

        // به روز رسانی نوار پیشرفت
        audioPlayer.addEventListener('timeupdate', () => {
            const percentage = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            progressBar.style.width = percentage + '%';
            progressCircle.style.left = percentage + '%';
        });

        // کنترل نوار پیشرفت با موس
        progressBarContainer.addEventListener('click', (e) => {
            const rect = progressBarContainer.getBoundingClientRect();
            const offsetX = e.clientX - rect.left;
            const percentage = (offsetX / rect.width);
            audioPlayer.currentTime = percentage * audioPlayer.duration;
        });
    </script>
        <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


</body>
</html>
