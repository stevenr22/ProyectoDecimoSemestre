$(document).ready(function () {
    $('.table').DataTable({
        responsive: true,
        autoWidth: false,
        pagingType: "full_numbers",
        lengthChange: false,    // Puedes poner true si quieres mostrar "Mostrar X registros"
        searching: true,        // 🔍 Habilita la búsqueda
        ordering: true,         // 🔼 Ordenamiento por columnas
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });
});
