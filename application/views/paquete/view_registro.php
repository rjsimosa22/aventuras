<div id="page-content">
    <div id='wrap'>
        
        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
                <li>Paquetes</li>
                <li class="active">Registrar Paquete</li>
            </ol>

            <h1>Registrar Paquete</h1>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-info">
                        
                    <div class="panel-heading" style="background:#b52182">
                        <h4>Regisrar Paquete</h4>
                    </div>
                        
                    <div class="panel-body">
                        <div class="table-responsive" style="border:0px;">
                            <form class="form-horizontal row-border" id="wizard" name="form" action="" method="POST">

                                <!--Paso 1-->
                                <fieldset title="Paso 1">
                                    <legend class="legends">Información de Paquete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Paquete</h3></label></div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Nombre del Paquete:</label>
                                            <input type="hidden" name="url1" id="url1" class="form-control" value="<?= site_url();?>" />
                                            <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('regispaquetes/registrar');?>" />
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" autocomplete="off" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                            <select class="js-example-basic-single" name="departamento" id="departamento" style="width:100%;">
                                                <option value=''>SELECCIONAR</option>
                                                <?php 
                                                    foreach ($departamento as $row) {
                                                        echo '<option value="'.$row->id.'">'.($row->nombre).'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                            <select class="js-example-basic-single" name="provincia" id="provincia" style="width:100%;"></select>
                                            <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                            <select class="js-example-basic-single" name="distrito" id="distrito" style="width:100%;"></select>
                                            <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label">Días del Paquete:</label>
                                            <select class="form-control" name="cantidad_dia" id="cantidad_dia" style="width:100%;">
                                                <option value=''>SELECCIONAR</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='6'>6</option>
                                                <option value='7'>7</option>
                                                <option value='8'>8</option>
                                                <option value='9'>9</option>
                                                <option value='10'>10</option> 
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label">Tipo de Descuento:</label>
                                            <select class="form-control" name="tipo_descuento" id="tipo_descuento" style="width:100%;">
                                                <option value=''>SELECCIONAR</option>
                                                <option value='1'>POR PORCENTAJE</option>
                                                <option value='2'>POR PRECIO</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label">Monto de Descuento:</label>
                                            <input type="text" name="monto_descuento" id="monto_descuento" class="form-control precio" placeholder="Ingresé descuento" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Descripción:</label>
                                            <textarea id="descripcions" name="descripcions" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Servicios:</label>
                                            <textarea id="servicios" name="servicios" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>
                                </fieldset>
                                <!--Fin Paso 1-->

                                <!--Paso 2-->
                                <fieldset title="Paso 2">
                                    <legend class="legends">Información de Tours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Tours</h3></label></div>
                                    
                                    <div class="form-group">
                                        <br>            
                                        <div class="col-sm-12">
                                            <div class="panel-heading" style="background:#868686">
                                                <h4>Tours</h4>
                                            </div>

                                            <div class="panel-body collapse in">
                                                <div class="table-responsive" style="border:0;">
                                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="tabla_tours" style="width:100%;vertical-align:middle;">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%">Día</th>
                                                                <th width="30%" id="title_basico">Tours Básico</th>
                                                                <th width="30%" id="title_exclusivo">Tours Exclusivo</th>
                                                                <th width="30%" id="title_recomendado">Tours Recomendado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                for($i=0;$i<=9;$i++) {
                                                                 
                                                            ?> 
                                                                    <tr class="tr_<?= $i;?>" style="display:none;">
                                                                        <td><input type="hidden" name="dias[]" id="dias<?= $i;?>" class="form-control" value="<?= ($i+1);?>"><?= ($i+1);?></td>
                                                                        <td>
                                                                            <select class="js-example-basic-single tours_basico" name="tours_basico[]" id="tours_basico_<?= $i;?>" style="width:100%;display:none;">
                                                                            <option value=''>SELECCIONAR</option>
                                                                                <?php 
                                                                                    foreach ($tours as $row) {
                                                                                        echo '<option value="'.$row->id.'">'.($row->nombre).'</option>';
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <label for="" id="val_basico_<?= $i;?>" style="display:none;">Campo requerido.</label>  
                                                                        </td>
                                                                        <td class="tr_<?= $i;?>" style="display:none;">
                                                                            <select class="js-example-basic-single tours_exclusivo" name="tours_exclusivo[]" id="tours_exclusivo_<?= $i;?>" style="width:100%;display:none;">
                                                                                <option value=''>SELECCIONAR</option>
                                                                                <?php 
                                                                                    foreach ($tours as $row) {
                                                                                        echo '<option value="'.$row->id.'">'.($row->nombre).'</option>';
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <label for="" id="val_exclusivo_<?= $i;?>" style="display:none;">Campo requerido.</label> 
                                                                        </td>
                                                                        <td class="tr_<?= $i;?>" style="display:none;">
                                                                            <select class="js-example-basic-single tours_recomendado" name="tours_recomendado[]" id="tours_recomendado_<?= $i;?>" style="width:100%;display:none;">
                                                                                <option value=''>SELECCIONAR</option>
                                                                                <?php 
                                                                                    foreach ($tours as $row) {
                                                                                        echo '<option value="'.$row->id.'">'.($row->nombre).'</option>';
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <label for="" id="val_recomendado_<?= $i;?>" style="display:none;">Campo requerido.</label>
                                                                        </td>
                                                                    </tr>
                                                            <?php 
                                                                }
                                                            ?>    
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--Fin Paso 2-->
                                
                                
                                <!--Paso 3-->
                                <fieldset title="Paso 3">
                                    <legend class="legends">Información de Hoteles&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Hoteles</h3></label></div>
                                    
                                    <div class="form-group">
                                        <br>            
                                        <div class="col-sm-12">
                                            <div class="panel-heading" style="background:#868686">
                                                <h4>Hoteles</h4>
                                            </div>

                                            <div class="panel-body collapse in">
                                                <div class="table-responsive" style="border:0;">
                                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="tabla_tours" style="width:100%;vertical-align:middle;">
                                                        <thead>
                                                            <tr>
                                                                <th id="title_hotel">Hoteles Asignado al Paquete</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                for($i=0;$i<=10;$i++) {
                                                            ?> 
                                                                    <tr class="tr_<?= $i;?>" style="display:none;">
                                                                        <td>
                                                                            <select class="js-example-basic-single hoteles_seleccionado" name="hoteles_seleccionado[]" id="hoteles_seleccionado_<?= $i;?>" style="width:100%;text-align:left;">
                                                                            <option value=''>SELECCIONAR</option>
                                                                                <?php 
                                                                                    foreach ($hoteles as $row) {
                                                                                        echo '<option value="'.$row->id.'">'.($row->nombre).'</option>';
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <label for="" id="val_hotel_0" style="display:none;">Campo requerido.</label> 
                                                                        </td>
                                                                    </tr>
                                                            <?php 
                                                                }
                                                            ?>    
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>                     
                                </fieldset>
                                <!--Fin Paso 3-->

                                <input type="hidden" id="btn" name="btn" value="registrar">
                                <input type="submit" class="btn-primary btn" value="Registrar">
                            </form>
                            <div class="panel-footer" style="margin-top:-70px;height:80px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Container-->
        
    </div>
</div>