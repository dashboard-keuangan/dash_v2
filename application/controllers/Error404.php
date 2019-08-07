<?php 
//application/controllers/Myerror.php
class Error404 extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
    } 

    public function index() { 
        $this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // Let View name 
        $this->load->view('404',$data);// loading view
    } 
} 