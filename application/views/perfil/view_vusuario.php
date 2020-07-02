<div id="page-content">
    <div id='wrap'>

        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Usuarios</li>
                <li class="active">Visualización Usuario</li>
            </ol>

            <h1>Visualización Usuario</h1>

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
            <form class="form-horizontal row-border" role="form" id="form" name="form" action="" method="POST">
                <div id='row'>
                    <div class="col-md-12">
                        <div class="panel panel-sky">

                            <div class="panel-heading" style="background:#373737">
                                <h4>Información de la Cuenta</h4>
                            </div>

                            <div class="panel-body collapse in">
                                
                                <?php include 'application/views/notificacion/alert.php';?>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Usuario:</label>
                                        <input type="text" name="usu" id="usu" class="form-control" placeholder="Ingresé usuario" autocomplete="off" value="<?= $row['usu'];?>" disabled />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="col-sm-0 control-label">Tipo Usuario:</label>
                                        <input type="text" name="rol" id="rol" class="form-control" placeholder="Ingresé clave" autocomplete="off" value="<?php if($row['rol'] == '0'){echo "Administrador";} else {echo "Operador";} ?>" disabled />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Nueva Clave:</label>
                                        <input type="password" name="clav" id="clav" class="form-control" placeholder="Ingresé nueva clave" autocomplete="off" value="<?= md5($row['clav']);?>" disabled />
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="btn-toolbar" align="right">
                                               <a href="<?= site_url('home');?>" style="color:#000;text-decoration:none;"><text class="btn btn-danger"><i style="font-size: 20px;" class="icon-home"></i>&nbsp;Ir a inicio</text></a>
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
</div>