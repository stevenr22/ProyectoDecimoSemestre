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


//LOGIN
//VALIDAR LOGIN
$("#formLogin").submit(function(e){
    e.preventDefault();
    var Nusu = $.trim($("#Nusu").val());
    var Ncontra = $.trim($("#Ncontra").val());
    
    //VALIDAR SI ESTAN VACIOS
    $.ajax({
        url: "../validacion_datos/validar_login.php", // Corrige la URL para que coincida con la autenticación del login
        type: "POST",
        dataType: "json",
        data: { Nusu: Nusu, Ncontra: Ncontra },

        success: function(response) {
            if (response.type === 'success') {
                /*Swal.fire({
                    icon: 'success',
                    title: 'Conexión exitosa!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "../dashboard/index.php";
                    }
                });*/
                window.location.href = "../inicio/dashboard.php";
            } else if (response.type === 'warning') {
                // Mostrar mensaje de alerta según el tipo
                Swal.fire({
                    title: response.message,
                    icon: response.type
                });
            } else if (response.type === 'error') {
                // Mostrar mensaje de alerta según el tipo
                Swal.fire({
                    title: response.message,
                    icon: response.type
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


  //ACTUALIZAR INFORMACION DELPERFIL
  $("#formPerfil").submit(function(e){
    e.preventDefault();

    // Obtener los valores de los campos de entrada
    var nombre_comple_pag = $.trim($("#nombre_comple_pag").val());
    var correo_pag = $.trim($("#correo_pag").val());
    var nusu_pag = $.trim($("#nusu_pag").val());
    var DBid_usu_en_sesion = $.trim($("#DBid_usu_en_sesion").val());

    // Enviar los datos mediante AJAX
    $.ajax({
        url: "../actualizaciones/actualizar_perfil.php",
        type: "POST",
        dataType: "json",
        data: {nombre_comple_pag: nombre_comple_pag, correo_pag: correo_pag, nusu_pag: nusu_pag, DBid_usu_en_sesion: DBid_usu_en_sesion},
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Actualización exitosa!',
                }).then((result) => {
                    if(result.value){
                        window.location.href = "../inicio/perfil.php";
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


//ACTUALIZAR INFORMACION
$("#formPerfil").submit(function(e){
    e.preventDefault();
    var nombre_comple_pag = $.trim($("#nombre_comple_pag").val());
    var correo_pag = $.trim($("#correo_pag").val());
    var nusu_pag = $.trim($("#nusu_pag").val());
    var DBid_usu_en_sesion = $.trim($("#DBid_usu_en_sesion").val());


    // Enviar los datos mediante AJAX
    $.ajax({
        url: "../actualizaciones/actualizar_perfil.php",
        type: "POST",
        dataType: "json",
        data: {nombre_comple_pag: nombre_comple_pag, 
            correo_pag: correo_pag, 
            nusu_pag: nusu_pag, 
            DBid_usu_en_sesion: DBid_usu_en_sesion}, // Asegúrate de que los nombres coincidan con los de tu PHP
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Actualización exitosa!',
                }).then((result) => {
                    if(result.value){
                        window.location.href = "../inicio/perfil.php";
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