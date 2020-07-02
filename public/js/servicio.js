$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            tip_ser:{
                required:true
            },
            nom: {
                required:true,
                minlength: 3
            },
            mtotal: {
                minlength: 1
            },
            cmes: {
                minlength: 1
            },
            pri_afil: {
                minlength: 1
            },
            porc: {
                minlength: 1
            },
            cantcuota: {
                minlength: 1
            },
            duracion: {
                minlength: 1
            },
            comens_total_vend: {
                minlength: 1
            },
            comens_mes_com: {
                minlength: 1
            },
            comens_mes_vend: {
                minlength: 1
            },
            comens_mes_psico: {
                minlength: 1
            }
        },

        submitHandler: function(form){
            
            var url = $('#url').val();
            
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