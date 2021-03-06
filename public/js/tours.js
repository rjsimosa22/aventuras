var arrayImagenes=new Array;
var arrayListadoImagenes=new Array;
$(document).ready(function() {
    $("#wizard").validate({
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
            duracion: {
                required:true,
            },
            moneda: {
                required:true
            },
            precio_minimo: {
                required:true
            },
            precio_maximo: {
                required:true
            },
            "tematica[]": "required", 
            descripcion:{ 
                required:function(){CKEDITOR.instances.descripcion.updateElement();}, 
                minlength:5 
            },
            detalle:{ 
                required:function(){CKEDITOR.instances.detalle.updateElement();}, 
                minlength:10 
            },
            recomendacion:{ 
                required:function(){CKEDITOR.instances.recomendacion.updateElement();}, 
                minlength:10 
            },
            imagenes:{
                required:true,
            },
        },
        messages: {
            "departamento": "",
            "provincia": "",
            "distrito": "",
            "tematica[]": "",
        },
        submitHandler:function(form) {        
            var url=$('#url').val();
            form.action=url;	
            var mensj="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma=window.confirm(mensj);	
            if(confirma) {
                document.forms.form.submit();
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
            
            if($('#tematica').val()==null) {
                $('#val_Tematica').show();
                $('#title_Tematica').css('color','#a81515');
            } else {
                $('#val_Tematica').hide();
                $('#title_Tematica').css('color','#527f26');
            }
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        
        success: function(element) {
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    }),
    
    $('#basicwizard').stepy();
    $('#wizard').stepy({finishButton:true,titleClick:true,block:true,validate:true});
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
            $.post($('#url1').val()+"comboDPD/provincia",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    for(var i=0;i<resultado.length;i++) {
                        var id=resultado[i]['id'];
                        var nombre=titulojs(resultado[i]['nombre']);
                        $("#provincia").select2({data:[{id:"",text:"Todos"},{id:id,text:nombre}]});
                        $('#provincia').val("").trigger('change.select2');
                    } 
                } else {
                    $("#provincia").select2({data:[{id:"",text:"Debe seleccionar departamento"}]});
                    $('#provincia').val("").trigger('change.select2');
                }
            });			
        });
   });

    $("#provincia").on('change',function() {
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
            $.post($('#url1').val()+"comboDPD/distrito",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    for(var i=0;i<resultado.length;i++) {
                        var id=resultado[i]['id'];
                        var nombre=titulojs(resultado[i]['nombre']);
                        $("#distrito").select2({data:[{id:"",text:"Todos"},{id:id,text:nombre}]});
                        $('#distrito').val("").trigger('change.select2');
                    } 
                } else {
                    $("#distrito").select2({data:[{id:"",text:"Debe seleccionar departamento"}]});
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

    $("#tematica").on('change',function() {
        if($('#tematica').val()==null) {
            $('#val_Tematica').show();
            $('#title_Tematica').css('color','#a81515');
        } else {
            $('#val_Tematica').hide();
            $('#title_Tematica').css('color','##527f26');
        }
    });
});

function completeUpload(success,fileName,url_imagen,url,id_tours,nombre,accion) {
    
    if(success==true) {
        $('#siDiv').show();
        $('.uploadProcess').hide();
        $('#nombre_imagen').text(fileName);
        $('#fileInput').attr("value",fileName);
        $("#imagePreview").attr("src",url_imagen+'/'+fileName); 

        if(accion=='editar'){
            $('#divSi').text('La imagen');           
            $('#divSi1').text(' '+nombre.toLowerCase()+' ').css("font-weight","bold");           
            $('#divSi2').text('se modificado correctamente.');
        } else {
            $('#divSi').text('La imagen');           
            $('#divSi1').text(' '+nombre.toLowerCase()+' ').css("font-weight","bold");           
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
        alert('There was an error during file upload!');
    }
    return true;
}

function inactivar_imagenes(id) {

    $('#siDiv').hide();
    for(i in arrayListadoImagenes) {
        if(id==arrayListadoImagenes[i]['id']) {
            var nombre=arrayListadoImagenes[i]['nombre'];
        }
    }

    var con=confirm("¿Esta seguro de inactivar este registro : "+nombre.toLowerCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url1').val()+"inactoursimagenes/inactivar_imagenes", 
            success:function(data) {
                $('#siDiv').show();
                $('#divSi').text('La imagen');           
                $('#divSi1').text(' '+nombre.toLowerCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se inactivo correctamente.');           
                alert("Se inactivo el siguiente registro : "+nombre.toLowerCase());
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

    var con=confirm("¿Esta seguro de activar este registro : "+nombre.toLowerCase()+"?");
    if(con) {
        $.ajax({
            data: {
                'id':id
            },
            type:"POST",
            dataType:"JSON",
            url:$('#url1').val()+"acttoursimagenes/activar_imagenes", 
            success:function(data) {
                $('#siDiv').show();
                $('#divSi').text('La imagen');           
                $('#divSi1').text(' '+nombre.toLowerCase()+' ').css("font-weight","bold");           
                $('#divSi2').text('se activo correctamente.');           
                alert("Se activo el siguiente registro : "+nombre.toLowerCase());
                listado_imagenes();
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
                    alert('Error en el modulo de tours');
                }
            }
        }); 
        $('.name_errors').hide();
    }
}

function listado_imagenes() {
    
    arrayImagenes=[];
    arrayListadoImagenes=[];
    $.post($('#url1').val()+"listoursimagenes/listado_imagenes",{id:$('#id').val()},function(data) {
        if(data) { 
            var arrayImagenesL='';
            var resultado=JSON.parse(data);
            arrayListadoImagenes=resultado;
            
            for(i in resultado) {

                var img="<img src='"+$('#url1').val()+"public/img/tours/small/"+resultado[i]['nombre_extension']+"' width='120px' height='70px' title='"+resultado[i]['nombre'].toLowerCase()+"'/>";
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
                        console.log(data[2]);
                        if(data[3]=="activo") { 
                            $($(row).find("td")[3]).css('color','#FFF');
                            $($(row).find("td")[3]).css('text-align','center');
                            $($(row).find("td")[3]).css('background','#09af01');
                        } else {
                            $($(row).find("td")[3]).css('color','#FFF');
                            $($(row).find("td")[3]).css('text-align','center');
                            $($(row).find("td")[3]).css('background','#961b01');
                        }
                        $($(row).find("td")[4]).css('text-align','center');
                    },
                });
            }
        } 
    });
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
            url:$('#url1').val()+'/toursimagenpersonal/imagen_personal', 
            success:function(data) {
                if(data) {
                    if(val > 0) {
                        $('#divAltSEO').hide();
                        $('#FormAltSEO').show();
                        $('#ocultarbtn').hide();
                        $('.btnCargarALT').hide();
                        $('#alt_imagen_2').val('');
                        $("#id_imagen").val(data.id);
                        $("#id_tours").val(data.id_tours);
                        $('#alt_imagen').val(data.alt_seo);
                        $("#nombre_imagen").text(data.nombre);
                        $("#alt_imagen").prop('disabled',true);
                        $("#imagePreview").prop('disabled',true);
                        $("#nombre_imagen_2").val(data.nombre_extension);
                        $('.title-formulario').text('Visualización Imagen');
                        $("#imagePreview").attr("src",$('#url1').val()+'public/img/tours/'+data.nombre_extension);
                    } else {
                        $('#divAltSEO').hide();
                        $('#FormAltSEO').show();
                        $('#ocultarbtn').show();
                        $('.btnCargarALT').show();
                        $('#alt_imagen_2').val('');
                        $("#id_imagen").val(data.id);
                        $("#id_tours").val(data.id_tours);
                        $('#alt_imagen').val(data.alt_seo);
                        $("#nombre_imagen").text(data.nombre);
                        $("#alt_imagen").prop('disabled',false);
                        $('.title-formulario').text('Editar Imagen');
                        $("#nombre_imagen_2").val(data.nombre_extension);
                        $("#imagePreview").attr("src",$('#url1').val()+'public/img/tours/'+data.nombre_extension);
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
        $("#id_tours").val($('#id').val());
        $("#alt_imagen").prop('disabled',false);
        $("#nombre_imagen").text('No Hay Imagen');
        $('.title-formulario').text('Registrar Imagen');
        $("#imagePreview").attr("src",$('#url1').val()+'public/img/not-available.png');
    
        //modal
        $("#myModalimagenes").modal();
    }
    $('#name_errors').hide();
    $('#name_success').hide();
}