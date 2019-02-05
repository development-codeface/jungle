jQuery(document).ready(function(){
	jQuery('.bxslider').bxSlider({
		mode: 'horizontal',
		speed: 1500,
		auto: true,
		pause: 5000,
		adaptiveHeight: true,
		nextText: '',
		prevText: '',
		nextSelector: '.slide-next',
		prevSelector: '.slide-prev',
		tickerHover: true
	});
});