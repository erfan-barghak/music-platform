<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست دسته‌بندی‌ها</title>
    <link rel="stylesheet" href="assets/css/style-categories.css"> <!-- فایل CSS خود را بارگذاری کنید -->
</head>
<body>
    <header>
        <h1>لیست دسته‌بندی‌ها</h1>
        <a href="<?php echo site_url('categories/create'); ?>">افزودن دسته‌بندی جدید</a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام</th>
                    <th>توضیحات</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['id']); ?></td>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td><?php echo htmlspecialchars($category['description']); ?></td>
                    <td><?php echo htmlspecialchars($category['created_at']); ?></td>
                    <td>
                        <a href="<?php echo site_url('categories/edit/' . $category['id']); ?>">ویرایش</a> |
                        <a href="<?php echo site_url('categories/delete/' . $category['id']); ?>" onclick="return confirm('آیا مطمئنید که می‌خواهید این دسته‌بندی را حذف کنید؟');">حذف</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 سایت موزیک. تمامی حقوق محفوظ است.</p>
    </footer>
</body>
</html>
