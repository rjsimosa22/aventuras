<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="page-container">
    <nav id="page-leftbar" role="navigation">
        <ul class="acc-menu" id="sidebar">
            <li id="search">
               <a href="javascript:;"><i class="icon-search opacity-control"></i></a>
                <form>
                    <input type="text" class="search-query" placeholder="Search..." disabled />
                   <button type="submit"><i class="icon-search"></i></button>
               </form>
            </li>
            
            <li class="divider"></li>

            <li><a href="<?= site_url('home/index');?>"><i style="font-size: 17px;" class="icon-home"></i> <span>Inicio</span></a></li>

            <li><a href="javascript:;"><i class="icon-cogs"></i> <span>Configuración</span> </a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('crud/monedas/');?>">Monedas</a></li>
                    <li><a href="<?= site_url('crud/tematicas/');?>">Temáticas</a></li>
                    <li><a href="<?= site_url('crud/ofertas/');?>">Ofertas</a></li>
                </ul>
            </li>
			
            <!--li><a href="javascript:;"><i class="icon-qrcode"></i> <span>Vitrinas</span></a>
                <ul class='acc-menu'>
                    <li><a href="<?= site_url('vitrina');?>">Nuevo Vitrina</a></li>
                    <li><a href="<?= site_url('vitrina/listado');?>">Información de Vitrinas</a></li>
                </ul>
            </li>

			<li><a href="javascript:;"><i class="icon-group"></i> <span>Vendedores</span></a>
                <ul class='acc-menu'>
                    <li><a href="<?= site_url('vendedor');?>">Nuevo Vendedor</a></li>
                    <li><a href="<?= site_url('vendedor/listado');?>">Información de Vendedores</a></li>
                </ul>
            </li>
			
            <li><a href="javascript:;"><i class="icon-credit-card"></i> <span>Tipos de Tarjetas</span></a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('tipo_tarjeta');?>">Nuevo Tipo de Tarjeta</a></li>
                    <li><a href="<?= site_url('tipo_tarjeta/listado');?>">Información de Tarjetas</a></li>
                </ul>
            </li>

            <li><a href="javascript:;"><i class="icon-money"></i> <span>Formas de Pagos</span></a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('forma_pago');?>">Nueva Forma de Pago</a></li>
                    <li><a href="<?= site_url('forma_pago/listado');?>">Información de Pagos</a></li>
                </ul>
            </li>

            <li><a href="javascript:;"><i class="icon-cogs"></i> <span>Servicios Operacionales</span> </a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('servicio_operacional');?>" id="servicio">Nuevo Servicio</a></li>
                    <li><a href="<?= site_url('servicio_operacional/listado');?>">Información de Servicios</a></li>
                </ul>
            </li-->

            <!--PERMITE REALIZAR DIVISIONES CON FRANJAS-->
            <li class="divider"></li>

            <?php if($rol == '1') { ?>
                <li><a href="<?= site_url('usuario/index');?>"><i class="icon-group"></i> <span>Usuarios</span></a></li>            
            
                <!--li><a href="javascript:;"><i class="icon-bar-chart"></i> <span>Reportes</span></a>
                    <ul class="acc-menu">
                        <li><a href="<?= site_url('reporte');?>">Generador de Reportes</a></li>
                    </ul>
                </li>

                <li><a href="javascript:;"><i class="icon-calendar"></i> <span>Inventario</span></a>
                    <ul class="acc-menu">
                        <li><a href="<?= site_url('inventario');?>">Nuevo Inventario</a></li>
                        <li><a href="<?= site_url('inventario/listado');?>">Información de Inventario</a></li>
                    </ul>
                </li>
            <?php }?>
            
            <li><a href="javascript:;"><i class="icon-file-text-alt"></i> <span>Ventas</span> </a>
                <ul class="acc-menu">
                        <li><a href="<?= site_url('ventas');?>"><span>Nueva Venta</span></a></li>
                        <li><a href="<?= site_url('ventas/listado');?>">Información de Venta</a></li>
                </ul>
            </li-->
            
            <li><a href="javascript:;"><i class="icon-th-list"></i><span>Tours</span></a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('regtours/index');?>">Nuevo Tours</a></li>
                    <li><a href="<?= site_url('listours/listado');?>">Listado Tours</a></li>
                </ul>
            </li>

            <li><a href="javascript:;"><i class="icon-th-list"></i><span>Hoteles</span></a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('hoteles/index');?>">Nuevo Hotel</a></li>
                    <li><a href="<?= site_url('hoteles/listado');?>">Listado Hoteles</a></li>
                </ul>
            </li>

            <li><a href="javascript:;"><i class="icon-th-list"></i><span>Paquetes</span></a>
                <ul class="acc-menu">
                    <li><a href="<?= site_url('regpaquetes/index');?>">Nuevo Paquete</a></li>
                    <li><a href="<?= site_url('listpaquetes/listado');?>">Listado Paquetes</a></li>
                </ul>
            </li>
            
            <li><a href="javascript:;">&nbsp;</a></li>	
            
            <div style="height: 18%"></div> 
            
            <?php if($rol == '2') { ?>
                <div style="height: 17%"></div> 
            <?php }?>
        
        </ul>
    </nav>