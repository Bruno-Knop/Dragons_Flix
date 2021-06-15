<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Register extends CI_Controller{

    public function _construct(){
        parent::_construct
        $this->load->liberary('from_validation');
        $this->load->liberary('encrypt');
        $this->load->model('register_model');
    }

    function index(){
        $this->load->view('register');
        
    }
}
?>