<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
    function __construct()
    {       
        parent::__construct();
        $this->load->database();     
    }
    function index(){

    }
    function signup(){
        $this->load->model('SignupActivity');
        $this->SignupActivity->index();
    }
    function login(){
        $this->load->model('Login');
        $this->Login->index();
    }
}
?>