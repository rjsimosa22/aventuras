<div id='wrap'>

    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
            <li><a href="<?= site_url('listours/listado');?>">Listado Tours</a></li>
            <li class="active">Editar Tours</li>
        </ol>
        <h1>Editar Tours</h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading" style="background:#b52182">
                    <h4>Editar Tours</h4>
                </div>

                <div class="panel-body">
                    <div class="table-responsive" style="border:0px;">
                        <form class="form-horizontal row-border" id="wizard" name="form" action="" method="POST">

                            <!--Paso 1-->
                            <fieldset title="Paso 1">
                                <legend class="legends">Información de Tours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Tours</h3></label></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Tours:</label>
                                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $info->id;?>" />
                                        <input type="hidden" name="url1" id="url1" class="form-control" value="<?= site_url();?>" />
                                        <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('edittours/editar');?>" />
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" autocomplete="off" value="<?= strtoupper($info->nombre);?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                        <select class="js-example-basic-single" name="departamento" id="departamento" style="width:100%;">
                                            <?php 
                                                foreach($departamento as $row1) {
                                                    if($info->id_departamento!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.strtoupper($row1->nombre).'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.strtoupper($row1->nombre).'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                        <select class="js-example-basic-single" name="provincia" id="provincia" style="width:100%;">
                                            <?php 
                                                foreach($provincia as $row1) {
                                                    if($info->id_provincia!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.strtoupper($row1->nombre).'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.strtoupper($row1->nombre).'</option>';
                                                    }  
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                    </div>
                                </div>     

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                        <select class="js-example-basic-single" name="distrito" id="distrito" style="width:100%;">
                                            <?php 
                                                foreach($distrito as $row1) {
                                                    if($info->id_distrito!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.strtoupper($row1->nombre).'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.strtoupper($row1->nombre).'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                    </div>
                                                        
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Duración:</label>
                                        <select class="form-control" name="duracion" id="duracion" style="width:100%;">
                                            <?php 
                                                foreach($duracion as $row1) {
                                                    if($info->id_duracion!=$row1->id){
                                                        echo '<option value="'.$row1->id.'">'.strtoupper($row1->nombre).'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.strtoupper($row1->nombre).'</option>';
                                                    }  
                                                }
                                            ?>
                                        </select>
                                    </div>   
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Moneda:</label>
                                        <select class="form-control" name="moneda" id="moneda" style="width:100%;">
                                            <?php 
                                                foreach($monedas as $row1) {
                                                    if($info->id_moneda!=$row1->id){
                                                        echo '<option value="'.$row1->id.'">'.strtoupper($row1->nombre).'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.strtoupper($row1->nombre).'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>    
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Precio Mínimo:</label>
                                        <input type="text" name="precio_minimo" id="precio_minimo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $info->precio_minimo;?>" />
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Precio Máximo:</label>
                                        <input type="text" name="precio_maximo" id="precio_maximo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $info->precio_maximo;?>" />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label" id="title_Tematica">Temática:</label>
                                        <select class="js-example-basic-multiple" name="tematica[]" id="tematica" multiple="multiple" style="width:100%;">
                                            <?php 
                                                foreach($tematicas as $row1) {
                                                    $selected="";
                                                    foreach($tematicas_seleccionada as $row2) {
                                                        if($row1->id==$row2->id) {
                                                            $selected="selected";
                                                        }
                                                    }    
                                                    echo '<option value="'.$row1->id.'" '.$selected.'>'.strtoupper($row1->nombre).'</option>';
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Tematica" style="display:none;">Campo requerido.</label>  
                                    </div>
                                </div>        
                            </fieldset>
                            <!--Fin Paso 1-->

                            <!--Paso 2-->
                            <fieldset title="Paso 2">
                                <legend class="legends">Detalle de Tours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Tours</h3></label></div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Descripción:</label>
                                        <textarea id="descripcion" name="descripcion" style="display:none;" class="mayuscula"><?= $info->descripcion;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Detalle:</label>
                                        <textarea id="detalle" name="detalle" style="display:none;" class="mayuscula"><?= $info->detalle;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Recomendación:</label>
                                        <textarea id="recomendacion" name="recomendacion" style="display:none;" class="mayuscula"><?= $info->recomendacion;?></textarea>
                                    </div> 
                                </div>
                            </fieldset>
                            <!--Fin Paso 2-->

                            <!--Paso 3-->
                            <fieldset title="Paso 3" style="display: block;">
                                <legend class="legends">Detalle de Imágenes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Imágenes</h3></label></div>
                                    
                                <div class="form-group">
                                    <br>            
                                    <div class="col-sm-12">
                                        <div class="options" align="right">
                                            <div class="btn-toolbar">
                                                <a href="javascript:void(0);" onClick="consultar_imagenes();" style="color:#000;text-decoration:none;">
                                                    <div class="btn btn-default" title='Nueva Imagen'>
                                                        <i class="icon-plus"></i> 
                                                        <span class="hidden-xs hidden-sm">Nueva Imagen</span>
                                                    </div>
                                                </a>    
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <div class="panel-heading" style="background:#868686">
                                            <h4>Imágenes</h4>
                                        </div>

                                        <div class="panel-body collapse in">
                                            <div class="table-responsive" style="border:0;">
                                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example" width="100%">
                                                    <?php include 'application/views/notificacion/alert_modal.php';?>
                                                    <thead>
                                                        <tr>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th><center>Estatus</center></th>
                                                            <th><center>Acción</center></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>                      
                            </fieldset>
                            <!--Fin Paso 3-->

                            <input type="hidden" id="btn" name="btn" value="editar">
                            <input type="submit" class="btn-primary btn" value="Editar">
                        </form>
                        <div class="panel-footer" style="margin-top:-70px;height:80px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Container-->   
    <!-- Modal Registro y actualizacion -->
	<div class="modal fade" id="myModalimagenes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                    <input type="file" name="picture" id="fileInput" style="display:none"/>
                                                </form>
                                                   
                                                <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                                                <a class="editLink" href="javascript:void(0);" id="ocultarbtn"><button class="btn-primary btn" value="Editar Imagen" style="margin-top:-20px;width:100%;">Editar Imagen</button></a>
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
