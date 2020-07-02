<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url', 'form', 'text'));
        $this->load->model('Perfil_models');
    }
    
    public function consultar_perfil() {
        
        $id = base64_decode($this->input->get_post('id', true));
        
        if( $this->session->userdata('acceso') == true ) {
            
                    $data = array (
                        
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
                    
                    
                    if( empty($id) ) {
                            
                                $ced = base64_decode($this->input->get_post('ids', true));
                                $data["row"] = $this->Perfil_models->consultar_prefil($ced);

                                //Cargamos archivos de vista
                                $this->load->view('common/lib_css');
                                $this->load->view('home/view_header', $data);
                                $this->load->view('home/view_main_left');
                                $this->load->view('perfil/view_vusuario', $data);
                                $this->load->view('home/view_footer');
                                $this->load->view('common/lib_js');
                    } else {
                                $ced = $id;
                                $data["row"] = $this->Perfil_models->consultar_prefil($ced);

                                //Cargamos archivos de vista
                                $this->load->view('common/lib_css');
                                $this->load->view('home/view_header', $data);
                                $this->load->view('home/view_main_left');
                                $this->load->view('perfil/view_vperfil', $data);
                                $this->load->view('home/view_footer');
                                $this->load->view('common/lib_js');
                    }
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    
    public function perfil() {
        
        $id = base64_decode($this->input->get_post('id', true));
        
        if( $this->session->userdata('acceso') == true ) {
            
                    $data = array (
                        
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
                    
                    if( empty($id) ) {
                        
                                $ced = base64_decode($this->input->get_post('ids', true));
                                $data["row"] = $this->Perfil_models->consultar_prefil($ced);

                                //Cargamos archivos de vista   
                                $this->load->view('common/lib_css');
                                $this->load->view('home/view_header', $data);
                                $this->load->view('home/view_main_left');
                                $this->load->view('perfil/view_usuario');
                                $this->load->view('home/view_footer');
                                $this->load->view('common/lib_js');
                                $this->load->view('common/lib_perfil_js');
                                
                    } else {
                                $ced = $id;
                                $data["row"] = $this->Perfil_models->consultar_prefil($ced);

                                //Cargamos archivos de vista   
                                $this->load->view('common/lib_css');
                                $this->load->view('home/view_header', $data);
                                $this->load->view('home/view_main_left');
                                $this->load->view('perfil/view_perfil');
                                $this->load->view('home/view_footer');
                                $this->load->view('common/lib_js');
                                $this->load->view('common/lib_perfil_js');
                    }
                    
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function modificar_perfil() {
        
        $btn = $this->input->get_post('btn', true);
        $ced = $this->input->get_post('ced', true);
        $nom = $this->input->get_post('nom', true);
        $ape = $this->input->get_post('ape', true);
        $dir = $this->input->get_post('dir', true);
        $tcel = $this->input->get_post('tcel', true);
        $fnac = $this->input->get_post('fnac', true);
       
        if( isset($ced, $btn)) {    

            $usuario = array(

                'nombre' => $nom,
                'apellido' => $ape,
                'fnacimiento' => $fnac,
                'celular' => $tcel,
                'direccion' => $dir,
            );

            $comprobar = $this->Perfil_models->modificar_prefil($ced, $usuario);

            if( $comprobar == true ) {

                        $this->session->set_flashdata('modsi','El perfil del usuario <b>'.strtoupper($usuario["nombre"]." ".$usuario["apellido"]).'</b> se modificado correctamente, <a href="'.site_url('home').'" class="alert-link" style>Ir a inicio</a>.');
                        redirect('perfil/consultar_perfil?id='.base64_encode($ced));
            } else {

                        $this->session->set_flashdata('modno','El perfil del usuario <b>'.strtoupper($usuario["nombre"]." ".$usuario["apellido"]).'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('perfil/perfil?id='.base64_encode($ced)).'" class="alert-link" style>Ir a editar perfil</a>.');
                        redirect('perfil/consultar_perfil?id='.base64_encode($ced));
            }
        } 
    }
    
    public function modificar_usuario() {
        
        $rol = $this->input->get_post('rol', true);
        $btn = $this->input->get_post('btn', true);
        $ced = $this->input->get_post('ced', true);
        $nom = $this->input->get_post('nom', true);
        $usu = $this->input->get_post('usu', true);
        $ape = $this->input->get_post('ape', true);
        $clav = $this->input->get_post('clav', true);
        
        if( isset($ced, $btn)) {    

            $acceso = array(

                'clave' => md5($clav),
            );

            $comprobar = $this->Perfil_models->modificar_usuario($ced, $acceso);

            if( $comprobar == true ) {

                        $this->session->set_flashdata('modsi','La clave del usuario <b>'.strtoupper($nom." ".$ape).'</b> se modificado correctamente, <a href="'.site_url('home').'" class="alert-link" style>Ir a inicio</a>.');
                        redirect('perfil/consultar_perfil?ids='.base64_encode($ced));
            } else {

                        $this->session->set_flashdata('modno','La clave del usuario <b>'.strtoupper($nom." ".$ape).'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('perfil/perfil?ids='.base64_encode($ced)).'" class="alert-link" style>Ir a editar contraseña</a>.');
                        redirect('perfil/consultar_perfil?ids='.base64_encode($ced));
            }
        } 
    }
    
    
}