        // Obtener elementos del DOM
        var modal = document.getElementById('myModal');
        var openModalBtn = document.getElementById('openModalBtn');

        // Evento para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }

       

        function validarYCerrarModal() {
            var selectedValue = document.getElementById('cate').value;
            if (selectedValue === "") {
                // Si no se ha seleccionado ninguna opción, mostrar una notificación
                mostrarError("Por favor, selecciona una categoría antes de continuar.");
            } 
           
            else {
                // Si se ha seleccionado una opción, realizar la limpieza y cerrar el modal
              
               
                cerrarModal();
                if(selectedValue =="Insecticidas"){
                    mostrarSegundoModal();
                }else if(selectedValue=="Mangos"){
                    mostrartercerModal();
                }else if(selectedValue =="Parcelas"){
                    mostrarcuartoModal();
                }else if(selectedValue =="Herramientas"){
                    mostrarquintooModal();
                }else if(selectedValue =="Maquinarias"){
                    mostrarsextoModal();
                }
            }
        }

        function cerrarModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
            limpiarSeleccion();
            ocultarError();
            
        }

//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_insec = document.getElementById("segundoModal");
            var modal_mango = document.getElementById("tercerModal");
            var modal_parcela = document.getElementById("cuartoModal");
            var modal_maqui = document.getElementById("quintoModal");
            var modal_herra = document.getElementById("sextoModal");

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Quieres finalizar el proceso de registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Usuario hizo clic en "Sí, estoy seguro"
                    if (modal_insec) {
                        modal_insec.style.display = 'none';
                    }
                    if (modal_mango) {
                        modal_mango.style.display = 'none';
                    }
                    if (modal_parcela) {
                        modal_parcela.style.display = 'none';
                    }
                    if (modal_maqui) {
                        modal_maqui.style.display = 'none';
                    }
                    if (modal_herra) {
                        modal_herra.style.display = 'none';
                    }
                } else {
                    // Usuario hizo clic en "Cancelar"
                    toastr.info("Continuando...", "", {
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: 3000,
                        extendedTimeOut: 1000,
                        showDuration: 300,
                        hideDuration: 1000,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        backgroundColor: "#e74c3c",  // Corregido de "background-color" a "backgroundColor"
                        border: "1px solid #c0392b",
                        color: "#ffffff"
                    });

                    
                }
            });
        }

//----------------------------------------------------------------
function limpiarSeleccion() {
    // Limpiar o restablecer los valores de los elementos seleccionados
    document.getElementById('cate').value = "";
}

function mostrarError(mensaje) {
    var mensajeError = document.getElementById('mensajeError');
    mensajeError.textContent = mensaje;
    mensajeError.style.display = 'block';
}
function ocultarError() {
    var mensajeError = document.getElementById('mensajeError');
    mensajeError.textContent = "";
    mensajeError.style.display = 'none';
}


//MODALES---------------------------------------------------------------------------------------------
function mostrarSegundoModal() {
    var segundoModal = document.getElementById('segundoModal');
    segundoModal.style.display = 'block';
}
function mostrartercerModal() {
    var segundoModal = document.getElementById('tercerModal');
    segundoModal.style.display = 'block';
}
function mostrarcuartoModal() {
    var segundoModal = document.getElementById('cuartoModal');
    segundoModal.style.display = 'block';
}
function mostrarquintooModal() {
    var segundoModal = document.getElementById('quintoModal');
    segundoModal.style.display = 'block';
}
function mostrarsextoModal() {
    var segundoModal = document.getElementById('sextoModal');
    segundoModal.style.display = 'block';
}








// Evento para cerrar el modal cuando se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}




