<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class display_music_model extends CI_Model {



    public function get_category_by_type($type) {
        $this->db->where('type', $type); // بر اساس نوع دسته‌بندی
        $query = $this->db->get('music'); // جدول دسته‌بندی
        return $query->row_array(); // تنها یک ردیف دریافت شود
    }
    
    public function get_category_name($category_id) {
        $this->db->select('name');
        $this->db->from('categories');
        $this->db->where('id', $category_id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row()->name; // نام دسته‌بندی را برمی‌گرداند
        } else {
            return false;
        }
    }

    public function get_music_by_type($type) {
        if ($type) {
            $this->db->where('type', $type);
        }
        $query = $this->db->get('music');
        return $query->result_array();
    }

    public function get_music_by_category($category_id) {
        // جستجو بر اساس ستون type که با دسته‌بندی مرتبط است
        $this->db->where('type', $category_id);
        $query = $this->db->get('music');
        return $query->result_array();
    }
    
}
