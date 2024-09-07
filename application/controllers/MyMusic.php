<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyMusic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // بارگذاری Helperها و کتابخانه‌های لازم
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Music_model');

        // بررسی اینکه کاربر وارد شده است یا خیر
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        // دریافت شناسه کاربر از سشن
        $user_id = $this->session->userdata('user_id');

        // دریافت موزیک‌های کاربر از مدل
        $data['user_music'] = $this->Music_model->get_music_by_user_id($user_id);

        // نمایش موزیک‌ها در view
        $this->load->view('my_music', $data);
    }
}
