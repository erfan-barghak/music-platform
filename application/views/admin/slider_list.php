<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت اسلایدرها</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>مدیریت اسلایدرها</h1>
        <a href="<?php echo site_url('slider/create'); ?>">افزودن اسلایدر جدید</a>

        <table>
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>توضیحات</th>
                    <th>نوع لینک</th>
                    <th>شناسه لینک</th>
                    <th>تصویر بنر</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliders as $slider): ?>
                    <tr>
                        <td><?php echo $slider['id']; ?></td>
                        <td><?php echo htmlspecialchars($slider['title']); ?></td>
                        <td><?php echo htmlspecialchars($slider['description']); ?></td>
                        <td><?php echo htmlspecialchars($slider['link_type']); ?></td>
                        <td><?php echo htmlspecialchars($slider['link_id']); ?></td>
                        <td><?php echo htmlspecialchars($slider['banner_image']); ?></td>
                        <td>
                            <a href="<?php echo site_url('slider/edit/' . $slider['id']); ?>">ویرایش</a> |
                            <a href="<?php echo site_url('slider/delete/' . $slider['id']); ?>" onclick="return confirm('آیا مطمئنید؟');">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
