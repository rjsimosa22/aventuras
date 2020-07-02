<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Tours_models');
        $this->load->model('Monedas_models');
        $this->load->model('Tematicas_models');
        $this->load->model('ComboDPD_models');
        $this->load->model('Duracion_models');
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
            
            $data['duracion']=$this->Duracion_models->listado();
            $data['monedas']=$this->Monedas_models->listado_actual();
            $data['tematicas']=$this->Tematicas_models->listado_actual();
            $data['departamento']=$this->ComboDPD_models->departamento();
                   
            //Cargamos archivos de vista   
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('tour/view_registro');
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_tours_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function registrar() {

        $nombre=$this->input->get_post('nombre',true);
        $moneda= $this->input->get_post('moneda',true);
        $detalle=$this->input->get_post('detalle',true);
        $duracion=$this->input->get_post('duracion',true); 
        $distrito=$this->input->get_post('distrito',true);
        $provincia=$this->input->get_post('provincia',true);
        $arraytematica=$this->input->get_post('tematica',true);
        $descripcion=$this->input->get_post('descripcion',true);
        $departamento=$this->input->get_post('departamento',true);
        $precio_minimo=$this->input->get_post('precio_minimo',true); 
        $precio_maximo=$this->input->get_post('precio_maximo',true);
        $recomendacion=$this->input->get_post('recomendacion',true);
        
        if(isset($nombre,$arraytematica)) {    
            $bd_tours=array(    
                'status'=>'1',
                'nombre'=>$nombre,
                'moneda'=>$moneda,
                'detalle'=>$detalle,
                'duracion'=>$duracion,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'precio_minimo'=>$precio_minimo,
                'precio_maximo'=>$precio_maximo,
                'recomendacion'=>$recomendacion,
                'id_departamento'=>$departamento,
                'fecha_registro'=>date('Y-m-d H:i:s')
            );
            
            $id=$this->Tours_models->registrar($bd_tours,$arraytematica,$this->session->userdata('cedula'));
            $data["row"]=$this->Tours_models->consultar($id);
            
            if($id > 0) {    
                $this->session->set_flashdata('regsi','El tours <b>'.strtoupper($nombre).'</b> se ha registrado correctamente, <a href="'.site_url('listours/listado').'" class="alert-link" style>Ir a información de tours</a>.');
                redirect('vistours/consultar?ids='.base64_encode($id));
            } else { 
                $this->session->set_flashdata('regno','Tours <b>'.strtoupper($nombre).'</b> existente, haz algunos cambios antes de volver a enviar el formulario. <a href="'.site_url('regtours/index').'" class="alert-link" style>Ir a nuevo tours</a>.');
                redirect('vistours/consultar?ids='.base64_encode($id));
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
                    
            $data["listado"]=$this->Tours_models->listado();
                    
            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('tour/view_listado',$data);
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
                $data["info"]=$this->Tours_models->consultar($id);
                $data['tematicas']=$this->Tematicas_models->listado_actual();
                $data['listado_imagenes']=$this->Tours_models->listado_imagenes($id);
                $data['tematicas_seleccionada']=$this->Tematicas_models->listado_seleccionado($id);
                    
                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('home/view_header',$data);
                $this->load->view('home/view_main_left');
                $this->load->view('tour/view_views',$data);
                $this->load->view('home/view_footer');
                $this->load->view('common/lib_js');
                $this->load->view('common/lib_tours_js');
            } else {
                $id=$id;
                $data["info"]=$this->Tours_models->consultar($id);
                $data['tematicas']=$this->Tematicas_models->listado_actual();
                $data['listado_imagenes']=$this->Tours_models->listado_imagenes($id);
                $data['tematicas_seleccionada']=$this->Tematicas_models->listado_seleccionado($id);

                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('tour/view_visualizar',$data);
                $this->load->view('common/lib_tours_ver_js');
            }
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function visualizar() {
        
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
                    
            $data["info"]=$this->Tours_models->consultar($id);
            $data['duracion']=$this->Duracion_models->listado();
            $data['monedas']=$this->Monedas_models->listado_actual();
            $data['tematicas']=$this->Tematicas_models->listado_actual();
            $data['departamento']=$this->ComboDPD_models->departamento();
            $data['listado_imagenes']=$this->Tours_models->listado_imagenes($id);
            $data['distrito']=$this->ComboDPD_models->distrito($data['info']->id_provincia);
            $data['tematicas_seleccionada']=$this->Tematicas_models->listado_seleccionado($id);
            $data['provincia']=$this->ComboDPD_models->provincia($data['info']->id_departamento);
            
            //Cargamos archivos de vista 
            $this->load->view('common/lib_css');
            $this->load->view('tour/view_editar',$data);
            $this->load->view('common/lib_tours_editar_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function visualizar_imagenes() {
        
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
                    
            $data["info"]=$this->Tours_models->consultar($id);
            $data['listado_imagenes']=$this->Tours_models->listado_imagenes($id);
            
            //Cargamos archivos de vista 
            $this->load->view('common/lib_css');
            $this->load->view('tour/view_editar_imagenes',$data);
            $this->load->view('common/lib_tours_imagenes_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function editar() {
        
        $id=$this->input->get_post('id',true);
        $nombre=$this->input->get_post('nombre',true);
        $moneda= $this->input->get_post('moneda',true);
        $detalle=$this->input->get_post('detalle',true);
        $duracion=$this->input->get_post('duracion',true); 
        $distrito= $this->input->get_post('distrito',true);
        $provincia= $this->input->get_post('provincia',true);
        $arraytematica=$this->input->get_post('tematica',true);
        $descripcion=$this->input->get_post('descripcion',true);
        $departamento= $this->input->get_post('departamento',true);
        $precio_minimo=$this->input->get_post('precio_minimo',true); 
        $precio_maximo=$this->input->get_post('precio_maximo',true);
        $recomendacion=$this->input->get_post('recomendacion',true);
        
        if(isset($id,$nombre)) {
            $bd_tours=array(    
                'nombre'=>$nombre,
                'moneda'=>$moneda,
                'detalle'=>$detalle,
                'duracion'=>$duracion,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'precio_minimo'=>$precio_minimo,
                'precio_maximo'=>$precio_maximo,
                'recomendacion'=>$recomendacion,
                'id_departamento'=>$departamento,
            );

            $comprobar=$this->Tours_models->editar($id,$bd_tours,$arraytematica);

            if($comprobar==true) {
                $this->session->set_flashdata('modsi','El tours <b>'.$bd_tours["nombre"].'</b> se modificado correctamente, <a href="'.site_url('listours/listado').'" class="alert-link" style>Ir a listado de tours</a>.');
                redirect('vistours/consultar?ids='.base64_encode($id));
            } else {
                $this->session->set_flashdata('modno','Tours <b>'.$bd_tours["nombre"].'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('listours/listado').'" class="alert-link" style>Ir a listado de tours</a>.');
                redirect('vistours/consultar?ids='.base64_encode($id));
            }
        } 
    }
    
    public function activar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        if(isset($id)) {
            $comprobar=$this->Tours_models->activar($id);
            $data["row"]=$this->Tours_models->consultar($id);
        
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El tours <b>'.strtoupper($data["row"]->nombre).'</b> se activo correctamente.');
                redirect('listours/listado');
            } else {
                $this->session->set_flashdata('incsi','Tours <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('listours/listado');
            }
        }
    }
    
    public function inactivar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        
        if(isset($id)) {
            $comprobar=$this->Tours_models->inactivar($id);
            $data["row"]=$this->Tours_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El tours <b>'.strtoupper($data["row"]->nombre).'</b> se inactivo correctamente.');
                redirect('listours/listado');
            } else {
                $this->session->set_flashdata('incsi','Tours <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('listours/listado');
            }
        }
    }

    public function listado_tours() {
       
        $id=$this->input->get_post('id',true);
        $status=$this->input->get_post('status',true);
        if(isset($status)) {
            $data=$this->Tours_models->listado_tours($status,$id);
            print_r(json_encode($data));
        }
    }

    public function listado_imagenes() {

        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $data=$this->Tours_models->listado_imagenes($id);
            print_r(json_encode($data));
        }
    }

    public function imagen_personal() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $data=$this->Tours_models->imagen_personal($id);
            print_r(json_encode($data));
        }
    }

    public function registrar_imagenes() {

        if(!empty($_FILES)) {
            $targetPath=$_SERVER['DOCUMENT_ROOT']."/public/img/tours/";
            $imagePath=isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
            $imagePath=$targetPath . $imagePath;
            $tempFile=$_FILES['file']['tmp_name'];
            $targetFile=$targetPath . $_FILES['file']['name'];
            
            if(move_uploaded_file($tempFile,$targetFile)) {
                $comprobar=$this->Tours_models->registrar_imagenes($_FILES['file']['name'],$this->session->userdata('cedula'));
                
                if($comprobar==true) { 
                    echo "true";
                } else {
                    echo "false";
                }
                
            } else {
                echo "false";
            }
        }
    }

    public function editar_imagen() {
        
        $id_tours=$this->input->get_post('id_tours',true);
        $id_imagen=$this->input->get_post('id_imagen',true);
        
        if(!empty($_FILES['picture']['name'])){
            $result=0;
            $uploadDir=$_SERVER['DOCUMENT_ROOT']."/public/img/tours/";
            $fileName=$_FILES['picture']['name'];
            $nombre=explode('.',$fileName);
            $targetPath=$uploadDir. $fileName;
            
            if(move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)) {
                
                if($id_imagen && $id_tours) {
                    $accion='editar';
                    $comprobar=$this->Tours_models->editar_imagenes($fileName,$id_imagen);
                    if($comprobar==true) { 
                        $result=1;
                    } else {
                        echo "false";
                    }
                } else {
                    $accion='registrar';
                    $comprobar=$this->Tours_models->registrar_imagenes_personal($fileName,$id_tours);
                    if($comprobar==true) { 
                        $result=1;
                    } else {
                        echo "false";
                    }
                }
            }
            //Load JavaScript function to show the upload status
            echo '<script type="text/javascript">window.top.window.completeUpload('.$result.',\''.$fileName .'\',\''.site_url('public/img/tours/').'\',\''.site_url().'\',\''.$id_tours.'\',\''.$nombre[0].'\',\''.$accion.'\');</script>  ';
        }
    }

    public function activar_imagenes() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Tours_models->activar_imagenes($id);
            print_r(json_encode( $comprobar));
        }
    }

    
    public function inactivar_imagenes() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Tours_models->inactivar_imagenes($id);
            print_r(json_encode( $comprobar));
        }
    }
}