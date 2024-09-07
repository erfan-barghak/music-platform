<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // متد برای دریافت دسته‌بندی بر اساس ID
    public function get_category($id) {
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row_array();
    }

    // متد برای ایجاد دسته‌بندی جدید
    public function create_category($data) {
        return $this->db->insert('categories', $data);
    }
    

    // متد برای به‌روزرسانی دسته‌بندی
    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }

    // متد برای حذف دسته‌بندی
    public function delete_category($id) {
        return $this->db->delete('categories', array('id' => $id));
    }

    // متد برای دریافت موزیک‌ها بر اساس دسته‌بندی
    public function get_music_by_category($category_id) {
        $this->db->select('*');
        $this->db->from('music');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // مدل: Category_model.php

    public function get_categories() {
    return $this->get_all_categories(); // یا به صورت مستقیم نوشته شود
    }

    public function get_all_categories() {
        $this->db->order_by('id', 'ASC');  // مرتب‌سازی بر اساس id به ترتیب صعودی
        $query = $this->db->get('categories');  // دریافت داده‌ها از جدول categories
        return $query->result_array();  // بازگرداندن نتایج به صورت آرایه
    }


}
