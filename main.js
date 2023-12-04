/*Inicializar los componentes de Materialize*/

  document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
  });

  
//MOSTRAR Y OCULTAR CONTRASEÑA
const passwordInput = document.getElementById('password'); // Cambia 'contra' a 'Ncontra'
const showPasswordCheckbox = document.getElementById('mostrarContra');

showPasswordCheckbox.addEventListener('change', function () {
    if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});

//VALIDAR INPUTS
function validarInput(input) {
  // Elimina caracteres no permitidos del valor del input
  input.value = input.value.replace(/[^A-Za-z ]/g, '');
}

//REDIRIGIR
function redirigirPagina() {
  // Puedes cambiar 'otra_pagina.html' por la URL de la página a la que deseas redirigir
  window.location.href = '../módulos/dashboard.php';
}


