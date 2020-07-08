<div id="page-content">
    <div id='wrap'>
        
        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
                <li>Tours</li>
                <li class="active">Registrar Tours</li>
            </ol>

            <h1>Registrar Tours</h1>
        </div>
        <!--Fin-->

        <!--Inicio de Container-->
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-info">
                        
                    <div class="panel-heading" style="background:#b52182">
                        <h4>Regisrar Tours</h4>
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
                                            <input type="hidden" name="url1" id="url1" class="form-control" value="<?= site_url();?>" />
                                            <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('registours/registrar');?>" />
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Nombre del Tours CEO:</label>
                                            <input type="text" name="nombre_posic" id="nombre_posic" class="form-control" placeholder="Ingresé nombre CEO" autocomplete="off" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-6">
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

                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                            <select class="js-example-basic-single mayuscula" name="provincia" id="provincia" style="width:100%;"></select>
                                            <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                            <select class="js-example-basic-single mayuscula" name="distrito" id="distrito" style="width:100%;"></select>
                                            <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label">Duración:</label>
                                            <select class="form-control mayuscula" name="duracion" id="duracion" style="width:100%;">
                                                <option value=''>Seleccionar</option>
                                                    <?php 
                                                        foreach ($duracion as $row) {
                                                            echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                        }
                                                    ?>
                                                </option>    
                                            </select>
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
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

                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label">Precio Mínimo:</label>
                                            <input type="text" name="precio_minimo" id="precio_minimo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label">Precio Máximo:</label>
                                            <input type="text" name="precio_maximo" id="precio_maximo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" />
                                        </div> 

                                        <div class="col-sm-6">
                                            <label class="col-sm-0 control-label" id="title_Tematica">Temática:</label>
                                            <select class="js-example-basic-multiple mayuscula" name="tematica[]" id="tematica" multiple="multiple" style="width:100%;">
                                                <?php 
                                                    foreach ($tematicas as $row) {
                                                        echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
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
                                            <textarea id="descripcion" name="descripcion" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Descripción CEO:</label>
                                            <textarea id="descripcion_posic" name="descripcion_posic" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Detalle:</label>
                                            <textarea id="detalle" name="detalle" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Recomendación:</label>
                                            <textarea id="recomendacion" name="recomendacion" style="display:none;" class="mayuscula"></textarea>
                                        </div> 
                                    </div>
                                </fieldset>
                                <!--Fin Paso 2-->
                                
                                
                                <!--Paso 3-->
                                <fieldset title="Paso 3">
                                    <legend class="legends">Detalle de Imágenes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                    <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Imágenes</h3></label></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-0 control-label">Subir Imágenes:</label>
                                            <input type="hidden" name="imagenes" id="imagenes" />
                                            <input type="hidden" name="urlinsertImg" id="urlinsertImg" value="<?= site_url('regtoursimagen/registrar_imagenes');?>">
                                            <div name="frmImage"  class="dropzone" id="dropzone"></div> 
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