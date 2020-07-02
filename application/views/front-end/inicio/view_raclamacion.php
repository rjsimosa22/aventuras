<!-- /Banner y campos informativos-->
<section class="hero_in contacts">
    <div class="wrapper">
        <div class="container">
            <h1><span></span>Libro de reclamación</h1>
        </div>
    </div>
</section>
		
<div class="contact_info">
    <div class="container">
        <ul class="clearfix">
            <li>
                <i class="pe-7s-map-marker"></i>
                <h4>Dirección</h4>
                <span>Jr Cahuide 362 Tarapoto</span>
            </li>
            <li>
                <i class="pe-7s-mail-open-file"></i>
                <h4>Correo electrónico</h4>
                <span>info@aventuras.pe<br><small>Lunes a sabado de 9 a.m. a 8 p.m.</small></span>

            </li>
            <li>
                <i class="pe-7s-phone"></i>
                <h4>Información de contactos</h4>
                <span>+ (51) 910926882<br>+ (51) 979180559<br><small>Lunes a sabado de 9 a.m. a 8 p.m.</small></span>
            </li>
        </ul>
    </div>
</div>
<!-- /Banner y campos informativos-->

<!-- /formulario de reclamo-->
<div class="bg_color_1">
    <input type="hidden" name="url" id="url" value="<?= base_url();?>">
	<div class="container margin_80_55">
		<div class="row justify-content-between mensaje_culminado contenido-reclamo">
			<div class="col-lg-12">
                <h4>Libro de reclamación</h4>
                <p align="justify" class="font-size-ruc">TURISMO COSTA SIERRA SELVA Y AVENTURAS DEL PERÚ S.A.C. - RUC 20605153080 - Jr Cahuide 362 Tarapoto.<br>Completa la información y revisaremos tu caso. Te contestaremos dentro de los próximos 30 días. Para conseguir una respuesta más rápida.</p>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label col-sm-0 control-label>Documento de identidad</label>
                            <input type="hidden" name="url" id="url" value="<?= base_url();?>">
                            <input class="form-control" type="text" id="dni" name="dni" placeholder="Ingresa documento de identidad" autocomplete="off" onKeyPress="return soloNumeros(event)">
                            <div id="message-dni" class="validar-campo"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre y apellido</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingresa nombre y apellido" autocomplete="off" onKeyPress="return soloLetras(event)">
                            <div id="message-nombre" class="validar-campo"></div>
                        </div>
                    </div>
                </div>    
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label col-sm-0 control-label>Correo electrónico</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Ingresa correo electrónico" autocomplete="off">
                            <div id="message-email" class="validar-campo"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Número telefónico</label>
                            <input class="form-control" type="text" id="numero" name="numero" placeholder="Ingresa número telefónico" autocomplete="off" onKeyPress="return soloNumeros(event)">
                            <div id="message-numero" class="validar-campo"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Ingresa dirección" autocomplete="off">
                            <div id="message-direccion" class="validar-campo"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>¿Qué quieres registrar?</label>
                            <select name="actividad" id="actividad" class="form-control">
                                <option value=''>Seleccionar</option>
                                <option value='queja'>Queja</option>
                                <option value='reclamo'>Reclamo</option>
                            </select>
                            <div id="message-actividad" class="validar-campo"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre del tours o paquete / Orden de compra</label>
                            <input class="form-control" type="text" id="servicio" name="servicio" placeholder="Ingresa nombre del tours o paquete / orden de compra" autocomplete="off">
                            <div id="message-servicio" class="validar-campo"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>¿Cuál fue el problema?</label>
                    <textarea class="form-control" id="problema" name="problema" style="height:150px;"></textarea>
                    <div id="message-dni" class="validar-problema"></div>
                </div>

                <div class="form-group">
                    <label>¿Qué solución esperas?</label>
                    <textarea class="form-control" id="solucion" name="solucion" style="height:150px;"></textarea>
                    <div id="message-solucion" class="validar-campo"></div>
                </div>

                <p class="add_top_30 text-center"><input type="submit" value="Guardar" class="btn_1 rounded" id="submit-contact" onclick="reclamo()"></p>
            </div-->
		</div>
	</div>
</div>
<!-- /formulario de reclamo-->