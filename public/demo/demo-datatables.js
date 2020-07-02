// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(function() {
    $('.datatables').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ registros por página",
            "sSearch": ""
        }
    });
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Buscar...');
    $('.dataTables_length select').addClass('form-control');});