<script type="text/javascript" src="<?= base_url();?>public/js/tours.js"></script>
<script type='text/javascript' src="<?= base_url();?>public/js/pace.js"></script>
<script type='text/javascript' src="<?= base_url();?>public/js/select2.js"></script>
<script type='text/javascript' src="<?= base_url();?>public/plugins/dropzone/dropzone.min.js"></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?= base_url();?>public/demo/demo-datatables.js'></script> 

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

    $('#example2').DataTable({
        stateSave:true,
        bDestroy:true,
        "language":{
            "lengthMenu": "_MENU_  registros por página",
        },
    });
    
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "SELECCIONAR"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    CKEDITOR.replace('descripcion',{
        width: "100%",
        height: "200px",
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
    
    CKEDITOR.replace('descripcion_posic',{
        width: "100%",
        height: "200px",
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

    CKEDITOR.replace('detalle',{
        width: "100%",
        height: "200px",
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

    CKEDITOR.replace('recomendacion',{
        width: "100%",
        height: "200px",
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