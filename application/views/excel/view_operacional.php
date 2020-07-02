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
->setTitle("Reporte de Gastos Operacionales")
->setSubject("Reporte de Gastos Operacionales")
->setDescription("Reporte de Gastos Operacionales");

// Estilo de celdas
$styleArray = array(
    
    'font'  => array(
        'size'  => 8,
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

$styleArray2 = array(
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 8,
        'name'  => 'Verdana'
    )
);

$styleArray3 = array(
  
    'font'  => array(
        'size'  => 8,
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
        'size'  => 8,
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
        'size'  => 8,
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
        'size'  => 8,
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
        'size'  => 8,
        'name'  => 'Verdana'
    )
);

$styleArray9 = array(
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 8,
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
        'size'  => 8,
        'name'  => 'Verdana'
    )
);

// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte de Gastos Operacionales - Período '.$finicio.' Al '.$ffin);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A3:J3')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->setAutoFilter('A3:J3');
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A3', 'N°')
->setCellValue('B3', 'FECHA DEL RECIBO')
->setCellValue('C3', 'NUMERO DE RECIBO')
->setCellValue('D3', 'CATEGORIA DEL SERVICIO')
->setCellValue('E3', 'TIPO DE SERVICIO')
->setCellValue('F3', 'D.N.I')
->setCellValue('G3', 'CIUDADANO / EMPRESA')
->setCellValue('H3', 'TELEFONO')
->setCellValue('I3', 'MONTO DE RECIBO')
->setCellValue('J3', 'OBSERVACION');

if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i = 4;
        $c = 1;
        $showsub = 1;
        $total_recibo = 0;
        $total_recibog = 0;
        
        foreach( $listado as $row ) {
            
            $cont = $c++;
                    
            $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':I'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':J' . $i)->applyFromArray($styleArray2);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('J'.$i.':J'.$i)->applyFromArray($styleArray10);
            
            if( !empty($row->cedula) ) { $ced = $row->cedula;} else { $ced = "N/A"; }
            if( !empty($row->telefono) ) { $tlf = $row->telefono;} else { $tlf = "N/A"; }
            
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $cont)
            ->setCellValue('B'.$i, strtoupper($row->frecibo))
            ->setCellValue('C'.$i, strtoupper($row->nrecibo))
            ->setCellValue('D'.$i, ucwords($row->categoria))
            ->setCellValue('E'.$i, ucwords($row->tipo))
            ->setCellValue('F'.$i, $ced)
            ->setCellValue('G'.$i, ucwords($row->nombre." ".$row->apellido))
            ->setCellValue('H'.$i, $tlf)
            ->setCellValue('I'.$i, $row->mrecibo)
            ->setCellValue('J'.$i, ucfirst($row->detalle));

            $total_recibo += $row->mrecibo;
            $i++;
           
        }
    }
    
    if ( $showsub == 1 ) {

        $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':I'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':J' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTALES:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $total_recibo);
        
        $total_recibog += $total_recibo;
        $i++;
    }
    
} else {
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A4:L4')->applyFromArray($styleArray4);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'No hay registros para mostrar');
            
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Gastos Operacionales ('.date("Y-m-d").').xlsx"');
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
