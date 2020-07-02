<div id="page-content">
    <div id='wrap'>
        
        <!--Indicador para saber en el modulo que estas ingresado-->
        <!--div id="page-heading">
            <ol class="breadcrumb"><li><a href="<?= site_url('home');?>">Inicio</a></li></ol>
            <h1>Inicio</h1>
            
            <div class="options">
                <div class="btn-toolbar">
                    <button class="btn btn-default">
                        <i class="icon-calendar-empty"></i> 
                        <span class="hidden-xs hidden-sm"><?php setlocale(LC_ALL, 'es_PE').': ';date_default_timezone_set("America/Lima");echo iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time())); ?></span>
                    </button>
                </div>
            </div>
        </div-->
        <!--Fin-->

        <!--Inicio de Container-->
        <!--div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-success" href="#">
                                <div class="tiles-heading">ventas Mensuales</div>
                                <div class="tiles-body-alt">
                                    <i class="icon-file-text-alt"></i>
                                    <div class="text-center"><?= $row['ventas'];?></div>
                                    <small>Ventas</small>
                                </div>
                                <div class="tiles-footer">Cálculos Actuales</div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-brown" href="#">
                                <div class="tiles-heading">Ventas del día</div>
                                <div class="tiles-body-alt">
                                    <i class="icon-file-text-alt"></i>
                                    <div class="text-center"><?= $row1['ventas'];?></div>
                                    <small>Ventas</small>
                                </div>
                                <div class="tiles-footer">Cálculos Actuales</div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-midnightblue" href="#">
                                <div class="tiles-heading">Montos mensuales</div>
                                <div class="tiles-body-alt">
                                    <i class="icon-money"></i>
                                    <div class="text-center"><span class="text-top">S/</span><?= number_format($row['montos'],2,",",".");?></div>
                                    <small>Soles</small>
                                </div>
                                <div class="tiles-footer">Basado en <?= ucfirst($row['mes']);?></div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-grape" href="#">
                                <div class="tiles-heading">Montos del día</div>
                                <div class="tiles-body-alt">
                                    <i class="icon-money"></i>
                                    <div class="text-center"><span class="text-top">S/</span><?= number_format($row1['montos'] ,2,",",".");?></div>
                                    <small>Soles</small>
                                </div>
                                <div class="tiles-footer">Basado en <?= ucfirst($row1['mes']);?></div>
                            </a>
                        </div>
                    </div>
                </div>
                
                
                </div>
             </div>
        </div-->
        <!--Fin Container-->
        
    </div> 
</div> 
