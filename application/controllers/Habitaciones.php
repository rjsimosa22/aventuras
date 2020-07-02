<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Habitaciones_models');
        $this->load->helper(array('url','form','text'));
    }
     
    public function listado_no_incluidos() {
        $id=$this->input->get_post('id',true);
        $val=$this->input->get_post('val',true);
        if($id) {
            $data=$this->Habitaciones_models->listado_no_incluidos($id,$val);
            print_r(json_encode($data));
        }  
    }
}
