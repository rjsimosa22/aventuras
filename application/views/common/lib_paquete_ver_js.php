<script type='text/javascript' src="<?= base_url();?>public/js/pace.js"></script>
<script type="text/javascript" src="<?= base_url();?>public/js/paquete.js"></script>
<script type='text/javascript' src="<?= base_url();?>public/js/select2.js"></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/demo/demo-datatables.js'></script> 


<script type="text/javascript">
    $("#provincia").select2({data:[{id:"",text:"DEBE SELECCIONAR DEPARTAMENTO"}]});
    $('#provincia').val("").trigger('change.select2');
    
    $("#distrito").select2({data:[{id:"",text:"DEBE SELECCIONAR PROVINCIA"}]});
    $('#distrito').val("").trigger('change.select2');
    
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

    $('.js-example-basic-single').select2();
    
    CKEDITOR.replace('descripcions',{
        width:"100%",
        height:"200px",
        extraPlugins:'colorbutton,colordialog,font',
        removeButtons: '',
        // Rearrange the toolbar slightly.
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            '/',
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'others', groups: [ 'others' ] },
            { name: 'about', groups: [ 'about' ] }
        ],
        extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
    });

    CKEDITOR.replace('servicios',{
        width:"100%",
        height:"200px",
        extraPlugins:'colorbutton,colordialog,font',
        removeButtons: '',
        // Rearrange the toolbar slightly.
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            '/',
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'others', groups: [ 'others' ] },
            { name: 'about', groups: [ 'about' ] }
        ],
        extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
    });
</script>