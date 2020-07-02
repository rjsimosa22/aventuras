$(document).ready(function() {
    $("#form").validate({
        rules:{
            dni: {
                required:true,
                minlength: 8,
                maxlength: 12
            },  
            nombre: {
                required:true,
                minlength: 3
            },
            apellido: {
                required:true,
                minlength: 3
            },
            telefono: {
                minlength: 0,
                maxlength: 9
            },
            rol: {
                required:true
            },
            clave1: {
                minlength: 5
            },
            clave2: {
              equalTo: "#clave1"
            }
        },
        submitHandler: function(form){
            if($('.title-botton').text()=='Registrar') {
                var url=$('#url').val()+'usuario/registrar';
            } else {
                var url=$('#url').val()+'usuario/editar';
            }

            form.action = url;	
            var mensj ="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma = window.confirm(mensj);	
            if (confirma) {document.forms.form.submit();}
        },
        highlight: function(element){  
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        success: function(element){  
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    });
});

function consultar(val,opc,url) {
    $('.alert').hide();
    
    if(val) {
        if(opc=='editar') {
            $(".idclave1").show();
            $(".idclave2").show();
            $('#btn-botton').show();
            $("#dni").prop('readonly',true);
            $('.title-botton').text('Editar');
            $("input").prop('disabled',false);
            $("select").prop('disabled',false);
            $('.title-formulario').text('Editar Usuario');
        } else {
            $(".idclave1").hide();
            $(".idclave2").hide();
            $('#btn-botton').hide();
            $('.title-botton').text('Editar');
            $("input").prop('disabled',true);
            $("select").prop('disabled',true);
            $("textarea").prop('disabled',true);
            $('.title-formulario').text('Visualización de Usuario');
        }

        $.ajax({
            data: {
                'id':val
            },
            type:"POST",
            dataType:"JSON",
            url:url+'usuario/consultar', 
            success:function(data) {
                if(data) {
                    $('#rol').val(data['rol']);
                    $('#dni').val(data['usuario_id']);
                    $('#telefono').val(data['celular']);
                    $('#clave1').val('').prop('required',false);
                    $('#clave2').val('').prop('required',false);
                    $('#nombre').val(data['nombre'].toUpperCase());
                    $('#apellido').val(data['apellido'].toUpperCase());
                    
                    //modal
                    $("#myModal").modal();
                } else {
                    $('#rol').val('');
                    $('#dni').val('');
                    $('#nombre').val('');
                    $('#telefono').val('');
                    $('#apellido').val('');
                    $('#clave1').val('').prop('required',true);
                    $('#clave2').val('').prop('required',true);

                    //mensaje de errors
                    alert('Error en el modulo de monedas');
                }
            }
        });     
    } else {
        $('#rol').val('');
        $('#dni').val('');
        $('#nombre').val('');
        $(".idclave1").show();
        $(".idclave2").show();
        $('#apellido').val('');
        $('#telefono').val('');
        $('#btn-botton').show();
        $("#dni").prop('readonly',false);
        $("input").prop('disabled',false);
        $("select").prop('disabled',false);
        $('.title-botton').text('Registrar');
        $('#clave1').val('').prop('required',true);
        $('#clave2').val('').prop('required',true);
        $('.title-formulario').text('Registrar Usuario');

        //modal
        $("#myModal").modal();
    } 
}