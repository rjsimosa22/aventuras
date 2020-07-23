<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_frontEnd extends CI_Controller {
	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Tours_models');
        $this->load->model('Cupon_models');
        $this->load->model('Paises_models'); 
        $this->load->model('Ventas_models');
        $this->load->model('Hoteles_models');   
        $this->load->model('Ofertas_models');
        $this->load->model('Monedas_models'); 
        $this->load->model('Paquetes_models'); 
        $this->load->model('Tematicas_models'); 
        $this->load->model('Habitaciones_models');
        $this->load->model('Email_compra_models');
        $this->load->model('Inicio_frontEnd_models');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form','text','cookie'));
    }
    
    public function index() {
        
        $moneda='';
        $data['url']="";   
        $data['moneda']='';
        $data['distrito']='listado';
        $data['titulo']="Aventuras Tours";
        $data['imagen_tours']="banner_2.jpg";    
        $data['monedas']=$this->Monedas_models->listado();
        $data['url_tours']=site_url("tours/listado/$moneda");
        $data['destinos']=$this->Tours_models->tours_destino();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['url_paquetes']=site_url("paquetes/listado/$moneda");
        $data['tematicas']=$this->Tematicas_models->listado_tematicas();
        $data['cantidad_paquetes']=$this->Paquetes_models->paquetes_cantidad();
        $data['tours']=$this->visualizacion_tours('4','listado','',$moneda,'140','0','small/');
        $data['paquetes']=$this->visualizacion_paquetes('4','listado','',$moneda,'140','0','small/');

        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_index_css',$data);
        $this->load->view('front-end/inicio/view_inicio',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_index_js',$data);
    }

    public function index_moneda($moneda) {
        
        $data['url']="";   
        $data['moneda']=$moneda;
        $data['distrito']='listado';
        $data['titulo']="Aventuras Tours";
        $data['imagen_tours']="banner_2.jpg";    
        $data['monedas']=$this->Monedas_models->listado();
        $data['url_tours']=site_url("tours/listado/$moneda");
        $data['destinos']=$this->Tours_models->tours_destino();
        $data['url_paquetes']=site_url("paquetes/listado/$moneda");
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['tematicas']=$this->Tematicas_models->listado_tematicas();
        $data['tours']=$this->visualizacion_tours('6','listado','',$moneda,'140','1','small/');
        $data['paquetes']=$this->visualizacion_paquetes('4','listado','',$moneda,'140','1','small/');
        $data['cantidad_paquetes']=$this->Paquetes_models->paquetes_cantidad();
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_index_css',$data);
        $this->load->view('front-end/inicio/view_inicio',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_index_js',$data);
    }

    public function detalle_tours($distrito,$nombre) {
        
        $moneda='';
        $data['moneda']="";
        $data['variable']=1;
        $data['evento']="Tours";
        $data['total_hotel_actual']='0';
        $data['distrito']=strtolower($distrito);
        $nombre_url=str_replace("-"," ",$nombre);
        $nombre_especial=str_replace("%C3%B1","ñ",$nombre_url);
        if(!empty($nombre_especial)) {
            $nombre_url=$nombre_especial;
        } 
        $data['url']="tour/".$distrito."/".$nombre."/";
        $data['url_base']=base_url().'public/img/tours/';
        $data['monedas']=$this->Monedas_models->listado();
        $data["info"]=$this->Tours_models->consultar($nombre_url);
        $data["listado_paises"]=$this->Paises_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['url_tours']=site_url("tours/".strtolower($distrito))."/";
        $data['info']->precio_soles=round($data['info']->precio_minimo,2);
        $data['listado_imagenes']=$this->Tours_models->listado_imagenes($data['info']->id);
        $data['lista_tematicas']=$this->Tematicas_models->listado_tematicas_info($data['info']->id);
        $data['titulo']=("Tours | ".ucfirst($distrito)." | ".ucfirst($nombre));
        $data['imagen_tours']=$data['listado_imagenes'][0]->nombre_extension;    
        $data['url_img']=base_url()."public/img/tours/".$data['listado_imagenes'][0]->nombre_extension;
        $data['info']->precio_soles=$data['info']->precio_minimo;

        if($moneda=='') {
            $data['info']->precio=round(ceil($data['info']->precio_minimo),2);
        } else {
            $data['info']->precio=round(ceil($data['info']->precio_minimo / $data['info']->tipo_cambio),2); 
        }

        $data['tours']=$this->visualizacion_tours_detalle('3',$data["info"]->id_distrito,$data['info']->id,$moneda,'1','small/');
        if($data['tours']) {
            if(count($data['tours']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("tours/listado/");
                $data['tours']=$this->Tours_models->tours_mas_vistos('3','listado',$id);
            }
        } else {
            $data['tours']=$this->visualizacion_tours_detalle('3','tarapoto',$data['info']->id,$moneda,'1','small/');
            if(count($data['tours']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("tours/listado/");
                $data['tours']=$this->Tours_models->tours_mas_vistos('3','listado',$id);
            }
        } 

        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_css');
        $this->load->view('front-end/inicio/view_tours',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_detalle_tours_js');
    }

    public function detalle_tours_moneda($distrito,$nombre,$moneda) {
        
        $data['variable']=1;
        $data['moneda']=$moneda;
        $data['evento']="Tours";
        $data['total_hotel_actual']='0';
        $data['distrito']=strtolower($distrito);
        $nombre_url=str_replace("-"," ",$nombre);
        $nombre_especial=str_replace("%C3%B1","ñ",$nombre_url);
        if(!empty($nombre_especial)) {
            $nombre_url=$nombre_especial;
        }
        $data['url']="tour/".$distrito."/".$nombre."/";
        $data['url_base']=base_url().'public/img/tours/';
        $data['monedas']=$this->Monedas_models->listado();
        $data["listado_paises"]=$this->Paises_models->listado();
        $data["info"]=$this->Tours_models->consultar($nombre_url);
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['info']->precio_soles=round($data['info']->precio_minimo,2);
        $data['listado_imagenes']=$this->Tours_models->listado_imagenes($data['info']->id);
        $data['url_tours']=site_url("tours/".strtolower($distrito))."/".$moneda;
        $data['lista_tematicas']=$this->Tematicas_models->listado_tematicas_info($data['info']->id);
        $data['titulo']=("Tours | ".ucfirst($distrito)." | ".ucfirst($nombre));
        $data['imagen_tours']=$data['listado_imagenes'][0]->nombre_extension;    
        $data['url_img']=base_url()."public/img/tours/".$data['listado_imagenes'][0]->nombre_extension;
        $data['info']->precio_soles=$data['info']->precio_minimo;

        if($moneda=='') {
            $data['info']->precio=round(ceil($data['info']->precio_minimo),2);
        } else {
            $data['info']->precio=round(ceil($data['info']->precio_minimo / $data['info']->tipo_cambio),2); 
        }

        $data['tours']=$this->visualizacion_tours_detalle('3',$data["info"]->id_distrito,$data['info']->id,$moneda,'1','small/');
        if($data['tours']) {
            if(count($data['tours']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("tours/listado/");
                $data['tours']=$this->Tours_models->tours_mas_vistos('3','listado',$id);
            }
        } else {
            $data['tours']=$this->visualizacion_tours_detalle('3','tarapoto',$data['info']->id,$moneda,'1','small/');
            if(count($data['tours']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("tours/listado/");
                $data['tours']=$this->Tours_models->tours_mas_vistos('3','listado',$id);
            }
        }    
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_css');
        $this->load->view('front-end/inicio/view_tours',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_detalle_tours_js');
    }

    public function detalle_paquetes($distrito,$nombre) {
        
        $moneda='';
        $data['moneda']="";
        $data['variable']=1;
        $total_tours_basico=0;
        $data['evento']="Paquetes";
        $data['distrito']=strtolower($distrito);
        $nombre_url=str_replace("-"," ",$nombre);
        $nombre_especial=str_replace("%C3%B1","ñ",$nombre_url);
        if(!empty($nombre_especial)) {
            $nombre_url=$nombre_especial;
        }
        $data['url_base']=base_url().'public/img/tours/';
        $data['monedas']=$this->Monedas_models->listado();
        $data['url']="paquete/".$distrito."/".$nombre."/";
        $data["listado_paises"]=$this->Paises_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['url_base_hotel']=base_url().'public/img/hoteles/';
        $data["info"]=$this->Paquetes_models->consultar($nombre_url);
        $data['url_tours']=site_url("paquetes/".strtolower($distrito))."/";
        $data['inf_costo']=$this->Tours_models->costo_tours($data["info"]->id);
        $data['inf_habitacion']=$this->Hoteles_models->imagen_hoteles($data["info"]->id);
        $data['itinerarios']=$this->Tours_models->listado_tours_itinerarios($data["info"]->id);
        $data['listado_imagenes']=$this->Tours_models->listado_imagenes_todas($data["info"]->id);
        $data['titulo']=("Paquetes | ".ucfirst($distrito)." | ".ucfirst($nombre));
        $data['imagen_tours']=$data['listado_imagenes'][0]->nombre_extension;    
        $data['url_img']=base_url()."public/img/tours/".$data['listado_imagenes'][0]->nombre_extension;
        $data['lista_tematicas']=$this->Tematicas_models->listado_tematicas_info($data['info']->id_tours_basico);
        $data["info"]->duracion=$data["info"]->cantidad_dias.' días '.($data["info"]->cantidad_dias - 1).' noches';
        $data['listado_habitaciones']=$this->Habitaciones_models->listado_habitaciones($data['inf_habitacion']->id_hoteles);
        $data['info']->precio_soles=$data['inf_costo']['total_soles'];

        if(!empty($data['inf_habitacion']->precio_minimo) && !empty($data['info']->cantidad_dias)) {
            $dias=(($data['info']->cantidad_dias) - 1);
            if($dias > 0) {
                $total_hotel=(($data['inf_habitacion']->precio_minimo) * $dias);
            } else {
                $total_hotel=$data['inf_habitacion']->precio_minimo;
            }
            $data['total_hotel_actual']=$total_hotel;
        }

        if($moneda=='') {
            $data['info_precio']=round(ceil($data['inf_costo']['total_soles'] + $total_hotel),2);
        } else {
            $data['info_precio']=round(ceil((($data['inf_costo']['total_soles'] + $total_hotel) / $data['inf_costo']['tipo_cambio'])),2);
        }

        $data['paquetes_seleccion']=$this->Paquetes_models->paquetes_seleccion($data['info']->id);
        if($data['paquetes_seleccion']) {
            foreach($data['paquetes_seleccion'] as $paquetes_seleccion) {
                $paquetes_seleccion->imagen_tours=$this->Tours_models->listado_imagenes($paquetes_seleccion->id_tours_basico);
            } 
        }
       
        $data['hoteles_seleccion']=$this->Hoteles_models->listado_hoteles_sel($data['info']->id);
        if($data['hoteles_seleccion']) {
            foreach($data['hoteles_seleccion'] as $hoteles_seleccion) {
                $hoteles_seleccion->imagen_hoteles=$this->Hoteles_models->imagen_hoteles_1($hoteles_seleccion->id_hoteles);
            } 
        }

        $data['paquetes']=$this->visualizacion_paquetes_detalle('3',$data["info"]->id_distrito,$data['info']->id,$moneda,'0','small/');
        if($data['paquetes']) {
            if(count($data['paquetes']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("paquetes/listado/");
                $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos('3','listado',$data['info']->id);
            }
        } else {
            $data['paquetes']=$this->visualizacion_paquetes_detalle('3','tarapoto',$data['info']->id,$moneda,'0','small/');
            if(count($data['paquetes']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("paquetes/listado/");
                $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos('3','listado',$data['info']->id);
            }
        }    

        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_css');
        $this->load->view('front-end/inicio/view_paquetes',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_js');
    }

    public function detalle_paquetes_moneda($distrito,$nombre,$moneda) {
        
        $data['variable']=1;
        $total_tours_basico=0;
        $data['moneda']=$moneda;
        $data['evento']="Paquetes";
        $data['distrito']=strtolower($distrito);
        $nombre_url=str_replace("-"," ",$nombre);
        $nombre_especial=str_replace("%C3%B1","ñ",$nombre_url);
        if(!empty($nombre_especial)) {
            $nombre_url=$nombre_especial;
        }
        $data['url_base']=base_url().'public/img/tours/';
        $data['monedas']=$this->Monedas_models->listado();
        $data['url']="paquete/".$distrito."/".$nombre."/";
        $data["listado_paises"]=$this->Paises_models->listado();
        $data['url_base_hotel']=base_url().'public/img/hoteles/';
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data["info"]=$this->Paquetes_models->consultar($nombre_url);
        $data['inf_costo']=$this->Tours_models->costo_tours($data["info"]->id);
        $data['url_tours']=site_url("paquetes/".strtolower($distrito))."/".$moneda;
        $data['inf_habitacion']=$this->Hoteles_models->imagen_hoteles($data["info"]->id);
        $data['itinerarios']=$this->Tours_models->listado_tours_itinerarios($data["info"]->id);
        $data['listado_imagenes']=$this->Tours_models->listado_imagenes_todas($data["info"]->id);
        $data['titulo']=("Paquetes | ".ucfirst($distrito)." | ".ucfirst($nombre));
        $data['imagen_tours']=$data['listado_imagenes'][0]->nombre_extension;    
        $data['url_img']=base_url()."public/img/tours/".$data['listado_imagenes'][0]->nombre_extension;
        $data['lista_tematicas']=$this->Tematicas_models->listado_tematicas_info($data['info']->id_tours_basico);
        $data["info"]->duracion=$data["info"]->cantidad_dias.' días '.($data["info"]->cantidad_dias - 1).' noches';
        $data['listado_habitaciones']=$this->Habitaciones_models->listado_habitaciones($data['inf_habitacion']->id_hoteles);
        $data['info']->precio_soles=$data['inf_costo']['total_soles'];

        if(!empty($data['inf_habitacion']->precio_minimo) && !empty($data['info']->cantidad_dias)) {
            $dias=(($data['info']->cantidad_dias) - 1);
            if($dias > 0) {
                $total_hotel=(($data['inf_habitacion']->precio_minimo) * $dias);
            } else {
                $total_hotel=$data['inf_habitacion']->precio_minimo;
            }
            $data['total_hotel_actual']=$total_hotel;
        }

        if($moneda=='') {
            $data['info_precio']=round(ceil($data['inf_costo']['total_soles'] + $total_hotel),2);
        } else {
            $data['info_precio']=round(ceil((($data['inf_costo']['total_soles'] + $total_hotel) / $data['inf_costo']['tipo_cambio'])),2);
        }

        $data['paquetes_seleccion']=$this->Paquetes_models->paquetes_seleccion($data['info']->id);
        if($data['paquetes_seleccion']) {
            foreach($data['paquetes_seleccion'] as $paquetes_seleccion) {
                $paquetes_seleccion->imagen_tours=$this->Tours_models->listado_imagenes($paquetes_seleccion->id_tours_basico);
            } 
        }
       
        $data['hoteles_seleccion']=$this->Hoteles_models->listado_hoteles_sel($data['info']->id);
        if($data['hoteles_seleccion']) {
            foreach($data['hoteles_seleccion'] as $hoteles_seleccion) {
                $hoteles_seleccion->imagen_hoteles=$this->Hoteles_models->imagen_hoteles_1($hoteles_seleccion->id_hoteles);
            } 
        }

        $data['paquetes']=$this->visualizacion_paquetes_detalle('3',$data["info"]->id_distrito,$data['info']->id,$moneda,'0','small/');
        if($data['paquetes']) {
            if(count($data['paquetes']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("paquetes/listado/");
                $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos('3','listado',$data['info']->id);
            }
        } else {
            $data['paquetes']=$this->visualizacion_paquetes_detalle('3','tarapoto',$data['info']->id,$moneda,'0','small/');
            if(count($data['paquetes']) < 1) {
                $data['info']->distrito='aventuras';
                $data['url_tours']=site_url("paquetes/listado/");
                $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos('3','listado',$data['info']->id);
            }
        }  

        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_css');
        $this->load->view('front-end/inicio/view_paquetes',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_detalle_paquete_js');
    }

    public function listado_hoteles() {
        $id=$this->input->get_post('id',true);
        $data['hoteles_seleccion']=$this->Hoteles_models->listado_hoteles_sel($id);
        print_r(json_encode($data));
    }

    public function elegir_reserva_paquetes() {
        
        $idhotel=$this->input->get_post('idhotel',true);
        $idmoneda=$this->input->get_post('idmoneda',true);
        $idpaquete=$this->input->get_post('idpaquete',true);
        $idhabitacion=$this->input->get_post('idhabitacion',true);
        $data["info"]=$this->Paquetes_models->consultar($idpaquete);
        $data['inf_costo']=$this->Tours_models->costo_tours($idpaquete); 
        $data['inf_habitacion']=$this->Hoteles_models->imagen_hoteles_sel($idpaquete,$idhotel,$idhabitacion);
        print_r(json_encode($data));
    }
    
    public function listado_tours($distrito) {
        
        $moneda='';
        $data['moneda']='';
        $data['distrito']=$distrito;
        $data['monedas']=$this->Monedas_models->listado();
        $data['destinos']=$this->Tours_models->tours_destino();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['tematicas']=$this->Tours_models->tours_tematicas($distrito);
        $data['cantidad_paquetes']=$this->Paquetes_models->paquetes_cantidad();
        $data['tours']=$this->visualizacion_tours('',$distrito,'',$moneda,'200','0','small/');
        $imagen=$data['tours'][0]->imagen;
        
        if($distrito!='Seleccionar' && $distrito!='listado') {
            $data['imagen_tours']=$imagen;
            $data['titulo_tours_1']=strtolower($distrito);
            $data['url']="tours/".strtolower($distrito)."/";
            $data['titulo_tours']=ucfirst(strtolower($distrito));
            $data['titulo']='Tours - '.ucfirst(strtolower($distrito));
        } else {
            $data['url']="tours/listado/";
            $data['titulo_tours_1']='listado';
            $data['titulo_tours']='Tours';
            $data['imagen_tours']='tours.jpg';
            $data['titulo']='Tours - Listado disponibles';
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_listado_tours_css');
        $this->load->view('front-end/inicio/view_listado_tours',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_listado_tours_js');
    }

    public function listado_tours_moneda($distrito,$moneda) {
        
        $data['moneda']=$moneda;
        $data['distrito']=$distrito;
        $data['monedas']=$this->Monedas_models->listado();
        $data['destinos']=$this->Tours_models->tours_destino();
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['tematicas']=$this->Tours_models->tours_tematicas($distrito);
        $data['cantidad_paquetes']=$this->Paquetes_models->paquetes_cantidad();
        $data['tours']=$this->visualizacion_tours('',$distrito,'',$moneda,'200','1','small/');
        $imagen=$data['tours'][0]->imagen;
        
        if($distrito!='Seleccionar' && $distrito!='listado') {
            $data['imagen_tours']=$imagen;
            $data['titulo_tours_1']=strtolower($distrito);
            $data['url']="tours/".strtolower($distrito)."/";
            $data['titulo_tours']=ucfirst(strtolower($distrito));
            $data['titulo']='Tours - '.ucfirst(strtolower($distrito));
        } else {
            $data['url']="tours/listado/";
            $data['titulo_tours_1']='listado';
            $data['titulo_tours']='Tours';
            $data['imagen_tours']='tours.jpg';
            $data['titulo']='Tours - Listado disponibles';
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_listado_tours_css');
        $this->load->view('front-end/inicio/view_listado_tours',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_listado_tours_js');
    }

    public function listado_tours_filtros() {
        
        $tipo=$this->input->get_post('tipo',true);
        $orden=$this->input->get_post('orden',true);
        $precio=$this->input->get_post('precio',true);
        $moneda=$this->input->get_post('monedas',true);
        $tematica=$this->input->get_post('tematica',true);
        $distrito=$this->input->get_post('distrito',true);
        
        if($tipo=='tours') {
            $data['precios']=$this->Tours_models->tours_precios($distrito);
            $data['imagenbanner']=base_url()."public/front-end/img/mask-b.png";
            
            $data['tours']=$this->Tours_models->filtros_tours($distrito,$orden,$tematica,'');
            if($data['tours']) {
                foreach($data['tours'] as $tours) {
                    $nombre=str_replace(" ","-",$tours->nombre);
                    $tours->imagen=$this->Tours_models->imagen_tours($tours->id);
                    $tours->urlimg=base_url()."public/img/tours/small/".$tours->imagen;
                    $tours->descripcion=substr(ucfirst($tours->descripcion),0,220);
                    $imagen=$tours->imagen=$this->Tours_models->imagen_tours($tours->id);
                    $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/");
                    if(!empty($moneda)) {
                        $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/".$moneda);
                    }
                    
                    if(strlen($tours->descripcion) <= 200){
                        $tours->puntos='';
                    } else {
                        $tours->puntos='...';
                    }

                    if($moneda=='') {
                        $tours->precio=round(ceil($tours->precio_minimo),2);
                    } else {
                        $tours->precio=round(ceil($tours->precio_minimo / $tours->tipo_cambio),2); 
                    }
                }
            }
            
            if($distrito!='Seleccionar' && $distrito!='listado') {
                $data['titulo_tours_1']=strtolower($distrito);
                $data['titulo']='Tours - '.ucfirst(strtolower($distrito));
                if($data['tours']) {
                    $data['imagen_filto']=$imagen;
                    $data['titulo_filtro']=ucfirst(strtolower($distrito));
                } else {
                    $data['imagen_filtro']='tours.jpg';
                    $data['titulo_filtro']=ucfirst(strtolower($distrito));
                }
            } else {
                $data['titulo_tours_1']='listado';
                $data['imagen_filtro']='tours.jpg';
                $data['titulo_filtro']='tours';
                $data['titulo']='Tours - Listado disponibles';
            }
            print_r(json_encode($data));
        }          
    }

    public function listado_paquetes($distrito) {
       
        $moneda='';
        $data['moneda']='';
        $data['distrito']=$distrito;
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['destinos']=$this->Paquetes_models->paquetes_destino();
        $data['cantidad_tours']=$this->Tours_models->tours_cantidad();
        $data['paquetes']=$this->visualizacion_paquetes('',$distrito,'',$moneda,'200','0','small/');
        $imagen=$data['paquetes'][0]->imagen;
       
        if($distrito!='Seleccionar' && $distrito!='listado') {
            $data['imagen_tours']=$imagen;
            $data['titulo_tours_1']=strtolower($distrito);
            $data['url']="paquetes/".strtolower($distrito)."/";
            $data['titulo']='Paquetes - '.ucfirst(strtolower($distrito));
            $data['titulo_tours']=ucfirst(strtolower($distrito));
        } else {
            $data['titulo_tours_1']='listado';
            $data['url']="paquetes/listado/";
            $data['titulo_tours']='Paquetes';
            $data['imagen_tours']='tours.jpg';
            $data['titulo']='Paquetes - Listado disponibles';
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_listado_tours_css');
        $this->load->view('front-end/inicio/view_listado_paquetes',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_listado_tours_js');
    }

    public function listado_paquetes_moneda($distrito,$moneda) {
        
        $data['moneda']=$moneda;
        $data['distrito']=$distrito;
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['destinos']=$this->Paquetes_models->paquetes_destino();
        $data['cantidad_tours']=$this->Tours_models->tours_cantidad();
        $data['paquetes']=$this->visualizacion_paquetes('',$distrito,'',$moneda,'200','1','small/');
        $imagen=$data['paquetes'][0]->imagen;
       
        if($distrito!='Seleccionar' && $distrito!='listado') {
            $data['imagen_tours']=$imagen;
            $data['titulo_tours_1']=strtolower($distrito);
            $data['url']="paquetes/".strtolower($distrito)."/";
            $data['titulo']='Paquetes - '.ucfirst(strtolower($distrito));
            $data['titulo_tours']=ucfirst(strtolower($distrito));
        } else {
            $data['titulo_tours_1']='listado';
            $data['url']="paquetes/listado/";
            $data['titulo_tours']='Paquetes';
            $data['imagen_tours']='tours.jpg';
            $data['titulo']='Paquetes - Listado disponibles';
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_listado_tours_css');
        $this->load->view('front-end/inicio/view_listado_paquetes',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_listado_tours_js');
    }

    public function listado_paquetes_filtros() {
        
        $tipo=$this->input->get_post('tipo',true);
        $orden=$this->input->get_post('orden',true);
        $precio=$this->input->get_post('precio',true);
        $moneda=$this->input->get_post('monedas',true);
        $distrito=$this->input->get_post('distrito',true);
        
        if($tipo=='paquetes') {
            $data['titulo']='Paquetes';
            $data['destinos']=$this->Paquetes_models->paquetes_destino();
            $data['imagenbanner']=base_url()."public/front-end/img/mask-b.png";
            
            $data['paquetes']=$this->Paquetes_models->filtros_paquetes($distrito,'','');
            if($data['paquetes']) {
                foreach($data['paquetes'] as $paquetes) {
                    $nombre=str_replace(" ","-",$paquetes->nombre);
                    
                    $paquetes->inf_costo=$this->Tours_models->costo_tours($paquetes->id);
                    $paquetes->descripcion=substr(ucfirst($paquetes->descripcion),0,220);
                    $paquetes->inf_habitacion=$this->Hoteles_models->imagen_hoteles($paquetes->id);
                    $imagen=$paquetes->imagen=$this->Tours_models->imagen_tours($paquetes->id_tours_basico);
                    $paquetes->urlimg=base_url()."public/img/tours/small/".$paquetes->imagen;
                    $paquetes->duracion=$paquetes->cantidad_dias.' días '.($paquetes->cantidad_dias - 1).' noches';
                    $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/");
                    if(!empty($moneda)) {
                        $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/".$moneda);
                    }
                    
                    if(strlen($paquetes->descripcion) <= 200){
                        $paquetes->puntos='';
                    } else {
                        $paquetes->puntos='...';
                    }

                    if(!empty($paquetes->inf_habitacion->precio_minimo) && !empty($paquetes->cantidad_dias)) {
                        $dias=(($paquetes->cantidad_dias) - 1);
                        if($dias > 0) {
                            $total_hotel=(($paquetes->inf_habitacion->precio_minimo) * $dias);
                        } else {
                            $total_hotel=$paquetes->inf_habitacion->precio_minimo;
                        }    
                    }
    
                    if($moneda=='') {
                        $paquetes->precio=round(ceil($paquetes->inf_costo['total_soles'] + $total_hotel),2);
                    } else {
                        $paquetes->precio=round(ceil((($paquetes->inf_costo['total_soles'] + $total_hotel) / $paquetes->inf_costo['tipo_cambio'])),2);
                    }
                }    
            }
            
            if($distrito!='Seleccionar' && $distrito!='listado') {
                $data['titulo_tours_1']=strtolower($distrito);
                if($data['paquetes']) {
                    $data['imagen_tours']=$imagen;    
                    $data['imagen_filtro']=$imagen;
                    $data['titulo_filtro']=ucfirst(strtolower($distrito));
                } else {
                    $data['imagen_tours']='tours.jpg';
                    $data['imagen_filtro']='tours.jpg';
                    $data['titulo_filtro']=ucfirst(strtolower($distrito));
                }
            } else {
                $data['titulo_tours_1']='listado';
                $data['imagen_filtro']='tours.jpg';
                $data['imagen_tours']='tours.jpg'; 
                $data['titulo_filtro']='paquetes';
            }
            print_r(json_encode($data));
        }          
    }

    public function carrito($tipo) {

        $data['moneda']='';
        $data['url']="reserva/carrito/";
        $data['imagen_tours']='tours.jpg'; 
        $data['monedas']=$this->Monedas_models->listado();
        $data["listado_paises"]=$this->Paises_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['titulo']='Resumen de la reserva a realizar en Aventuras';
        $data['listado_compra']=$this->session->userdata('listado_compra');
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_carrito_css');
        $this->load->view('front-end/inicio/view_reserva',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_carrito_js');
    }

    public function carrito_moneda($tipo,$moneda) {

        $data['moneda']=$moneda;
        $data['url']="reserva/carrito/";
        $data['imagen_tours']='tours.jpg'; 
        $data['monedas']=$this->Monedas_models->listado();
        $data["listado_paises"]=$this->Paises_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['titulo']='Resumen de la reserva a realizar en Aventuras';
        $data['listado_compra']=$this->session->userdata('listado_compra');
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_carrito_css');
        $this->load->view('front-end/inicio/view_reserva',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_carrito_js');
    }

    public function dpersonales($tipo) {

        $data['moneda']='';
        $data['url']="cliente/".$tipo.'/';
        $data['imagen_tours']='tours.jpg'; 
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['titulo']='Introduce tus datos para hacer la reserva - Aventuras';
       
        $data['datos_personales']='';
        if($this->session->userdata('datos_personales')!='') {
            $data['datos_personales']=$this->session->userdata('datos_personales');
        }
      
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_datos_css');
        if($data['datos_personales']=='') {
            $this->load->view('front-end/inicio/view_datos_comprador',$data);
        } else {
            $this->load->view('front-end/inicio/view_datos_comprador_si',$data);
        }
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_datos_js');
    }

    public function dpersonales_moneda($tipo,$moneda) {

        $data['moneda']=$moneda;
        $data['imagen_tours']='tours.jpg'; 
        $data['url']="cliente/".$tipo.'/';
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['titulo']='Introduce tus datos para hacer la reserva - Aventuras';
       
        $data['datos_personales']='';
        if($this->session->userdata('datos_personales')!='') {
            $data['datos_personales']=$this->session->userdata('datos_personales');
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/common/lib_datos_css');
        if($data['datos_personales']=='') {
            $this->load->view('front-end/inicio/view_datos_comprador',$data);
        } else {
            $this->load->view('front-end/inicio/view_datos_comprador_si',$data);
        }
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_datos_js');
    }

    public function rpago($tipo) {

        require_once "./application/libraries/mercadopago/sdk/lib/mercadopago.php";
        
        $data['moneda']='';
        $data['url']="pago/".$tipo.'/';
        $data['imagen_tours']='tours.jpg'; 
        $data['titulo']='Realizar pago - Aventuras';
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['datos_personales']=$this->session->userdata('datos_personales');
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/inicio/view_realizar_pago',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_pago_js');
    }

    public function rpago_moneda($tipo,$moneda) {

        require_once "./application/libraries/mercadopago/sdk/lib/mercadopago.php";
        
        $data['url']="pago/".$tipo.'/';
        $data['moneda']=$moneda;
        $data['imagen_tours']='tours.jpg'; 
        $data['titulo']='Realizar pago - Aventuras';
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['datos_personales']=$this->session->userdata('datos_personales');
    
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/inicio/view_realizar_pago',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_pago_js');
    }

    public function pexitoso($tipo1,$tipo2) {

        $data['moneda']='';
        $data['imagen_tours']='tours.jpg'; 
        $data['url']="tramite/".$tipo1."/".$tipo2."/";
        $data['monedas']=$this->Monedas_models->listado();
        $data['monedaI']=$this->Monedas_models->consultar('pen');
        $listado_compra=$this->session->userdata('listado_compra');
        $data['titulo']='Su pago se procesó exitosamente  - Aventuras';
        $data['datos_personales']=$this->session->userdata('datos_personales');
        
       if(!empty($this->session->userdata('datos_personales')) && !empty($this->session->userdata('listado_compra'))) {
            $tipo=$this->session->userdata('datos_personales')[0]['textipodocres'];
            $id=$this->session->userdata('datos_personales')[0]['textdocumentores'];
            if($this->session->userdata('listado_compra')!='') {
                $valido=$this->Ventas_models->registrar($id,$tipo,$this->session->userdata('datos_personales'),$this->session->userdata('listado_compra'));
            }
            
            if($valido > 0) {
                $configuracion=$this->Email_compra_models->configuracion();
                if(!empty($configuracion)) {
                    $resultado=$this->Email_compra_models->email_pago($listado_compra,$data['datos_personales'],$data['monedaI'],$configuracion,$valido);
                    if($resultado==true) {
                        $this->session->listado_compra='';
                    }
                }
            }   
        }
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/inicio/view_pago_exitoso',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_pexitoso_js');
    }

    public function completando_reserva() {
    
        $arrayServicio=$this->input->get_post('arrayServicio',true);
        $arrayDatosPersonales=$this->input->get_post('arrayDatosPersonales',true);
        $this->session->listado_compra=$arrayServicio;
        $this->session->datos_personales=$arrayDatosPersonales;
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['datos_personales']=$this->session->userdata('datos_personales');
        print_r(json_encode($data));
    }

    public function gestion_carrito() {

        $arrayServicio=$this->input->get_post('arrayServicio',true);
        $this->session->listado_compra=$arrayServicio;
        $data['moneda']=$this->input->get_post('moneda',true);
        if(empty($data['moneda'])) {
            $moneda='pen'; 
        } else {
            $moneda=$data['moneda'];
        }
        $data['monedaI']=$this->Monedas_models->consultar($moneda);
        $data['listado_compra']=$this->session->userdata('listado_compra');   
        print_r(json_encode($data)); 
    }

    public function listado_compra() {
       
        $arrayServicio=$this->input->get_post('arrayServicio',true);
        if($this->session->userdata('listado_compra')=='') {
            $this->session->listado_compra=$arrayServicio;
        } else {
            $this->session->listado_compra=array_merge($this->session->userdata('listado_compra'),$arrayServicio);
        }
        $data['listado_compra']=$this->session->userdata('listado_compra');
        print_r(json_encode($data)); 
    }


    public function suscripcion() {
        
        $email=$this->input->get_post('email',true);
        $data=$this->Inicio_frontEnd_models->suscripcion($email);
        print_r(json_encode($data));
    }

    public function listado_servicios() {

        $data['destinos']=$this->Tours_models->tours_destino();
        $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos('100','listado','');
        $data['tours']=$this->Tours_models->tours_mas_vistos('100','listado','');
        //$data['tematicas']=$this->Tematicas_models->listado_tematicas();
        print_r(json_encode($data));exit();
    }
    
    function hoja_reclamacion($tipo) {
        
        $moneda='pen';
        $data['moneda']='';
        $data['url']='hoja/'.$tipo.'/';
        $data['imagen_tours']='tours.jpg'; 
        $data['titulo']="Libro de reclamación";
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/inicio/view_raclamacion',$data);
        $this->load->view('front-end/common/lib_js',$data);
        $this->load->view('front-end/common/lib_reclamacion_js');
    }

    function registrar_reclamacion() {

        $dni=$this->input->get_post('dni',true);
        $email=$this->input->get_post('email',true);
        $nombre=$this->input->get_post('nombre',true);
        $numero=$this->input->get_post('numero',true);
        $servicio=$this->input->get_post('servicio',true);
        $problema=$this->input->get_post('problema',true);
        $solucion=$this->input->get_post('solucion',true);
        $direccion=$this->input->get_post('direccion',true);
        $actividad=$this->input->get_post('actividad',true);
        
        $numero_reclamo=$this->Inicio_frontEnd_models->registrar_reclamacion($dni,$nombre,$email,$numero,$problema,$solucion,$direccion,$actividad,$servicio);
        if($numero_reclamo > 0) {
            $configuracion=$this->Email_compra_models->configuracion();
            if(!empty($configuracion)) {
                $resultado=$this->Email_compra_models->email_reclamacion($dni,$nombre,$email,$numero,$problema,$solucion,$direccion,$actividad,$servicio,$numero_reclamo,$configuracion);                   
            }
            
            $data['resultado']='999';
            $data['email']=base64_encode($email);
            $data['nombre']=base64_encode($nombre);
        }    
        print_r(json_encode($data));
    }

    public function rexitoso($nombre,$email) {

        $moneda='pen';
        $data['moneda']='';
        $data['url']="rexitoso/";
        $data['imagen_tours']='tours.jpg'; 
        $data['email']=base64_decode($email);
        $data['nombre']=base64_decode($nombre);
        $data['titulo']='Su reclamo se procesó exitosamente  - Aventuras';
        
        //Cargamos archivos de vista   
        $this->load->view('front-end/common/lib_css',$data);
        $this->load->view('front-end/inicio/view_reclamo_exitoso',$data);
        $this->load->view('front-end/common/lib_js',$data);
    }

    function validar_cupon() {

        $id=$this->input->get_post('textcoupon',true);
        $data['listado_compra']=$this->session->userdata('listado_compra');
        $data['datos_personales']=$this->session->userdata('datos_personales');
        $validar_comprador=$this->Ventas_models->validar($id,$data['datos_personales'][0]['textipodocres'],$data['datos_personales'][0]['textdocumentores']);
        if($validar_comprador=='0') {
            $data['cupon']=$this->Cupon_models->validar($id);
            $this->session->cupon_compra=$data['cupon'];
            print_r(json_encode($data));
        } else {
           return false;
        }
    }

    public function visualizacion_tours($cantidad,$distrito,$id,$moneda,$dilimitar,$activo,$carpeta_base) {

        $data['tours']=$this->Tours_models->tours_mas_vistos($cantidad,$distrito,$id);
        if($data['tours']) {
            foreach($data['tours'] as $tours) {
                $nombre=str_replace(" ","-",$tours->nombre);
                $tours->imagen=$this->Tours_models->imagen_tours($tours->id);
                $tours->urlimg=base_url()."public/img/tours/".$carpeta_base."".$tours->imagen;
                $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/");
                $tours->aumento_programado=$this->Ofertas_models->consultar_oferta_mayor($tours->id,1);
                $tours->descuento_programado=$this->Ofertas_models->consultar_oferta_mayor($tours->id,3);
                if(strlen($tours->descripcion) <= $dilimitar) { $tours->puntos=''; } else { $tours->puntos='...'; }
                if($activo > 0) { $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/".$moneda); }

                // Verifico el aumento
                    if($tours->aumento_programado) {
                        if($tours->precio_minimo >= $tours->aumento_programado->monto_min && $tours->aumento_programado->min_persona=='0') {
                            if($tours->aumento_programado->regla_monto_oferta==1) {  //Porcentaje
                                $aumento=(($tours->precio_minimo * $tours->aumento_programado->monto_oferta) / 100);
                                $tours->precio_minimo=($tours->precio_minimo + $aumento);
                            } else { //soles
                                $aumento=$tours->aumento_programado->monto_oferta;
                                $tours->precio_minimo=($tours->precio_minimo + $aumento);
                            }
                        } 
                    } 
                // Fin 

                // Verifico el descuento
                    $oferta_descuento=0;
                    $tours->descuento=0;
                    if($tours->descuento_programado) {
                        if($tours->precio_minimo >= $tours->descuento_programado->monto_min && $tours->descuento_programado->min_persona=='0') {
                            if($tours->descuento_programado->regla_monto_oferta==1) {  //Porcentaje
                                $descuento=(($tours->precio_minimo * $tours->descuento_programado->monto_oferta) / 100);
                                $oferta_descuento=($tours->precio_minimo - $descuento);
                            } else { //soles
                                $descuento=$tours->descuento_programado->monto_oferta;
                                $oferta_descuento=($tours->precio_minimo - $descuento);
                            }
                        }
                    }  
                // Fin      

                if($moneda=='') {
                    if($oferta_descuento > 0) {
                        $tours->descuento=round(ceil($oferta_descuento),2);
                    }
                    $tours->precio=round(ceil($tours->precio_minimo),2);
                } else {
                    if($oferta_descuento > 0) {
                        $tours->descuento=round(ceil($oferta_descuento / $tours->tipo_cambio),2);
                    }
                    $tours->precio=round(ceil($tours->precio_minimo / $tours->tipo_cambio),2); 
                }    
            }
        }
        return $data['tours'];
    }

    public function visualizacion_paquetes($cantidad,$distrito,$id,$moneda,$dilimitar,$activo,$carpeta_base) {

        $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos($cantidad,$distrito,$id);
        if($data['paquetes']) {
            foreach($data['paquetes'] as $paquetes) {
                $nombre=str_replace(" ","-",$paquetes->nombre);
                $paquetes->inf_costo=$this->Tours_models->costo_tours($paquetes->id);
                $paquetes->inf_habitacion=$this->Hoteles_models->imagen_hoteles($paquetes->id);
                $paquetes->imagen=$this->Tours_models->imagen_tours($paquetes->id_tours_basico);
                $paquetes->urlimg=base_url()."public/img/tours/".$carpeta_base."".$paquetes->imagen;
                $paquetes->aumento_programado=$this->Ofertas_models->consultar_oferta_mayor($paquetes->id,1);
                $paquetes->descuento_programado=$this->Ofertas_models->consultar_oferta_mayor($paquetes->id,3);
                $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/");
                if($activo > 0) { 
                    $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/".$moneda);
                }
                $paquetes->duracion=$paquetes->cantidad_dias.' días '.($paquetes->cantidad_dias - 1).' noches';
                
                if(strlen($paquetes->descripcion) <= $dilimitar){
                    $paquetes->puntos='';
                } else {
                    $paquetes->puntos='...';
                }

                if(!empty($paquetes->inf_habitacion->precio_minimo) && !empty($paquetes->cantidad_dias)) {
                    $dias=(($paquetes->cantidad_dias) - 1);
                    if($dias > 0) {
                        $total_hotel=(($paquetes->inf_habitacion->precio_minimo) * $dias);
                    } else {
                        $total_hotel=$paquetes->inf_habitacion->precio_minimo;
                    }
                }
                
                // Verifico el aumento
                    $precio=($paquetes->inf_costo['total_soles'] + $total_hotel);
                    /*if($paquetes->aumento_programado) {
                        if($precio >= $paquetes->aumento_programado->monto_min && $paquetes->aumento_programado->min_persona=='0') {
                            if($paquetes->aumento_programado->regla_monto_oferta==1) {  //Porcentaje
                                $aumento=(($precio * $paquetes->aumento_programado->monto_oferta) / 100);
                                $precio=($precio + $aumento);
                            } else { //soles
                                $aumento=$paquetes->aumento_programado->monto_oferta;
                                $precio=($precio + $aumento);
                            }
                        } 
                    }*/
                // Fin

                

                // Verifico el descuento
                    $oferta_descuento=0;
                    $paquetes->descuento=0;
                    if($paquetes->descuento_programado) {
                        if($precio >= $paquetes->descuento_programado->monto_min && $paquetes->descuento_programado->min_persona=='0') {
                            if($paquetes->descuento_programado->regla_monto_oferta==1) {  //Porcentaje
                                $descuento=(($precio * $paquetes->descuento_programado->monto_oferta) / 100);
                                $oferta_descuento=($precio - $descuento);
                            } else { //soles
                                $descuento=$paquetes->descuento_programado->monto_oferta;
                                $oferta_descuento=($precio - $descuento);
                            }
                        }
                    }  
                // Fin

                if($moneda=='') {
                    if($oferta_descuento > 0) {
                        $paquetes->descuento=round(ceil($oferta_descuento),2);
                    }
                    $paquetes->precio=round(ceil($paquetes->inf_costo['total_soles'] + $total_hotel),2);
                } else {
                    if($oferta_descuento > 0) {
                        $paquetes->descuento=round(ceil($oferta_descuento / $tours->tipo_cambio),2);
                    }
                    $paquetes->precio=round(ceil((($paquetes->inf_costo['total_soles'] + $total_hotel) / $paquetes->inf_costo['tipo_cambio'])),2);
                }         
            }    
        }
        return $data['paquetes'];
    }

    public function visualizacion_tours_detalle($cantidad,$distrito,$id,$moneda,$activo,$carpeta_base) {

        $data['tours']=$this->Tours_models->tours_mas_vistos($cantidad,$distrito,$id);
        if($data['tours']) {
            foreach($data['tours'] as $tours) {
                $nombre=str_replace(" ","-",$tours->nombre);
                $tours->imagen=$this->Tours_models->imagen_tours($tours->id);
                $tours->urlimg=base_url()."public/img/tours/".$carpeta_base."".$tours->imagen;
                $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/");
                if($activo > 0) {
                    $tours->url=site_url("tour/".strtolower($tours->distrito)."/".strtolower($nombre)."/".$moneda);
                }
                
                if(strlen($tours->descripcion) <= 140){
                    $tours->puntos='';
                } else {
                    $tours->puntos='...';
                }

                if($moneda=='') {
                    $tours->precio=round(ceil($tours->precio_minimo),2);
                } else {
                    $tours->precio=round(ceil($tours->precio_minimo / $tours->tipo_cambio),2); 
                }
            }
        } 
        return $data['tours'];
    }

    public function visualizacion_paquetes_detalle($cantidad,$distrito,$id,$moneda,$activo,$carpeta_base) {

        $data['paquetes']=$this->Paquetes_models->paquetes_mas_vistos($cantidad,$distrito,$id);
        if($data['paquetes']) {
            foreach($data['paquetes'] as $paquetes) {
                $nombre=str_replace(" ","-",$paquetes->nombre);
                $paquetes->inf_costo=$this->Tours_models->costo_tours($paquetes->id);
                $paquetes->inf_habitacion=$this->Hoteles_models->imagen_hoteles($paquetes->id);
                $paquetes->imagen=$this->Tours_models->imagen_tours($paquetes->id_tours_basico);
                $paquetes->urlimg=base_url()."public/img/tours/".$carpeta_base."".$paquetes->imagen;
                $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/");
                if($activo > 0) {
                    $paquetes->url=site_url("paquete/".strtolower($paquetes->distrito)."/".strtolower($nombre)."/".$moneda);
                }
                
                if(strlen($paquetes->descripcion) <= 140){
                    $paquetes->puntos='';
                } else {
                    $paquetes->puntos='...';
                }

                if(!empty($paquetes->inf_habitacion->precio_minimo) && !empty($paquetes->cantidad_dias)) {
                    $dias=(($paquetes->cantidad_dias) - 1);
                    if($dias > 0) {
                        $total_hotel=(($paquetes->inf_habitacion->precio_minimo) * $dias);
                    } else {
                        $total_hotel=$paquetes->inf_habitacion->precio_minimo;
                    }    
                }

                if($moneda=='') {
                    $paquetes->precio=round(ceil($paquetes->inf_costo['total_soles'] + $total_hotel),2);
                } else {
                    $paquetes->precio=round(ceil((($paquetes->inf_costo['total_soles'] + $total_hotel) / $paquetes->inf_costo['tipo_cambio'])),2);
                }
            }    
        }
        return $data['paquetes'];
    }
}
