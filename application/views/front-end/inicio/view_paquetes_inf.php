<?php 
    foreach($paquetes as $row) {
        echo    '
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="'.$row->url.'" class="grid_item">
                            <figure>
                                <div class="score">
                ';                    
                                    if($row->descuento > 0) {
                                        echo    '
                                                    <span class="strong">
                                                        <text class="descuentolineal">Antes&nbsp;'.$monedaI->simbolo.' '.number_format($row->precio).'</text>
                                                        <br><br>
                                                        Ahora&nbsp;<text class="font-precio">'.$monedaI->simbolo.' '.number_format($row->descuento).'</text>
                                                    </span>
                                                ';
                                    } else {
                                        echo    '
                                                    <span class="strong">
                                                        Desde&nbsp;<text class="font-precio">'.$monedaI->simbolo.' '.number_format($row->precio).'</text>
                                                    </span>
                                                ';
                                    }
                                    
                                
        echo    '               </div>

                                <img loading="lazy" src="'.$row->urlimg.'" class="img-fluid" alt="">
                                
                                <div class="info">
                                    <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                                    <h3>'.$row->nombre.'</h3>
                                    <span class="duracion"><i class="icon_clock_alt"></i>&nbsp;&nbsp;'.ucfirst(strtolower($row->duracion)).'</span>
                                </div>
                            </figure>
                        </a>
                    </div>
                ';
    } 
?>            