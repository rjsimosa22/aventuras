<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComboPS extends CI_Controller {

	
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper(array('url', 'form', 'text'));
        $this->load->model('ComboPS_models');
    }
     
    public function planeservicios() {
        
        $opcion = $this->input->get_post('opcion', true);
        
        if( $opcion ) {
            
                    $planeservicios = $this->ComboPS_models->planeservicios($opcion);
                    echo '<option value="">Seleccione</option>';
                    
                    foreach ( $planeservicios as $row ) {
                        
                        echo '<option value="'.$row->id_serv.'">'.ucwords($row->nombre).'</option>';
                    }
        }  else {
                    echo '<option value="">Seleccione</option>';
        }
    }
    
    public function informacion() {
        
        $planeservicios = $this->input->get_post('planeservicios', true);
        
        $cuotames = '';
        $duracion = '';
        $servicios = '';
        $montototal = '';
        $porcentaje = '';
        $primafiliacion = '';
        $tiempocuotausos = '';
        
        if($planeservicios){
            
            $informacion = $this->ComboPS_models->informacion($planeservicios);
           
            if( $informacion > 0 ) {

                echo '  <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-0 control-label">Información Básica del Servicio</label>
                            </div>';

                foreach ( $informacion as $row ) {

                    echo '  <input type="hidden" name="serv_nue" id="serv_nue" value="2">
                            
                            <input type="hidden" name="cmes" id="cmes" value="'.$row->cuotames.'">
                            <input type="hidden" name="mtotal" id="mtotal" value="'.$row->mtotal.'">
                            <input type="hidden" name="porc" id="porc" value="'.$row->porcentaje.'">                            
                            <input type="hidden" name="duracion" id="duracion" value="'.$row->duracion.'">                            
                            <input type="hidden" name="pri_afil" id="pri_afil" value="'.$row->primafilia.'">
                            <input type="hidden" name="tcuotausos" id="tcuotausos" value="'.$row->tcuotausos.'">
                            <input type="hidden" name="comens_mes_vend" id="comens_mes_vend" value="'.$row->comens_vend.'">
                            <input type="hidden" name="comens_mes_psico" id="comens_mes_psico" value="'.$row->comens_psico.'">
                            <input type="hidden" name="comens_mes_com" id="comens_mes_com" value="'.$row->comens_comercial.'">
                            <input type="hidden" name="comens_total_vend" id="comens_total_vend" value="'.$row->comtotal_vend.'">';

                    if( !empty($row->nombre) ) {
                        
                        $servicios ='   <div class="col-sm-12">
                                            <li><label class="col-sm-0 control-label">Nombre:&nbsp;'.ucwords($row->nombre).'</label></li>
                                        </div>';
                    }
                    
                    if( !empty($row->mtotal) ) {
                        
                        $montototal ='  <div class="col-sm-12">
                                            <li><label class="col-sm-0 control-label">Cuota Mensual:&nbsp;₡&nbsp;'.number_format($row->mtotal,2,",",".").'</label></li>
                                        </div>';
                    }
                    
                    if( !empty($row->cuotames) ) {
                        
                        $cuotames ='    <div class="col-sm-12">
                                            <li><label class="col-sm-0 control-label">Cuota Mensual:&nbsp;₡&nbsp;'.number_format($row->cuotames,2,",",".").'</label></li>
                                        </div>';
                    }
                    
                    if( !empty($row->primafilia) ) {
                        
                        $primafiliacion ='   <div class="col-sm-12">
                                                <li><label class="col-sm-0 control-label">Prima de Afiliación (una única vez):&nbsp;₡&nbsp;'.number_format($row->primafilia,2,",",".").'</label></li>
                                            </div>';
                    }
                    
                    if( !empty($row->porcentaje) ) {
                        
                        $porcentaje ='  <div class="col-sm-12">
                                            <li><label class="col-sm-0 control-label">Porcentaje del Incremento Anual:&nbsp;'.$row->porcentaje.'%</label></li>
                                        </div>';
                    }
                    
                    if( !empty($row->duracion) ) {
                        
                        if( $row->duracion == '20' ) {
            
                                    $dura = 'Vitalicio';
                        } else {
                                    $dura = $row->duracion.'&nbsp;años';
                        }
        
                        $duracion ='    <div class="col-sm-12">
                                            <li><label class="col-sm-0 control-label">Tiempo de Duración:&nbsp;'.$dura.'</label></li>
                                        </div>';
                    }
                    
                    if( !empty($row->tcuotausos) ) {
                        
                        $tiempocuotausos ='  <div class="col-sm-12">
                                                <li><label class="col-sm-0 control-label">Puede Utilizarse a Partir de la Cuota Número:&nbsp;'.$row->tcuotausos.'</label></li>
                                            </div>';
                    }
                    
                    echo '  <ul>
                                '.$servicios.'

                                '.$montototal.'
                                    
                                '.$cuotames.'
                                    
                                '.$primafiliacion.'
                                    
                                '.$porcentaje.'
                                    
                                '.$duracion.'
                                
                                '.$tiempocuotausos.'
                            </ul>';
                     
                }
                echo '  </div>';
            }  
        } 
    }
    
    public function listadoitems() {
        
        $planeservicios = $this->input->get_post('planeservicios', true);
        
        if( $planeservicios ) {
            
            $planeservicios = $this->ComboPS_models->listadoitems($planeservicios);
           
            if( $planeservicios > 0 ) {

                        echo '  <input type="hidden" name="item_serv" id="item_serv" value="1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Artículos que Contempla el Servicio:</label>
                                    </div>';

                        foreach ( $planeservicios as $row ) {

                            echo '      <ul>
                                            <div class="col-sm-12">
                                                <li>
                                                    <label class="col-sm-0 control-label">'.ucwords($row->descripcion).'.</label>
                                                </li>
                                            </div>
                                        </ul>';
                        }
                            echo '  </div>';
            }           
        }  
    }
    
    public function tipoitems() {
        
        $planeservicios = $this->input->get_post('planeservicios', true);
        
        if( isset($planeservicios) ) {
            
            $tiposervicios = $this->ComboPS_models->tipoitems($planeservicios);
           
            if( $tiposervicios > 0 ) {
                            
                        echo '  <input type="hidden" name="tipo_serv" id="tipo_serv" value="1">
                                <div class="form-group">
                                    
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Tipos de Servicios:</label>
                                    </div>
                                    
                                        <ul>
                                            <table>
                                                <tr>
                                                    <td width="400px">Servicios</td>
                                                    <td width="250px" align="center">Valor del Servicio</td>
                                                    <td width="250px" align="center">Valor de Cuota</td>
                                                </tr>
                                            </table>
                                        </ul>';

                        foreach ( $tiposervicios as $row ) {
                            
                            echo    '<input type="hidden" name="tipo_valor[]" id="tipo_valor" value="'.$row->costo.'">
                                    
                                    <ul>
                                        <table>
                                            <tr>
                                                <td width="400px"><input type="radio" name="id_tipserv" id="id_tipserv" value="'.$row->id_tipserv.'">&nbsp;&nbsp;'.ucwords($row->nombre).'</td>
                                                <td width="250px" align="center">₡&nbsp;'.number_format($row->costo,2,",",".").'</td>
                                                <td width="250px" align="center"><input type="text" name="tipo_cuota[]" id="tipo_cuota" class="form-control" placeholder="Cuota" onKeyPress="return soloNumeros(event)" autocomplete="off" style="width:100px;" /></td>
                                            </tr>
                                        </table>
                                    </ul>';
                        }
            
                        echo ' </div>';
            }
        }  
    }
}
