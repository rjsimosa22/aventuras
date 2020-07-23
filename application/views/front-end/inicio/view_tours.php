<!-- /banner-->
<section class="hero_in tours_detail" style="background:url(<?= $url_img;?>) center center no-repeat;-webkit-background-size: cover; -moz-background-size:cover;-o-background-size:cover;background-size:cover;">
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
                    <i class="icon-user-7"></i>&nbsp;&nbsp;<?= ucfirst(strtolower('precio por persona'));?>&nbsp;&nbsp;-&nbsp;&nbsp;
                    <i class="icon_clock_alt"></i>&nbsp;&nbsp;<?= ucfirst(strtolower($info->duracion));?>
                </div>
            </center>    
        </div>   
    </div>
</section>
<!--/banner-->

<nav class="secondary_nav sticky_horizontal nav" id="topnav" style="z-index:10555;">
    <div class="container display_submenu1">
        <ul class="clearfix" id="main_nav">
            <li><a href="#descripcion" class="active smoothScroll">Descripción</a></li>
            <li><a href="#detalles" class="smoothScroll">Detalles</a></li>
            <li style="display:none;" class="smoothScroll"><a href="#recomendaciones">Recomendaciones</a></li>
            <li><a href="#recomendaciones" class="smoothScroll">Recomendaciones</a></li>
            <!--li><a href="#cancelaciones" class="smoothScroll">Cancelaciones</a></li-->
            <li style="display:none;" class="smoothScroll"><a href="#cancelaciones">Cancelaciones</a></li>
        </ul>
    </div>

    <div class="container text-center display_submenu3">
        <table width="30%" align="right">
            <tr>
            <td><span class="color-text-2 text-left"><small class="font-fuente-2"><?= $monedaI->simbolo;?>&nbsp;</small><b class="font-fuente-1 infoPrecio"><?= number_format($info->precio);?></b></span></td>
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

                    <br>    
                    <div class="container ">
                        <div class="main_title_3">
                            <span><em></em></span>
                            <h2 class="color-h2">Fotos</h2>
                            <p>Nuestro destino nunca es un lugar, sino una nueva forma de ver las cosas.</p>
                        </div>

                        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native" data-keyboard="true" data-transition="slide" data-clicktransition="crossfade"  data-width="100%" data-ratio="1200/800">
                            <?php 
                                if($listado_imagenes) {
                                    foreach($listado_imagenes as $row) {
                                        echo '<img loading="lazy" src="'.$url_base.''.$row->nombre_extension.'"  width="100" height="56">'; 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- /galeria -->
                </section>    
                <!-- /descripcion-->
                
                <!-- /detalles--> 
                <br>                   
                <section id="detalles" class="post_article">
                    <input type="hidden" name="precio_tours" id="precio_tours" value="0"> 
                    <h2><span class="color-h2">Detalles</span></h2>
                    <span class="text-justify"><?= ucfirst($info->detalle);?></span>
                </section> 
                <!-- /detalles-->  
                
                <!-- /recomendaciones-->                    
                <section id="recomendaciones" class="post_article">
                    <h2><span class="color-h2">Recomendaciones</span></h2>
                    <span class="text-justify"><?= ucfirst($info->recomendacion);?></span>
                </section> 
                <!-- /recomendaciones-->  

                <!-- /recomendaciones-->                    
                <!--section id="cancelaciones" class="post_article">
                    <h2><span class="color-h2">Cancelaciones</span></h2>
                    <span class="text-justify">¡Gratis! Cancela sin gastos hasta 5 días antes de la actividad. Si cancelas con menos tiempo, llegas tarde o no te presentas, no se ofrecerá ningún reembolso.</span>
                </section--> 
                <!-- /recomendaciones-->
        </div>
            
        <!-- /precios--> 
        <?php $this->load->view('front-end/inicio/view_precio');?>  
        <!-- /precio-->
                
    </div>
        <!-- /row -->
        
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
                        <?php $this->load->view('front-end/inicio/view_tours_interes');?>                
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
