<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation'));
        $this->load->helper('text');
        $this->load->model('Home_models');
        
    }
    
    public function index() {
        
        $fin = date('Y-m-d');
        $inicio = date('Y-m-01');
        $fechadia = date('Y-m-d');
        
        if( $this->session->userdata('acceso') == TRUE ) {
            
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
                    
                    // ventas diarias
                    //$data["row1"] = $this->Home_models->cuotasdiarias($fechadia);
                    // ventas mensuales
                    //$data["row"] = $this->Home_models->cuotasmensuales($inicio, $fin);
                    
                    //Cargamos archivos de vista   
                    $this->load->view('common/lib_css');
                    $this->load->view('home/view_header', $data);
                    $this->load->view('home/view_main_left');
                    $this->load->view('view_home');
                    $this->load->view('home/view_footer');
                    $this->load->view('common/lib_js');
                    $this->load->view('common/lib_home');
        } else {
                    $this->session->sess_destroy();
                    redirect('login/index');
        }
    }
}
