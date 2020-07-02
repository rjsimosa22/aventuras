<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboPS_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function infor_servicio() {
        
       $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('informacion_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function planeservicios($opcion) {
        
        $opcion_guia = explode('-', $opcion, '2');
        
        $this->db->where('fk_id_opc', $opcion_guia[0]); $this->db->where('guia', $opcion_guia[1]); $this->db->order_by('nombre', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function informacion($planeservicios) {
        
        $this->db->where('id_serv', $planeservicios); $this->db->order_by('nombre', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function listadoitems($planeservicios) {
        
        $this->db->where('fk_id_tipserv', $planeservicios); $this->db->order_by('descripcion', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_servicio_item');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipoitems($planeservicios) {
        
        $this->db->where('fk_id_serv', $planeservicios); $this->db->order_by('nombre', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_servicio_tipo');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
 }