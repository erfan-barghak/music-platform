<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MigrationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
    }

    public function migrate() {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration successful!";
        }
    }
}
