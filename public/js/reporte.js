$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            finicio: {
                required:true
            },  
            ffin: {
                required:true
            },
            reporte: {
                required:true
            }
        },

        submitHandler: function(form){
            
            var url = $('#url').val();
            
            form.action = url;	
            document.forms.form.submit();
        },
        
        highlight: function(element){
            
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        
        success: function(element){
            
            $(element).parent().removeClass('has-error').addClass('has-success');
        }
    });
});