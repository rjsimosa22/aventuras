<div id='wrap'>

    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home/index');?>">Inicio</a></li>
            <li><a href="<?= site_url('listpaquetes/listado');?>">Listado Paquetes</a></li>
            <li class="active">Editar Paquete</li>
        </ol>
        <h1>Editar Paquete</h1>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
                        
                <div class="panel-heading" style="background:#b52182">
                    <h4>Editar Paquete</h4>
                </div>
                        
                <div class="panel-body">
                    <div class="table-responsive" style="border:0px;">
                        <form class="form-horizontal row-border" id="wizard" name="form" action="" method="POST">

                            <!--Paso 1-->
                            <fieldset title="Paso 1">
                                <legend class="legends">Información de Paquete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                                <div class="tops"><label class="col-sm-0 control-label"><h3>Información de Paquete</h3></label></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Paquete:</label>
                                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $info->id;?>" />
                                        <input type="hidden" name="url1" id="url1" class="form-control" value="<?= site_url();?>" />
                                        <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('editpaquetes/editar');?>" />
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresé nombre" value="<?= $info->nombre;?>" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nombre del Paquete SEO:</label>
                                        <input type="text" name="nombre_posic" id="nombre_posic" class="form-control" placeholder="Ingresé nombre SEO" autocomplete="off" value="<?= $info->nombre_posic;?>"/>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Depart">Departamento:</label>
                                        <select class="js-example-basic-single mayuscula" name="departamento" id="departamento" style="width:100%;">
                                            <?php 
                                                foreach($departamento as $row1) {
                                                    if($info->id_departamento!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.$row1->nombre.'</option>';
                                                    } else {
                                                        echo '<option value="'.$row1->id.'" selected>'.$row1->nombre.'</option>';
                                                    }   
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Depart" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Prov">Provincia:</label>
                                        <select class="js-example-basic-single mayuscula" name="provincia" id="provincia" style="width:100%;">
                                            <?php 
                                                foreach($provincia as $row1) {
                                                    if($info->id_provincia!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.$row1->nombre.'</option>';
                                                    }  else {
                                                        echo '<option value="'.$row1->id.'" selected>'.$row1->nombre.'</option>';
                                                    } 
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Prov" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label" id="title_Dist">Distrito:</label>
                                        <select class="js-example-basic-single mayuscula" name="distrito" id="distrito" style="width:100%;">
                                            <?php 
                                                foreach($distrito as $row1) {
                                                    if($info->id_distrito!=$row1->id) {
                                                        echo '<option value="'.$row1->id.'">'.$row1->nombre.'</option>';
                                                    }  else {
                                                        echo '<option value="'.$row1->id.'" selected>'.$row1->nombre.'</option>';
                                                    }  
                                                }
                                            ?>
                                        </select>
                                        <label for="" id="val_Dist" style="display:none;">Campo requerido.</label>    
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="col-sm-0 control-label">Días del Paquete:</label>
                                        <select class="form-control" name="cantidad_dia" id="cantidad_dia" style="width:100%;" onchange="cantidad_dias();">
                                            <?php
                                                for($i=0;$i<10;$i++) {
                                                    if($info->cantidad_dias!=($i+1)) {
                                            ?>
                                                        <option value='<?= ($i+1);?>'><?= ($i+1);?></option>
                                            <?php
                                                    } else {
                                            ?>
                                                        <option value='<?= ($i+1);?>' selected><?= ($i+1);?></option>
                                            <?php            
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" style="display:none">
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Tipo de Descuento:</label>
                                        <select class="form-control" name="tipo_descuento" id="tipo_descuento" style="width:100%;">
                                            <?php
                                                if($info->tipo_descuento=='1') {
                                            ?>
                                                    <option value='1' selected>Por porcentaje</option>
                                                    <option value='2'>Por precio</option>
                                            <?php
                                                } else {
                                            ?>        
                                                    <option value='1'>Por porcentaje</option>
                                                    <option value='2' selected>Por precio</option>
                                            <?php
                                                }
                                            ?>        
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Monto de Descuento:</label>
                                        <input type="text" name="monto_descuento" id="monto_descuento" class="form-control precio" placeholder="Ingresé descuento" onKeyPress="return soloNumeros(event)" value="<?= $info->monto_descuento;?>" autocomplete="off" />
                                    </div>    
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Desripción:</label>
                                        <textarea id="descripcions" name="descripcions" style="display:none;" class="mayuscula"><?= $info->descripcion;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Descripción SEO:</label>
                                        <textarea id="descripcion_posic" name="descripcion_posic" style="display:none;" class="mayuscula"><?= $info->descripcion_posic;?></textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Servicios:</label>
                                        <textarea id="servicios" name="servicios" style="display:none;" class="mayuscula"><?= $info->servicios;?></textarea>
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
                                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="tabla_tours" style="width:100%;vertical-align:middle;">
                                                    <thead>
                                                        <tr>
                                                            <th width="10%">Día</th>
                                                            <th width="30%" id="title_basico">Tours Básico</th>
                                                            <th width="30%" id="title_exclusivo">Tours Exclusivo</th>
                                                            <th width="30%" id="title_recomendado">Tours Recomendado</th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        <?php 
                                                            for($i=0;$i<=9;$i++) {
                                                        ?> 
                                                                <tr class="tr_<?= $i;?> mayuscula" style="display:none;">
                                                                    <td><input type="hidden" name="dias[]" id="dias<?= $i;?>" class="form-control" value="<?= ($i+1);?>"><?= ($i+1);?></td>
                                                                    <td>
                                                                        <select class="js-example-basic-single tours_basico mayuscula" name="tours_basico[]" id="tours_basico_<?= $i;?>" style="width:100%;display:none;">
                                                                            <option value=''>Seleccionar</option>
                                                                            <?php     
                                                                                foreach ($sel_tours as $row1) {
                                                                                    if($sel_tours[$i]->id_tours_basico==$row1->id_tours_basico) {
                                                                                        echo '<option value="'.$row1->id_tours_basico.'" selected>'.$row1->tours_basico.'</option>';
                                                                                    }
                                                                                }
                                                                                
                                                                                foreach ($tours_basico as $row) {
                                                                                    echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                                }                                                                              
                                                                            ?>
                                                                        </select>
                                                                        <label for="" id="val_basico_<?= $i;?>" style="display:none;">Campo requerido.</label>  
                                                                    </td>
                                                                    <td class="tr_<?= $i;?>" style="display:none;">
                                                                        <select class="js-example-basic-single mayuscula" name="tours_exclusivo[]" id="tours_exclusivo_<?= $i;?>" style="width:100%;display:none;">
                                                                            <option value=''>Seleccionar</option>
                                                                            <?php 
                                                                                foreach ($sel_tours as $row1) {
                                                                                    if($sel_tours[$i]->id_tours_exclusivo==$row1->id_tours_exclusivo) {
                                                                                        echo '<option value="'.$row1->id_tours_exclusivo.'" selected>'.$row1->tours_exclusivo.'</option>';
                                                                                    }
                                                                                }
                                                                                
                                                                                foreach ($tours_exclusivo as $row) {
                                                                                    echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                                }  
                                                                            ?>
                                                                        </select>
                                                                        <label for="" id="val_exclusivo_<?= $i;?>" style="display:none;">Campo requerido.</label> 
                                                                    </td>
                                                                    <td class="tr_<?= $i;?>" style="display:none;">
                                                                        <select class="js-example-basic-single tours_recomendado mayuscula" name="tours_recomendado[]" id="tours_recomendado_<?= $i;?>" style="width:100%;display:none;">
                                                                            <option value=''>Seleccionar</option>
                                                                            <?php 
                                                                                foreach ($sel_tours as $row1) {
                                                                                    if($sel_tours[$i]->id_tours_recomendado==$row1->id_tours_recomendado) {
                                                                                        echo '<option value="'.$row1->id_tours_recomendado.'" selected>'.$row1->tours_recomendado.'</option>';
                                                                                    }
                                                                                }
                                                                                
                                                                                foreach ($tours_recomendado as $row) {
                                                                                    echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                                } 
                                                                            ?>
                                                                        </select>
                                                                        <label for="" id="val_recomendado_<?= $i;?>" style="display:none;">Campo requerido.</label>
                                                                    </td>
                                                                </tr>
                                                        <?php 
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
                                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="tabla_tours" style="width:100%;vertical-align:middle;">
                                                    <thead>
                                                        <tr>
                                                            <th id="title_hotel">Hoteles Asignado al Paquete</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php 
                                                            for($i=0;$i<=9;$i++) {
                                                        ?> 
                                                                <tr class="tr_<?= $i;?>" style="display:none;">
                                                                    <td>
                                                                        <select class="js-example-basic-single hoteles_seleccionado mayuscula" name="hoteles_seleccionado[]" id="hoteles_seleccionado_<?= $i;?>" style="width:100%;text-align:left;">
                                                                            <option value=''>Seleccionar</option>
                                                                            <?php 
                                                                                foreach ($sel_hoteles as $row) {
                                                                                    if($sel_hoteles[$i]->id_hoteles==$row->id_hoteles) {
                                                                                        echo '<option value="'.$row->id_hoteles.'" selected>'.$row->nombre.'</option>';
                                                                                    }
                                                                                }

                                                                                foreach ($hoteles as $row) {
                                                                                    echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                        <label for="" id="val_hotel_0" style="display:none;">Campo requerido.</label> 
                                                                    </td>
                                                                </tr>
                                                        <?php 
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
