<div id="page-content">
    <div id='wrap'>
        
        <?php
        
            $finicio = date('Y-m-d');
            $ffin = date('Y-m-d');
        ?>
        
        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Reportes</li>
                <li class="active">Generador de Reportes</li>
            </ol>

            <h1>Generador de Reportes</h1>

            <div class="options">
                <div class="btn-toolbar">
                    <button class="btn btn-default">
                        <i class="icon-calendar-empty"></i> 
                        <span class="hidden-xs hidden-sm"><?php setlocale(LC_ALL, 'es_ES').': ';echo iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time())); ?></span>
                    </button>
                </div>
            </div>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <form class="form-horizontal row-border" role="form" id="form" name="form" action="" method="POST">
                <div id='row'>
                    <div class="col-md-12">
                        <div class="panel panel-sky">

                            <div class="panel-heading" style="background:#373737">
                                <h4>Generador de Reportes</h4>
                            </div>

                            <div class="panel-body collapse in">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Fecha Desde:</label>
                                        <input type="text" class="form-control" name="finicio" id="datepicker0" placeholder="Por favor seleccione la fecha..." value="<?= $finicio;?>" style="background: white;" readonly="readonly" />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Fecha Hasta:</label>
                                        <input type="text" class="form-control" name="ffin" id="datepicker1" placeholder="Por favor seleccione la fecha..." value="<?= $ffin;?>" style="background: white;" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Tipo de Reporte:</label>
                                        <select name="reporte" id="reporte" class="form-control">
                                            <option value="">Seleccione</option>

                                            <?php 
                                                    foreach ($reporte as $reportes) {
                                                        
                                                        echo '<option value="'.$reportes->id_report.'">'.$reportes->nombre.'</option>';
                                                    }
                                            ?>

                                       </select>
                                    </div>
                                </div>
                                
                                <div id="inf"></div> 
                                    
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="btn-toolbar" align="right">
                                                <button type="submit" class="btn-primary btn" name="btn" value="descargar">Descargar</button>
                                                <button type="reset" class="btn btn-danger" name="btn">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--Fin Container-->
        
    </div>
</div>           