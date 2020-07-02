<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_frontEnd_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {    
	    parent::__construct();
    }
    
    public function suscripcion($email) { 
        
        $this->db->where('email',$email); 
        $query=$this->db->get('bd_notificacion');

        if($query->num_rows() > 0) {
            return false;
        } else {
            $bd_notificacion=array(
                'status'=>'1',
                'email'=>$email,
            );
                        
            if(!empty($bd_notificacion)) {    
                $query=$this->db->insert('bd_notificacion',$bd_notificacion);
            }
            return true;
        }   
    }

    public function registrar_reclamacion($dni,$nombre,$email,$numero,$problema,$solucion,$direccion,$actividad,$servicio) { 
        
        $bd_reclamos=array(
            'status'=>'1',
            'dni'=>$dni,
            'email'=>$email,
            'nombre'=>$nombre,
            'numero'=>$numero,
            'problema'=>$problema,
            'solucion'=>$solucion,
            'servicio'=>$servicio,
            'direccion'=>$direccion,
            'actividad'=>$actividad,
            'fecha_registro'=>date('Y-m-d H:i:s')
        );
        
                    
        if(!empty($bd_reclamos)) {    
            $query=$this->db->insert('bd_reclamos',$bd_reclamos);
            $numero_reclamo=$this->db->insert_id();  
        }
        return $numero_reclamo;
    }
}