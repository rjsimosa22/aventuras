var arrayid=new Array;
var arrayImagenes=new Array;
var arrayHabitacion=new Array;
var arrayHabitaciones=new Array;
var arrayListadoImagenes=new Array;
var arrayListadoHabitaciones=new Array;

$(document).ready(function() {

    $("#wizard1").validate({
        ignore:[],
        debug:false,
        rules:{    
            nombre: {
                required:true,
                minlength: 3,
            },  
            "departamento": "required",  
            "provincia": "required", 
            "distrito": "required",
            "servicios_popular[]": "required", 
            descripcion:{ 
                required:function(){CKEDITOR.instances.descripcion.updateElement();}, 
                minlength:5 
            },
            servicios:{ 
                required:function(){CKEDITOR.instances.servicios.updateElement();}, 
                minlength:10 
            },
        },
        messages: {
            "departamento": "",
            "provincia": "",
            "distrito": "",
            "servicios_popular[]": "",
        },
        submitHandler:function(form1) {        
            var url=$('#url1').val();
            form1.action=url;	
            var mensj="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma=window.confirm(mensj);	
            if(confirma) {
                document.forms.form1.submit();
            }
        },
        highlight: function(element) {   
            if($('#departamento').val()=='') {
                $('#val_Depart').show();
                $('#title_Depart').css('color','#a81515');
            } else {
                $('#val_Depart').hide();
                $('#title_Depart').css('color','#527f26');
            }
            
            if($('#provincia').val()=='') {
                $('#val_Prov').show();
                $('#title_Prov').css('color','#a81515');
            } else {
                $('#val_Prov').hide();
                $('#title_Prov').css('color','#527f26');
            }

            if($('#distrito').val()=='') {
                $('#val_Dist').show();
                $('#title_Dist').css('color','#a81515');
            } else {
                $('#val_Dist').hide();
                $('#title_Dist').css('color','#527f26');
            }

            if($('#servicios_popular').val()==null) {
                $('#val_ServicioP').show();
                $('#title_ServicioP').css('color','#a81515');
            } else {
                $('#val_ServicioP').hide();
                $('#title_ServicioP').css('color','#527f26');
            }
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        
        success: function(element) {
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    }),
    
    $('#basicwizard').stepy();
    $('#wizard1').stepy({finishButton:true,titleClick:true,block:true,validate:true});
    $('.stepy-navigator').wrapInner('<div class="pull-right"></div>');
 
    $("#form").validate({
        rules:{
            habitacion: {
                required:true,
            },
            cantidad_habitacion: {
                required:true,
            },
            cantidad_persona: {
                required:true,
            },
            disponibilidad: {
                required:true,
            },
            moneda: {
                required:true,
            },
            precio_minimo: {
                required:true,
            },
            precio_maximo: {
                required:true,
            },
            servicios_habitacion: {
                required:true,
                minlength:10 
            },
        },
        submitHandler: function(form) { 
            var mensj="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma=window.confirm(mensj);
            
            if(confirma) {
                if($('.title-botton').text()=='Editar') {
                    var url=$('#url').val()+"/hoteles/editar_habitacion";
                } else {
                    var url=$('#url').val()+"/hoteles/registrar_habitacion";
                }

                $.ajax({
                    data: {
                        'moneda':$('#moneda').val(),
                        'id_hoteles':$('#id_hotel').val(),
                        'id_habitaciones':$('#habitacion').val(),
                        'precio_minimo':$('#precio_minimo').val(),
                        'precio_maximo':$('#precio_maximo').val(),
                        'disponibilidad':$('#disponibilidad').val(),
                        'cantidad_personas':$('#cantidad_personas').val(),
                        'cantidad_habitacion':$('#cantidad_habitacion').val(),
                        'servicios_habitacion':$('#servicios_habitacion').val(),
                    },
                    type:"POST",
                    dataType:"JSON",
                    url:url,
                    success:function(data) {
                        listado_habitaciones();
                        $('#siDiv1').show();
                        $('#divSi3').text('La habitación');           
                        $(".modal:visible").modal('toggle');
                        $('#divSi4').text(' '+$('#habitacion option:selected').text().toUpperCase()+' ').css("font-weight","bold");           
                       
                        if($('.title-botton').text()=='Editar') {
                            $('#divSi5').text('se modificado correctamente.'); 
                        } else {
                            $('#divSi5').text('se registro correctamente.'); 
                        }
                    }
                });
                $('#servicios_habitacion input[type="text"]').val('');
                CKEDITOR.instances.servicios_habitacion.setData('');
            }
        },
        highlight: function(element){
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        success: function(element){
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    });

    $("#dropzone").on('click',function(){
        $('#imagenes').val('si registro lleno');
    });

    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });
    
    var _URL = window.URL || window.webkitURL;
    $("#fileInput").on('change',function() {
        var id=$('#id_imagen').val();
        var image=$('#fileInput').val();
        var img_ex=/(\.jpg|\.jpeg)$/i;
        var file=document.getElementById("fileInput").files[0];
   
        if(file.size <= '2097152') {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    if(this.width >= 1600 && this.height >= 1060) {
                        $('.name_errors').hide();
                        $('#errors_imagen').text('');

                        if(!img_ex.exec(image)){
                            $('.name_errors').show();
                            $('#errors_imagen').text('La imagen debe ser JPG o JPEG');
                            return false;
                        }else{
                            $('#uploadForm').hide();
                            $('.name_errors').hide();
                            $('.uploadProcess').show();
                            $('#errors_imagen').text('');
                            $('#picUploadForm').submit();
                        }
                    } else {    
                        $('.name_errors').show();
                        $('#errors_imagen').text('La imagen debe tener al menos 1600 x 1060 píxeles');return;
                    }
                };
                img.src=_URL.createObjectURL(file)
            }
           
        } else {
            $('.name_errors').show();
            $('#errors_imagen').text('La imagen debe tener un peso menor a 2MB');return;
        }
    });

    $("#FormAltSEO").validate({
        rules:{
            alt_imagen: {
                minlength:3,
                required:true,
            }
        },
        submitHandler: function(form) { 
            var url=$('#urlALTSEO').val();
            var mensj="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma=window.confirm(mensj);	
            if(confirma) {
                $.ajax({
                    url:url,
                    type:"POST",
                    data:'alt_imagen='+$('#alt_imagen').val()+'&id_imagen='+$('#id_imagen').val(),
                    success:function(data) {
                        if(data=='true') {
                            listado_imagenes();
                            $('#name_success').show();
                            $('#success_imagen').text('Registro exitoso');
                            setTimeout(function(){$('#name_success').hide();},1000);
                        } 
                    }
                });
            }
        },
        highlight: function(element){
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        success: function(element){
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    });

    $("#departamento").on('change',function() {
        var url=$('#url').val();
        $('#provincia').empty();
        if($('#departamento').val()=='') {
            $('#val_Depart').show();
            $('#title_Depart').css('color','#a81515');
        } else {
            $('#val_Depart').hide();
            $('#title_Depart').css('color','#527f26');
        }
        
        $("#departamento option:selected").each(function () {
            id=$(this).val();
            $.post(url+"comboDPD/provincia",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                     for(i in resultado) {
                        var id=resultado[i]['id'];
                        var nombre=titulojs(resultado[i]['nombre']);
                        $("#provincia").select2({data:[{id:"",text:"Todos"},{id:id,text:nombre}]});
                        $('#provincia').val("").trigger('change.select2');
                    } 
                } else {
                    $("#provincia").select2({data:[{id:"",text:"Debe Seleccionar deparamento"}]});
                    $('#provincia').val("").trigger('change.select2');
                }
            });			
        });
   });

    $("#provincia").on('change',function() {
        var url=$('#url').val();
        $('#distrito').empty();
        if($('#provincia').val()=='') {
            $('#val_Prov').show();
            $('#title_Prov').css('color','#a81515');
        } else {
            $('#val_Prov').hide();
            $('#title_Prov').css('color','#527f26');
        }
        
        $("#provincia option:selected").each(function () {
            id=$(this).val();
            $.post(url+"comboDPD/distrito",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    for(i in resultado) {
                        var id=resultado[i]['id'];
                        var nombre=titulojs(resultado[i]['nombre']);
                        $("#distrito").select2({data:[{id:"",text:"Todos"},{id:id,text:nombre}]});
                        $('#distrito').val("").trigger('change.select2');
                    } 
                } else {
                    $("#distrito").select2({data:[{id:"",text:"Debe Seleccionar deparamento"}]});
                    $('#distrito').val("").trigger('change.select2');
                }
            });			
        });
    });

    $("#distrito").on('change',function() {
        if($('#distrito').val()=='') {
            $('#val_Dist').show();
            $('#title_Dist').css('color','#a81515');
        } else {
            $('#val_Dist').hide();
            $('#title_Dist').css('color','#527f26');
        }
    });

    $("#servicios_popular").on('change',function() {
        if($('#servicios_popular').val()==null) {
            $('#val_ServicioP').show();
            $('#title_ServicioP').css('color','#a81515');
        } else {
            $('#val_ServicioP').hide();
            $('#title_ServicioP').css('color','#527f26');
        }
    });
});

function completeUpload(success,fileName,url_imagen,url,id_hoteles,nombre,accion) {
    
    if(success==1) {
        $('#siDiv').show();
        $('.uploadProcess').hide();
        $('#nombre_imagen').text(fileName);
        $('#fileInput').attr("value",fileName);
        $("#imagePreview").attr("src",url_imagen+'/'+fileName); 

        if(accion=='editar'){
            $('#divSi').text('La imagen');           
            $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
            $('#divSi2').text('se modificado correctamente.');
        } else {
            $('#divSi').text('La imagen');           
            $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
            $('#divSi2').text('se registro correctamente.');
        }
        
        setTimeout (function(){
            $(".modal:visible").modal('toggle');
            $('body').removeClass("modal-open");
            $('body').css('overflow','scroll');
            listado_imagenes();
            
        },1600);
    }else{
        $('.uploadProcess').hide();
        alert('Error al guardar la imagen!');
    }
    return true;
}

function inactivar_habitaciones(id) {
 
    $('#siDiv1').hide();
    for(i in arrayListadoHabitaciones) {
        if(id==arrayListadoHabitaciones[i]['id']) {
            var nombre=arrayListadoHabitaciones[i]['nombre'];
        }
    }

    var con=confirm("¿Esta seguro de inactivar este registro : "+nombre.toUpperCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+"/hoteles/inactivar_habitaciones", 
            success:function(data) {
                $('#siDiv1').show();
                $('#divSi3').text('La habitación');           
                $('#divSi4').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi5').text('se inactivo correctamente.');           
                alert("Se inactivo el siguiente registro : "+nombre.toUpperCase());
                listado_habitaciones();
            }
        });
    } else if(!con) {
        return false; 
    }
}

function activar_habitaciones(id) {
    
    $('#siDiv1').hide();
    for(i in arrayListadoHabitaciones) {
        if(id==arrayListadoHabitaciones[i]['id']) {
            var nombre=arrayListadoHabitaciones[i]['nombre'];
        }
    }

    var con=confirm("¿Esta seguro de activar este registro : "+nombre.toUpperCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+"/hoteles/activar_habitaciones", 
            success:function(data) {
                $('#siDiv1').show();
                $('#divSi3').text('La habitación');           
                $('#divSi4').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi5').text('se activo correctamente.');           
                alert("Se activo el siguiente registro : "+nombre.toUpperCase());
                listado_habitaciones();
            }
        });
    } else if(!con) {
        return false; 
    }
}

function inactivar_imagenes(id) {

    $('#siDiv').hide();
    for(i in arrayListadoImagenes) {
        if(id==arrayListadoImagenes[i]['id']) {
            var nombre=arrayListadoImagenes[i]['nombre'];
        }
    }

    var con=confirm("¿Esta seguro de inactivar este registro : "+nombre.toUpperCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+"/hoteles/inactivar_imagenes", 
            success:function(data) {
                $('#siDiv').show();
                $('#divSi').text('La imagen');           
                $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se inactivo correctamente.');           
                alert("Se inactivo el siguiente registro : "+nombre.toUpperCase());
                listado_imagenes();
            }
        });
    } else if(!con) {
        return false; 
    }
}

function activar_imagenes(id) {
    
    $('#siDiv').hide();
    for(i in arrayListadoImagenes) {
        if(id==arrayListadoImagenes[i]['id']) {
            var nombre=arrayListadoImagenes[i]['nombre'];
        }
    }

    var con=confirm("¿Esta seguro de activar este registro : "+nombre.toUpperCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+"/hoteles/activar_imagenes", 
            success:function(data) {
                $('#siDiv').show();
                $('#divSi').text('La imagen');           
                $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se activo correctamente.');           
                alert("Se activo el siguiente registro : "+nombre.toUpperCase());
                listado_imagenes();
            }
        });
    } else if(!con) {
        return false; 
    }
}

function consultar_imagenes(id,val) {
    
    if(id) {
        $('#btnCargarALT').val('Editar ALT');
        $('#btnEditarIMG').text('Editar Imagen');
    } else {
        $('#btnCargarALT').val('Guardar ALT');
        $('#btnEditarIMG').text('Cargar Imagen');
    }
    
    $('#siDiv').hide();
    if(id) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+'/hoteles/imagen_personal', 
            success:function(data) {
                if(data) {
                    if(val > 0) {
                        $('#divAltSEO').hide();
                        $('#FormAltSEO').show();
                        $('#ocultarbtn').hide();
                        $('.btnCargarALT').hide();
                        $('#alt_imagen_2').val('');
                        $("#id_imagen").val(data.id);
                        $('#alt_imagen').val(data.alt_seo);
                        $("#id_hoteles").val(data.id_hoteles);
                        $("#nombre_imagen").text(data.nombre);
                        $("#alt_imagen").prop('disabled',true);
                        $("#imagePreview").prop('disabled', true);
                        $("#nombre_imagen_2").val(data.nombre_extension);
                        $('.title-formulario').text('Visualización Imagen');
                        $("#imagePreview").attr("src",$('#url').val()+'public/img/hoteles/'+data.nombre_extension);
                    } else {
                        $('#divAltSEO').hide();
                        $('#FormAltSEO').show();
                        $('#ocultarbtn').show();
                        $('.btnCargarALT').show();
                        $('#alt_imagen_2').val('');
                        $("#id_imagen").val(data.id);
                        $('#alt_imagen').val(data.alt_seo);
                        $("#id_hoteles").val(data.id_hoteles);
                        $("#nombre_imagen").text(data.nombre);
                        $("#alt_imagen").prop('disabled',false);
                        $('.title-formulario').text('Editar Imagen');
                        $("#nombre_imagen_2").val(data.nombre_extension);
                        $("#imagePreview").attr("src",$('#url').val()+'public/img/hoteles/'+data.nombre_extension);
                    }
                    
                    //modal
                    $("#myModalimagenes").modal();
                } else {
                    $('#divAltSEO').show();
                    $('#FormAltSEO').hide();
                    $("#id_imagen").val('');
                    $('#alt_imagen').val('');
                    $('#alt_imagen_2').val('');
                    $("#nombre_imagen").text('');
                    $("#nombre_imagen_2").val('');
                    $("#imagePreview").attr("src","");
                    $("#alt_imagen").prop('disabled',false);

                    //mensaje de errors
                    alert('Error en el modulo de imagenes');
                }
            }
        }); 
    } else {
        $('#divAltSEO').show();
        $('#FormAltSEO').hide();
        $('#ocultarbtn').show();
        $("#id_imagen").val('');
        $('#alt_imagen').val('');
        $('#alt_imagen_2').val('');
        $("#nombre_imagen_2").val('');
        $("#id_hoteles").val($('#id').val());
        $("#alt_imagen").prop('disabled',false);
        $("#nombre_imagen").text('No Hay Imagen');
        $('.title-formulario').text('Registrar Imagen');
        $("#imagePreview").attr("src",$('#url').val()+'public/img/not-available.png');
    
        //modal
        $("#myModalimagenes").modal();
    }
    $('#name_errors').hide();
    $('#name_success').hide();
}

function consultar_habitaciones(id,val) {
    
    arrayid=[];
    $('#siDiv').hide();
    for(i in arrayListadoHabitaciones) {
        if(id==arrayListadoHabitaciones[i]['id_habitaciones']) {
            var nombretitulojs=titulojs(arrayListadoHabitaciones[i]['nombre']);
        }
    }
    
    if(id) {
        $.ajax({
            data: {
                'id_habitaciones':id,
                'id_hoteles':$('#id').val(),
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url').val()+'/hoteles/habitacion_personal', 
            success:function(data) {
                
                if(data) {
                    actualizar_selected_habitacion(id,1,$('#url').val());
                    if(val > 0) {
                        $('.title-botton').hide();
                        $('.title-formulario').text('Visualización habitación');
                        CKEDITOR.instances['servicios_habitacion'].setReadOnly(true);
                        $("#moneda").val(data[0]['id_monedas']).prop('disabled',true);
                        $('#id_hotel').val(data[0]['id_hoteles']).prop('disabled',true);
                        CKEDITOR.instances.servicios_habitacion.setData(data[0]['servicios']);
                        $("#habitacion").val(data[0]['id_habitaciones']).prop('disabled',true);
                        $("#precio_minimo").val(data[0]['precio_minimo']).prop('disabled',true);
                        $("#precio_maximo").val(data[0]['precio_maximo']).prop('disabled',true);
                        $("#disponibilidad").val(data[0]['disponibilidad']).prop('disabled',true);
                        $("#cantidad_personas").val(data[0]['cantidad_personas']).prop('disabled',true);
                        $("#cantidad_habitacion").val(data[0]['cantidad_habitaciones']).prop('disabled',true);
                    } else {
                        $('input').prop('disabled',false);
                        $('select').prop('disabled',false);
                        $('textarea').prop('disabled',false);
                        $("#moneda").val(data[0]['id_monedas']);
                        $('.title-botton').text('Editar').show();
                        $('#id_hotel').val(data[0]['id_hoteles']);
                        $("#habitacion").val(data[0]['id_habitaciones']);
                        $('.title-formulario').text('Editar habitación');
                        $("#precio_minimo").val(data[0]['precio_minimo']);
                        $("#precio_maximo").val(data[0]['precio_maximo']);
                        $("#disponibilidad").val(data[0]['disponibilidad']);
                        $("#servicios_habitacion").text(data[0]['servicios']);
                        $("#cantidad_personas").val(data[0]['cantidad_personas']);
                        CKEDITOR.instances['servicios_habitacion'].setReadOnly(false);
                        $("#cantidad_habitacion").val(data[0]['cantidad_habitaciones']);
                        CKEDITOR.instances.servicios_habitacion.setData(data[0]['servicios']);
                    }
                    
                    //modal
                    $("#myModal").modal();
                } else {
                    $("#moneda").val('');
                    $('#id_hotel').val('');
                    $("#habitacion").val('');
                    $("#precio_minimo").val('');
                    $("#precio_maximo").val('');
                    $("#disponibilidad").val('SI');
                    $('input').prop('disabled',false);
                    $("#cantidad_personas").val('1');
                    $('select').prop('disabled',false);
                    $("#cantidad_habitacion").val('1');
                    $("#servicios_habitacion").text('');
                    $('textarea').prop('disabled',false);
                    $('.title-botton').text('Editar').show();
                    $('.title-formulario').text('Editar habitación');
                    CKEDITOR.instances.servicios_habitacion.setData('');
                    CKEDITOR.instances['servicios_habitacion'].setReadOnly(false);

                    //mensaje de errors
                    alert('El dia de hoy no hay disponibilidad registrada, por lo tanto, no puedes hacer ninguna actividad en la habitación: '+nombre);
                }
            }
        }); 
    } else {
        if(arrayListadoHabitaciones.length > 0) {
            for(i in arrayListadoHabitaciones) {
                arrayid.push(arrayListadoHabitaciones[i]['id_habitaciones']);
            }
            actualizar_selected_habitacion(arrayid,0,$('#url').val());
        }
        
        $("#moneda").val('');
        $("#habitacion").val('');
        $("#precio_minimo").val('');
        $("#precio_maximo").val('');
        $("#disponibilidad").val('SI');
        $("#cantidad_personas").val('1');
        $('input').prop('disabled',false);
        $('select').prop('disabled',false);
        $('#id_hotel').val($('#id').val());
        $("#cantidad_habitacion").val('1');
        $("#servicios_habitacion").text('');
        $('textarea').prop('disabled',false);
        $('.title-botton').text('Registrar').show();
        $('.title-formulario').text('Registrar habitación');
        CKEDITOR.instances.servicios_habitacion.setData('');
                        
        //modal
        $("#myModal").modal();
    }
}


function actualizar_selected_habitacion(id,val,url) {
    $.post(url+"habitaciones/listado_no_incluidos",{id:id,val:val},function(data) {
        if(data!='null') { 
            $('#habitacion').val('');
            $('#habitacion').empty();
            var resultado=JSON.parse(data);
            var select=document.getElementsByName('habitacion')[0];

            if(val=='0') {
            var option=document.createElement("option");
                option.value='';
                option.text='Seleccionar';
                select.add(option);
            }

            for(i in resultado) {
                option=document.createElement("option");
                option.value=resultado[i]['id'];
                option.text=resultado[i]['nombre'].toUpperCase();
                select.add(option);
            } 
        } else {
            $('#habitacion').val('');
            $('#habitacion').empty();
            var select=document.getElementsByName('habitacion')[0];

            var option=document.createElement("option");
            option.value='';
            option.text='No hay selección';
            select.add(option);
        } 
    });			
}

function listado_imagenes() {

    arrayImagenes=[];
    arrayListadoImagenes=[];
    $.post($('#url').val()+"hoteles/listado_imagenes",{id:$('#id').val()},function(data) {
        if(data) { 
            var arrayImagenesL='';
            var resultado=JSON.parse(data);
            arrayListadoImagenes=resultado;

            for(i in resultado) {

                var img="<img src='"+$('#url').val()+"public/img/hoteles/small/"+resultado[i]['nombre_extension']+"' width='120px' height='70px'/>";
                if(resultado[i]['status']=='1') {
                    var action="<a href='javascript:void(0);' onClick='consultar_imagenes("+resultado[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='consultar_imagenes("+resultado[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='inactivar_imagenes("+resultado[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ban-circle' title='Inactivar'></i></a>";
                } else {
                    var action="<a href='javascript:void(0);' onClick='consultar_imagenes("+resultado[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='consultar_imagenes("+resultado[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='activar_imagenes("+resultado[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ok' title='Activar'></i></a>";
                }

                var alt_seo='N/A';
                if(resultado[i]['alt_seo']) {
                    var alt_seo=resultado[i]['alt_seo'].toLowerCase();
                }
                
                arrayImagenesL=[
                    img,
                    resultado[i]['nombre'].toLowerCase(),
                    alt_seo,
                    resultado[i]['nombre_status'].toLowerCase(),
                    action
                ];
                arrayImagenes.push(arrayImagenesL);
            } 

            if(arrayImagenes) {
                var table=$('#example').DataTable({
                    stateSave:true,
                    bDestroy:true,
                    "language": {
                        "lengthMenu": "_MENU_  registros por página",
                    },
                
                    data:arrayImagenes,
                    columns: [
                        {"width":"16%"},
                        {"width":"16%"},
                        {"width":"16%"},
                        {"width":"16%"},
                        {"width":"16%"},
                    ],
                    "rowCallback":function(row,data) {
                        if(data[3]=="activo") { 
                            $($(row).find("td")[3]).css('color','#FFF');
                            $($(row).find("td")[3]).css('text-align','center');
                            $($(row).find("td")[3]).css('background','#09af01');
                        } else {
                            $($(row).find("td")[3]).css('color','#FFF');
                            $($(row).find("td")[3]).css('text-align','center');
                            $($(row).find("td")[3]).css('background','#961b01');
                        }
                        $($(row).find("td")[3]).css('text-align','center');
                    },
                });
            }
        } 
    });
}

function listado_habitaciones() {

    arrayHabitaciones=[];
    arrayListadoHabitaciones=[];
    $.post($('#url').val()+"hoteles/listado_habitaciones",{id:$('#id').val()},function(data) {
        if(data) { 
            var arrayImagenesL='';
            var resultado=JSON.parse(data);
            arrayListadoHabitaciones=resultado;

            for(i in resultado) {

                var img="<img src='"+$('#url').val()+"public/img/hoteles/"+resultado[i]['nombre_extension']+"' width='120px' height='70px'/>";
                if(resultado[i]['status']=='1') {
                    var action="<a href='javascript:void(0);' onClick='consultar_habitaciones("+resultado[i]['id_habitaciones']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='consultar_habitaciones("+resultado[i]['id_habitaciones']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='inactivar_habitaciones("+resultado[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ban-circle' title='Inactivar'></i></a>";
                } else {
                    var action="<a href='javascript:void(0);' onClick='consultar_habitaciones("+resultado[i]['id_habitaciones']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='consultar_habitaciones("+resultado[i]['id_habitaciones']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='activar_habitaciones("+resultado[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ok' title='Activar'></i></a>";
                }
                
                arrayHabitacionesL=[
                    titulojs(resultado[i]['nombre']),
                    resultado[i]['cantidad_personas'],
                    titulojs(resultado[i]['simbolo'])+' '+resultado[i]['precio_minimo'],
                    titulojs(resultado[i]['simbolo'])+' '+resultado[i]['precio_maximo'],
                    titulojs(resultado[i]['nombre_status']),
                    action
                ];
                arrayHabitaciones.push(arrayHabitacionesL);
            } 

            if(arrayImagenes) {
                var table1=$('#example1').DataTable({
                    stateSave:true,
                    bDestroy:true,
                    "language": {
                        "lengthMenu": "_MENU_  registros por página",
                    },
                
                    data:arrayHabitaciones,
                    columns: [
                        {"width":"20%"},
                        {"width":"20%"},
                        {"width":"20%"},
                        {"width":"20%"},
                        {"width":"20%"},
                        {"width":"20%"},
                    ],
                    "rowCallback":function(row,data) {
                        if(data[4]=="Activo") { 
                            $($(row).find("td")[4]).css('color','#FFF');
                            $($(row).find("td")[4]).css('text-align','center');
                            $($(row).find("td")[4]).css('background','#09af01');
                        } else {
                            $($(row).find("td")[4]).css('color','#FFF');
                            $($(row).find("td")[4]).css('text-align','center');
                            $($(row).find("td")[4]).css('background','#961b01');
                        }
                        $($(row).find("td")[5]).css('text-align','center');
                    },
                });
            }
        } 
    });
}