/*Inicializar los componentes de Materialize*/

document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
  });


  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  $(document).ready(function () {
    $(".burger-btn").click(function () {
      $(".sidenav").toggleClass("sidenav-active");
      $(".content").toggleClass("content-active");
      $(".burger-btn").toggleClass("active");
  
      if ($(".sidenav").hasClass("sidenav-active")) {
        $(".burger-btn").css("left", "280px"); // Ajusta este valor según el ancho de tu menú lateral
      } else {
        $(".burger-btn").css("left", "20px"); // Ajusta este valor según el ancho de tu menú lateral
      }
    });
  });
  