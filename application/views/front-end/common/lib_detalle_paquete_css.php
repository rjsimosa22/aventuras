<link href="<?= base_url();?>public/front-end/css/toastr.min.css" rel="stylesheet">
<link  href="<?= base_url();?>public/front-end/css/fotorama.css" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/front-end/css/select2.css'/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?= base_url();?>public/front-end/js/jquery.smooth-scroll.min.js"></script>
<script src="<?= base_url();?>public/front-end/js/waypoints.min.js"></script>
        

<script>
    $(function(){
        $('a.smoothScroll').smoothScroll({
          offset: -80,		  
		  scrollTarget: $(this).val()
	   });
       
       // Waypoints
       $('.display_submenu3').hide();
       $('.post_article').waypoint(  
        function(direction) {
	    if (direction==='down') {            
            var wayID=$(this).attr('id');
            if(wayID=='descripcion' || wayID=='banner') {
                $('.display_submenu3').hide();
            } else {
                $('.display_submenu3').show();
            }
        } else {
            $('.display_submenu3').hide();
			var previous=$(this).prev();
            var wayID=$(previous).attr('id');
            if(wayID=='descripcion' || wayID==undefined) {
                $('.display_submenu3').hide();
            } else {
                $('.display_submenu3').show();
            }
        }
            $('.active').removeClass('active');
            $('#main_nav a[href=#'+wayID+']').addClass('active');
        }, { offset: '40%' });

       /// StickNav  
       var stickyNavTop=$('.nav').offset().top;  
        var stickyNav=function(){  
        var scrollTop=$(window).scrollTop();  
       
        if (scrollTop > stickyNavTop) {   
            $('.nav').addClass('isStuck');  
        } else {  
            $('.nav').removeClass('isStuck');   
        }  
    };       

    stickyNav(); 
       $(window).scroll(function() {
            stickyNav();  
        });  
    });
</script>