$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            ced: {
                required:true,
                minlength: 9,
                maxlength: 12
            },  
            nom: {
                required:true,
                minlength: 3
            },
            ape: {
                required:true,
                minlength: 3
            },
            tcel: {
                minlength: 8,
                maxlength: 9
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