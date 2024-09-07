<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_music_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // دریافت موزیک‌های کاربر بر اساس شناسه کاربری
    public function get_user_music($user_id) {
        // انتخاب موزیک‌های مربوط به کاربر
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('music');
        return $query->result_array(); // یا `result()` در صورتی که اشیاء را به عنوان نتیجه نیاز دارید
    }
    
    // دریافت جزئیات یک موزیک خاص بر اساس شناسه موزیک
    public function get_music_by_id($music_id) {
        $this->db->where('id', $music_id);
        $query = $this->db->get('music');
        return $query->row_array(); // یا `row()` در صورتی که شیء واحد را به عنوان نتیجه نیاز دارید
    }
    
    // اضافه کردن موزیک جدید
    public function add_music($data) {
        return $this->db->insert('music', $data);
    }

    // به‌روزرسانی اطلاعات موزیک
    public function update_music($music_id, $data) {
        $this->db->where('id', $music_id);
        return $this->db->update('music', $data);
    }

    // حذف موزیک
    public function delete_music($music_id) {
        $this->db->where('id', $music_id);
        return $this->db->delete('music');
    }

    public function get_music_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('music');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }





    public function get_featured_music() {
        $this->db->select('id, title, artist, image');
        $this->db->from('music');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recently_played_music() {
        $this->db->select('id, title, artist, image');
        $this->db->from('music');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_newly_added_music() {
        $this->db->select('id, title, artist, image');
        $this->db->from('music');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_music_by_category($category_id) {
        $this->db->select('*');
        $this->db->from('music');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function create_music($data) {
        return $this->db->insert('music', $data);
    }




    // متد برای به‌روزرسانی متن شعر موزیک
    public function update_poets_text($music_id, $poets_text) {
        $data = array(
            'poets_text' => $poets_text
        );
        $this->db->where('id', $music_id);
        return $this->db->update('music', $data);
    }
    
        // متد برای دریافت همه موزیک‌ها
        public function get_all_music() {
            $query = $this->db->get('music');
            return $query->result_array(); // بازگرداندن نتایج به صورت آرایه
        }

                // متد برای دریافت همه موزیک‌ها
                public function get_all_user() {
                    $query = $this->db->get('users');
                    return $query->result_array(); // بازگرداندن نتایج به صورت آرایه
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

        // public function get_music_by_category($category_id) {
        //     // جستجو بر اساس ستون type که با دسته‌بندی مرتبط است
        //     $this->db->where('type', $category_id);
        //     $query = $this->db->get('music');
        //     return $query->result_array();
        // }


        public function get_music_by_type($type) {
            if ($type) {
                $this->db->where('type', $type);
            }
            $query = $this->db->get('music');
            return $query->result_array();
        }

            // متد جدید برای دریافت موزیک‌ها بر اساس ID
         public function get_music_by_ids($ids) {
        if (empty($ids)) {
            return array(); // بازگشت آرایه خالی در صورت عدم وجود ID
        }

        $this->db->where_in('id', $ids);
        $query = $this->db->get('music');
        return $query->result_array();
    }
        

        // متد برای دریافت متن ترانه بر اساس شناسه موزیک
        public function get_poets_text_by_music_id($music_id) {
            if (empty($music_id)) {
                return NULL; // بازگشت NULL در صورت عدم وجود ID
            }
    
            $this->db->select('poets_text');
            $this->db->where('id', $music_id);
            $query = $this->db->get('music');
    
            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->poets_text;
            }
    
            return NULL; // بازگشت NULL اگر موزیک یافت نشد
        }
    
}
