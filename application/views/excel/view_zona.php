<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/New_York');

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');

$objPHPExcel = new PHPExcel();

// Titulo de la primera hoja
$objPHPExcel->getActiveSheet()->setTitle('Resumen');

// Set document properties
$objPHPExcel->getProperties()   
->setCreator("MonteSanto")
->setLastModifiedBy("MonteSanto")
->setTitle("Reporte de Proyección y lo Cobrado por Zona Geográfica")
->setSubject("Reporte de Proyección y lo Cobrado por Zona Geográfica")
->setDescription("Reporte de Proyección y lo Cobrado por Zona Geográfica");

// Estilo de celdas
$styleArray = array(
    
    'font'  => array(
        'size'  => 10,
        'bold'  => true,
        'name'  => 'Verdana',
        'color' => array('rgb' => 'ffffff'),
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => '1C1C1C'
        ),
        'endcolor'   => array(
            'argb' => '1C1C1C'
        )
    ),
    
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);

$styleArray2 = array(
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 10,
        'name'  => 'Verdana'
    )
);

$styleArray3 = array(
  
    'font'  => array(
        'size'  => 10,
        'bold'  => true,
        'name'  => 'Verdana',
        'color' => array('rgb' => 'ffffff'),
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => '1C1C1C'
        ),
        'endcolor'   => array(
            'argb' => '1C1C1C'
        )
    ),
    
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);

$styleArray4 = array(
  
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 11,
        'name'  => 'Verdana'
    )
);

$styleArray5 = array(
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 10,
        'name'  => 'Verdana'
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => '868A08'
        ),
        'endcolor'   => array(
            'argb' => '868A08'
        )
    )
);

$styleArray6 = array(
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 10,
        'name'  => 'Verdana'
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => 'FF9900'
        ),
        'endcolor'   => array(
            'argb' => 'FF9900'
        )
    )
);

$styleArray7 = array(
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 10,
        'name'  => 'Verdana'
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => 'B40404'
        ),
        'endcolor'   => array(
            'argb' => 'B40404'
        )
    )
);

$styleArray8 = array(
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
    
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 10,
        'name'  => 'Verdana'
    )
);

$styleArray9 = array(
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 10,
        'name'  => 'Verdana'
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => '086A87'
        ),
        'endcolor'   => array(
            'argb' => '086A87'
        )
    )
);

$styleArray10 = array(
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 10,
        'name'  => 'Verdana'
    )
);

$styleArray11 = array(
  
    'font'  => array(
        'size'  => 10,
        'bold'  => true,
        'name'  => 'Verdana',
        'color' => array('rgb' => 'ffffff'),
    ),
    
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation'   => 0,
        'startcolor' => array(
            'rgb' => '04B4AE'
        ),
        'endcolor'   => array(
            'argb' => '04B4AE'
        )
    ),
    
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);

$styleArray12 = array(
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
    
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 10,
        'name'  => 'Verdana'
    )
);


// Reseña de los estatus
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray5);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'CUOTA AL DIA');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray9);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', '1 CUOTA PENDIENTE');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray6);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', '2 CUOTAS PENDIENTE');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B6')->applyFromArray($styleArray7);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B6')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6', '3 O MAS CUOTAS PENDIENTE');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B7')->applyFromArray($styleArray12);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7', 'NO HAY OPERACIONES REALIZADA');

// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte de Proyección y lo Cobrado por Zona Geográfica - Período '.$finicio.' Al '.$ffin);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A9:M9')->applyFromArray($styleArray);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A9', 'N°')
->setCellValue('B9', 'FECHA DE REGISTRO DEL CONTRATO')
->setCellValue('C9', 'N° DE CONTRATO')
->setCellValue('D9', 'ZONA')
->setCellValue('E9', 'DISTRITO')
->setCellValue('F9', 'CEDULA')
->setCellValue('G9', 'NOMBRE(S)')
->setCellValue('H9', 'APELLIDO(S)')
->setCellValue('I9', 'CUOTA MENSUAL')
->setCellValue('J9', 'PAGO DE CUOTA MENSUAL')
->setCellValue('K9', 'PENDIENTE DE CUOTA MENSUAL')
->setCellValue('L9', 'CUOTA MENSUAL DE MESES ANTERIORES PAGADAS EN EL MES ACTUAL')
->setCellValue('M9', 'DIRECCION');


if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i = 10;
        $c = 1;
        $var = 0;
        $cont = 1;
        $cpago = 0;
        $showsub = 1;
        $total_cpago = 0;
        $total_cpagog = 0;
        $unirporzona = '';
        $total_proyeccion = 0;
        $total_cpendiente = 0;
        $total_proyecciong = 0;
        $total_cpendienteg = 0;
        $total_mes_anterior = 0;
        $total_mes_anteriorg = 0;
       
        
        
        foreach( $listado as $row ) {
             
            /*----------*/
            $this->db->select('a.fk_contrato, count(a.fk_contrato) as cantidad, a.status, a.monto_deuda as mtotal_deuda');
            $this->db->select('sum(b.comision_pagada) as comis_deuda, sum(c.mensualidad) as cdeuda, c.mensualidad, sum(c.mensualidad + a.pago_extra) as cpagada');
            $this->db->from('voucher as a');
            $this->db->join('cuota_mensual as c', 'c.fk_contrato = a.fk_contrato');
            $this->db->join('vend_comision as b', 'b.fk_id_voucher = a.id_voucher');
            $this->db->where('c.status', '0');
            $this->db->where('a.fec_apertura >=', $finicio);
            $this->db->where('a.fec_apertura <=', $ffin);
            $this->db->where('a.fk_contrato', $row->codigo);
            $this->db->group_by('a.fk_contrato');
            $query = $this->db->get();
            
            if( $query->num_rows() > 0 ) {
                
                foreach ( $query->result() as $rows ) {
                    
                    $cont = $c++;
                  
                    if( $unirporzona != $row->canton ) {

                        if ( $var > 0 ) {

                            if ( $showsub == 1 ) {

                                $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':M'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                                
                                $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray3);
                                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTAL DE ".strtoupper($unirporzona).":");
                                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $total_proyeccion);
                                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $total_cpago);
                                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $total_cpendiente);
                                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, $total_mes_anterior);
                            }
                                $total_cpagog += $total_cpago;
                                $total_cpendienteg += $total_cpendiente;
                                $total_proyecciong += $total_proyeccion;
                                $total_mes_anteriorg += $total_mes_anterior;
                                
                                $total_cpago = 0;
                                $total_proyeccion = 0;
                                $total_cpendiente = 0;
                                $total_mes_anterior = 0;
                                $i++;
                        }
                               $unirporzona = $row->canton;
                               $i++;
                               $var++;
                    }
                    
                    if( $row->codigo == $rows->fk_contrato ) {
                        
                        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                        $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':L'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray2);
                        $objPHPExcel->setActiveSheetIndex(0)->getStyle('M'.$i.':M'.$i)->applyFromArray($styleArray10);
                                
                        if( $rows->status == '5' ) { 
                                            
                            $cpendiente = '';
                            $cpago = $rows->cpagada;
                            $objPHPExcel->setActiveSheetIndex(0)->getStyle('K' . $i . ':K' . $i)->applyFromArray($styleArray8);
                            $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$i.':C'.$i)->applyFromArray($styleArray5); 
                        }
                        
                        /*----------*/
                        $this->db->select('a.fk_contrato, count(a.fk_contrato) as cantidad');
                        $this->db->from('voucher as a');
                        $this->db->where('a.status', '6');
                        $this->db->where('a.fec_apertura <=', $ffin);
                        $this->db->where('a.fk_contrato', $rows->fk_contrato);
                        $this->db->group_by('a.fk_contrato');
                        $query = $this->db->get();

                        if( $query->num_rows() > 0 ) {

                            foreach ( $query->result() as $rowsd ) {
                        
                                if( !empty($rowsd->cantidad) ) { 
                                            
                                    $cpago = '';
                                    $cpendiente = $rows->cdeuda;
                                    if( $rowsd->cantidad == 1 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$i.':C'.$i)->applyFromArray($styleArray9); }
                                    if( $rowsd->cantidad == 2 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$i.':C'.$i)->applyFromArray($styleArray6); }
                                    if( $rowsd->cantidad >= 3 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$i.':C'.$i)->applyFromArray($styleArray7); }
                                }
                            } 
                        }
                        /*---*/
                 
                        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $cont)
                        ->setCellValue('B'.$i, $row->fecha_cobro)
                        ->setCellValue('C'.$i, " ".strtoupper($row->codigo))
                        ->setCellValue('D'.$i, ucwords($row->canton))
                        ->setCellValue('E'.$i, ucwords($row->distrito))
                        ->setCellValue('F'.$i, $row->cedula)
                        ->setCellValue('G'.$i, ucwords($row->nombre))
                        ->setCellValue('H'.$i, ucwords($row->apellidos))
                        ->setCellValue('I'.$i, $rows->cdeuda)
                        ->setCellValue('J'.$i, $cpago)
                        ->setCellValue('K'.$i, $cpendiente)
                        ->setCellValue('M'.$i, ucfirst($row->direccion));

                        /* Re-definiendo la fecha para usarla en las cuotas anteriores */
                        $ffins = explode('-', $ffin, '3');
                        $fecha_fin = $ffins[1].'-'.$ffins[0];

                        $this->db->select('a.fk_contrato, count(a.fk_contrato) as cantidad, a.status, a.monto_deuda as mtotal_deuda');
                        $this->db->select('DATE_FORMAT(a.fec_cobro, "%m-%Y") mes_cobro, DATE_FORMAT(a.fec_apertura, "%m-%Y") mes_apertura');
                        $this->db->select('sum(b.mensualidad) as cmes_anterior, sum(a.pago_extra) as pextras');
                        $this->db->from('voucher as a');
                        $this->db->join('cuota_mensual as b', 'b.fk_contrato = a.fk_contrato');
                        $this->db->where('b.status', '0');
                        $this->db->where('a.status', '5');
                        $this->db->where('a.fec_cobro >=', $finicio);
                        $this->db->where('a.fec_cobro <=', $ffin);
                        $this->db->where('DATE_FORMAT(a.fec_apertura, "%m-%Y") <', $fecha_fin);
                        $this->db->where('a.fk_contrato', $row->codigo);
                        $this->db->group_by('a.fk_contrato');
                        $query = $this->db->get();

                        if( $query->num_rows() > 0 ) {

                            foreach ( $query->result() as $rowsa ) { 

                                if( $rowsa->mes_apertura < $rowsa->mes_cobro) {

                                    $mes_anterior = ($rowsa->cmes_anterior + $rowsa->pextras);

                                    $objPHPExcel->setActiveSheetIndex(0)   
                                    ->setCellValue('L'.$i, $mes_anterior);

                                    $total_mes_anterior += $mes_anterior;
                                }
                            }
                        }
                        /*---*/
                    }
                    
                    $total_cpago += $cpago;
                    $total_cpendiente += $cpendiente;
                    $total_proyeccion += $rows->cdeuda;
                    
                    $i++;
                } 
            }
        }
    }
    
    if ( $showsub == 1 ) {
        
        $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':L'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');

        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTAL DE ".strtoupper($unirporzona).":");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $total_proyeccion);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $total_cpago);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $total_cpendiente);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, $total_mes_anterior);
        
        $total_cpagog += $total_cpago;
        $total_cpendienteg += $total_cpendiente;
        $total_proyecciong += $total_proyeccion;
        $total_mes_anteriorg += $total_mes_anterior;
        $i++;
        $i++;
    

        $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':L'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');

        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray11);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTAL GLOBAL:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $total_proyecciong);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $total_cpagog);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $total_cpendienteg);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, $total_mes_anteriorg);
        
        $total_cpagog += $total_cpago;
        $total_cpendienteg += $total_cpendiente;
        $total_proyecciong += $total_proyeccion;
        $total_mes_anteriorg += $total_mes_anterior;
        
    }
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(75);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(155);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Proyección y lo Cobrado por Zona Geográfica ('.date("Y-m-d").').xlsx"');
header('Cache-Control: max-age=0');

// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

// Etiquetas de descarga
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
