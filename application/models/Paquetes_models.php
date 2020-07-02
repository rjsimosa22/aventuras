<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paquetes_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {    
	    parent::__construct();
    }
    
    public function registrar($bd_paquetes,$arraydias,$arrayhoteles_seleccionado,$arraytours_basico,$arraytours_exclusivo,$arraytours_recomendado) { 
        
        $this->db->where('nombre',$bd_paquetes['nombre']); 
        $this->db->where('id_provincia',$bd_paquetes['id_provincia']); 
        $this->db->where('id_distrito',$bd_paquetes['id_distrito']); 
        $this->db->where('id_departamento',$bd_paquetes['id_departamento']); 
        $query=$this->db->get('bd_paquetes');

        if($query->num_rows() > 0) {
            return false;
        } else {
            $query=$this->db->insert('bd_paquetes',$bd_paquetes);
            if($query) {
                $id_paquetes=$this->db->insert_id();
               
                foreach($arrayhoteles_seleccionado as $row) {
                    if($row) {
                        $bd_paquetes_hoteles=array(
                            'status'=>'1',
                            'id_hoteles'=>$row,
                            'id_paquetes'=>$id_paquetes,
                            'fecha_registro'=>date('Y-m-d H:i:s')
                        );
                        
                        if(!empty($bd_paquetes_hoteles)) {    
                            // registrar hoteles seleccionados
                            $query1=$this->db->insert('bd_paquetes_hoteles',$bd_paquetes_hoteles);
                        }
                    }   
                }

                if($query1) {
                    // registrar paquete basico
                    for($i=0;$i<$bd_paquetes['cantidad_dias'];$i++) {
                        $bd_paquetes_tours=array(
                            'status'=>'1',
                            'dias'=>$arraydias[$i],
                            'id_paquetes'=>$id_paquetes,
                            'id_tours_basico'=>$arraytours_basico[$i],
                            'id_tours_exclusivo'=>$arraytours_exclusivo[$i],
                            'id_tours_recomendado'=>$arraytours_recomendado[$i],
                            'fecha_registro'=>date('Y-m-d H:i:s')
                        );

                        if(!empty($bd_paquetes_tours)) {    
                            // registrar tours seleccionados
                            $query2=$this->db->insert('bd_paquetes_tours',$bd_paquetes_tours);
                        } 
                    }
                    return $id_paquetes;
                }
            } else {
                return false;
            }
        }
    }
    
    
    public function listado() {
        
        $this->db->select('a.id,a.id_provincia,a.id_departamento,a.descripcion,a.id_distrito,a.cantidad_dias,a.nombre,a.servicios,a.tipo_descuento,a.monto_descuento,a.status,b.descripcion as nombre_status,b.color,d.nombre AS provincia,f.nombre AS distrito,g.nombre AS departamento');
        $this->db->from('bd_paquetes as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
        $this->db->order_by('a.nombre','desc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function consultar($id) {

        if(isset($id)) {
            $this->db->select('a.id,a.id_provincia,a.id_departamento,a.descripcion,a.servicios,a.id_distrito,a.cantidad_dias,a.nombre,a.servicios,a.tipo_descuento,a.monto_descuento,a.status,b.descripcion as nombre_status,b.color,d.nombre AS provincia,f.nombre AS distrito,g.nombre AS departamento,i.id_tours_basico');
            $this->db->from('bd_paquetes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->join('bd_provincias as d','a.id_provincia=d.id');
            $this->db->join('bd_distrito as f','a.id_distrito=f.id');
            $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
            $this->db->join('bd_paquetes_tours as i','i.id_paquetes=a.id');
            $this->db->group_by('a.nombre');
            $this->db->order_by('a.nombre','desc');
            if(is_numeric($id)) {
                $this->db->where('a.id',$id);
            } else {
                $this->db->where('a.nombre',$id);
            }
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    public function paquetes_seleccion($id) {
        
        if(isset($id)) {
            $this->db->select('i.id_tours_basico,cd.nombre as duracion,c.detalle,c.recomendacion,c.nombre as tours_basico,c.descripcion as descripcion_basico,i.id_tours_exclusivo,i.id_tours_recomendado');
            $this->db->from('bd_paquetes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->join('bd_provincias as d','a.id_provincia=d.id');
            $this->db->join('bd_distrito as f','a.id_distrito=f.id');
            $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
            $this->db->join('bd_paquetes_tours as i','i.id_paquetes=a.id');
            $this->db->join('bd_tours as c','i.id_tours_basico=c.id');
            $this->db->join('bd_duracion as cd','cd.id=c.duracion');
            $this->db->order_by('a.id','desc');
            $this->db->where('a.id',$id);
            
            $query=$this->db->get();
            if($query->num_rows() > 0) {
                foreach($query->result() as $row) {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }

    public function paquetes_mas_vistos($cantidad,$distrito,$id) {
                
        $this->db->select('i.id_paquetes,a.id,a.id_provincia,a.descripcion,a.id_departamento,a.id_distrito,a.cantidad_dias,a.nombre,a.servicios,a.tipo_descuento,a.monto_descuento,a.status,b.descripcion as nombre_status,b.color,f.nombre AS distrito,i.id_tours_basico');
        $this->db->from('bd_paquetes as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_paquetes_tours as i','i.id_paquetes=a.id');
        $this->db->where('a.status','1');
        $this->db->group_by('a.nombre');
        
        if($distrito!='Seleccionar' && $distrito!='listado') {
            if(is_numeric($distrito)) {
                $this->db->where('a.id_distrito',$distrito);
            } else {
                if(is_array($distrito)) {
                    $this->db->where_in('a.id_distrito',$distrito);
                } else {
                    $this->db->where('f.nombre',$distrito);
                }
            }
        }
        if(!empty($id)) {
            $this->db->where_not_in('a.id',$id);
        }
        
        if(!empty($cantidad)) {
            $this->db->limit($cantidad);  
        }
        $this->db->order_by('rand()');

        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function filtros_paquetes($distrito,$orden,$precio) {
                
        $this->db->select('a.id,a.id_provincia,a.descripcion,a.id_departamento,a.id_distrito,a.cantidad_dias,a.nombre,a.servicios,a.tipo_descuento,a.monto_descuento,a.status,b.descripcion as nombre_status,b.color,d.nombre AS provincia,f.nombre AS distrito,g.nombre AS departamento,i.id_tours_basico');
        $this->db->from('bd_paquetes as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
        $this->db->join('bd_paquetes_tours as i','i.id_paquetes=a.id');
        $this->db->where('a.status','1');
        $this->db->group_by('a.nombre');
        $this->db->order_by('a.nombre','desc');
        
        if($distrito!='Seleccionar' && $distrito!='all') {
            if(is_numeric($distrito)) {
                $this->db->where('a.id_distrito',$distrito);
            } else {
                if(is_array($distrito)) {
                    $this->db->where_in('a.id_distrito',$distrito);
                } else {
                    $this->db->where('f.nombre',$distrito);
                }
            }
        }
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function paquetes_cantidad() {
                
        $this->db->select('count(*) as cantidad');
        $this->db->from('bd_paquetes as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
        $this->db->where('a.status','1');
        $this->db->order_by('a.nombre','desc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function paquetes_destino() {
        
        $this->db->select('f.id,f.nombre AS distrito,count(*) AS cantidad');
        $this->db->from('bd_paquetes as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->where('a.status','1');
        $this->db->group_by('e.id,e.nombre');
        $this->db->order_by('a.nombre','desc');  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function imagen_personal($id) {

        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.id_tours,a.status,a.nombre_extension,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_tours_imagenes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.id','asc');
            $this->db->where('a.id',$id);
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    function editar($id,$bd_paquetes,$arraydias,$arrayhoteles_seleccionado,$arraytours_basico,$arraytours_exclusivo,$arraytours_recomendado) {
        
        if(isset($id)) {
            $this->db->where('id',$id);
            $this->db->update('bd_paquetes',$bd_paquetes);

            
            $this->db->where('id_paquetes',$id);
            $this->db->delete('bd_paquetes_hoteles');

            //registrar de hoteless
            foreach($arrayhoteles_seleccionado as $row) {
                if($row) {
                    $bd_paquetes_hoteles=array(
                        'status'=>'1',
                        'id_hoteles'=>$row,
                        'id_paquetes'=>$id,
                        'fecha_registro'=>date('Y-m-d H:i:s')
                    );
                            
                    if(!empty($bd_paquetes_hoteles)) {    
                        $query1=$this->db->insert('bd_paquetes_hoteles',$bd_paquetes_hoteles);
                    }
                }
            }

            if($query1) {
                $this->db->where('id_paquetes',$id);
                $this->db->delete('bd_paquetes_tours');
                // registrar paquete basico
                for($i=0;$i<$bd_paquetes['cantidad_dias'];$i++) {
                    $bd_paquetes_tours=array(
                        'status'=>'1',
                        'id_paquetes'=>$id,
                        'dias'=>$arraydias[$i],
                        'id_tours_basico'=>$arraytours_basico[$i],
                        'id_tours_exclusivo'=>$arraytours_exclusivo[$i],
                        'id_tours_recomendado'=>$arraytours_recomendado[$i],
                        'fecha_registro'=>date('Y-m-d H:i:s')
                    );

                    if(!empty($bd_paquetes_tours)) {    
                        // registrar tours seleccionados
                        $query2=$this->db->insert('bd_paquetes_tours',$bd_paquetes_tours);
                    } 
                }
            }
            return true;  
        } else {
            return false;
        }
    }
    
    public function activar($id) {

        if(isset($id)) {
            $bd_paquetes=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_paquetes',$bd_paquetes);
            return true;
        }
    }
    
    public function inactivar($id) {

        if(isset($id)) {
            $bd_paquetes=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_paquetes',$bd_paquetes);
            return true;
        }
    }

    public function activar_imagenes($id) {

        if(isset($id)) {
            $bd_tours_imagenes=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tours_imagenes',$bd_tours_imagenes);
            return true;
        }
    }
    
    public function inactivar_imagenes($id) {

        if(isset($id)) {
            $bd_tours_imagenes=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tours_imagenes',$bd_tours_imagenes);
            return true;
        }
    }
}