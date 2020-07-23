
<!-- /banner-->
<!--div class="hero_in cart_section">
    <div class="wrapper">
        <div class="container">
            <h3 class="titulo-carrito">RESUMEN DE RESERVAS EN AVENTURAS</h3>
			<div class="bs-wizard clearfix">
                <div class="bs-wizard-step reserva0">
                    <div class="text-center bs-wizard-stepnum">Revisa tu pedido</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="<?= site_url("reserva/carrito/$moneda");?>" class="bs-wizard-dot"></a>
                </div>

                <div class="bs-wizard-step reserva1">
                    <div class="text-center bs-wizard-stepnum">Datos personales</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="<?= site_url("cliente/reserva/$moneda");?>" class="bs-wizard-dot"></a>
                </div>

                <div class="bs-wizard-step active">
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
                    <td><center><span class="score"><a href="#sidebar" class="btn_2"> Ir a realizar pago</a></span></center></td>
                </tr> 
            </table>
        </center>          
    </div>
</nav>
		
<div class="bg_color_1" id="list_carrito_1">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <h4 style="color:#de1c2f"><u>LISTADO DE RESERVA</u></h4>
                <div class="box_cart" id="box_cart">
                    <table class="table table-striped cart-list table-bordered datatables" id="example">
                        <thead style="background:red;">
                            <tr>
                                <th></th>
                                <th>Descripción</th>
                                <th>Personas</th>
                                <th>Precios</th>
                                <th>llegada</th>
                            </tr>
                        </thead>
                        <tbody id="listado_carrito_compras">
                            <?php
                                $preference_data=0;
                                if($listado_compra) {
                                    $mp=new MP("3103091490701971","Gs7TeCt3CLhqkIi6vXRK9ecBiOufvCui");
                                   
                                    $precio_total='0';
                                    $arrayServiciosU=array();
                                    $arrayServiciosU=[];
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
                                                <td style="display:none;" id="textprecio">'.$precio.'</td>
                                                <td style="display:none;" id="tipo_mercado_pago">'.$monedaI->tipo_mercado_pago.'</td>
                                                <td style="display:none;" id="textevento_'.$row['textidservicio'].'">'.$row['textevento'].'</td>
                                                
                                                <td>
                                                    <div class="thumb_cart"><img loading="lazy" src="'.$imagen.'" alt="Image"></div>
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
                                        </tr>';
                                        $precio_total+=$precio;
                                    }

                                    $arrayServiciosUL=array(
                                            "title"=>'Compra en aventuras tours',//ucfirst(strtolower($row['textservicio'])),
                                            "currency_id"=>$monedaI->tipo_mercado_pago,
                                            "category_id"=>$row['textevento'],
                                            "quantity"=>1,
                                            "unit_price"=>$precio_total
                                    );
                                    array_push($arrayServiciosU,$arrayServiciosUL);

                                    $preference_data = array(
                                        "items" =>$arrayServiciosU,
                                        "payer"=>array(
                                            "date_created"=>date('Y-m-d H:i:s'),
                                            "email"=>$datos_personales[0]['textemailres'],
                                            "name" => $datos_personales[0]['textnombresres'],
                                            "surname"=>$datos_personales[0]['textapellidosres'],
                                            "phone"=>array(
                                                "number"=>$datos_personales[0]['textnumerores'],
                                                "area_code"=>$datos_personales[0]['textoutputres'],
                                            ),
                                            "identification"=>array(
                                                "type"=>$datos_personales[0]['textipodocres'],
                                                "number"=>$datos_personales[0]['textdocumentores']
                                            ),
                                        ),
                                        "back_urls" => array(
                                            "success" => site_url("tramite/pago/exitoso/"),
                                        ),
                                        "auto_return" => "approved",
                                        "payment_methods" => array(
                                            "excluded_payment_methods" => array(
                                                array(
                                                    "id" => "amex",
                                                )
                                            ),
                                            "excluded_payment_types" => array(
                                                array(
                                                    "id" => "ticket"
                                                )
                                            ),
                                            "installments" => 24,
                                            "default_payment_method_id" => null,
                                            "default_installments" => null,
                                        ),
                                        "shipments" => array(
                                            "receiver_address" => array(
                                                "zip_code" => "1430",
                                                "street_name"=> "Street",
                                                "floor"=> 4,
                                                "apartment"=> "C"
                                            )
                                        ),
                                        
                                        "notification_url" => "https://www.your-site.com/ipn",
                                            "external_reference" => "Reference_1234",
                                            "expires" => false,
                                            "expiration_date_from" => null,
                                            "expiration_date_to" => null
                                    );
                                    $preference=$mp->create_preference($preference_data);
                                } else {
                                    $cantidad='0';
                                    $precio_total='0';
                                    echo '<tr><td colspan="6">No hay compras pendientes...</td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                    <!--div class="cart-options clearfix" style="display:none;">
                        <div class="float-right">
                            <div class="apply-coupon">
                                <div class="form-group">
                                    <input type="text" name="textcoupon" id="textcoupon" value="" placeholder="Su código de cupón" class="form-control">
                                    <div id="message-cupon" class="validar-campo"></div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn_1 outline btn-cupon">Aplicar cupón</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="float-right text-cupon" ><span class="text-cupon-titulo">* APLICAR</span> el cupón de descuento en su compra.&nbsp;&nbsp;</p-->
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

                    <?php 
                        if($listado_compra) {  
                    ?>                      
                            <div id="total_cart">Información de pago</div>
                            
                            <ul class="cart_details">
                                <li>Pague de forma segura: usamos cifrado SSL para proteger sus datos.</li>
                                <li><input type="radio" name="valorPago" value="GooglePay" class="icheck tipo_pago" checked>Con Google Pay <img src="<?= site_url('public/front-end/img/pay.png');?>" title="Comprar con google pay" width="50px" height="30px"></li>
                                <li><input type="radio" name="valorPago" value="MercadoPago" class="icheck tipo_pago">Con Mercado Pago <img src="<?= site_url('public/front-end/img/mercadopago.png');?>" title="Comprar con mercado pago" width="45px" height="35px"></li>
                            </ul>

                            <div id="container" class="VGooglePay"></div>
                            <a href="<?= $preference["response"]["init_point"];?>" name="MP-Checkout" class="btn_1 full-width purchase VMercadoPago" id="btn-reserva-datos" style="display:none;">Comprar con Mercado Pago</a>
                            <a href="<?= site_url("reserva/carrito/$moneda");?>" class="btn_1 full-width outline wishlist"><i class="icon-edit"></i>&nbsp;Editar carrito</a>
                    <?php
                        }
                    ?>
                    <a href="<?= site_url("tours/listado/$moneda");?>" class="btn_1 full-width outline wishlist"><i class="icon-th-list"></i>&nbsp;Reservar más actividades</a>            
                </div>
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->
