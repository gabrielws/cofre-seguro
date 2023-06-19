(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);


function confirmDelete() {
  // Exibe um alerta de confirmação
  var confirmed = confirm("Tem certeza que deseja excluir este registro?");

  // Retorna true se o usuário confirmou, ou false se o usuário cancelou
  return confirmed;
}


let passwordInputs = document.querySelectorAll('input[type="password"]');

    passwordInputs.forEach(function(input) {
        let container = input.parentNode;
        let icon = container.querySelector('.password-icon');

        icon.addEventListener('click', function() {
            container.classList.toggle('visible');
            if (container.classList.contains('visible')) {
                input.setAttribute('type', 'text');
                icon.src = 'images/eye.svg';
            } else {
                input.setAttribute('type', 'password');
                icon.src = 'images/eye-off.svg';
            }
        });
    });
