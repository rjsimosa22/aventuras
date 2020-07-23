<div id="page-content">
    <div id='wrap'>

        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Configuración</li>
                <li class="active">Ofertas</li>
            </ol>

            <h1>Listado de Ofertas</h1>

            <div class="options">
                <div class="btn-toolbar">
                    <a href="javascript:void(0);" onClick="consultar('','','');$('#val_multiple').hide();$('.titulo-servicioL').css('color','none');" style="color:#000;text-decoration:none;">
                        <button class="btn btn-default" title='Nuevo Descuentos o Aumentos'>
                            <i class="icon-plus"></i> 
                            <span class="hidden-xs hidden-sm">Nueva Oferta</span>
                        </button>
                    </a>    
                </div>
            </div>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <div id='row'>
                <div class="col-md-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading" style="background:#b52182">
                            <h4>Ofertas</h4>
                        </div>
                        
                        <div class="panel-body collapse in table-responsive">
                            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered datatables" id="example">
                                <?php include 'application/views/notificacion/alert.php';?>
                                <thead>
                                    <tr>
                                        <th width="15%">Nombre</th>
                                        <th width="15%">Descripción</th>
                                        <th width="15%"><center>Estatus</center></th>
                                        <th width="15%"><center>Acción</center></th>
                                    </tr>
                                </thead>
                                
                                <?php
                                    if(count($listado)>0) {
                                        $c=1;
                                        foreach($listado as $row) {
                                            $cn=$c++;
                                ?>
                                
                                            <tr class="odd gradeX mayuscula">
                                                <td><?= $row->nombre;?></td>
                                                <td>
                                                    <?php 
                                                        if(empty($row->descripcion)) { 
                                                            echo "N/A";
                                                        } else { 
                                                            echo $row->descripcion;
                                                        }
                                                        ?>
                                                </td>
                                                <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= strtoupper($row->nombre_status);?></td>
                                                <td align="center">
                                                    <a href="javascript:void(0);" onClick="consultar('<?= $row->id;?>','ver','<?= site_url();?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-eye-open" title="Visualizar"></i></a>&nbsp;&nbsp;
                                                    <a href="javascript:void(0);" onClick="consultar('<?= $row->id;?>','editar','<?= site_url();?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-edit" title="Editar"></i></a>&nbsp;
                                                            
                                                    <?php 
                                                        if($row->status=='1') {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="inactivar('<?= ucwords($row->nombre);?>', '<?= site_url('crud/monedas/inactivar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ban-circle" title="Inactivar"></i></a>
                                                    <?php
                                                        } else {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="activar('<?= ucwords($row->nombre);?>', '<?= site_url('crud/monedas/activar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ok" title="Activar"></i></a>
                                                    <?php
                                                        } 
                                                    ?>
                                                                                
                                                </td>
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
            
            <!-- Modal Registro y actualizacion -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title title-formulario">Registrar Oferta</h4>
                        </div>
            
                        <div class="modal-body">
                            <div class="form-horizontal row-border" role="form" id="form" name="form" action="" method="POST" >
                                <div id='row'>
                                    <div class="col-md-12">
                                        <div class="panel panel-sky">
                                            <div class="collapse in">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-0 control-label titulo-nombre">Nombre</label>
                                                        <input type="hidden" name="id" id="id">
                                                        <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url();?>" />
                                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" onKeyPress="return soloLetras(event)" autocomplete="off" onblur="validarForm()"/>
                                                        <label for="" id="val_nombre" style="display:none;">Campo requerido.</label> 
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-0 control-label titulo-daterangepicker3">Fecha</label>
                                                        <input for="daterangepicker3" name="daterangepicker" type="text" class="form-control" id="daterangepicker3" placeholder="Seleccione fecha" onblur="validarForm()"/>
                                                        <label for="" id="val_daterangepicker3" style="display:none;">Campo requerido.</label> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label  titulo-id_oferta">Tipo de Oferta:</label>
                                                        <select class="form-control mayuscula" name="id_oferta" id="id_oferta" style="width:100%;" onchange="tipoEvento();validarForm()">
                                                            <option value="">Seleccionar</option>
                                                            <?php 
                                                                foreach ($tipo_descuentos as $row) {
                                                                    echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <label for="" id="val_id_oferta" style="display:none;">Campo requerido.</label> 
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label titulo-id_aplica">Aplicar Para:</label>
                                                        <select class="form-control mayuscula" name="id_aplica" id="id_aplica" style="width:100%;" onblur="validarForm()">
                                                            <option value="3">Ambos</option>
                                                            <option value="1">Tours</option>
                                                            <option value="2">Paquetes</option>
                                                        </select>
                                                        <label for="" id="val_id_aplica" style="display:none;">Campo requerido.</label>
                                                    </div>
                                                </div> 
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-0 control-label titulo-destino">Destinos:</label>
                                                        <select class="form-control mayuscula" name="destino" id="destino" style="width:100%;" onblur="validarForm()">
                                                            <option value="0">Aplicar para todos</option>    
                                                            <?php 
                                                                foreach ($listado_destino as $row) {
                                                                    echo '<option value="'.$row->id.'">'.$row->distrito.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <label for="" id="val_destino" style="display:none;">Campo requerido.</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="col-sm-0 control-label titulo-servicioL">Listado de Tours y Paquetes:</label>
                                                        <select multiple="" class="selectpicker form-control" name="number_multiple" id="number-multiple" multiple data-selected-text-format="count" data-live-search="true" title="Seleccionar" data-hide-disabled="true" data-actions-box="true" data-dropup-auto="false" onchange="validarForm()"></select>
                                                        <label for="" id="val_multiple" style="display:none;">Campo requerido.</label> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label">Mínimo de Personas Condición:</label>
                                                        <select class="form-control mayuscula" name="persona" id="persona" style="width:100%;" onchange="tipoEvento();validarForm()">
                                                            <option value="0">Seleccionar</option>
                                                            <?php 
                                                                    for($i=1;$i<21;$i++){
                                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                                    }   
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label">Monto Mínimo Condición es en S/.:</label>
                                                        <input type="text" name="monto" id="monto" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label titulo-regla_monto">Tipo Oferta</label>
                                                        <select class="form-control mayuscula" name="regla_monto" id="regla_monto" style="width:100%;" onchange="validarForm()">
                                                            <option value="0">Seleccionar</option>
                                                            <option value="1">Porcentaje %</option>
                                                            <option value="2">Monto S/.</option>
                                                        </select>
                                                        <label for="" id="val_regla_monto" style="display:none;">Campo requerido.</label> 
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-0 control-label titulo-monto_porcentaje">Monto Oferta:</label>
                                                        <input type="text" name="monto_porcentaje" id="monto_porcentaje" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" onblur="validarForm()"/>
                                                        <label for="" id="val_monto_porcentaje" style="display:none;">Campo requerido.</label>             
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-0 control-label">Descripción:</label>
                                                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingresé descripción"  autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12">&nbsp;</div>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="btn-toolbar" align="right">
                                                                <button type="submit" class="btn-primary btn title-botton" id="btn-botton" value="guardar" onclick="formRegistro()">Guardar</button>
                                                                <a href="#" style="color:#000;text-decoration:none;" data-dismiss="modal"><text class="btn btn-default">Cerrar</text></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
            <!-- Fin Modal -->
    </div>
        <!--Fin Container-->
</div>  