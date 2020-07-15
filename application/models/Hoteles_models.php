<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hoteles_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {    
	    parent::__construct();
    }
    
    public function registrar($bd_hoteles=array(),$arrayHabitaciones=array(),$arrayservicios,$identificador) { 
        
        $this->db->where('nombre',$bd_hoteles['nombre']); 
        $this->db->where('id_distrito',$bd_hoteles['id_distrito']); 
        $this->db->where('id_provincia',$bd_hoteles['id_provincia']);
        $this->db->where('id_departamento',$bd_hoteles['id_departamento']); 
        $query=$this->db->get('bd_hoteles');
        
        if($query->num_rows() > 0) {
            // eliminar temporal
            $this->db->where('identificador',$identificador);
            $this->db->delete('bd_temporal_imagenes_hoteles');
            return false;
        } else {
            $query=$this->db->insert('bd_hoteles',$bd_hoteles);
            if($query) {
                $id_hoteles=$this->db->insert_id();
                
                foreach($arrayHabitaciones as $row) {
                    $bd_hoteles_habitaciones_dia=array(
                        'id_hoteles'=>$id_hoteles,
                        'id_habitaciones'=>$row['id'],
                        'precio_minimo'=>$row['precio_minimo'],
                        'precio_maximo'=>$row['precio_maximo'],
                        'disponibilidad'=>$row['disponibilidad'],
                        'fecha_disponibilidad'=>date('Y-m-d H:i:s'),
                        'cantidad_habitaciones'=>$row['cantidad_habitacion'],
                    );

                    $bd_hoteles_habitaciones_info=array(
                        'id_hoteles'=>$id_hoteles,
                        'status'=>$row['id_status'],
                        'id_monedas'=>$row['moneda'],
                        'id_habitaciones'=>$row['id'],
                        'fecha_registro'=>date('Y-m-d H:i:s'),
                        'servicios'=>$row['servicios_habitacion'],
                        'cantidad_personas'=>$row['cantidad_persona'],
                    );
                    
                    if(!empty($bd_hoteles_habitaciones_dia) && !empty($bd_hoteles_habitaciones_info)) {    
                        // registrar tablas de hoteles informativas
                        $this->db->insert('bd_hoteles_habitaciones_info',$bd_hoteles_habitaciones_info);
                        $query1=$this->db->insert('bd_hoteles_habitaciones_dia',$bd_hoteles_habitaciones_dia);
                    } else {
                        // eliminar temporal
                        $this->db->where('identificador',$identificador);
                        $this->db->delete('bd_temporal_imagenes_hoteles');
                        return false;
                    }
                }

                if($query1) {

                    //registro de servicios populares
                    foreach($arrayservicios as $row) {
                        $bd_hoteles_servicios_populares=array(
                            'status'=>'1',
                            'id_servicios'=>$row,
                            'id_hoteles'=>$id_hoteles,
                            'fecha_registro'=>date('Y-m-d H:i:s')
                        );
                        
                        if(!empty($bd_hoteles_servicios_populares)) {    
                            // registrar tematica
                            $query2=$this->db->insert('bd_hoteles_servicios_populares',$bd_hoteles_servicios_populares);
                        } else {
                            // eliminar temporal
                            $this->db->where('identificador',$identificador);
                            $this->db->delete('bd_temporal_imagenes_hoteles');
                            return false;
                        }
                    }

                    if($query2) {
                        // registrar imagenes
                        $query3=$this->db->query("INSERT INTO bd_hoteles_imagenes(nombre,nombre_extension,status,fecha_registro,id_hoteles) SELECT a.nombre,a.nombre_extension,1,now(),$id_hoteles FROM  bd_temporal_imagenes_hoteles AS a WHERE a.identificador=$identificador ORDER BY a.id ASC");
                        if($query3) {
                            // eliminar temporal
                            $this->db->where('identificador',$identificador);
                            $this->db->delete('bd_temporal_imagenes_hoteles');
                        } else {
                            // eliminar temporal
                            $this->db->where('identificador',$identificador);
                            $this->db->delete('bd_temporal_imagenes_hoteles');
                            return false; 
                        }
                    } else {
                        // eliminar temporal
                        $this->db->where('identificador',$identificador);
                        $this->db->delete('bd_temporal_imagenes_hoteles');
                        return false; 
                    }    
                } else {
                    // eliminar temporal
                    $this->db->where('identifficador',$identificador);
                    $this->db->delete('bd_temporal_imagenes_hoteles');
                    return false;
                }
                return $id_hoteles;
            } else {
                // eliminar temporal
                $this->db->where('identificador',$identificador);
                $this->db->delete('bd_temporal_imagenes_hoteles');
                return false;;
            }
        }
    }    
    
    public function listado() {
        
        $this->db->select('a.id,a.id_departamento,a.id_provincia,a.id_distrito,a.nombre,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color,c.nombre AS departamento,d.nombre AS provincia,e.nombre AS distrito');
        $this->db->from('bd_hoteles as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_departamentos as c','a.id_departamento=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_distrito as e','a.id_distrito=e.id');
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

    public function listado_hoteles($status,$id) {
        
        $this->db->select('a.id,a.id_departamento,a.id_provincia,a.id_distrito,a.nombre,a.status,a.fecha_registro,b.descripcion as nombre_status,b.color,c.nombre AS departamento,d.nombre AS provincia,e.nombre AS distrito');
        $this->db->from('bd_hoteles as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_departamentos as c','a.id_departamento=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_distrito as e','a.id_distrito=e.id');
        if($id!='0') {
            $this->db->where_not_in('a.id',$id);
        }
        $this->db->where('a.status',$status);
        $this->db->order_by('a.nombre','desc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function listado_hoteles_sel($id) {
        
        $this->db->select('a.id,a.id_hoteles,b.nombre,b.descripcion,a.status,c.descripcion as nombre_status,c.color');
        $this->db->from('bd_paquetes_hoteles as a');
        $this->db->join('bd_hoteles as b','b.id=a.id_hoteles');
        $this->db->join('bd_estatus_global as c','c.id=a.status');
        $this->db->where('a.id_paquetes',$id);       
        $this->db->order_by('a.id','asc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function imagen_hoteles_1($id) {
        
        $this->db->select('a.id,a.nombre,a.nombre_extension');
        $this->db->from('bd_hoteles_imagenes as a');
        $this->db->where('a.id_hoteles',$id);  
        $this->db->where('a.status','1');       
        $this->db->order_by('a.nombre','asc');
        
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
            $this->db->select('a.id,a.id_departamento,a.id_provincia,a.id_distrito,a.nombre,a.status,a.fecha_registro,a.descripcion,a.servicio,b.descripcion as nombre_status,b.color,c.nombre AS departamento,d.nombre AS provincia,e.nombre AS distrito');
            $this->db->from('bd_hoteles as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->join('bd_departamentos as c','a.id_departamento=c.id');
            $this->db->join('bd_provincias as d','a.id_provincia=d.id');
            $this->db->join('bd_distrito as e','a.id_distrito=e.id');
            $this->db->order_by('a.nombre','desc');
            $this->db->where('a.id',$id);
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    public function editar($id,$bd_hoteles,$arrayservicios) {
        
        if(isset($id)) {
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles',$bd_hoteles);

            $this->db->where('id_hoteles',$id);
            $this->db->delete('bd_hoteles_servicios_populares');

            //registro de servicios populares
            foreach($arrayservicios as $row) {
                $bd_hoteles_servicios_populares=array(
                    'status'=>'1',
                    'id_hoteles'=>$id,
                    'id_servicios'=>$row,
                    'fecha_registro'=>date('Y-m-d H:i:s')
                );
                
                if(!empty($bd_hoteles_servicios_populares)) {    
                    $this->db->insert('bd_hoteles_servicios_populares',$bd_hoteles_servicios_populares);
                } else {
                    return false; 
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function imagen_hoteles($id) {
        
        $this->db->select('b.nombre_extension,c.precio_minimo,d.id_monedas,e.tipo_cambio,a.id_hoteles,c.id_habitaciones');
        $this->db->from('bd_paquetes_hoteles as a');
        $this->db->join('bd_hoteles_imagenes as b','b.id_hoteles=a.id_hoteles');
        $this->db->join('bd_hoteles_habitaciones_dia as c','c.id_hoteles=a.id_hoteles');
        $this->db->join('bd_hoteles_habitaciones_info as d','c.id_habitaciones=d.id_habitaciones');
        $this->db->join('bd_monedas as e','d.id_monedas=e.id');
        $this->db->where('a.status','1');
        $this->db->where('b.status','1');
        $this->db->where('c.status','1');
        $this->db->where('a.id_paquetes',$id);
        $this->db->order_by('c.precio_minimo','ASC');
        $this->db->order_by('b.nombre','ASC');
        $this->db->limit(1);  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function imagen_hoteles_sel($idpaquete,$idhotel,$idhabitacion) {
        
        $this->db->select('b.nombre_extension,c.precio_minimo,d.id_monedas,e.tipo_cambio,a.id_hoteles,c.id_habitaciones');
        $this->db->from('bd_paquetes_hoteles as a');
        $this->db->join('bd_hoteles_imagenes as b','b.id_hoteles=a.id_hoteles');
        $this->db->join('bd_hoteles_habitaciones_dia as c','c.id_hoteles=a.id_hoteles');
        $this->db->join('bd_hoteles_habitaciones_info as d','c.id_habitaciones=d.id_habitaciones');
        $this->db->join('bd_monedas as e','d.id_monedas=e.id');
        $this->db->where('a.status','1');
        $this->db->where('b.status','1');
        $this->db->where('c.status','1');
        $this->db->where('c.id_hoteles',$idhotel);
        $this->db->where('a.id_paquetes',$idpaquete);
        $this->db->where('c.id_habitaciones',$idhabitacion);
        $this->db->order_by('b.nombre','ASC');
        $this->db->limit(1);  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function activar($id) {

        if(isset($id)) {
            $bd_hoteles=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles',$bd_hoteles);
            return true;
        }
    }
    
    public function inactivar($id) {

        if(isset($id)) {
            $bd_hoteles=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles',$bd_hoteles);
            return true;
        }
    }

    public function imagen_personal($id) {

        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.id_hoteles,a.alt_seo,a.status,a.nombre_extension,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_hoteles_imagenes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.id','asc');
            $this->db->where('a.id',$id);
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    public function registrar_imagenes_personal($nombre_extension,$id_hoteles,$alt_seo) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_hoteles_imagenes=array(
                'status'=>'1',
                'alt_seo'=>$alt_seo,
                'nombre'=>$nombre[0],
                'id_hoteles'=>$id_hoteles,
                'nombre_extension'=>$nombre_extension,
                'fecha_registro'=>date('Y-m-d H:i:s'),
            );
            
            if(!empty($bd_hoteles_imagenes)) {
                $this->db->insert('bd_hoteles_imagenes',$bd_hoteles_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function editar_imagenes($nombre_extension,$id) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_hoteles_imagenes=array(
                'nombre'=>$nombre[0],
                'nombre_extension'=>$nombre_extension,
            );
            
            if(!empty($bd_hoteles_imagenes)) {
                $this->db->where('id',$id);
                $this->db->update('bd_hoteles_imagenes',$bd_hoteles_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function registrar_imagenes($nombre_extension,$identificador) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_temporal_imagenes_hoteles=array(
                'nombre'=>$nombre[0],
                'identificador'=>$identificador,
                'nombre_extension'=>$nombre_extension,
            );
                    
            if(!empty($bd_temporal_imagenes_hoteles)) {
                $this->db->insert('bd_temporal_imagenes_hoteles',$bd_temporal_imagenes_hoteles);
                return true;
            } else {
                return false;
            }
        }
    }

    public function registrar_imagen_extras($nombre_extension,$id) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_hoteles_imagenes=array(
                'nombre'=>$nombre[0],
                'fecha_registro'=>now(),
                'status'=>$nombre_extension,
                'id_hoteles'=>$nombre_extension,
                'nombre_extension'=>$nombre_extension,
            );
            
            if(!empty($bd_hoteles_imagenes)) {
                $query=$this->db->insert('bd_hoteles_imagenes',$bd_hoteles_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function listado_imagenes($id) {
        
        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.id_hoteles,a.alt_seo,a.status,a.nombre_extension,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_hoteles_imagenes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.id','desc');
            $this->db->where('a.status','1');
            $this->db->where('a.id_hoteles',$id);
            
            $query=$this->db->get();
            if($query->num_rows() > 0) {
                foreach($query->result() as $row) {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }

    function registrar_imagen_alt($id,$alt_seo) {
        
        if(isset($id)) {
            $bd_tours_imagenes=array(
                'alt_seo'=>$alt_seo,
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles_imagenes',$bd_tours_imagenes);
            return true;
        } else {
            return false;
        }
    }

    public function activar_imagenes($id) {

        if(isset($id)) {
            $bd_hoteles_imagenes=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles_imagenes',$bd_hoteles_imagenes);
            return true;
        }
    }
    
    public function inactivar_imagenes($id) {

        if(isset($id)) {
            $bd_hoteles_imagenes=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles_imagenes',$bd_hoteles_imagenes);
            return true;
        }
    }

    
    public function habitacion_personal($id_hoteles,$id_habitaciones) {
        
        if(isset($id_hoteles,$id_habitaciones)) {
            $date_i=date('Y-m-d 00:00');
            $date_f=date('Y-m-d 23:59');
            $this->db->select('a.id,a.id_habitaciones,a.id_hoteles,a.servicios,a.id_monedas,e.cantidad_habitaciones,e.disponibilidad,b.descripcion AS nombre_status,b.color,c.nombre AS moneda,d.nombre,e.precio_minimo,e.precio_maximo,c.simbolo,a.cantidad_personas');
            $this->db->from('bd_hoteles_habitaciones_info AS a');
            $this->db->join('bd_estatus_global AS b','b.id=a.status');
            $this->db->join('bd_monedas AS c','a.id_monedas=c.id');
            $this->db->join('bd_habitaciones AS d','a.id_habitaciones=d.id');
            $this->db->join('bd_hoteles_habitaciones_dia AS e','a.id_habitaciones=e.id_habitaciones AND a.id_hoteles=e.id_hoteles');
            $this->db->order_by('a.id','asc');
            $this->db->where('e.status',1);
            $this->db->where('a.id_hoteles',$id_hoteles);
            $this->db->where('a.id_habitaciones',$id_habitaciones);
            //$this->db->where('e.fecha_disponibilidad >=',$date_i);
            //$this->db->where('e.fecha_disponibilidad <=',$date_f);
            
            $query=$this->db->get();
            if($query->num_rows() > 0) {
                foreach($query->result() as $row) {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }

    public function listado_habitaciones($id) {
        
        if(isset($id)) {
            $date_i=date('Y-m-d 00:00');
            $date_f=date('Y-m-d 23:59');
            $this->db->select('a.id,a.id_habitaciones,b.descripcion AS nombre_status,b.color,c.nombre AS moneda,d.nombre,e.precio_minimo,e.precio_maximo,c.simbolo,a.cantidad_personas,a.status');
            $this->db->from('bd_hoteles_habitaciones_info AS a');
            $this->db->join('bd_estatus_global AS b','b.id=a.status');
            $this->db->join('bd_monedas AS c','a.id_monedas=c.id');
            $this->db->join('bd_habitaciones AS d','a.id_habitaciones=d.id');
            $this->db->join('bd_hoteles_habitaciones_dia AS e','a.id_habitaciones=e.id_habitaciones AND a.id_hoteles=e.id_hoteles AND e.fecha_disponibilidad=a.fecha_registro');
            $this->db->order_by('a.id','asc');
            $this->db->where('a.id_hoteles',$id);
            $this->db->where('e.id_hoteles',$id);
            
            $query=$this->db->get();
            if($query->num_rows() > 0) {
                foreach($query->result() as $row) {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }
    
    public function editar_habitacion($bd_hoteles_habitaciones_info,$bd_hoteles_habitaciones_dia,$id_hoteles,$id_habitaciones) {

        if(isset($id_hoteles,$id_habitaciones)) {
            $this->db->where('id_hoteles',$id_hoteles);
            $this->db->where('id_habitaciones',$id_habitaciones);
            $this->db->update('bd_hoteles_habitaciones_info',$bd_hoteles_habitaciones_info);

            $this->db->where('id_hoteles',$id_hoteles);
            $this->db->where('id_habitaciones',$id_habitaciones);
            $this->db->update('bd_hoteles_habitaciones_dia',$bd_hoteles_habitaciones_dia);
            return true;
        }
    }   
    
    public function activar_habitaciones($id) {

        if(isset($id)) {
            $bd_hoteles_habitaciones_info=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles_habitaciones_info',$bd_hoteles_habitaciones_info);
            return true;
        }
    }
        
    public function inactivar_habitaciones($id) {
        if(isset($id)) {
            $bd_hoteles_habitaciones_info=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_hoteles_habitaciones_info',$bd_hoteles_habitaciones_info);
            return true;
        }
    }

    public function registrar_habitacion($bd_hoteles_habitaciones_info,$bd_hoteles_habitaciones_dia) { 

        if(!empty($bd_hoteles_habitaciones_info) && !empty($bd_hoteles_habitaciones_dia)) {
            $this->db->insert('bd_hoteles_habitaciones_info',$bd_hoteles_habitaciones_info);
            $this->db->insert('bd_hoteles_habitaciones_dia',$bd_hoteles_habitaciones_dia);
            return true;
        } else {
            return false;
        }
    }
}
