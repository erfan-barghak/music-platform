<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('upload', 'session'));
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url')); // بارگذاری helperهای لازم
    }

    public function edit() {
        // دریافت اطلاعات کاربر از دیتابیس
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_user($user_id);

        // بارگذاری ویو فرم ویرایش پروفایل
        $this->load->view('edit_profile', $data);
    }

    public function update() {
        // پیکربندی برای آپلود فایل
        $config['upload_path'] = './uploads/profile_pictures/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // اندازه فایل به کیلوبایت

        $this->upload->initialize($config);

        // بررسی اینکه آیا فایل آپلود شده است
        if ($_FILES['profile_picture']['name']) {
            // آپلود تصویر
            if ($this->upload->do_upload('profile_picture')) {
                $upload_data = $this->upload->data();
                $profile_picture = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $profile_picture = NULL; // در صورتی که فایلی آپلود نشود
                echo $error; // نمایش خطا برای اشکال‌زدایی
            }
        } else {
            $profile_picture = NULL; // در صورتی که فایلی انتخاب نشده باشد
        }

        // ذخیره اطلاعات در دیتابیس
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'profile_picture' => $profile_picture
        );

        // فراخوانی متد مدل برای ذخیره اطلاعات کاربر
        $user_id = $this->session->userdata('user_id');
        $this->User_model->update_user($user_id, $data);

        // بازگشت به صفحه پروفایل
        redirect('dashboard/user');
    }
}
