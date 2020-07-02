<div id="page-content">
    <div id='wrap'>
        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
                <li>Paquetes</li>
                <li class="active">Listado Paquetes</li>
            </ol>
            <h1>Listado Paquetes</h1>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <div id='row'>
                <div class="col-md-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading" style="background:#b52182">
                            <h4>Paquetes</h4>
                        </div>
                        
                        <div class="panel-body collapse in">
                            <div class="table-responsive" style="border:0;">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example" width="100%">
                                    <?php include 'application/views/notificacion/alert.php';?>
                                   
                                    <thead>
                                        <tr>
                                            <th width="20%">Nombre</th>
                                            <th width="20%">Ubicación</th>
                                            <th width="10%">Día</th>
                                            <th width="10%">Descuento</th>
                                            <th width="15%"><center>Estatus</center></th>
                                            <th width="15%"><center>Acción</center></th>
                                        </tr>
                                    </thead>

                                    <?php
                                        if(count($listado) > 0) {
                                            foreach($listado as $row) {
                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $row->nombre;?></td>
                                                    <td><?= $row->departamento.' / '.$row->provincia.' / '.$row->distrito;?></td>
                                                    <td><?= $row->cantidad_dias;?></td>
                                                   <td><?= $row->monto_descuento;?> %</td>
                                                    <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
                                                    <td align="center">
                                                        <a href="javascript:void(0);" onClick="visualizar('<?= site_url('vispaquetes/consultar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-eye-open" title="Visualizar"></i></a>&nbsp;
                                                        <a href="javascript:void(0);" onClick="modificar( '<?= site_url('modpaquetes/visualizar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-edit" title="Editar"></i></a>&nbsp;
                                                                
                                                        <?php 
                                                            if($row->status == '1') {
                                                        ?>
                                                                <a href="javascript:void(0);" onClick="inactivar('<?= ucwords($row->nombre);?>', '<?= site_url('inactpaquetes/inactivar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ban-circle" title="Inactivar"></i></a>
                                                        <?php
                                                            } else {
                                                        ?>
                                                                <a href="javascript:void(0);" onClick="activar('<?= ucwords($row->nombre);?>', '<?= site_url('actpaquetes/activar?id='.base64_encode($row->id));?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ok" title="Activar"></i></a>
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
            </div>
        </div>
        <!--Fin Container-->
        
    </div> 
</div>          