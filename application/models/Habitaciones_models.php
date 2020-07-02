<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre'); 
        $this->db->where('a.status','1'); 
        $this->db->order_by('a.id','asc'); 
        $query=$this->db->get('bd_habitaciones AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function listado_no_incluidos($id,$val) {
      
        $this->db->select('a.id,a.nombre'); 
        $this->db->where('a.status','1');
        if($val=='0') {
            $this->db->where_not_in('a.id',$id);
        } else {
            $this->db->where('a.id',$id);
        }
        $this->db->order_by('a.id','asc'); 
        $query=$this->db->get('bd_habitaciones AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function listado_seleccionado($id) {
        $this->db->select('a.id_tematicas AS id'); 
        $this->db->where('a.id_tours',$id);
        $this->db->order_by('a.id','asc'); 
        $query=$this->db->get('bd_tours_tematicas AS a');
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function listado_habitaciones($id) {
        $this->db->select('a.id,a.nombre,a.descripcion,b.cantidad_habitaciones');
        $this->db->from('bd_habitaciones as a');
        $this->db->join('bd_hoteles_habitaciones_dia as b','b.id_habitaciones=a.id');
        $this->db->where('b.id_hoteles',$id);  
        $this->db->where('a.status','1'); 
        $this->db->where('b.status','1'); 
        $this->db->where('b.disponibilidad','SI'); 
        $this->db->where('b.cantidad_habitaciones >','0');       
        $this->db->order_by('a.id','asc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }
}