<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation'); // بارگذاری کتابخانه اعتبارسنجی فرم
        $this->load->helper('form'); // بارگذاری helper فرم
        $this->load->model('display_music_model'); // اگر نیاز به مدل موزیک دارید

        $this->load->helper('url');
    }

    public function index() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('view_categories', $data);
    }

    public function create() {
        $this->load->view('create_category');
    }

    public function store() {
        // اعتبارسنجی ورودی‌ها
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            // اگر اعتبارسنجی شکست، برگرداندن به فرم ایجاد دسته‌بندی
            $this->create();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'created_at' => date('Y-m-d H:i:s') // درج تاریخ فعلی
            ];

            if ($this->Category_model->create_category($data)) {
                redirect('categories');
            } else {
                show_error('Error creating category');
            }
        } 
    }         

    public function edit($id) {
        $data['category'] = $this->Category_model->get_category_by_id($id);
        $this->load->view('edit_category', $data);
    }

    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        );
        $this->Category_model->update_category($id, $data);
        redirect('categories');
    }

    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('categories');
    }

    public function details($id) {
        $data['category'] = $this->Category_model->get_category_by_id($id);
        $this->load->view('category_details', $data);
    }



    public function music_list($category_id) {
        // دریافت اطلاعات دسته‌بندی بر اساس category_id
        $category = $this->Category_model->get_category($category_id);
        
        if (!$category) {
            show_404();
        }
    
        // واکشی موزیک‌های مربوط به این دسته‌بندی از جدول music بر اساس ستون type
        $data['music_list'] = $this->display_music_model->get_category_by_type($category_id);
        $data['category_name'] = $category['name'];
    
        // نمایش صفحه لیست موزیک‌ها
        $this->load->view('category/music_list', $data);
    }
    
        
        

        public function view_category_music($category_id) {
            // دریافت نام دسته‌بندی
            $category = $this->Category_model->get_category_by_id($category_id);
            if ($category) {
                $category_name = $category['name'];
            } else {
                $category_name = 'Unknown Category';
            }
    
            // دریافت موزیک‌های مربوط به دسته‌بندی
            $data['music_list'] = $this->Music_model->get_music_by_category($category_id);
            
            // ارسال داده‌ها به نمای
            $data['category_name'] = $category_name;
            $this->load->view('category/music_list', $data);
        }

        public function create_category($data) {
            return $this->db->insert('categories', $data);
        }

        
        
}
