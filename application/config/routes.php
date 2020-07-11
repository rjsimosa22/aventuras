<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//ex.  lo_que_sea/#   => blog/id || blog/entrada/id

$route['default_controller']='Inicio_frontEnd';
$route['404_override']='';
$route['translate_uri_dashes']=FALSE;

//<!----------------------------------------------------------------------------------------------->
//index
$route['']='Inicio_frontEnd/index';
//index con moneda
$route['(:any)']='Inicio_frontEnd/index_moneda/$1';

//<!----------------------------------------------------------------------------------------------->
// listado de tours
$route['tours/(:any)']='Inicio_frontEnd/listado_tours/$1';
// listado de tours con moneda
$route['tours/(:any)/(:any)']='Inicio_frontEnd/listado_tours_moneda/$1/$2';
// detalle de tours
$route['tour/(:any)/(:any)']='Inicio_frontEnd/detalle_tours/$1/$2/';
// detalle de tours con moneda
$route['tour/(:any)/(:any)/(:any)']='Inicio_frontEnd/detalle_tours_moneda/$1/$2/$3';

//<!----------------------------------------------------------------------------------------------->
// listado de paquetes
$route['paquetes/(:any)']='Inicio_frontEnd/listado_paquetes/$1';
// listado de paquetes con moneda
$route['paquetes/(:any)/(:any)']='Inicio_frontEnd/listado_paquetes_moneda/$1/$2';
// detalle de paquetes
$route['paquete/(:any)/(:any)']='Inicio_frontEnd/detalle_paquetes/$1/$2';
// detalle de paquetes con moneda
$route['paquete/(:any)/(:any)/(:any)']='Inicio_frontEnd/detalle_paquetes_moneda/$1/$2/$3';

//<!----------------------------------------------------------------------------------------------->
// reserva
// carrito
$route['reserva/(:any)']='Inicio_frontEnd/carrito/$1';
// carrito con moneda
$route['reserva/(:any)/(:any)']='Inicio_frontEnd/carrito_moneda/$1/$2';
// datos personales
$route['cliente/(:any)']='Inicio_frontEnd/dpersonales/$1';
// datos personales con moneda
$route['cliente/(:any)/(:any)']='Inicio_frontEnd/dpersonales_moneda/$1/$2';
// datos de pago
$route['pago/(:any)']='Inicio_frontEnd/rpago/$1';
// datos de pago con moneda
$route['pago/(:any)/(:any)']='Inicio_frontEnd/rpago_moneda/$1/$2';
// tramite de pago exitoso
$route['tramite/(:any)/(:any)']='Inicio_frontEnd/pexitoso/$1/$2';

//<!----------------------------------------------------------------------------------------------->
// libro de reclamacion
$route['rexitoso/(:any)/(:any)']='Inicio_frontEnd/rexitoso/$1/$2';
$route['hoja/(:any)']='Inicio_frontEnd/hoja_reclamacion/$1';

//<!----------------------------------------------------------------------------------------------->
// rutas BACK-END TOURS
// pagina de registrar tours
$route['regtours/(:any)']='Tours/index/$1';
// registrar tours
$route['registours/(:any)']='Tours/registrar/$1';
// listados de tours
$route['listours/(:any)']='Tours/listado/$1';
// inactivar tours
$route['inactours/(:any)']='tours/inactivar/$1';
// activar tours
$route['acttours/(:any)']='tours/activar/$1';
// visualizar tours
$route['vistours/(:any)']='tours/consultar/$1';
// modificar tours
$route['modtours/(:any)']='tours/visualizar/$1';
// editar tours
$route['edittours/(:any)']='tours/editar/$1';
// registrar tours imagenes
$route['regtoursimagen/(:any)']='tours/registrar_imagenes/$1';
// registrar tours imagenes ALT SEO
$route['registrarimagenalt/(:any)']='tours/registrar_imagen_alt/$1';
// editar tours imagenes
$route['editoursimagenes/(:any)']='tours/editar_imagen/$1';
// listado de  tours imagenes
$route['listoursimagenes/(:any)']='tours/listado_imagenes/$1';
// listado de  tours imagenes
$route['listoursimagenes/(:any)']='tours/listado_imagenes/$1';
// activar tours imagenes
$route['acttoursimagenes/(:any)']='tours/activar_imagenes/$1';
// inactivar tours
$route['inactoursimagenes/(:any)']='tours/inactivar_imagenes/$1';
// tours imagenes personal
$route['toursimagenpersonal/(:any)']='tours/imagen_personal/$1';
// tours imagenes personal
$route['tourslitado/(:any)']='tours/listado_tours/$1';

//<!----------------------------------------------------------------------------------------------->
// rutas BACK-END PAQUETES
// pagina de registrar paquetes
$route['regpaquetes/(:any)']='Paquetes/index/$1';
// registrar paquetes
$route['regispaquetes/(:any)']='Paquetes/registrar/$1';
// listados de paquetes
$route['listpaquetes/(:any)']='Paquetes/listado/$1';
// inactivar paquetes
$route['inactpaquetes/(:any)']='paquetes/inactivar/$1';
// activar paquetes
$route['actpaquetes/(:any)']='paquetes/activar/$1';
// visualizar paquetes
$route['vispaquetes/(:any)']='paquetes/consultar/$1';
// modificar paquetes
$route['modpaquetes/(:any)']='paquetes/visualizar/$1';
// editar paquetes
$route['editpaquetes/(:any)']='paquetes/editar/$1';