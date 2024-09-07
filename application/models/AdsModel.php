<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // دریافت تمام بنرهای تبلیغاتی
    public function get_all_ads() {
        $query = $this->db->get('ads');
        return $query->result();
    }

    // دریافت بنر تبلیغاتی بر اساس ID
    public function get_ad_by_id($id) {
        $query = $this->db->get_where('ads', array('id' => $id));
        return $query->row();
    }

    // ایجاد بنر تبلیغاتی جدید
    public function insert_ad($data) {
        return $this->db->insert('ads', $data);
    }

    // به‌روزرسانی بنر تبلیغاتی بر اساس ID
    public function update_ad($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('ads', $data);
    }

    // حذف بنر تبلیغاتی بر اساس ID
    public function delete_ad($id) {
        $this->db->where('id', $id);
        return $this->db->delete('ads');
    }
}
