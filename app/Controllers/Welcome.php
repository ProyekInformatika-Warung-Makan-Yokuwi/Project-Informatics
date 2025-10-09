<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        // Memuat helper URL agar base_url() bisa digunakan di View
        $this->load->helper('url');
        
        // Memuat View yang baru Anda buat
        $this->load->view('welcome_screen'); 
    }
}