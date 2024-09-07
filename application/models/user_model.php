<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function insert_user($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->db->insert('users', $data);
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('users')->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function get_user_music($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('music');
        return $query->result_array();
    }
    
    // تابع برای دریافت تعداد کل موزیک‌ها
    public function get_music_count() {
        return $this->db->count_all('music');
    }

    public function get_user($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_subordinates($user_id) {
        $this->db->where('referred_by', $user_id);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_invited_users($user_id) {
        $this->db->where('referred_by', $user_id);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_total_users() {
        return $this->db->count_all('users'); // شمارش کل کاربران

    }    

        // تابع برای دریافت تمام کاربران
        public function get_all_users() {
            $query = $this->db->get('users'); // جدول کاربران شما ممکن است 'users' نام داشته باشد
            return $query->result_array(); // بازگرداندن نتیجه به صورت آرایه
        }



     
        public function get_registration_labels() {
            // دریافت نام ماه‌ها به صورت لیست
            $this->db->select("DATE_FORMAT(created_at, '%M') as month");
            $this->db->group_by("DATE_FORMAT(created_at, '%M')");
            $this->db->order_by("DATE_FORMAT(created_at, '%Y-%m')"); // ترتیب ماه‌ها بر اساس سال و ماه
            $query = $this->db->get('users');
            
            $labels = [];
            foreach ($query->result() as $row) {
                $labels[] = $row->month;
            }
            return $labels;
        }
    
        public function get_registration_data() {
            // دریافت تعداد ثبت‌نام‌ها به صورت لیست
            $this->db->select("DATE_FORMAT(created_at, '%M') as month, COUNT(id) as total");
            $this->db->group_by("DATE_FORMAT(created_at, '%M')");
            $this->db->order_by("DATE_FORMAT(created_at, '%Y-%m')"); // ترتیب ماه‌ها بر اساس سال و ماه
            $query = $this->db->get('users');
            
            $data = [];
            foreach ($query->result() as $row) {
                $data[] = $row->total;
            }
            return $data;
        }
    
        public function get_content_labels() {
            // مشابه به تابع بالا برای محتوای سایت
            $this->db->select("DATE_FORMAT(created_at, '%M') as month");
            $this->db->group_by("DATE_FORMAT(created_at, '%M')");
            $this->db->order_by("DATE_FORMAT(created_at, '%Y-%m')");
            $query = $this->db->get('content'); // نام جدول محتوای سایت
    
            $labels = [];
            foreach ($query->result() as $row) {
                $labels[] = $row->month;
            }
            return $labels;
        }
    
        public function get_content_data() {
            // دریافت تعداد بازدیدهای محتوای سایت
            $this->db->select("DATE_FORMAT(created_at, '%M') as month, COUNT(id) as total");
            $this->db->group_by("DATE_FORMAT(created_at, '%M')");
            $this->db->order_by("DATE_FORMAT(created_at, '%Y-%m')");
            $query = $this->db->get('content'); // نام جدول محتوای سایت
            
            $data = [];
            foreach ($query->result() as $row) {
                $data[] = $row->total;
            }
            return $data;
        }

         // متد برای اضافه کردن کاربر جدید با ارجاع
         public function create_user($data) {
         // تولید کد ارجاع تصادفی
         $data['referral_code'] = $this->generate_referral_code();
         return $this->db->insert('users', $data);
        }

         public function delete_user($id) {
         return $this->db->delete('users', ['id' => $id]);
        }

         // دریافت کاربر با کد ارجاع
         public function get_user_by_referral_code($code) {
         return $this->db->get_where('users', ['referral_code' => $code])->row_array();
        }

         // تابع برای تولید کد ارجاع تصادفی
         private function generate_referral_code() {
            $code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
            // بررسی اینکه کد تولید شده تکراری نباشد
            $this->db->where('referral_code', $code);
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                return $this->generate_referral_code(); // اگر کد تکراری بود، دوباره تولید کن
            }
            return $code;
        }
        
    
}
