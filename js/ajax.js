// REGISTRAR DATOS
$("#formRegistro").submit(function(e){
    e.preventDefault();

    // Obtener los valores del formulario
    var nombre_completo = $.trim($("#RNnombre").val());
    var correo = $.trim($("#RNcorreo").val());
    var usuario = $.trim($("#RNusu").val());
    var contraseña = $.trim($("#RNcontra").val());

    // Enviar los datos mediante AJAX
    $.ajax({
        url: "../validacion_datos/validar_regis.php", // Reemplaza esto con la ruta de tu script de servidor que procesa el registro
        type: "POST",
        dataType: "json",
        data: {nombre_completo: nombre_completo, correo: correo, usuario: usuario, contraseña: contraseña},
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso!',
                }).then((result) => {
                    if(result.value){
                        // Puedes redirigir a otra página o hacer algo más después del registro exitoso
                        // Ejemplo: window.location.href = "tu_pagina_de_inicio.html";
                    }
                });
            } else {
                Swal.fire({
                    title: response.message,
                    icon: 'warning'
                });
            }
        },
        error: function() {
            Swal.fire({
                title: 'Error en la solicitud',
                icon: 'error'
            });
        }
    });
});
