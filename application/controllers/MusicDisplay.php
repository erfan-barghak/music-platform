<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MusicDisplay extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Music_model');
        $this->load->model('display_music_model');
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // نمایش موزیک‌ها بر اساس دسته‌بندی
    public function view($category_id) {
        // دریافت موزیک‌های مربوط به دسته‌بندی
        $data['music_list'] = $this->Music_model->get_music_by_category($category_id);

         // دریافت اطلاعات دسته‌بندی
        $category = $this->Category_model->get_category_by_id($category_id);
        if ($category) {
            $data['category_name'] = $category['name'];
        } else {
            $data['category_name'] = 'Unknown Category'; // یا هر نام دیگری که برای دسته‌بندی ناشناخته مناسب است
        }

        // بارگذاری نمای با داده‌ها
        $this->load->view('category/music_list', $data);
    }


    
}
