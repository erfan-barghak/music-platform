<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // دریافت موزیک‌های کاربر با شناسه کاربری
    public function get_user_music($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('music');
        return $query->result_array();
    }

    // اضافه کردن موزیک برای کاربر
    public function add_music($data) {
        $this->db->insert('music', $data);
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

    public function get_music_by_id($id) {
        $query = $this->db->get_where('music', 
        array('id' => $id));
        return $query->row_array(); // باید از row_array استفاده کنید تا یک ردیف از اطلاعات را برگرداند
    }

    public function create_music($data) {
        return $this->db->insert('music', $data);
    }

    public function update_music($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('music', $data);
    }

    public function delete_music($id) {
        $this->db->where('id', $id);
        return $this->db->delete('music');
    }



    // متد برای دریافت URL دانلود موزیک
    public function get_download_url($id) {
        $this->db->select('download_url'); // فرض کنید ستون دانلود URL وجود دارد
        $this->db->from('music');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return isset($result['download_url']) ? $result['download_url'] : null;
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
        

        public function get_music_by_user_id($id) {
            $this->db->where('user_id', $id);
            $query = $this->db->get('music');
            return $query->result_array();
        }
        
    
        

}
