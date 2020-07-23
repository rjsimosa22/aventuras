$(document).ready(function() {
    $("#id_aplica").on('change',function() {
        $('#destino').empty(); 
        $('#number-multiple').empty();        
        $("#id_aplica option:selected").each(function () {
            id=$(this).val();
            var accion="listours_destinos/listado_destino";
            if(id==1) {
                $('.titutlo-servicioL').text('Listado de Tours:');
                var accion="listours_destinos/listado_destino";
            } if(id==2) {
                var accion="listpaquetes_destinos/listado_destino";
                $('.titutlo-servicioL').text('Listado de Paquetes:');
            } if(id==3) {
                $('.titutlo-servicioL').text('Listado de Tours y Paquetes:');
                var accion="crud/ofertas/listado_destino";
            }
            $.post($('#url').val()+""+accion,{id:id,sel:"0"},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    var listado_destino=resultado.listado_destino;
                    var listado_servicio=resultado.listado_servicio;
                    if(listado_destino) {
                        for(var i=0;i<listado_destino.length;i++) {
                            var id=listado_destino[i]['id'];
                            var nombre=titulojs(listado_destino[i]['distrito']);
                            $("#destino").select2({data:[{id:"0",text:"Aplicar para todos"},{id:id,text:nombre}]});
                            $('#destino').val("0").trigger('change.select2');
                        } 
                    }  else {
                        $("#destino").select2({data:[{id:"",text:"No hay información"}]});
                        $('#destino').val("").trigger('change.select2');
                    }
                    
                    if(listado_servicio) {
                        for(var i=0;i<listado_servicio.length;i++) {
                            var id=listado_servicio[i]['id'];
                            var nombre=titulojs(listado_servicio[i]['nombre']);
                            $('#number-multiple').append('<option value="'+id+'" selected>'+nombre+'</option>').selectpicker('refresh');
                            $('#number-multiple').selectpicker('selectAll');
                        } 
                    }  else {
                        $("#destino").select2({data:[{id:"",text:"No hay información"}]});
                        $('#number-multiple').append('<option value="">No hay información</option>');
                        $('#destino').val("").trigger('change.select2');
                    }  
                } else {
                    $("#destino").select2({data:[{id:"",text:"No hay información"}]});
                    $('#destino').val("").trigger('change.select2');
                }
            });	  		
        });
    });

    $("#destino").on('change',function() {
        $('#number-multiple').empty();
            if($('#id_aplica').val()==1) {
                var accion="listours_destinos/listado_destino";
            }
            if($('#id_aplica').val()==2) {
                var accion="listpaquetes_destinos/listado_destino";
            }
            if($('#id_aplica').val()==3) {
                var accion="crud/ofertas/listado_destino";
            }
        $("#destino option:selected").each(function () {
            id=$(this).val();
            $.post($('#url').val()+""+accion,{id:id,sel:"1"},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    var listado_servicio=resultado.listado_servicio;
                    if(listado_servicio) {
                        for(var i=0;i<listado_servicio.length;i++) {
                            var id=listado_servicio[i]['id'];
                            var nombre=titulojs(listado_servicio[i]['nombre']);
                            $('#number-multiple').append('<option value="'+id+'" selected>'+nombre+'</option>').selectpicker('refresh');
                            if(listado_servicio.length > 1) {
                                $('#number-multiple').selectpicker('selectAll');
                            } else {
                                $('#number-multiple').selectpicker('val',id);
                            }
                        } 
                    }  else {
                        $('#number-multiple').append('<option value="">No hay información</option>');
                    }  
                } else {
                    $('#number-multiple').append('<option value="">No hay información</option>');
                }
            });			
        });           
    });
});

function formRegistro() {
    if($('#nombre').val()=='') {
        $('#val_nombre').show();
        $('.titulo-nombre').css('color','#a81515');
    } else {
        $('#val_nombre').hide();
        $('.titulo-nombre').css('color','#527f26');
    }
    
    if($('#daterangepicker3').val()=='') {
        $('#val_daterangepicker3').show();
        $('.titulo-daterangepicker3').css('color','#a81515');
    } else {
        $('#val_daterangepicker3').hide();
        $('.titulo-daterangepicker3').css('color','#527f26');
    }

    if($('#id_oferta').val()=='') {
        $('#val_id_oferta').show();
        $('.titulo-id_oferta').css('color','#a81515');
    } else {
        $('#val_id_oferta').hide();
        $('.titulo-id_oferta').css('color','#527f26');
    }

    if($('#id_aplica').val()=='') {
        $('#val_id_aplica').show();
        $('.titulo-id_aplica').css('color','#a81515');
    } else {
        $('#val_id_aplica').hide();
        $('.titulo-id_aplica').css('color','#527f26');
    }

    if($('#id_destino').val()=='') {
        $('#val_destino').show();
        $('.titulo-destino').css('color','#a81515');
    } else {
        $('#val_destino').hide();
        $('.titulo-destino').css('color','#527f26');
    }

    if($('#id_destino').val()=='') {
        $('#val_destino').show();
        $('.titulo-destino').css('color','#a81515');
    } else {
        $('#val_destino').hide();
        $('.titulo-destino').css('color','#527f26');
    }

    if($('#number-multiple').val()==null) {
        $('#val_multiple').show();
        $('.titulo-servicioL').css('color','#a81515');
    } else {
        $('#val_multiple').hide();
        $('.titulo-servicioL').css('color','#527f26');
    }

    if($('#regla_monto').val()=='0') {
        $('#val_regla_monto').show();
        $('.titulo-regla_monto').css('color','#a81515');
    } else {
        $('#val_regla_monto').hide();
        $('.titulo-regla_monto').css('color','#527f26');
    }

    if($('#monto_porcentaje').val()=='') {
        $('#val_monto_porcentaje').show();
        $('.titulo-monto_porcentaje').css('color','#a81515');
    } else {
        $('#val_monto_porcentaje').hide();
        $('.titulo-monto_porcentaje').css('color','#527f26');
    }

    if($('#nombre').val()!='' && $('#daterangepicker3').val()!='' && $('#id_oferta').val()!='' && $('#id_aplica').val()!='' && $('#id_destino').val()!='' && $('#number-multiple').val()!=null && $('#regla_monto').val()!='' && $('#monto_porcentaje').val()!='') {
        $.ajax({
            data: {
                'nombre':$('#nombre').val(),'daterangepicker3':$('#daterangepicker3').val(),'id_oferta':$('#id_oferta').val(),'id_aplica':$('#id_aplica').val(),'id_destino':$('#id_destino').val(),'number_multiple':$('#number-multiple').val(),'regla_monto':$('#regla_monto').val(),'monto_porcentaje':$('#monto_porcentaje').val(),'persona':$('#persona').val(),'monto':$('#monto').val(),'descripcion':$('#descripcion').val()
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+'crud/ofertas/registrar', 
            success:function(data) {
                if(data==true) {
                    location.href=$('#url').val()+'crud/ofertas/';
                } else {
                    location.href=$('#url').val()+'crud/ofertas/';
                }
            }
        });
    }
}

function validarForm() {
    if($('#nombre').val()=='') {
        $('#val_nombre').show();
        $('.titulo-nombre').css('color','#a81515');
    } else {
        $('#val_nombre').hide();
        $('.titulo-nombre').css('color','#527f26');
    }
    
    if($('#daterangepicker3').val()=='') {
        $('#val_daterangepicker3').show();
        $('.titulo-daterangepicker3').css('color','#a81515');
    } else {
        $('#val_daterangepicker3').hide();
        $('.titulo-daterangepicker3').css('color','#527f26');
    }

    if($('#id_oferta').val()=='') {
        $('#val_id_oferta').show();
        $('.titulo-id_oferta').css('color','#a81515');
    } else {
        $('#val_id_oferta').hide();
        $('.titulo-id_oferta').css('color','#527f26');
    }

    if($('#id_aplica').val()=='') {
        $('#val_id_aplica').show();
        $('.titulo-id_aplica').css('color','#a81515');
    } else {
        $('#val_id_aplica').hide();
        $('.titulo-id_aplica').css('color','#527f26');
    }

    if($('#id_destino').val()=='') {
        $('#val_destino').show();
        $('.titulo-destino').css('color','#a81515');
    } else {
        $('#val_destino').hide();
        $('.titulo-destino').css('color','#527f26');
    }

    if($('#id_destino').val()=='') {
        $('#val_destino').show();
        $('.titulo-destino').css('color','#a81515');
    } else {
        $('#val_destino').hide();
        $('.titulo-destino').css('color','#527f26');
    }

    if($('#number-multiple').val()==null) {
        $('#val_multiple').show();
        $('.titulo-servicioL').css('color','#a81515');
    } else {
        $('#val_multiple').hide();
        $('.titulo-servicioL').css('color','#527f26');
    }

    if($('#regla_monto').val()=='0') {
        $('#val_regla_monto').show();
        $('.titulo-regla_monto').css('color','#a81515');
    } else {
        $('#val_regla_monto').hide();
        $('.titulo-regla_monto').css('color','#527f26');
    }

    if($('#monto_porcentaje').val()=='') {
        $('#val_monto_porcentaje').show();
        $('.titulo-monto_porcentaje').css('color','#a81515');
    } else {
        $('#val_monto_porcentaje').hide();
        $('.titulo-monto_porcentaje').css('color','#527f26');
    }
}

function consultar(val,opc,url) {
    $('.siDiv').hide();
    if(val) {
        if(opc=='editar') {
            $('#btn-botton').show();
            $("input").prop('disabled',false);
            $('.title-botton').text('Editar');
            $("textarea").prop('disabled',false);
            $('.title-formulario').text('Editar Moneda');
        } else {
            $('#btn-botton').hide();
            $('.title-botton').text('Editar');
            $("input").prop('disabled',true);
            $("textarea").prop('disabled',true);
            $('.title-formulario').text('Visualización de Moneda');
        }

        $.ajax({
            data: {
                'id':val
            },
            type:"POST",
            dataType:"JSON",
            url:url+'crud/monedas/consultar', 
            success:function(data) {
                if(data) {
                    $('#id').val(data['id']);
                    $('#cambio').val(data['tipo_cambio']);
                    $('#nombre').val(data['nombre']);
                    $('#simbolo').val(data['simbolo']);
                    $('#descripcion').val(data['descripcion']);
                    $('#descripcion').text(data['descripcion']);

                    //modal
                    $("#myModal").modal();
                } else {
                    $('#id').val('');
                    $('#cambio').val('');
                    $('#nombre').val('');
                    $('#simbolo').val('');
                    $('#descripcion').val('');
                    $('#descripcion').text('');

                    //mensaje de errors
                    alert('Error en el modulo de monedas');
                }
            }
        });     
    } else {
        $('#id').val('');
        $('#monto').val(''); 
        $('#nombre').val('');
        $('#destino').val('0');
        $('#persona').val('0');
        $('#btn-botton').show();
        $('#id_aplica').val('3');
        $('#id_aplica').change();
        $('#id_oferta').val('');
        $('#descripcion').val('');
        $('#regla_monto').val('0');
        $('#descripcion').text('');
        $('#daterangepicker3').val('');
        $("input").prop('disabled',false);
        $('.title-botton').text('Registrar');
        $("textarea").prop('disabled',false);
        $('#number-multiple').selectpicker('selectAll');
        $('.title-formulario').text('Registrar Oferta');

        //modal
        $("#myModal").modal();
    } 
}

function tipoEvento() {
    $(".titulo-regla").text('Tipo '+titulojs($("#id_oferta  option:selected").text())+':');
    if($('#id').val()) {
        $('.title-formulario').text(titulojs('Editar '+$("#id_oferta  option:selected").text()));
    } else {
        $('.title-formulario').text(titulojs('Registrar '+$("#id_oferta  option:selected").text()));
    }
    $('.titulo-label-1').text(titulojs($("#id_oferta  option:selected").text())+' Por:')
}