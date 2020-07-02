<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/New_York');

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');

$objPHPExcel = new PHPExcel();
$objWorkExcel = $objPHPExcel->createSheet();

// Titulo de la primera hoja
$objPHPExcel->getActiveSheet()->setTitle('Morosidad de Clientes');

// Set document properties
$objPHPExcel->getProperties()   
->setCreator("MonteSanto")
->setLastModifiedBy("MonteSanto")
->setTitle("Reporte Global por Cliente")
->setSubject("Reporte Global por Cliente")
->setDescription("Reporte Global por Cliente");

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

// Reseña de los estatus
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray9);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', '1 CUOTA PENDIENTE');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray6);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', '2 CUOTAS PENDIENTE');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray7);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', '3 O MAS CUOTAS PENDIENTE');

// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte Global por Cliente - Período Actualizado '.date('Y-m-d'));
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A7:M7')->applyFromArray($styleArray);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A7', 'N°')
->setCellValue('B7', 'FECHA DE REGISTRO DEL CONTRATO')
->setCellValue('C7', 'N° DE CONTRATO')
->setCellValue('D7', 'CEDULA')
->setCellValue('E7', 'NOMBRE(S)')
->setCellValue('F7', 'APELLIDO(S)')
->setCellValue('G7', 'TELEFONO')
->setCellValue('H7', 'DIRECCION')
->setCellValue('I7', 'SERVICIO')
->setCellValue('J7', 'CANTIDAD DE CUOTA MENSUAL PENDIENTE')
->setCellValue('K7', 'MONTO DEL SERVICIO ADEUDADO POR CLIENTE')
->setCellValue('L7', 'CUOTA MENSUAL ADEUDADA POR CLIENTE')       
->setCellValue('M7', 'PAGO DE COMISIONES ADEUDADO POR CLIENTE');



if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i = 8;
        $c = 1;
        $showsub = 1;
        $total_cuota = 0;
        $total_cuotag = 0;
        $total_cdeuda = 0;
        $total_cdeudag = 0;
        $total_adeudado = 0;
        $total_adeudadog = 0;
        $total_comis_deuda = 0;
        $total_comis_deudag = 0;
        
        foreach( $listado as $row ) {
             
            /*----------*/
            $this->db->select('a.fk_contrato, count(a.fk_contrato) as cantidad, a.status, a.monto_deuda as mtotal_deuda');
            $this->db->select('sum(b.comision_pagada) as comis_deuda, sum(c.mensualidad) as cdeuda');
            $this->db->from('voucher as a');
            $this->db->join('cuota_mensual as c', 'c.fk_contrato = a.fk_contrato');
            $this->db->join('vend_comision as b', 'b.fk_id_voucher = a.id_voucher');
            $this->db->where('a.status', '6');
            $this->db->where('c.status', '0');
            $this->db->where('a.fec_apertura <=', $ffin);
            $this->db->where('a.fk_contrato', $row->codigo);
            $this->db->group_by('a.fk_contrato');
            $query = $this->db->get();
            
            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $rows ) {
                    
                    $cont = $c++;
                    
                    if( $row->codigo == $rows->fk_contrato ) {
                        
                        if( $rows->cantidad == 1 ) {
                            
                                    $cantida_cuota = $rows->cantidad." Cuota Pendiente";
                        } else {
                                    $cantida_cuota = $rows->cantidad." Cuotas Pendiente";
                        }
                        
                        $objPHPExcel->getActiveSheet()->getStyle('K'.$i.':M'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray2);
                        
                        if( $rows->cantidad == 1 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('J'.$i.':J'.$i)->applyFromArray($styleArray9); }
                        if( $rows->cantidad == 2 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('J'.$i.':J'.$i)->applyFromArray($styleArray6); }
                        if( $rows->cantidad >= 3 ) { $objPHPExcel->setActiveSheetIndex(0)->getStyle('J'.$i.':J'.$i)->applyFromArray($styleArray7); }
                 
                        if( !empty($row->tlf_celular) ) { $tlf = $row->tlf_celular; } else { $tlf = $row->tlf_fijo; }
                        
                        
                        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $cont)
                        ->setCellValue('B'.$i, $row->fecha_cobro)
                        ->setCellValue('C'.$i, " ".strtoupper($row->codigo))
                        ->setCellValue('D'.$i, $row->cedula)
                        ->setCellValue('E'.$i, ucwords($row->nombre))
                        ->setCellValue('F'.$i, ucwords($row->apellidos))
                        ->setCellValue('G'.$i, $tlf)
                        ->setCellValue('H'.$i, ucwords($row->direccion))
                        ->setCellValue('I'.$i, ucwords($row->servicio))
                        ->setCellValue('J'.$i, $cantida_cuota)
                        ->setCellValue('K'.$i, $rows->mtotal_deuda)
                        ->setCellValue('L'.$i, $rows->cdeuda)
                        ->setCellValue('M'.$i, $rows->comis_deuda);
                    } 
                    
                    $total_cuota += $rows->cantidad;
                    $total_cdeuda += $rows->cdeuda;
                    $total_adeudado += $rows->mtotal_deuda;
                    $total_comis_deuda += $rows->comis_deuda;
                    $i++;
                }
            }
            /*---*/
        }
    }
    
    if ( $showsub == 1 ) {

        $objPHPExcel->getActiveSheet()->getStyle('K'.$i.':M'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':M' . $i)->applyFromArray($styleArray3);
        
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTALES:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $total_cuota." Cuota(s) Pendiente");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $total_adeudado);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, $total_cdeuda);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, $total_comis_deuda);
        
        $total_cuotag += $total_cuota;
        $total_cdeudag += $total_cdeuda;
        $total_adeudadog += $total_adeudado;
        $total_comis_deudag += $total_comis_deuda;
        $i++;
    }
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(55);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);

/*------------------------- Hoja N° 2 --------------------------*/



// Reseña de los estatus
$objWorkExcel->getStyle('B3')->applyFromArray($styleArray5);
$objWorkExcel->getStyle('B3')->applyFromArray($styleArray8);
$objWorkExcel->setCellValue('B3', 'CUOTA AL DIA');

// Titulo del reporte
$objWorkExcel->setCellValue('A1', 'Reporte Estatus de Clientes - Período '.date('Y-m-d'));
$objWorkExcel->getStyle('A1:L1')->applyFromArray($styleArray4);


// Titulo de las celdas
$objWorkExcel->getStyle('A5:K5')->applyFromArray($styleArray);
$objWorkExcel
->setCellValue('A5', 'N°')
->setCellValue('B5', 'FECHA DE REGISTRO DEL CONTRATO')
->setCellValue('C5', 'N° DE CONTRATO')
->setCellValue('D5', 'CEDULA')
->setCellValue('E5', 'NOMBRE(S)')
->setCellValue('F5', 'APELLIDO(S)')
->setCellValue('G5', 'SERVICIO')
->setCellValue('H5', 'CANTIDAD DE CUOTA MENSUAL AL DIA')
->setCellValue('I5', 'MONTO DEL SERVICIO ADEUDADO POR CLIENTE')
->setCellValue('J5', 'CUOTA MENSUAL ADEUDADA POR CLIENTE')       
->setCellValue('K5', 'PAGO DE COMISIONES ADEUDADO POR CLIENTE');


if( $codicionado ) {
    
    if( count($codicionado) > 0 ) {
        
        $i = 6;
        $c = 1;
        $showsub = 1;
        $total_cuota = 0;
        $total_cuotag = 0;
        $total_adeudado = 0;
        $total_adeudadog = 0;
        $total_comis_deuda = 0;
        $total_comis_deudag = 0;
        
        foreach( $codicionado as $row ) {
            
            /*----------*/
            $this->db->select('a.fk_contrato, count(a.fk_contrato) as cantidad, a.status, a.monto_deuda as mtotal_deuda');
            $this->db->select('b.mtotal_comision as comis_deuda, d.nombre_status as estatus');
            $this->db->from('voucher as a');
            $this->db->join('cuota_mensual as c', 'c.fk_contrato = a.fk_contrato');
            $this->db->join('vend_comision as b', 'b.fk_id_voucher = a.id_voucher');
            $this->db->join('td_statusapp as d', 'd.id_status = a.status');
            $this->db->where('a.status', '5');
            $this->db->where('c.status', '0');
            $this->db->where('a.fec_apertura >=', $finicio);
            $this->db->where('a.fec_apertura <=', $ffin);
            $this->db->where('a.fk_contrato', $row->codigo);
            $this->db->group_by('a.fk_contrato');
            $query = $this->db->get();
            
            if( $query->num_rows() > 0 ) {
                
                foreach ( $query->result() as $rows ) {
                    
                    $cont = $c++;
                    
                    if( $row->codigo == $rows->fk_contrato ) {
                        
                        $objWorkExcel->getStyle('I'.$i.':K'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                        $objWorkExcel->getStyle('B'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                        $objWorkExcel->getStyle('A' . $i . ':K' . $i)->applyFromArray($styleArray2);
                        
                        if( $rows->cantidad == 1 ) { $objWorkExcel->getStyle('H'.$i.':H'.$i)->applyFromArray($styleArray5);}
                        
                        $objWorkExcel
                        ->setCellValue('A'.$i, $cont)
                        ->setCellValue('B'.$i, $row->fecha_cobro)
                        ->setCellValue('C'.$i, " ".strtoupper($row->codigo))
                        ->setCellValue('D'.$i, $row->cedula)
                        ->setCellValue('E'.$i, ucwords($row->nombre))
                        ->setCellValue('F'.$i, ucwords($row->apellidos))
                        ->setCellValue('G'.$i, ucwords($row->servicio))
                        ->setCellValue('H'.$i, $rows->estatus)
                        ->setCellValue('I'.$i, $rows->mtotal_deuda)
                        ->setCellValue('J'.$i, 0)
                        ->setCellValue('K'.$i, $rows->comis_deuda);
                    } 
                    
                    $total_cuota += $rows->cantidad;
                    $total_adeudado += $rows->mtotal_deuda;
                    $total_comis_deuda += $rows->comis_deuda;
                    $i++;
                }
            }
            /*---*/
        }
    }
    
    if ( $showsub == 1 ) {

        $objWorkExcel->getStyle('I'.$i.':K'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
        $objWorkExcel->getStyle('A' . $i . ':K' . $i)->applyFromArray($styleArray3);
        
        $objWorkExcel->setCellValue('B' . $i, "TOTALES:");
        $objWorkExcel->setCellValue('H' . $i, $total_cuota." Cuota(s) al Día");
        $objWorkExcel->setCellValue('I' . $i, $total_adeudado);
        $objWorkExcel->setCellValue('J' . $i, 0);
        $objWorkExcel->setCellValue('K' . $i, $total_comis_deuda);
        
        $total_cuotag += $total_cuota;
        $total_adeudadog += $total_adeudado;
        $total_comis_deudag += $total_comis_deuda;
        $i++;
    }

} else {
            $objWorkExcel->getStyle('A7:L7')->applyFromArray($styleArray4);
            $objWorkExcel->setCellValue('A7', 'No hay registros para mostrar');
}
 
//Formato de las columnas
$objWorkExcel->getColumnDimension('A')->setWidth(10);
$objWorkExcel->getColumnDimension('B')->setWidth(40);
$objWorkExcel->getColumnDimension('C')->setWidth(25);
$objWorkExcel->getColumnDimension('D')->setWidth(20);
$objWorkExcel->getColumnDimension('E')->setWidth(30);
$objWorkExcel->getColumnDimension('F')->setWidth(40);
$objWorkExcel->getColumnDimension('G')->setWidth(45);
$objWorkExcel->getColumnDimension('H')->setWidth(45);
$objWorkExcel->getColumnDimension('I')->setWidth(55);
$objWorkExcel->getColumnDimension('J')->setWidth(50);
$objWorkExcel->getColumnDimension('K')->setWidth(50);

// Titulo de la segunda hoja
$objWorkExcel->SetTitle("Clientes al Día");

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte Global por Cliente ('.date("Y-m-d").').xlsx"');
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
