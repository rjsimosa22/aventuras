<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboDPD extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('ComboDPD_models');
        $this->load->helper(array('url','form','text'));
    }
     
    public function provincia() {
        
        $id=$this->input->get_post('id', true);
        if($id) {
            $data=$this->ComboDPD_models->provincia($id);
            print_r(json_encode($data));
        }  
    }
    
    public function distrito() {
     
        $id=$this->input->get_post('id', true);
        if($id) {
            $data=$this->ComboDPD_models->distrito($id);
            print_r(json_encode($data));
        }
    }
}
