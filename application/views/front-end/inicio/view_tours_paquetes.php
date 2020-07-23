<div class="row large-gutters">
    <?php 
        foreach($tours as $row) {
            
            $nombre=str_replace(" ","-",$row->nombre);
            
            if($row->id_moneda=='1'){
                $simbolo2='US$';
                $simbolo1=$row->simbolo;
                $precio1=$row->precio_minimo;
                $precio2=round($row->precio_minimo / $row->tipo_cambio,2);
            } else {
                $simbolo2='S/.';
                $simbolo1=$row->simbolo;
                $precio1=$row->precio_minimo;
                $precio2=round($row->precio_minimo * $row->tipo_cambio,2); 
            }  
    ?>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4 resaltador">
                <p>&nbsp;</p>
                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="<?= site_url('tours/'.strtolower($row->distrito).'/'.strtolower($nombre).'/'.$row->id);?>" class="d-inline-block mb-4"><img loading="lazy" src="<?= base_url();?>public/img/tours/<?= $row->imagen;?>" alt="" class="img-fluid" style="width:400px;height:200px;"></a>
                        <div class="ftco-media-details">
                            <h3><?= ucfirst(strtolower($row->nombre));?></h3>
                            <p><i class="icon-map-marker font-img"></i>&nbsp;<?= ucfirst(strtolower($row->distrito));?></p>
                            <p><i class="icon-time font-img"></i>&nbsp;<?= ucfirst(strtolower($row->duracion));?></p>
                            <strong class="text-right"><i class="icon-money font-img"></i>&nbsp;<?= '<b>'.$simbolo1.' '.$precio1.' - '.$simbolo2.' '.$precio2.'</b>';?></strong>
                        </div>
                    </div> 
                </div>
                <p>&nbsp;</p>
            </div>
    <?php } ?> 
    
    <?php 
        foreach($paquetes as $row) {

            if($row->inf_habitacion->id_monedas=='1') {
                $hotel_soles=$row->inf_habitacion->precio_minimo;
                $hotel_dolares=($row->inf_habitacion->precio_minimo / $row->inf_habitacion->tipo_cambio);
            } else {
                $hotel_dolares=$row->inf_habitacion->precio_minimo;
                $hotel_soles=($row->inf_habitacion->precio_minimo * $row->inf_habitacion->tipo_cambio);
            } 
            
            if(!empty($row->inf_costo['total_soles']) && !empty($row->inf_costo['total_dolares'])) {      
                $precios='<strong><i class="icon-money font-img"></i>&nbsp;<b>S/. '.($row->inf_costo['total_soles'] + $hotel_soles).' || US$ '.($row->inf_costo['total_dolares'] + $hotel_dolares).'<b></strong>';
            } else {
                if(!empty($row->inf_costo['total_soles'])) {
                $total_soles=($row->inf_costo['total_soles'] + $hotel_soles);
                $total_dolares=round(($row->inf_costo['total_soles'] / $row->inf_costo['tipo_cambio']) + $hotel_dolares,2);
                $precios='<strong><i class="icon-money font-img"></i>&nbsp;<b>S/. '.$total_soles.' - US$ '.$total_dolares.'</b></strong>';
                }

                if(!empty($row->inf_costo['total_dolares'])) {
                    $total_dolares=($row->inf_costo['total_dolares'] + $hotel_dolares);
                    $total_soles=round(($row->inf_costo['total_dolares'] * $row->inf_costo['tipo_cambio'] + $hotel_soles),2);
                    $precios='<strong><i class="icon-money font-img"></i>&nbsp;<b>US$'.$total_dolares.' - S/. '.$total_soles.'</b></strong>';
                }
            }    
    ?>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4 resaltador">
                <p>&nbsp;</p>
                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.html" class="d-inline-block mb-4"><img loading="lazy" src="<?= base_url();?>public/img/hoteles/<?= $row->inf_habitacion->nombre_extension;?>" alt="" class="img-fluid" style="width:400px;height:200px;"></a>
                        <div class="ftco-media-details">
                            <h3><?= ucfirst(strtolower($row->nombre));?></h3>
                            <p><i class="icon-map-marker font-img"></i>&nbsp;<?= ucfirst(strtolower($row->distrito));?></p>
                            <p><i class="icon-time font-img"></i>&nbsp;<?= ucfirst(strtolower($row->cantidad_dias.' días Y '.($row->cantidad_dias - 1))); if($row->cantidad_dias=='2') {echo' noche';}else{echo' noches';}?></p>
                            <?= $precios;?>        
                        </div>
                    </div> 
                </div>
                <p>&nbsp;</p>
            </div>    
    <?php } ?>        
</div>

<center><a href="#" class="btn btn-tercero">Ver más</a></center>