<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url','form', 'text'));
        $this->load->model('ComboPS_models');
        $this->load->model('Servicio_models');
    }
    
    public function index() {
         
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
					
                    $data['opcion'] = $this->ComboPS_models->infor_servicio();
                    
                    //Cargamos archivos de vista   
                    $this->load->view('common/lib_css');
                    $this->load->view('home/view_header', $data);
                    $this->load->view('home/view_main_left');
                    $this->load->view('servicio/view_regservicio');
                    $this->load->view('home/view_footer');
                    $this->load->view('common/lib_js');
                    $this->load->view('common/lib_servicio_js');
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function registrar() {
  
        $btn = $this->input->get_post('btn', true);
        $nom = $this->input->get_post('nom', true);
        $desc = $this->input->get_post('desc', true);
        $tip_ser = $this->input->get_post('tip_ser', true);
        $comens_mes_com = $this->input->get_post('comens_mes_com', true);
                
        if( isset($nom, $btn) ) {
            
            $td_servicio = array(
                
                'nombre' => $nom,
                'descripcion_general' => $desc,
                'status' => '1',
                'fcreacion' => date('Y-m-d H:i:s'),
                'id_categoria' => $tip_ser,
            );
            
            $comprobar = $this->Servicio_models->registrar($td_servicio);
             
            if( $comprobar == true ) {
                        
                        $this->session->set_flashdata('regsi','<b>'.strtoupper($td_servicio["nombre"]).'</b> se ha registrado correctamente, <a href="'.site_url('servicio/listado').'" class="alert-link" style>Ir a información de servicios</a>.');
                        redirect('servicio/consultar?id='.base64_encode($nom));
            } else {
                        $this->session->set_flashdata('regno','<b>'.strtoupper($td_servicio["nombre"]).'</b> existente, haz algunos cambios antes de volver a enviar el formulario. <a href="'.site_url('servicio').'" class="alert-link" style>Ir a nuevo servicio</a>.');
                        redirect('servicio/consultar?id='.base64_encode($nom));
            }
            
        } 
    }
    
    public function listado() {
        
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
                    
                    $data["listado"] = $this->Servicio_models->listado();
                    
                    //Cargamos archivos de vista
                    $this->load->view('common/lib_css');
                    $this->load->view('home/view_header', $data);
                    $this->load->view('home/view_main_left');
                    $this->load->view('servicio/view_listado', $data);
                    $this->load->view('home/view_footer');
                    $this->load->view('common/lib_js');
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function consultar() {
       
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
                    
                    $data["row"] = $this->Servicio_models->consultarservicios($id);
                    $data['opcion'] = $this->ComboPS_models->infor_servicio();
                    
                    if( is_numeric($id) ){
                        
                                //Cargamos archivos de vista
                                $this->load->view('common/lib_css');
                                $this->load->view('servicio/view_visualizar', $data);
                                $this->load->view('common/lib_servicio_js');
                    } else {
                                
                                $this->load->view('common/lib_css');
                                $this->load->view('home/view_header', $data);
                                $this->load->view('home/view_main_left');
                                $this->load->view('servicio/view_views', $data);
                                $this->load->view('home/view_footer');
                                $this->load->view('common/lib_js');
                    }
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function visualizar() {
        
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
                    
                    $data["row"] = $this->Servicio_models->consultarservicios($id);
                    $data['opcion'] = $this->ComboPS_models->infor_servicio();
                    
                    //Cargamos archivos de vista 
                    $this->load->view('common/lib_css');
                    $this->load->view('servicio/view_modificar', $data);
                    $this->load->view('common/lib_servicio_js');
        } else {
                    $this->session->sess_destroy();
                    redirect('login');
        }
    }
    
    public function modificar() {
        
        $id = $this->input->get_post('id', true);
        $btn = $this->input->get_post('btn', true);
        $nom = $this->input->get_post('nom', true);
        $desc = $this->input->get_post('desc', true);
        $tip_ser = $this->input->get_post('tip_ser', true);
        
        if( isset($nom, $btn) ) {    
            
            
            $td_servicio = array(
                
                'nombre' => $nom,
                'descripcion_general' => $desc,
                'id_categoria' => $tip_ser,
            );
            
            $comprobar = $this->Servicio_models->modificarservicios($id,$td_servicio);
            
            if( $comprobar == true ) {

                        $this->session->set_flashdata('modsi','<b>'.strtoupper($td_servicio["nombre"]).'</b> se modificado correctamente, <a href="'.site_url('servicio/listado').'" class="alert-link" style>Ir a información de servicios</a>.');
                        redirect('servicio/consultar?id='.base64_encode($nom));
            } else {
                        $this->session->set_flashdata('modno','<b>'.strtoupper($td_servicio["nombre"]).'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('servicio/listado').'" class="alert-link" style>Ir a información de servicios</a>.');
                        redirect('servicio/consultar?id='.base64_encode($nom));
            }
        } 
    }
    
    function activar() {
        
        $id = base64_decode($this->input->get_post('id', true));
        
        if( isset($id) ) {

                $data["row"] = $this->Servicio_models->consultarservicios($id);
                $comprobar = $this->Servicio_models->activar($id);

                if ( $comprobar == true ) {

                            $this->session->set_flashdata('incsi','<b>'.strtoupper($data["row"]["nom"]).'</b> se activo correctamente.');
                            redirect('servicio/listado');
                } else {
                            $this->session->set_flashdata('incsi','<b>'.strtoupper($data["row"]["nom"]).'</b> no se ha podido activar, intentelo nuevamente.');
                            redirect('servicio/listado');
                }
        }
    }
    
    function inactivar() {
        
        $id = base64_decode($this->input->get_post('id', true));
        
        if( isset($id) ) {

                $data["row"] = $this->Servicio_models->consultarservicios($id);
                $comprobar = $this->Servicio_models->inactivar($id);

                if ( $comprobar == true ) {

                            $this->session->set_flashdata('incsi','<b>'.strtoupper($data["row"]["nom"]).'</b> se inactivo correctamente.');
                            redirect('servicio/listado');
                } else {
                            $this->session->set_flashdata('incsi','<b>'.strtoupper($data["row"]["nom"]).'</b> no se ha podido inactivar, intentelo nuevamente.');
                            redirect('servicio/listado');
                }
        }
    }
}