<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // نمایش لیست اسلایدرها
    public function index() {
        $data['sliders'] = $this->Slider_model->get_sliders();
        $this->load->view('admin/slider_list', $data);
    }

    // افزودن اسلایدر جدید
    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('link_type', 'Link Type', 'required');
        $this->form_validation->set_rules('link_id', 'Link ID', 'required');
        $this->form_validation->set_rules('banner_image', 'Banner Image', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/slider_form');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'link_type' => $this->input->post('link_type'),
                'link_id' => $this->input->post('link_id'),
                'banner_image' => $this->input->post('banner_image')
            );
            $this->Slider_model->insert_slider($data);
            redirect('slider');
        }
    }

    // ویرایش اسلایدر
    public function edit($id) {
        $data['slider'] = $this->Slider_model->get_slider_by_id($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('link_type', 'Link Type', 'required');
        $this->form_validation->set_rules('link_id', 'Link ID', 'required');
        $this->form_validation->set_rules('banner_image', 'Banner Image', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/slider_form', $data);
        } else {
            $update_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'link_type' => $this->input->post('link_type'),
                'link_id' => $this->input->post('link_id'),
                'banner_image' => $this->input->post('banner_image')
            );
            $this->Slider_model->update_slider($id, $update_data);
            redirect('slider');
        }
    }

    // حذف اسلایدر
    public function delete($id) {
        $this->Slider_model->delete_slider($id);
        redirect('slider');
    }
}
