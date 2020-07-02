var arrayListadoServicios=new Array;

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
                    ul.append("<li class='ui-autocomplete-category' style='margin-left:40px;line-height:50px;color:#b52182;font-size:20px;'><img src='"+item.imagen+"' width='40px' height='40px' style='margin-top:0px;'>&nbsp;&nbsp;<b>"+ item.category +"</b></li>");
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
        
    });
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

window.onload=function() {
    var arrayListadoServiciosL;
    $.ajax({
        type:"POST",
        dataType:"JSON",
        url:$('#url').val()+'inicio_frontEnd/listado_servicios', 
        success:function(data) {
            if(data) {

                var tours=data.tours;
                var destinos=data.destinos;
                var tematicas=data.tematicas;
                var paquetes=data.paquetes;
                
                if(destinos) {
                    for(i in destinos) {
                        arrayListadoServiciosL={
                            category:'Destinos',
                            id:destinos[i]['id'],
                            label:MaysPrimera(destinos[i]['distrito'].toLowerCase()),
                            imagen:$('#url').val()+'public/front-end/img/destino.svg'
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }

                /*if(tematicas) {    
                    for(i in tematicas) {
                        arrayListadoServiciosL={
                            category:'TEMÁTICAS',
                            id:tematicas[i]['id'],
                            label:tematicas[i]['nombre'].toUpperCase(),
                            imagen:$('#url').val()+'public/front-end/img/tematica.svg'
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }*/
                
                if(tours) {    
                    for(i in tours) {
                        arrayListadoServiciosL={
                            category:'Tours',
                            id:tours[i]['id'],
                            label:MaysPrimera(tours[i]['nombre'].toLowerCase()+', '+tours[i]['distrito'].toLowerCase()),
                            imagen:$('#url').val()+'public/front-end/img/tours.svg'
                        },
                        arrayListadoServicios.push(arrayListadoServiciosL);
                    }
                }
                
                if(paquetes) {    
                    for(i in paquetes) {
                        arrayListadoServiciosL={
                            category:'Paquetes',
                            id:tours[i]['id'],
                            label:MaysPrimera(paquetes[i]['nombre'].toLowerCase()+', '+paquetes[i]['distrito'].toLowerCase()),
                            imagen:$('#url').val()+'public/front-end/img/paquete.svg'
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

function MaysPrimera(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
  }