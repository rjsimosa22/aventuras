<?php 
    foreach($tours as $row) {
        echo    '
                    <div class="item">
					    <div class="box_grid">
						    <figure>
								<!--small class="wish_bt">'.ucfirst(strtolower($row->distrito)).'</small-->
							    <a href="'.$row->url.'"><img src="'.$row->urlimg.'" class="img-fluid img-fluid-22" alt="" width="800" height="533"><div class="read_more"><span>Visualizar</span></div></a>
								<small>'.ucfirst(strtolower($row->distrito)).'</small>
								<p class="box_grid_2"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></p>
								<p class="box_grid_3"><i class="icon_clock_alt"></i>&nbsp;&nbsp;'.ucfirst(strtolower($row->duracion)).'</p>
                            </figure>
                        
                            <div class="wrapper">
							    <h3><a href="'.$row->url.'">'.$row->nombre.'</a></h3>
							    <span class="text-justify">'.substr(ucfirst($row->descripcion),0,140).''.$row->puntos.'</span>
								
								<ul id="adaptacion">
							    	<li>&nbsp;</li>
							    	<a href="'.$row->url.'"><li><span class="ocultar-css-link strong">Desde&nbsp;&nbsp;<span class="font-precio-1 color-precio ">'.$monedaI->simbolo.' '.number_format($row->precio).'</span></span></a><!--"a href="'.$row->url.'"><input type="button" class="btn_3 full-width purchase" value="Reservar"></a--></li>
						    	</ul>
							</div>
                            
						    <!--ul>
							    <li><i class="icon_clock_alt"></i>&nbsp;'.ucfirst(strtolower($row->duracion)).'</li>
							    <li><!--div class="score"><span>valoración<em>0 opiniones</em></span><strong>0.0</strong></div--></li>
						    </ul-->
						</div>
					</div>
                ';    
    } 