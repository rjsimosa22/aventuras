<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboRE_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function reporte() {
        
        $this->db->order_by('orden', 'asc'); $this->db->where('status', '1'); $query = $this->db->get('reportes');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function informacion($reporte) {
        
        $this->db->where('id_report', $reporte); $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $informacion = $this->db->get('reportes');
        
        if( $informacion->num_rows() > 0 ) {
            
            return $informacion->result();
        }
    }
}