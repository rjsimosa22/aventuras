var arraytematica=new Array;
var arraycontenido=new Array;
var arraylisttematica=new Array;

$(window).load(function() {
    var $d5=$("#precio").ionRangeSlider({
        skin: "big",
        grid: true,
        min: 0,
        max: 2000,
        from: 2000,
        step: 1,
        prettify_enabled: true,
        grid:false,
        prefix:$('select[name="monedasjs"] option:selected').text()+'&nbsp;',
        onFinish: function (data) {
            listado_filtros(arraytematica,'',$('#precio').val());
        },
    });
});    


$('.listing_tematica').on('ifChanged',function(event) {
    arraytematica=[];
    $(".listing_tematica:checked").each(function(index,element) { 
        arraytematica.push($(this).val());
    }); 
    listado_filtros(arraytematica,'','');
});

$('.listing_tipo').on('ifChanged',function(event) {
    if($('#valorDestino').val()=='' || $('#valorDestino').val()=='Seleccionar') {
        var destino='listado';
    } else {
        var destino=$('#valorDestino').val();
    }

    if($('input:radio[name=listing_tipo]:checked').val()!=undefined) {
        if($('input:radio[name=listing_tipo]:checked').val()=='tours') {
            window.location.href=$('#texturl').val()+'tours/'+destino+'/'+$('#monedas').val();
        } else {
            window.location.href=$('#texturl').val()+'paquetes/'+destino+'/'+$('#monedas').val();
        }
    }
});

function listado_filtros(tem,tip,pre) {

    arraycontenido=[];
    arraylisttematica=[];
    var monedas=$('#monedas').val();
    var tipo_moneda=$('#tipo_moneda option:selected').text();
    var orden=$('input:radio[name=listing_orden]:checked').val();
    if(tem) {var tematica=tem;} else {var tematica=arraytematica;}
    if(pre) {var precio=pre;} else {var precio=$('#precio').val();}
    if(tip) {var tipo=tip;} else {var tipo=$('input:radio[name=listing_tipo]:checked').val();}
    var precio_1=precio;
   
    switch(tipo) {
        case 'tours':var url=$('#texturl').val()+"inicio_frontEnd/listado_tours_filtros/";break;
        case 'paquetes':var url=$('#texturl').val()+"inicio_frontEnd/listado_paquetes_filtros/";break;
    }
    
    // efectos
    $('#list_sidebar').css('opacity','0.3');
    $('select').prop('disabled','disabled');
    $('#precio').prop('disabled','disabled');
    $('html,list_sidebar').animate({scrollTop:380},'slow');
    
    $('#check-destino option:selected').each(function () {
        var destino=$(this).text();
        var destino_anerior=$('#valorDestino').val();
        if(destino=='Seleccionar') {var titulo_destino=tipo} else {var titulo_destino=destino;}
        $.post(url,{distrito:destino,orden:orden,tematica:tematica,precio:precio,monedas:monedas,tipo:tipo},function(data){
            if(data) { 
                var resultado=JSON.parse(data);
                var imagenbanner=resultado.imagenbanner;
                if(tipo=="tours") {
                    var servicio=resultado.tours;
                    var precios=resultado.precios;
                    var tematicas=resultado.tematicas;
                    precio_maximo=precios[0]['precio_maximo'];
                    precio_minimo=precios[0]['precio_minimo'];
                } else {
                    var servicio=resultado.paquetes;
                    var e=(servicio.length - 1);
                    if(orden=='asc' || orden=='all') {
                        servicio.sort(function (a, b) {if (a.precio > b.precio) {return 1;}if (a.precio < b.precio) {return -1;}return 0;});
                        precio_minimo=servicio[0]['precio'];
                        precio_maximo=servicio[e]['precio'];
                    } else if(orden=='desc') {
                        servicio.sort(function (a, b) {if (a.precio > b.precio) {return -1;}if (a.precio > b.precio) {return 1;}return 0;});
                        precio_maximo=servicio[0]['precio'];
                        precio_minimo=servicio[e]['precio'];
                    } 
                }
                
                if(servicio) {
                    var titulo=resultado.titulo_filtro;
                    var imagen=resultado.imagen_filtro;
                    
                    //setTimeout (
                        //function() {
                            for(i in servicio) {
                                var precio_real=number_format(servicio[i]['precio'],2);
                                if(precio_1) {
                                    if(precio_1>=parseFloat(servicio[i]['precio'])) {
                                        contenido='<div class="box_list isotope-item"><div class="row no-gutters"><div class="col-lg-5"><figure><small>'+servicio[i]['distrito']+'</small><a href="'+servicio[i]['url']+'"><img src="'+servicio[i]['urlimg']+'" class="img-fluid img-fluid-22" alt="" width="800" height="533"><div class="read_more"><span>Visualizar</span></div></a><p class="box_grid_2"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></p><p class="box_grid_3 box-grid-top"><i class="icon_clock_alt"></i>&nbsp;&nbsp;'+servicio[i]['duracion']+'</p></figure></div><div class="col-lg-7"><div class="wrapper"><!--a href="'+servicio[i]['url']+'" class="wish_bt"></a--><h3><a href="#0">'+servicio[i]['nombre']+'</a></h3><span class="text-justify">'+titulojs(servicio[i]['descripcion'].toLowerCase())+''+servicio[i]['puntos']+'</span><ul id="adaptacion"><li>&nbsp;</li><a href="'+servicio[i]['url']+'"><li><strong class="ocultar-css-link">Desde&nbsp;&nbsp;<span class="font-precio-1 color-precio">'+tipo_moneda+' '+precio_real+'</span></strong><!--a href="'+servicio[i]['url']+'"><input type="button" class="btn_3 full-width purchase" value="Reservar"--></a></li></a></ul><span class="espacio-movil-listado"><br></br></span></p></div><!--ul><li><i class="icon_clock_alt"></i>&nbsp;'+titulojs(servicio[i]['duracion'].toLowerCase())+'</li><li><!--div class="score"><span>valoración<em>0 opiniones</em></span><strong>8.9</strong></div--></li></ul--></div></div></div>';
                                        arraycontenido.push(contenido);
                                    } 
                                } else {
                                    contenido='<div class="box_list isotope-item"><div class="row no-gutters"><div class="col-lg-5"><figure><small>'+servicio[i]['distrito']+'</small><a href="'+servicio[i]['url']+'"><img src="'+servicio[i]['urlimg']+'" class="img-fluid img-fluid-22" alt="" width="800" height="533"><div class="read_more"><span>Visualizar</span></div></a><p class="box_grid_2"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></p><p class="box_grid_3 box-grid-top"><i class="icon_clock_alt"></i>&nbsp;&nbsp;'+servicio[i]['duracion']+'</p></figure></div><div class="col-lg-7"><div class="wrapper"><!--a href="'+servicio[i]['url']+'" class="wish_bt"></a--><h3><a href="#0">'+servicio[i]['nombre']+'</a></h3><span class="text-justify">'+titulojs(servicio[i]['descripcion'].toLowerCase())+''+servicio[i]['puntos']+'</span><ul id="adaptacion"><li>&nbsp;</li><a href="'+servicio[i]['url']+'"><li><strong class="ocultar-css-link"><strong class="ocultar-css-link">Desde&nbsp;&nbsp;<span class="font-precio-1 color-precio">'+tipo_moneda+' '+precio_real+'</span></strong><!--a href="'+servicio[i]['url']+'"><input type="button" class="btn_3 full-width purchase" value="Reservar"></a--></li></a></ul><span class="espacio-movil-listado"><br></br></span></p></div><!--ul><li><i class="icon_clock_alt"></i>&nbsp;'+titulojs(servicio[i]['duracion'].toLowerCase())+'</li><li><!--div class="score"><span>valoración<em>0 opiniones</em></span><strong>8.9</strong></div--></li></ul--></div></div></div>';
                                    arraycontenido.push(contenido);
                                }
                            }
                            $("select").removeAttr("disabled");
                            $('#list_sidebar').css('opacity','10');
                            $('#list_sidebar').html(arraycontenido);
                            $('#list_sidebar').css('background-image','none');
                            $('#cant_filtro').text('('+arraycontenido.length+')');
                            $('#imagen-banner').html('<section class="hero_in tours" style="background:url('+$('#texturl').val()+'public/img/tours/'+imagen+') center center no-repeat;-webkit-background-size: cover; -moz-background-size:cover;-o-background-size:cover;background-size:cover;"><div class="wrapper"><div class="container top-title-1"><h1><span></span>'+titulojs(titulo.toLowerCase())+'</h1></div><div class="div-imagen-banner"><img src="'+imagenbanner+'" class="img-banner-fondo"><center><div class="text-imagen-banner-1"><span class="contador-banner">'+arraycontenido.length+'<br></span><span>Actividades en '+titulojs(titulo.toLowerCase())+'</span></div></center></div></div></section>');
                        

                            if(destino_anerior!=destino) {
                                var $d5=$("#precio").ionRangeSlider({
                                    skin:"big",
                                    grid:true,
                                    min:0,
                                    step:1,
                                    max:100,
                                    from:100,
                                    grid:false,
                                    prettify_enabled:true,
                                    prefix:$('select[name="monedasjs"] option:selected').text()+'&nbsp;',
                                    onFinish: function (data) {
                                        listado_filtros(arraytematica,'',$('#precio').val());
                                    },
                                });

                                var d5_instance=$d5.data("ionRangeSlider");
                                d5_instance.update({
                                    min:precio_minimo,
                                    max:precio_maximo,
                                    from:precio_maximo,
                                });
                                $('#valorDestino').val(destino);
                            }    
                        //} 
                    //200);
                } else {
                    $("select").removeAttr("disabled");
                    $('#list_sidebar').css('opacity','10');
                    $('#list_sidebar').css('background-image','none');
                    $('#list_sidebar').html('<span style="font-size:25px;"><i class="icon-cancel-circled"><i>No hemos encontrado resultados en '+titulojs(titulo_destino.toLowerCase())+'</span>');
                }
            } else {
                $("select").removeAttr("disabled");
                $('#list_sidebar').css('opacity','10');
                $('#list_sidebar').css('background-image','none');
                $('#list_sidebar').html('<span><i class="icon-block"><i>No hemos encontrado resultados en '+titulojs(titulo_destino.toLowerCase())+'</span>');
            }
        });    
    });	
}

function number_format(amount,decimals) {
    amount+='';
    amount=parseFloat(amount.replace(/[^0-9\.]/g, ''));
    
    decimals=decimals||0;

	// si es mayor o menor que cero retorno el valor formateado como numero
    amount='' + amount.toFixed(decimals);

    var amount_parts=amount.split('.'),
        regexp=/(\d+)(\d{3})/;

    while(regexp.test(amount_parts[0]))
        amount_parts[0]=amount_parts[0].replace(regexp, '$1' + ',' + '$2');

 	if(isFloat(amount)) {
		return amount_parts.join('.');
	} else {
		return amount_parts[0];
	}
}

function isFloat(n) {
    return n % 1 != 0;
}


function titulojs(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}