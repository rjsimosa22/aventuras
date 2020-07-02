<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->database('default');
        $this->load->helper(array('url','form','text'));
        $this->load->model('Login_models');
    }
    
    public function index() {
         
        if( $this->session->userdata('acceso') == TRUE ) {
            
                    redirect('home/index');
        } else {
                    $this->load->view('common/lib_css');
                    $this->load->view('login/view_login');
                    $this->load->view('common/lib_js');
                    $this->load->view('common/lib_login');
        }
    }    
    
    public function entrar() {
        
        $clave = $this->input->get_post('clave', TRUE);
        $username = $this->input->get_post('username', TRUE);
        
        if( isset($username) && isset($clave) ) {
           
            $comprobar = $this->Login_models->login($username, md5($clave));
		
           if( $comprobar == TRUE ) {
                       
                        $data = $this->Login_models->logindata($username, md5($clave)); 
                        $this->session->set_userdata($data);
                       
                        if( $this->session->userdata('estatus') == '1' ) {
                            
                                    echo '{"login":"TRUE"}';
                        } else {
                                    echo '{"login":"FALSE","msg":"<img src='.  base_url().'public/img/alert.png> Usuario inactivo"}';
                        }
            } else {
                        echo '{"login":"FALSE","msg":"<img src='.  base_url().'public/img/alert.png> Usuario o clave inválidos"}';          
            }            
        } 
     }

    public function salir() {
        $this->session->sess_destroy();
        redirect('login/index');
    }
}
