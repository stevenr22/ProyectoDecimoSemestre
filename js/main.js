

  
  //Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

//FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}


//MOSTRAR CONTRASEÑA
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('Ncontra');
    var passwordInput2 = document.getElementById('RNcontra');
    var eyeIcon = document.getElementById('eyeIcon');
    var eyeIcon2 = document.getElementById('eyeIcon2');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        eyeIcon.style.color = '#007bff'; /* Cambia el color del ícono cuando está activo */
    }  
    else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
        eyeIcon.style.color = '#ccc'; /* Cambia el color del ícono cuando no está activo */
    }

    if (passwordInput2.type === 'password') {
        passwordInput2.type = 'text';
        eyeIcon2.innerHTML = '<i class="fa fa-eye-slash"></i>';
        eyeIcon2.style.color = '#007bff'; /* Cambia el color del ícono cuando está activo */
    } 
    else {
        passwordInput2.type = 'password';
        eyeIcon2.innerHTML = '<i class="fa fa-eye"></i>';
        eyeIcon2.style.color = '#ccc'; /* Cambia el color del ícono cuando no está activo */
    }
}


//VALIDAR SOLO LETRAS Y ESPACIOS
function validarSoloLetrasYPacios(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
}



//REDIRIGIR
function redirigirPagina() {
  // Puedes cambiar 'otra_pagina.html' por la URL de la página a la que deseas redirigir
  window.location.href = '../módulos/dashboard.php';
}


