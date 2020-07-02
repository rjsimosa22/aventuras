<?php
    error_reporting(0);
    setlocale(LC_TIME, 'Spanish');
    
    class MYPDF extends TCPDF {	
        
        public function Footer() 
        {
            $this->SetY(-15);
            $this->SetFont('times', 'I', 11);
            $this->Cell(210, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new MYPDF('P', PDF_UNIT, 'LETTER', true, 'UTF-8', false); 
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Ronny Simosa');
    $pdf->SetSubject('Contrato del Cliente');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetTitle('Contrato del Cliente '.ucwords($row['apellidos'].' '.$row['nombre']));
    
    $pdf->setLanguageArray($l);
    $pdf->SetPrintHeader(false);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    /*
     * Variables necesirias
     */
    $titulo = '';
    $cantidad = '';
    $tiempo = '';
    $cuotames = '';
    $montototal = '';
    $duracion = '';
    $itens_titulo = '';
    $primafiliacion = '';
    $fregistro = explode('-', $row['fcobro'], '3');
    $fnacimiento = explode('-', $row['fnac'], '3');
    
    /*
     * Estoy reemplazando las variable que estoy almacendo en la BD en la tabla descripcion del contrato
     */
    $inf_contrato = $descripcion['descripcion'];
    $inf_contrato = str_replace('[[dia]]','<strong><u>'.$fregistro[2].'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[mes]]','<strong><u>'.$fregistro[1].'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[ano]]','<strong><u>'.$fregistro[0].'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[cedula]]','<strong><u>'.$row['ced'].'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[distrito]]','<strong><u>'.ucwords($row['distrito']).'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[planeservicios]]','<strong><u>'.strtoupper($rosw['serv']).'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[firma]]','<strong><u>'.ucwords($row['nom'].' '.$row['ape']).'</u></strong>',$inf_contrato);
    $inf_contrato = str_replace('[[cuotames]]','<strong><u>'.number_format($rosw['ocmes'],2,",",".").'</u></strong>',$inf_contrato);
    
    
    switch ($rosw['id']) {
    
        case '6':
        case '7':
               $cantidad = '(máximo 6 personas junto con el titular) con un tope de edad de 70 años';
        break;
    
        case '8':
                $cantidad = '(máximo 6 personas junto con el titular)a: Titular. padre, madre, esposa, hijo, solo una persona mayor de maximo 70 años';
        break;
    
        case '9':
                $cantidad = 'a 2 adultos y dos niños menores de 18 años, los adultos deben ser menores 70 años de edad.';
        break;

    }
    
    if( $items > 0 ) {

        $itens_titulo = '   <tr align="left">
                                <td><h3><u>Incluye:</u></h3></td>
                            </tr>';
        $c = 1;
        foreach ( $items as $item ) { 

            $itenes.=  '    <tr>
                                <td><p align="justify"> '.$c++.' - '.ucwords($item->item).'</p></td>
                            </tr>
                        ';
        } 
    }
    
    if( isset($tipos['tip_ser']) ) {
        
        if( $rosw['omtotal'] > $rosw['mtotal']) {
            
                    if( $tipos['mreal'] > 0 ) {
            
                                $monto = ($rosw['omtotal'] - $rosw['mtotal']);
                    }else {
                                $monto = $tipos['mreal'];
                    }
        } else {
                    $monto = $tipos['mreal'];
        }
        
        if( $rosw['ocmes'] > $rosw['cmes']) {
            
                    $couta = ($rosw['ocmes'] - $rosw['cmes']);
        } else {
                    $couta = '0';
        }
        
        $tipos = '  <tr align="left">
                        <td><h3><u>Tipos de Servicios:</u></h3></td>
                    </tr>

                    <tr>
                        <td width="280px"><b>Servicios</b></td>
                        <td width="150px" align="center"><b>Valor del Servicio</b></td>
                        <td width="150px" align="center"><b>Monto de Cuota</b></td>
                    </tr>

                    <tr>
                        <td width="280px">(*)&nbsp;'. ucwords($tipos['tip_ser']).'</td>
                        <td width="150px" align="center">C/'. number_format($monto,2,",",".").'</td>
                        <td width="150px" align="center">C/'. number_format($couta,2,",",".").'</td>
                    </tr>';
    }
    
    if( $familiar > 0 ) {
        
                $familiar_titulo = '<tr align="left">
                                        <td colspan="4"><h3><u>Información de Beneficiarios:</u></h3></td>
                                    </tr>

                                    <tr>
                                        <td><b>Nombre:</b></td>
                                        <td align="center"><b>Cédula:</b></td>
                                        <td align="center"><b>Parentesco:</b></td>
                                        <td align="center"><b>Fecha Nacimiento:</b></td>
                                    </tr>';

                foreach( $familiar as $familiars ) { 

                    $familiares.= '<tr height="40px">
                                        <td>'.ucwords($familiars->ben_nombre).'</td>
                                        <td align="center">'.$familiars->ben_cedula.'</td>
                                        <td align="center">'.ucwords($familiars->ben_parentesco).'</td>
                                        <td align="center">'.$familiars->ben_fnacimiento.'</td>
                                    </tr>';
                }
    } else {
        
                $familiar_titulo = '<tr align="left">
                                        <td colspan="4"><h3><u>Información de Beneficiarios:</u></h3></td>
                                    </tr>

                                    <tr>
                                        <td><b>Nombre:</b></td>
                                        <td align="center"><b>Cédula:</b></td>
                                        <td align="center"><b>Parentesco:</b></td>
                                        <td align="center"><b>Fecha Nacimiento:</b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">No Posee</td>
                                    </tr>';
    }
    
    if( $rosw['mtotal'] > 0 ) {
        
        $montototal= '  <tr>
                            <td width="90px"><b>Monto Total:</b></td>
                            <td>C/'.number_format($rosw['mtotal'],2,",",".").'</td>
                        </tr>';
    }
    
    if( $rosw['cmes'] > 0 ) {
        
        $cuotames= '  <tr>
                            <td width="100px"><b>Cuota Mensual:</b></td>
                            <td>C/'.number_format($rosw['cmes'],2,",",".").'</td>
                        </tr>';
    }
    
    if( $rosw['pri_afil'] > 0 ) {
        
        $primafiliacion= '  <tr>
                            <td width="220px"><b>Prima de Afiliación (una única vez):</b></td>
                            <td>C/'.number_format($rosw['pri_afil'],2,",",".").'</td>
                        </tr>';
    }
    
    if( $rosw['duracion'] > 0 ) {
        
        if( $rosw['duracion'] == '20' ) {
            
                    $dura = 'Vitalicio';
        } else {
            
                     $dura = $rosw['duracion'].'&nbsp;años';
        }
        
        $duracion= '  <tr>
                            <td width="130px"><b>Tiempo de Duración:</b></td>
                            <td>'.$dura.'</td>
                        </tr>';
    }
    
    if( $rosw['tcuotausos'] > 0 ) {
        
        $tiempo= '  <tr>
                            <td width="280px"><b>Puede Utilizarse a Partir de la Cuota Número:</b></td>
                            <td>'.$rosw['tcuotausos'].'</td>
                        </tr>';
    }
 
    /*
     * Incio Primera Pagina 
     */  
    $pdf->SetFont('times', '', 11);
    $pdf->AddPage();
    $tb0 =  '   <table border="0px"> 
                    <tr align="center">
                        <td width="200px">Fecha de Venta <br><u> '.$row['fecha_de_venta'].' </u></td>
                        <td width="300px"><img src="'.base_url().'public/img/emblema.png" width="200px"></td>
                        <td width="200px"> Número de Orden <br><u> '.strtoupper($row['numero_orden']).' </u></td>
                    </tr>	
                </table>';
    
    $pdf->SetX(5,false);
    $pdf->SetY(-17+$pdf->GetY(), false); 
    $pdf->writeHTML($tb0, true, false, false, false, false);
    
    if( !empty($row['tcel']) ) { $tcel = $row['tcel']; } else { $tcel = 'N/A'; }
    if( !empty($row['tfij']) ) { $tfij = $row['tfij']; } else { $tfij = 'N/A'; }
    if( $row['fnac']!='0000-00-00' ) { $fnac = $row['fnac']; } else { $fnac = 'N/A'; }
   
    $tb1 =  '   <table border="0px"> 
                    <tr align="left">
                        <td><h4><u>Información del Cliente:</u></h4></td>
                    </tr>
                    <br>
                    <tr>
                        <td width="75px">D.N.I:</td>
                        <td width="100px">Nombre(s):</td>
                        <td width="110px">Apellido(s):</td>
                        <td width="100px">Celular:</td>
                        <td width="100px">Teléfono Fijo:</td>
                        <td width="150px">Fecha de Nacimiento:</td>
                    </tr>
                    <tr>
                        <td width="75px"><u>'.$row['ident'].'</u></td>
                        <td width="100px"><u>'.ucwords($row['nom']).'</u></td>
                        <td width="110px"><u>'.ucwords($row['ape']).'</u></td>
                        <td width="100px"><u>'.$tcel.'</u></td>
                        <td width="100px"><u>'.$tfij.'</u></td>
                        <td width="150px"><u>'.$fnac.'</u></td>
                    </tr>
                    
                    
                </table>'; 

    $pdf->SetX(10,false);
    $pdf->SetY(-2+$pdf->GetY(), false); 
    $pdf->writeHTML($tb1, true, false, false, false, false);
    
    if( !empty($row['color_montura']) ) { $color = $row['color_montura']; } else { $color = 'N/A'; }
    if( !empty($row['medida_OD']) ) { $medida_OD = $row['medida_OD']; } else { $medida_OD = 'N/A'; }
    if( !empty($row['medida_OI']) ) { $medida_OI = $row['medida_OI']; } else { $medida_OI = 'N/A'; }
    if( !empty($row['tipo_vitrina']) ) { $vitrina = $row['tipo_vitrina']; } else { $vitrina = 'N/A'; }
    if( !empty($row['medida_ADD']) ) { $medida_ADD = $row['medida_ADD']; } else { $medida_ADD = 'N/A'; }
    if( !empty($row['codigo_montura']) ) { $cmontura = $row['codigo_montura']; } else { $cmontura = 'N/A'; }
    if( !empty($row['tipo_montura']) ) { $tipo_montura = $row['tipo_montura']; } else { $tipo_montura = 'N/A'; }
    if( !empty($row['material_montura']) ) { $material_montura = $row['material_montura']; } else { $material_montura = 'N/A'; }
    if( !empty($row['descripcion_montura']) ) { $descripcion_montura = $row['descripcion_montura']; } else { $descripcion_montura = 'N/A'; }
    
    $tb2 =  '   <table border="0px"> 
                    <tr align="left">
                        <td><h4><u>Información de Montura:</u></h4></td>
                    </tr>
                    <br>
                    <tr>
                        <td width="120px">Tipo de Montura:</td>
                        <td width="140px">Material de Montura:</td>
                        <td width="130px">Código de Montura:</td>
                        <td width="120px">Color de Montura:</td>
                        <td width="120px">Tipo de Vitrina:</td>
                    </tr>
                    <tr>
                        <td width="120px"><u>'.ucfirst($tipo_montura).'</u></td>
                        <td width="140px"><u>'.ucfirst($material_montura).'</u></td>
                        <td width="130px"><u>'.$cmontura.'</u></td>
                        <td width="120px"><u>'. ucfirst($color).'</u></td>
                        <td width="120px"><u>'.ucfirst($vitrina).'</u></td>
                    </tr>
                    <br>
                    <tr>
                        <td width="150px">Medida de Montura:</td>
                        <td>Descripción de Montura:</td>
                    </tr>
                    <tr>
                        <td width="150px"><u>Medida OD: '.ucwords($medida_OD).',  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medida OI: '.ucwords($medida_OI).', &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medida ADD: '.ucwords($medida_ADD).'</u></td>
                        <td><u>'.ucfirst($descripcion_montura).'</u></td>
                    </tr>
                    </table>'; 

    $pdf->SetX(10,false);
    $pdf->SetY(2+$pdf->GetY(), false); 
    $pdf->writeHTML($tb2, true, false, false, false, false);
    
    if( !empty($row['tipo_luna']) ) { $tipo_luna = $row['tipo_luna']; } else { $tipo_luna = 'N/A'; }
    if( !empty($row['material_luna']) ) { $id_material_luna = $row['material_luna']; } else { $id_material_luna = 'N/A'; }
    if( !empty($row['tratamiento_luna']) ) { $tratamiento_luna = $row['tratamiento_luna']; } else { $tratamiento_luna = 'N/A'; }
    if( !empty($row['descripcion_luna']) ) { $descripcion_luna = $row['descripcion_luna']; } else { $descripcion_luna = 'N/A'; }
    
    $tb3 =  '   <table border="0px"> 
                    <tr align="left">
                        <td><h4><u>Información de Montura:</u></h4></td>
                    </tr>
                    <br>
                    <tr>
                        <td width="120px">Tipo de Luna:</td>
                        <td width="130px">Material de Luna:</td>
                        <td width="140px">Tratamiento de Luna:</td>
                        <td width="270px">Descripción de Luna:</td>
                    </tr>
                    <tr>
                        <td width="120px"><u>'.ucfirst($tipo_luna).'</u></td>
                        <td width="130px"><u>'.ucfirst($id_material_luna).'</u></td>
                        <td width="140px"><u>'.ucfirst($tratamiento_luna).'</u></td>
                        <td width="270px"><u>'.ucfirst($descripcion_luna).'</u></td>
                    </tr>
                    <br>
                </table>'; 

    $pdf->SetX(10,false);
    $pdf->SetY(3+$pdf->GetY(), false); 
    $pdf->writeHTML($tb3, true, false, false, false, false);
    
    if( !empty($row['tipo_pago']) ) { $tipo_pago = $row['tipo_pago']; } else { $tipo_pago = 'N/A'; }
    if( !empty($row['monto_total']) ) { $monto_total = $row['monto_total']; } else { $monto_total = 'N/A'; }
    if( !empty($row['tipo_tarjeta']) ) { $tipo_tarjeta = $row['tipo_tarjeta']; } else { $tipo_tarjeta = 'N/A'; }
    if( !empty($row['numero_boleta']) ) { $numero_orden = $row['numero_boleta']; } else { $numero_orden = 'N/A'; }
    if( !empty($row['monto_a_pagar']) ) { $monto_a_pagar = $row['monto_a_pagar']; } else { $monto_a_pagar = 'N/A'; }
    if( !empty($row['numero_factura']) ) { $numero_factura = $row['numero_factura']; } else { $numero_factura = 'N/A'; }
    if( !empty($row['nombre_vendedor']) ) { $nombre_vendedor = $row['nombre_vendedor']; } else { $nombre_vendedor = 'N/A'; }
    
    $tb3 =  '   <table border="0px"> 
                <tr align="left">
                    <td><h4><u>Información de Pago:</u></h4></td>
                </tr>
                <br>
                <tr>
                    <td width="120px">Tipo de Pago:</td>
                    <td width="120px">Tipo de Tarjeta:</td>
                    <td width="180px">Listado de Vendedores:</td>
                    <td width="100px">Nro de Boleta:</td>
                    <td width="150px">Nro. de Factura:</td>
                </tr>
                <tr>
                    <td width="120px"><u>'.ucfirst($tipo_pago).'</u></td>
                    <td width="120px"><u>'.ucfirst($tipo_tarjeta).'</u></td>
                    <td width="180px"><u>'.ucwords($nombre_vendedor).'</u></td>
                    <td width="100px"><u>'.$numero_orden.'</u></td>
                    <td width="100px"><u>'.$numero_factura.'</u></td>
                </tr>
                <br>
                <tr>
                    <td width="120px">Moto Cancelado:</td>
                    <td>Monto Total:</td>
                </tr>
                <tr>
                    <td width="120px"><u>'.number_format($monto_a_pagar, 2, ',', '.').'</u></td>
                    <td><u>'.number_format($monto_total, 2, ',', '.').'</u></td>
                </tr>
            </table>'; 

    $pdf->SetX(10,false);
    $pdf->SetY(-1+$pdf->GetY(), false); 
    $pdf->writeHTML($tb3, true, false, false, false, false);
    
    
    $pdf->Output('Codigo_del_Contrato_'.strtoupper($row['cod_cont']).'.pdf', 'I');

