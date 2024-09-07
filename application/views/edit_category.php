<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش دسته‌بندی</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-category-form.css'); ?>">
</head>
<body>
    <div class="category-form-container">
        <h1>ویرایش دسته‌بندی</h1>

        <?php if (validation_errors()): ?>
            <div class="error-message">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('categories/edit/'.$category['id']); ?>
            <div class="form-group">
                <label for="name">نام دسته‌بندی:</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name', $category['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">توضیحات:</label>
                <textarea id="description" name="description"><?php echo set_value('description', $category['description']); ?></textarea>
            </div>
            <button type="submit">به‌روزرسانی دسته‌بندی</button>
        <?php echo form_close(); ?>
    </div>
</body>
</html>
