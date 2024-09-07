<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdsController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdsModel');
        $this->load->helper('url'); // بارگذاری url_helper
        $this->load->helper('form'); // بارگذاری هِیْلپِر فرم
        $this->load->library('session');


    }

    public function index() {
        $data['ads'] = $this->AdsModel->get_all_ads();
        $this->load->view('admin/ads/list', $data);
    }

    public function store() {
        if ($this->input->post()) {
            $data = array(
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'),
                'link' => $this->input->post('link'),
            );
            $this->AdsModel->insert_ad($data);
            redirect('admin/ads');
        }
        $this->load->view('admin/ads/create');
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'),
                'link' => $this->input->post('link'),
            );
            $this->AdsModel->insert_ad($data);
            redirect('admin/ads');
        }
        $this->load->view('admin/ads/create');
    }

    public function edit($id) {
        $data['ad'] = $this->AdsModel->get_ad_by_id($id);
        $ad = $this->AdsModel->get_ad_by_id($id);

        if ($this->input->post()) {
            $updated_data = array(
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'),
                'link' => $this->input->post('link'),
            );
            $this->AdsModel->update_ad($id, $updated_data);
            redirect('admin/ads');
        }
        if (is_object($ad)) {
            $ad = (array)$ad;
        }

        $this->load->view('admin/ads/edit', $data);
    }

    public function delete($id) {
        $this->AdsModel->delete_ad($id);
        redirect('admin/ads');
    }

    public function update($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'image' => $this->input->post('image'),
            'link' => $this->input->post('link')
        );
        $this->AdsModel->update_ad($id, $data);
        redirect('admin/ads');
    }
    
}
