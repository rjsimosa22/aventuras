<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Tipo_oferta_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {        
	    parent::__construct();
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_tipos_ofertas as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->order_by('a.nombre','asc');

        $query=$this->db->get();
        if( $query->num_rows() > 0 ) {
            foreach ( $query->result() as $row ) {
                $data[] = $row;
            }
            return $data;
        }
    }
}