<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی سایت موزیک</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

        /* استایل برای بخش‌های کشویی */
.music-slider, .category-slider {
    display: flex;
    overflow-x: auto;
    padding: 10px 0;
    scroll-snap-type: x mandatory;
}

.music-item, .category-item {
    flex: 0 0 auto;
    width: 200px; /* عرض باکس موزیک */
    margin-right: 15px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    scroll-snap-align: start;
    background-color: #fff;
}

.music-item img, .category-item img {
    width: 100%;
    height: auto;
    display: block;
}

.music-info, .category-item h3 {
    padding: 10px;
    text-align: center;
}

.music-info h3 {
    font-size: 16px;
    margin: 0;
    color: #333;
}

.music-info p {
    font-size: 14px;
    color: #666;
}

.category-item {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
}

.category-item h3 {
    font-size: 14px;
    color: #333;
}

.btn-more {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.btn-more:hover {
    background-color: #0056b3;
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

.slider-container {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    height: 500px;
    box-sizing: border-box;
    position: relative;
}

.slide img {
    width: 100%;
    border-radius: 8px;
}

.slide h2 {
    color: #f8f8f8;
}

.slide-content {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
}

button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}

.prev-slide {
    left: 10px;
}

.next-slide {
    right: 10px;
}

button:hover {
    background: rgba(0, 0, 0, 0.7);
}

.ad-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
    background: #f4f4f4;
}

.ad-slider-wrapper {
    display: flex;
    transition: transform 0.5s ease;
    cursor: grab; /* Change cursor to indicate draggable area */
}

.ad-slide {
    min-width: 100%;
    box-sizing: border-box;
    text-align: center;
    position: relative;
}

.ad-slide img {
    width: 100%;
    height: auto;
    border-bottom: 5px solid #333; /* Add a border for aesthetics */
}

.ad-slide p {
    margin: 10px 0;
    font-size: 1.2em;
    color: #333;
}

.ad-slide a {
    display: inline-block;
    padding: 10px 20px;
    background: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.ad-slide a:hover {
    background: #555;
}

button.prev, button.next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1000;
    border-radius: 50%;
    font-size: 1.5em;
}

button.prev {
    left: 10px;
}

button.next {
    right: 10px;
}

.category-section {
    padding: 20px;
    background-color: #f9f9f9;
}

.category-section {
    padding: 20px;
    background-color: #f9f9f9;
}

/* Hide the close button in desktop view */
@media (min-width: 769px) {
    .close-menu {
        display: none;
    }
}


.ad-slider {
    position: relative;
    width: 100%;
    height: 400px;
    border-radius: 10px;
    overflow: hidden;
    box-sizing: border-box;
}

.ad-slider-container {
    display: flex;
    align-items: center;
    position: relative;
}

.ad-slides {
    display: flex;
    border-radius: 20px;
    height: 400px;
    transition: transform 0.5s ease-in-out;
}

.ad-slide {
    min-width: 100%;
    box-sizing: border-box;
    position: relative;
    height: 400px;
}

.ad-slide img {
    width: 100%;
    height: 400px;
    height: auto;
    display: block;
}

.ad-content-t {
    position: absolute;
    bottom: 100px;
    left: 20px;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
}

.ad-content {
    position: absolute;
    bottom: 10px;
    left: 20px;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
}

.prev-slide, .next-slide {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 100;
    border-radius: 5px;
    font-size: 18px;
}

.prev-slide {
    left: 10px;
}

.next-slide {
    right: 10px;
}

@media (max-width: 768px) {
    .ad-content {
        font-size: 14px;
        bottom: 5px;
        left: 10px;
    }

    .prev-slide, .next-slide {
        font-size: 16px;
        padding: 5px;
    }
}





    </style>
</head>
<body>
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

    <main>
    <!-- بخش اسلاید شو -->
    <section class="slider">
    <div class="slider-container">
        <div class="slider">
            <?php if (isset($sliders) && !empty($sliders)): ?>
                <?php foreach ($sliders as $slider): ?>
                    <div class="slide" data-link="<?php echo $slider['link_type'] === 'external' ? $slider['link_id'] : site_url('music-details?id=' . $slider['link_id']); ?>">
                        <img src="<?php echo htmlspecialchars($slider['banner_image']); ?>" alt="<?php echo htmlspecialchars($slider['title']); ?>">
                        <div class="slide-content">
                            <h2><?php echo htmlspecialchars($slider['title']); ?></h2>
                            <p><?php echo htmlspecialchars($slider['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>هیچ اسلایدی یافت نشد.</p>
            <?php endif; ?>
        </div>
        <button class="prev-slide">❮</button>
        <button class="next-slide">❯</button>
    </div>
    </section>

    <!-- موزیک‌های ویژه -->
    <section class="featured-music">
    <h2>موزیک‌های ویژه     <a style="float: right;" href="<?php echo site_url('featured-music'); ?>" class="btn-more">مشاهده بیشتر</a>    </h2>
    <div class="music-slider">
        <?php foreach ($featured_music as $music): ?>
            <div class="music-item">
                <a href="<?php echo site_url('music-details?id=' . $music['id']); ?>">
                    <img src="<?php echo htmlspecialchars($music['image']); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" class="music-image">
                    <div class="music-info">
                        <h3><?php echo htmlspecialchars($music['title']); ?></h3>
                        <p><?php echo htmlspecialchars($music['artist']); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="ad-slider">
    <div class="ad-slider-container">
        <div class="ad-slide">
            <?php if (isset($ads) && !empty($ads)): ?>
                <?php foreach ($ads as $ad): ?>
                    <div class="ad-slide" data-link="<?php echo htmlspecialchars($ad->link); ?>">
                        <img src="<?php echo htmlspecialchars($ad->image); ?>" alt="<?php echo htmlspecialchars($ad->title); ?>">
                        <div class="ad-content">
                            <h2 style="color: #f4f4f4;"><?php echo htmlspecialchars($ad->title); ?></h2>
                            <a href="<?php echo htmlspecialchars($ad->link); ?>" target="_blank">مشاهده</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>هیچ تبلیغاتی یافت نشد.</p>
            <?php endif; ?>
        </div>
    </div>
</section>


<script src="<?php echo base_url('assets/js/slider.js'); ?>"></script>


<section class="recently-played">
    <h2>موزیک‌های پخش شده اخیر     <a style="float: right;" href="<?php echo site_url('recently-played'); ?>" class="btn-more">مشاهده بیشتر</a>    </h2>
    <div class="music-slider">
        <?php foreach ($recently_played_music as $music): ?>
            <div class="music-item">
                <a href="<?php echo site_url('music-details?id=' . $music['id']); ?>">
                    <img src="<?php echo htmlspecialchars($music['image']); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" class="music-image">
                    <div class="music-info">
                        <h3><?php echo htmlspecialchars($music['title']); ?></h3>
                        <p><?php echo htmlspecialchars($music['artist']); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="newly-added">
    <h2>موزیک‌های تازه افزوده شده     <a style="float: right;" href="<?php echo site_url('newly-added'); ?>" class="btn-more">مشاهده بیشتر</a>
    </h2>
    <div class="music-slider">
        <?php foreach ($newly_added_music as $music): ?>
            <div class="music-item">
                <a href="<?php echo site_url('music-details?id=' . $music['id']); ?>">
                    <img src="<?php echo htmlspecialchars($music['image']); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" class="music-image">
                    <div class="music-info">
                        <h3><?php echo htmlspecialchars($music['title']); ?></h3>
                        <p><?php echo htmlspecialchars($music['artist']); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>


    </main>

    <footer>
        <div class="container">
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

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>
</html>
