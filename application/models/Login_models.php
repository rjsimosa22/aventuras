<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_models extends CI_Model {

    public $variable;
    public $array;

    public function __construct() {  
	    parent::__construct();
    }
    
    public function login($username,$clave) {
        
        $this->db->where('clave',$clave);
        $this->db->where('identificacion',$username);
        $query=$this->db->get('bd_usuarios');
        
        if($query->num_rows()> 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
    public function logindata($username, $clave) {

        $this->db->select('a.id,a.nombre,a.apellido,a.identificacion,a.clave,a.telefono_movil,a.estatus,a.fecha_creacion,a.rol');
        $this->db->from('bd_usuarios as a');
        $this->db->where('a.estatus','1');
        $this->db->where('a.clave',$clave);
        $this->db->where('a.identificacion',$username);
        
        $query=$this->db->get();
        if($query->num_rows()>0) {
            foreach($query->result() as $row) {
                $array=array(
                    'acceso'=>TRUE,
                    'id'=>$row->id,
                    'rol'=>$row->rol,
                    'clave'=>$row->clave,
                    'nombre'=>$row->nombre,    
                    'estatus'=>$row->estatus,
                    'apellido'=>$row->apellido,
                    'cedula'=>$row->identificacion,
                    'telefono_movil'=>$row->telefono_movil,
                    'identificacion'=>$row->identificacion,
                    'nomape'=>$row->apellido.' '.$row->nombre,
                );
            }
            return $array;
        }
    }
}