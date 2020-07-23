<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Ofertas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Tours_models');
        $this->load->model('Paquetes_models');
        $this->load->model('Ofertas_models');
        $this->load->model('Tipo_oferta_models');
        $this->load->helper(array('url','form','text'));
    }
    
    public function index() {
        
        if($this->session->userdata('acceso')==true) {
            $data=array (
                /**
                * Solo se muestran los datos de session a utilizar en caso de necesitar algun
                * dato de session adicional verificar las variables en el modelo: Login_model, function logindata
                */
                'id'=>$this->session->userdata('id'),
                'rol'=>$this->session->userdata('rol'),
                'status'=>$this->session->userdata('status'),
                'cedula'=>$this->session->userdata('cedula'),
                'nomape'=>$this->session->userdata('nomape'),
            );
                    
            $data["listado"]=$this->Ofertas_models->listado();
            $data["tipo_descuentos"]=$this->Tipo_oferta_models->listado();
            $data["listado_destino"]=$this->Tours_models->tours_destino();

            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('common/lib_oferta_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('oferta/view_listado',$data);
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_oferta_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    
    function array_multi_subsort($array, $subkey) {
        $b=array(); $c = array();
        foreach ($array as $k => $v) {
            $b[$k]=strtolower($v->$subkey);
        }
        asort($b);
        foreach ($b as $key => $val) {
            $c[]=$array[$key];
        }
        return $c;
    }

    
    public function listado_destino() {
        $id=$this->input->get_post('id',true);
        $sel=$this->input->get_post('sel',true);
        if($sel==0) {
            $data["listado_destino"]=$this->Tours_models->tours_destino();
            $listado_paquetes=$this->Paquetes_models->filtros_paquetes('all','','');   
            $listado_tours=$this->Tours_models->filtros_tours('listado','all','',''); 
            $listado_servicio= array_merge($listado_tours,$listado_paquetes); 
            $data["listado_servicio"]= $this->array_multi_subsort($listado_servicio, 'nombre');  
        } else {
            if($id > 0) {
                $id=$id;
                $id1=$id;
            } else {
                $id='listado';
                $id1='all';
            }
            $listado_tours=$this->Tours_models->filtros_tours($id,'all','',''); 
            $listado_paquetes=$this->Paquetes_models->filtros_paquetes($id1,'','');   
            $listado_servicio= array_merge($listado_tours,$listado_paquetes); 
            $data["listado_servicio"]= $this->array_multi_subsort($listado_servicio, 'nombre'); 
        }
        print_r(json_encode($data));
    }

    public function consultar() {

        $id=$this->input->get_post('id');
        $data=$this->Monedas_models->consultar_listado($id);
        print_r(json_encode($data));
    }

    public function registrar() {
        
        $nombre=$this->input->get_post('nombre',true);
        $monto_min=$this->input->get_post('monto',true);
        $persona=$this->input->get_post('persona',true);
        $id_oferta=$this->input->get_post('id_oferta',true);
        $id_aplica=$this->input->get_post('id_aplica',true);
        $id_destino=$this->input->get_post('id_destino',true);
        $descripcion=$this->input->get_post('descripcion',true);
        $regla_monto=$this->input->get_post('regla_monto',true);
        $number_multiple=$this->input->get_post('number_multiple',true);
        $daterangepicker=$this->input->get_post('daterangepicker3',true);
        $monto_porcentaje=$this->input->get_post('monto_porcentaje',true);
        $fecha=explode(" / ",$daterangepicker);
        $fecha_ini=date("Y-m-d", strtotime($fecha[0]));
        $fecha_fin=date("Y-m-d", strtotime($fecha[1]));
        if(isset($nombre,$daterangepicker)) {
            $bd_ofertas=array(
                'nombre'=>$nombre,
                'min_persona'=>$persona,
                'monto_min'=>$monto_min,
                'fecha_fin'=>$fecha_fin,
                'id_destino'=>$id_destino,
                'fecha_inicio'=>$fecha_ini,
                'descripcion'=>$descripcion,                
                'id_tipo_oferta'=>$id_oferta,
                'id_tipo_servicio'=>$id_aplica,
                'monto_oferta'=>$monto_porcentaje,
                'regla_monto_oferta'=>$regla_monto,
                'fecha_registro'=>date('Y-m-d H:i:s'),
            );
            $comprobar=$this->Ofertas_models->registrar($bd_ofertas,$number_multiple);
            
            if($comprobar==true) {
                $this->session->set_flashdata('regsi','La oferta <b>'.strtoupper($bd_ofertas["nombre"]).'</b> se ha registrado correctamente.');
                //redirect('crud/ofertas/');
                print_r(json_encode($comprobar));
            } else {
                $this->session->set_flashdata('regno','El tipo de oferta <b>'.strtoupper($bd_ofertas["nombre"]).'</b> existente, haz algunos cambios antes de volver a enviar el formulario.');
                //redirect('crud/ofertas/');
                print_r(json_encode($comprobar));
            }     
        } 
    }

    public function editar() {
        
        $id=$this->input->get_post('id',true);
        $cambio=$this->input->get_post('cambio',true);
        $nombre=$this->input->get_post('nombre',true);
        $simbolo=$this->input->get_post('simbolo',true);
        $descripcion=$this->input->get_post('descripcion',true);
        
        if(isset($id,$nombre,$simbolo,$cambio)) {    
            $bd_monedas=array(
                'nombre'=>$nombre,
                'simbolo'=>$simbolo,
                'tipo_cambio'=>$cambio,
                'descripcion'=>$descripcion
            );

            $comprobar=$this->Monedas_models->editar($id,$bd_monedas);
            
            if($comprobar==true) {
                $this->session->set_flashdata('modsi','El tipo de moneda <b>'.strtoupper($bd_monedas["nombre"]).'</b> se modificado correctamente.');
                redirect('crud/monedas/');
            } else {
                $this->session->set_flashdata('modno','El tipo de moneda <b>'.strtoupper($bd_monedas["nombre"]).'</b> no se ha podido modificar.');
                redirect('crud/monedas/');
            }
        } 
    }
    
    function activar() {
        
        $id=base64_decode($this->input->get_post('id', true));
        
        if(isset($id)) {
            $comprobar=$this->Monedas_models->activar($id);
            $data["row"]=$this->Monedas_models->consultar($id);
            
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El tipo de moneda <b>'.strtoupper($data["row"]->nombre).'</b> se activo correctamente.');
                redirect('crud/monedas/');
            } else {
                $this->session->set_flashdata('incsi','El tipo de moneda <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('crud/monedas/');
            }
        }
    }
    
    function inactivar() {
        
        $id=base64_decode($this->input->get_post('id', true));
        
        if(isset($id)) {
            $comprobar=$this->Monedas_models->inactivar($id);
            $data["row"]=$this->Monedas_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El tipo de moneda <b>'.strtoupper($data["row"]->nombre).'</b> se inactivo correctamente.');
                redirect('crud/monedas/');
            } else {
                $this->session->set_flashdata('incsi','El tipo de moneda <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('crud/monedas/');
            }
        }
    }
}