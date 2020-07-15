$(document).ready(function() { 
    
    $("#form").validate({
        rules:{
            nombre: {
                minlength:3,
                required:true,
            },
            descripcion: {
                minlength:5
            },
        },
        submitHandler: function(form) { 
            if($('#id').val()) {var url=$('#url').val()+'crud/tematicas/editar';} else {var url=$('#url').val()+'crud/tematicas/registrar';}
            form.action=url;
            var mensj="CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
            var confirma=window.confirm(mensj);	
            if(confirma) {
                document.forms.form.submit();
            }
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
    $('.siDiv').hide();
    if(val) {
        if(opc=='editar') {
            $('#btn-botton').show();
            $("input").prop('disabled',false);
            $('.title-botton').text('Editar');
            $("textarea").prop('disabled',false);
            $('.title-formulario').text('Editar Temática');
        } else {
            $('#btn-botton').hide();
            $('.title-botton').text('Editar');
            $("input").prop('disabled',true);
            $("textarea").prop('disabled',true);
            $('.title-formulario').text('Visualización de Temática');
        }

        $.ajax({
            data: {
                'id':val
            },
            type:"POST",
            dataType:"JSON",
            url:url+'crud/tematicas/consultar', 
            success:function(data) {
                if(data) {
                    $('#id').val(data['id']);
                    $('#nombre').val(data['nombre']);
                    $('#descripcion').val(data['descripcion']);
                    $('#descripcion').text(data['descripcion']);

                    //modal
                    $("#myModal").modal();
                } else {
                    $('#id').val('');
                    $('#nombre').val('');
                    $('#descripcion').val('');
                    $('#descripcion').text('');

                    //mensaje de errors
                    alert('Error en el modulo de temáticas');
                }
            }
        });     
    } else {
        $('#id').val('');
        $('#nombre').val('');
        $('#btn-botton').show();
        $('#descripcion').val('');
        $('#descripcion').text('');
        $("input").prop('disabled',false);
        $('.title-botton').text('Registrar');
        $("textarea").prop('disabled',false);
        $('.title-formulario').text('Registrar Temática');

        //modal
        $("#myModal").modal();
    } 
}