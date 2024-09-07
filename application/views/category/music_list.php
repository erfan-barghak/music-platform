<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست موزیک‌های دسته‌بندی: <?php echo htmlspecialchars($category_name); ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-music-list.css'); ?>">
    <style>
        /* برای نمونه، استایل ساده برای جدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="music-list-container">
        <h1>لیست موزیک‌های دسته‌بندی: <?php echo htmlspecialchars($category_name); ?></h1>

         <?php if (empty($music_list)): ?>
            <p>هیچ موزیکی در این دسته‌بندی یافت نشد.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>تصویر</th>
                        <th>عنوان</th>
                        <th>هنرمند</th>
                        <th>آلبوم</th>
                        <th>تاریخ انتشار</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($music_list as $music): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars(base_url('uploads/' . $music['image'])); ?>" alt="<?php echo htmlspecialchars($music['title']); ?>" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td><?php echo htmlspecialchars($music['title']); ?></td>
                            <td><?php echo htmlspecialchars($music['artist']); ?></td>
                            <td><?php echo htmlspecialchars($music['album']); ?></td>
                            <td><?php echo htmlspecialchars($music['release_date']); ?></td>
                            <td>
                                <a href="<?php echo site_url('music-details/' . $music['id']); ?>" class="btn">مشاهده جزئیات</a>
                                <a href="<?php echo site_url('music/play/' . $music['id']); ?>" class="btn">پخش موزیک</a>
                                <a href="<?php echo site_url('music/download/' . $music['id']); ?>" class="btn">دانلود موزیک</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
