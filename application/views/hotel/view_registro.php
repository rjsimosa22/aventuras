<div id="page-content">
    <div id='wrap'>
        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Hoteles</li>
                <li class="active">Registrar Hotel</li>
            </ol>

            <h1>Registrar Hotel</h1>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-info">
                        
                    <div class="panel-heading" style="background:#b52182">
                        <h4>Regisrar Hotel</h4>
                    </div>
                        
                    <div class="panel-body">
                        <div class="table-responsive" style="border:0px;">
                            <form class="form-horizontal row-border" id="wizard1" name="form1" action="" method="POST">

                                <!--Paso 1-->
                                <fieldset title="Paso 1">
                                    <legend class="legends">Información de Hotel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Hotel</h3></label></div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Nombre del Hotel:</label>
                                            <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url();?>" />
                                            <input type="hidden" name="ModuloTipo" id="ModuloTipo" class="form-control" value="hotel" />
                                            <input type="hidden" name="url1" id="url1" class="form-control" value="<?= site_url('hoteles/registrar');?>" />
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                            <select class="js-example-basic-single mayuscula" name="departamento" id="departamento" style="width:100%;">
                                                <option value=''>Seleccionar</option>
                                                <?php 
                                                    foreach ($departamento as $row) {
                                                        echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                            <select class="js-example-basic-single mayuscula" name="provincia" id="provincia" style="width:100%;"></select>
                                            <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                        </div>
                                    
                                        <div class="col-sm-4">
                                            <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                            <select class="js-example-basic-single mayuscula" name="distrito" id="distrito" style="width:100%;"></select>
                                            <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label" id="title_ServicioP">Servicios Principales:</label>
                                            <select class="js-example-basic-multiple mayuscula" name="servicios_popular[]" id="servicios_popular" multiple="multiple" style="width:100%;">
                                                <?php 
                                                    foreach ($servicios as $row) {
                                                        echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
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
                                    <legend class="legends">Detalle de Hotel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Hotel</h3></label></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Descripción:</label>
                                            <textarea id="descripcion" name="descripcion" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Servicios:</label>
                                            <textarea id="servicios" name="servicios" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>
                                </fieldset>
                                <!--Fin Paso 2-->
                                
                                <!--Paso 3-->
                                <fieldset title="Paso 3">
                                    <legend class="legends">Detalle de Imágenes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Imágenes</h3></label></div>
                                        
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Subir Imágenes:</label>
                                            <input type="hidden" name="imagenes" id="imagenes" />
                                            <input type="hidden" name="urlinsertImg" id="urlinsertImg" value="<?= site_url('hoteles/registrar_imagenes');?>">
                                            <div name="frmImage" class="dropzone" id="dropzone"></div> 
                                        </div>
                                    </div>                      
                                </fieldset>
                                <!--Fin Paso 3-->
                                
                                <!--Paso 4-->
                                <fieldset title="Paso 4">
                                    <legend class="legends">Detalle de Habitaciones&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Habitaciones</h3></label></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="options" align="right">
                                                <div class="btn-toolbar">
                                                    <a href="javascript:void(0);" onClick="registrar_habitacion();" style="color:#000;text-decoration:none;">
                                                        <div class="btn btn-default" title='Nueva Habitación'>
                                                            <i class="icon-plus"></i> 
                                                            <span class="hidden-xs hidden-sm">Nueva Habitación</span>
                                                        </div>
                                                    </a>    
                                                </div>
                                            </div>
                                        </div>    
                                        
                                        <br>
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Listado de Habitaciones:</label>
                                            <input type="hidden" name="arrayHabitaciones" id="arrayHabitaciones">    
                                            <div class="panel-heading" style="background:#868686">
                                                <h4>Habitaciones</h4>
                                            </div>

                                            <div class="panel-body collapse in">
                                                <div class="table-responsive mayuscula" style="border:0;">
                                                    <table cellpadding="0" cellspacing="0" border="0"  id="example" width="100%" class="table table-striped table-bordered">
                                                        <?php include 'application/views/notificacion/alert_modal.php';?>                                                     
                                                        <thead>
                                                            <tr>
                                                                <th width="16%">Nombre</th>
                                                                <th width="16%">Moneda</th>
                                                                <th width="16%">P. Mínimo</th>
                                                                <th width="16%">P. Máximo</th>
                                                                <th width="16%"><center>Estatus</center></th>
                                                                <th width="16%"><center>Acción</center></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>    
                                </fieldset>
                                <!--Fin Paso 4-->
                                
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

        <!-- Modal Registro y actualizacion -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog" style="width:100%;">
			    <div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					    <h4 class="modal-title title-formulario" >Registrar Habitación</h4>
                    </div>
            
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="form" name="form" action="" method="POST" >
                            <div id='row'>
                                <div class="col-md-12">
                                    <div class="panel panel-sky">
                                        <div class="collapse in">
                                            <table width="100%">
                                                <tr>
                                                    <td width="50%">
                                                        <div class="form-group">
                                                            <div class="col-sm-10">
                                                                <label class="col-sm-0 control-label">Tipo de Habitación:</label>
                                                                <input type="hidden" id="id_status" nombre="id_status" value="1">
                                                                <select class="form-control mayuscula" name="habitacion" id="habitacion" style="width:100%;">
                                                                    <option value=''>Seleccionar</option>
                                                                    <?php 
                                                                        foreach ($habitaciones as $row) {
                                                                            echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>    
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Cantidad de Habitaciones:</label>
                                                                <select class="form-control" name="cantidad_habitacion" id="cantidad_habitacion" style="width:100%;">
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

                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Personas por Habitación:</label>
                                                                <select class="form-control" name="cantidad_persona" id="cantidad_persona" style="width:100%;">
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
                                                        </div>    

                                                        <div class="form-group"> 
                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Disponibilidad:</label>
                                                                <select class="form-control" name="disponibilidad" id="disponibilidad" style="width:100%;">
                                                                    <option value='SI'>SI</option>
                                                                    <option value='NO'>NO</option>                                                
                                                                </select>
                                                            </div> 

                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Moneda:</label>
                                                                <select class="form-control mayuscula" name="moneda" id="moneda" style="width:100%;">
                                                                    <option value=''>Seleccionar</option>
                                                                    <?php 
                                                                        foreach ($monedas as $row) {
                                                                            echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>  
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Precio Mínimo:</label>
                                                                <input type="text" name="precio_minimo" id="precio_minimo" class="form-control precio" placeholder="Ingresé precio máximo" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                                            </div>
                                                            
                                                            <div class="col-sm-5">
                                                                <label class="col-sm-0 control-label">Precio Máximo:</label>
                                                                <input type="text" name="precio_maximo" id="precio_maximo" class="form-control precio" placeholder="Ingresé precio mínimo" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td  width="50%">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <label class="col-sm-0 control-label">Servicios de Habitación:</label>
                                                                <textarea id="servicios_habitacion" name="servicios_habitacion" style="display:block;" class="mayuscula"></textarea>
                                                            </div> 
                                                        </div>
                                                    </td>
                                                </tr>                   

                                                <tr>
                                                    <td colspan="2">                
                                                        <div class="col-sm-12">&nbsp;</div>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="btn-toolbar" align="right">
                                                                        <button type="submit" class="btn-primary btn title-botton" id="btn-botton" value="guardar">Registrar</button>
                                                                        <a href="#" style="color:#000;text-decoration:none;" data-dismiss="modal"><text class="btn btn-default">Cerrar</text></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>