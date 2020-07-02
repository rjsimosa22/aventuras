<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboGO extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url', 'form', 'text'));
        $this->load->model('ComboGO_models');
    }
     
    public function servicio() {
        
        $categoria = $this->input->get_post('categoria', true);
        
        if( $categoria ) {
            
                    $servicio = $this->ComboGO_models->servicio($categoria);
                    
                    echo '<option value="">Seleccione</option>';
                    
                    foreach ( $servicio as $row ) {
                        
                        echo '<option value="'.$row->id_serv_operac.'">'.ucwords($row->nombre).'</option>';
                    }
        }  else {
                    echo '<option value="">Seleccione</option>';
        }
    }
}
