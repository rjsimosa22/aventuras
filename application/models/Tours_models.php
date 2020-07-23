<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tours_models extends CI_Model {

    public $array;
    public $variable;

    public function __construct() {    
	    parent::__construct();
    }
    
    public function registrar($bd_tours=array(),$arraytematica,$identificador) { 
        
        $this->db->where('nombre',$bd_tours['nombre']); 
        $this->db->where('duracion',$bd_tours['duracion']);
        $this->db->where('id_distrito',$bd_tours['id_distrito']); 
        $this->db->where('id_provincia',$bd_tours['provincia']); 
        $this->db->where('id_departamento',$bd_tours['departamento']); 
        $this->db->where('precio_minimo',$bd_tours['precio_minimo']); 
        $this->db->where('precio_maximo',$bd_tours['precio_maximo']); 
        $query=$this->db->get('bd_tours');

        if($query->num_rows() > 0) {
            // eliminar temporal
            $this->db->where('identificador',$identificador);
            $this->db->delete('bd_temporal_imagenes');
            return false;
        } else {
            $query=$this->db->insert('bd_tours',$bd_tours);
            if($query) {
                $id_tours=$this->db->insert_id();
                foreach($arraytematica as $row) {
                    $bd_tours_tematicas=array(
                        'status'=>'1',
                        'id_tematicas'=>$row,
                        'id_tours'=>$id_tours,
                        'fecha_registro'=>date('Y-m-d H:i:s')
                    );
                    
                    if(!empty($bd_tours_tematicas)) {    
                        // registrar tematica
                        $query1=$this->db->insert('bd_tours_tematicas',$bd_tours_tematicas);
                    } else {
                        // eliminar temporal
                        $this->db->where('identificador',$identificador);
                        $this->db->delete('bd_temporal_imagenes');
                        return false;
                    }
                }

                if($query1) {
                    // registrar imagenes
                    $query2=$this->db->query("INSERT INTO bd_tours_imagenes(nombre,nombre_extension,status,fecha_registro,id_tours) SELECT a.nombre,a.nombre_extension,1,now(),$id_tours FROM  bd_temporal_imagenes AS a WHERE a.identificador=$identificador ORDER BY a.id ASC");
                    if($query1) {
                        // eliminar temporal
                        $this->db->where('identificador',$identificador);
                        $this->db->delete('bd_temporal_imagenes');
                    } else {
                        // eliminar temporal
                        $this->db->where('identificador',$identificador);
                        $this->db->delete('bd_temporal_imagenes');
                        return false; 
                    }
                } else {
                    // eliminar temporal
                    $this->db->where('identificador',$identificador);
                    $this->db->delete('bd_temporal_imagenes');
                    return false;
                }
                return $id_tours;
            } else {
                // eliminar temporal
                $this->db->where('identificador',$identificador);
                $this->db->delete('bd_temporal_imagenes');
                return false;;
            }
        }
    }
    
    public function registrar_imagenes($nombre_extension,$identificador) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_temporal_imagenes=array(
                'nombre'=>$nombre[0],
                'identificador'=>$identificador,
                'nombre_extension'=>$nombre_extension,
            );
                    
            if(!empty($bd_temporal_imagenes)) {
                $this->db->insert('bd_temporal_imagenes',$bd_temporal_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function editar_imagenes($nombre_extension,$id) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_tours_imagenes=array(
                'nombre'=>$nombre[0],
                'nombre_extension'=>$nombre_extension,
            );
                    
            if(!empty($bd_tours_imagenes)) {
                $this->db->where('id',$id);
                $this->db->update('bd_tours_imagenes',$bd_tours_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function registrar_imagenes_personal($nombre_extension,$id_tours,$alt_seo) { 

        if(!empty($nombre_extension)) {
            $nombre=explode('.',$nombre_extension);
            $bd_tours_imagenes=array(
                'status'=>'1',
                'nombre'=>$nombre[0],
                'alt_seo'=>$alt_seo,
                'id_tours'=>$id_tours,
                'nombre_extension'=>$nombre_extension,
                'fecha_registro'=>date('Y-m-d H:i:s'),
            );
            
            if(!empty($bd_tours_imagenes)) {
                $this->db->insert('bd_tours_imagenes',$bd_tours_imagenes);
                return true;
            } else {
                return false;
            }
        }
    }

    public function listado() {
        
        $this->db->select('a.id,a.nombre,a.nombre_posic,a.precio_minimo,a.precio_maximo,a.status,b.descripcion as nombre_status,b.color,c.nombre AS duracion,e.nombre AS departamento,d.nombre AS provincia,f.nombre AS distrito,g.simbolo');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->order_by('a.nombre','desc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function listado_tours($status,$id) {
        
        $this->db->select('a.id,a.nombre,a.precio_minimo,a.precio_maximo,a.status,b.descripcion as nombre_status,b.color,c.nombre AS duracion,e.nombre AS departamento,d.nombre AS provincia,f.nombre AS distrito,g.simbolo');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
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

    public function tours_mas_vistos($cantidad,$distrito,$id) {
        
        $this->db->select('a.id,a.nombre,a.descripcion,a.precio_minimo,a.precio_maximo,a.status,b.descripcion as nombre_status,b.color,c.nombre AS duracion,f.nombre AS distrito,g.simbolo,g.id AS id_moneda,g.tipo_cambio');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->where('a.status','1');

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
        $this->db->order_by('rand()');
        if(!empty($cantidad)) {
            $this->db->limit($cantidad);  
        }
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function tours_cantidad() {
        
        $this->db->select('count(*) as cantidad');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->where('a.status','1');

        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function filtros_tours($distrito,$orden,$tematica,$precio) {
        
        $this->db->select('a.id,a.nombre,a.descripcion,a.precio_minimo,a.precio_maximo,a.status,b.descripcion as nombre_status,b.color,c.nombre AS duracion,e.nombre AS departamento,d.nombre AS provincia,f.nombre AS distrito,g.simbolo,g.id AS id_moneda,g.tipo_cambio');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->join('bd_tours_tematicas as h','a.id=h.id_tours');
        $this->db->join('bd_tematicas as i','i.id=h.id_tematicas');
        $this->db->where('a.status','1');

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
        
        if($precio) {
            $this->db->where('a.precio_minimo <=',$precio);
        }
        
        if($tematica) {
            $this->db->where_in('i.nombre',$tematica);
        }

        if($orden!='all') {
            if($orden=='asc') {
                $this->db->order_by('a.precio_minimo','asc');
            } else {
                $this->db->order_by('a.precio_minimo','desc');
            }
        } else {
            $this->db->order_by('a.nombre','asc');
        }
        
        $this->db->group_by('a.id');
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function costo_tours($id) {
        
        $this->db->select('a.precio_minimo,a.precio_maximo,g.id AS id_moneda,g.tipo_cambio');
        $this->db->from('bd_paquetes_tours aa');
        $this->db->join('bd_tours as a','a.id=aa.id_tours_basico');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->where('a.status','1');
        $this->db->where('aa.id_paquetes',$id);
        $this->db->order_by('a.nombre','desc');
        $this->db->limit(6);  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {

            $total_soles=0;
            $suma_soles=0;
            $suma_dolares=0;
            $total_dolares=0;
            $suma_cambio_soles=0;
            $suma_cambio_dolares=0;

            foreach($query->result() as $row) {
                if($row->id_moneda=='1') {
                    $tipo_cambio=$row->tipo_cambio;
                    $suma_cambio_dolares+=($row->precio_minimo / $row->tipo_cambio);
                    $suma_soles+=$row->precio_minimo;
                } else {
                    $tipo_cambio=$row->tipo_cambio;
                    $suma_cambio_soles+=($row->precio_minimo * $row->tipo_cambio);
                    $suma_dolares+=$row->precio_minimo;
                }
            }

            if(!empty($suma_soles)) {
                $total_soles=round($suma_soles + $suma_cambio_soles,2);
            }

            if(!empty($suma_dolares)) {
                $total_dolares=round($suma_dolares + $suma_cambio_dolares,2);
            }
           
            $data=array(    
                'tipo_cambio'=>$tipo_cambio,
                'total_soles'=>$total_soles,
                'total_dolares'=>$total_dolares
            );
            return $data;
        }
    }
    
    public function tours_destino() {
        
        $this->db->select('f.id,f.nombre AS distrito,count(*) AS cantidad');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->where('a.status','1');
        $this->db->group_by('e.id,e.nombre');
        $this->db->order_by('f.nombre','asc');  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function tours_tematicas($distrito) {
        
        $this->db->select('i.id,i.nombre AS tematica,count(*) AS cantidad');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->join('bd_tours_tematicas as h','a.id=h.id_tours');
        $this->db->join('bd_tematicas as i','i.id=h.id_tematicas');
        $this->db->where('a.status','1');
        
        if($distrito!='Seleccionar' && $distrito!='listado') {
            $this->db->where('f.nombre',$distrito);
        }
       
        $this->db->group_by('i.id,i.nombre');
        $this->db->order_by('a.nombre','asc');  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function tours_precios($distrito) {
        
        $this->db->select('min(a.precio_minimo) as precio_minimo, max(a.precio_minimo) as precio_maximo');
        $this->db->from('bd_tours as a');
        $this->db->join('bd_estatus_global as b','b.id=a.status');
        $this->db->join('bd_duracion as c','a.duracion=c.id');
        $this->db->join('bd_provincias as d','a.id_provincia=d.id');
        $this->db->join('bd_departamentos as e','a.id_departamento=e.id');
        $this->db->join('bd_distrito as f','a.id_distrito=f.id');
        $this->db->join('bd_monedas as g','a.moneda=g.id');
        $this->db->join('bd_tours_tematicas as h','a.id=h.id_tours');
        $this->db->join('bd_tematicas as i','i.id=h.id_tematicas');
        $this->db->where('a.status','1');
        
        if($distrito!='Seleccionar' && $distrito!='all') {
            $this->db->where('f.nombre',$distrito);
        }
       
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }
    
    public function imagen_tours($id) {
        
        $this->db->select('a.nombre_extension');
        $this->db->from('bd_tours_imagenes as a');
        $this->db->where('a.status','1');
        $this->db->where('a.id_tours',$id);
        $this->db->order_by('rand()');
        $this->db->limit(1);  
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            return $query->row()->nombre_extension;
        }
    }

    public function listado_tours_sel($id) {
        
        $this->db->select('a.id,a.id_tours_basico,a.id_tours_exclusivo,a.id_tours_recomendado,a.dias,b.nombre AS tours_basico,c.nombre AS tours_exclusivo,d.nombre AS tours_recomendado,a.status,e.descripcion as nombre_status,e.color');
        $this->db->from('bd_paquetes_tours as a');
        $this->db->join('bd_tours as b','b.id=a.id_tours_basico');
        $this->db->join('bd_tours as c','c.id=a.id_tours_exclusivo');
        $this->db->join('bd_tours as d','d.id=a.id_tours_recomendado');
        $this->db->join('bd_estatus_global as e','e.id=a.status');
        $this->db->where('a.id_paquetes',$id);       
        $this->db->order_by('a.dias','asc');
        
        $query=$this->db->get();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function listado_tours_itinerarios($id) {
        
        $this->db->select('a.id,a.id_tours_basico,a.id_tours_exclusivo,a.id_tours_recomendado,a.dias,b.nombre AS tours_basico,c.nombre AS tours_exclusivo,d.nombre AS tours_recomendado,a.status,e.descripcion as nombre_status,e.color');
        $this->db->from('bd_paquetes_tours as a');
        $this->db->join('bd_tours as b','b.id=a.id_tours_basico');
        $this->db->join('bd_tours as c','c.id=a.id_tours_exclusivo');
        $this->db->join('bd_tours as d','d.id=a.id_tours_recomendado');
        $this->db->join('bd_estatus_global as e','e.id=a.status');
        $this->db->where('a.id_paquetes',$id);       
        $this->db->order_by('a.dias','asc');
        
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
            $this->db->select('a.id,a.id_provincia,a.id_departamento,a.id_distrito,a.duracion AS id_duracion,a.moneda AS id_moneda,a.nombre,a.nombre_posic,a.descripcion,a.descripcion_posic,a.detalle,a.recomendacion,a.precio_minimo,a.precio_maximo,a.status,b.descripcion as nombre_status,b.color,c.nombre AS duracion,d.nombre AS provincia,e.nombre AS moneda,e.tipo_cambio,e.simbolo,f.nombre AS distrito,g.nombre AS departamento');
            $this->db->from('bd_tours as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->join('bd_duracion as c','a.duracion=c.id');
            $this->db->join('bd_provincias as d','a.id_provincia=d.id');
            $this->db->join('bd_distrito as f','a.id_distrito=f.id');
            $this->db->join('bd_departamentos as g','a.id_departamento=g.id');
            $this->db->join('bd_monedas as e','a.moneda=e.id');
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

    public function imagen_personal($id) {

        if(isset($id)) {
            $this->db->select('a.id,a.nombre,a.id_tours,a.status,a.nombre_extension,a.alt_seo,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_tours_imagenes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.id','asc');
            $this->db->where('a.status','1');
            $this->db->where('a.id',$id);
            
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->row();
            }
        }
    }

    public function listado_imagenes($id) {

        if(isset($id)) {
            $this->db->select('a.id,a.id_tours,a.nombre,a.alt_seo,a.id_tours,a.status,a.nombre_extension,b.descripcion as nombre_status,b.color');
            $this->db->from('bd_tours_imagenes as a');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->order_by('a.nombre','desc');
            $this->db->where('a.status','1');
            $this->db->where('a.id_tours',$id);
            $this->db->limit(6);
            
            $query=$this->db->get();
            if($query->num_rows() > 0) {
                foreach($query->result() as $row) {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }

    public function listado_imagenes_todas($id) {
        
        if(isset($id)) {
            $this->db->select('c.id_tours_basico,a.nombre_extension');
            $this->db->from('bd_paquetes_tours as c');
            $this->db->join('bd_tours_imagenes as a','c.id_tours_basico=a.id_tours');
            $this->db->join('bd_estatus_global as b','b.id=a.status');
            $this->db->group_by('a.nombre_extension');
            $this->db->order_by('a.id','asc');
            $this->db->where('a.status','1');
            $this->db->where('c.id_paquetes',$id);
            
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
            $this->db->update('bd_tours_imagenes',$bd_tours_imagenes);
            return true;
        } else {
            return false;
        }
    }

    function editar($id,$bd_tours,$arraytematica) {
        
        if(isset($id)) {
            $this->db->where('id',$id);
            $this->db->update('bd_tours',$bd_tours);

            $this->db->where('id_tours',$id);
            $this->db->delete('bd_tours_tematicas');

            //registro de servicios populares
            foreach($arraytematica as $row) {
                $bd_tours_tematicas=array(
                    'status'=>'1',
                    'id_tours'=>$id,
                    'id_tematicas'=>$row,
                    'fecha_registro'=>date('Y-m-d H:i:s')
                );
                
                if(!empty($bd_tours_tematicas)) {    
                    $this->db->insert('bd_tours_tematicas',$bd_tours_tematicas);
                } else {
                    return false; 
                }
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function activar($id) {

        if(isset($id)) {
            $bd_tours=array(
                'status'=>'1',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tours',$bd_tours);
            return true;
        }
    }
    
    public function inactivar($id) {

        if(isset($id)) {
            $bd_tours=array(
                'status'=> '0',
            );
            $this->db->where('id',$id);
            $this->db->update('bd_tours',$bd_tours);
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