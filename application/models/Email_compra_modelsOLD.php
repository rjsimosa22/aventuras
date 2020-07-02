<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();

class Email_compra_models extends CI_Model {

    public $variable;
    public $array;
  
    public function __construct() {
        parent::__construct();
    }

    public function configuracion() {
        $config = Array(
            'smtp_port'=>25,
            'newline'=>"\r\n",
            'mailtype'=>'html', 
            'protocol'=>'smtp',
            'charset'=>'UTF-8',
            'smtp_host'=>'localhost',
            'smtp_pass'=>'olindasaravia1',
            'smtp_user'=>'info@aventuras.pe',
        );
        return $config;
    }
    
    public function email_pago($listado_compra,$datos_personales,$monedaI,$config,$numero_orden) {
        
        $numero_ordens=strlen($numero_orden);
        if($numero_ordens==1) {
            $numero_orden='#AVP-000'.$numero_orden;
        } else if($numero_ordens==2) {
            $numero_orden='#AVP-00'.$numero_orden;
        } else if($numero_ordens==3) {
            $numero_orden='#AVP-0'.$numero_orden;
        } else if($numero_ordens > 3) {
            $numero_orden='#AVP-'.$numero_orden;
        } 

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->cc('info@aventuras.pe');
        $this->email->cc('rjsimosa@gmail.com');
        $this->email->to($datos_personales[0]['textemailres']);
        $this->email->from('info@aventuras.pe','Aventuras Tours');
        $this->email->subject('Reserva confirmada - Aventuras Tours');
        
        if($listado_compra) {  
            $precio_total=0;
            $message= '
                    <table width="100%" style="font-family:sans-serif;color:#555;background:#b52182;padding:10px 50px;color:#fff;">
                        <tr>
                            <td align="center"><img src="'.base_url().'public/front-end/img/aventuras.png" width="100px"></td>
                            <td align="center">
                            ¡Cuéntaselo a tus amigos!
                            <br>
                            <div>
                                <a href="https://twitter.com/AventurasPeru1" target="_blank" style="text-decoration:none;"><img src="https://ci6.googleusercontent.com/proxy/wg9U_3Y4CU48xlTEXqvK8GXJsbDTe5sUnsxqH00PSo3P5cj3jb8kTBvP6o92lBydFJeY-sffWr9SQBHa7K-w=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/tw.png" width="32px" height="32px" align="absmiddle"/></a>
                                <a href="https://m.me/AventurasdelPeru" target="_blank" style="text-decoration:none;"><img src="https://ci6.googleusercontent.com/proxy/UfPq0zdW5yOyB1Wc2s8d2MQgu3Td9mNGhOKEuuEXDPK3ex4dCJQqdJLQYEcpWUa7KCA2bhqw0bZokMPzq4H8=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/fb.png" width="30px" height="30px" align="absmiddle"/></a>
                                <a href="https://www.instagram.com/aventurasdelperu_tours/" target="_blank" style="text-decoration:none;"><img src="https://ci4.googleusercontent.com/proxy/To4EkJuWCoRJ5iMlTmKnDbPAK9gZd5hdp8dj2Jh0JCOyY-rTVThTuIToengMFWW2AyxpEqGz6lMZcXiFD8yutbQnA6bmQw=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/instagram.png" width="32px" height="32px" align="absmiddle"/></a>
                                <a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank" style="text-decoration:none;"><img src="https://ci4.googleusercontent.com/proxy/iBmp-lnn3a9YkyMM8XSRCpfyCuWcbtfgdjshCacsz0WsN4hI5TvOa3WFx33IGrugHo5n4aLB2I3xZXIm1Sv6Lew6qDbG=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/whatsapp.png" width="30px" height="30px" align="absmiddle"/></a>
                            </div>
                        </td></td>
                        </tr>
                    </table>

                    <table width="100%" style="font-family:sans-serif;color:#555;;padding:30px;font-size:25px;" align="center">
                        <tr>
                            <td align="center"><img src="https://ci4.googleusercontent.com/proxy/LFfVFwaLdTQ6MDnEczXADTOy_Nw9e4uZ8t-dYNQ0JZrXAAAcbfWk5rpkF7ReS6tRMFKL3VXqtgmiFLDkoIqSgXgifTBZ=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/check_ok.png" width="45" height="45" alt="" style="display:block;max-width:45px" border="0" class="CToWUd"></td>
                            <td align="center"><b>'.ucfirst(strtolower($datos_personales[0]['textnombresres'])).', tu reserva está confirmada</b></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center"><b>Orden de compra <br><u>'.$numero_orden.'</u></b></td>
                        </tr>
                    </table>
                    <br>
                ';
                
            foreach($listado_compra as $row) { 
                if($monedaI->id=='1') {
                    $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                    $precio=round(ceil((($precio) + $row['textprecio_hotel'])),2);           
                } else {
                    $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                    $precio=round(ceil(((($precio) + $row['textprecio_hotel']) / $row['texttipocambio'])),2);
                }

                $message.= '
                                <table width="100%" style="font-family: sans-serif;color:#555;">
                                    <tr>
                                        <td width="170px"><img src="'.$row['textimagen'].'" alt="" class="img-fluid mr-3 tam-img-web" width="170px"></td>
                                        <td>
                                            <table width="60%">
                                                <tr height="45px">
                                                    <td colspan="4" align="left" style="color:#b52182;font-size:25px;"><b>'.ucfirst(strtolower($row['textservicio'])).'</b></td>
                                                </tr>
                                                
                                                <tr height="45px" style="font-size:14px;">
                                                    <td style="border-right-style: dotted;border-color: #b52182;" align="center"><i class="icon-calendar-inv tamano-icono-res"></i><br>'.$row['textfecha'].'<br>Llegada&nbsp;</td>
                                                    <td style="border-right-style: dotted;border-color: #b52182;" align="center"><i class="icon-adult tamano-icono-res"></i><br>'.$row['textqtyAdulto'].'<br>Adultos&nbsp;</td>
                                                    <td style="border-right-style: dotted;border-color: #b52182;" align="center"><i class="icon-child tamano-icono-res"></i><br>'.$row['textqtyNino'].'<br>Niños&nbsp;</td>
                                                    <td align="center"><i class="icon-stopwatch-1 tamano-icono-res"></i><br>'.ucfirst(strtolower($row['textduracion'])).'<br>Duración&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr height="45px">
                                        <td align="right" colspan="2" style="font-size:20px;background:#9e9e9e2b;"><b><text style="font-size:15px;">'.$row['textmoneda'].'</text>&nbsp;'.$precio.'</b></td>
                                    </tr>
                                </table>
                            '; 
                $precio_total+=$precio;  
            } 
        
        $message.= '
                        <table width="100%" style="font-family:sans-serif;color:#555;font-size:30px;">
                            <tr>
                                <td align="right" colspan="2" style="padding:10px;background:#b52182;color:#fff;"><b><text style="font-size:15px;">'.$row['textmoneda'].'</text>&nbsp;'.number_format($precio_total).'</b></b></td>
                            </tr>
                        </table>
                        <br>

                        <table width="100%" style="font-family:sans-serif;color:#555;font-size:16px;">
                            <tr>
                                <td align="left" width="50%" colspan="2" style="background:#ccc;color:#555;padding:20px 30px;">
                                    <b><text style="font-size:20px;">Tus datos personales</text></b>
                                    <br><br>'.$datos_personales[0]['textipodocres'].': '.$datos_personales[0]['textdocumentores'].'
                                    <br>'.ucfirst(strtolower($datos_personales[0]['textnombresres'])).', '.ucfirst(strtolower($datos_personales[0]['textapellidosres'])).'
                                    <br>'.$datos_personales[0]['textemailres'].'
                                    <br>+ ('.$datos_personales[0]['textoutputres'].') '.$datos_personales[0]['textnumerores'].'
                                </td>

                                <td align="left" width="50%" style="background:#ccc;color:#555;padding:10px 30px;">
                                    <b><text style="font-size:20px;">Datos del proveedor</text></b>
                                    <br><br>Aventuras Tours
                                    <br>info@aventuras.pe
                                    <br>+ (51) 910926882
                                    <br>+ (51) 979180559
                                </td>
                            </tr>
                        </table>
                        <br>

                        <table width="100%">
                            <tbody>
                                <tr style="vertical-align:top;text-align:left;padding:0" align="center">
                                    <td height="100" colspan="2" align="center" valign="top" style="border-collapse:collapse!important;vertical-align:top;text-align:left;padding:0">
                                        <div style="width:100%"><img src="'.base_url().'public/front-end/img/img_4.png" width="100%" height="auto" align="absmiddle"/></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                ';
        }
        
        $this->email->message($message);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
            return false;
        } else {
            return true;
        }
    } 
    
    public function email_reclamacion($dni,$nombre,$email,$numero,$problema,$solucion,$direccion,$actividad,$servicio,$numero_reclamo,$config) {
        
        $numero_reclamos=strlen($numero_reclamo);
        if($numero_reclamos==1) {
            $numero_reclamo='#RAVP-000'.$numero_reclamo;
        } else if($numero_reclamos==2) {
            $numero_reclamo='#RAVP-00'.$numero_reclamo;
        } else if($numero_reclamos==3) {
            $numero_reclamo='#RAVP-0'.$numero_reclamo;
        } else if($numero_reclamos > 3) {
            $numero_reclamo='#RAVP-'.$numero_reclamo;
        } 
        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->cc('info@aventuras.pe');
        $this->email->to($email);
        $this->email->from('info@aventuras.pe','Aventuras Tours');
        $this->email->subject('Hoja de reclamación - Aventuras Tours');
        
        $message= '
                    <table width="100%" style="font-family:sans-serif;color:#555;background:#b52182;padding:10px 50px;color:#fff;">
                        <tr>
                            <td align="center"><img src="'.base_url().'public/front-end/img/aventuras.png" width="100px"></td>
                            <td align="center">
                            ¡Cuéntaselo a tus amigos!
                            <br>
                            <div>
                                <a href="https://twitter.com/AventurasPeru1" target="_blank" style="text-decoration:none;"><img src="https://ci6.googleusercontent.com/proxy/wg9U_3Y4CU48xlTEXqvK8GXJsbDTe5sUnsxqH00PSo3P5cj3jb8kTBvP6o92lBydFJeY-sffWr9SQBHa7K-w=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/tw.png" width="32px" height="32px" align="absmiddle"/></a>
                                <a href="https://m.me/AventurasdelPeru" target="_blank" style="text-decoration:none;"><img src="https://ci6.googleusercontent.com/proxy/UfPq0zdW5yOyB1Wc2s8d2MQgu3Td9mNGhOKEuuEXDPK3ex4dCJQqdJLQYEcpWUa7KCA2bhqw0bZokMPzq4H8=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/fb.png" width="30px" height="30px" align="absmiddle"/></a>
                                <a href="https://www.instagram.com/aventurasdelperu_tours/" target="_blank" style="text-decoration:none;"><img src="https://ci4.googleusercontent.com/proxy/To4EkJuWCoRJ5iMlTmKnDbPAK9gZd5hdp8dj2Jh0JCOyY-rTVThTuIToengMFWW2AyxpEqGz6lMZcXiFD8yutbQnA6bmQw=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/instagram.png" width="32px" height="32px" align="absmiddle"/></a>
                                <a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank" style="text-decoration:none;"><img src="https://ci4.googleusercontent.com/proxy/iBmp-lnn3a9YkyMM8XSRCpfyCuWcbtfgdjshCacsz0WsN4hI5TvOa3WFx33IGrugHo5n4aLB2I3xZXIm1Sv6Lew6qDbG=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/whatsapp.png" width="30px" height="30px" align="absmiddle"/></a>
                            </div>
                        </td></td>
                        </tr>
                    </table>

                    <table width="100%" style="font-family:sans-serif;color:#555;;padding:30px;font-size:25px;" align="center">
                        <tr>
                            <td align="center"><img src="https://ci4.googleusercontent.com/proxy/LFfVFwaLdTQ6MDnEczXADTOy_Nw9e4uZ8t-dYNQ0JZrXAAAcbfWk5rpkF7ReS6tRMFKL3VXqtgmiFLDkoIqSgXgifTBZ=s0-d-e1-ft#https://cdn.civitatis.com/images/mail/check_ok.png" width="45" height="45" alt="" style="display:block;max-width:45px" border="0" class="CToWUd"></td>
                            <td align="center"><b>'.ucfirst(strtolower($nombre)).', tu reclamo está en proceso</b></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center"><b>Número de reclamo <br><u>'.$numero_reclamo.'</u></b></td>
                        </tr>
                    </table>
                    <br>
                ';
                
               
        $message.= '
                        <table width="100%" style="font-family: sans-serif;color:#555;font-size:16px;">
                            <tr align="left" height="50px" style="background:#ccc;font-weight:bold;">
                                <td>Documento de identidad</td>
                                <td>Nombre y apellido</td>
                                <td>Correo electrónico</td>
                                <td>Número telefónico</td>
                            </tr>

                            <tr align="left" height="50px">
                                <td>'.$dni.'</td>
                                <td>'.ucfirst(strtolower($nombre)).'</td>
                                <td>'.$email.'</td>
                                <td>'.$numero.'</td>
                            </tr>

                            <tr align="left" height="50px" style="background:#ccc;font-weight:bold;">
                                <td colspan="4">Dirección</td>
                            </tr>

                            <tr align="left" height="50px">
                                <td colspan="4">'.ucfirst(strtolower($direccion)).'</td>
                            </tr>

                            <tr align="left" height="50px" style="background:#ccc;font-weight:bold;">
                                <td colspan="2">¿Qué quieres registrar?</td>
                                <td colspan="2">Nombre del tours o paquete / Código de compra</td>
                            </tr>

                            <tr align="left" height="50px">
                                <td colspan="2">'.ucfirst(strtolower($actividad)).'</td>
                                <td colspan="2">'.ucfirst(strtolower($servicio)).'</td>
                            </tr>

                            <tr align="left" height="50px" style="background:#ccc;font-weight:bold;">
                                <td colspan="2">¿Cuál fue el problema?</td>
                                <td colspan="2">¿Qué solución esperas?</td>
                            </tr>

                            <tr align="left" height="50px">
                                <td colspan="2">'.ucfirst(strtolower($problema)).'</td>
                                <td colspan="2">'.ucfirst(strtolower($solucion)).'</td>
                            </tr>
                        </table>
                    '; 
    
        
        $message.= '
                        <br>

                        <table width="100%" style="font-family:sans-serif;color:#555;font-size:16px;">
                            <tr>
                                <td align="left" style="background:#b52182;color:#fff;padding:10px 30px;">
                                    <b><text style="font-size:20px;">Datos del proveedor</text></b>
                                    <br><br>Aventuras Tours
                                    <br>info@aventuras.pe
                                    <br>+ (51) 910926882
                                    <br>+ (51) 979180559
                                </td>
                            </tr>
                        </table>
                        <br>

                        <table width="100%">
                            <tbody>
                                <tr style="vertical-align:top;text-align:left;padding:0" align="center">
                                    <td height="100" colspan="2" align="center" valign="top" style="border-collapse:collapse!important;vertical-align:top;text-align:left;padding:0">
                                        <div style="width:100%"><img src="'.base_url().'public/front-end/img/img_4.png" width="100%" height="auto" align="absmiddle"/></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    ';
       
        $this->email->message($message);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
            return false;
        } else {
            return true;
        }
    } 
}