<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Paquetes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Tours_models');
        $this->load->model('Tours_models');
        $this->load->model('Hoteles_models');
        $this->load->model('Paquetes_models');
        $this->load->model('ComboDPD_models');
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
            
            $data['tours']=$this->Tours_models->listado_tours('1','0');
            $data['departamento']=$this->ComboDPD_models->departamento();
            $data['hoteles']=$this->Hoteles_models->listado_hoteles('1','0');
                   
            //Cargamos archivos de vista   
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('paquete/view_registro');
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_paquete_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function registrar() {

        $nombre=$this->input->get_post('nombre',true);
        $arraydias=$this->input->get_post('dias',true);
        $distrito=$this->input->get_post('distrito',true);
        $servicios=$this->input->get_post('servicios',true);
        $provincia=$this->input->get_post('provincia',true);
        $descripcion=$this->input->get_post('descripcions',true);
        $departamento=$this->input->get_post('departamento',true);
        $cantidad_dias=$this->input->get_post('cantidad_dia',true); 
        $tipo_descuento=$this->input->get_post('tipo_descuento',true);
        $arraytours_basico=$this->input->get_post('tours_basico',true);
        $monto_descuento=$this->input->get_post('monto_descuento',true);
        $arraytours_exclusivo=$this->input->get_post('tours_exclusivo',true);
        $arraytours_recomendado=$this->input->get_post('tours_recomendado',true);
        $arrayhoteles_seleccionado=$this->input->get_post('hoteles_seleccionado',true);
      
        if(isset($nombre)) {    
            $bd_paquetes=array(    
                'status'=>'1',
                'nombre'=>$nombre,
                'servicios'=>$servicios,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'cantidad_dias'=>$cantidad_dias,
                'id_departamento'=>$departamento,
                'tipo_descuento'=>$tipo_descuento,
                'monto_descuento'=>$monto_descuento,
                'fecha_registro'=>date('Y-m-d H:i:s')
            );
            
            $id=$this->Paquetes_models->registrar($bd_paquetes,$arraydias,$arrayhoteles_seleccionado,$arraytours_basico,$arraytours_exclusivo,$arraytours_recomendado);
            if($id > 0) {    
                $this->session->set_flashdata('regsi','El paquete <b>'.strtoupper($nombre).'</b> se ha registrado correctamente, <a href="'.site_url('listpaquetes/listado').'" class="alert-link" style>Ir a listado de paquetes</a>.');
                redirect('vispaquetes/consultar?ids='.base64_encode($id));
            } else { 
                $this->session->set_flashdata('regno','Paquete <b>'.strtoupper($nombre).'</b> existente, haz algunos cambios antes de volver a enviar el formulario. <a href="'.site_url('regpaquetes/index').'" class="alert-link" style>Ir a nuevo paquete</a>.');
                redirect('vispaquetes/consultar?ids='.base64_encode($id));
            }
            
        } 
    }
    
    public function listado() {
        
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
                    
            $data["listado"]=$this->Paquetes_models->listado();
                    
            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('paquete/view_listado',$data);
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function consultar() {
       
        $id=base64_decode($this->input->get_post('id',true));
        if($this->session->userdata('acceso')==true) {
            $data=array (
                        
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
                    
            if(empty($id)) {
                $id=base64_decode($this->input->get_post('ids',true));
                $data["info"]=$this->Paquetes_models->consultar($id);
                $data["tours"]=$this->Tours_models->listado_tours_sel($id);
                $data["hoteles"]=$this->Hoteles_models->listado_hoteles_sel($id);
               
                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('home/view_header',$data);
                $this->load->view('home/view_main_left');
                $this->load->view('paquete/view_views',$data);
                $this->load->view('home/view_footer');
                $this->load->view('common/lib_js');
                $this->load->view('common/lib_paquete_js');
            } else {
                $id=$id;
                $data["info"]=$this->Paquetes_models->consultar($id);
                $data["tours"]=$this->Tours_models->listado_tours_sel($id);
                $data["hoteles"]=$this->Hoteles_models->listado_hoteles_sel($id);
               
                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('paquete/view_visualizar',$data);
                $this->load->view('common/lib_paquete_ver_js');
            }
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function visualizar() {
        
        $arrayhoteles=array();
        $arraytours_basico=array();
        $arraytours_exclusivo=array();
        $arraytours_recomendado=array();
        $id=base64_decode($this->input->get_post('id',true));
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
             
            $data["info"]=$this->Paquetes_models->consultar($id);
            $data['departamento']=$this->ComboDPD_models->departamento();
            
            $data["sel_hoteles"]=$this->Hoteles_models->listado_hoteles_sel($id);
            foreach($data["sel_hoteles"] as $row) {
                array_push($arrayhoteles,$row->id_hoteles);
            }
            
            if($arrayhoteles) {
                $data['hoteles']=$this->Hoteles_models->listado_hoteles('1',$arrayhoteles);
            }

            $data["sel_tours"]=$this->Tours_models->listado_tours_sel($id);
            foreach($data["sel_tours"] as $row) {
                array_push($arraytours_basico,$row->id_tours_basico);
                array_push($arraytours_exclusivo,$row->id_tours_exclusivo);
                array_push($arraytours_recomendado,$row->id_tours_recomendado);
            }

            if($arraytours_basico) {
                $data['tours_basico']=$this->Tours_models->listado_tours('1',$arraytours_basico);
                $data['tours_exclusivo']=$this->Tours_models->listado_tours('1',$arraytours_exclusivo);
                $data['tours_recomendado']=$this->Tours_models->listado_tours('1',$arraytours_recomendado);
            }
            
            
            
            $data['distrito']=$this->ComboDPD_models->distrito($data["info"]->id_provincia);
            $data['provincia']=$this->ComboDPD_models->provincia($data["info"]->id_departamento);
            
            //Cargamos archivos de vista 
            $this->load->view('common/lib_css');
            $this->load->view('paquete/view_editar',$data);
            $this->load->view('common/lib_paquete_editar_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function editar() {
        
        $id=$this->input->get_post('id',true);
        $nombre=$this->input->get_post('nombre',true);
        $arraydias=$this->input->get_post('dias',true);
        $distrito=$this->input->get_post('distrito',true);
        $servicios=$this->input->get_post('servicios',true);
        $descripcion=$this->input->get_post('descripcions',true);
        $provincia=$this->input->get_post('provincia',true);
        $departamento=$this->input->get_post('departamento',true);
        $cantidad_dias=$this->input->get_post('cantidad_dia',true); 
        $tipo_descuento=$this->input->get_post('tipo_descuento',true);
        $arraytours_basico=$this->input->get_post('tours_basico',true);
        $monto_descuento=$this->input->get_post('monto_descuento',true);
        $arraytours_exclusivo=$this->input->get_post('tours_exclusivo',true);
        $arraytours_recomendado=$this->input->get_post('tours_recomendado',true);
        $arrayhoteles_seleccionado=$this->input->get_post('hoteles_seleccionado',true);
      
        if(isset($nombre)) {    
            $bd_paquetes=array(    
                'nombre'=>$nombre,
                'servicios'=>$servicios,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'cantidad_dias'=>$cantidad_dias,
                'id_departamento'=>$departamento,
                'tipo_descuento'=>$tipo_descuento,
                'monto_descuento'=>$monto_descuento,
            );
        
            $comprobar=$this->Paquetes_models->editar($id,$bd_paquetes,$arraydias,$arrayhoteles_seleccionado,$arraytours_basico,$arraytours_exclusivo,$arraytours_recomendado);
            if($comprobar==true) {
                $this->session->set_flashdata('modsi','El paquete <b>'.$bd_paquetes["nombre"].'</b> se modificado correctamente, <a href="'.site_url('listpaquetes/listado').'" class="alert-link" style>Ir a listado de paquetes</a>.');
                redirect('vispaquetes/consultar?ids='.base64_encode($id));
            } else {
                $this->session->set_flashdata('modno','Paquete <b>'.$bd_paquetes["nombre"].'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('listpaquetes/listado').'" class="alert-link" style>Ir a listado de paquetes</a>.');
                redirect('vispaquetes/consultar?ids='.base64_encode($id));
            }
        } 
    }
    
    public function activar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        if(isset($id)) {
            $comprobar=$this->Paquetes_models->activar($id);
            $data["row"]=$this->Paquetes_models->consultar($id);
        
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El paquete <b>'.strtoupper($data["row"]->nombre).'</b> se activo correctamente.');
                redirect('listpaquetes/listado');
            } else {
                $this->session->set_flashdata('incsi','Paquete <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('listpaquetes/listado');
            }
        }
    }
    
    public function inactivar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        if(isset($id)) {
            $comprobar=$this->Paquetes_models->inactivar($id);
            $data["row"]=$this->Paquetes_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El paquete <b>'.strtoupper($data["row"]->nombre).'</b> se inactivo correctamente.');
                redirect('listpaquetes/listado');
            } else {
                $this->session->set_flashdata('incsi','Paquete <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('listpaquetes/listado');
            }
        }
    }
}