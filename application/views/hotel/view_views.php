<div id='wrap'>
    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home');?>">Inicio</a></li>
            <li><a href="<?= site_url('hoteles/listado');?>">Listado Hoteles</a></li>
            <li class="active">Visualización Hotel</li>
        </ol>

        <h1>Visualización Hotel</h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background:#b52182">
                    <h4>Información de Hotel</h4>
                </div>

                <div class="panel-body">
                    <?php include 'application/views/notificacion/alert.php';?>
                    <div class="table-responsive" style="border:0px;">
                        <div class="form-horizontal row-border" id="wizard1" name="form1" action="" method="POST">
                            
                            <!--Paso 1-->
                            <fieldset title="Paso 1">
                                <legend class="legends">Información de Hotel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Hotel</h3></label></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Hotel:</label>
                                         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= strtoupper($info->nombre);?>" disabled />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                        <select class="form-control" name="departamento" id="departamento" style="width:100%;" disabled>
                                            <option value=''><?= strtoupper($info->departamento);?></option>
                                        </select>
                                        <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                        <select class="form-control" name="provincia" id="" style="width:100%;" disabled>
                                            <option value=''><?= strtoupper($info->provincia);?></option>
                                        </select>
                                        <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                        <select class="form-control" name="distrito" id="" style="width:100%;" disabled>
                                            <option value=''><?= strtoupper($info->distrito);?></option>
                                        </select>
                                        <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label" id="title_ServicioP">Servicios Principales:</label>
                                        <select class="js-example-basic-multiple" name="servicios_popular[]" id="servicios_popular" multiple="multiple" style="width:100%;" disabled>
                                            <?php 
                                                foreach ($servicios as $row1) {
                                                    $selected="";
                                                    foreach($servicios_seleccionado as $row2) {
                                                        if($row1->id==$row2->id) {
                                                            $selected="selected";
                                                        }
                                                    }
                                                    echo '<option value="'.$row1->id.'" '.$selected.'>'.strtoupper($row1->nombre).'</option>';
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_ServicioP" style="display:none;">Campo requerido.</label>  
                                    </div>    
                                </div>
                            </fieldset>
                            <!--Fin Paso 1-->

                            <!--Paso 2-->
                            <fieldset title="Paso 2">
                                <legend class="legends">Detalle de Hotel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Hotel</h3></label></div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Descripción:</label>
                                        <textarea id="descripcion" name="descripcion" style="display:none;" class="mayuscula" disabled><?= $info->descripcion;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Servicios:</label>
                                        <textarea id="servicios" name="servicios" style="display:none;" class="mayuscula" disabled><?= $info->servicio;?></textarea>
                                    </div> 
                                </div>
                            </fieldset>
                            <!--Fin Paso 2-->

                            <!--Paso 3-->
                            <fieldset title="Paso 3">
                                <legend class="legends">Detalle de Imágenes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Imágenes</h3></label></div>
                                    
                                <div class="form-group">
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="panel-heading" style="background:#868686">
                                            <h4>Imágenes</h4>
                                        </div>

                                        <div class="panel-body collapse in">
                                            <div class="table-responsive" style="border:0;">
                                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th><center>Estatus</center></th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                        if(count($listado_imagenes) > 0) {
                                                            foreach($listado_imagenes as $row) {
                                                    ?>
                                                                <tr class="odd gradeX">
                                                                    <td><img src="<?= site_url('public/img/hoteles/'.$row->nombre_extension);?>" width="120px" height="70px" /></td>
                                                                    <td><?= strtoupper($row->nombre);?></td>
                                                                    <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= strtoupper($row->nombre_status);?></td>
                                                                </tr>
                                                    <?php        
                                                        }
                                                            }
                                                    ?>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>                      
                            </fieldset>
                            <!--Fin Paso 3-->

                            <!--Paso 4-->
                            <fieldset title="Paso 4">
                                <legend class="legends">Detalle de Habitaciones&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Habitaciones</h3></label></div>
                                    
                                <div class="form-group">
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="panel-heading" style="background:#868686">
                                            <h4>Habitaciones</h4>
                                        </div>

                                        <div class="panel-body collapse in">
                                            <div class="table-responsive" style="border:0;">
                                                <input type="hidden" name="arrayHabitaciones" id="arrayHabitaciones">    
                                                <table cellpadding="0" cellspacing="0" border="0"  id="example2" width="100%" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="16%">Nombre</th>
                                                            <th width="16%">Cant. Personas</th>
                                                            <th width="16%">P. Mínimo</th>
                                                            <th width="16%">P. Máximo</th>
                                                            <th width="16%"><center>Estatus</center></th>                                                 
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                        if(count($listado_habitaciones) > 0) {
                                                            foreach($listado_habitaciones as $row) {
                                                    ?>
                                                                <tr class="odd gradeX">
                                                                    <td><?= strtoupper($row->nombre);?></td>
                                                                    <td><?= $row->cantidad_personas;?></td>
                                                                    <td><?= $row->simbolo.' '.$row->precio_minimo;?></td>
                                                                    <td><?= $row->simbolo.' '.$row->precio_maximo;?></td>
                                                                    <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= strtoupper($row->nombre_status);?></td>
                                                                </tr>
                                                    <?php        
                                                        }
                                                            }
                                                    ?>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>    
                            </fieldset>
                            <!--Fin Paso 4-->
                                
                            <input type="submit" class="btn btn-danger" onclick="window.location.href='<?= site_url('hoteles/listado');?>'" value="Ir a listado de hoteles">
                            <div class="panel-footer" style="margin-top:-59px;height:80px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Container-->
    </div>
</div>