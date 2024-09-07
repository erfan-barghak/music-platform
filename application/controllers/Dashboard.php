<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // بارگذاری Helperها و کتابخانه‌های لازم
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('User_model');

        $this->load->model('Music_model'); // اضافه کردن این خط
        

        // بررسی اینکه کاربر وارد شده است یا خیر
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }


    // نمایش داشبورد کاربر
    public function user() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');  // اگر کاربر وارد نشده باشد، به صفحه لاگین هدایت شود
        }
    
        // دریافت اطلاعات کاربر از دیتابیس
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_user_by_id($user_id);
    
        // چک کردن نقش کاربر
        if ($this->session->userdata('role') == 'admin') {
            redirect('dashboard-admin');  // اگر مدیر است به داشبورد مدیر هدایت شود
        }

            // دریافت زیرمجموعه‌ها
           $data['subordinates'] = $this->User_model->get_subordinates($user_id);
    
        // نمایش داشبورد کاربر
        $this->load->view('dashboard_user', $data);
    }

    

}

