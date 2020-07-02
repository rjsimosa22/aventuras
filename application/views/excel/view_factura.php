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
->setTitle("Reporte por Inventario")
->setSubject("Reporte de Inventario")
->setDescription("Reporte de Inventario");

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
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT
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
    
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 8,
        'name'  => 'Verdana'
    )
);

$styleArray8 = array(
  
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
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER
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

$styleArray11 = array(
  
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
        'size'  => 8,
        'name'  => 'Verdana'
    )
);




// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte de Inventario - Período '.$finicio.' Al '.$ffin);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A3:G3')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->setAutoFilter('A3:G3');
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A3', '#')
->setCellValue('B3', 'INVENTERIO / VITRINA')
->setCellValue('C3', 'CANT. ACTUAL')
->setCellValue('D3', 'MOVIMIENTO')
->setCellValue('E3', 'TIPO DE MOVIMIENTO')
->setCellValue('F3', 'CANT.RESTANTE')
->setCellValue('G3', 'FECHA');

if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i=4;
        $c=1;
        $showsub=1;
//        $cant_concretadag=0; 
//        $cant_concretada=0;
//        $mont_concretadag=0;
//        $mont_concretada=0;
//        $cant_recojog=0;
//        $cant_recojo=0;
//        $mont_recojog=0;
//        $mont_recojo=0;
//        $proy_mont_recojog=0;
//        $proy_mont_recojo=0;
//        $cant_anuladag=0;
//        $cant_anulada=0;
//        $proy_mont_anuladag=0;
//        $proy_mont_anulada=0;
        
        foreach( $listado as $row ) {
            $cont = $c++;
            
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':G' . $i)->applyFromArray($styleArray2);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':A'.$i)->applyFromArray($styleArray7);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$i.':D'.$i)->applyFromArray($styleArray7);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('F'.$i.':G'.$i)->applyFromArray($styleArray7);


            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $cont)
            ->setCellValue('B'.$i, ucwords($row->descripcion))
            ->setCellValue('C'.$i, $row->cantidad_actual)
            ->setCellValue('D'.$i, $row->cantidad)
            ->setCellValue('E'.$i, $row->estatus)
            ->setCellValue('F'.$i, $row->cantidad_nueva)
            ->setCellValue('G'.$i, $row->fecha_registro);
            
//            $cant_recojo += $cr;
//            $mont_recojo += $mr;
//            $cant_anulada += $ca;
//            $cant_concretada += $cc;
//            $mont_concretada += $mc;
//            $proy_mont_recojo += $pmr;
//            $proy_mont_anulada += $pma;
            $i++;
        }
    }
    
//    if ( $showsub == 1 ) {
//
//        $objPHPExcel->getActiveSheet()->getStyle('D'.$i.':D'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
//        $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
//        $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':I'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
//        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray($styleArray3);
//        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C' . $i . ':I' . $i)->applyFromArray($styleArray8);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTALES:");
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $cant_concretada);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $mont_concretada);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $cant_recojo);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $proy_mont_recojo);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $mont_recojo);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $cant_anulada);
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $proy_mont_anulada);
//        
//        
//        $cant_recojog += $cant_recojo;
//        $mont_recojog += $mont_recojo;
//        $cant_anuladag += $cant_anulada;
//        $cant_concretadag += $cant_concretada;
//        $mont_concretadag += $mont_concretada;
//        $proy_mont_recojog += $proy_mont_recojo;
//        $proy_mont_anuladag += $proy_mont_anulada;
//        $i++;
//    }
    
} else {
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A10:L10')->applyFromArray($styleArray4);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A10', 'No hay registros para mostrar');
            
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(24);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(19);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(22);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Inventario ('.date("Y-m-d").').xlsx"');
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
