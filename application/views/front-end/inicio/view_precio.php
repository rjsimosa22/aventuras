<aside class="col-lg-4" id="sidebar">
    <div class="box_detail booking">
        <div class="price">
            <?php 
                if(@$info_precio) {
                    $precio=$info_precio;
                    $precio_soles=$info->precio_soles;
                    $tipo_cambio=$inf_costo['tipo_cambio'];
                    $precio_hotel=$inf_habitacion->precio_minimo;
                } else {
                    $precio_hotel='0';
                    $precio=$info->precio;
                    $tipo_cambio=$info->tipo_cambio;
                    $precio_soles=$info->precio_soles;
                }
            ?>
            <span class="color-h2"><small id="textmoneda"><?= $monedaI->simbolo.'&nbsp;';?></small><text class="infoPrecio"><?= number_format($precio);?></text></span>
            <div class="score"><span>Bueno<em>0 Opiniones</em></span><strong>7.0</strong></div>
        </div>
        
        <span class="color-precio">Esta actividad se esta agotando rápido. Quítate estrés al reservar ya.</span>
        <hr>        
        
        <div class="form-group">
            <span>País de residencia</span>
            <select class="form-control select-cursor" style="width:100%;" name="textidpaises" id="textidpaises" onchange="qtySum();">
                <?php
                    if($listado_paises) {
                        foreach($listado_paises as $row3) {
                            $active='';
                            if($row3->descripcion=='Perú') {
                                $active="selected";
                            }
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
                
        <?php if($evento=="Paquetes") { ?>
            <div class="form-group">
                <span>Hoteles</span>
                <select class="form-control select-cursor" style="width:100%;" name="textidhotel" id="textidhotel" onchange="tipo_habitacion();">
                    <?php
                        if($hoteles_seleccion) {
                            foreach($hoteles_seleccion as $row2) {
                                $select='';
                                if($row2->id_hoteles==$inf_habitacion->id_hoteles){
                                    $select='selected';
                                }
                                echo '<option value="'.$row2->id_hoteles.'" '.$select.'>'.ucfirst(strtolower($row2->nombre)).'</option>';
                            }
                        }    
                    ?>
                </select>    
            </div>
            
            <div class="form-group">
                <span>Tipo de habitaciones</span>   
                <select class="form-control select-cursor textidhabitacion" style="width:100%;" name="textidhabitacion1" id="textidhabitacion1" onchange="elegir_habitacion_valor();">
                    <?php
                        if($listado_habitaciones) {
                            foreach($listado_habitaciones as $row3) {
                                $select='';
                                if($row3->id==$inf_habitacion->id_habitaciones){
                                    $select='selected';
                                }
                                echo '<option value="'.$row3->id.'" '.$select.'>'.ucfirst(strtolower($row3->nombre)).'</option>';
                            }
                        }    
                    ?>
                </select>
            </div>

            <div class="form-group field_wrapper"></div>
            <a href="javascript:void(0);" class="btn_4 full-width outline add_button wishlist" id="add_button" title="Añadir habitación"><i class="icon-home"></i>&nbsp;Añadir habitación</a>
            <div class="form-group">&nbsp;</div>        
        <?php } ?> 
        
        
        <input type="hidden" name="cantidad_campo" id="cantidad_campo" value="1">
        <input type="hidden" name="textidservicioid" id="textidservicioid" value=""> 
        <input type="hidden" name="textprecio" id="textprecio" value="<?= $precio;?>">
        <input type="hidden" name="textevento" id="textevento" value="<?= $evento;?>">
        <input type="hidden" name="valorhiddenaddbtn" id="valorhiddenaddbtn" value="1">
        <input type="hidden" name="textimagen" id="textimagen" value="<?= $url_img;?>">
        <input type="hidden" name="textdistrito" id="textdistrito" value="<?= $distrito;?>">
        <input type="hidden" name="infoPrecio1" id="infoPrecio1" value="<?= $precio_soles;?>">
        <input type="hidden" name="textidservicio" id="textidservicio" value="<?= $info->id;?>">
        <input type="hidden" name="textduracion" id="textduracion" value="<?= $info->duracion;?>">
        <input type="hidden" name="texttipocambio" id="texttipocambio" value="<?= $tipo_cambio;?>">
        <input type="hidden" name="textprecio_hotel" id="textprecio_hotel" value="<?= $total_hotel_actual;?>">
        <input type="hidden" name="textfechacompra" id="textfechacompra" value="<?= date('d-m-Y H:i:s');?>">
        
        <!--a href="cart-1.html" class="btn_1 full-width purchase">Reservar</a-->
        <div id="message-paises" class="validar-campo"></div>
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
                        
        <input type="button" class="btn_1 full-width purchase btnrserva" value="Reservar">
        <a href="wishlist.html" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i>&nbsp;Añadir a favoritos</a>
        <?php if($evento=="Paquetes") { ?><div class="text-justify"><small class="font-small"><b>* Nota:</b> Se recuerda que el hotel y su tipo de habitación, son parte del paquete inicial si usted desea otro hotel o tipo de habitación el precio puede variar. No se cobra dinero en este paso.</small></div><?php } else {?><div class="text-center"><small class="font-small"><b>* Nota:</b> No se cobra dinero en este paso.</small></div><?php }?>
    </div>
    <!--ul class="share-buttons">
        <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Compartir</a></li>
        <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Retwittear</a></li>
    </ul-->
</aside>