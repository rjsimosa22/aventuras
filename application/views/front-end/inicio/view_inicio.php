<!-- /Banner y campo de busquedas-->
<section class="hero_single version_2">
	<div class="wrapper">
		<div class="container top-banner">
			<p class="big-title">Reservar experiencias únicas</p>
			<h1>Explora los mejores tours y paquetes de todo el Perú</h1>
				<div class="row no-gutters custom-search-input-2">
					<div class="col-lg-10">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="¿ A dónde vas a viajar ?" name="search" id="search" autocomplete="off">
							<!--select  class="form-control" name="search" id="search" onchange="location=this.value">
								<option value="0" disabled selected>¿ A dónde vas a viajar ?</option>
									/*if($destinos) {
										foreach($destinos as $row) {
											echo '<option value="'.site_url("tours/".strtolower($row->distrito)."/".$moneda).'">'.ucfirst(strtolower($row->distrito)).'</option>';
										}
									}*/
							</select-->
							<i class="icon_pin_alt"></i>
						</div>
					</div>
					<div class="col-lg-2">
						<input type="submit" class="btn_search" value="Buscar" onclick="validar_busquedad()">
					</div>
				</div>
		</div>
		<div class="container top-banner-1">
			<div class="col-lg-12">
					<table width="100%">
						<tr>
							<td><i class="icon-star-circled icono-banner"></i><p class="font-banner">Las mejores experiencias</p></td>
							<td><i class="icon-phone-circled icono-banner"></i><p class="font-banner">Atención al cliente 24/7</p></td>
							<td><i class="icon-heart-circled icono-banner"></i><p class="font-banner">Cientos de opiniones</p></td>
							<td><i class="icon-ok-circled-2 icono-banner"></i><p class="font-banner">Precio justo</p></td>
						</tr>		
					</table>	
				</div>		
			</div>
		</div>	
	</div>
</section>
<!-- /hero_single -->

<!-- /comentarios-->
<div class="bg_color_1">
	<div class="container margin_60_35">
		<div class="row">
			<div class="main_title_2 col-md-12">
				<span><em></em></span>
				<h2>Aquellos que ya vivieron la experiencia</h2>
				<p>Un buen viajero no tiene planes fijos ni tampoco la intención de llegar.</p>
			</div>

			<div class="col-md-4">
				<div class="box_faq">
					<a href="https://www.facebook.com/stefany.carrion.505/posts/178002363355110" target="_blank" class="ocultar-css-link">
						<div>
							<table class="tam-table">
								<tr height="80px">
									<td class="tam-td-1"><img loading="lazy" src="<?=base_url('public/img/facebook/stefany_carrion.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
									<td class="tam-td-2"><span class="name_review">Stefany Carrion</span><br/><span>Viajero</span></td>	
								</tr>
							</table>		
						</div>
						<p class="text-justify">Lo máximo.. Empezando Desde el hotel la atención muy buena. Los tours.. La gente q nos atendió muy agradable hicieron ameno nuestro recorrido.. Lo recomiendo y definitivamente regresaré...</p>
					</a>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box_faq">
					<a href="https://www.facebook.com/ruben.d.franco.9/posts/10157096743077732" target="_blank" class="ocultar-css-link">
						<div>
							<table class="tam-table">
								<tr height="80px">
									<td class="tam-td-1"><img loading="lazy" src="<?=base_url('public/img/facebook/ruben_fernandez.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
									<td class="tam-td-2"><span class="name_review">Ruben Fernandez</span><br/><span>Viajero</span></td>	
								</tr>
							</table>		
						</div>
						<p class="text-justify">Lo mejor fue la claridad entre los sitios que quería visitar y el tiempo que tenía disponible, todo fue acorde a eso; los hoteles con las características solicitadas, todos los tickets listos para visitar los sitios...</p>
					</a>		
				</div>
			</div>

			<div class="col-md-4">
				<div class="box_faq">
					<a href="https://www.facebook.com/flor.marticorenamendoza/posts/2367764006613527" target="_blank" class="ocultar-css-link">
						<div>
							<table class="tam-table">
								<tr height="80px">
									<td class="tam-td-1"><img loading="lazy" src="<?=base_url('public/img/facebook/flor_marticorena.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
									<td class="tam-td-2"><span class="name_review">Flor Marticorena</span><br/><span>Viajero</span></td>	
								</tr>
							</table>		
						</div>
						<p class="text-justify">Excelente servicio, los guías muy amables y además saben los detalles de cada lugar que se conoce, me encanto y es por eso que vuelvo a esta gran a aventura de conocer nuestro Perú y especialmente Tarapoto...</p>
					</a>				
				</div>
			</div>

			<!--div class="col-md-4">
				<div class="box_faq">
					<div>
						<table class="tam-table">
							<tr height="80px">
								<td class="tam-td-1"><img src="<?=base_url('public/img/facebook/laury_anayu.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
								<td class="tam-td-2"><h4>Laury Anaya</h4><span>Viajero</span></td>	
							</tr>
						</table>		
					</div>
					<p class="text-justify">Fué una experiencia maravillosa, recomendado al 100% su servicio, fueron puntuales, con guias atentos y amables..Nos quedamos con ganas de regresar pronto..Felicitaciones...</p>
				</div>
			</div-->
		</div>
	
		<!--div class="row">
			<div class="col-md-4">
				<div class="box_faq">
					<div>
						<table class="tam-table">
							<tr height="80px">
								<td class="tam-td-1"><img src="<?=base_url('public/img/facebook/flor_marticorena.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
								<td class="tam-td-2"><h4>Flor Marticorena</h4><span>Viajero</span></td>	
							</tr>
						</table>		
					</div>
					<p class="text-justify">Excelente servicio, los guías muy amables y además saben los detalles de cada lugar que se conoce, me encanto y es por eso que vuelvo a esta gran a aventura de conocer nuestro Perú y especialmente Tarapoto...</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box_faq">
					<div>
						<table class="tam-table">
							<tr height="80px">
								<td class="tam-td-1"><img src="<?=base_url('public/img/facebook/cesar_sanchez.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
								<td class="tam-td-2"><h4>Cesar Sanchez</h4><span>Viajero</span></td>	
							</tr>
						</table>		
					</div>
					<p class="text-justify">Hemos quedado muy contentos con este viaje, siempre el estar cerca de la naturaleza y ver los restos de nuestras culturas antiguas nos llenan de mucha alegría.Excelente oferta y servicio de Aventuras Tours...</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box_faq">
					<div>
						<table class="tam-table">
							<tr height="80px">
								<td class="tam-td-1"><img src="<?=base_url('public/img/facebook/gla_larcol.jpg');?>" alt="" class="img-fluid mr-3 radius-redondo"></td>
								<td class="tam-td-2"><h4>Gla LarCol</h4><span>Viajero</span></td>	
							</tr>
						</table>		
					</div>
					<p class="text-justify">Excelente servicio, puntuales, responsables, amables, muy comprometidos con su trabajo. Todos los guías A1, definitivamente volveré a viajar con ustedes en mi destino a Chachapoyas...</p>
				</div>
			</div>
		</div-->
		<p class="btn_home_align"><a href="https://www.facebook.com/AventurasdelPeru/reviews/?ref=page_internal" class="btn_1 rounded" target="_blank">Ver todos los comentario</a></p>
	</div>
</div>
<!-- /comentarios-->

<!-- /tours-->
<div class="container container-custom margin_80_0">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Nuestros tours populares</h2>
		<p>Hay muchas aventuras ahí fuera esperando que las vivamos.</p>
	</div>
	
	<div id="reccomended" class="owl-carousel owl-theme">
		<?php $this->load->view('front-end/inicio/view_tours_inf');?>
	</div>
	
	<p class="btn_home_align"><a href="<?= $url_tours;?>" class="btn_1 rounded">Ver todos los tours</a></p>
	<hr class="large">
</div>
<!-- /tours -->

<!-- /paquetes-->
<div class="container container-custom margin_30_95">
	<section class="add_bottom_45">
		<div class="main_title_3">
			<span><em></em></span>
			<h2>Paquetes turísticos populares</h2>
			<p>Nuestro destino nunca es un lugar, sino una nueva forma de ver las cosas.</p>
		</div>
		
		<div class="row">
			<?php $this->load->view('front-end/inicio/view_paquetes_inf');?>
		</div>
		
		<a class="ver-todo" href="<?= $url_paquetes;?>">Ver todo (<?= $cantidad_paquetes[0]->cantidad;?>) <i class="arrow_carrot-right"></i></a>
	</section>
	<br><br>
</div>
<!-- /paquetes -->

<!-- /subcribirse-->
<section class="ofertas-ccs">
	<div class="wrapper">
		<div class="container" align="center">
				<h3><span class="color-titulo">Recibe las últimas ofertas</span></h3>
				<div class="row no-gutters custom-search-input-2">
					<div class="col-lg-10">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Escribe aquí tu email" id="email" name="email" autocomplete="off">
							<i class="icon-mail"></i>
						</div>
					</div>

					<div class="col-lg-2">
						<input type="submit" class="btn_search" value="Suscribirse" onclick="suscripcion();">
					</div>
				</div>
		</div>
	</div>
</section>
<!-- /subcribirse-->