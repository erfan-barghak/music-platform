<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // دریافت تمامی اسلایدرها
    public function get_sliders() {
        $query = $this->db->get('slider');
        return $query->result_array();
    }

    // اضافه کردن اسلایدر جدید
    public function insert_slider($data) {
        return $this->db->insert('slider', $data);
    }

    // دریافت اطلاعات یک اسلایدر برای ویرایش
    public function get_slider_by_id($id) {
        $query = $this->db->get_where('slider', array('id' => $id));
        return $query->row_array();
    }

    // ویرایش اسلایدر
    public function update_slider($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('slider', $data);
    }

    // حذف اسلایدر
    public function delete_slider($id) {
        $this->db->where('id', $id);
        return $this->db->delete('slider');
    }
    // متد برای دریافت آیتم‌های اسلایدر از دیتابیس
    public function get_slider_items() {
         $query = $this->db->get('slider');
         return $query->result_array();
     }

     public function get_all_sliders() {
        $query = $this->db->get('slider');
        return $query->result_array();
    }
}
