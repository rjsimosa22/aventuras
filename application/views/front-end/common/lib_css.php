<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#de1c2f" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Encuentra los mejores tours en Perú, tenemos los paquetes turísticos más completos para una experiencia de completa aventura.">
        <meta property="og:image" content="<?=base_url()."public/img/tours/".$imagen_tours;?>" />
        <meta property="og:image:width" content="828" />
        <meta property="og:image:height" content="450" />
        <title><?= $titulo;?></title>
        <!-- FAVICONS -->
        <link rel="shortcut icon" href="<?= base_url();?>public/front-end/img/favicon.ico" type="image/x-icon">     
        <!-- GOOGLE WEB FONT -->
        <link href="<?= base_url();?>public/front-end/css/googleapis.css?v=<?= time();?>" rel="stylesheet">
        <link href="<?= base_url();?>public/front-end/css/bootstrap.min.css?v=<?= time();?>" rel="stylesheet">
        <link href="<?= base_url();?>public/front-end/css/style.css?v=<?= time();?>" rel="stylesheet">
        <link href="<?= base_url();?>public/front-end/css/vendors.css?v=<?= time();?>" rel="stylesheet">
        <link href="<?= base_url();?>public/front-end/css/jquery-ui.css?v=<?= time();?>" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-065KQG1VB8"></script>
        <script>
            window.dataLayer=window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-065KQG1VB8');
        </script>

        <!-- SMARTSUPP LIVE CHAT SCRIPT -->
        <script type="text/javascript">
            var cupon_compra=<?= json_encode($this->session->userdata('cupon_compra'));?>;
            var listado_compra=<?= json_encode($this->session->userdata('listado_compra'));?>;
            /*var _smartsupp=_smartsupp || {};
            _smartsupp.key='b6d8430d5a7a6b24174b2ca6a4c3ced5c333ac15';
            window.smartsupp||(function(d) {
                var s,c,o=smartsupp=function() { 
                    o._.push(arguments)
                };
                    o._=[];
                    _smartsupp.widget="button";
                    _smartsupp.ratingComment=true;
                    s=d.getElementsByTagName('script')[0];
                    c=d.createElement('script');
                    c.type='text/javascript';
                    c.charset='utf-8';
                    c.async=true;
                    c.src='https://www.smartsuppchat.com/loader.js?';
                    s.parentNode.insertBefore(c,s);
            })(document);*/
        </script>
    </head>
    
    <body>
        <div id="page">
            <input type="hidden" name="texturl" id="texturl" value="<?= base_url();?>">
            <?php 
                $display="style=display:block;";
                if($titulo=='Libro de reclamación' || $titulo=='Su reclamo se procesó exitosamente  - Aventuras' || $titulo=='Su pago se procesó exitosamente  - Aventuras') {
                    $display="style=display:none;";
                }
            ?>
            <header class="header menu_fixed" <?= $display;?>>
                <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
                
                <div id="logo">
                    <?php $moneda=strtolower($moneda);?>
                    <a href="<?= base_url($moneda);?>">
                        <img src="<?= site_url("public/front-end/img/aventuras.png");?>" width="110" height="36" data-retina="true" alt="" class="logo_normal">
                        <img src="<?= site_url("public/front-end/img/aventuras.png");?>" width="110" height="36" data-retina="true" alt="" class="logo_sticky">
                    </a>
                </div>

                <ul id="top_menu">
                    <li><a href="<?= site_url("cliente/reserva/$moneda");?>" class="cart-menu-btn" title="Resumen de la reserva a realizar en Aventuras"><strong class="cantidad_servicios"><?php if($this->session->userdata('listado_compra')=='') { echo "0";} else {echo count($this->session->userdata('listado_compra'));}?></strong></a></li>
                    <!--li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li-->
                    <!--li><a href="wishlist.html" class="wishlist_bt_top" title="Listado de favoritos">Your wishlist</a></li-->
                </ul>

                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>

                <?php
                    if($titulo!='Su pago se procesó exitosamente  - Aventuras' && $titulo!='Resumen de la reserva a realizar en Aventuras' && $titulo!="Introduce tus datos para hacer la reserva - Aventuras" && $titulo!="Realizar pago - Aventuras"){
                ?>
                    <nav id="menu" class="main-menu">
                        <ul>
                                <li>
									<span><a href="javascript:void(0);">Contáctanos</a></span>
                                    <ul class="ml-3">
                                        <li><a href="https://m.me/AventurasdelPeru" target="_blank"><i class="icon-chat"></i>&nbsp;&nbsp;&nbsp;FACEBOOK</a></li>  
                                        <li><a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank"><i class="icon-chat"></i>&nbsp;&nbsp;&nbsp;WHATSAPP</a></li>           
                                        <li><a href="tel://+51910926882" target="_blank"><i class="icon-phone"></i>&nbsp;&nbsp;&nbsp;(+51) 910 926 882</a></li>  
                                    </ul>
                                </li>
                            
                                <!--li><span><a href="<?= site_url($moneda);?>">Inicio</a></span></li-->
                                <li><span><a href="<?= site_url("tours/listado/$moneda");?>">Tours</a></span></li>
                                <li><span><a href="<?= site_url("paquetes/listado/$moneda");?>">Paquetes</a></span></li>
                            
                                <li><span><a href="javascript:void(0);"><?= @$monedaI->simbolo;?></a></span>
                                    <ul class="drop-moneda">
                                        <?php
                                            if($monedas) {
                                                foreach($monedas as $row) {
                                                    $stilo='';
                                                    if($monedaI->id==$row->id) {
                                                        $stilo='class="activo"';
                                                    }
                                                    if($row->id=='1') {
                                                        $link='href="'.site_url($url).'"';
                                                    } else {
                                                        $link='href="'.site_url($url.''.strtolower($row->simbolo_act)).'"';
                                                    }
                                                    echo '<li><a '.$link.' '.$stilo.'><b>'.$row->simbolo.'</b>&nbsp;&nbsp;&nbsp;'.$row->nombre.'</a></li>';
                                                }
                                            }
                                        ?>            
                                    </ul>
                                </li>
                            </ul>
                        </nav>        
                <?php
                    } else {
                ?>        
                        <nav id="menu" class="main-menu">
                            <ul>    
                                <li><span><a href="javascript:void(0);"><?= @$monedaI->simbolo;?></a></span>
                                    <ul class="drop-moneda">
                                        <?php
                                            if($monedas) {
                                                foreach($monedas as $row) {
                                                    $stilo='';
                                                    if($monedaI->id==$row->id) {
                                                        $stilo='class="activo"';
                                                    }
                                                    if($row->id=='1') {
                                                        $link='href="'.site_url($url).'"';
                                                    } else {
                                                        $link='href="'.site_url($url.''.strtolower($row->simbolo_act)).'"';
                                                    }
                                                    echo '<li><a '.$link.' '.$stilo.'><b>'.$row->simbolo.'</b>&nbsp;&nbsp;&nbsp;'.$row->nombre.'</a></li>';
                                                }
                                            }
                                        ?>            
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                
                        <style>header{border-bottom:1px solid #de1c2f;background-color:#de1c2f;z-index:11;padding: 15px 20px;height:68px;}</style> 
                        <div id="logo" class="posicion-pago logo-pago">
                            <h3><span class="color-titulo"><i class="icon-lock-open-alt-1">&nbsp;&nbsp;</i>Pago Seguro</span></h3>
                        </div>
                <?php
                    }
                ?>
            </header>
            <!-- /header -->