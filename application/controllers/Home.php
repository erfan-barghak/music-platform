<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Music_model');
        $this->load->model('Category_model');
        $this->load->model('Slider_model');
        $this->load->helper('url');
        $this->load->model('AdsModel');
        $this->load->library('session');
    }

    public function index() {
        $data['featured_music'] = $this->Music_model->get_featured_music();
        $data['recently_played_music'] = $this->Music_model->get_recently_played_music();
        $data['newly_added_music'] = $this->Music_model->get_newly_added_music();
        $data['categories'] = $this->Category_model->get_categories();
        $data['sliders'] = $this->Slider_model->get_all_sliders();
        $data['categories'] = $this->Category_model->get_all_categories();
        $data['ads'] = $this->AdsModel->get_all_ads();


        $this->load->view('home', $data);
        
    }

    
}
