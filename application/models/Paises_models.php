<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Paises_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {        
	    parent::__construct();
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre,a.descripcion');
        $this->db->from('bd_paises as a');
        $this->db->order_by('a.descripcion');

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
    }
}