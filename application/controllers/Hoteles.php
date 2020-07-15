<?php date_default_timezone_set("America/Lima"); defined('BASEPATH') OR exit('No direct script access allowed');

class Hoteles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->model('Monedas_models');
        $this->load->model('Hoteles_models');
        $this->load->model('Servicio_models');
        $this->load->model('ComboDPD_models');
        $this->load->model('Habitaciones_models');
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
            
            $data['servicios']=$this->Servicio_models->listado();
            $data['monedas']=$this->Monedas_models->listado_actual();
            $data['habitaciones']=$this->Habitaciones_models->listado();
            $data['departamento']=$this->ComboDPD_models->departamento();
                   
            //Cargamos archivos de vista   
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('hotel/view_registro');
            $this->load->view('home/view_footer');
            $this->load->view('common/lib_js');
            $this->load->view('common/lib_hotel_js');
            $this->load->view('common/lib_dropzone_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    public function registrar() {
        
        $nombre=$this->input->get_post('nombre',true);
        $distrito=$this->input->get_post('distrito',true);
        $servicio=$this->input->get_post('servicios',true);
        $provincia=$this->input->get_post('provincia',true);
        $descripcion=$this->input->get_post('descripcion',true);
        $departamento=$this->input->get_post('departamento',true);
        $arrayservicios=$this->input->get_post('servicios_popular',true);
        $arrayHabitaciones=json_decode($this->input->get_post('arrayHabitaciones',true),true);
        
        if(isset($nombre,$departamento,$provincia,$distrito)) {    
            $bd_hoteles=array(    
                'status'=>'1',
                'nombre'=>$nombre,
                'servicio'=>$servicio,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'id_departamento'=>$departamento,
                'fecha_registro'=>date('Y-m-d H:i:s')
            );
            
            $id=$this->Hoteles_models->registrar($bd_hoteles,$arrayHabitaciones,$arrayservicios,$this->session->userdata('cedula'));
            $data["row"]=$this->Hoteles_models->consultar($id);
            
            if($id > 0) {    
                $this->session->set_flashdata('regsi','El hotel <b>'.strtoupper($nombre).'</b> se ha registrado correctamente, <a href="'.site_url('hoteles/listado').'" class="alert-link" style>Ir a información de hoteles</a>.');
                redirect('hoteles/consultar?ids='.base64_encode($id));
            } else { 
                $this->session->set_flashdata('regno','Hotel <b>'.strtoupper($nombre).'</b> existente, haz algunos cambios antes de volver a enviar el formulario. <a href="'.site_url('hotel').'" class="alert-link" style>Ir a nuevo hotel</a>.');
                redirect('hoteles/consultar?ids='.base64_encode($id));
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
                    
            $data["listado"]=$this->Hoteles_models->listado();
                    
            //Cargamos archivos de vista
            $this->load->view('common/lib_css');
            $this->load->view('home/view_header',$data);
            $this->load->view('home/view_main_left');
            $this->load->view('hotel/view_listado',$data);
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
                $data["info"]=$this->Hoteles_models->consultar($id);
                $data['servicios']=$this->Servicio_models->listado();
                $data['listado_imagenes']=$this->Hoteles_models->listado_imagenes($id);
                $data['listado_habitaciones']=$this->Hoteles_models->listado_habitaciones($id);
                $data['servicios_seleccionado']=$this->Servicio_models->listado_seleccionado($id);
                    
                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('home/view_header',$data);
                $this->load->view('home/view_main_left');
                $this->load->view('hotel/view_views',$data);
                $this->load->view('home/view_footer');
                $this->load->view('common/lib_js');
                $this->load->view('common/lib_hotel_ver_js');
            } else {
                $id=$id;
                $data["info"]=$this->Hoteles_models->consultar($id);
                $data['servicios']=$this->Servicio_models->listado();
                $data['listado_imagenes']=$this->Hoteles_models->listado_imagenes($id);
                $data['listado_habitaciones']=$this->Hoteles_models->listado_habitaciones($id);
                $data['servicios_seleccionado']=$this->Servicio_models->listado_seleccionado($id);
                
                //Cargamos archivos de vista
                $this->load->view('common/lib_css');
                $this->load->view('hotel/view_visualizar',$data);
                $this->load->view('common/lib_hotel_ver_js');
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
                    
            $data["info"]=$this->Hoteles_models->consultar($id);
            $data['servicios']=$this->Servicio_models->listado();
            $data['monedas']=$this->Monedas_models->listado_actual();
            $data['habitaciones']=$this->Habitaciones_models->listado();
            $data['departamento']=$this->ComboDPD_models->departamento();
            $data['distrito']=$this->ComboDPD_models->distrito($data["info"]->id_provincia);
            $data['servicios_seleccionado']=$this->Servicio_models->listado_seleccionado($id);            
            $data['provincia']=$this->ComboDPD_models->provincia($data["info"]->id_departamento);

            //Cargamos archivos de vista 
            $this->load->view('common/lib_css');
            $this->load->view('hotel/view_editar',$data);
            $this->load->view('common/lib_hotel_editar_js');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function editar() {
        
        $id=$this->input->get_post('id',true);
        $nombre=$this->input->get_post('nombre',true);
        $distrito=$this->input->get_post('distrito',true);
        $servicio=$this->input->get_post('servicios',true);
        $provincia=$this->input->get_post('provincia',true);
        $descripcion=$this->input->get_post('descripcion',true);
        $departamento=$this->input->get_post('departamento',true);
        $arrayservicios=$this->input->get_post('servicios_popular',true);
        
        if(isset($nombre,$departamento,$provincia,$distrito)) {    
            $bd_hoteles=array(    
                'nombre'=>$nombre,
                'servicio'=>$servicio,
                'id_distrito'=>$distrito,
                'id_provincia'=>$provincia,
                'descripcion'=>$descripcion,
                'id_departamento'=>$departamento,
            );

            $comprobar=$this->Hoteles_models->editar($id,$bd_hoteles,$arrayservicios);

            if($comprobar==true) {
                $this->session->set_flashdata('modsi','El hotel <b>'.$bd_hoteles["nombre"].'</b> se modificado correctamente, <a href="'.site_url('hoteles/listado').'" class="alert-link" style>Ir a listado de hoteles</a>.');
                redirect('hoteles/consultar?ids='.base64_encode($id));
            } else {
                $this->session->set_flashdata('modno','Hotel <b>'.$bd_hoteles["nombre"].'</b> no se ha podido modificar, intentelo nuevamente. <a href="'.site_url('hoteles/listado').'" class="alert-link" style>Ir a listado de hoteles</a>.');
                redirect('hoteles/consultar?ids='.base64_encode($id));
            }
        } 
    }
    
    function activar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->activar($id);
            $data["row"]=$this->Hoteles_models->consultar($id);
        
            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El hotel <b>'.strtoupper($data["row"]->nombre).'</b> se activo correctamente.');
                redirect('hoteles/listado');
            } else {
                $this->session->set_flashdata('incsi','Hotel <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido activar, intentelo nuevamente.');
                redirect('hoteles/listado');
            }
        }
    }
    
    public function inactivar() {
        
        $id=base64_decode($this->input->get_post('id',true));
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->inactivar($id);
            $data["row"]=$this->Hoteles_models->consultar($id);

            if($comprobar==true) {
                $this->session->set_flashdata('incsi','El hotel <b>'.strtoupper($data["row"]->nombre).'</b> se inactivo correctamente.');
                redirect('hoteles/listado');
            } else {
                $this->session->set_flashdata('incsi','Hotel <b>'.strtoupper($data["row"]->nombre).'</b> no se ha podido inactivar, intentelo nuevamente.');
                redirect('hoteles/listado');
            }
        }
    }

    public function listado_hoteles() {
       
        $id=$this->input->get_post('id',true);
        $status=$this->input->get_post('status',true);
        if(isset($status)) {
            $data=$this->Hoteles_models->listado_hoteles($status,$id);
            print_r(json_encode($data));
        }
    }

    public function activar_imagenes() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->activar_imagenes($id);
            print_r(json_encode($comprobar));
        }
    }
    
    public function inactivar_imagenes() {

        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->inactivar_imagenes($id);
            print_r(json_encode($comprobar));
        }
    }

    public function listado_imagenes() {

        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $data=$this->Hoteles_models->listado_imagenes($id);
            print_r(json_encode($data));
        }
    }

    public function registrar_imagenes() {
        
        $nombre='foto-hotel-';
        if(!empty($_FILES)) {
            $bytes=$_FILES["file"]["size"];
            $targetPath=$_SERVER['DOCUMENT_ROOT']."/public/img/hoteles/";
            $imagePath=isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
            $imagePath=$targetPath . $imagePath;
            $tempFile=$_FILES['file']['tmp_name'];
            $size=getimagesize($tempFile);
            $targetFile=$targetPath . $_FILES['file']['name'];
            if($size[0] >= 1600 && $size[1] >= 1060) {
                $allowedExts=array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
                $get_extension=explode(".", $_FILES["file"]["name"]);
                $extension=$get_extension[1];
                if((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg")) && in_array($extension, $allowedExts)) {
                        $foto=str_replace(" ","-",$_FILES['file']['name']);
                        $directorio=$targetPath;
                        $directorio1=$targetPath.'/small/';
                        $optFoto=$nombre.''.date('YmdHis').'.'.$extension;
                        move_uploaded_file($tempFile,$directorio.'/'.$foto);
                        resizeImagen($directorio.'/',$directorio1.'/',$foto,530,800,$optFoto,$extension);
                        resizeImagen($directorio.'/',$directorio.'/',$foto,1060,1600,$optFoto,$extension);
                        unlink($directorio.'/'.$foto);
                } else { 
                   echo "false";exit();
                } 
            } else {
                echo "false";exit();
            }
            
            $comprobar=$this->Hoteles_models->registrar_imagenes($optFoto,$this->session->userdata('cedula'));
            if($comprobar==true) { 
                echo "true";
            } else {
                echo "false";
            } 
        }
    }

    public function editar_imagen() {
        
        $imagena=$_FILES['picture']['name'];
        $tempFile=$_FILES['picture']['tmp_name'];
        $id_imagen=$this->input->get_post('id_imagen',true);
        $alt_seo=$this->input->get_post('alt_imagen_2',true);
        $id_hoteles=$this->input->get_post('id_hoteles',true);
        $nombre_imagen_2=$this->input->get_post('nombre_imagen_2',true);
        $targetPath=$_SERVER['DOCUMENT_ROOT']."/public/img/hoteles/";
        
        if(!empty($imagena)) {
			$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        	$get_extension=explode(".",$_FILES["picture"]["name"]);
			$extension = $get_extension[1];
        	if((($_FILES["picture"]["type"] == "image/jpeg") || ($_FILES["picture"]["type"] == "image/jpg")) && in_array($extension, $allowedExts)) {
                $foto=str_replace(" ","-",$_FILES['picture']['name']);
                $directorio=$targetPath;
                $directorio1=$targetPath.'/small/';
                $optFoto='foto-hotel-'.date('YmdHis').'.'.$extension;
                move_uploaded_file($tempFile,$directorio.'/'.$foto);
                resizeImagen($directorio.'/',$directorio1.'/',$foto,530,800,$optFoto,$extension);
                resizeImagen($directorio.'/',$directorio.'/',$foto,1060,1600,$optFoto,$extension);
                unlink($directorio.'/'.$foto);
			}else { 
            	echo "false";exit();
			}
            
            $nombre=explode('.',$optFoto);
            if($id_imagen && $id_hoteles) {
                $accion='editar';
                $comprobar=$this->Hoteles_models->editar_imagenes($optFoto,$id_imagen);
                if($comprobar==true) {
                    unlink($directorio.'/'.$nombre_imagen_2);
                    unlink($directorio1.'/'.$nombre_imagen_2); 
                    $result=true;
                } else {
                    echo "false";
                }
            } else {
                $accion='registrar';
                $comprobar=$this->Hoteles_models->registrar_imagenes_personal($optFoto,$id_hoteles,$alt_seo);
                if($comprobar==true) { 
                    $result=1;
                } else {
                    echo "false";
                }
            }
            echo '<script type="text/javascript">window.top.window.completeUpload('.$result.',\''.$optFoto .'\',\''.site_url('/public/img/hoteles/').'\',\''.site_url().'\',\''.$id_imagen.'\',\''.$nombre[0].'\',\''.$accion.'\');</script>  ';
        }
    }

    public function registrar_imagen_alt() {

        $id=$this->input->get_post('id_imagen',true);
        $alt_imagen=$this->input->get_post('alt_imagen',true);
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->registrar_imagen_alt($id,$alt_imagen);
            print_r(json_encode($comprobar));
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

    public function imagen_personal() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $data=$this->Hoteles_models->imagen_personal($id);
            print_r(json_encode($data));
        }
    }

    public function listado_habitaciones() {

        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $data=$this->Hoteles_models->listado_habitaciones($id);
            print_r(json_encode($data));
        }
    }

    public function activar_habitaciones() {
        
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->activar_habitaciones($id);
            print_r(json_encode($comprobar));
        }
    }

    public function inactivar_habitaciones() {
        $id=$this->input->get_post('id',true);
        if(isset($id)) {
            $comprobar=$this->Hoteles_models->inactivar_habitaciones($id);
            print_r(json_encode($comprobar));
        }    
    }

    public function habitacion_personal() {
     
        $id_hoteles=$this->input->get_post('id_hoteles',true);
        $id_habitaciones=$this->input->get_post('id_habitaciones',true);
        
        if(isset($id_hoteles,$id_habitaciones)) {
            $data=$this->Hoteles_models->habitacion_personal($id_hoteles,$id_habitaciones);
            print_r(json_encode($data));
        }
    }

    public function editar_habitacion() {

        $moneda=$this->input->get_post('moneda',true);
        $id_hoteles=$this->input->get_post('id_hoteles',true);
        $precio_minimo=$this->input->get_post('precio_minimo',true);
        $precio_maximo=$this->input->get_post('precio_maximo',true);
        $disponibilidad=$this->input->get_post('disponibilidad',true);
        $id_habitaciones=$this->input->get_post('id_habitaciones',true);
        $cantidad_personas=$this->input->get_post('cantidad_personas',true);
        $cantidad_habitacion=$this->input->get_post('cantidad_habitacion',true);
        $servicios_habitacion=$this->input->get_post('servicios_habitacion',true);

        if(isset($id_hoteles,$id_habitaciones)) {

            $bd_hoteles_habitaciones_info=array(    
                'id_monedas'=>$moneda,
                'servicios'=>$servicios_habitacion,
                'cantidad_personas'=>$cantidad_personas,
            );

            $bd_hoteles_habitaciones_dia=array(    
                'precio_minimo'=>$precio_minimo,
                'precio_maximo'=>$precio_maximo,
                'disponibilidad'=>$disponibilidad,
                'cantidad_habitaciones'=>$cantidad_habitacion,
            );

            $comprobar=$this->Hoteles_models->editar_habitacion($bd_hoteles_habitaciones_info,$bd_hoteles_habitaciones_dia,$id_hoteles,$id_habitaciones);
            print_r(json_encode($comprobar));
        }
    }

    public function registrar_habitacion() {

        $moneda=$this->input->get_post('moneda',true);
        $id_hoteles=$this->input->get_post('id_hoteles',true);
        $precio_minimo=$this->input->get_post('precio_minimo',true);
        $precio_maximo=$this->input->get_post('precio_maximo',true);
        $disponibilidad=$this->input->get_post('disponibilidad',true);
        $id_habitaciones=$this->input->get_post('id_habitaciones',true);
        $cantidad_personas=$this->input->get_post('cantidad_personas',true);
        $cantidad_habitacion=$this->input->get_post('cantidad_habitacion',true);
        $servicios_habitacion=$this->input->get_post('servicios_habitacion',true);

        if(isset($id_hoteles,$id_habitaciones)) {

            $bd_hoteles_habitaciones_info=array(  
                'id_monedas'=>$moneda,
                'id_hoteles'=>$id_hoteles,
                'servicios'=>$servicios_habitacion,
                'id_habitaciones'=>$id_habitaciones,
                'fecha_registro'=>date('Y-m-d H:i:s'),  
                'cantidad_personas'=>$cantidad_personas,
            );

            $bd_hoteles_habitaciones_dia=array( 
                'id_hoteles'=>$id_hoteles,
                'precio_minimo'=>$precio_minimo,
                'precio_maximo'=>$precio_maximo,
                'disponibilidad'=>$disponibilidad,
                'id_habitaciones'=>$id_habitaciones,
                'fecha_disponibilidad'=>date('Y-m-d H:i:s'),    
                'cantidad_habitaciones'=>$cantidad_habitacion,
            );

            $comprobar=$this->Hoteles_models->registrar_habitacion($bd_hoteles_habitaciones_info,$bd_hoteles_habitaciones_dia);
            print_r(json_encode($comprobar));
        }
    }
}

function resizeImagen($from,$ruta,$nombre,$alto,$ancho,$nombreN,$extension){
    $rutaImagenOriginal = $from.$nombre;
    if($extension == 'GIF' || $extension == 'gif'){
    $img_original = imagecreatefromgif($rutaImagenOriginal);
    }
    if($extension == 'jpg' || $extension == 'JPG'){
    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
    }
    if($extension == 'png' || $extension == 'PNG'){
    $img_original = imagecreatefrompng($rutaImagenOriginal);
    }
    $max_ancho = $ancho;
    $max_alto = $alto;
    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;
    
	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
  	$ancho_final = $ancho;
		$alto_final = $alto;
	} elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	} else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    imagedestroy($img_original);
    $calidad=60;
    imagejpeg($tmp,$ruta.$nombreN,$calidad);
}