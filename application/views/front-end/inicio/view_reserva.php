
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

                <div class="bs-wizard-step disabled reserva1">
                    <div class="text-center bs-wizard-stepnum">Datos personales</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="<?= site_url("cliente/reserva/$moneda");?>" class="bs-wizard-dot"></a>
                </div>

                <div class="bs-wizard-step disabled">
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
                    <td><center><span class="score"><a href="#sidebar" class="btn_2"> Ir a tramitar reserva</a></span></center></td>
                </tr> 
            </table>
        </center>          
    </div>
</nav>
		
<div class="bg_color_1" id="list_carrito_1">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <h4 style="color:#de1c2f"><u>REVISA TU PEDIDO</u></h4>
                <div class="box_cart" id="box_cart">
                    <table class="table table-striped cart-list table-bordered datatables" id="example">
                        <thead style="background:red;">
                            <tr>
                                <th></th>
                                <th>Descripción</th>
                                <th>Personas</th>
                                <th>Precios</th>
                                <th>llegada</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="listado_carrito_compras">
                            <?php
                                if($listado_compra) {
                                    $precio_total='0';
                                    $cantidad=count($listado_compra);
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
                                        
                                        echo '<tr>
                                                <td style="display:none;" id="textevento_'.$row['textidservicio'].'">'.$row['textevento'].'</td>
                                                <td style="display:none;" id="textprecio">'.$precio.'</td>
                                                
                                                <td>
                                                    <div class="thumb_cart"><img src="'.$imagen.'" alt="Image"></div>
                                                </td>

                                                <td>
                                                    <span class="item_cart text-justify" id="textservicio_'.$row['textidservicio'].'">'.$row['textservicio'].'<br><b>'.$row['textevento'].'</b></span>
                                                </td>

                                                <td>'.$row['textqtyAdulto'].' Adultos, <br>'.$row['textqtyNino'].' Ñinos</td>
                                                
                                                <td>
                                                    '.$monedaI->simbolo.' '.number_format($precio).'
                                                </td>

                                                <td>
                                                    '.$row['textfecha'].'
                                                </td>
                                            
                                                <td class="options" style="width:5%; text-align:center;">
                                                    <a href="javascript:void(0)" onclick="abrirCarrito('.$row['textidservicio'].')"><i class="icon-edit tamano-icono" title="Editar"></i></a>
                                                    <br>    
                                                    <a href="javascript:void(0)" onClick="eliminarCarrito('.$row['textidservicio'].')"><i class="icon-trash tamano-icono" title="Eliminar"></i></a>
                                                </td>
                                        </tr>';
                                        $precio_total+=$precio;
                                    }
                                } else {
                                    $cantidad='0';
                                    $precio_total='0';
                                    echo '<tr><td colspan="6">No hay compras pendientes...</td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                <!--div class="cart-options clearfix">
                    <div class="float-left">
                        <div class="apply-coupon">
                            <div class="form-group">
                                <input type="text" name="coupon-code" value="" placeholder="Your Coupon Code" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn_1 outline">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="float-right fix_mobile">
                        <button type="button" class="btn_1 outline">Update Cart</button>
                    </div>
                </div-->
                <!-- /cart-options -->
            </div>
            </div>
            <!-- /col -->
            <aside class="col-lg-4 top-reserva" id="sidebar">
            <h4>&nbsp;</h4>
                <div class="box_detail">
                    <div id="total_cart">
                        Precio total <span class="float-right"><small class="font-fuente-2 simbolo_pr"><?= $monedaI->simbolo.'&nbsp;';?></small><text id="precio_total"><?= number_format($precio_total);?></text></span>
                    </div>

                    <ul class="cart_details">
                        <li>Cantidad de servicios: <span class="cantidad_servicios"><?= $cantidad;?></span></li>
                    </ul>

                    <span class="color-precio">Esta actividad se esta agotando rápido. Quítate estrés al reservar ya.</span>
                    <hr>
                    
                    <?php if($cantidad > 0) { echo '<a href="'.site_url("cliente/reserva/$moneda").'" class="btn_1 full-width purchase" id="btn-reserva-datos">Confirmar experiencia</a>';}?>
                    <a href="<?= site_url("tours/listado/$moneda");?>" class="btn_1 full-width outline wishlist"><i class="icon-th-list"></i>&nbsp;Reservar más actividades</a>
                    <div class="text-center"><small class="font-small"><b>* Nota:</b> No se cobra dinero en este paso.</small></div>
                </div>
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<!-- pantalla eergente -->
<div id="popup" style="display: none;">
    <div class="content-popup">
        <!--div class="close" style="margin-top:10px;"><a href="#" id="close">X</a></div-->
    <div>
    <h4 class="titulo-popuu">Editar <text id="nombreservicio"></text></h4>
    <h2></h2>
    <div style="float:center; width:100%;">
    <aside class="col-lg-12" id="sidebar" >
    <div class="box_detail booking">
        <div class="price">
            <span class="color-h2"><small id="textmoneda"><?= $monedaI->simbolo.'&nbsp;';?></small><text id="textprecioinf" class="infoPrecio"></text></span>
            <div class="score"><span>Bueno<em>0 Opiniones</em></span><strong>7.5</strong></div>
        </div>

        <span class="color-precio">Esta actividad se esta agotando rápido. Quítate estrés al reservar ya.</span>
        <hr>  

        <div class="form-group">
            <span>País de residencia</span>
            <select class="form-control select-cursor" style="width:100%;" name="textidpaises" id="textidpaises" onchange="qtySum();">
                <?php
                    if($listado_paises) {
                        foreach($listado_paises as $row3) {
                            echo '<option value="'.$row3->descripcion.'" '.$active.'>'.ucfirst(strtolower($row3->descripcion)).'</option>';
                        }
                    }    
                ?>
            </select>    
        </div>

        <span>Fecha de llegada</span>   
        <div class="form-group" id="input_date">
            <input class="form-control select-cursor" type="text" name="textfecha" id="textfecha" placeholder="Fecha...">
            <i class="icon_calendar"></i>
        </div>

        <span>Personas</span>         
        <div class="panel-dropdown">
            <a href="javascript:void(0);">Personas <span class="qtyTotal">1</span></a>
            <div class="panel-dropdown-content right">
                <div class="qtyButtons">
                    <label>Adultos</label>
                    <input type="text" name="textqtyInput" id="textqtyAdulto" value="1">
                </div>
                <div class="qtyButtons">
                    <label>Menores de 2 años</label>
                    <input type="text" name="textqtyInput" id="textqtyNino" value="0">
                </div>
            </div>
        </div>

        <div class="form-group" id="idhoteldiv" style="display:none">
            <span>Hoteles</span>
            <select class="form-control select-cursor" style="width:100%;" name="textidhotel" id="textidhotel" onchange="tipo_habitacion();">
                <?php
                    if($hoteles_seleccion) {
                        foreach($hoteles_seleccion as $row2) {
                            echo '<option value="'.$row2->id.'">'.ucfirst(strtolower($row2->nombre)).'</option>';
                        }
                    }  
                ?>
            </select>    
        </div>
            
        <div class="form-group" id="idhabitaciondiv" style="display:none">
            <span>Tipo de habitaciones</span>   
            <select class="form-control select-cursor textidhabitacion" style="width:100%;" name="textidhabitacion1" id="textidhabitacion1" onchange="elegir_habitacion_valor();"></select>  
        </div>

        <div class="form-group field_wrapper"></div>
        <a href="javascript:void(0);" class="btn_4 full-width outline add_button wishlist" id="add_button" title="Añadir habitación" style="display:none;"><i class="icon-home"></i>&nbsp;Añadir habitación</a>
        <div class="form-group">&nbsp;</div>    
    
        <!--a href="cart-1.html" class="btn_1 full-width purchase">Reservar</a-->
        <div id="message-fecha" class="validar-campo"></div>
        <div id="message-hotel" class="validar-campo"></div>
        <div id="message-personas-adulta" class="validar-campo"></div>
        <div id="message-habitacion1" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion2" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion3" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion4" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion5" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion6" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion7" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion8" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion9" class="validar-campo message-habitacion"></div>
        <div id="message-habitacion10" class="validar-campo message-habitacion"></div>
        
        <input type="hidden" name="textevento" id="textevento">            
        <input type="hidden" name="infoPrecio1" id="infoPrecio1">  
        <input type="hidden" name="textdistrito" id="textdistrito">
        <input type="hidden" name="precio_tours" id="precio_tours">
        <input type="hidden" name="textidservicio" id="textidservicio">
        <input type="hidden" name="texttipocambio" id="texttipocambio"> 
        <input type="hidden" name="textidservicioid" id="textidservicioid"> 
        <input type="hidden" name="textprecio_hotel" id="textprecio_hotel">
        <input type="hidden" name="cantidad_campo" id="cantidad_campo" value="1">
        <input type="hidden" name="valorhiddenaddbtn" id="valorhiddenaddbtn" value="1">
        <input type="button" class="btn_1 full-width purchase" value="Guardar" onclick="editarCarrito();">
        <a href="wishlist.html" class="btn_1 full-width outline wishlist" id="close1">Cerrar</a>
        
    </div>
    <!--ul class="share-buttons">
        <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Compartir</a></li>
        <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Retwittear</a></li>
    </ul-->
</aside>
    </div>
    </div>
    </div>
</div>
<div class="popup-overlay"></div>
<!--fin de pantalla emergente-->