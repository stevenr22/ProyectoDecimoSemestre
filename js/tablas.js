$(document).ready( function () {
    $('#miTabla').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });
});

$(document).ready( function () {
    $('#miTabla2').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });
});



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});