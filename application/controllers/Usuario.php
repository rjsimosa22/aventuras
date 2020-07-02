<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {    
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Usuario_models');
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

            $data["listado"] = $this->Usuario_models->listado();

            //Cargamos archivos de vista   
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('usuario/view_listado',$data);
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_usuario_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function consultar() {
        $id=$this->input->get_post('id');
        $data=$this->Usuario_models->consultar($id);
        print_r(json_encode($data));
    }
    
    public function registrar() {
        $dni=$this->input->get_post('dni',true);
        $rol=$this->input->get_post('rol',true);
        $nombre=$this->input->get_post('nombre',true);
        $clave1=$this->input->get_post('clave1',true);
        $apellido=$this->input->get_post('apellido',true);
        $telefono=$this->input->get_post('telefono',true);

        if(isset($dni)) {
            $bd_usuarios=array(
                'rol'=>$rol,
                'estatus'=>'1',
                'nombre'=>$nombre,
                'apellido'=>$apellido,
                'clave'=>md5($clave1),
                'identificacion'=>$dni,
                'telefono_movil'=>$telefono,
                'fecha_creacion'=>date('Y-m-d H:i:s')
            );
            
            $comprobar=$this->Usuario_models->registrar($bd_usuarios);
            $usuario["row"]=$this->Usuario_models->consultar($dni);
            if($comprobar==true) {
                $this->session->set_flashdata('regsi','El usuario <b>'.strtoupper($bd_usuarios["nombre"]." ".$bd_usuarios["apellido"]).'</b> se ha registrado correctamente.');
                redirect('usuario/index');
            } else {
                $this->session->set_flashdata('regno','Usuario existente con la cédula de identidad: <b>'.$usuario["row"]->identificacion.'</b> perteneciente Sr(a): <b>'.strtoupper($usuario["row"]->nombre." ".$usuario["row"]->apellido).'</b>, haz algunos cambios antes de volver a enviar el formulario.');
                redirect('usuario/index');
            }
        } 
    }
    
    public function listado() {
        
        if( $this->session->userdata('acceso') == true ) {
            
                    $usuario = array (
                        
                        /**
                        * Solo se muestran los datos de session a utilizar en caso de necesitar algun
                        * dato de session adicional verificar las variables en el modelo: Login_model, function logindata
                        */
                       'id' => $this->session->userdata('id'),
                        'rol' => $this->session->userdata('rol'),
                        'status' => $this->session->userdata('status'),
                        'cedula' => $this->session->userdata('cedula'),
                        'nomape' => $this->session->userdata('nomape'),
                    );
                    
                    $usuario["listado"] = $this->Usuario_models->listado();
                    
                    //Cargamos archivos de vista
                    $this->load->view('common/lib_css');
                    $this->load->view('home/view_header', $usuario);
                    $this->load->view('home/view_main_left');
                    $this->load->view('usuario/view_listado', $usuario);
                    $this->load->view('home/view_footer');
                    $this->load->view('common/lib_js');
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function visualizar() {
        
        $ced = base64_decode($this->input->get_post('id', true));
        
        if( $this->session->userdata('acceso') == true ) {
            
                    $usuario = array (
                        
                        /**
                        * Solo se muestran los datos de session a utilizar en caso de necesitar algun
                        * dato de session adicional verificar las variables en el modelo: Login_model, function logindata
                        */
                        'id' => $this->session->userdata('id'),
                        'rol' => $this->session->userdata('rol'),
                        'status' => $this->session->userdata('status'),
                        'cedula' => $this->session->userdata('cedula'),
                        'nomape' => $this->session->userdata('nomape'),
                    );
                    
                    $usuario["row"] = $this->Usuario_models->consultar($ced);
                    
                    //Cargamos archivos de vista 
                    $this->load->view('common/lib_css');
                    $this->load->view('usuario/view_modificar', $usuario);
                    $this->load->view('common/lib_usuario_js');
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function editar() {
        $dni=$this->input->get_post('dni',true);
        $rol=$this->input->get_post('rol',true);
        $nombre=$this->input->get_post('nombre',true);
        $clave1=$this->input->get_post('clave1',true);
        $apellido=$this->input->get_post('apellido',true);
        $telefono=$this->input->get_post('telefono',true);

        if(isset($dni)) {
            if($clave1) {
                $bd_usuarios=array(
                    'rol'=>$rol,
                    'nombre'=>$nombre,
                    'apellido'=>$apellido,
                    'clave'=>md5($clave1),
                    'identificacion'=>$dni,
                    'telefono_movil'=>$telefono,
                );
            } else {
                $bd_usuarios=array(
                    'rol'=>$rol,
                    'nombre'=>$nombre,
                    'apellido'=>$apellido,
                    'identificacion'=>$dni,
                    'telefono_movil'=>$telefono,
                );
            }    
        
            $comprobar=$this->Usuario_models->editar($dni,$bd_usuarios);
            if($comprobar==true) {
                $this->session->set_flashdata('modsi','El usuario <b>'.strtoupper($bd_usuarios["nombre"]." ".$bd_usuarios["apellido"]).'</b> se modificado correctamente.');
                redirect('usuario/index');
            } else {
                $this->session->set_flashdata('modno','El usuario <b>'.strtoupper($bd_usuarios["nombre"]." ".$bd_usuarios["apellido"]).'</b> no se ha podido modificar, intentelo nuevamente.');
                redirect('usuario/index');
            }
        } 
    }
    
    function activar() {

        $id=base64_decode($this->input->get_post('id',true));
    
        if(isset($id)) {
            $comprobar=$this->Usuario_models->activar($id);
            $data["row"]=$this->Usuario_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El usuario <b>'.strtoupper($data["row"]->nombre." ".$data["row"]->apellido).'</b> se activo correctamente.');
                redirect('usuario/index');
            } else {
                $this->session->set_flashdata('incsi','El usuario <b>'.strtoupper($data["row"]->nombre." ".$data["row"]->apellido).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('usuario/index');
            }
        }
    }
    
    function inactivar() {

        $id=base64_decode($this->input->get_post('id',true));
        
        if(isset($id)) {
            $comprobar=$this->Usuario_models->inactivar($id);
            $data["row"]=$this->Usuario_models->consultar($id);
            
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El usuario <b>'.strtoupper($data["row"]->nombre." ".$data["row"]->apellido).'</b> se inactivo correctamente.');
                redirect('usuario/index');
            } else {
                $this->session->set_flashdata('incsi','El usuario <b>'.strtoupper($data["row"]->nombre." ".$data["row"]->apellido).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('usuario/index');
            }
        }
    }
}