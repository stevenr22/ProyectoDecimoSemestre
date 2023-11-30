$(document).ready(function(){

	/*  Show/Hidden Submenus */
	$('.nav-btn-submenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.fa-chevron-down');
		if(SubMenu.hasClass('show-nav-lateral-submenu')){
			$(this).removeClass('active');
			iconBtn.removeClass('fa-rotate-180');
			SubMenu.removeClass('show-nav-lateral-submenu');
		}else{
			$(this).addClass('active');
			iconBtn.addClass('fa-rotate-180');
			SubMenu.addClass('show-nav-lateral-submenu');
		}
	});

	/*  Show/Hidden Nav Lateral */
	$('.show-nav-lateral').on('click', function(e){
		e.preventDefault();
		var NavLateral=$('.nav-lateral');
		var PageConten=$('.page-content');
		if(NavLateral.hasClass('active')){
			NavLateral.removeClass('active');
			PageConten.removeClass('active');
		}else{
			NavLateral.addClass('active');
			PageConten.addClass('active');
		}
	});

	/*  Exit system buttom */
	$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Quierés cerrar la sesión?',
			text: "Estás a punto de cerrar la sesión y salir del sistema.",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, salir!',
			cancelButtonText: 'No, cancelar'
		}).then((result) => {
			if (result.value) {
				window.location="../módulos/login.html";
			}
		});
	});
});

//MODIFICO EL SCROLL
(function($){
    $(window).on("load",function(){
        // Personalización para .nav-lateral-content
        $(".nav-lateral-content").mCustomScrollbar({
            theme: "my-custom-theme", // Cambia a un tema personalizado
            scrollbarPosition: "outside", // Cambia la posición del pulgar del scroll
            autoHideScrollbar: true,
            scrollButtons: { enable: true },
            scrollInertia: 300, // Ajusta la velocidad del scroll
            // Puedes agregar más configuraciones según tus necesidades
        });

        // Personalización para .page-content
        $(".page-content").mCustomScrollbar({
            theme: "dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true },
            scrollInertia: 300,
            // Puedes agregar más configuraciones según tus necesidades
        });
    });
})(jQuery);
