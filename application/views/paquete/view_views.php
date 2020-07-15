<div id='wrap'>
    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
            <li><a href="<?= site_url('listpaquetes/listado');?>">Listado Paquetes</a></li>
            <li class="active">Visualización Paquete</li>
        </ol>

        <h1>Visualización Paquete</h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background:#b52182">
                    <h4>Visualización de Paquete</h4>
                </div>

                <div class="panel-body">
                    <?php include 'application/views/notificacion/alert.php';?>
                    <div class="table-responsive" style="border:0px;">
                        <div class="form-horizontal row-border" id="wizard" name="form" action="" method="POST">

                            <!--Paso 1-->
                            <fieldset title="Paso 1">
                                <legend class="legends">Información de Paquete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Paquete</h3></label></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Paquete:</label>
                                         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" autocomplete="off" value="<?= $info->nombre;?>" disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Paquete SEO:</label>
                                        <input type="text" name="nombre_posic" id="nombre_posic" class="form-control" placeholder="Ingresé nombre posicionamiento" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= $info->nombre_posic;?>" disabled />
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                        <select class="form-control mayuscula" name="departamento" id="departamento" style="width:100%;" disabled>
                                            <option value=''><?= $info->departamento;?></option>
                                        </select>
                                        <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                        <select class="form-control mayuscula" name="provincia" id="" style="width:100%;" disabled>
                                            <option value=''><?= $info->provincia;?></option>
                                        </select>
                                        <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                        <select class="form-control mayuscula" name="distrito" id="" style="width:100%;" disabled>
                                            <option value=''><?= $info->distrito;?></option>
                                        </select>
                                        <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                    </div>   

                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label">Días del Paquete:</label>
                                        <select class="form-control" name="cantidad_dia" id="cantidad_dia" style="width:100%;" disabled>
                                            <option value=''><?= $info->cantidad_dias;?></option>
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group" style="display:none;">
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Tipo de Descuento:</label>
                                        <select class="form-control" name="tipo_descuento" id="tipo_descuento" style="width:100%;" disabled>
                                            <?php 
                                                if($info->tipo_descuento=='1') {
                                            ?>
                                                    <option value='1'>Por porcentaje</option>
                                            <?php
                                                } else {
                                            ?>
                                                    <option value='2'>Por precio</option>
                                            <?php 
                                                }
                                            ?>            
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Monto de Descuento:</label>
                                        <input type="text" name="monto_descuento" id="monto_descuento" class="form-control precio" placeholder="Ingresé descuento" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $info->monto_descuento;?>" disabled/>
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Desripción:</label>
                                        <textarea id="descripcions" name="descripcions" style="display:none;" class="mayuscula" disabled><?= $info->descripcion;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Descripción SEO:</label>
                                        <textarea id="descripcion_posic" name="descripcion_posic" style="display:none;" class="mayuscula" disabled><?= $info->descripcion_posic;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Servicios:</label>
                                        <textarea id="servicios" name="servicios" style="display:none;" class="mayuscula" disabled><?= $info->servicios;?></textarea>
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
                                                <table cellpadding="0" cellspacing="0" border="0"class="table table-striped table-bordered datatables" id="example" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="15%">Día</th>
                                                            <th width="25%">Tours Básico</th>
                                                            <th width="25%">Tours Exclusivo</th>
                                                            <th width="25%">Tours Recomendado</th>
                                                            <th width="15%"><center>Estatus</center></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            if(count($tours) > 0) {
                                                                foreach($tours as $row) {
                                                        ?>
                                                                    <tr class="odd gradeX mayuscula">
                                                                        <td><?= $row->dias;?></td>
                                                                        <td><?= $row->tours_basico;?></td>
                                                                        <td><?= $row->tours_exclusivo;?></td>
                                                                        <td><?= $row->tours_recomendado;?></td>
                                                                        <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
                                                                    </tr>
                                                        <?php        
                                                                }
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
                                                <table cellpadding="0" cellspacing="0" border="0"class="table table-striped table-bordered datatables" id="example" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Hoteles Asignado al Paquete</th>
                                                            <th><center>Estatus</center></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            if(count($hoteles) > 0) {
                                                                foreach($hoteles as $row) {
                                                        ?>
                                                                    <tr class="odd gradeX mayuscula">
                                                                        <td><?= $row->nombre;?></td>
                                                                        <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
                                                                    </tr>
                                                        <?php        
                                                                }
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
                            <input type="submit" class="btn btn-danger" onclick="window.location.href='<?= site_url('listpaquetes/listado');?>'" value="Ir a listado de paquetes">
                            </div>
                            <div class="panel-footer" style="margin-top:-59px;height:80px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Container-->
    </div>
</div>