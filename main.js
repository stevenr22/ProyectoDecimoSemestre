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