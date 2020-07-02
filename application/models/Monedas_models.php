<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Monedas_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {        
	    parent::__construct();
    }
    
    public function registrar($bd_monedas=array()) {
        $this->db->where('nombre',$bd_monedas['nombre']); 
        $query=$this->db->get('bd_monedas');
        
        if($query->num_rows()>0) {
            return false;
        } else {
            $this->db->trans_begin();
            $this->db->insert('bd_monedas',$bd_monedas);
                    
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
        $this->db->select('a.id,a.nombre,a.tipo_mercado_pago as simbolo_act,a.tipo_cambio,a.descripcion,a.simbolo,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_monedas as a');
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

    public function listado_actual() {
        $this->db->select('a.id,a.nombre,a.tipo_cambio,a.tipo_mercado_pago as simbolo_act,a.descripcion,a.simbolo,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_monedas as a');
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

    public function consultar($id) {
        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.tipo_mercado_pago as simbolo_act,a.tipo_cambio,a.tipo_mercado_pago,a.descripcion,a.simbolo,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_monedas as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.nombre','desc');
            $this->db->where('a.tipo_mercado_pago',$id); 
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }
    
    public function editar($id,$bd_monedas=array()) {
        if(isset($id)) {
            $this->db->trans_begin();
            $this->db->where('id',$id);
            $this->db->update('bd_monedas',$bd_monedas);

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
            $bd_monedas=array(
                'status'=> '1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_monedas',$bd_monedas);
            return true;
        }
    }
    
    public function inactivar($id) {
        if(isset($id)) {
            $bd_monedas=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_monedas',$bd_monedas);
            return true;
        }
    }
}