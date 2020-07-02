<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Monedas_models');
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
                    
            $data["listado"]=$this->Monedas_models->listado();
                    
            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('moneda/view_listado',$data);
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_moneda_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function consultar() {

        $id=$this->input->get_post('id');
        $data=$this->Monedas_models->consultar($id);
        print_r(json_encode($data));
    }

    public function registrar() {
        
        $nombre=$this->input->get_post('nombre',true);
        $cambio=$this->input->get_post('cambio',true);
        $simbolo=$this->input->get_post('simbolo',true);
        $descripcion=$this->input->get_post('descripcion',true);
        
        if(isset($nombre,$simbolo)) {
            $bd_monedas=array(
                'status'=>'1',
                'nombre'=>$nombre,
                'simbolo'=>$simbolo,
                'tipo_cambio'=>$cambio,
                'descripcion'=>$descripcion,                
                'fecha_registro'=>date('Y-m-d H:i:s'),
            );
            
            $comprobar=$this->Monedas_models->registrar($bd_monedas);
            
            if($comprobar==true) {
                $this->session->set_flashdata('regsi','El tipo de moneda <b>'.strtoupper($bd_monedas["nombre"]).'</b> se ha registrado correctamente.');
                redirect('crud/monedas');
            } else {
                $this->session->set_flashdata('regno','El tipo de moneda <b>'.strtoupper($bd_monedas["nombre"]).'</b> existente, haz algunos cambios antes de volver a enviar el formulario.');
                redirect('crud/monedas');
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
                redirect('crud/monedas');
            } else {
                $this->session->set_flashdata('modno','El tipo de moneda <b>'.strtoupper($bd_monedas["nombre"]).'</b> no se ha podido modificar.');
                redirect('crud/monedas');
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