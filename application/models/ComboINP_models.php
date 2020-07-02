<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboINP_models extends CI_Model{
    
    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function tratamiento_luna() {
        
        $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $this->db->where('id_categoria', '3'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_montura() {
        
        $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $this->db->where('id_categoria', '4'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_tarjeta() {
        
        $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('tipos_de_tarjetas');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function material_montura() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $this->db->where('id_categoria', '5'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function material_luna() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $this->db->where('id_categoria', '2'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_luna() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('status', '1'); $this->db->where('id_categoria', '1'); $query = $this->db->get('td_servicio');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_pago() {
        
       $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('tipos_de_pagos');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function listado_vendedor() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('listado_de_vendedor');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function parentescos() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_parentesco');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipobancos() {
        
       $this->db->order_by('nombre', 'asc'); $this->db->where('status', '0'); $query = $this->db->get('td_bancos');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_vitrina() {
        
       $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('tipos_de_vitrinas');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_vitrina2() {
        
       $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1');  $this->db->where('cantidad >', '0'); $query = $this->db->get('tipos_de_vitrinas');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
    
    public function tipo_inventario() {
        
       $this->db->order_by('descripcion', 'asc'); $this->db->where('estatus', '1'); $query = $this->db->get('inventario');
        
        if( $query->num_rows() > 0 ) {
            
            return $query->result();
        }
    }
}