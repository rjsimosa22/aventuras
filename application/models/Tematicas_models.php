<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Tematicas_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {        
	    parent::__construct();
    }
    
    public function registrar($bd_tematicas) {
        $this->db->where('nombre',$bd_tematicas['nombre']); 
        $query=$this->db->get('bd_tematicas');
        
        if($query->num_rows()>0) {
            return false;
        } else {
            $this->db->trans_begin();
            $this->db->insert('bd_tematicas',$bd_tematicas);
                    
            if($this->db->trans_status()==false) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit(); 
                return true;
            }
        }
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_tematicas as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->order_by('a.nombre','desc');

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            foreach ( $query->result() as $row ) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function listado_tematicas() {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_tematicas as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->where('a.status','1');
        $this->db->order_by('a.nombre','asc');

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            foreach ( $query->result() as $row ) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function listado_actual() {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_tematicas as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->where('a.status','1');
        $this->db->order_by('a.nombre','desc');

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            foreach ( $query->result() as $row ) {
                $data[] = $row;
            }
            return $data;
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

    public function listado_tematicas_info($id) {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_tematicas as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_tours_tematicas as c','c.id_tematicas=a.id');
        $this->db->where('a.status','1');
        $this->db->where('c.id_tours',$id);

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }

    public function consultar($id) {
        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_tematicas as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.nombre','desc');
            $this->db->where('a.id',$id); 
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }
    
    public function editar($id,$bd_tematicas) {
        if(isset($id)) {
            $this->db->trans_begin();
            $this->db->where('id',$id);
            $this->db->update('bd_tematicas',$bd_tematicas);

            if($this->db->trans_status()==false) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit(); 
                return true;
            }
        } else {
            return false;
        }
    }
    
    public function activar($id) {
        if(isset($id)) {
            $bd_tematicas=array(
                'status'=> '1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tematicas',$bd_tematicas);
            return true;
        }
    }
    
    public function inactivar($id) {
        if(isset($id)) {
            $bd_tematicas=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tematicas',$bd_tematicas);
            return true;
        }
    }
}