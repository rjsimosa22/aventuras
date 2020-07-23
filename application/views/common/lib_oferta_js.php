<script src="<?= base_url();?>public/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>public/js/oferta.js"></script>
<script type='text/javascript' src="<?= base_url();?>public/js/select2.js"></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-multiselect/js/jquery.multi-select.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/quicksearch/jquery.quicksearch.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-typeahead/typeahead.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-autosize/jquery.autosize-min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-colorpicker/js/bootstrap-colorpicker.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-daterangepicker/daterangepicker.min.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/form-daterangepicker/moment.min.js'></script> 

<script>
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
    
    $('.my-select').selectpicker({
        style: 'btn-default',
    });
    $('#number-multiple').selectpicker('selectAll');
    $("#destino").select2();
    $('#daterangepicker3').daterangepicker({
        "locale": {
            "dateFormat": "dd-mm-yy",
            "separator": " / ",
            "applyLabel": "Aceptar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Dom",
                "Lun",
                "Mar",
                "Mie",
                "Jue",
                "Vie",
                "Sáb"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        }
    });
</script>    
 