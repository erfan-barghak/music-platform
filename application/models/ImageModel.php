<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_images_by_music_id($music_id) {
        $query = $this->db->get_where('music', array('id' => $music_id));
        return $query->result_array();
    }
}
