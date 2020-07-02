$(document).ready(function() {
    
    $("#form").validate({
    
        rules:{
            
            ident: {
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
            tpago: {
                required:true
            },
            lvendedor: {
                required:true
            },
            fecha: {
                required:true
            },
            mtotal: {
                required:true
            },
            mapagar: {
                required:true
            },
            mapagar1: {
                required:true
            },
            oamontura: {
                required:false
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
    }),
    
    $('#basicwizard').stepy();
    $('#wizard').stepy({finishButton: true, titleClick: true, block: true, validate: true});
    $('.stepy-navigator').wrapInner('<div class="pull-right"></div>');
});


function buscarcliente() {
    
    var id=$("#ident").val();
    var url=$('#url1').val();
    
    if(id) {

        $.ajax ( {
            data: { "id" : id, "personal": "si" },
            type: "POST",
            crossDomain: true,
            dataType: "json",
            url: url
        } )

        .done( function( data, textStatus, jqXHR ) {

            if( console && console.log ) {

                console.log("La solicitud cliente se ha completado correctamente.");
                resultado = data.row;
                
                if(resultado['acceso']===true) {
                    
                    if(resultado['nom']){$('#nom').val(resultado['nom']);}
                    if(resultado['ape']){$('#ape').val(resultado['ape']);}
                    if(resultado['tcel']!=='0'){$('#tcel').val(resultado['tcel']);}
                    if(resultado['tfij']!=='0'){$('#tfij').val(resultado['tfij']);}
                    if(resultado['ident']){$('#ident').val(resultado['ident']);}
                    if(resultado['fnac']){$('#datepicker').val(resultado['fnac']);}
                    if(resultado['descpcliente']){$('#descpcliente').val(resultado['descpcliente']);}
                }
            }
        } )
        
        .fail( function( jqXHR, textStatus, errorThrown ) {

            if( console && console.log ) {

                console.log( "La solicitud cliente a fallado: " +  textStatus);
            }
        } );
    }
}
