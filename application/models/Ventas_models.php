<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Ventas_models extends CI_Model {

    public $variable;
    public $array;

    public function __construct() {
        
	parent::__construct();
    }
    
    public function registrar($id,$tipo,$datos_personales,$listado_compra) {
        
        $this->db->where('tipo_documento',$tipo);$this->db->where('identificacion',$id);$query=$this->db->get('bd_clientes');
       
        if($query->num_rows() > 0) {
            $bd_clientes=array(
                'email'=>$datos_personales[0]['textemailres'],
                'nombre'=>$datos_personales[0]['textnombresres'],
                'telefono'=>$datos_personales[0]['textnumerores'],
                'apellido'=>$datos_personales[0]['textapellidosres'],
                'codigo_area'=>$datos_personales[0]['textoutputres'],
                'tipo_documento'=>$datos_personales[0]['textipodocres'],
                'identificacion'=>$datos_personales[0]['textdocumentores'],
            );

            if(!empty($bd_clientes)) {
                $this->db->where('tipo_documento',$tipo);
                $this->db->where('identificacion',$id);
                $this->db->update('bd_clientes',$bd_clientes);

                $bd_orden=array(
                    'tipo_documento'=>$datos_personales[0]['textipodocres'],
                    'identificacion'=>$datos_personales[0]['textdocumentores'],
                );

                if(!empty($bd_orden)) {
                    $this->db->insert('bd_orden',$bd_orden);
                    $numero_orden=$this->db->insert_id();     
                }

                if(count($listado_compra) > 0) {
                    foreach($listado_compra as $row) {
                        $id_hotel='';
                        $numero_vuelo='';
                        $punto_recojo='';
                        $id_habitacion='';
                        $airolinea_vuelo='';

                        if(isset($row['textidhotel'])) {
                            $id_hotel=$row['textidhotel'];
                        }
                        
                        if(isset($row['textidhabitacion'])) {
                            $id_habitacion=$row['textidhabitacion'];
                        }

                        if(isset($row['textrenumerovuelores'])) {
                            $numero_vuelo=$row['textrenumerovuelores'];
                        }

                        if(isset($row['textairolineavuelores'])) {
                            $airolinea_vuelo=$row['textairolineavuelores'];
                        }

                        if(isset($row['textrecojores'])) {
                            $punto_recojo=$row['textrecojores'];
                        }

                        $bd_ventas=array(
                            'status'=>'1',
                            'id_habitacion'=>'',
                            'identificacion'=>$id,
                            'tipo_documento'=>$tipo,
                            'id_hoteles'=>$id_hotel,
                            'precio'=>$row['textprecio'],
                            'evento'=>$row['textevento'],
                            'numero_vuelo'=>$numero_vuelo,
                            'numero_orden'=>$numero_orden,
                            'punto_recojo'=>$punto_recojo,
                            'duracion'=>$row['textduracion'],
                            'infoprecio'=>$row['infoPrecio'],
                            'imagen_tours'=>$row['textimagen'],
                            'fecha_llegada'=>$row['textfecha'],
                            'airolinea_vuelo'=>$airolinea_vuelo,
                            'simbolo_moneda'=>$row['textmoneda'],
                            'fecha_registro'=>date('Y-m-d H:i:s'),
                            'id_servicio'=>$row['textidservicio'],
                            'tipo_cambio'=>$row['texttipocambio'],
                            'cantidad_ninos'=>$row['textqtyNino'],
                            'nombre_servicio'=>$row['textservicio'],
                            'precio_hotel'=>$row['textprecio_hotel'],
                            'precio_tours'=>$row['textprecio_tours'],
                            'pais_procedencia'=>$row['textidpaises'],
                            'distrito_servicio'=>$row['textdistrito'],
                            'cantidad_adultos'=>$row['textqtyAdulto'],
                            'comentario_preveedor'=>$row['textcomentariores'],
                        );
                        
                        if(!empty($bd_ventas)) {    
                            $query1=$this->db->insert('bd_ventas',$bd_ventas);
                            
                            if(!empty($id_habitacion)) {
                                foreach($id_habitacion as $row2) {
                                    $bd_ventas_habitaciones=array(
                                        'identificacion'=>$id,
                                        'tipo_documento'=>$tipo,
                                        'id_hoteles'=>$id_hotel,
                                        'id_habitacion'=>$row2['id'],
                                        'numero_orden'=>$numero_orden,
                                        'cantidad_personas'=>$row2['cantidad'],
                                    );

                                    if(!empty($bd_ventas_habitaciones)) {
                                        $query2=$this->db->insert('bd_ventas_habitaciones',$bd_ventas_habitaciones);
                                    }
                                }
                            }
                        
                        }

                    }
                    return $numero_orden;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            $bd_clientes=array(
                'email'=>$datos_personales[0]['textemailres'],
                'nombre'=>$datos_personales[0]['textnombresres'],
                'telefono'=>$datos_personales[0]['textnumerores'],
                'apellido'=>$datos_personales[0]['textapellidosres'],
                'codigo_area'=>$datos_personales[0]['textoutputres'],
                'tipo_documento'=>$datos_personales[0]['textipodocres'],
                'identificacion'=>$datos_personales[0]['textdocumentores'],
                'status'=>'1',
                'fecha_registro'=>date('Y-m-d H:i:s')
            );
            $this->db->trans_begin();
            $this->db->insert('bd_clientes',$bd_clientes);
            
            $bd_orden=array(
                'tipo_documento'=>$datos_personales[0]['textipodocres'],
                'identificacion'=>$datos_personales[0]['textdocumentores'],
            );

            if(!empty($bd_orden)) {
                $this->db->insert('bd_orden',$bd_orden);
                $numero_orden=$this->db->insert_id();     
            }

            if($this->db->trans_status()==false) {         
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                if(count($listado_compra) > 0) {
                    foreach($listado_compra as $row) {
                        $id_hotel='';
                        $numero_vuelo='';
                        $punto_recojo='';
                        $id_habitacion='';
                        $airolinea_vuelo='';

                        if(isset($row['textidhotel'])) {
                            $id_hotel=$row['textidhotel'];
                        }

                        if(isset($row['textidhabitacion'])) {
                            $id_habitacion=$row['textidhabitacion'];
                        }

                        if(isset($row['textrenumerovuelores'])) {
                            $numero_vuelo=$row['textrenumerovuelores'];
                        }

                        if(isset($row['textairolineavuelores'])) {
                            $airolinea_vuelo=$row['textairolineavuelores'];
                        }

                        if(isset($row['textrecojores'])) {
                            $punto_recojo=$row['textrecojores'];
                        }

                        $bd_ventas=array(
                            'status'=>'1',
                            'id_habitacion'=>'',
                            'identificacion'=>$id,
                            'tipo_documento'=>$tipo,
                            'id_hoteles'=>$id_hotel,
                            'precio'=>$row['textprecio'],
                            'evento'=>$row['textevento'],
                            'numero_orden'=>$numero_orden,
                            'numero_vuelo'=>$numero_vuelo,
                            'punto_recojo'=>$punto_recojo,
                            'duracion'=>$row['textduracion'],
                            'infoprecio'=>$row['infoPrecio'],
                            'imagen_tours'=>$row['textimagen'],
                            'fecha_llegada'=>$row['textfecha'],
                            'airolinea_vuelo'=>$airolinea_vuelo,
                            'simbolo_moneda'=>$row['textmoneda'],
                            'fecha_registro'=>date('Y-m-d H:i:s'),
                            'id_servicio'=>$row['textidservicio'],
                            'tipo_cambio'=>$row['texttipocambio'],
                            'cantidad_ninos'=>$row['textqtyNino'],
                            'nombre_servicio'=>$row['textservicio'],
                            'pais_procedencia'=>$row['textidpaises'],
                            'precio_hotel'=>$row['textprecio_hotel'],
                            'precio_tours'=>$row['textprecio_tours'],
                            'cantidad_adultos'=>$row['textqtyAdulto'],
                            'distrito_servicio'=>$row['textdistrito'],
                            'comentario_preveedor'=>$row['textcomentariores'],
                        );

                        if(!empty($bd_ventas)) {    
                            $query1=$this->db->insert('bd_ventas',$bd_ventas);

                            if(!empty($id_habitacion)) {
                                foreach($id_habitacion as $row2) {
                                    $bd_ventas_habitaciones=array(
                                        'identificacion'=>$id,
                                        'tipo_documento'=>$tipo,
                                        'id_hoteles'=>$id_hotel,
                                        'id_habitacion'=>$row2['id'],
                                        'numero_orden'=>$numero_orden,
                                        'cantidad_personas'=>$row2['cantidad'],
                                    );

                                    if(!empty($bd_ventas_habitaciones)) {
                                        $query2=$this->db->insert('bd_ventas_habitaciones',$bd_ventas_habitaciones);
                                    }
                                }
                            }
                        }
                    }
                    return $numero_orden;
                } else {
                    return 0;
                }
            }
        }
    }

    public function validar($codigo,$tipo,$identificacion) {

        if(isset($codigo,$tipo,$identificacion)) {
            $this->db->select('count(*) as cantidad');
            $this->db->from('bd_orden as a');
            $this->db->where('a.status','1');
            $this->db->where('a.tipo_documento',$tipo);
            $this->db->where('a.cupon_validar',$codigo);
            $this->db->where('a.identificacion',$identificacion);
            $query=$this->db->get();
            if($query->num_rows()>0) {
                return $query->result()[0]->cantidad;
            }
        }
    }
}