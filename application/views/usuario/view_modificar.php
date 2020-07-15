<div id='wrap'>
        
    <!--Indicador para saber en el modulo que estas ingresado-->
    <div id="page-heading">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('home');?>">Inicio</a></li>
            <li>Usuarios</li>
            <li class="active">Modificar Usuario</li>
        </ol>

        <h1>Modificar Usuario</h1>

        <div class="options">
            <div class="btn-toolbar">
                <button class="btn btn-default">
                    <i class="icon-calendar-empty"></i> 
                    <span class="hidden-xs hidden-sm"><?php setlocale(LC_ALL, 'es_ES').': ';echo iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time())); ?></span>
                </button>
            </div>
        </div>
    </div>
    <!--Fin-->

    <!--Inicio de Container-->
    <div class="container">
        <form class="form-horizontal row-border" role="form" id="form" name="form" action="" method="POST" >
            <div id='row'>
                <div class="col-md-12">
                    <div class="panel panel-sky">

                        <div class="panel-heading" style="background:#373737">
                            <h4>Información del Usuario</h4>
                        </div>

                        <div class="panel-body collapse in">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">D.N.I:</label>
                                    <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('usuario/modificar'); ?>" />
                                    <input type="text" name="ced" id="ced" class="form-control" placeholder="Ingresé cédula del usuario" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $row['ced'];?>" readonly="readonly" />
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">Nombre:</label>
                                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Ingresé nom del usuario" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= $row['nom'];?>" />
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">Apellido:</label>
                                    <input type="text" name="ape" id="ape" class="form-control" placeholder="Ingresé ape del usuario" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= $row['ape'];?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">Tipo de Usuario:</label>
                                    <select name="rol" id="rol" class="form-control">
                                        
                                        <?php if($row['rol']=='1') { ?>
                                        <option value="1">Administrador</option>
                                        <option value="2">Vendedor</option>
                                        <?php } else { ?>
                                        <option value="2">Vendedor</option>
                                        <option value="1">Administrador</option>
                                        <?php }?> 
                                    </select>

                                </div>

                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">Clave:</label>
                                    <input type="password" name="clav" id="clav" class="form-control" placeholder="Ingresé clave" autocomplete="off" value="<?= md5($row['clav']);?>" />
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-sm-0 control-label">Repetir Clave:</label>
                                    <input type="password" name="clav1" id="clav1" class="form-control" placeholder="Ingresé clave" autocomplete="off" value="<?= md5($row['clav']);?>" />
                                </div>
                            </div>

                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="btn-toolbar" align="right">
                                            <button type="submit" class="btn-primary btn" id="btn" name="btn" value="guardar">Guardar</button>
                                            <a href="<?= site_url('usuario/listado');?>" style="color:#000;text-decoration:none;"><text class="btn btn-danger">Ir a información de usuarios</text></a>
                                        </div>
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
    <!--Fin Container-->
        
</div>       
