$(document).ready(function() { 
    
    $("#form").validate({
        rules:{
            nombre: {
                minlength:3,
                required:true,
            },
            simbolo: {
                minlength:1,
                required:true,
            },
            cambio: {
                minlength:3,
                required:true,
            },
            descripcion: {
                minlength:5
            },
        },
        submitHandler: function(form) { 
            if($('#id').val()) {var url=$('#url').val()+'crud/monedas/editar';} else {var url=$('#url').val()+'crud/monedas/registrar';}
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
                    $('#nombre').val(data['nombre'].toUpperCase());
                    $('#simbolo').val(data['simbolo'].toUpperCase());
                    $('#descripcion').val(data['descripcion'].toUpperCase());
                    $('#descripcion').text(data['descripcion'].toUpperCase());

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
        $('#nombre').val('');
        $('#cambio').val('');
        $('#simbolo').val('');
        $('#btn-botton').show();
        $('#descripcion').val('');
        $('#descripcion').text('');
        $("input").prop('disabled',false);
        $('.title-botton').text('Registrar');
        $("textarea").prop('disabled',false);
        $('.title-formulario').text('Registrar Moneda');

        //modal
        $("#myModal").modal();
    } 
}