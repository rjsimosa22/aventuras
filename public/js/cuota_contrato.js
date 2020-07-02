$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            nrecibo: {
                required:true,
                minlength: 2
            },
            nreferencia: {
                minlength: 2
            },
            cadicional: {
                minlength: 4
            },
            fpago: {
                required:true
            },
            vendedor: {
                required:true
            },
            observ: {
                minlength: 5
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