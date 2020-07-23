<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Ofertas_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {        
	    parent::__construct();
    }
    
    public function registrar($bd_ofertas=array(),$number_multiple=array()) {
        if($bd_ofertas && $number_multiple) {
            $this->db->where('nombre',$bd_ofertas['nombre']); 
            $query=$this->db->get('bd_ofertas');
            
            if($query->num_rows()>0) {
                return false;
            } else {
                $this->db->trans_begin();
                $this->db->insert('bd_ofertas',$bd_ofertas);
                $id_ofertas=$this->db->insert_id();
    
                if($this->db->trans_status()==false) {
                    $this->db->trans_rollback();
                    return false;
                } else {
                    $this->db->trans_commit(); 
                    foreach($number_multiple as $row) {
                        $bd_oferta_detalle=array(
                            'status'=>'1',
                            'id_servicios'=>$row,
                            'id_ofertas'=>$id_ofertas
                        );
                        
                        if(!empty($bd_oferta_detalle)) {    
                            $query1=$this->db->insert('bd_oferta_detalle',$bd_oferta_detalle);
                        }
                    }
                    return true;
                }
            }
        }   
    }
    
    public function listado() {
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_ofertas as a');
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
        $this->db->select('a.id,a.nombre,a.descripcion,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
        $this->db->from('bd_ofertas as a');
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

    public function consultar_oferta_mayor($id,$tipo) {
        if(isset($id)) {
            $this->db->select('a.id_tipo_oferta,a.min_persona,a.monto_min,a.regla_monto_oferta,a.monto_oferta');
            $this->db->from('bd_ofertas as a');
            $this->db->join('bd_oferta_detalle as b','b.id_ofertas=a.id');
            $this->db->where('a.status','1');
            $this->db->where('b.status','1');  
            $this->db->where('b.id_servicios',$id); 
            $this->db->where('a.id_tipo_oferta',$tipo); 
            $this->db->where('a.fecha_fin >=',date('Y-m-d')); 
            $this->db->where('a.fecha_inicio <=',date('Y-m-d')); 
            $this->db->order_by('a.monto_oferta','desc');
            $this->db->limit(1);
            
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    public function consultar_listado($id) {
        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.tipo_mercado_pago as simbolo_act,a.tipo_cambio,a.tipo_mercado_pago,a.descripcion,a.simbolo,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_monedas as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.nombre','desc');
            $this->db->where('a.id',$id); 
            
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