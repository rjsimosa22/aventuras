<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_models extends CI_Model {

    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function consultar_prefil($ced) {

        if( isset($ced) ) {
            
            $this->db->select('a.id_acceso, b.usuario_id, a.clave, a.status, a.rol, b.nombre, b.apellido, b.fnacimiento, b.direccion, b.celular, b.fcreacion, c.nombre_status');
            $this->db->from('acceso as a');
            $this->db->join('usuario as b', 'b.usuario_id = a.fk_usuario');
            $this->db->join('td_statusapp as c', 'c.id_status = a.status');
            $this->db->where('a.fk_usuario', $ced);
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                    $array = array(

                        'acceso' => true,
                        'rol' => $row->rol,
                        'clav' => $row->clave,                    
                        'sta' => $row->status,
                        'nom' => $row->nombre,
                        'ced' => $row->usuario_id,
                        'usu' => $row->id_acceso,
                        'tcel' => $row->celular,
                        'fcre' => $row->fcreacion,
                        'ape' => $row->apellido,
                        'dir' => $row->direccion,
                        'fnac' => $row->fnacimiento,
                        'nom_sta' => $row->nombre_status,
                        'nomape' => $row->apellido.' '.$row->nombre
                    );
                }
                return $array;
            }
        }
    }
    
    function modificar_prefil($ced, $usuario = array()) {
      
        if( isset($ced) ) {
         
                    $this->db->where('usuario_id', $ced);
                    $query = $this->db->update('usuario', $usuario);
                    
                    if( $query ) {

                                return true; 
                    } else {
                                return false; 
                    }
        } else {
                    return false;
        }
    }
    
    function modificar_usuario($ced, $acceso = array()) {
      
        if( isset($ced) ) {
         
                    $this->db->where('fk_usuario', $ced);
                    $query = $this->db->update('acceso', $acceso);
                    
                    if( $query ) {

                                return true; 
                    } else {
                                return false; 
                    }
        } else {
                    return false;
        }
    }
}