// Variables array globales
var maxcampo=10;
var variableA=100;
var variblePorciento=20;
var arrayServicio=new Array;
var listnewscript=new Array;
var arrayhabitacion=new Array;
var arrayPrecioHabitacion=new Array;
var arrayDatosPersonales=new Array;
var arraycontenidoCarrito=new Array;
var arrayListadoServicios=new Array;

window.onload=function() {

    var arrayListadoServiciosL;
    $.ajax({
        type:"POST",
        dataType:"JSON",
        url:$('#texturl').val()+'inicio_frontEnd/listado_servicios', 
        success:function(data) {
            if(data) {

                var tours=data.tours;
                var destinos=data.destinos;
                var paquetes=data.paquetes;
                var tematicas=data.tematicas;
                
                if(destinos) {
                    for(i in destinos) {
                        arrayListadoServiciosL={
                            category:'Destinos',
                            id:destinos[i]['id'],
                            label:MaysPrimera(destinos[i]['distrito'].toLowerCase())+".",
                            imagen:$('#texturl').val()+'public/front-end/img/destino.svg',
                            url:$('#texturl').val()+'tours/'+destinos[i]['distrito'].toLowerCase()+'/'+$('#monedas').val(),
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }

                if(tours) {    
                    for(i in tours) {
                        arrayListadoServiciosL={
                            category:'Tours',
                            id:tours[i]['id'],
                            imagen:$('#texturl').val()+'public/front-end/img/tours.svg',
                            label:MaysPrimera(tours[i]['nombre'].toLowerCase()+', '+tours[i]['distrito'].toLowerCase())+".",
                            url:$('#texturl').val()+'tour/'+tours[i]['distrito'].toLowerCase()+'/'+tours[i]['nombre'].replace(/[_\s]/g,'-').replace(/\//g,"-").toLowerCase()+'/'+$('#monedas').val(),
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }
                
                if(paquetes) {    
                    for(i in paquetes) {
                        arrayListadoServiciosL={
                            id:tours[i]['id'],
                            category:'Paquetes',
                            imagen:$('#texturl').val()+'public/front-end/img/paquete.svg',
                            label:MaysPrimera(paquetes[i]['nombre'].toLowerCase()+', '+paquetes[i]['distrito'].toLowerCase())+".",
                            url:$('#texturl').val()+'paquete/'+paquetes[i]['distrito'].toLowerCase()+'/'+paquetes[i]['nombre'].replace(/[_\s]/g,'-').replace(/\//g,"-").toLowerCase()+'/'+$('#monedas').val(),
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }
            } else {
                //mensaje de errors
                alert('Error en el modulo de listado de servicios');
            }
        }
    });
}

$(document).ready(function() { 
    
    var x=1;
    var maxField=maxcampo;
    var addButton=$('.add_button');
    var wrapper=$('.field_wrapper');
    $(addButton).click(function() {
        if($('#valorhiddenaddbtn').val()=='1') {
            x=$('#cantidad_campo').val();
            if(x < maxField) {
                x++;
                $('#cantidad_campo').val(x);
                $('#add_button').css('opacity','10');
                $(wrapper).append('<div class="form-group"><select class="form-control select-cursor textidhabitacion" style="width:100%;background-color:none;" name="textidhabitacion'+x+'" id="textidhabitacion'+x+'" onchange="elegir_habitacion_valor();"><option>Seleccionar</option></select><a href="javascript:void(0);" class="remove_button" title="Eliminar habitación"><!--i class="icon-trash tamano-icono"></i-->Eliminar habitación</a></div>'); // Add field html
            }
            tipo_habitacion(x);
        }
    });
    $(wrapper).on('click','.remove_button',function(e) {
        x=$('#cantidad_campo').val();
        e.preventDefault();
        $(this).parent('div').remove();
        $('#message-habitacion'+x).text('');
        x--;
        $('#cantidad_campo').val(x);
        elegir_habitacion_valor();
    });
});

$( function() {
    $("#search").click(function(){
        $("ul.ui-autocomplete").show();
    });

    $.widget("custom.catcomplete",$.ui.autocomplete, {
        _create: function() {
            this._super();
            this.widget().menu("option","items",">:not(.ui-autocomplete-category)");
        },
        
        _renderMenu:function(ul,items) {
            var that=this,
            currentCategory="";
            $.each(items,function(index,item) {
                var li;
                if (item.category!=currentCategory) {
                    ul.append("<li class='ui-autocomplete-category' style='margin-left:25px;line-height:50px;color:#b52182;font-size:20px;'><img src='"+item.imagen+"' width='40px' height='40px' style='margin-top:0px;'>&nbsp;&nbsp;&nbsp;&nbsp;<b>"+ item.category +"</b></li>");
                    currentCategory = item.category;
                }
                
                li=that._renderItemData(ul,item);
                if(item.category) {
                    li.attr("aria-label",item.category+ " : " +item.label);
                }
            });
        }
    });

    $("#search").catcomplete({
        delay: 0,
        source:arrayListadoServicios,
        close:function (event,ui) {
            if(!$("ul.ui-autocomplete").is(":visible")) {
                $("ul.ui-autocomplete").show();
            } else {
                $("ul.ui-autocomplete").show();
            }
        },
        select: function (event, ui) {
            window.location = ui.item.url;
        },
    });
});

$(".validaSoloNumeros").keydown(function(event){
    //alert(event.keyCode);
    if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==190  && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9  ){
        return false;
    }
});

$('.reserva0').on("click",function(e) { 
    window.location=$('#texturl').val()+'reserva/carrito/'+$('#monedas').val() ;
});

$('.reserva1').on("click",function(e) { 
    if($('.cantidad_servicios').text() > 0) {
        window.location=$('#texturl').val()+'cliente/reserva/'+$('#monedas').val() ;
    }
});

$('.reserva2').on("click",function(e) { 
    window.location=$('#texturl').val()+'pago/reserva/'+$('#monedas').val() ;
});

$(document).on("click",function(e) {
    var container=$("ul.ui-autocomplete");                       
    if(!container.is(e.target) && container.has(e.target).length===0) { 
        $("ul.ui-autocomplete").hide();              
    } else {
        $("ul.ui-autocomplete").show();   
    }
});

$(document).on("click",function(e) {                
    var container=$("#search");
    if(!container.is(e.target) && container.has(e.target).length===0) { 
       // $("ul.ui-autocomplete").hide();              
    } else {
        $("ul.ui-autocomplete").show(); 
        if($("#search").val()) {
            $("ul.ui-autocomplete").show();   
        } else {
            $("ul.ui-autocomplete").hide(); 
        }
    }
});

$('.btn-continuar').on("click",function(e) { 
    
    arrayServicio=[];
    arrayDatosPersonales=[];
    if(listnewscript!='') {
        listado_compra=listnewscript
    } else {
        listado_compra=listado_compra
    } 
    var emailRegex=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    
    if(listado_compra) {
        if($('#textipodocres').val()=='') {
            $('#textipodocres').focus();
            $('#message-tdocumento').text('* Campo obligatorio');return;
        } else {
            $('#message-tdocumento').text('');
        }
    
        if($('#textdocumentores').val()=='') {
            $('#textdocumentores').focus();
            $('#message-ndocumento').text('* Campo obligatorio');return;
        } else {
            $('#message-ndocumento').text('');
        }
    
        if($('#textnombresres').val()=='') {
            $('#textnombresres').focus();
            $('#message-nombre').text('* Campo obligatorio');return;
        } else {
            $('#message-nombre').text('');
        }
    
        if($('#textapellidosres').val()=='') {
            $('#textapellidosres').focus();
            $('#message-apellido').text('* Campo obligatorio');return;
        } else {
            $('#message-apellido').text('');
        }
    
        if($('#textnumerores').val()=='') {
            $('#textnumerores').focus();
            $('#message-telefono').text('* Campo obligatorio');return;
        } else {
            $('#message-telefono').text('');
        }
    
        if($('#textemailres').val()=='') {
            $('#textemailres').focus();
            $('#message-email').text('* Campo obligatorio');return;
        } else {
            if(emailRegex.test($('#textemailres').val())) {
                $('#message-email').text('');
            } else {
                $('#message-email').text('* Introducir un email valido');return;
            }
        }
        
        for(i in listado_compra) { 
            if(listado_compra[i]['textevento']=='Tours') {
                if($('#textrecojores_'+listado_compra[i]['textidservicio']).val()=='') {
                    $('#textrecojores_'+listado_compra[i]['textidservicio']).focus();
                    $('#message-recojo-'+listado_compra[i]['textidservicio']).text('* Campo obligatorio');return;
                } else {
                    $('#message-recojo-'+listado_compra[i]['textidservicio']).text('');
                }
            } else {
                if($('#textairolineavuelores_'+listado_compra[i]['textidservicio']).val()=='') {
                    $('#textairolineavuelores_'+listado_compra[i]['textidservicio']).focus();
                    $('#message-airolinea-'+listado_compra[i]['textidservicio']).text('* Campo obligatorio');return;
                } else {
                    $('#message-airolinea-'+listado_compra[i]['textidservicio']).text('');
                }

                if($('#textrenumerovuelores_'+listado_compra[i]['textidservicio']).val()=='') {
                    $('#textrenumerovuelores_'+listado_compra[i]['textidservicio']).focus();
                    $('#message-numerovuelo-'+listado_compra[i]['textidservicio']).text('* Campo obligatorio');return;
                } else {
                    $('#message-numerovuelo-'+listado_compra[i]['textidservicio']).text('');
                }
            }    
        }

        $('.btn-continuar').attr("disabled", true);

        for(i in listado_compra) {
                var arrayServicioL= {
                    'textfecha':listado_compra[i]['textfecha'],
                    'textimagen':listado_compra[i]['textimagen'],
                    'textprecio':listado_compra[i]['textprecio'],
                    'textevento':listado_compra[i]['textevento'],
                    'textmoneda':listado_compra[i]['textmoneda'],
                    'infoPrecio':listado_compra[i]['infoPrecio'],
                    'textqtyNino':listado_compra[i]['textqtyNino'],
                    'textidhotel':listado_compra[i]['textidhotel'],
                    'textidpaises':listado_compra[i]['textidpaises'],
                    'textdistrito':listado_compra[i]['textdistrito'],
                    'textduracion':listado_compra[i]['textduracion'],
                    'textservicio':listado_compra[i]['textservicio'],
                    'textqtyAdulto':listado_compra[i]['textqtyAdulto'],
                    'texttipocambio':listado_compra[i]['texttipocambio'],
                    'textidservicio':listado_compra[i]['textidservicio'],
                    'textfechacompra':listado_compra[i]['textfechacompra'],
                    'textprecio_tours':listado_compra[i]['textprecio_tours'],
                    'textidhabitacion':listado_compra[i]['textidhabitacion'],
                    'textprecio_hotel':listado_compra[i]['textprecio_hotel'],
                    'textrecojores':$('#textrecojores_'+listado_compra[i]['textidservicio']).val(),
                    'textcomentariores':$('#textcomentariores_'+listado_compra[i]['textidservicio']).val(),
                    'textrenumerovuelores':$('#textrenumerovuelores_'+listado_compra[i]['textidservicio']).val(),
                    'textairolineavuelores':$('#textairolineavuelores_'+listado_compra[i]['textidservicio']).val(),
                };
                arrayServicio.push(arrayServicioL);
        }

        var arrayDatosPersonalesL= {
            'textemailres':$('#textemailres').val(),
            'textipodocres':$('#textipodocres').val(),
            'textoutputres':$('#textoutputres').val(),
            'textnumerores':$('#textnumerores').val(),
            'textnombresres':$('#textnombresres').val(),
            'textapellidosres':$('#textapellidosres').val(),
            'textdocumentores':$('#textdocumentores').val(),
        };
        arrayDatosPersonales.push(arrayDatosPersonalesL);

        if(arrayServicio && arrayDatosPersonales) {
            $.ajax({
                type:"POST",
                dataType:"JSON",
                data: {
                    'arrayServicio':arrayServicio,
                    'arrayDatosPersonales':arrayDatosPersonales,
                },
                url:$('#texturl').val()+'inicio_frontEnd/completando_reserva',
                success:function(data) {
                    if(data) {
                        var listado_compra=data.listado_compra;
                        var datos_personales=data.datos_personales;

                        if(listado_compra && datos_personales) {
                            location.href=$('#texturl').val()+"pago/reserva/"+$('#monedas').val();
                        } else {
                             //mensaje de errors
                            alert('Error en el modulo datos personales');
                        }
                    } else {
                        //mensaje de errors
                        alert('Error en el modulo datos personales');
                    }
                }
            });
        } else {
            alert('Error al cargar el array en el modulo de datos personales');
        }
    }
});

$('.btn-cupon').on("click",function(e) { 

    if(!cupon_compra) {
        if(listnewscript!='') {
            listado_compra=listnewscript
        } else {
            listado_compra=listado_compra
        } 

        if(listado_compra) {
            if($('#textcoupon').val()=='') {
                $('#textcoupon').focus();
                $('#message-cupon').text('* Campo obligatorio');return;
            } else {
                $('#message-cupon').text('');
            }

            $.ajax({
                type:"POST",
                dataType:"JSON",
                data: {
                    'textcoupon':$('#textcoupon').val(),
                },
                url:$('#texturl').val()+'inicio_frontEnd/validar_cupon',
                success:function(data) {
                    if(data) {
                        var cupon=data.cupon;
                        var listado_compra=data.listado_compra;
                        var datos_personales=data.datos_personales;
                        if(listado_compra && datos_personales && cupon) {
                            $('.btn-cupon').attr("disabled",true);
                            $('#textcoupon').attr("disabled",true);
                            $('#message-cupon').text('* El cupón se aplico correctamente').css('color','#00a500');
                            
                        } else {
                            $('#textcoupon').attr("disabled",false);
                            $('.btn-cupon').attr("disabled",false);
                            $('#message-cupon').text('* El cupón no es válido');
                        }
                    } else {
                        //mensaje de errors
                        $('#textcoupon').attr("disabled",false);
                        $('.btn-cupon').attr("disabled",false);
                        $('#message-cupon').text('* El cupón ya fue usado en una compra anterior');
                    }
                }
            });
        }
    } else {
alert(cupon_compra);
    }    
});


function abrirCarrito(id) {
    
    $('#idhoteldiv').hide();
    $('.field_wrapper').empty();
    $('#idhabitaciondiv').hide();
    $('#valorhiddenaddbtn').val('1');
    $('#add_button').css('opacity','10');
    var evento=$('#textevento_'+id).text(); 
    var servicio=$('#textservicio_'+id).text();
    if(id) {
        if(listnewscript!='') {
            listado_compra=listnewscript
        } else {
            listado_compra=listado_compra
        } 
        
        for(i in listado_compra) {
            if(listado_compra[i]['textevento']+'_'+listado_compra[i]['textidservicio']==evento+'_'+id) {
                var sumapersona=parseInt(listado_compra[i]['textqtyAdulto']) + parseInt(listado_compra[i]['textqtyNino']);    
                precio=calcular_precio(listado_compra[i]['infoPrecio'],listado_compra[i]['textqtyAdulto'],listado_compra[i]['texttipocambio'],$('#monedas').val(),listado_compra[i]['textprecio_hotel'],listado_compra[i]['textidpaises'],listado_compra[i]['textdistrito']);
                
                $('#add_button').hide();
                $('#textidservicioid').val('');
                $('.qtyTotal').text(sumapersona);
                $('.infoPrecio').text(number_format(precio));
                //$('#textprecioinf').text(number_format(precio));
                $('#textfecha').val(listado_compra[i]['textfecha']);
                $('#infoPrecio1').val(listado_compra[i]['infoPrecio']); 
                $('#textqtyNino').val(listado_compra[i]['textqtyNino']);
                $('#textdistrito').val(listado_compra[i]['textdistrito']);
                $('#textqtyAdulto').val(listado_compra[i]['textqtyAdulto']);
                $('#texttipocambio').val(listado_compra[i]['texttipocambio']);
                $('#precio_tours').val(listado_compra[i]['textprecio_tours']);
                $('#textidservicio').val(listado_compra[i]['textidservicio']);
                $('#textprecio_hotel').val(listado_compra[i]['textprecio_hotel']);
                $('#textidpaises').val(listado_compra[i]['textidpaises']).trigger('change.select2');
                $('#nombreservicio').text(titulojs(listado_compra[i]['textservicio'].toLowerCase()));
                   
                if(evento=='Paquetes') {
                    $('#add_button').show();
                    if(listado_compra[i]['textidhotel']!=undefined) {
                        var id_hotel=listado_compra[i]['textidhotel'];
                        $.post($('#texturl').val()+"inicio_frontEnd/listado_hoteles/",{id:id},function(data) {
                            if(data) {
                                var resultado=JSON.parse(data);
                                var hoteles_seleccion=resultado.hoteles_seleccion
                                if(hoteles_seleccion) {
                                    $('#idhoteldiv').show();
                                    for(e in hoteles_seleccion) {
                                        $("#textidhotel").select2({data:[{id:hoteles_seleccion[e]['id_hoteles'],text:MaysPrimera(hoteles_seleccion[e]['nombre'].toLowerCase())}]});
                                    }
                                    $('#textidhotel').val(id_hotel).trigger('change.select2');
                                } else {
                                    $("#textidhotel").select2({data:[{id:"",text:"No hay información"}]});
                                    $('#textidhotel').val('').trigger('change.select2');
                                }        
                            } else {
                                $("#textidhotel").select2({data:[{id:"",text:"No hay información"}]});
                                $('#textidhotel').val('').trigger('change.select2');
                            }
                        });
                    }
                   
                    if(listado_compra[i]['textidhabitacion']) {
                        $('#idhabitaciondiv').show();
                        $('#textevento').val(evento);
                        var wrapper=$('.field_wrapper'); 
                        $('#textidservicioid').val(listado_compra[i]['textidservicio']);
                        var cantidad_habitaciones=listado_compra[i]['textidhabitacion'].length;
                        $('#cantidad_campo').val(cantidad_habitaciones);
                        var k=1;
                        for(var e=1;e<cantidad_habitaciones;e++) {
                            k++;
                            $(wrapper).append('<div class="form-group"><select class="form-control select-cursor textidhabitacion" style="width:100%;background-color:none;" name="textidhabitacion'+k+'" id="textidhabitacion'+k+'" onchange="elegir_habitacion_valor();"><option>Seleccionar</option></select><a href="javascript:void(0);" class="remove_button" title="Eliminar habitación"><!--i class="icon-trash tamano-icono"></i-->Eliminar habitación</a></div>'); // Add field html
                        }
                    } else {
                        $('#idhabitaciondiv').show();
                        $('#textevento').val(evento);
                        $('#cantidad_campo').val('1');
                        $('#textidservicioid').val(listado_compra[i]['textidservicio']);
                    }    
                }    
            }
        } 
        $('.infoPrecio').text(number_format(precio));
        
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        $('html,listado_carrito_compras').animate({scrollTop:10},'slow');
        return false;
    }               
}

function calcular_precio(infoPrecio,textqtyAdulto,texttipocambio,monedas,textprecio_hotel,textidpaises,textdistrito) {
    if(monedas=='') {
        var precio=parseFloat(infoPrecio) * textqtyAdulto;
        var precio=Math.ceil(precio=parseFloat(precio) + parseFloat(textprecio_hotel));
    } else {
        var precio=parseFloat(infoPrecio) * textqtyAdulto;
        precio=parseFloat(precio) + parseFloat(textprecio_hotel);
        precio=Math.ceil(parseFloat(precio) / parseFloat(texttipocambio));
    }

    if(textidpaises!='Perú' && textidpaises!='') {
        if(textdistrito=='cusco') { 
            var porcentaje=((precio / variableA) * variblePorciento); 
            precio=((precio) + porcentaje);
        } 
    }
    return precio;
}

$('#close,#close1').on('click', function(){
    $('#popup').fadeOut('slow');
    $('.popup-overlay').fadeOut('slow');
    //$('html, body').css('overflow','auto');
    return false;
});


function editarCarrito() {

    arrayServicio=[];
    arrayhabitacion=[];
    arraycontenidoCarrito=[];
    var id=$('#textidservicio').val();
    var evento=$('#textevento_'+id).text(); 
    var servicio=$('#textservicio_'+id).text();
    //$('html,listado_carrito_compras').animate({scrollTop:180},'slow');
    
    if(listado_compra.length > 0) {
        if(id) {
            if(listnewscript!='') {
                listado_compra=listnewscript
            } else {
                listado_compra=listado_compra
            }
           
            if($('#textqtyAdulto').val()=='0') {
                $('#textqtyAdulto').focus();
                $('#message-personas-adulta').text('* Selecciona un adulto o más en persona.');return;
            } else {
                $('#message-personas-adulta').text('');
            }

            if($('#textevento').val()=='Paquetes') {
                if($('#textidhotel').val()=='') {
                    $('#textidhotel').focus();
                    $('#message-hotele').text('* Selecciona el hotel.');return;
                } else {
                    $('#message-hotel').text('');
                }
        
                for(var e=1;e<=maxcampo;e++) {
                    if($('#textidhabitacion'+e).val()!='' && $('#textidhabitacion'+e).val()!=undefined) {
                        switch ($('#textidhabitacion'+e).val()) {
                            case '1': var cantidad=1;break;
                            case '2': var cantidad=2;break;
                            case '3': var cantidad=2;break;
                            case '4': var cantidad=3;break;
                            case '5': var cantidad=4;break;
                            case '6': var cantidad=5;break;
                        }
                        var arrayhabitacionL= {
                            'cantidad':cantidad,
                            'id':$('#textidhabitacion'+e).val(),
                        };
                        arrayhabitacion.push(arrayhabitacionL);
                    }    
                }
                
                if(arrayhabitacion) {
                    var k=0;
                    for(i in arrayhabitacion) {
                        k+=arrayhabitacion[i]['cantidad']
                    }
                   
                    if(k<$('#textqtyAdulto').val()) {
                        for(var e=1;e<=maxcampo;e++) {
                            if($('#textidhabitacion'+e).val()!=undefined) {
                                if($('#textidhabitacion'+e).val()=='') {
                                    $('#textidhabitacion'+e).focus();
                                    $('#message-habitacion'+e).text('* Selecciona el tipo de habitación '+e+'.');return;
                                } else {
                                    $('#message-habitacion'+e).text('');
                                }
                            }    
                        }
                      
                        Command:toastr["error"]("La cantidad de personas, supera el aforo de tipo de habitación. ¡Por favor verificar la información!","Aventuras PE !");  
                        toastr.options = {
                            "debug":false,
                            "timeOut":"5000",
                            "closeButton":true,
                            "newestOnTop":true,
                            "progressBar":true,
                            "showDuration":"300",
                            "showEasing":"swing",
                            "hideDuration":"1000",
                            "hideEasing":"linear",
                            "showMethod":"fadeIn",
                            "hideMethod":"fadeOut",
                            "extendedTimeOut":"1000",
                            "preventDuplicates":false,
                            "positionClass":"toast-bottom-right",
                        }
                      return;
                    }
                }
            } else {
                arrayhabitacion='';
            }    
            
            for(i in listado_compra) {
                if(listado_compra[i]['textevento']+'_'+listado_compra[i]['textidservicio'] != evento+'_'+id) {
                    var arrayServicioL= {
                        'textfecha':listado_compra[i]['textfecha'],
                        'textimagen':listado_compra[i]['textimagen'],
                        'textprecio':listado_compra[i]['textprecio'],
                        'textevento':listado_compra[i]['textevento'],
                        'textmoneda':listado_compra[i]['textmoneda'],
                        'infoPrecio':listado_compra[i]['infoPrecio'],
                        'textqtyNino':listado_compra[i]['textqtyNino'],
                        'textidhotel':listado_compra[i]['textidhotel'],
                        'textduracion':listado_compra[i]['textduracion'],
                        'textservicio':listado_compra[i]['textservicio'],
                        'textidpaises':listado_compra[i]['textidpaises'],
                        'textdistrito':listado_compra[i]['textdistrito'],
                        'textqtyAdulto':listado_compra[i]['textqtyAdulto'],
                        'textrecojores':listado_compra[i]['textrecojores'],
                        'texttipocambio':listado_compra[i]['texttipocambio'],
                        'textidservicio':listado_compra[i]['textidservicio'],
                        'textfechacompra':listado_compra[i]['textfechacompra'],
                        'textprecio_hotel':listado_compra[i]['textprecio_hotel'],
                        'textprecio_tours':listado_compra[i]['textprecio_tours'],
                        'textidhabitacion':listado_compra[i]['textidhabitacion'],
                        'textcomentariores':listado_compra[i]['textcomentariores'],
                        'textrenumerovuelores':listado_compra[i]['textrenumerovuelores'],
                        'textairolineavuelores':listado_compra[i]['textairolineavuelores'],
                        
                    };
                    arrayServicio.push(arrayServicioL);
                } else {
                    var arrayServicioL= {
                        'textfecha':$('#textfecha').val(),
                        'textidhabitacion':arrayhabitacion,
                        'textidhotel':$('#textidhotel').val(),
                        'textqtyNino':$('#textqtyNino').val(),
                        'textidpaises':$('#textidpaises').val(),
                        'textdistrito':$('#textdistrito').val(),
                        'textqtyAdulto':$('#textqtyAdulto').val(),
                        'textimagen':listado_compra[i]['textimagen'],
                        'textprecio':listado_compra[i]['textprecio'],
                        'textevento':listado_compra[i]['textevento'],
                        'textmoneda':listado_compra[i]['textmoneda'],
                        'infoPrecio':listado_compra[i]['infoPrecio'],
                        'textprecio_hotel':$('#textprecio_hotel').val(),
                        'textduracion':listado_compra[i]['textduracion'],
                        'textservicio':listado_compra[i]['textservicio'],
                        'textrecojores':listado_compra[i]['textrecojores'],
                        'texttipocambio':listado_compra[i]['texttipocambio'],
                        'textidservicio':listado_compra[i]['textidservicio'],
                        'textfechacompra':listado_compra[i]['textfechacompra'],
                        'textprecio_tours':listado_compra[i]['textprecio_tours'],
                        'textcomentariores':listado_compra[i]['textcomentariores'],
                        'textrenumerovuelores':listado_compra[i]['textrenumerovuelores'],
                        'textairolineavuelores':listado_compra[i]['textairolineavuelores'],
                        
                    };
                    arrayServicio.push(arrayServicioL);
                }
            }
        }

        $.confirm({
            type:'red',
            closeIcon:true,
            title:'Confirmar!',
            typeAnimated: true,
            closeIconClass:'fa fa-close',
            content:'Deseas editar el siguiente servicio:  '+servicio+'!',
            buttons: {
                tryAgain: {
                    text:'Si editar',
                    btnClass:'btn-red',
                    action: function(){
                        $('#list_carrito_1').css('opacity','0.3');
                        $.ajax({
                            type:"POST",
                            dataType:"JSON",
                            data: {
                                'moneda':$('#monedas').val(),
                                'arrayServicio':arrayServicio,
                            },
                            url:$('#texturl').val()+'inicio_frontEnd/gestion_carrito',
                            success:function(data) {
                                if(data) {
                                    var resultado=data;
                                    var moneda=resultado.moneda;
                                    var monedaI=resultado.monedaI;
                                    var listado_compra=resultado.listado_compra;
                                    listnewscript=listado_compra;

                                    var precio_total=0;
                                    $('.simbolo_pr').text(monedaI['simbolo']+' ');
                                    
                                    if(listado_compra) {
                                        for(i in listado_compra) {
                                            precio=calcular_precio(listado_compra[i]['infoPrecio'],listado_compra[i]['textqtyAdulto'],listado_compra[i]['texttipocambio'],moneda,listado_compra[i]['textprecio_hotel'],listado_compra[i]['textidpaises'],listado_compra[i]['textdistrito']);
                                            precio_total+=parseFloat(precio);
                                            var contenidoCarrito='<tr><td style="display:none;" id="textevento_'+listado_compra[i]['textidservicio']+'">'+listado_compra[i]['textevento']+'</td><td style="display:none;" id="textprecio">'+precio+'</td> <td><div class="thumb_cart"><img src="'+listado_compra[i]['textimagen']+'" alt="Image"></div></td><td><span class="item_cart text-justify" id="textservicio_'+listado_compra[i]['textidservicio']+'">'+titulojs(listado_compra[i]['textservicio'].toLowerCase())+'<br><b>'+listado_compra[i]['textevento']+'</b></span></td><td>'+listado_compra[i]['textqtyAdulto']+' Adultos, <br>'+listado_compra[i]['textqtyNino']+' Ñinos</td><td>'+monedaI['simbolo']+'&nbsp;'+number_format(precio)+'</td><td>'+listado_compra[i]['textfecha']+'</td><td class="options" style="width:5%; text-align:center;"><a href="javascript:void(0)" onclick="abrirCarrito('+listado_compra[i]['textidservicio']+')"><i class="icon-edit tamano-icono" title="Editar"></i></a><br><a href="javascript:void(0)" onClick="eliminarCarrito('+listado_compra[i]['textidservicio']+')"><i class="icon-trash tamano-icono" title="Eliminar"></i></a></td></tr>';
                                            arraycontenidoCarrito.push(contenidoCarrito);
                                        }
                                        setTimeout (
                                            function() {
                                                $('#btn-reserva').show();
                                                $('#list_carrito_1').css('opacity','10');
                                                $('#list_carrito_1').css('background-image','none');
                                                $('#precio_total').text(number_format(precio_total));
                                                $('.cantidad_servicios').text(listado_compra.length);
                                                $('#listado_carrito_compras').html(arraycontenidoCarrito); 
                                               // $('html,listado_carrito_compras').animate({scrollTop:10},'slow');
                                            },
                                        900);   
                                    }     
                                } else {
                                    //mensaje de errors
                                    alert('Error en el modulo de listado de servicios "editar una lista unitaria"');
                                }
                            }
                        });
                        $.alert(servicio+', editado correctamente!');
                    }
                },
                no: function () {
                    console.log('Cancelo la operacion');                               
                }
            }
        });
    }    
}

function eliminarCarrito(id) {
    arrayServicio=[];
    arraycontenidoCarrito=[];
    var evento=$('#textevento_'+id).text(); 
    //$('html, body').css('overflow','hidden');
    var servicio=$('#textservicio_'+id).text();
   // $('html,listado_carrito_compras').animate({scrollTop:10},'slow');
              
    $.confirm({
        type:'red',
        closeIcon:true,
        title:'Confirmar!',
        typeAnimated: true,
        closeIconClass:'fa fa-close',
        content:'Deseas eliminar el siguiente servicio:  '+servicio+'!',
        buttons: {
            tryAgain: {
                text:'Si eliminar',
                btnClass:'btn-red',
                action: function() {
                    if(listado_compra.length > 0) {
                        $('#list_carrito_1').css('opacity','0.3');
                        if(id) {
                            if(listnewscript!='') {
                                listado_compra=listnewscript
                            } else {
                                listado_compra=listado_compra
                            }

                            for(i in listado_compra) {
                                if(listado_compra[i]['textevento']+'_'+listado_compra[i]['textidservicio'] != evento+'_'+id) {
                                
                                    var arrayServicioL= {
                                        'textfecha':listado_compra[i]['textfecha'],
                                        'textimagen':listado_compra[i]['textimagen'],
                                        'textprecio':listado_compra[i]['textprecio'],
                                        'textevento':listado_compra[i]['textevento'],
                                        'textmoneda':listado_compra[i]['textmoneda'],
                                        'infoPrecio':listado_compra[i]['infoPrecio'],
                                        'textidpaises':listado_compra[i]['textidpaises'],
                                        'textdistrito':listado_compra[i]['textdistrito'],
                                        'textqtyNino':listado_compra[i]['textqtyNino'],
                                        'textidhotel':listado_compra[i]['textidhotel'],
                                        'textduracion':listado_compra[i]['textduracion'],
                                        'textservicio':listado_compra[i]['textservicio'],
                                        'textqtyAdulto':listado_compra[i]['textqtyAdulto'],
                                        'textrecojores':listado_compra[i]['textrecojores'],
                                        'texttipocambio':listado_compra[i]['texttipocambio'],
                                        'textidservicio':listado_compra[i]['textidservicio'],
                                        'textfechacompra':listado_compra[i]['textfechacompra'],
                                        'textprecio_tours':listado_compra[i]['textprecio_tours'],
                                        'textidhabitacion':listado_compra[i]['textidhabitacion'],
                                        'textprecio_hotel':listado_compra[i]['textprecio_hotel'],
                                        'textcomentariores':listado_compra[i]['textcomentariores'],
                                        'textrenumerovuelores':listado_compra[i]['textrenumerovuelores'],
                                        'textairolineavuelores':listado_compra[i]['textairolineavuelores'],
                                    };
                                    arrayServicio.push(arrayServicioL);
                                }
                            }
                        }
                    
                        $.ajax({
                            type:"POST",
                            dataType:"JSON",
                            data: {
                                'moneda':$('#monedas').val(),
                                'arrayServicio':arrayServicio,
                            },
                            url:$('#texturl').val()+'inicio_frontEnd/gestion_carrito',
                            success:function(data) {
                                if(data) {
                                    var resultado=data;
                                    var moneda=resultado.moneda;
                                    var monedaI=resultado.monedaI;
                                    var listado_compra=resultado.listado_compra;
                                    listnewscript=listado_compra;
                                    var precio_total=0;
                                    $('.simbolo_pr').text(monedaI['simbolo']+' ');
                                    
                                    if(listado_compra) {
                                        for(i in listado_compra) {
                                            precio=calcular_precio(listado_compra[i]['infoPrecio'],listado_compra[i]['textqtyAdulto'],listado_compra[i]['texttipocambio'],moneda,listado_compra[i]['textprecio_hotel'],listado_compra[i]['textidpaises'],listado_compra[i]['textdistrito']);
                                            precio_total+=parseFloat(precio);
                                            var contenidoCarrito='<tr><td style="display:none;" id="textevento_'+listado_compra[i]['textidservicio']+'">'+listado_compra[i]['textevento']+'</td><td style="display:none;" id="textprecio">'+precio+'</td> <td><div class="thumb_cart"><img src="'+listado_compra[i]['textimagen']+'" alt="Image"></div></td><td><span class="item_cart text-justify" id="textservicio_'+listado_compra[i]['textidservicio']+'">'+titulojs(listado_compra[i]['textservicio'].toLowerCase())+'<br><b>'+listado_compra[i]['textevento']+'</b></span></td><td>'+listado_compra[i]['textqtyAdulto']+' Adultos, <br>'+listado_compra[i]['textqtyNino']+' Ñinos</td><td>'+monedaI['simbolo']+' '+number_format(precio)+'</td><td>'+listado_compra[i]['textfecha']+'</td><td class="options" style="width:5%; text-align:center;"><a href="javascript:void(0)" onclick="abrirCarrito('+listado_compra[i]['textidservicio']+')"><i class="icon-edit tamano-icono" title="Editar"></i></a><br><a href="javascript:void(0)" onClick="eliminarCarrito('+listado_compra[i]['textidservicio']+')"><i class="icon-trash tamano-icono" title="Eliminar"></i></a></td></tr>';
                                            arraycontenidoCarrito.push(contenidoCarrito);
                                        }
                                        setTimeout (
                                            function() {
                                                $('#btn-reserva-datos').show();
                                                $('#list_carrito_1').css('opacity','10');
                                                $('#list_carrito_1').css('background-image','none');
                                                $('#precio_total').text(number_format(precio_total));
                                                $('.cantidad_servicios').text(listado_compra.length);
                                                $('#listado_carrito_compras').html(arraycontenidoCarrito); 
                                                //$('html,listado_carrito_compras').animate({scrollTop:10},'slow');
                                            },
                                        900);   
                                    } else {
                                        setTimeout (
                                            function() {
                                                $('#btn-reserva-datos').hide();
                                                $('.cantidad_servicios').text('0');
                                                $('#list_carrito_1').css('opacity','10');
                                                $('#precio_total').text(number_format(precio_total));
                                                $('#list_carrito_1').css('background-image','none');
                                                //$('html,listado_carrito_compras').animate({scrollTop:10},'slow');
                                                $('#listado_carrito_compras').html('<tr><td colspan="6">No hay compras pendientes...</td></tr>');    
                                            },
                                        900);
                                    }       
                                } else {
                                    //mensaje de errors
                                    alert('Error en el modulo de listado de servicios "eliminar una lista unitaria"');
                                }
                            }
                        });    
                    }
                    $.alert(servicio+', eliminado correctamente!');
                }    
            },
            no: function () {
                //$('html, body').css('overflow','auto');
                $('html,listado_carrito_compras').animate({scrollTop:10},'slow');
                console.log('Cancelo la operacion');
            }
        }
    });
}

$('.tipo_pago').on('ifChanged',function(event) {
    if($('#valorDestino').val()=='' || $('#valorDestino').val()=='Seleccionar') {
        var destino='listado';
    } else {
        var destino=$('#valorDestino').val();
    }

    if($('input:radio[name=valorPago]:checked').val()!=undefined) {
        if($('input:radio[name=valorPago]:checked').val()=='GooglePay') {
            $('.VGooglePay').show();
            $('.VMercadoPago').hide();
        } else {
            $('.VGooglePay').hide();
            $('.VMercadoPago').show();
        }
    }
});

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

$('.btnrserva').on("click",function(e) {  
    
    arrayhabitacion=[];
    
    if($('#textidpaises').val()=='') {
        $('#textidpaises').focus();
        $('#message-paises').text('* Selecciona el país de residencia.');return;
    } else {
        $('#message-paises').text('');
    }

    if($('#textfecha').val()=='') {
        $('#textfecha').focus();
        $('#message-fecha').text('* Selecciona la fecha de llegada.');return;
    } else {
        $('#message-fecha').text('');
    }

    if($('#textevento').val()=='Paquetes') {
        if($('#textidhotel').val()=='') {
            $('#textidhotel').focus();
            $('#message-hotele').text('* Selecciona el hotel.');return;
        } else {
            $('#message-hotel').text('');
        }

        for(var e=1;e<=maxcampo;e++) {
            if($('#textidhabitacion'+e).val()!='' && $('#textidhabitacion'+e).val()!=undefined) {
                switch ($('#textidhabitacion'+e).val()) {
                    case '1': var cantidad=1;break;
                    case '2': var cantidad=2;break;
                    case '3': var cantidad=2;break;
                    case '4': var cantidad=3;break;
                    case '5': var cantidad=4;break;
                    case '6': var cantidad=5;break;
                }
                var arrayhabitacionL= {
                    'cantidad':cantidad,
                    'id':$('#textidhabitacion'+e).val(),
                };
                arrayhabitacion.push(arrayhabitacionL);
            }    
        }
        
        if(arrayhabitacion) {
            var k=0;
            for(i in arrayhabitacion) {
                k+=arrayhabitacion[i]['cantidad']
            }
            
            if(k<$('#textqtyAdulto').val()) {
                
                for(var e=1;e<=maxcampo;e++) {
                    if($('#textidhabitacion'+e).val()!=undefined) {
                        if($('#textidhabitacion'+e).val()=='') {
                            $('#textidhabitacion'+e).focus();
                            $('#message-habitacion'+e).text('* Selecciona el tipo de habitación '+e+'.');return;
                        } else {
                            $('#message-habitacion'+e).text('');
                        }
                    }    
                }
              
                Command:toastr["error"]("La cantidad de personas, supera el aforo de tipo de habitación. ¡Por favor verificar la información!","Aventuras PE !");  
                toastr.options = {
                    "debug":false,
                    "timeOut":"5000",
                    "closeButton":true,
                    "newestOnTop":true,
                    "progressBar":true,
                    "showDuration":"300",
                    "showEasing":"swing",
                    "hideDuration":"1000",
                    "hideEasing":"linear",
                    "showMethod":"fadeIn",
                    "hideMethod":"fadeOut",
                    "extendedTimeOut":"1000",
                    "preventDuplicates":false,
                    "positionClass":"toast-bottom-right",
                }
              return;
            }
        }
    } else {
        arrayhabitacion='';
    }    

    if($('#textqtyAdulto').val()=='0') {
        $('#textqtyAdulto').focus();
        $('#message-personas-adulta').text('* Selecciona un adulto o más en persona.');return;
    } else {
        $('#message-personas-adulta').text('');
    }
    
    $('.btnrserva').attr("disabled", true);
    
    var arrayServicioL= {
        'textrecojores':'',
        'textcomentariores':'',
        'textrenumerovuelores':'',
        'textairolineavuelores':'',
        'textfecha':$('#textfecha').val(),
        'textidhabitacion':arrayhabitacion,
        'textimagen':$('#textimagen').val(),
        'textprecio':$('#textprecio').val(),
        'textevento':$('#textevento').val(),
        'textmoneda':$('#textmoneda').text(),
        'infoPrecio':$('#infoPrecio1').val(),
        'textqtyNino':$('#textqtyNino').val(),
        'textidhotel':$('#textidhotel').val(),
        'textidpaises':$('#textidpaises').val(),
        'textdistrito':$('#textdistrito').val(),
        'textduracion':$('#textduracion').val(),
        'textservicio':$('#textservicio').text(),
        'textqtyAdulto':$('#textqtyAdulto').val(),
        'textidservicio':$('#textidservicio').val(),
        'textprecio_tours':$('#precio_tours').val(),
        'texttipocambio':$('#texttipocambio').val(),
        'textfechacompra':$('#textfechacompra').val(),
        'textprecio_hotel':$('#textprecio_hotel').val(),
    };
    arrayServicio.push(arrayServicioL); 

    $.ajax({
        type:"POST",
        dataType:"JSON",
        data: {
            'arrayServicio':arrayServicio,
        },
        url:$('#texturl').val()+'inicio_frontEnd/listado_compra',
        success:function(data) {
            if(data) {
                var resultado=data;
                var listado_compra=resultado.listado_compra;
                if(listado_compra!='') {
                    //location.href=$('#texturl').val()+"reserva/carrito/"+$('#monedas').val();
                    location.href=$('#texturl').val()+"cliente/reserva/"+$('#monedas').val();
                } else {
                    //mensaje de errors
                    alert('Error en el modulo de listado de servicios');
                }
            } else {
                //mensaje de errors
                alert('Error en el modulo de listado de servicios');
            }
        }
    });
});

function suscripcion() {    
    if($('#email').val()!='') {
        $('#email').css('border','none');
        var emailRegex=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(emailRegex.test($('#email').val())) {
            $.ajax({
                data: {
                    'email':$('#email').val()
                },
                type:"POST",
                dataType:"JSON",
                url:$('#texturl').val()+"inicio_frontEnd/suscripcion", 
                success:function(data) {
                    if(data==true) {
                        Command:toastr["success"]("Se ha registrado correctamente a nuestro sitio de notificaciones el siguiente correo "+$('#email').val()+".", "Aventuras PE !");
                        $('#email').val('');
                    } else {
                        Command:toastr["info"]("El siguiente correo electrónico "+$('#email').val()+", ya está registrado.","Aventuras PE !");
                        $('#email').val('');
                    }
                }
            });
        } else {
            Command:toastr["error"]("Debes ingresar un correo electrónico valido.","Aventuras PE !");
        }
        $('#email').css('background','none');   
    } else {
        $('#email').css('background','rgba(230, 226, 226, 0.9)');
        Command:toastr["error"]("Debes ingresar un correo electrónico valido.","Aventuras PE !");
    }   
    
    toastr.options = {
        "debug":false,
        "timeOut":"5000",
        "closeButton":true,
        "newestOnTop":true,
        "progressBar":true,
        "showDuration":"300",
        "showEasing":"swing",
        "hideDuration":"1000",
        "hideEasing":"linear",
        "showMethod":"fadeIn",
        "hideMethod":"fadeOut",
        "extendedTimeOut":"1000",
        "preventDuplicates":false,
        "positionClass":"toast-bottom-right",
    }
    $('#email').focus();
}

function validar_busquedad() {  
    if($('#search').val()=='' || $('#search').val()==null) {
        $('#search').focus();
        $('#search').css('background','rgba(230, 226, 226, 0.9)');
        Command:toastr["error"]("El campo de búsqueda esta vacío.","Aventuras PE !");
    }   
    
    toastr.options = {
        "debug":false,
        "timeOut":"5000",
        "closeButton":true,
        "newestOnTop":true,
        "progressBar":true,
        "showDuration":"300",
        "showEasing":"swing",
        "hideDuration":"1000",
        "hideEasing":"linear",
        "showMethod":"fadeIn",
        "hideMethod":"fadeOut",
        "extendedTimeOut":"1000",
        "preventDuplicates":false,
        "positionClass":"toast-bottom-right",
    }
}

function MaysPrimera(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function reclamo() { 
    if($('#dni').val()=='') {
        $('#dni').focus();
        $('#message-dni').text('* Campo obligatorio');return;
    } else {
        $('#message-dni').text('');
    }

    if($('#nombre').val()=='') {
        $('#nombre').focus();
        $('#message-nombre').text('* Campo obligatorio');return;
    } else{
        $('#message-nombre').text('');
    }

    if($('#email').val()=='') {
        $('#email').focus();
        $('#message-email').text('* Campo obligatorio');return;
    } else {
        var emailRegex=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(emailRegex.test($('#email').val())) {
            $('#message-email').text('');
        } else {
            $('#email').focus();
            $('#message-email').text('* Por favor, introduce una dirección de correo electrónico válida.');return;
        }
    }

    if($('#numero').val()=='') {
        $('#numero').focus();
        $('#message-numero').text('* Campo obligatorio');return;
    } else {
        $('#message-numero').text('');
    }

    if($('#direccion').val()=='') {
        $('#direccion').focus();
        $('#message-direccion').text('* Campo obligatorio');return;
    } else {
        $('#message-direccion').text('');
    }

    if($('#actividad').val()=='') {
        $('#actividad').focus();
        $('#message-actividad').text('* Campo obligatorio');return;
    } else {
        $('#message-actividad').text('');
    }

    if($('#servicio').val()=='') {
        $('#servicio').focus();
        $('#message-servicio').text('* Campo obligatorio');return;
    } else {
        $('#message-servicio').text('');
    }

    if($('#problema').val()=='') {
        $('#problema').focus();
        $('#message-problema').text('* Campo obligatorio');return;
    } else {
        $('#message-problema').text('');
    }
    
    if($('#solucion').val()=='') {
        $('#solucion').focus();
        $('#message-solucion').text('* Campo obligatorio');return;
    } else {
        $('#message-solucion').text('');
    }
   
    $.ajax({
        data: {
            'dni':$('#dni').val(),
            'email':$('#email').val(),
            'nombre':$('#nombre').val(),
            'numero':$('#numero').val(),
            'problema':$('#problema').val(),
            'servicio':$('#servicio').val(),
            'solucion':$('#solucion').val(),
            'actividad':$('#actividad').val(),
            'direccion':$('#direccion').val(),
        },
        type:"POST",
        dataType:"JSON",
        url:$('#texturl').val()+"inicio_frontEnd/registrar_reclamacion", 
        success:function(data) {
            if(data) {
                location.href=$('#texturl').val()+'rexitoso/'+data.nombre+'/'+data.email;
            } else {
               alert('Errors en modulo de reclamo');
            }
        }
    });
}

function tipo_habitacion(val) {
    
    if(val=='' || val==undefined){
        //$('.infoPrecio').text('0'); 
        $(".textidhabitacion").empty();
    } else {
        $("#textidhabitacion"+val).empty();   
    }

    $("#textidhotel option:selected").each(function () {
        id=$(this).val();
        $.post($('#texturl').val()+"hoteles/listado_habitaciones",{id:id},function(data){
            if(data) {
                var resultado=JSON.parse(data);
                    for(i in resultado) {
                    var id=resultado[i]['id_habitaciones'];
                    var nombre=MaysPrimera(resultado[i]['nombre'].toLowerCase());
                    
                    for(var e=1;e<=maxcampo;e++) {
                        if(e==val) {
                         
                            $("#textidhabitacion"+e).select2({data:[{id:"",text:"Seleccionar"},{id:id,text:nombre}]});
                            $('#textidhabitacion'+e).val('');
                        } else {
                            if(val=='' || val==undefined) {
                                $("#textidhabitacion"+e).select2({data:[{id:"",text:"Seleccionar"},{id:id,text:nombre}]});
                                if($('#textidservicioid').val()!='') {
                                    $('#valorhiddenaddbtn').val('1');
                                    $('#message-habitacion'+e).text('');
                                    $('#add_button').css('opacity','10');
                                    for(h in listado_compra) {
                                        if(listado_compra[h]['textidservicio']==$('#textidservicioid').val()) {
                                            var arrayHabi=listado_compra[h]['textidhabitacion'];
                                            idhbt1=arrayHabi[0]['id'];
                                            if(arrayHabi[e]!=undefined) {
                                                idhbt=arrayHabi[e]['id'];
                                            }
                                            if(idhbt1) {
                                                $('#textidhabitacion1').val(idhbt1);
                                            }
                                            if(arrayHabi.length>1) {
                                                $('#textidhabitacion'+(e+1)).val(idhbt)
                                            }
                                        }   
                                    }
                                }
                            }
                        }
                       
                        if($('#textidhabitacion'+e).val()=='') {
                            $('#valorhiddenaddbtn').val('0');
                            $('#textidhabitacion'+e).focus();
                            $('#add_button').css('opacity','0.3');
                            $('#message-habitacion'+e).text('* Selecciona el tipo de habitación '+e+'.');
                        } else {
                            $('#message-habitacion'+e).text('');
                        }
                    }
                }
                if($('#textidservicioid').val()!='') {
                    $('#textidhabitacion1').trigger('change'); 
                }
            } else {
                $("#textidhabitacion1").select2({data:[{id:"",text:"No hay información"}]});
                $('#textidhabitacion1').val("").trigger('change.select2');
            }
        });			
    });
}

function elegir_habitacion_valor() {
    
    var sumaHotel=0;
    arrayPrecioHabitacion=[];
    var q=$('#cantidad_campo').val();
    //$('.theiaStickySidebar').css('opacity','0.3');
    var k=1;
    for(var e=1;e<=maxcampo;e++) {
        if($('#textidhabitacion'+e).val()=='') {
            $('#valorhiddenaddbtn').val('0');
            $('#textidhabitacion'+e).focus();
            $('#add_button').css('opacity','0.3');
            $('#message-habitacion'+e).text('* Selecciona el tipo de habitación '+e+'.');return;   
        } else {
            if($('#textidhabitacion'+e).val()!=undefined) {
                $('#valorhiddenaddbtn').val('1');
                $('#message-habitacion'+e).text('');
                $('#add_button').css('opacity','10');
                var idhabitacion=$('#textidhabitacion'+e).val();
                $.post($('#texturl').val()+"inicio_frontEnd/elegir_reserva_paquetes/",{idhotel:$('#textidhotel').val(),idmoneda:$('#monedas').val(),idpaquete:$('#textidservicio').val(),idhabitacion:idhabitacion,},function(data){
                    setTimeout (
                        function() {
                            if(data) {
                                var t=k++;
                                arrayPrecioHabitacion=[];
                                var resultado=JSON.parse(data);
                                var info=resultado.info;
                                var inf_costo=resultado.inf_costo;
                                var inf_habitacion=resultado.inf_habitacion;
                                
                                if(inf_costo && inf_habitacion) {
                                    if(info['cantidad_dias'] > 0) {
                                        var dias=((info['cantidad_dias']) -1);
                                        if(dias > 0) {
                                            var precio_hotel=(parseFloat(inf_habitacion['precio_minimo']) * dias);
                                        } else {
                                            var precio_hotel=parseFloat(inf_habitacion['precio_minimo']);
                                        }
                                        arrayPrecioHabitacion.push(precio_hotel);
                                    }
                                    
                                    if(arrayPrecioHabitacion){
                                        for(i in arrayPrecioHabitacion) {
                                            sumaHotel+=arrayPrecioHabitacion[i];
                                        }
                                        sumaHotel=sumaHotel;
                                        if(t==q) {
                                            //$('#precio_hotel').val(precio_hotel);
                                            //$('#textprecio_hotel').val(precio_hotel);
                                            $('#precio_hotel').val(sumaHotel);
                                            $('#textprecio_hotel').val(sumaHotel);
                                            var precio=calcular_precio(inf_costo['total_soles'],$('#textqtyAdulto').val(),inf_costo['tipo_cambio'],$('#monedas').val(),sumaHotel,$('#textidpaises').val(),$('#textdistrito').val());
                                            $('.infoPrecio').text(number_format(precio));
                                            //$('.theiaStickySidebar').css('opacity','10'); 
                                            //$(".mensaje_resultado").html("<img src="+$('#texturl').val()+"public/img/loader.gif> Cargando...");
                                        } 
                                    } else {
                                        //$('.infoPrecio').text('0');
                                        $('#precio_hotel').val('0');
                                        $('#textprecio_hotel').val('0');
                                    }  
                                } else {
                                    //$('.infoPrecio').text('0');   
                                }
                            } else {
                                //mensaje de errors
                                //$('.infoPrecio').text('0');
                                alert('Error al cambiar la reserva de los paquetes');
                            }
                        },
                    0);
                });
            }
        }
    }    			
}

function validaSoloNumeros(id) {
    if(xGetElementById(id).value.match(/[^0-9\ ]/)){
        xGetElementById(id).value=xGetElementById(id).value.replace(/[^0-9\ ]/gi,"")
    }
}

function soloNumeros(e){    
    var key=window.Event ? e.which : e.keyCode;
    return (key >= 0 && key <= 57);
}

function soloLetras(e){
    key=e.keyCode || e.which;
    tecla=String.fromCharCode(key).toLowerCase();
    letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-39-46";
    tecla_especial=false
    
    for(var i in especiales){
        if(key==especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        return false;
    }
} 

function titulojs(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}