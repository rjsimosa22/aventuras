<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--BARRA ADICIONAL PARA VISUALIZAR LAS OPCIONES DE LA CABECERA DEL MENU PRINCIPAL-->
    <!--div id="headerbar" style="background:#373737">
        <div class="container" style="background:#373737">
            <div class="row">

                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-brown">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-pencil"></i></div>
                        </div>
                        <div class="tiles-footer"> 0 </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-grape">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-group"></i></div>
                            <div class="pull-right"><span class="badge"> 0 </span></div>
                        </div>
                        <div class="tiles-footer"> 1 </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-primary">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-envelope-alt"></i></div>
                            <div class="pull-right"><span class="badge"> 0 </span></div>
                        </div>
                        <div class="tiles-footer"> 2 </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-inverse">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-camera"></i></div>
                            <div class="pull-right"><span class="badge">0</span></div>
                        </div>
                        <div class="tiles-footer"> 3 </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-green">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-cog"></i></div>
                        </div>
                        <div class="tiles-footer"> 4 </div>
                    </a>
                </div>
                
                <div class="col-xs-6 col-sm-2">
                    <a href="#" class="shortcut-tiles tiles-green">
                        <div class="tiles-body">
                            <div class="pull-left"><i class="icon-cog"></i></div>
                        </div>
                        <div class="tiles-footer"> 4 </div>
                    </a>
                </div>

            </div>
        </div>
    </div-->
<!--FIN DE LA CABECERA-->

<!--MENU PRINCIPAL DE LA PAGINA-->       
    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <!--TOGGLE DEL MENU SECUNDARIO PARA QUE SE ADAPTE DE FORMA RESPONSE-->
            <a id="leftmenu-trigger" class="pull-left" data-toggle="tooltip" data-placement="bottom" title="Ocultar Menu"></a>
            <!--a id="rightmenu-trigger" class="pull-right" data-toggle="tooltip" data-placement="bottom" title="Toggle Right Sidebar"></a-->
        <!--FIN DE TOGGLE-->

        <!--IMAGEN DE LA EMPRESA SE VISUALIZA EN EL MENU PRINCIPAL-->
            <div class="navbar-header pull-left texts">
                &nbsp;&nbsp;<strong>Aventuras.<span style="color:#f3e215">PE</span></strong>
            </div> 
        <!--FIN DE LA IMAGEN-->

        <ul class="nav navbar-nav pull-right toolbar">
            <!--VENTENA QUE CONTIENE LOS DATOS DEL USUARIO REGISTRADO EN EL SISTEMA-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs"><strong><?= ucwords($nomape);?></strong>&nbsp;<i class="icon-caret-down icon-scale"></i></span><img src="<?= base_url();?>public/demo/avatar/avatar1.png" alt="Avatar"/></a>
                    <ul class="dropdown-menu userinfo arrow">
                        <li class="username">
                            <a href="#">
                                <div class="pull-left"><img class="userimg" src="<?= base_url();?>public/demo/avatar/avatar.png" alt="Jeff Dangerfield" /></div>
                                <div class="pull-right"><h5> Bienvenido </h5><h5><?php if($rol == '1') { ?>Administrador<?php } else {?>Vendedor<?php }?></h5><small><span></span></small></div>
                            </a>
                        </li>

                        <li class="userlinks">
                            <ul class="dropdown-menu">
                                <!--li><a href="<?= site_url('perfil/perfil?id='.base64_encode($cedula));?>"> Editar Perfil <i class="pull-right icon-pencil"></i></a></li>
                                <li><a href="<?= site_url('perfil/perfil?ids='.base64_encode($cedula));?>"> Editar Contraseña <i class="pull-right icon-lock"></i></a></li>
                                <li class="divider"></li-->
                                <li><a href="<?= site_url('login/salir');?>"> Cerrar Sesión <i class="pull-right icon-off"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <!--FIN DE LA VENTANA-->

            <!--VENTENA QUE CONTIENE LOS MENSAJE DEL USUARIO-->
                <!--li class="dropdown">

                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i class="icon-envelope"></i><span class="badge"> 0 </span></a>
                    <ul class="dropdown-menu messeges arrow">

                        <li>
                            <span> Usted tiene 0 mensaje(s) nuevo </span>
                            <span><a href="#"> Marcar todos como leídos </a></span>
                        </li>

                        <li>
                            <a href="#" class="active">
                                <span class="time"> 6 mins </span>

                                <div><i class="pull-left icon-envelope-alt"></i><span class="name"> Ejemplo </span><span class="msg"> Para visualizar el primer ejemplo. </span></div>
                            </a>
                        </li>

                        <li>
                            <a class="dd-viewall" href="#"> Ver Todos los Mensajes </a>
                        </li>

                   </ul>
                </li-->
            <!--FIN DE LA VENTANA-->


            <!--EFECTO TOGGLE PARA VISUALIZAR EL MENU SECUNDARIO DE LA PESTAÑA SUPERIOR-->
                <!--li>
                    <a href="#" id="headerbardropdown"><span><i class="icon-level-down"></i></span></a>
                </li-->
            <!--FIN TOGGLE-->

            <!--OPCION DE CONFIGURACION DEL SISTEMA-->
                <!--li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>

                    <ul class="dropdown-menu arrow dropdown-menu-form" id="demo-dropdown">
                        <li>
                            <label for="demo-header-variations" class="control-label">Header Colors</label>
                            <ul class="list-inline demo-color-variation" id="demo-header-variations">
                                <li><a class="color-black" href="javascript:;" data-headertheme="header-black.css"></a></li>
                                <li><a class="color-dark" href="javascript:;" data-headertheme="default.css"></a></li>
                                <li><a class="color-red" href="javascript:;" data-headertheme="header-red.css"></a></li>
                                <li><a class="color-blue" href="javascript:;" data-headertheme="header-blue.css"></a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <label for="demo-color-variations" class="control-label">Sidebar Colors</label>
                            <ul class="list-inline demo-color-variation" id="demo-color-variations">
                                <li><a class="color-lite" href="javascript:;" data-theme="default.css"></a></li>
                                <li><a class="color-steel" href="javascript:;" data-theme="sidebar-steel.css"></a></li>
                                <li><a class="color-lavender" href="javascript:;" data-theme="sidebar-lavender.css"></a></li>
                                <li><a class="color-green" href="javascript:;" data-theme="sidebar-green.css"></a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <label for="fixedheader">Fixed Header</label>
                            <div id="fixedheader" style="margin-top:5px;"></div> 
                        </li>
                    </ul>
                </li-->
        </ul>
    </header>
<!--FIN DEL MENU PRINCIPAL-->     