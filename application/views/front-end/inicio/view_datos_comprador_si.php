<!-- /banner-->
<!--div class="hero_in cart_section">
    <div class="wrapper">
        <div class="container">
            <h3 class="titulo-carrito">RESUMEN DE RESERVAS EN AVENTURAS</h3>
			<div class="bs-wizard clearfix">
                <div class="bs-wizard-step active reserva0">
                    <div class="text-center bs-wizard-stepnum">Revisa tu pedido</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="<?= site_url("reserva/carrito/$moneda");?>" class="bs-wizard-dot"></a>
                </div>

                <div class="bs-wizard-step active reserva1">
                    <div class="text-center bs-wizard-stepnum">Datos personales</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="<?= site_url("cliente/reserva/$moneda");?>" class="bs-wizard-dot"></a>
                </div>

                <div class="bs-wizard-step disabled reserva2">
                    <div class="text-center bs-wizard-stepnum">Realizar pago</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="javascript:void(0)" class="bs-wizard-dot"></a>
                </div>
            </div>
        </div>
    </div>
</div-->
<!-- /banner-->
<br><br><br>
<nav class="secondary_nav sticky_horizontal div_movil_fijo">
    <div class="container text-center display_submenu2">
        <center>
            <table width="100%">
                <tr>
                    <td><center><span class="score"><a href="#sidebar" class="btn_2"> Ir a continuar</a></span></center></td>
                </tr> 
            </table>
        </center>          
    </div>
</nav>

<div class="bg_color_1">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8" style="border:1px solid #dee2e6;background:#fff;border-radius:5px;">
                <div class="box_cart">
                &nbsp;
                <div class="form_title">
                    <h3><strong><i class="icon-user"></i></strong>DATOS PERSONALES</h3>
                    <p><i class="icon-asterisk"></i> Para seguir con su reserva, debes llenar el siguiente formulario.</p>
                </div>
                <hr>
                <div class="step">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>TIPO DE DOCUMENTO</label>
                                <select class="form-control" name="textipodocres" id="textipodocres">
                                    <?php
                                        $select1='';$select2='';$select3='';$select4='';$select5='';
                                        switch ($datos_personales[0]['textipodocres']) {
                                            case 'DNI':$select1="selected";break;
                                            case 'RUC': $select2="selected";break;
                                            case 'Otros': $select5="selected";break;
                                            case 'C.E': $select4="selected";break;
                                        }
                                    ?>
                                    
                                    <option value="DNI" <?= $select1;?>>D.N.I</option>
                                    <option value="RUC" <?= $select2;?>>R.U.C</option>
                                    <option value="C.E" <?= $select4;?>>CARNET EXTRANJERIA</option>
                                    <option value="OTROS" <?= $select5;?>>OTROS</option>
                                </select>    
                                <div id="message-tdocumento" class="validar-campo"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NÚMERO DE DOCUMENTO</label>
                                <input type="number" class="form-control" id="textdocumentores" name="textdocumentores" placeholder="Número de documento" value="<?= $datos_personales[0]['textdocumentores'];?>">
                                <div id="message-ndocumento" class="validar-campo"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NOMBRES</label>
                                <input type="text" class="form-control" id="textnombresres" name="textnombresres" placeholder="Nombres" value="<?= $datos_personales[0]['textnombresres'];?>">
                                <div id="message-nombre" class="validar-campo"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>APELLIDOS</label>
                                <input type="text" class="form-control" id="textapellidosres" name="textapellidosres" placeholder="Apellidos" value="<?= $datos_personales[0]['textapellidosres'];?>">
                                <div id="message-apellido" class="validar-campo"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>TELÉFONO</label>
                                <input name="textoutputres" type="hidden" id="textoutputres" value="<?= $datos_personales[0]['textoutputres'];?>">
                                <input type="tel" id="textnumerores" name="textnumerores" class="form-control validaSoloNumeros" value="<?= $datos_personales[0]['textnumerores'];?>">
                                <div id="message-telefono" class="validar-campo"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CORREO ELECTRÓNICO</label>
                                <input type="email" id="textemailres" name="textemailres" class="form-control" placeholder="Correo electrónico" value="<?= $datos_personales[0]['textemailres'];?>">
                                <div id="message-email" class="validar-campo"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row padding-text">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php
                                if($listado_compra) {
                                    foreach($listado_compra as $row) { 
                                        if($moneda=='') {
                                            $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                                            $precio=round(ceil((($precio) + $row['textprecio_hotel'])),2);
                                            
                                            if($row['textidpaises']!='Perú') {
                                                if($row['textdistrito']=='cusco') {
                                                    $porcentaje=((($precio) / 100) * 20);
                                                    $precio=ceil((($precio) + $porcentaje));
                                                }
                                            }
                                        } else {
                                            $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                                            $precio=round(ceil(((($precio) + $row['textprecio_hotel']) / $row['texttipocambio'])),2);

                                            if($row['textidpaises']!='Perú') {
                                                if($row['textdistrito']=='cusco') {
                                                    $porcentaje=((($precio) / 100) * 20);
                                                    $precio=(($precio) + $porcentaje);
                                                }
                                            }
                                        }

                                        echo '  <input type="hidden" name="servicio" id="servicio_'.$row['textidservicio'].'" value="'.$row['textidservicio'].'">
                                                <table width="100%" class="inf-web">
                                                    <tr>
                                                        <!--td width="200px"><img src="row textimagen" alt="" class="img-fluid mr-3"></td-->
                                                        <td>
                                                            <table width="98%" border="0" align="center">
                                                                <tr>
                                                                    <td class="titulo-detalle" colspan="4"><b>'.$row['textservicio'].'</b></td>
                                                                </tr>
                                                                
                                                                <tr style="color:#795548;">
                                                                    <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-calendar-inv tamano-icono-res"></i><br>'.$row['textfecha'].'<br>Llegada&nbsp;</td>
                                                                    <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-adult tamano-icono-res"></i><br>'.$row['textqtyAdulto'].'<br>Adultos&nbsp;</td>
                                                                    <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-child tamano-icono-res"></i><br>'.$row['textqtyNino'].'<br>Niños&nbsp;</td>
                                                                    <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%;border-right:2px solid #f38b5a;width:25%" align="center"><i class="icon-stopwatch-1 tamano-icono-res"></i><br>'.ucfirst(strtolower($row['textduracion'])).'<br>Duración&nbsp;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table width="100%" class="inf-movil">
                                                    <tr>
                                                        <td class="titulo-detalle" colspan="4"><b>'.$row['textservicio'].'</u></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4"><b>&nbsp;</u></td>
                                                    </tr>

                                                    <!--tr>
                                                         <td colspan="4"><img src="'.$row['textimagen'].'" alt="" class="img-fluid mr-3"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp;</td>
                                                    </tr-->
                                                    
                                                    <tr style="color:#795548;">
                                                        <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-calendar-inv tamano-icono-res"></i><br>'.$row['textfecha'].'<br>Llegada&nbsp;</td>
                                                        <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-adult tamano-icono-res"></i><br>'.$row['textqtyAdulto'].'<br>Adultos&nbsp;</td>
                                                        <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%" align="center"><i class="icon-child tamano-icono-res"></i><br>'.$row['textqtyNino'].'<br>Niños&nbsp;</td>
                                                        <td style="background:#cccccc7a;border-left:2px solid #f38b5a;width:25%;border-right:2px solid #f38b5a;width:25%" align="center"><i class="icon-stopwatch-1 tamano-icono-res"></i><br>'.ucfirst(strtolower($row['textduracion'])).'<br>Duración&nbsp;</td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <br>        
                                            ';
                                        
                                        if($row['textevento']=='Tours') {
                                            echo '  <div class="row"> 
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>PUNTO DE RECOJO</label>
                                                                <textarea id="textrecojores_'.$row['textidservicio'].'" name="textrecojores" rows="3" cols="100%" class="form-control" placeholder="Punto de recojo">'.$row['textrecojores'].'</textarea>
                                                                <div id="message-recojo-'.$row['textidservicio'].'" class="validar-campo"></div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                        } else {
                                            echo '  
                                                    <div class="row"> 
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>AEROLÍNEA DE VUELO</label>
                                                                <input type="text" id="textairolineavuelores_'.$row['textidservicio'].'" name="textairolineavuelores" class="form-control" placeholder="Aerolínea de vuelo" value="'.$row['textairolineavuelores'].'">
                                                                <div id="message-airolinea-'.$row['textidservicio'].'" class="validar-campo"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>NUMERO DE VUELO</label>
                                                                <input type="text" id="textrenumerovuelores_'.$row['textidservicio'].'" name="textrenumerovuelores" class="form-control" placeholder="Numero de vuelo" value="'.$row['textrenumerovuelores'].'">
                                                                <div id="message-numerovuelo-'.$row['textidservicio'].'" class="validar-campo"></div>
                                                            </div>
                                                        </div>    
                                                    </div>';
                                        }

                                        echo '  <div class="row"> 
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>COMENTARIO AL PROVEEDOR</label>
                                                            <textarea id="textcomentariores_'.$row['textidservicio'].'" name="textcomentariores" rows="3" cols="100%" class="form-control" placeholder="Comentario al proveedor">'.$row['textcomentariores'].'</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                                    }

                                    if(count($listado_compra) > 1) {
                                        echo '<hr>';
                                    }
                                }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        
        <aside class="col-lg-4" id="sidebar">
            <div class="box_detail">
                <div id="total_cart">RESUMEN DE PEDIDO</div>
                <?php
                    if($listado_compra) {
                        $precio_total=0;
                        foreach($listado_compra as $row) { 

                            $corte=explode("tours/",$row['textimagen']);
                            $imagen=$corte[0].'tours/small/'.$corte[1];

                            if($moneda=='') {
                                $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                                $precio=round(ceil((($precio) + $row['textprecio_hotel'])),2);
                                
                                if($row['textidpaises']!='Perú') {
                                    if($row['textdistrito']=='cusco') {
                                        $porcentaje=((($precio) / 100) * 20);
                                        $precio=ceil((($precio) + $porcentaje));
                                    }
                                }
                            } else {
                                $precio=($row['infoPrecio']) * $row['textqtyAdulto'];
                                $precio=round(ceil(((($precio) + $row['textprecio_hotel']) / $row['texttipocambio'])),2);
                                
                                if($row['textidpaises']!='Perú') {
                                    if($row['textdistrito']=='cusco') {
                                        $porcentaje=((($precio) / 100) * 20);
                                        $precio=(($precio) + $porcentaje);
                                    }
                                }
                            }

                            echo '
                                    <ul class="cart_details">
                                        <li class="titulo-detalle"><img src="'.$imagen.'" alt="" class="img-fluid mr-3"></li>
                                        <li class="titulo-detalle"><b>'.$row['textservicio'].'</b></li>
                                        <li>Llegada:<span>'.$row['textfecha'].'</span></li>
                                        <li>Personas:<span>'.$row['textqtyAdulto'].' Adultos<br>'.$row['textqtyNino'].' Niños</span></li>
                                        <li class="titulo-cancelacion">&nbsp;</li>
                                        <li class="titulo-detalle"><b>&nbsp;<span><small class="font-fuente-2">'.$monedaI->simbolo.'</small>&nbsp;'.number_format($precio).'</span></b></li>
                                    </ul>
                                ';
                            $precio_total+=$precio;  
                        }
                    }
                ?>

                <div id="total_cart_2">
                    Precio total <span class="float-right"></i>&nbsp;<small class="font-fuente-2 simbolo_pr"><?= $monedaI->simbolo.'&nbsp;';?></small><?= number_format($precio_total);?></span>
                </div>

                <span class="color-precio">Esta actividad se esta agotando rápido. Quítate estrés al reservar ya.</span>
                <hr>        

                <input type="button" class="btn_1 full-width purchase btn-continuar" value="Continuar">
                <a href="<?= site_url("reserva/carrito/$moneda");?>" class="btn_1 full-width outline wishlist"><i class="icon-edit"></i>&nbsp;Editar carrito</a>
                <a href="<?= site_url("tours/listado/$moneda");?>" class="btn_1 full-width outline wishlist"><i class="icon-th-list"></i>&nbsp;Reservar más actividades</a>
                <div class="text-center"><small class="font-small"><b>* Nota:</b> No se cobra dinero en este paso.</small></div>
            </div>
        </aside>
    </div>
</div>
