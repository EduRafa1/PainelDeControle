$(()=>{
	var curSlide = 0;
	var maxSlider = $('.banner-single').length - 1;
	console.log(maxSlider)

	var delay = 3;

	initSlider();
	changeSlider();
	function initSlider(){
		$('.banner-single').hide();
		$('.banner-single').eq(0).show();
		for(var i = 0 ; i < maxSlider+1; i++){
			var content = $('.bullets').html();
			if (i == 0) 
			content+='<span class="active-slider"></span>';
			else
			content+='<span></span>';

			$('.bullets').html(content);
		}
	}
	function changeSlider(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).stop().fadeOut();
			curSlide++;
			if(curSlide > maxSlider){
				curSlide = 0;	
			}
				$('.banner-single').eq(curSlide).stop().fadeIn();
				$('.bullets span').removeClass('active-slider');
				$('.bullets span').eq(curSlide).addClass('active-slider');
		},delay*1000);
		//trocar bullets
		
	}
	$('body').on('click','.bullets span',function(){
		var curretBullet = $(this);
		$('.banner-single').eq(curSlide).stop().fadeOut();
		curSlide = curretBullet.index();
		$('.banner-single').eq(curSlide).stop().fadeIn();
		$('.bullets span').removeClass('active-slider');
		curretBullet.addClass('active-slider');
	})
})