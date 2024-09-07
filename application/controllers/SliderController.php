<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation'));
    }

    // نمایش صفحه مدیریت اسلایدرها
    public function index() {
        $data['sliders'] = $this->Slider_model->get_sliders();
        $this->load->view('admin/slider_list', $data);
    }

    // اضافه کردن اسلاید جدید
    public function add_slider() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('link_type', 'Link Type', 'required');
        $this->form_validation->set_rules('link_id', 'Link ID', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/add_slider');
        } else {
            // آپلود تصویر بنر
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('banner_image')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/add_slider', $data);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'link_type' => $this->input->post('link_type'),
                    'link_id' => $this->input->post('link_id'),
                    'banner_image' => $upload_data['file_name']
                );

                $this->Slider_model->insert_slider($data);
                $this->session->set_flashdata('success', 'اسلاید با موفقیت اضافه شد.');
                redirect('SliderController');
            }
        }
    }

    // ویرایش اسلاید
    public function edit_slider($id) {
        $data['slider'] = $this->Slider_model->get_slider($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('link_type', 'Link Type', 'required');
        $this->form_validation->set_rules('link_id', 'Link ID', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit_slider', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'link_type' => $this->input->post('link_type'),
                'link_id' => $this->input->post('link_id')
            );

            if (!empty($_FILES['banner_image']['name'])) {
                // آپلود تصویر جدید
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('banner_image')) {
                    $upload_data = $this->upload->data();
                    $data['banner_image'] = $upload_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/edit_slider', $data);
                    return;
                }
            }

            $this->Slider_model->update_slider($id, $data);
            $this->session->set_flashdata('success', 'اسلاید با موفقیت ویرایش شد.');
            redirect('SliderController');
        }
    }

    // حذف اسلاید
    public function delete_slider($id) {
        $this->Slider_model->delete_slider($id);
        $this->session->set_flashdata('success', 'اسلاید با موفقیت حذف شد.');
        redirect('SliderController');
    }
}
