<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdminProfile_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session'); // اطمینان از بارگذاری کتابخانه session
    }

    public function index() {
        $admin_id = 1; // فرض بر این است که آیدی ادمین 1 است
        $data['user'] = $this->AdminProfile_model->get_admin_profile($admin_id);

        $this->load->view('admin_profile_view', $data);
    }

    public function update() {
        $admin_id = 1; // فرض بر این است که آیدی ادمین 1 است

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // سایر قوانین اعتبارسنجی...

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                // سایر فیلدها...
            );

            $this->AdminProfile_model->update_admin_profile($admin_id, $data);
            redirect('admin_profile');
        }
    }

    public function update_profile_picture() {
        $admin_id = 1; // فرض بر این است که آیدی ادمین 1 است

        // کد برای بارگذاری تصویر...

        $profile_picture = 'path/to/new/profile_picture.jpg'; // جایگزین با مسیر صحیح

        $this->AdminProfile_model->update_profile_picture($admin_id, $profile_picture);
        redirect('admin_profile');
    }

    public function change_password() {
        $admin_id = 1; // فرض بر این است که آیدی ادمین 1 است

        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if ($this->AdminProfile_model->check_current_password($admin_id, $current_password)) {
                $this->AdminProfile_model->update_password($admin_id, $new_password);
                redirect('admin_profile');
            } else {
                $this->session->set_flashdata('error', 'Current password is incorrect.');
                $this->index();
            }
        }
    }
}
