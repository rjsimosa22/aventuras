var arrayid=new Array;
var arrayHabitacion1=new Array;
var arrayHabitacion2=new Array;

$(document).ready(function() {

    var table=$('#example').DataTable( {
        data:"",
        stateSave:true,
        bDestroy:true,
        "language":{
            "lengthMenu": "_MENU_  registros por página",
        },
    });

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
            imagenes: {
                required:true
            },
            arrayHabitaciones: {
                required:true
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
                    $("#provincia").select2({data:[{id:"",text:"Debe Seleccionar departamento"}]});
                    $('#provincia').val("").trigger('change.select2');
                }
            });			
        });
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
                    $("#distrito").select2({data:[{id:"",text:"Debe Seleccionar departamento"}]});
                    $('#distrito').val("").trigger('change.select2');
                }
            });			
        });
    });
  
    var arrayHabitacion=new Array;
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
            var arrayidL='';	
            arrayHabitacion2=[];
            var arrayHabitacionL1='';
            var arrayHabitacionL2='';
            
            if(confirma) {
                $('#myModal').modal('hide');
                $('#arrayHabitaciones').val('');

                if(arrayHabitacion1) {
                    for(i in arrayHabitacion1) {
                        if(arrayHabitacion1[i]['id']==$('#habitacion').val()) {
                            let indice=arrayHabitacion1.findIndex(habitacion=>habitacion.id===$('#habitacion').val());
                            if(indice > -1) {
                                arrayHabitacion1.splice(indice,1);
                            }
                        }
                    }
                }

                if($('#id_status').val()=='1') {
                    var nombre_estatus='Activo'; 
                } else {
                    var nombre_estatus='Inactivo';
                }

                arrayHabitacionL1={
                    "id":$('#habitacion').val(),
                    "moneda":$('#moneda').val(),
                    "nombre_estatus":nombre_estatus,
                    "id_status":$('#id_status').val(),
                    "precio_minimo":$('#precio_minimo').val(),
                    "precio_maximo":$('#precio_maximo').val(),
                    "disponibilidad":$('#disponibilidad').val(),
                    "cantidad_persona":$('#cantidad_persona').val(),
                    "cantidad_habitacion":$('#cantidad_habitacion').val(),
                    "servicios_habitacion":$('#servicios_habitacion').val(),
                    "nombre":$('select[name="habitacion"] option:selected').text(),
                    "nombre_moneda":$('select[name="moneda"] option:selected').text()
                };
                arrayHabitacion1.push(arrayHabitacionL1);
                
                if(arrayHabitacion1) {
                    for(i in arrayHabitacion1) {
                        if(arrayHabitacion1[i]['id_status']=='1') {
                            var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='inactivar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ban-circle' title='Inactivar'></i></a>";
                        } else {
                            var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='activar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ok' title='Activar'></i></a>";
                        }
                        arrayHabitacionL2=[
                            titulojs(arrayHabitacion1[i]['nombre']),
                            arrayHabitacion1[i]['nombre_moneda'],
                            arrayHabitacion1[i]['precio_minimo'],
                            arrayHabitacion1[i]['precio_maximo'],
                            arrayHabitacion1[i]['nombre_estatus'],
                            action,
                        ];
                        arrayid.push(arrayHabitacion1[i]['id']);
                        arrayHabitacion2.push(arrayHabitacionL2);  
                    }
                    actualizar_selected_habitacion(arrayid,0,$('#url').val());
                }

                if(arrayHabitacion2) {
                    var table=$('#example').DataTable( {
                        stateSave:true,
                        bDestroy:true,
                        "language": {
                            "lengthMenu": "_MENU_  registros por página",
                        },
                        data:arrayHabitacion2,
                        columns: [
                            {"width":"16%"},
                            {"width":"16%"},
                            {"width":"16%"},
                            {"width":"16%"},
                            {"width":"16%"},
                            {"width":"16%"},
                        ],
                        "rowCallback": function(row,data) {
                            if(data[4]=="Activo") { 
                                $($(row).find("td")[4]).css('color','#FFF');
                                $($(row).find("td")[4]).css('text-align','center');
                                $($(row).find("td")[4]).css('background','#09af01');
                            } else {
                                $($(row).find("td")[4]).css('color','#FFF');
                                $($(row).find("td")[4]).css('text-align','center');
                                $($(row).find("td")[4]).css('background','#961b01');
                            }
                        },
                    });
                }               
            }
            $('#siDiv').show();
            $('#divSi').show();
            $('#arrayHabitaciones').val(JSON.stringify(arrayHabitacion1));
            $('#divSi').text('La habitación');  
            $('#divSi1').text(' '+arrayHabitacion1[i]['nombre'].toUpperCase()+' ').css("font-weight","bold");           
                       
            if($('.title-botton').text()=='Editar') {
                $('#divSi2').text('se modificado correctamente.'); 
            } else {
                $('#divSi2').text('se registro correctamente.'); 
            }
            $('#servicios_habitacion input[type="text"]').val('');
            CKEDITOR.instances.servicios_habitacion.setData('');
        },
        highlight: function(element){
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        success: function(element){
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
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

function inactivar_imagenes(nombre,url,id,url2,id2) {
    var con=confirm("¿Esta seguro de inactivar este registro : "+nombre+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:url, 
            success:function(data) {
                if(data) {
                   alert("Se inactivo el siguiente registro : "+nombre);
                   modificar(url2+'?id='+id2);
                } else {
                    alert("Error al inactivar el registro : "+nombre);
                }
            }
        });
    } else if(!con) {
        return false; 
    }
}

function completeUpload(success,fileName,url_imagen,url,id_tours) {
    if(success==1) {
        $('.uploadProcess').hide();
        $('#nombre_imagen').text(fileName);
        $('#fileInput').attr("value",fileName);
        $("#imagePreview").attr("src",url_imagen+'/'+fileName); 
      
        setTimeout (function(){
            $('.fade').remove();
            $('body').removeClass("modal-open");
            $('body').css('overflow','scroll');
            modificar(url+'/tours/visualizar_imagenes?id='+id_tours);
        },1600);
    }else{
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}

function activar_imagenes(nombre,url,id,url2,id2) {
    var con=confirm("¿Esta seguro de activar este registro : "+nombre+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:url, 
            success:function(data) {
                if(data) {
                    alert("Se activo el siguiente registro : "+nombre);
                    modificar(url2+'?id='+id2);
                } else {
                    alert("Error al activar el registro : "+nombre);
                }
            }
        });
    } else if(!con) {
        return false; 
    }
}

function consultar(id_tours,val,url,url_imagen) {
    if(val) {
        $.ajax({
            data: {
                'id':val
            },
            type:"POST",
            dataType:"JSON",
            url:url, 
            success:function(data) {
                if(data) {
                    $("#id_imagen").val(val);
                    $("#id_tours").val(id_tours);
                    $("#nombre_imagen").text(data.nombre);
                    $("#imagePreview").attr("src",url_imagen+'/'+data.nombre_extension);
                  
                    //modal
                    $("#myModal").modal();
                } else {
                    $("#id_imagen").val('');
                    $("#nombre_imagen").text('');
                    $("#imagePreview").attr("src","");

                    //mensaje de errors
                    alert('Error en el modulo de hoteles');
                }
            }
        }); 
    } 
}

function registrar_habitacion(id,val) {

    $('#siDiv').hide();
    $('#divSi').hide();
    var url=$('#url').val();
    
    if(id) {
        actualizar_selected_habitacion(id,1,url);
        if(val > 0) {
            for(i in arrayHabitacion1) {
                if(arrayHabitacion1[i]['id']==id) {
                    $('.title-botton').hide();
                    $('.title-botton').text('Editar');
                    $('#habitacion').val(id).prop('disabled',true);
                    CKEDITOR.instances['servicios_habitacion'].setReadOnly(true);
                    $('#moneda').val(arrayHabitacion1[i]['moneda']).prop('disabled',true);
                    $('#id_status').val(arrayHabitacion1[i]['id_status']).prop('disabled',true); 
                    $('.title-formulario').text('Visualización Habitación').prop('disabled',true);
                    $('#precio_minimo').val(arrayHabitacion1[i]['precio_minimo']).prop('disabled',true);
                    $('#precio_maximo').val(arrayHabitacion1[i]['precio_maximo']).prop('disabled',true);
                    $('#disponibilidad').val(arrayHabitacion1[i]['disponibilidad']).prop('disabled',true);
                    $('#cantidad_persona').val(arrayHabitacion1[i]['cantidad_persona']).prop('disabled',true);
                    CKEDITOR.instances.servicios_habitacion.setData(arrayHabitacion1[i]['servicios_habitacion']);
                    $('#cantidad_habitacion').val(arrayHabitacion1[i]['cantidad_habitacion']).prop('disabled',true);
                    $('#servicios_habitacion').text(arrayHabitacion1[i]['servicios_habitacion']).prop('disabled',true);
                }
            }
        } else {
            for(i in arrayHabitacion1) {
                if(arrayHabitacion1[i]['id']==id) {
                    $('#habitacion').val(id);
                    $('.title-botton').show();
                    $('.title-botton').text('Editar');
                    $('input').prop('disabled',false);
                    $('select').prop('disabled',false);
                    $('textarea').prop('disabled',false);
                    $('#moneda').val(arrayHabitacion1[i]['moneda']);
                    $('.title-formulario').text('Editar Habitación');
                    $('#id_status').val(arrayHabitacion1[i]['id_status']);             
                    $('#precio_minimo').val(arrayHabitacion1[i]['precio_minimo']);
                    $('#precio_maximo').val(arrayHabitacion1[i]['precio_maximo']);
                    CKEDITOR.instances['servicios_habitacion'].setReadOnly(false);
                    $('#disponibilidad').val(arrayHabitacion1[i]['disponibilidad']);
                    $('#cantidad_persona').val(arrayHabitacion1[i]['cantidad_persona']);
                    $('#cantidad_habitacion').val(arrayHabitacion1[i]['cantidad_habitacion']);
                    $('#servicios_habitacion').text(arrayHabitacion1[i]['servicios_habitacion']);
                    CKEDITOR.instances.servicios_habitacion.setData(arrayHabitacion1[i]['servicios_habitacion']);
                }
            }
        }
        $("#myModal").modal();
    } else {
        if(arrayHabitacion1.length > 0) {
            actualizar_selected_habitacion(arrayid,0,url);
        }
        $('#moneda').val('');
        $('#id_status').val('1');             
        $('#habitacion').val('');
        $('.title-botton').show();
        $('#precio_minimo').val('');
        $('#precio_maximo').val(''); 
        $('#disponibilidad').val('SI');
        $('#cantidad_persona').val('1');
        $('input').prop('disabled',false);
        $('select').prop('disabled',false);
        $('#cantidad_habitacion').val('1');
        $('#servicios_habitacion').text('');
        $('.title-botton').text('Registrar');
        $('textarea').prop('disabled',false);
        $('.title-formulario').text('Registrar Habitación');
        CKEDITOR.instances.servicios_habitacion.setData('');
        CKEDITOR.instances['servicios_habitacion'].setReadOnly(false);
        
        $("#myModal").modal();
    }
}

function inactivar_habitacion(id) {
    
    $('#siDiv').hide();
    $('#divSi').hide();
    $('#arrayHabitaciones').val('');

    arrayHabitacion2=[];
    if(id) {
        for(i in arrayHabitacion1) {
            if(id==arrayHabitacion1[i]['id']) {
                var nombre=arrayHabitacion1[i]['nombre'];
            }
        }
        
        var con=confirm("¿Esta seguro de inactivar este registro : "+nombre+"?");
        if(con) {
            if(arrayHabitacion1) {
                for(i in arrayHabitacion1) {
                    if(id==arrayHabitacion1[i]['id']) {
                        arrayHabitacionL1={
                            "id_status":'0',
                            "nombre_estatus":'INACTIVO',
                            "id":arrayHabitacion1[i]['id'],
                            "moneda":arrayHabitacion1[i]['moneda'],
                            "nombre":arrayHabitacion1[i]['nombre'],
                            "nombre_moneda":arrayHabitacion1[i]['nombre_moneda'],
                            "precio_minimo":arrayHabitacion1[i]['precio_minimo'],
                            "precio_maximo":arrayHabitacion1[i]['precio_maximo'],
                            "disponibilidad":arrayHabitacion1[i]['disponibilidad'],
                            "cantidad_persona":arrayHabitacion1[i]['cantidad_persona'],
                            "cantidad_habitacion":arrayHabitacion1[i]['cantidad_habitacion'],
                            "servicios_habitacion":arrayHabitacion1[i]['servicios_habitacion'],
                        };
                        arrayHabitacion1.push(arrayHabitacionL1);

                        let indice=arrayHabitacion1.findIndex(habitaciones=>habitaciones.id==id && (habitaciones.id_status==0 || habitaciones.id_status==1));
                        if(indice > -1) {
                            arrayHabitacion1.splice(indice,1);
                        }
                    }

                    if(arrayHabitacion1[i]['id_status']=='1') {
                        var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='inactivar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ban-circle' title='Inactivar'></i></a>";
                    } else {
                        var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='activar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ok' title='Activar'></i></a>";
                    }
                     
                    arrayHabitacionL2=[
                        titulojs(arrayHabitacion1[i]['nombre']),
                        arrayHabitacion1[i]['nombre_moneda'],
                        arrayHabitacion1[i]['precio_minimo'],
                        arrayHabitacion1[i]['precio_maximo'],
                        arrayHabitacion1[i]['nombre_estatus'],
                        action,
                    ];
                    arrayHabitacion2.push(arrayHabitacionL2); 
                    
                    if(arrayHabitacion2) {
                        var table=$('#example').DataTable( {
                            stateSave:true,
                            bDestroy:true,
                            "language": {
                                "lengthMenu": "_MENU_  registros por página",
                            },
                            data:arrayHabitacion2,
                            columns: [
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                            ],
                            "rowCallback": function(row,data) {
                                if(data[4]=="ACTIVO") { 
                                    $($(row).find("td")[4]).css('color','#FFF');
                                    $($(row).find("td")[4]).css('text-align','center');
                                    $($(row).find("td")[4]).css('background','#09af01');
                                } else {
                                    $($(row).find("td")[4]).css('color','#FFF');
                                    $($(row).find("td")[4]).css('text-align','center');
                                    $($(row).find("td")[4]).css('background','#961b01');
                                }
                            },
                        });
                    }
                }
                $('#siDiv').show();
                $('#divSi').show();
                $('#arrayHabitaciones').val(JSON.stringify(arrayHabitacion1));
                $('#divSi').text('La habitación');  
                $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se inactivo correctamente.'); 
                alert("Se inactivo el siguiente registro : "+nombre);
            } else {
                alert("Error al inactivar el registro : "+nombre);
            }   
        } else if(!con) {
            return false; 
        }
    }    
}

function activar_habitacion(id) {
    
    $('#siDiv').hide();
    $('#divSi').hide();
    $('#arrayHabitaciones').val('');
    arrayHabitacion2=[];

    if(id) {
        for(i in arrayHabitacion1) {
            if(id==arrayHabitacion1[i]['id']) {
                var nombre=arrayHabitacion1[i]['nombre'];
            }
        }
        
        var con=confirm("¿Esta seguro de activar este registro : "+nombre+"?");
        if(con) {
            if(arrayHabitacion1) {
                for(i in arrayHabitacion1) {
                    if(id==arrayHabitacion1[i]['id']) {
                        arrayHabitacionL1={
                            "id_status":'1',
                            "nombre_estatus":'ACTIVO',
                            "id":arrayHabitacion1[i]['id'],
                            "moneda":arrayHabitacion1[i]['moneda'],
                            "nombre":arrayHabitacion1[i]['nombre'],
                            "nombre_moneda":arrayHabitacion1[i]['nombre_moneda'],
                            "precio_minimo":arrayHabitacion1[i]['precio_minimo'],
                            "precio_maximo":arrayHabitacion1[i]['precio_maximo'],
                            "disponibilidad":arrayHabitacion1[i]['disponibilidad'],
                            "cantidad_persona":arrayHabitacion1[i]['cantidad_persona'],
                            "cantidad_habitacion":arrayHabitacion1[i]['cantidad_habitacion'],
                            "servicios_habitacion":arrayHabitacion1[i]['servicios_habitacion'],
                        };
                        arrayHabitacion1.push(arrayHabitacionL1);

                        let indice=arrayHabitacion1.findIndex(habitacionesact=>habitacionesact.id==id && (habitacionesact.id_status==0 || habitacionesact.id_status==1));
                        if(indice > -1) {
                            arrayHabitacion1.splice(indice,1);
                        }
                    }

                    if(arrayHabitacion1[i]['id_status']=='1') {
                        var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='inactivar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ban-circle' title='Inactivar'></i></a>";
                    } else {
                        var action="<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",1)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-eye-open' title='Visualizar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='registrar_habitacion("+arrayHabitacion1[i]['id']+",0)' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-edit' title='Editar'></i></a>&nbsp;<a href='javascript:void(0);' onClick='activar_habitacion("+arrayHabitacion1[i]['id']+")' style='color:#000;text-decoration:none;'><i style='font-size: 20px;' class='icon-ok' title='Activar'></i></a>";
                    }
                     
                    arrayHabitacionL2=[
                        titulojs(arrayHabitacion1[i]['nombre']),
                        arrayHabitacion1[i]['nombre_moneda'],
                        arrayHabitacion1[i]['precio_minimo'],
                        arrayHabitacion1[i]['precio_maximo'],
                        arrayHabitacion1[i]['nombre_estatus'],
                        action,
                    ];
                    arrayHabitacion2.push(arrayHabitacionL2); 
                    
                    if(arrayHabitacion2) {
                        var table=$('#example').DataTable( {
                            stateSave:true,
                            bDestroy:true,
                            "language": {
                                "lengthMenu": "_MENU_  registros por página",
                            },
                            data:arrayHabitacion2,
                            columns: [
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                                {"width":"16%"},
                            ],
                            "rowCallback": function(row,data) {
                                if(data[4]=="ACTIVO") { 
                                    $($(row).find("td")[4]).css('color','#FFF');
                                    $($(row).find("td")[4]).css('text-align','center');
                                    $($(row).find("td")[4]).css('background','#09af01');
                                } else {
                                    $($(row).find("td")[4]).css('color','#FFF');
                                    $($(row).find("td")[4]).css('text-align','center');
                                    $($(row).find("td")[4]).css('background','#961b01');
                                }
                            },
                        });
                    }
                }
                $('#siDiv').show();
                $('#divSi').show();
                $('#arrayHabitaciones').val(JSON.stringify(arrayHabitacion1));
                $('#divSi').text('La habitación');  
                $('#divSi1').text(' '+nombre.toUpperCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se activo correctamente.'); 
                alert("Se activo el siguiente registro : "+nombre);
            } else {
                alert("Error al activar el registro : "+nombre);
            }   
        } else if(!con) {
            return false; 
        }
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
                option.text=titulojs(resultado[i]['nombre']);
                select.add(option);
            } 
        } else {
            $('#habitacion').val('');
            $('#habitacion').empty();
            var select=document.getElementsByName('habitacion')[0];

            var option=document.createElement("option");
            option.value='';
            option.text='NO HAY SELECCIÓN';
            select.add(option);
        } 
    });			
}