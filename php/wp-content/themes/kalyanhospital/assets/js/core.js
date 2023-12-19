(function ($) {
	$(document).ready(function () {
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			spaceBetween: 30,
			autoplay: 5000,
			autoplayDisableOnInteraction: false
		});

		$(window).scroll(function () {
			if ($(document).scrollTop() > 50) {
				$('.navbar').addClass('shrink');
				$('.add').hide();
			} else {
				$('.navbar').removeClass('shrink');
				$('.add').show();
			}
		});
	});
})(jQuery);

