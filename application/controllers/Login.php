<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

// Auth.php (Login controller)

public function login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    // دریافت اطلاعات کاربر
    $user = $this->User_model->get_user_by_email($email);

    if ($user && password_verify($password, $user->password)) {
        // ایجاد جلسه کاربری
        $session_data = array(
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role // ذخیره نوع کاربر
        );
        $this->session->set_userdata($session_data);

        // هدایت کاربر بر اساس نقش کاربری
        if ($user->role == 'admin') {
            redirect('dashboard-admin');
        } else {
            redirect('dashboard-user');
        }
    } else {
        $this->session->set_flashdata('error', 'ایمیل یا رمز عبور اشتباه است.');
        redirect('login');
    }
}


    public function logout()
    {
        // خروج از سیستم
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role');
        redirect('home');
    }
}
