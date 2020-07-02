<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboGO_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function categoria() {
        
        $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $query = $this->db->get('td_categ_operac');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function servicio($categoria) {
        
        $this->db->order_by('nombre', 'asc'); $this->db->where('fk_id_categ', $categoria); $this->db->where('status', '1'); $servicio = $this->db->get('td_serv_operac');
        
        if( $servicio->num_rows() > 0 ) {
            
            return $servicio->result();
        }
    }
}