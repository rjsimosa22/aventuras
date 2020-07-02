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
->setTitle("Reporte Estado de Cuenta")
->setSubject("Reporte Estado de Cuenta")
->setDescription("Reporte Estado de Cuenta");

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
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A3:A10')->applyFromArray($styleArray6);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'NOMBRE DEL CLIENTE:  '.strtoupper($row['nombre']));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'DIRECCION:  '.strtoupper($row['direccion']));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 'TELEFONO:  '.$row['telf']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6', 'FECHA DE CONTRATO:  '.$row['fecha_cobro']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7', 'CODIGO DE CONTRATO:  '.$row['codigo']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A8', 'NOMBRE DEL SERVICIO:  '.strtoupper($row['servicio']));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A9', 'MONTO DEL SERVICIO:  ₡ '.$row['mtotal']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A10', 'CUOTA MENSUAL:  ₡ '.$row['cmensual']);

$objPHPExcel->setActiveSheetIndex(0)->getStyle('D4:D9')->applyFromArray($styleArray6);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6', 'DIRECCION:  SAN RAFAEL DE OREAMUNO, CARTAGO');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7', 'TELF. OFICINA:  2552 1617 / 2221 2070');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D8', 'TELF. EMERGENCIAS:  7291 6428');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D9', 'MAIL:  servicioalcliente@montesantocr.com');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D10', 'www.montesantocr.com');

// Titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Reporte Estado de Cuenta - '.date('Y-m-d'));
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:L1')->applyFromArray($styleArray4);
define('FORMAT_CURRENCY_PLN_1', '_-* #,##0.00');

// Titulo de las celdas
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A13:E13')->applyFromArray($styleArray);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A13', 'N°')
->setCellValue('B13', 'FACTURA Nº')
->setCellValue('C13', 'FECHA DE FACTURA')
->setCellValue('D13', 'MONTO')
->setCellValue('E13', 'ESTATUS');


if( $listado ) {
    
    if( count($listado) > 0 ) {
        
        $i = 14;
        $c = 1;
        $var = 0;
        $cont = 1;
        $showsub = 1;
        $total_coutas = 0;
        $total_coutasg = 0;
        
       foreach( $listado as $row ) {
              
            $cont = $c++;
            
            $objPHPExcel->getActiveSheet()->getStyle('D'.$i.':D'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
            $objPHPExcel->getActiveSheet()->getStyle('F'.$i.':E'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':J' . $i)->applyFromArray($styleArray2);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('J'.$i.':J'.$i)->applyFromArray($styleArray10);
            
            if( $row->status == '5' ) { 
                
                        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E'.$i)->applyFromArray($styleArray5);
                        $status = "PAGADO"; 
            } else { 
                        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E'.$i)->applyFromArray($styleArray7);
                        $status = "VENCIDO SIN PAGAR"; 
            }
            
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $cont)
            ->setCellValue('B'.$i, $row->comprob_pago)
            ->setCellValue('C'.$i, $row->fec_apertura)
            ->setCellValue('D'.$i, $row->cuota)
            ->setCellValue('E'.$i, $status);

            $i++;
            
            if( $row->status == '5' ) {
                
                $total_coutas+= $row->cuota;
            }
        }
    }
    
    if ( $showsub == 1 ) {

        $objPHPExcel->getActiveSheet()->getStyle('D'.$i.':D'.$i)->getNumberFormat()->setFormatCode('"₡" #,##0.00_);_("₡" \(#,##0.00\);_("₡" "0,00"??_);_(@_))');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $i . ':E' . $i)->applyFromArray($styleArray3);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, "TOTAL DE CUOTAS PAGADAS:");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $total_coutas);
       
        $total_coutasg += $total_coutas;
        $i++;
    }
}
 
//Formato de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(23);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(19);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(21);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a clientÃ¢â‚¬â„¢s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte Estado de Cuenta ('.date("Y-m-d").').xlsx"');
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
