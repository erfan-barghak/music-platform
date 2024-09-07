<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // بارگذاری کتابخانه session
        $this->load->model('Music_model');
        $this->load->helper('url');
    }

    public function index() {
        $music_id = $this->input->get('id'); // گرفتن شناسه موزیک از پارامتر GET

        // بررسی وجود شناسه موزیک
        if (!$music_id) {
            show_404(); // نمایش صفحه 404 در صورت عدم وجود شناسه موزیک
        }

        $data['music'] = $this->Music_model->get_music_by_id($music_id);

        // بررسی وجود موزیک با شناسه داده شده
        if (!$data['music']) {
            show_404(); // نمایش صفحه 404 در صورت عدم وجود موزیک
        }

            // دریافت متن ترانه
        $data['poets_text'] = $this->Music_model->get_poets_text_by_music_id($music_id);
     

        // اضافه کردن URL دانلود به داده‌ها
        $data['download_url'] = $this->Music_model->get_download_url($music_id); // استفاده از $music_id به جای $id

        $this->load->view('music_details', $data);
    }
}
