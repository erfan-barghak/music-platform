<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // دریافت اطلاعات پروفایل ادمین بر اساس ID
    public function get_admin_profile($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    // به‌روزرسانی اطلاعات پروفایل ادمین
    public function update_admin_profile($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // به‌روزرسانی تصویر پروفایل ادمین
    public function update_profile_picture($id, $profile_picture) {
        $this->db->where('id', $id);
        return $this->db->update('users', array('profile_picture' => $profile_picture));
    }

    // بررسی صحت رمز عبور فعلی
    public function check_current_password($id, $current_password) {
        $this->db->where('id', $id);
        $this->db->where('password', md5($current_password)); // فرض بر این است که رمز عبور به صورت MD5 ذخیره شده است
        $query = $this->db->get('users');
        return $query->num_rows() === 1;
    }

    // به‌روزرسانی رمز عبور ادمین
    public function update_password($id, $new_password) {
        $this->db->where('id', $id);
        return $this->db->update('users', array('password' => md5($new_password))); // فرض بر این است که رمز عبور به صورت MD5 ذخیره شده است
    }
}
