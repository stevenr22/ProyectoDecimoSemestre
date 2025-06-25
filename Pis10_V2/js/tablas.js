$(document).ready(function() {
    $('.table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "pagingType": "full_numbers",
        "searching": true,
        "lengthChange": false  // Desactiva la opción de mostrar entradas por página
    });
});
