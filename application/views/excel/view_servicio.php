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
->setTitle("Reporte de Proyección y lo Cobrado por Servicio")
->setSubject("Reporte de Proyección y lo Cobrado por Servicio")
->setDescription("Reporte de Proyección y lo Cobrado por Servicio");

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
    ),
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
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
);

$styleArray10 = array(
    
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

$styleArray11 = array(
    
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


// Reseña de los estatus
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray7);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B3')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'PROYECCION  DE CUOTA MENSUAL POR SERVICIO');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray5);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B4')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', 'INGRESOS DE CUOTA MENSUAL POR SERVICIO');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray6);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B5')->applyFromArray($styleArray8);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', 'CUOTA MENSUAL PENDIENTE POR SERVICIO');

$objPHPExcel->setActiveSheetIndex(0)->getStyle('B6')->applyFromArray($styleArray10);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6', 'NO HAY OPERACIONES REALIZADA');

// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte de Proyección y lo Cobrado por Servicio - Período '.$finicio.' Al '.$ffin );
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A8:F8')->applyFromArray($styleArray);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B8')->applyFromArray($styleArray9);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A8', 'N°')
->setCellValue('B8', 'SERVICIO')
->setCellValue('C8', 'CANTIDAD GLOBAL DE VENTAS POR SERVICIO')
->setCellValue('D8', 'PROYECCION  DE CUOTA MENSUAL POR SERVICIO')
->setCellValue('E8', 'INGRESOS DE CUOTA MENSUAL POR SERVICIO')
->setCellValue('F8', 'CUOTA MENSUAL PENDIENTE POR SERVICIO');

if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i = 9;
        $c = 1; 
        $showsub = 1;
        $crestante = 0;
        $cantida = 0;
        $crestant = 0;
        $cantidag = 0;
        $crestantg = 0;
        $total_cdeuda = 0;
        $total_cdeudag = 0;
        $total_cpagada = 0;
        $total_cpagadag = 0;
        
        foreach( $listado as $row ) {
            
            /*----------*/
            $this->db->select('count(a.planeservicios) as cantidad, a.planeservicios');
            $this->db->from('ordenes as a');
            $this->db->where('a.status', '0');
            $this->db->where('a.planeservicios', $row->id_serv);
            $this->db->group_by('a.planeservicios');
            $query = $this->db->get();
            
            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $cant ) {
                    
                    $cont = $c++;
                                    
                    $objPHPExcel->getActiveSheet()->getStyle('D'.$i.':F'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':F' . $i)->applyFromArray($styleArray2);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $cont);

                    $objPHPExcel->setActiveSheetIndex(0)->getStyle('B'.$i.':B'.$i)->applyFromArray($styleArray11);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, ucwords($row->nombre));

                    /*----------*/
                    $this->db->select('sum(c.mensualidad) as cdeuda, b.planeservicios');
                    $this->db->from('voucher as a');
                    $this->db->join('ordenes as b', 'b.codigo = a.fk_contrato');
                    $this->db->join('cuota_mensual as c', 'c.fk_contrato = b.codigo');
                    $this->db->where('c.status', '0');
                    $this->db->where('b.status', '0');
                    $this->db->where('a.fec_apertura >=', $finicio);
                    $this->db->where('a.fec_apertura <=', $ffin);
                    $this->db->where('b.planeservicios', $row->id_serv);
                    $this->db->group_by('b.planeservicios');
                    $query = $this->db->get();

                    if( $query->num_rows() > 0 ) {

                        foreach ( $query->result() as $rows ) {

                            $objPHPExcel->setActiveSheetIndex(0)->getStyle('D'.$i.':D'.$i)->applyFromArray($styleArray7);
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $rows->cdeuda);

                            $total_cdeuda += $rows->cdeuda;
                        }
                    }
                    /*---*/
                    
                    $objPHPExcel->setActiveSheetIndex(0)->getStyle('C' . $i . ':C' . $i)->applyFromArray($styleArray2);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $cant->cantidad);
                     
                    /*----------*/
                    $this->db->select('sum(c.mensualidad + a.pago_extra) as cpagada, sum(c.mensualidad) as capagar, b.planeservicios');
                    $this->db->from('voucher as a');
                    $this->db->join('ordenes as b', 'b.codigo = a.fk_contrato');
                    $this->db->join('cuota_mensual as c', 'c.fk_contrato = b.codigo');
                    $this->db->where('a.status', '5');
                    $this->db->where('b.status', '0');
                    $this->db->where('c.status', '0');
                    $this->db->where('a.fec_apertura >=', $finicio);
                    $this->db->where('a.fec_apertura <=', $ffin);
                    $this->db->where('b.planeservicios', $row->id_serv);
                    $this->db->group_by('b.planeservicios');
                    $query = $this->db->get();

                    if( $query->num_rows() > 0 ) {

                        foreach ( $query->result() as $now ) {

                            $crestante = $rows->cdeuda - $now->capagar;

                            $objPHPExcel->setActiveSheetIndex(0)->getStyle('E'.$i.':E'.$i)->applyFromArray($styleArray5);
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $now->cpagada);
                            $objPHPExcel->setActiveSheetIndex(0)->getStyle('F'.$i.':F'.$i)->applyFromArray($styleArray6);
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $crestante);

                            $crestant += $crestante;
                            $total_cpagada += $now->cpagada;
                        }
                    }
                    /*---*/
                    
                    $cantida += $cant->cantidad;
                    $i++;
                }
            }
            /*---*/
        }
    }
    
    if ( $showsub == 1 ) {

        $objPHPExcel->getActiveSheet()->getStyle('D'.$i.':F'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
                                        
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':F' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B'.$i)->applyFromArray($styleArray9);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTALES:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $cantida);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i,$total_cdeuda);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $total_cpagada);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $crestant);
        
        $crestantg += $crestant;
        $cantidag = $cantida;
        $total_cdeudag += $total_cdeuda;
        $total_cpagadag += $total_cpagada;
        $i++;
    }
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(55);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(55);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Proyección y lo Cobrado por Servicio ('.date("Y-m-d").').xlsx"');
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
