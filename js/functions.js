$(document).ready(function(){
    $("#menu-icon").on("click", function() {
  		toggleMobileNavigationOverlay();
	});
});

function openMobileNavigationOverlay() {
	$('#menu-overlay').removeClass('menu-closed').addClass('menu-opened');
	$('#menu-icon').fadeOut(100, function() {
		$('#menu-icon').removeClass('menu-icon').addClass('menu-icon-close').fadeIn(100);
	});
}

function closeMobileNavigationOverlay() {
	$('#menu-overlay').removeClass('menu-opened').addClass('menu-closed');
	$('#menu-icon').fadeOut(100, function() {
		$('#menu-icon').removeClass('menu-icon-close').addClass('menu-icon').fadeIn(100);
	});
}

function toggleMobileNavigationOverlay() {
	if($('#menu-overlay').hasClass('menu-closed')) {
		openMobileNavigationOverlay();
	} else {
		closeMobileNavigationOverlay();
	}
}