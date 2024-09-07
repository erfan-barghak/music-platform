<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // بارگذاری Helperها و کتابخانه‌های لازم
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('User_model'); // اطمینان از وجود مدل User_model
    }

    // نمایش فرم لاگین
    public function login() {
        // اگر کاربر قبلاً وارد شده باشد، به داشبورد هدایت شود
        if ($this->session->userdata('user_id')) {
            $role = $this->session->userdata('role');
            redirect($role == 'admin' ? 'dashboard-admin' : 'dashboard-user');
        }

        $this->load->view('login');
    }

    public function submit_login() {
        // تنظیم قوانین اعتبارسنجی
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // بازگردانی به فرم لاگین در صورت وجود خطا
            $this->load->view('login');
        } else {
            // دریافت اطلاعات از فرم
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // بررسی اطلاعات کاربر در دیتابیس
            $user = $this->User_model->get_user_by_email($email);
    
            if ($user && password_verify($password, $user->password)) {
                // ایجاد سشن برای کاربر
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('role', $user->role);
    
                // هدایت کاربر به داشبورد بر اساس نوع کاربری
                if ($user->role == 'admin') {
                    redirect('dashboard-admin');  // هدایت به داشبورد مدیر
                } else {
                    redirect('dashboard-user');  // هدایت به داشبورد کاربر
                }
            } else {
                // بازگردانی به فرم لاگین با پیام خطا
                $data['error'] = 'ایمیل یا رمز عبور نادرست است.';
                $this->load->view('login', $data);
            }
        }
    }
    

    // خروج از حساب کاربری
    public function logout() {
        // پاک کردن سشن‌ها
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();

        // هدایت به صفحه لاگین
        redirect('login');
    }

    // نمایش داشبورد (می‌توانید آن را به کنترلرهای خاص داشبورد منتقل کنید)
    public function dashboard() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $data['username'] = $this->session->userdata('username');
        $this->load->view('dashboard', $data);
    }
}
