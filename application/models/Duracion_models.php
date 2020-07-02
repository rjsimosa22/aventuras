<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Duracion_models extends CI_Model {

    public $variable;
    public $array;

    public function __construct() {
	parent::__construct();
    }
    
    public function registrar($data = array(), $item = array()) {
        
        $this->db->where('status', '0'); $this->db->like('nombre', $data['nombre']); $query = $this->db->get('servicios');
        
        if( $query->num_rows() > 0 ) {
            
                    return false;
        } else {
            
                    $query = $this->db->insert('servicios',$data);

                        if($query) {
                                        $id = $this->db->insert_id();
                                        $comprobar = $this->Planes_models->registraritems($id, $item);
                                       
                                        if( $comprobar == true ) {
                                            
                                                    return true; 
                                        } else {
                                                    return false; 
                                        }
                        } else {
                                    return false;
                        }
        }
    }
    
    public function registraritems($id, $item = array()) {
        
        if( isset($id) ) {
        
            for( $i = 0; $i <= count($item); $i++ ) {

                $items = array(

                    'nombre' => $item[$i],
                    'fechacreacion' => date('Y-m-d H:i:s'),
                    'status' => '0',
                    'id_servicios' => $id
                );
                
                if( !empty($items['nombre']) ) {

                    $this->db->insert('items_servicios', $items);
                }
            }
                    return true;
        } else {
                    return false;
        }
    }
    
    public function listado() {

        $this->db->select('a.id,a.nombre');
        $this->db->from('bd_duracion AS a');
        $this->db->where('a.status','1');
        $this->db->order_by('a.id','desc');
        
        $query=$this->db->get();
        if($query->num_rows()>0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }
    
    public function consultarplans($id) {

        if( isset($id) ) {
            
            if( is_numeric($id) ) { 
                
                        $condicion = $this->db->where('a.id', $id); 
            } else { 
                        $condicion = $this->db->where('a.nombre', $id); 
            }
            
            $this->db->select('a.id, a.nombre, a.montototal, a.cuotames, a.primafiliacion, a.tiempocuotausos, a.duracion, a.fechacreacion, a.status');
            $this->db->from('servicios as a');
            $this->db->where('a.status', '0');
            $this->db->where('a.inicial', 'p');
            $this->db->order_by('a.id', 'desc');
            $condicion;
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                    $array = array(

                        'acceso' => true,
                        'id' => $row->id,
                        'nombre' => $row->nombre,
                        'montototal' => $row->montototal,
                        'cuotames' => $row->cuotames,
                        'primafiliacion' => $row->primafiliacion,
                        'tiempocuotausos' => $row->tiempocuotausos,
                        'duracion' => $row->duracion
                    );
                }

                return $array;
            }
        }
    }
    
    public function consultaritems($id) {
        
        if( isset($id) ) {
            
            $this->db->select('a.id, a.nombre as item');
            $this->db->from('items_servicios as a');
            $this->db->where('a.status', '0');
            $this->db->order_by('a.nombre', 'asc');
            $this->db->where('a.id_servicios', $id);
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                     $data[] = $row;
                }
                
                return $data;
            }
        }
    }
            
    public function modificarplans($id, $data = array(), $item = array(), $item1 = array(), $id_item = array()) {
      
        if( isset($id) ) {
         
                    $this->db->where('id', $id);
                    $this->db->update('servicios', $data);
                    $comprobar = $this->Planes_models->modificaritems($id, $item1, $id_item);
                    $comprobar = $this->Planes_models->registraritems($id, $item);
                    return true;
        } else {
                    return false;
        }
    }
    
    public function modificaritems($id, $item1 = array(), $id_item = array()) {
        
        if( isset($id) ) {
            
            for( $i = 0; $i <= count($item1); $i++ ) {

                for( $i = 0; $i <= count($id_item); $i++ ) {

                    $items = array(

                        'nombre' => $item1[$i],
                        'id_servicios' => $id
                    );

                    if( !empty($items['nombre']) ) {

                        $this->db->where('id', $id_item[$i]);
                        $this->db->update('items_servicios', $items);
                    }
                }
            }
                   return true;
        } else {
                    return false;
        }
    }
    
    public function inactivar($id) {

        if( isset($id) ) {
            
            $data = array(
                'status'     => '1',
            );

            $this->db->where('id', $id);
            $this->db->update('servicios', $data);
            return true;
        }
    }
}