<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboRE extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url', 'form', 'text'));
        $this->load->model('ComboRE_models');
    }
     
    public function informacion() {
        
        $reporte = $this->input->get_post('reporte', true);
        
        if( $reporte ) {
            
            $informacion = $this->ComboRE_models->informacion($reporte);

            foreach ( $informacion as $row ) {

                echo '<input type="hidden" name="url" id="url" value="'.site_url($row->url).'">
                      <input type="hidden" name="archivo" id="archivo" value="'.$row->archivo.'">';
            }
        }  
    }
}
