//EXPORTAR PDF DE RECEPCION DE INSUMOS
$(document).ready(function() {
    $("#btnPDF").click(function() {
        // Enviar solicitud AJAX al archivo PHP
        $.ajax({
            type: "POST",
            url: "../recursos/fpdf/generar_pdf.php",
            data: { generar_pdf: true },
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor, si es necesario
                console.log(response);
            },
            error: function(error) {
                console.error("Error al generar el PDF:", error);
            }
        });
    });
});