$(function(){
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul');
		var icone = $('mobile').find('i');
		if (listaMenu.is(':hidden') == true) {
			
			listaMenu.fadeIn();
			icone.removeClass('fas fa-bars');
			icone.addClass('fas fa-times');
		}
		else{
			
			listaMenu.fadeOut();

		}

		
		
	})
	if ($('target').length > 0) {

		//O elemento Existe
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top
		$('html,body').animate({'scrollTop':divScroll})
	}


})