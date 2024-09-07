<?php
class Signup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // بارگذاری Helper URL برای استفاده از base_url()
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        // نمایش فرم ثبت‌نام
        $this->load->view('signup');
    }

    public function submit() {
        // دریافت داده‌ها از فرم ثبت‌نام
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $referral_code = $this->input->post('referral_code');

        // تولید کد رفرال جدید
        $user_referral_code = substr(md5(uniqid($email, true)), 0, 10);

        // آماده‌سازی داده‌ها
        $user_data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'referral_code' => $user_referral_code,
            'referred_by' => $referral_code
        );

        // ذخیره داده‌ها در دیتابیس
        $this->User_model->insert_user($user_data);

        // تنظیم اطلاعات سشن
        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('referral_code', $user_referral_code);
        $this->session->set_userdata('role', 'user');

        // هدایت به داشبورد کاربر
        redirect('dashboard-user');
    }
}
