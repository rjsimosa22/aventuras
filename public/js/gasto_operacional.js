$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            categoria: {
                required:true
            },
            tip_serv: {
                required:true
            },
            frecibo: {
                required:true
            },
            noms: {
                required:true,
                minlength: 3
            },
            monto: {
                required:true,
                minlength: 2
            },
            monto1: {
                required:true,
                minlength: 2
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