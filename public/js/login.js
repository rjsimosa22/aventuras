$(document).ready(function(){
    
    $('#login').bind('click',function(){  
        
        var url=$('#url').val();
	    var url0=$('#url0').val();
	    var url1=$('#url1').val();
        var proxy = 'https://cors-anywhere.herokuapp.com/';
        $.ajax({
            url:url0,
            type:'POST',
            dataType:'json',
            data: { 
                clave:$('#clave').val(),
                username:$('#username').val(), 
            },    
            success:function(data){
                setTimeout (
                    function() {
                        if(data.login=='TRUE') {
                            window.location=url1;
                        } else {
                            $('#message').html(data.msg).fadeIn('normal');
                        }
                    }, 
                2000);
            },
            beforeSend:function() {
                $("#message").css('display','inline','important');
                $("#message").html("<img src="+url+"public/img/loader.gif> Cargando...");
            }
        });
    });
});