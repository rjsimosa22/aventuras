<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre'); 
        $this->db->order_by('a.nombre','asc'); 
        $query=$this->db->get('bd_servicios_populares_hoteles AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function listado_seleccionado($id) {
        $this->db->select('a.id_servicios AS id'); 
        $this->db->where('a.id_hoteles',$id);
        $this->db->order_by('a.id','asc'); 
        $query=$this->db->get('bd_hoteles_servicios_populares AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }
}