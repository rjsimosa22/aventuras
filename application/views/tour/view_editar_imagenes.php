<div id='wrap'>
    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
            <li><a href="<?= site_url('listours/listado');?>">Listado Tours</a></li>
            <li class="active">Editar Imágenes Tours <?= ucwords($info->nombre);?></li>
        </ol>
        <h1>Editar Imágenes Tours <?= ucwords($info->nombre);?></h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading" style="background:#b52182">
                    <h4>Editar Imágenes Tours</h4>
                </div>

                <div class="panel-body collapse in">
                    <div class="table-responsive" style="border:0;">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables mayuscula" id="example" width="100%">
                            <?php include 'application/views/notificacion/alert.php';?>
                                <thead>
                                    <tr>
                                        <th width="5%">Imagen</th>
                                        <th width="10%">Nombre</th>
                                        <th width="5%"><center>Estatus</center></th>
                                        <th width="5%"><center>Acción</center></th>
                                    </tr>
                                </thead>

                                <?php
                                    if(count($listado_imagenes) > 0) {
                                        foreach($listado_imagenes as $row) {
                                ?>
                                
                                            <tr class="odd gradeX">
                                                <td><img src="<?= site_url('public/img/tours/'.$row->nombre_extension);?>" width="120px" height="70px" /></td>
                                                <td><?= $row->nombre;?></td>
                                                <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
                                                <td align="center">
                                                    <a href="javascript:void(0);" onClick="consultar('<?= base64_encode($row->id_tours);?>','<?= base64_encode($row->id);?>','<?= site_url('/tours/imagen_personal/')?>','<?= site_url('public/img/tours/')?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-edit" title="Editar"></i></a>&nbsp;
                                                                        
                                                    <?php 
                                                        if($row->status=='1') {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="inactivar_imagenes('<?= ucwords($row->nombre);?>','<?= site_url('tours/inactivar_imagenes');?>','<?= base64_encode($row->id);?>','<?= site_url('tours/visualizar_imagenes');?>','<?= base64_encode($info->id);?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ban-circle" title="Inactivar"></i></a>
                                                    <?php
                                                        } else {
                                                    ?>
                                                            <a href="javascript:void(0);" onClick="activar_imagenes('<?= ucwords($row->nombre);?>', '<?= site_url('tours/activar_imagenes');?>','<?= base64_encode($row->id);?>','<?= site_url('tours/visualizar_imagenes');?>','<?= base64_encode($info->id);?>')" style="color:#000;text-decoration:none;"><i style="font-size: 20px;"class="icon-ok" title="Activar"></i></a>
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

        <!-- Modal Registro y actualizacion -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					    <h4 class="modal-title title-formulario" >Editar Imagen</h4>
                    </div>
            
                    <div class="modal-body">
                        <div id='row'>
                            <div class="col-md-12">
                                <div class="panel panel-sky">
                                    <div class="collapse in">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <div class="user-box">
                                            <div class="img-relative">
                                                <div class="overlay uploadProcess" style="display: none;">
                                                    <div class="overlay-content"><img src="<?= site_url('public/img/loader.gif');?>"/></div>
                                                </div>
                                                
                                                <form method="POST" action="<?= site_url('editoursimagenes/editar_imagen');?>" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                                                    <input type="hidden" name="id_tours" id="id_tours">
                                                    <input type="hidden" name="id_imagen" id="id_imagen">
                                                    <input type="hidden" name="nombre_imagen_2" id="nombre_imagen_2">
                                                    <input type="file" name="picture" id="fileInput" style="display:none"/>
                                                </form>
                                                
                                                <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                                                <a class="editLink" href="javascript:void(0);"><input type="#" class="btn-primary btn" value="Editar Imagen" style="margin-top:-20px;width:100%;"></a>
                                                <img src="#" id="imagePreview">
                                            </div>
                                            
                                            <div class="name" style="margin-top:20px;">
                                                <h3><span id="nombre_imagen"></span></h3>
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