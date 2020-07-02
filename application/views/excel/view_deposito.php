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
->setTitle("Reporte Ganancias Netas")
->setSubject("Reporte Ganancias Netas")
->setDescription("Reporte Ganancias Netas");

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

$styleArray13 = array(
  
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
            'rgb' => 'c62300'
        ),
        'endcolor'   => array(
            'argb' => 'c62300'
        )
    ),
    
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT
    )
);


// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte Ganancias Netas - Período '.$finicio.' Al '.$ffin);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'Renglón de Ventas');
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A3:L3')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A5:I5')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->setAutoFilter('A5:I5');
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A5', 'NRO. DE ORDEN')
->setCellValue('B5', 'FEC. DE VENTA')
->setCellValue('C5', 'FEC. DE PAGO')
->setCellValue('D5', 'OPERACION')
->setCellValue('E5', 'DESCRIPCION')
->setCellValue('F5', 'MONTO TOTAL')
->setCellValue('G5', 'LIQUIDEZ')
->setCellValue('H5', 'RESTANTE')
->setCellValue('I5', 'TIPO DE PAGO');

$i=6;
        
if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $c=1;
        $showsub=1;
        $monto_totalg=0;
        $monto_total=0;
        $monto_cuota=0;
        $monto_cuotag=0;
        $monto_recojog=0;
        $monto_recojo=0;
        $monto_restanteg=0;
        $monto_restante=0;
        $cant_concretadag=0;
        $cant_concretada=0;
        $monto_recibog=0;
        $monto_recibo=0;
        $monto_ingresog=0;
        $monto_ingreso=0;
        $unirpororden='';
        
        foreach( $listado as $row ) {
            $cont = $c++;
        
            $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':H'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray($styleArray2);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':C'.$i)->applyFromArray($styleArray7);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('F'.$i.':I'.$i)->applyFromArray($styleArray7);
            
            $luna='';
            $montura='venta varios';
            $restante='';
            $tarjeta='efectivo';
            if(!empty($row->luna)){$montura=$row->luna;}
            if(!empty($row->tarjeta)){$tarjeta=$row->tarjeta;}
            if(!empty($row->montura)){$montura=$row->montura;}
            if(!empty($row->montura) && !empty($row->luna)){$montura=$row->montura.' / '.$row->luna;}
            
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row->numero_orden)
            ->setCellValue('B'.$i, $row->fecha_de_venta)
            ->setCellValue('C'.$i, $row->fecha_de_pago)
            ->setCellValue('D'.$i, ucwords($row->estatus))
            ->setCellValue('E'.$i, ucwords($montura))
            ->setCellValue('F'.$i, $row->monto_total)
            ->setCellValue('G'.$i, $row->cuota)
            ->setCellValue('H'.$i, $row->restante)
            ->setCellValue('I'.$i, ucwords($tarjeta));
            
            if($row->numero_orden!=$unirpororden) {
                $monto_total += $row->monto_total;
                $unirpororden = $row->numero_orden;
            }
            
            $monto_cuota += $row->cuota;
//            if($tarjeta=="efectivo") {
//                $monto_cuota1 += $row->cuota;
//                $monto_ingreso=(($monto_cuota1 + $monto_recojo) - $monto_recibo) ;
//            }
            $monto_restante =($monto_total - $monto_cuota);
                
            $i++;
        }
    }
    
    if ( $showsub == 1 ) {

        $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':H'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F' . $i . ':I' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, "TOTALES:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $monto_total);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $monto_cuota);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $monto_restante);
        //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $monto_recojo);
        //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $monto_recibo);
        
        $monto_totalg += $monto_total;
        $monto_cuotag += $monto_cuota;
        $monto_restanteg += $monto_restante;
        $cant_concretadag += $cant_concretada;
        $monto_recojog += $monto_recojo;
        $monto_recibog += $monto_recibo;
        $monto_ingresog += $monto_ingreso;
        $i++;
        
    }
    
} else {
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A6:L6')->applyFromArray($styleArray4);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6', 'No hay registros para mostrar');
            
}

$i++;
$i++;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, 'Renglón de Recojos');
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':l'.$i)->applyFromArray($styleArray4);
$i++;
$i++;
// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':I'.$i)->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->setAutoFilter('A'.$i.':I'.$i);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$i, 'NRO. DE ORDEN')
->setCellValue('B'.$i, 'FEC. DE VENTA')
->setCellValue('C'.$i, 'FEC. DE PAGO')
->setCellValue('D'.$i, 'OPERACION')
->setCellValue('E'.$i, 'DESCRIPCION')
->setCellValue('F'.$i, 'MONTO TOTAL')
->setCellValue('G'.$i, 'LIQUIDEZ')
->setCellValue('H'.$i, 'RESTANTE')
->setCellValue('I'.$i, 'TIPO DE PAGO');


if( $listado1 ) {
    
    if( count($listado1) > 0 ) {
        
        $i=$i+1;
        $c=1;
        $showsub=1;
        $monto_totalg=0;
        $monto_total=0;
        $monto_cuota=0;
        $monto_cuotag=0;
        $monto_recojog=0;
        $monto_recojo=0;
        $monto_restanteg=0;
        $monto_restante=0;
        $cant_concretadag=0;
        $cant_concretada=0;
        $monto_recibog=0;
        $monto_recibo=0;
        $monto_ingresog=0;
        $monto_ingreso=0;
        $unirpororden='';
        
        foreach( $listado1 as $row1 ) {
            
            $cont = $c++;
        
            $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':H'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray($styleArray2);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':C'.$i)->applyFromArray($styleArray7);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('F'.$i.':I'.$i)->applyFromArray($styleArray7);
             
            $luna='';
            $montura='venta varios';
            $restante='';
            $tarjeta='efectivo';
            if(!empty($row1->luna)){$montura=$row1->luna;}
            if(!empty($row1->tarjeta)){$tarjeta=$row1->tarjeta;}
            if(!empty($row1->montura)){$montura=$row1->montura;}
            if(!empty($row1->montura) && !empty($row1->luna)){$montura=$row1->montura.' / '.$row1->luna;}
            
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row1->numero_orden)
            ->setCellValue('B'.$i, $row1->fecha_de_venta)
            ->setCellValue('C'.$i, $row1->fecha_de_pago)
            ->setCellValue('D'.$i, ucwords($row1->estatus))
            ->setCellValue('E'.$i, ucwords($montura))
            ->setCellValue('F'.$i, $row1->monto_total)
            ->setCellValue('G'.$i, $row1->cuota)
            ->setCellValue('H'.$i, $row1->restante)
            ->setCellValue('I'.$i, ucwords($tarjeta));
            
            if($row1->numero_orden!=$unirpororden) {
                $monto_total += $row1->monto_total;
                //$monto_recojo += $row1->monto_recojo;
                //$monto_recibo += $row1->mrecibo;
                $unirpororden = $row1->numero_orden;
            }
            
            $monto_cuota += $row1->cuota;
            $monto_restante += $row1->restante;
                
//            if($tarjeta=='efectivo') {
//                $monto_ingreso=(($monto_cuota + $monto_recojo) - $monto_recibo) ;
//            }
            $i++;
        }
    }
    
    if ( $showsub == 1 ) {

         $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':H'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F' . $i . ':I' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, "TOTALES:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $monto_total);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $monto_cuota);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $monto_restante);
        //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $monto_recojo);
        //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $monto_recibo);
      
        
        $monto_totalg += $monto_total;
        $monto_cuotag += $monto_cuota;
        $monto_restanteg += $monto_restante;
        $cant_concretadag += $cant_concretada;
        $monto_recojog += $monto_recojo;
        $monto_recibog += $monto_recibo;
        $monto_ingresog += $monto_ingreso;
        $i++;
        $i++;
        $i++;
        
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i.':E'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D' . $i . ':E' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E' . $i . ':E' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, "LIQUIDEZ: ");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $monto_cuota);
        $i++;
        
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i.':E'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D' . $i . ':E' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E' . $i . ':E' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, "RECOJOS: ");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $monto_recojo);
        $i++;
        
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i.':E'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/" \(#,##0.00\);_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D' . $i . ':E' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E' . $i . ':E' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, "GASTOS OPERACIONALES: ");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $monto_recibo);
        $i++;
        
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i.':E'.$i)->getNumberFormat()->setFormatCode('"S/" #,##0.00_);_("S/-" #,##0.00;_("S/" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D' . $i . ':E' . $i)->applyFromArray($styleArray13);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E' . $i . ':E' . $i)->applyFromArray($styleArray8);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, "TOTAL: ");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $monto_ingreso);
        $i++;
    }
    
} else {
            $i++;
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$i.':L'.$i)->applyFromArray($styleArray4);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, 'No hay registros para mostrar');
            
}

 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(24);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(16);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(16);



// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte Ganancias Netas ('.date("Y-m-d").').xlsx"');
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
