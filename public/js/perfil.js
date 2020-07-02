$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            ced: {
                required:true,
                minlength: 9,
                maxlength: 9
            },  
            nom: {
                required:true,
                minlength: 3
            },
            ape: {
                required:true,
                minlength: 3
            },
            fnac: {
                minlength: 1,
            },  
            tcel: {
                minlength: 8,
                maxlength: 8
            },
            dir: {
                minlength: 5
            },
            usu: {
                required:true,
                minlength: 3
            },  
            rol: {
                required:true,
            },
            clav: {
                required:true,
                minlength: 5
            },
            clav1: {
              required:true,
              equalTo: "#clav"
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