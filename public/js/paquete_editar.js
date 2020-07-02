var contante=10;
var arrayImagenes=new Array;
var arrayToursSel=new Array;
var arrayHotelesSel=new Array;
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
            "departamento":"required",  
            "provincia":"required", 
            "distrito":"required", 
            cantidad_dia: {
                required:true,
            },
            tipo_descuento: {
                required:true
            },
            monto_descuento: {
                required:true
            },
            descripcions:{ 
                required:function(){CKEDITOR.instances.descripcions.updateElement();}, 
                minlength:5 
            },
            servicios:{ 
                required:function(){CKEDITOR.instances.servicios.updateElement();}, 
                minlength:5 
            },
            "tours_basico[]":"required",
            "tours_exclusivo[]":"required",
            "tours_recomendado[]":"required",
            "hoteles_seleccionado[]":"required",
        },
        messages: {
            "departamento":"",
            "provincia":"",
            "distrito":"",
            "tours_basico[]":"",
            "tours_exclusivo[]":"",
            "tours_recomendado[]":"",
            "hoteles_seleccionado[]":"",
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

            if($('.tours_basico').val()=='') {
                $('#val_basico_0').show();
                $('#title_basico').css('color','#a81515');
            } else {
                $('#val_basico_0').hide();
                $('#title_basico').css('color','#527f26');
            }

            if($('.tours_exclusivo').val()=='') {
                $('#val_exclusivo_0').show();
                $('#title_exclusivo').css('color','#a81515');
            } else {
                $('#val_exclusivo_0').hide();
                $('#title_exclusivo').css('color','#527f26');
            }

            if($('.tours_recomendado').val()=='') {
                $('#val_recomendado_0').show();
                $('#title_recomendado').css('color','#a81515');
            } else {
                $('#val_recomendado_0').hide();
                $('#title_recomendado').css('color','#527f26');
            }

            if($('.hoteles_seleccionado').val()=='') {
                $('#val_hotel_0').show();
                $('#title_hotel').css('color','#a81515');
            } else {
                $('#val_hotel_0').hide();
                $('#title_hotel').css('color','#527f26');
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

    $(".tours_basico").on('change',function() {
        arrayToursSel=[];
        for(var i=0;i<contante;i++) {
            if(!$('#tours_basico_'+i).val()) {
                $('#tours_basico_'+i).empty();
            } else {
                arrayToursSel.push($('#tours_basico_'+i).val());
                if($('#cantidad_dia').val()==arrayToursSel.length) {
                    $('#val_basico_'+i).hide();
                    $('#title_basico').css('color','#527f26');
                } else {
                    $('#val_basico_'+i).hide();
                    $('#val_basico_'+(i+1)).show();
                    $('#title_basico').css('color','#a81515');
                }
            }
        }
        
        $.post($('#url1').val()+"tourslitado/listado_tours",{status:'1',id:arrayToursSel},function(data){
            if(data) {
                var resultado=JSON.parse(data);
                
                if(resultado) {
                    for(var i=0;i<contante;i++) {
                        for(var e=0;e<resultado.length;e++) {
                            if(!$('#tours_basico_'+i).val()) {
                                var id=resultado[e]['id'];
                                var nombre=resultado[e]['nombre'].toUpperCase();
                                $('#tours_basico_'+i).select2({data:[{id:'',text:'SELECCIONAR'},{id:id,text:nombre}]});
                                $('#tours_basico_'+i).val('').trigger('change.select2');
                            }    
                        }
                    } 
                } else {
                    for(var i=0;i<contante;i++) {
                        if(!$('#tours_basico_'+i).val()) {
                            $('#tours_basico_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                            $('#tours_basico_'+i).val('').trigger('change.select2');
                        }    
                    }
                }    
            } else {
                for(var i=0;i<contante;i++) {
                    if(!$('#tours_basico_'+i).val()) {
                        $('#tours_basico_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                        $('#tours_basico_'+i).val('').trigger('change.select2');
                    }    
                }
            }
        });		
    });
    
    $(".tours_exclusivo").on('change',function() {
        arrayToursSel=[];
        for(var i=0;i<contante;i++) {
            if(!$('#tours_exclusivo_'+i).val()) {
                $('#tours_exclusivo_'+i).empty();
            } else {
                arrayToursSel.push($('#tours_exclusivo_'+i).val());
                if($('#cantidad_dia').val()==arrayToursSel.length) {
                    $('#val_exclusivo_'+i).hide();
                    $('#title_exclusivo').css('color','#527f26');
                } else {
                    $('#val_exclusivo_'+i).hide();
                    $('#val_exclusivo_'+(i+1)).show();
                    $('#title_exclusivo').css('color','#a81515');
                }
            }
        }
        
        $.post($('#url1').val()+"tourslitado/listado_tours",{status:'1',id:arrayToursSel},function(data){
            if(data) {
                var resultado=JSON.parse(data);
                
                if(resultado) {
                    for(var i=0;i<contante;i++) {
                        for(var e=0;e<resultado.length;e++) {
                            if(!$('#tours_exclusivo_'+i).val()) {
                                var id=resultado[e]['id'];
                                var nombre=resultado[e]['nombre'].toUpperCase();
                                $('#tours_exclusivo_'+i).select2({data:[{id:'',text:'SELECCIONAR'},{id:id,text:nombre}]});
                                $('#tours_exclusivo_'+i).val('').trigger('change.select2');
                            }    
                        }
                    } 
                } else {
                    for(var i=0;i<contante;i++) {
                        if(!$('#tours_exclusivo_'+i).val()) {
                            $('#tours_exclusivo_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                            $('#tours_exclusivo_'+i).val('').trigger('change.select2');
                        }    
                    }
                }    
            } else {
                for(var i=0;i<contante;i++) {
                    if(!$('#tours_exclusivo_'+i).val()) {
                        $('#tours_exclusivo_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                        $('#tours_exclusivo_'+i).val('').trigger('change.select2');
                    }    
                }
            }
        });		
    });

    $(".tours_recomendado").on('change',function() {
        arrayToursSel=[];
        for(var i=0;i<contante;i++) {
            if(!$('#tours_recomendado_'+i).val()) {
                $('#tours_recomendado_'+i).empty();
            } else {
                arrayToursSel.push($('#tours_recomendado_'+i).val());
                if($('#cantidad_dia').val()==arrayToursSel.length) {
                    $('#val_recomendado_'+i).hide();
                    $('#title_recomendado').css('color','#527f26');
                } else {
                    $('#val_recomendado_'+i).hide();
                    $('#val_recomendado_'+(i+1)).show();
                    $('#title_recomendado').css('color','#a81515');
                }
            }
        }
        
        $.post($('#url1').val()+"tourslitado/listado_tours",{status:'1',id:arrayToursSel},function(data){
            if(data) {
                var resultado=JSON.parse(data);
                
                if(resultado) {
                    for(var i=0;i<contante;i++) {
                        for(var e=0;e<resultado.length;e++) {
                            if(!$('#tours_recomendado_'+i).val()) {
                                var id=resultado[e]['id'];
                                var nombre=resultado[e]['nombre'].toUpperCase();
                                $('#tours_recomendado_'+i).select2({data:[{id:'',text:'SELECCIONAR'},{id:id,text:nombre}]});
                                $('#tours_recomendado_'+i).val('').trigger('change.select2');
                            }    
                        }
                    } 
                } else {
                    for(var i=0;i<contante;i++) {
                        if(!$('#tours_recomendado_'+i).val()) {
                            $('#tours_recomendado_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                            $('#tours_recomendado_'+i).val('').trigger('change.select2');
                        }    
                    }
                }    
            } else {
                for(var i=0;i<contante;i++) {
                    if(!$('#tours_recomendado_'+i).val()) {
                        $('#tours_recomendado_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                        $('#tours_recomendado_'+i).val('').trigger('change.select2');
                    }    
                }
            }
        });		
    });

    $(".hoteles_seleccionado").on('change',function() {
        arrayHotelesSel=[];
        for(var i=0;i<contante;i++) {
            if(!$('#hoteles_seleccionado_'+i).val()) {
                $('#hoteles_seleccionado_'+i).empty();
            } else {
                arrayHotelesSel.push($('#hoteles_seleccionado_'+i).val());
                if(arrayHotelesSel.length>0) {
                    if($('#hoteles_seleccionado_0').val()==null) {
                        $('#val_hotel_0').show();
                        $('#title_hotel').css('color','#a81515');
                    } else {
                        $('#val_hotel_0').hide();
                        $('#title_hotel').css('color','#527f26');
                    }
                } else {
                    $('#val_hotel_0').show();
                    $('#title_hotel').css('color','#a81515');
                }
            }
        }
        
        $.post($('#url1').val()+"hoteles/listado_hoteles",{status:'1',id:arrayHotelesSel},function(data){
            if(data) {
                var resultado=JSON.parse(data);
                
                if(resultado) {
                    for(var i=0;i<contante;i++) {
                        for(var e=0;e<resultado.length;e++) {
                            if(!$('#hoteles_seleccionado_'+i).val()) {
                                var id=resultado[e]['id'];
                                var nombre=resultado[e]['nombre'].toUpperCase();
                                $('#hoteles_seleccionado_'+i).select2({data:[{id:'',text:'SELECCIONAR'},{id:id,text:nombre}]});
                                $('#hoteles_seleccionado_'+i).val('').trigger('change.select2');
                            }    
                        }
                    } 
                } else {
                    for(var i=0;i<contante;i++) {
                        if(!$('#hoteles_seleccionado_'+i).val()) {
                            $('#hoteles_seleccionado_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                            $('#hoteles_seleccionado_'+i).val('').trigger('change.select2');
                        }    
                    }
                }    
            } else {
                for(var i=0;i<contante;i++) {
                    if(!$('#hoteles_seleccionado_'+i).val()) {
                        $('#hoteles_seleccionado_'+i).select2({data:[{id:'',text:"NO HAY REGISTRO DISPONIBLE"}]});
                        $('#hoteles_seleccionado_'+i).val('').trigger('change.select2');
                    }    
                }
            }
        });		
    });

    $("#departamento").on('change',function() {
        $('#provincia').empty();        
        if($('#departamento').val()=='') {
            $('#val_Depart').show();
            $('#title_Depart').css('color','#a81515');
        } else {
            $('#val_Depart').hide();
            $('#title_Depart').css('color','##527f26');
        }

        $("#departamento option:selected").each(function () {
            id=$(this).val();
            $.post($('#url1').val()+"comboDPD/provincia",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    for(var i=0;i<resultado.length;i++) {
                        var id=resultado[i]['id'];
                        var nombre=resultado[i]['nombre'].toUpperCase();
                        $("#provincia").select2({data:[{id:"",text:"TODOS"},{id:id,text:nombre}]});
                        $('#provincia').val("").trigger('change.select2');
                    } 
                } else {
                    $("#provincia").select2({data:[{id:"",text:"DEBE SELECCIONAR DEPARTAMENTO"}]});
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
            $('#title_Prov').css('color','##527f26');
        }

        $("#provincia option:selected").each(function () {
            id=$(this).val();
            $.post($('#url1').val()+"comboDPD/distrito",{id:id},function(data){
                if(data) {
                    var resultado=JSON.parse(data);
                    for(var i=0;i<resultado.length;i++) {
                        var id=resultado[i]['id'];
                        var nombre=resultado[i]['nombre'].toUpperCase();
                        $("#distrito").select2({data:[{id:"",text:"TODOS"},{id:id,text:nombre}]});
                        $('#distrito').val("").trigger('change.select2');
                    } 
                } else {
                    $("#distrito").select2({data:[{id:"",text:"DEBE SELECCIONAR DEPARTAMENTO"}]});
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
            $('#title_Dist').css('color','##527f26');
        }
    });
});

function cantidad_dias() {
    cantidad=$('#cantidad_dia').val();
    if(cantidad) {
        for(var i=0;i<contante;i++) {
            $('.tr_'+i).prop('disabled',true).hide();
            $('#tours_basico_'+i).prop('disabled',true);
            $('#tours_exclusivo_'+i).prop('disabled',true);
            $('#tours_recomendado_'+i).prop('disabled',true);
        }  
        for(var i=0;i<cantidad;i++) {
            $('.tr_'+i).prop('disabled',true).show();
            $('#tours_basico_'+i).prop('disabled',false);
            $('#tours_exclusivo_'+i).prop('disabled',false);
            $('#tours_recomendado_'+i).prop('disabled',false);
        }
    }
}
