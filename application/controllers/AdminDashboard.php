<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url'); // بارگذاری URL Helper

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard/user');
        }
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $data['total_users'] = $this->User_model->get_total_users();
        $data['music_count'] = $this->User_model->get_music_count(); // با نام درست

        // دریافت داده‌های مربوط به ثبت‌نام‌ها
        $data['registration_labels'] = $this->User_model->get_registration_labels();
        $data['registration_data'] = $this->User_model->get_registration_data();



        $this->load->view('dashboard_admin', $data);
    }
    
}
