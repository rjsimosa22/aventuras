<script type='text/javascript' src='<?= base_url();?>public/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/js/bootstrap.min.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/js/enquire.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/js/pace.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/js/cssrefresh.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/js/jquery.touchSwipe.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/codeprettifier/prettify.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/plugins/easypiechart/jquery.easypiechart.min.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-toggle/toggle.min.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/plugins/fullcalendar/fullcalendar.min.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-validation/jquery.validate.min.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/demo/demo-calendar.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/demo/demo-datatables.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-stepy/jquery.stepy.js'></script> 
<!--script type='text/javascript' src='<?= base_url();?>public/demo/demo-formwizard.js'></script--> 
<script type='text/javascript' src='<?= base_url();?>public/js/placeholdr.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/js/application.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/demo/demo.js'></script> 
<script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>

<script type="text/javascript">
    $(".precio").on({
        "focus": function(event) {
        $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
        }
    });

    function visualizar(ruta) {
        $('#page-content').load(ruta);
    }

    function modificar(ruta) {
        $('#page-content').load(ruta);
    }

    function inactivar(nombre,ruta) {
        $('.siDiv').hide();
        var con=confirm("¿Esta seguro de inactivar este registro : "+nombre.toUpperCase()+"?");
        if(con) {
            alert("Se inactivo el siguiente registro : "+nombre.toUpperCase());
            window.location=ruta;
            return true;
        } else if(!con) {
            return false; 
        }
    }

    function activar(nombre,ruta) {
        $('.siDiv').hide();
        var con=confirm("¿Esta seguro de activar este registro : "+nombre.toUpperCase()+"?");
        if(con) {
            alert("Se activo el siguiente registro : "+nombre.toUpperCase());
            window.location=ruta;
            return true;
        } else if(!con) {
            return false; 
        }
    }

    function validaSoloNumeros(id) {
        if(xGetElementById(id).value.match(/[^0-9\ ]/)){
            xGetElementById(id).value=xGetElementById(id).value.replace(/[^0-9\ ]/gi,"")
        }
    }

    function soloNumeros(e){    
        var key=window.Event ? e.which : e.keyCode;
        return (key >= 0 && key <= 57);
    }

    function soloLetras(e){
        key=e.keyCode || e.which;
        tecla=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-39-46";
        tecla_especial=false
        
        for(var i in especiales){
            if(key==especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            return false;
        }
    } 
</script>