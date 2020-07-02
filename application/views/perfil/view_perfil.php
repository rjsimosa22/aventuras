<div id="page-content">
    <div id='wrap'>

        <!--Indicador para saber en el modulo que estas ingresado-->
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('home');?>">Inicio</a></li>
                <li>Perfil</li>
                <li class="active">Editar Perfil</li>
            </ol>

            <h1>Editar Perfil</h1>

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
                                <h4>Información del Perfil</h4>
                            </div>

                            <div class="panel-body collapse in">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Cédula:</label>
                                        <input type="hidden" name="url" id="url" class="form-control" value="<?= site_url('perfil/modificar_perfil'); ?>" />
                                        <input type="text" name="ced" id="ced" class="form-control" placeholder="Ingresé cédula del usuario" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $row['ced'];?>" readonly="readonly" />
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Nombre:</label>
                                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Ingresé nombre del usuario" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= ucwords($row['nom']);?>" />
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Apellido:</label>
                                        <input type="text" name="ape" id="ape" class="form-control" placeholder="Ingresé apellido del usuario" onKeyPress="return soloLetras(event)" autocomplete="off" value="<?= ucwords($row['ape']);?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Fecha Nacimiento:</label>
                                        <input type="text" class="form-control" name="fnac" id="datepicker" placeholder="Por favor seleccione la fecha..." style="background: white;" value="<?= $row['fnac'];?>" readonly="readonly">
                                  </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Teléfono Celular:</label>
                                        <input type="text" name="tcel" id="tcel" class="form-control" placeholder="Ingresé teléfono celular" onKeyPress="return soloNumeros(event)" autocomplete="off" value="<?= $row['tcel'];?>" />
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-0 control-label">Estatus:</label>
                                        <input type="text" name="nom_sta" id="nom_sta" class="form-control" value="<?= $row['nom_sta'];?>" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-0 control-label">Dirección:</label>
                                         <textarea name="dir" id="dir" class="form-control" placeholder="Ingresé dirección del usuario" autocomplete="off"><?= ucfirst($row['dir']);?></textarea>
                                    </div>
                                </div>
                                
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="btn-toolbar" align="right">
                                                <button type="submit" class="btn-primary btn" id="btn" name="btn" value="guardar">Guardar</button>
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