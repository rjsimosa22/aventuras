<script type="text/javascript" src="<?= base_url();?>public/js/perfil.js"></script>
<script type='text/javascript' src='<?= base_url();?>public/js/pace.js'></script> 

<script type="text/javascript">
    
$(function() {
    $('#datepicker').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
    
        $.datepicker.regional['es'] = {
    
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
    
        $.datepicker.setDefaults($.datepicker.regional['es']);
});
</script>