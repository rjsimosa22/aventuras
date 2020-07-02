$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            nom: {
                required:true,
                minlength: 3
            },
            cant: {
                required:true
            },
            desc: {
                minlength: 5
            },
            cantcarga: {
                required:true
            },
            cantdesc: {
                required:true
            }
        },
        
        submitHandler: function(form){
            
            var url = $('#url').val();
            
            form.action = url;	
            var mensj =" CONFIRMA QUE LOS DATOS INGRESADO SON CORRECTOS?";
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