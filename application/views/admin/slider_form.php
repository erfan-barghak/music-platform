<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن / ویرایش اسلایدر</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
</head>
<body>
    <div class="container">
        <h1><?php echo isset($slider) ? 'ویرایش اسلایدر' : 'افزودن اسلایدر جدید'; ?></h1>

        <?php echo validation_errors(); ?>
        <?php echo form_open(isset($slider) ? 'slider/edit/' . $slider['id'] : 'slider/create'); ?>

        <div class="form-group">
            <label for="title">عنوان:</label>
            <input type="text" name="title" value="<?php echo set_value('title', isset($slider['title']) ? $slider['title'] : ''); ?>">
        </div>

        <div class="form-group">
            <label for="description">توضیحات:</label>
            <textarea name="description"><?php echo set_value('description', isset($slider['description']) ? $slider['description'] : ''); ?></textarea>
        </div>

        <div class="form-group">
            <label for="link_type">نوع لینک:</label>
            <select name="link_type">
                <option value="music" <?php echo set_select('link_type', 'music', isset($slider['link_type']) && $slider['link_type'] == 'music'); ?>>موزیک</option>
                <option value="category" <?php echo set_select('link_type', 'category', isset($slider['link_type']) && $slider['link_type'] == 'category'); ?>>دسته‌بندی</option>
                <option value="page" <?php echo set_select('link_type', 'page', isset($slider['link_type']) && $slider['link_type'] == 'page'); ?>>صفحه</option>
            </select>
        </div>

        <div class="form-group">
            <label for="link_id">شناسه لینک:</label>
            <input type="text" name="link_id" value="<?php echo set_value('link_id', isset($slider['link_id']) ? $slider['link_id'] : ''); ?>">
        </div>

        <div class="form-group">
            <label for="banner_image">تصویر بنر:</label>
            <input type="text" name="banner_image" value="<?php echo set_value('banner_image', isset($slider['banner_image']) ? $slider['banner_image'] : ''); ?>">
        </div>

        <div class="form-group">
            <button type="submit"><?php echo isset($slider) ? 'ویرایش' : 'افزودن'; ?></button>
        </div>

        <?php echo form_close(); ?>
    </div>
</body>
</html>
