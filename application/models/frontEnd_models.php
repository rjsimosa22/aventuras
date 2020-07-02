<?php defined('BASEPATH') OR exit('No direct script access allowed');

class frontEnd_models extends CI_Model {

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
}