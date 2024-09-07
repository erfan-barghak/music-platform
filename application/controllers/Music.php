<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Music_model');
    }

    public function upload() {
        // تنظیمات بارگذاری تصویر
        $image_config['upload_path'] = './uploads/images/';
        $image_config['allowed_types'] = 'gif|jpg|png';
        $image_config['max_size'] = 2048; // اندازه فایل به کیلوبایت

        $this->upload->initialize($image_config);

        if ($this->upload->do_upload('image')) {
            $image_data = $this->upload->data();
            $image = $image_data['file_name'];
        } else {
            $image = NULL;
        }

        // تنظیمات بارگذاری فایل موزیک
        $music_config['upload_path'] = './uploads/music/';
        $music_config['allowed_types'] = 'mp3|wav';
        $music_config['max_size'] = 10240; // اندازه فایل موزیک به کیلوبایت

        $this->upload->initialize($music_config);

        if ($this->upload->do_upload('audio')) {
            $music_data = $this->upload->data();
            $audio = $music_data['file_name'];
        } else {
            $audio = NULL;
        }

        $music_data = array(
            'title' => $this->input->post('title'),
            'artist' => $this->input->post('artist'),
            'image' => $image,
            'audio' => $audio, // افزودن فایل موزیک
            'user_id' => $this->session->userdata('user_id')
        );

        $this->Music_model->add_music($music_data);

        redirect('my-music');
    }
}
