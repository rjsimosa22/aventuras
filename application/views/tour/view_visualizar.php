<div id='wrap'>
    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
            <li><a href="<?= site_url('listours/listado');?>">Listado Tours</a></li>
            <li class="active">Visualización Tours</li>
        </ol>

        <h1>Visualización Tours</h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background:#b52182">
                    <h4>Visualización de Tours</h4>
                </div>

                <div class="panel-body">
                    <?php include 'application/views/notificacion/alert.php';?>
                    <div class="table-responsive" style="border:0px;">
                        <div class="form-horizontal row-border" id="wizard" name="form" action="" method="POST">

                            <!--Paso 1-->
                            <fieldset title="Paso 1">
                                <legend class="legends">Información de Tours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Tours</h3></label></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Tours:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= $info->nombre;?>" disabled />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Tours SEO:</label>
                                        <input type="text" name="nombre_posic" id="nombre_posic" class="form-control" placeholder="Ingresé nombre SEO" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= $info->nombre_posic;?>" disabled />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Departamento:</label>
                                        <select class="form-control mayuscula" name="departamento_a" id="departamento_a" style="width:100%;" disabled>
                                            <option value="<?php if($info->id_departamento) { echo $info->departamento; } else { echo "0"; }?>"><?php if($info->departamento) { echo $info->departamento; } else { echo 'Seleccionar';}?></option>
                                        </select>    
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Provincia:</label>
                                        <select class="form-control mayuscula" name="provincia_a" id="provincia_a" style="width:100%;" disabled>
                                            <option value="<?php if($info->id_provincia) { echo $info->provincia; } else { echo "0"; }?>"><?php if($info->provincia) { echo $info->provincia; } else { echo 'Seleccionar';}?></option>
                                        </select>    
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Distrito:</label>
                                        <select class="form-control mayuscula" name="provincia" id="provincia" style="width:100%;" disabled>
                                            <option value="<?php if($info->id_distrito) { echo $info->id_distrito; } else { echo "0"; }?>"><?php if($info->distrito) { echo $info->distrito; } else { echo 'Seleccionar';}?></option>
                                        </select>    
                                    </div> 

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Duración:</label>
                                        <select class="form-control mayuscula" name="duracion" id="duracion" style="width:100%;" disabled>
                                            <option value="<?php if($info->id_duracion) { echo $info->id_duracion; } else { echo "0"; }?>"><?php if($info->duracion) { echo $info->duracion; } else { echo 'Seleccionar';}?></option>
                                            <?php 
                                                foreach($duracion as $row1) {
                                                    if($info->id_duracion!=$row1->id){
                                                        echo '<option value="'.$row1->id.'">'.$row1->nombre.'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>
                                    </div>   
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Moneda:</label>
                                        <select class="form-control mayuscula" name="moneda" id="moneda" style="width:100%;" disabled>
                                            <option value="<?php if($info->id_moneda) { echo $info->id_moneda; } else { echo "0"; }?>"><?php if($info->moneda) { echo strtoupper($info->moneda); } else { echo 'Seleccionar';}?></option>
                                            <?php 
                                                foreach($monedas as $row1) {
                                                    if($info->id_moneda!=$row1->id){
                                                        echo '<option value="'.$row1->id.'">'.$row1->nombre.'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>    
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Precio Mínimo:</label>
                                        <input type="text" name="precio_minimo" id="precio_minimo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $info->precio_minimo;?>" disabled />
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Precio Máximo:</label>
                                        <input type="text" name="precio_maximo" id="precio_maximo" class="form-control precio" placeholder="Ingresé precio" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $info->precio_maximo;?>" disabled />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Temática:</label>
                                        <select class="js-example-basic-multiple mayuscula" name="tematica[]" id="tematica" multiple="multiple" style="width:100%;" disabled>
                                            <?php 
                                                foreach($tematicas as $row1) {
                                                    $selected="";
                                                    foreach($tematicas_seleccionada as $row2) {
                                                        if($row1->id==$row2->id) {
                                                            $selected="selected";
                                                        }
                                                    }    
                                                    echo '<option value="'.$row1->id.'" '.$selected.'>'.$row1->nombre.'</option>';
                                                }
                                            ?>
                                        </select>
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
                                        <textarea id="descripcion" name="descripcion" style="display:none;" disabled><?= $info->descripcion;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Descripción SEO:</label>
                                        <textarea id="descripcion_posic" name="descripcion_posic" style="display:none;" disabled><?= $info->descripcion_posic;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Detalle:</label>
                                        <textarea id="detalle" name="detalle" style="display:none;" disabled><?= $info->detalle;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Recomendación:</label>
                                        <textarea id="recomendacion" name="recomendacion" style="display:none;" disabled><?= $info->recomendacion;?></textarea>
                                    </div> 
                                </div>
                            </fieldset>
                            <!--Fin Paso 2-->

                            <!--Paso 3-->
                            <fieldset title="Paso 3">
                                <legend class="legends">Detalle de Imágenes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Detalle de Detalle</h3></label></div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <br>
                                        <div class="panel-heading" style="background:#868686">
                                            <h4>Imágenes</h4>
                                        </div>
                                   
                                        <div class="panel-body collapse in">
                                            <div class="table-responsive" style="border:0;">
                                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables mayuscula" id="example" width="100%">
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
                                                                <tr class="odd gradeX mayuscula">
                                                                    <td><img src="<?= site_url('public/img/tours/'.$row->nombre_extension);?>" width="120px" height="70px" /></td>
                                                                    <td><?= ucwords(strtolower($row->nombre));?></td>
                                                                    <td align="center" style="background:<?= $row->color;?>;color:#FFF;"><?= $row->nombre_status;?></td>
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
                            <input type="submit" class="btn btn-danger" onclick="window.location.href='<?= site_url('listours/listado');?>'" value="Ir a listado de tours">
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