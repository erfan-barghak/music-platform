<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MusicManagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Music_model');
                $this->load->model('Category_model'); // بارگذاری مدل دسته‌بندی
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation'); // بارگذاری form_validation

        // بررسی ورود کاربر به سیستم و نقش آن
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') != 'admin') {
            redirect('login');
        }
    }

    // نمایش لیست موزیک‌ها
    public function index() {
        $data['music'] = $this->Music_model->get_all_music();
        $this->load->view('music_management/index', $data);
    }

    public function create() {
        // دریافت دسته‌بندی‌ها از دیتابیس
        $data['categories'] = $this->Category_model->get_all_categories(); 
    
        // ارسال داده‌های دسته‌بندی به ویو و سپس بارگذاری ویو
        $this->load->view('music_management/create', $data);
    }
    

    // ذخیره موزیک جدید
    public function store() {
        // اعتبارسنجی ورودی‌ها
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('image', 'Image URL', 'required|valid_url');
        $this->form_validation->set_rules('artist', 'Artist', 'required');
        $this->form_validation->set_rules('album', 'Album', 'required');
        $this->form_validation->set_rules('release_date', 'Release Date', 'required');
        $this->form_validation->set_rules('play_date', 'Play Date', 'required');
        $this->form_validation->set_rules('add_date', 'Add Date', 'required');
        $this->form_validation->set_rules('poets_text', 'Poets Text', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // اگر اعتبارسنجی شکست، برگرداندن به فرم ایجاد موزیک
            $this->create();
        } else {
            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'),
                'artist' => $this->input->post('artist'),
                'album' => $this->input->post('album'),
                'release_date' => $this->input->post('release_date'),
                'created_at' => date('Y-m-d H:i:s'),
                'type' => $this->input->post('type'),  // اگر فیلد type وجود دارد
                'play_date' => $this->input->post('play_date'),
                'add_date' => $this->input->post('add_date'),
                'download_url' => $this->input->post('download_url'),
                'poets_text' => $this->input->post('poets_text'),
                'category_id' => $this->input->post('category_id') // دریافت category_id از فرم
            ];
    
            if ($this->Music_model->create_music($data)) {
                redirect('music_management');
            } else {
                show_error('Error creating music');
            }
        }
    }
    
    

    // نمایش فرم ویرایش موزیک
    public function edit($id) {
        $data['music'] = $this->Music_model->get_music_by_id($id);
        $data['categories'] = $this->Category_model->get_all_categories(); // استفاده از مدل دسته‌بندی
        $this->load->view('music_management/edit', $data);
    }



    // بروزرسانی موزیک
    public function update($id) {
        // اعتبارسنجی ورودی‌ها
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('image', 'Image URL', 'required|valid_url');
        $this->form_validation->set_rules('artist', 'Artist', 'required');
        $this->form_validation->set_rules('album', 'Album', 'required');
        $this->form_validation->set_rules('release_date', 'Release Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('play_date', 'Play Date', 'required');
        $this->form_validation->set_rules('add_date', 'Add Date', 'required');

                // دریافت اطلاعات از فرم
                $poets_text = $this->input->post('poets_text');
    
                // به‌روزرسانی متن موزیک
                $this->Music_model->update_poets_text($id, $poets_text);
            

        if ($this->form_validation->run() === FALSE) {
            // اگر اعتبارسنجی شکست، برگرداندن به فرم ویرایش موزیک
            $this->edit($id);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'),
                'artist' => $this->input->post('artist'),
                'album' => $this->input->post('album'),
                'release_date' => $this->input->post('release_date'),
                'type' => $this->input->post('type'),
                'play_date' => $this->input->post('play_date'),
                'add_date' => $this->input->post('add_date')
            ];

            if ($this->Music_model->update_music($id, $data)) {
                redirect('music_management');
            } else {
                show_error('Error updating music');
            }
        }
    }

    // حذف موزیک
    public function delete($id) {
        if ($this->Music_model->delete_music($id)) {
            redirect('music_management');
        } else {
            show_error('Error deleting music');
        }
    }
    
}
