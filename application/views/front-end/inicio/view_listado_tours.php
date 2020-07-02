<!-- /titulo-->
<section class="hero_in tours" id="imagen-banner" style="background:url(<?= base_url();?>/public/img/tours/<?= $imagen_tours;?>) center center no-repeat;-webkit-background-size: cover; -moz-background-size:cover;-o-background-size:cover;background-size:cover;">
    <div class="wrapper">
        <div class="container top-title-1">
            <h1><span></span><?= $titulo_tours;?></h1>
        </div>
        
        <div class="div-imagen-banner">
            <img src="<?= base_url();?>/public/front-end/img/mask-b.png" class="img-banner-fondo">
            <center>
                <div class="text-imagen-banner-1">
                    <span class="contador-banner"><?= count($tours);?><br></span>
                    <span>Actividades en <?= $titulo_tours;?></span>
                </div>
            </center>    
        </div>
    </div>
</section>
<!-- /titulo-->
   
<!-- /filtro 1-->
<div class="filters_listing sticky_horizontal">
    <div class="container">
        <ul class="clearfix">
            <li>
                <div class="switch-field">
                    <input type="hidden" name="url" id="url" value="<?= base_url();?>">
                    <input type="radio" id="all" name="listing_orden" value="all" onClick="listado_filtros()" checked>
                    <label for="all">Todos</label>
                    <input type="radio" id="minimo" name="listing_orden" value="asc" onClick="listado_filtros()">
                    <label for="minimo">Precio menor</label>
                    <input type="radio" id="maximo" name="listing_orden" value="desc" onClick="listado_filtros()">
                    <label for="maximo">Precio mayor</label>
                </div>
            </li>

            <!--li>
                <div class="layout_view">
                    <a href="tours-grid-isotope.html"><i class="icon-th"></i></a>
                    <a href="#0" class="active"><i class="icon-th-list"></i></a>
                </div>
            </li-->

            <!--li>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
            </li-->
        </ul>
    </div>
</div>
<!-- /mapa-->
<!--div class="collapse" id="collapseMap">
	<div id="map" class="map"></div>
</div-->
<!-- /mapa-->
<!-- /filtro 1-->

<!-- /contenido-->
<div class="container margin_60_35">
    <div class="row">
        <!-- /filtro 2-->
        <aside class="col-lg-3" id="sidebar">
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filtros</a>
                <div class="collapse show" id="collapseFilters">
                    
                    <!-- /tipo-->
                    <div class="filter_type">
                        <h6><span class="titulo-filtro">Tipos</span></h6>
                        <ul>
                            <li>
                                <label>
                                	<input type="radio" class="icheck listing_tipo" name="listing_tipo" value="tours" checked>Tours <small id="cant_filtro">(<?= count($tours);?>)</small>
								</label>
                            </li>  
                            <li>
                                <label>
                                	<input type="radio" class="icheck listing_tipo" name="listing_tipo" value="paquetes">Paquetes <small>(<?= $cantidad_paquetes[0]->cantidad;?>)</small>
								</label>
                            </li>
                        </ul>
                    </div>
                    <!-- /tipo-->

                    <!-- /destino-->
                    <div class="filter_type">
                        <h6><span class="titulo-filtro">Destinos</span></h6>
                        <ul>
                            <li>
                                <label>
                                    <input type="hidden" name="valorDestino" id="valorDestino" value="<?= $titulo_tours_1;?>">
                                    <select name="check-destino" id="check-destino" class="check-destino select-efecto" onchange="location=this.value;">
                                        <?php 
                                            if($titulo_tours=='Tours') {
                                                echo '<option value="seleccionar" disabled selected>Seleccionar</option>';
                                            }

                                            if($destinos) {
                                                foreach($destinos as $row) {

                                                    $selected='';
                                                    if($titulo_tours==$row->distrito) {
                                                        $selected='selected';
                                                    }

                                                    echo    '   
                                                                <option value="'.site_url("tours/".strtolower($row->distrito)."/$moneda").'" '.$selected.'>'.ucfirst(strtolower($row->distrito)).'</option>
                                                            ';  
                                                }
                                            }                 
                                        ?>
                                    </select>    
                                </label>
                            </li>      
                        </ul>
                    </div>
                    <!-- /destino-->
                    
                    <!-- /precio-->
                    <div class="filter_type">
                        <h6><span class="titulo-filtro">Precio</span></h6>
                        <input type="text" id="precio" name="precio" value="">
                    </div>
                    <!-- /precio-->

                    <!-- /tematica-->                        
                    <div class="filter_type id2">
                        <h6><span class="titulo-filtro">Temáticas</span></h6>
                        <ul>
                            <?php 
                                if($tematicas) {
                                    foreach($tematicas as $row) {
                                        echo    '    
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" name="listing_tematica" class="icheck listing_tematica" id="listing_tematica'.$row->id.'"  value="'.strtolower($row->tematica).'" checked>
                                                            <label>'.ucfirst(strtolower($row->tematica)).'</label>
                                                        </label>
                                                    </li>
                                                ';  
                                    }
                                }                 
                            ?>
                        </ul>
                    </div>
                    <!-- /tematica--> 
                </div>
            </div>
        </aside>
        <!-- /filtro 2 -->

        <!-- /tours-->                        
        <div class="col-lg-9" id="list_sidebar">
            <div class="isotope-wrapper">
                <?php $this->load->view('front-end/inicio/view_grid_tours');?>
            </div>
        </div>
        <!-- /tours-->  
    </div>
</div>
<!-- /contenido -->