<!-- /banner-->
<section class="hero_in tours_detail post_article" id="banner" style="background:url(<?= $url_img;?>) center center no-repeat;-webkit-background-size: cover; -moz-background-size:cover;-o-background-size:cover;background-size:cover;">
    <div class="wrapper">
        <div class="container top-title">
            <h1 id="textservicio"><span></span><?= $info->nombre;?></h1><br>
            <table align="center">
                <tr>
                    <?php 
                        if($lista_tematicas) {
                            foreach($lista_tematicas as $row) {
                                echo '<td class="tag"><i class="icon-tags"></i>&nbsp;&nbsp;'.ucfirst(strtolower($row->nombre)).'</td><td>&nbsp;&nbsp;</td>';    
                            }
                        }   
                    ?>
                </tr>
            </table>
        </div>

        <div class="div-imagen-banner">
            <img src="<?= base_url();?>/public/front-end/img/mask-b.png" class="img-banner-fondo">
            <center>
                <div class="text-imagen-banner">
                    <i class="icon_clock_alt"></i>&nbsp;&nbsp;<?= ucfirst(strtolower($info->duracion));?>
                </div>
            </center>    
        </div>
    </div>
</section>
<!--/banner-->

<nav class="secondary_nav sticky_horizontal nav" id="topnav">
    <div class="container display_submenu1">
        <ul class="clearfix" id="main_nav">
            <li><a href="#descripcion" class="active smoothScroll">Descripción</a></li>
            <li><a href="#servicios"  class="smoothScroll">Servicios</a></li>
            <li><a href="#itinerarios"  class="smoothScroll">Itinerarios</a></li>
            <li><a href="#hoteles"  class="smoothScroll">Hoteles</a></li>
            <li style="display:none;"  class="smoothScroll"><a href="#recomendaciones">Recomendaciones</a></li>
            <!--li><a href="#cancelaciones"  class="smoothScroll">Cancelaciones</a></li-->
            <li style="display:none;"  class="smoothScroll"><a href="#cancelaciones">Cancelaciones</a></li>
        </ul>
    </div>

    <div class="container text-center display_submenu3">
        <table width="30%" align="right">
            <tr>
                <td><span class="color-text-2 text-left"><small class="font-fuente-2"><?= $monedaI->simbolo;?>&nbsp;</small><b class="font-fuente-1 infoPrecio"><?= number_format($info_precio);?></b></span></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><span class="score text-right"><a href="#sidebar" class="btn_2">Reservar</a></span></td>
            </tr> 
        </table>
    </div>
</nav>

<div class="bg_color_1;">
    <!-- /galeria -->
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <!-- /descripcion-->
                <section id="descripcion" class="post_article">
                    <span class="text-justify"><?= ucfirst($info->descripcion);?></span>
                </section>    
                <!-- /descripcion-->
                
                <!-- /detalles-->                    
                <section id="servicios" class="post_article">
                    <h2><span class="color-h2">Servicios</span></h2>
                    <span class="text-justify"><?= ucfirst($info->servicios);?></span>
                </section> 
                <!-- /detalles--> 
                
                 <!-- /itinerarios--> 
                <section id="itinerarios" class="post_article">
                    <input type="hidden" name="tipo_cambio" id="tipo_cambio" value="<?= $inf_costo['tipo_cambio'];?>"> 
                    <input type="hidden" name="precio_tours" id="precio_tours" value="<?= $inf_costo['total_soles'];?>"> 
                    <input type="hidden" name="precio_hotel" id="precio_hotel" value="<?= $total_hotel_actual;?>"> 
                    <h2><span class="color-h2">Itinerarios</span></h2>
                    
                    <ul class="cbp_tmtimeline">
                        <?php
                            if($paquetes_seleccion) {
                                $i=1;
                                foreach($paquetes_seleccion as $row) {
                                    $var=$i++;
                                    echo'
                                            <li>
                                                <time class="cbp_tmtime" datetime="09:30"><span style="font-size:25px;"><b>Día</b></span><span style="font-size:12px;">'.ucwords($row->duracion).'</span></time>
                                                <div class="cbp_tmicon">'.$var.'</div>
                                                <div class="cbp_tmlabel">
                                                    <div class="hidden-xs">
                                                        <img src="'.$url_base.''.$row->imagen_tours[0]->nombre_extension.'" alt="" class="rounded-circle thumb_visit">
                                                    </div>
                                                    <h4><span class="titulo-h4">'.$row->tours_basico.'</span></h4>
                                                    <span>'.ucfirst($row->descripcion_basico).'</span>
                                                    
                                                    <br>
                                                    <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native" data-keyboard="true" data-transition="slide" data-clicktransition="crossfade"  data-width="100%" data-ratio="1200/800">
                                        ';
                                                        if($row->imagen_tours) {
                                                            foreach($row->imagen_tours as $row1) {
                                                                echo '<img src="'.$url_base.''.$row1->nombre_extension.'"  width="100" height="56">'; 
                                                            }
                                                        }
                                    echo'               
                                                    </div> 
                                                    <br>   
                                                    <h4><span class="titulo-h4">Detalles</span></h4>
                                                    <span>'.ucfirst($row->detalle).'</span>
                                                </div>
                                            </li>
                                        ';
                                }
                            } 
                        ?>            
                    </ul>
                </section>

                <!-- /hoteles-->                    
                <section id="hoteles" class="post_article">
                    <h2><span class="color-h2">Hoteles</span></h2>
                    <div class="faq">
                        <?php
                            if($hoteles_seleccion) {
                                $i=30;
                                foreach($hoteles_seleccion as $row) {
                                    $var=$i++;
                        ?>            
                                    <div class="title-tab" onclick="toglediv('<?= 'div-'.$var;?>');"><span class="icon-down-dir position-icon" id="down-div-<?= $var;?>" title="Ver más"></span><span class="icon-up-dir position-icon" id="up-div-<?= $var;?>" title="Ver más" style="display:none;"></span><i class="fa fa-1x"></i><?= $row->nombre;?></div>
                                    <div class="content-tab" id="<?= 'div-'.$var;?>" >
                                        <h4><span class="color-h2">Descripción</span></h4>
                                        <span class="text-justify"><?= ucfirst($info->descripcion);?></span>
                                        
                                        <div class="container ">
                                            <div class="main_title_3">
                                                <span><em></em></span>
                                                <h2 class="color-h2">Fotos</h2>
                                            </div>
                                        
                                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native" data-keyboard="true" data-transition="slide" data-clicktransition="crossfade"  data-width="100%" data-ratio="1200/800">
                                                <?php 
                                                    if($row->imagen_hoteles) {
                                                        foreach($row->imagen_hoteles as $row1) {
                                                            echo '<img src="'.$url_base_hotel.''.$row1->nombre_extension.'"  width="100" height="56">'; 
                                                        }
                                                    }
                                                ?>
                                            </div>   
                                        </div>        
                                    </div>
                        <?php
                                }
                            } 
                        ?>
                    </div>                 
                </section> 
                <!-- /hoteles-->    

                <!-- /cancelacion-->                    
                <!--section id="cancelaciones" class="post_article">
                    <h2><span class="color-h2">Cancelaciones</span></h2>
                    <span class="text-justify">¡Gratis! Cancela sin gastos hasta 5 días antes de la actividad. Si cancelas con menos tiempo, llegas tarde o no te presentas, no se ofrecerá ningún reembolso.</span>
                </section--> 
                <!-- /cancelacion-->
            </div>
    
            <!-- /precios--> 
            <?php $this->load->view('front-end/inicio/view_precio');?>  
            <!-- /precio-->
        </div>
        
        <!-- /otros destinos de interes del mismo pais-->
        <div class="container margin_60_35">
            <div class="row">
                <div class="main_title_2 col-md-12">
                    <span><em></em></span>
                    <h2>También te puede interesar</h2>
                    <p>Un buen viajero no tiene planes fijos ni tampoco la intención de llegar.</p>
                </div>
                
                <div class="isotope-wrapper">
                    <div class="row">
                        <?php $this->load->view('front-end/inicio/view_paquetes_interes');?>                
                    </div>  
                </div>  
            </div>
            <p class="btn_home_align_2"><a href="<?= $url_tours?>" class="btn_1 rounded">Ver todos los tours en <?= ucfirst($info->distrito);?></a></p>
        </div>
        <!-- /otros destinos de interes del mismo pais-->

    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->
