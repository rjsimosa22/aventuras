<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboDPD_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function departamento() {
    
        $this->db->select('a.id,a.nombre');
        $this->db->order_by('a.nombre','asc'); 
        $query=$this->db->get('bd_departamentos AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function provincia($id) {
        
        $this->db->select('a.id,a.nombre');
        $this->db->order_by('a.nombre','asc'); 
        $this->db->where('a.id_departamento',$id); 
        $query=$this->db->get('bd_provincias AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }
    
    public function distrito($id) {
        
        $this->db->select('a.id,a.nombre');
        $this->db->order_by('a.nombre','asc'); 
        $this->db->where('a.id_provincia',$id); 
        $query=$this->db->get('bd_distrito AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }
}