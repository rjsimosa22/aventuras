<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_models extends CI_Model {

    public $variable;
    public $array;

    public function __construct() {
	    parent::__construct();
    }
    
    public function registrar($bd_usuarios) {
        $this->db->where('identificacion',$bd_usuarios['identificacion']);$query=$this->db->get('bd_usuarios');
        if($query->num_rows() > 0) { 
            return false;
        } else {    
            $this->db->trans_begin();
            $this->db->insert('bd_usuarios', $bd_usuarios);
                    
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
        $this->db->select('a.estatus as status,a.identificacion as usuario_id,a.id,a.clave,a.nombre,a.apellido,a.telefono_movil as celular, a.fecha_creacion as fcreacion, c.descripcion as nombre_status, c.color');
        $this->db->from('bd_usuarios as a');
        $this->db->join('bd_estatus_global as c','c.id=a.estatus');
        $this->db->order_by('a.nombre','desc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }
    
    public function consultar($id) {
        if(isset($id)) {
            $this->db->select('a.estatus as status,a.identificacion as usuario_id,a.id,a.clave,a.nombre,a.apellido,a.telefono_movil as celular, a.fecha_creacion as fcreacion, c.descripcion as nombre_status, c.color,a.rol');
            $this->db->from('bd_usuarios as a');
            $this->db->join('bd_estatus_global as c','c.id=a.estatus');
            $this->db->where('a.identificacion',$id);
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }
    
    function editar($dni,$bd_usuarios) {
        if(isset($dni)) {
            $this->db->trans_begin();
            $this->db->where('identificacion',$dni);
            $query=$this->db->update('bd_usuarios',$bd_usuarios);
                    
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
            $bd_usuarios=array(
                'estatus'=>'1'
            );
            $this->db->where('identificacion',$id);
            $this->db->update('bd_usuarios',$bd_usuarios);
            return true;
        }
    }
    
    public function inactivar($id) {
        if(isset($id)) {
            $bd_usuarios=array(
                'estatus'=>'0'
            );
            $this->db->where('identificacion',$id);
            $this->db->update('bd_usuarios',$bd_usuarios);
            return true;
        }
    }
}