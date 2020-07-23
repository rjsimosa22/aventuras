<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Tematicas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Tematicas_models');
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
                    
            $data["listado"]=$this->Tematicas_models->listado();
                    
            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('tematica/view_listado',$data);
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_Tematica_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function consultar() {

        $id=$this->input->get_post('id');
        $data=$this->Tematicas_models->consultar($id);
        print_r(json_encode($data));
    }

    public function registrar() {
        
        $nombre=$this->input->get_post('nombre',true);
        $descripcion=$this->input->get_post('descripcion',true);
        
        if(isset($nombre)) {
            $bd_Tematicas=array(
                'status'=>'1',
                'nombre'=>$nombre,
                'descripcion'=>$descripcion,                
                'fecha_registro'=>date('Y-m-d H:i:s'),
            );
            
            $comprobar=$this->Tematicas_models->registrar($bd_Tematicas);
            
            if($comprobar==true) {
                $this->session->set_flashdata('regsi','La temática <b>'.strtoupper($bd_Tematicas["nombre"]).'</b> se ha registrado correctamente.');
                redirect('crud/tematicas/');
            } else {
                $this->session->set_flashdata('regno','temática <b>'.strtoupper($bd_Tematicas["nombre"]).'</b> existente, haz algunos cambios antes de volver a enviar el formulario.');
                redirect('crud/tematicas/');
            }     
        } 
    }

    public function editar() {
        
        $id=$this->input->get_post('id',true);
        $nombre=$this->input->get_post('nombre',true);
        $descripcion=$this->input->get_post('descripcion',true);
        
        if(isset($id,$nombre)) {    
            $bd_Tematicas=array(
                'nombre'=>$nombre,
                'descripcion'=>$descripcion
            );

            $comprobar=$this->Tematicas_models->editar($id,$bd_Tematicas);
            
            if($comprobar==true) {
                $this->session->set_flashdata('modsi','La temática <b>'.strtoupper($bd_Tematicas["nombre"]).'</b> se modificado correctamente.');
                redirect('crud/tematicas/');
            } else {
                $this->session->set_flashdata('modno','temática <b>'.strtoupper($bd_Tematicas["nombre"]).'</b> no se ha podido modificar.');
                redirect('crud/tematicas/');
            }
        } 
    }
    
    function activar() {
        
        $id=base64_decode($this->input->get_post('id', true));
        
        if(isset($id)) {
            $comprobar=$this->Tematicas_models->activar($id);
            $data["row"]=$this->Tematicas_models->consultar($id);
            
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','La temática <b>'.strtoupper($data["row"]->nombre).'</b> se activo correctamente.');
                redirect('crud/tematicas/');
            } else {
                $this->session->set_flashdata('incsi','Temática <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('crud/tematicas/');
            }
        }
    }
    
    function inactivar() {
        
        $id=base64_decode($this->input->get_post('id', true));
        
        if(isset($id)) {
            $comprobar=$this->Tematicas_models->inactivar($id);
            $data["row"]=$this->Tematicas_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','La temática <b>'.strtoupper($data["row"]->nombre).'</b> se inactivo correctamente.');
                redirect('crud/tematicas/');
            } else {
                $this->session->set_flashdata('incsi','Temática <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('crud/tematicas/');
            }
        }
    }
}