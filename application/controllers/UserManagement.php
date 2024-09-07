<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Music_model');
        $this->load->library('session');
        $this->load->helper('url'); // بارگذاری url_helper

        // بررسی ورود کاربر به سیستم و نقش آن
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') != 'admin') {
            redirect('login');
        }
    }

    // نمایش لیست کاربران
    public function index() {
        $data['users'] = $this->Music_model->get_all_user();
        $this->load->view('user_management/index', $data);
    }

    // نمایش فرم ایجاد کاربر
    public function create() {
        $this->load->view('user_management/create');
    }

    // ذخیره‌سازی کاربر جدید
    public function store() {
        $referral_code = $this->input->post('referral_code');
        $referrer = $this->User_model->get_user_by_referral_code($referral_code);

        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'referred_by' => $referrer ? $referrer['id'] : NULL
        ];

        if ($this->User_model->create_user($data)) {
            redirect('user_management');
        } else {
            show_error('Error creating user');
        }
    }

    // حذف کاربر
    public function delete($id) {
        if ($this->User_model->delete_user($id)) {
            redirect('user_management');
        } else {
            show_error('Error deleting user');
        }
    }
}
