<div id="page-content">
    <div id='wrap'>

        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Configuración</li>
                <li class="active">Temáticas Tours</li>
            </ol>

            <h1>Listado de Temáticas Tours</h1>

            <div class="options">
                <div class="btn-toolbar">
                    <a href="javascript:void(0);" onClick="consultar('','','')" style="color:#000;text-decoration:none;">
                        <button class="btn btn-default" title='Nueva Moneda'>
                            <i class="icon-plus"></i> 
                            <span class="hidden-xs hidden-sm">Nueva Temática</span>
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
                            <h4>Temáticas</h4>
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
                                                <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
                                                <td align="center">
                                                    <a href="javascript:void(0);" onClick="consultar('<?= $row->id;?>','ver','<?= site_url();?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-eye-open" title="Visualizar"></i></a>&nbsp;&nbsp;
                                                    <a href="javascript:void(0);" onClick="consultar('<?= $row->id;?>','editar','<?= site_url();?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-edit" title="Editar"></i></a>&nbsp;
                                                            
                                                    <?php 
                                                        if($row->status=='1') {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="inactivar('<?= ucwords($row->nombre);?>', '<?= site_url('crud/tematicas/inactivar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ban-circle" title="Inactivar"></i></a>
                                                    <?php
                                                        } else {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="activar('<?= ucwords($row->nombre);?>', '<?= site_url('crud/tematicas/activar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ok" title="Activar"></i></a>
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
							<h4 class="modal-title title-formulario" >Registrar Temática</h4>
                        </div>
            
                        <div class="modal-body">
                            <form class="form-horizontal row-border" role="form" id="form" name="form" action="" method="POST" >
                                <div id='row'>
                                    <div class="col-md-12">
                                        <div class="panel panel-sky">
                                            <div class="collapse in">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-0 control-label">Nombre</label>
                                                        <input type="hidden" name="id" id="id">
                                                        <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url();?>" />
                                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" onKeyPress="return soloLetras(event)" autocomplete="off"/>
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
                                                                <button type="submit" class="btn-primary btn title-botton" id="btn-botton" value="guardar">Guardar</button>
                                                                <a href="#" style="color:#000;text-decoration:none;" data-dismiss="modal"><text class="btn btn-default">Cerrar</text></a>
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
                    </div>
                </div>
			</div>
        </div>
            <!-- Fin Modal -->
    </div>
        <!--Fin Container-->
</div>  