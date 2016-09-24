//menu
var $j = jQuery.noConflict();
var onOff = true;


$j(document).ready(function(){

	//$j("iframe:not([src^='//www.youtube.com/'])").wrap('<div class="iframe-container" />');
	$j("iframe[src^='//www.youtube.com/']").wrap('<div class="iframe-container" />');
	$j("iframe[src^='//player.vimeo.com/']").wrap('<div class="iframe-container" />');
	$j("iframe[src^='http://www.worldstarhiphop.com/']").wrap('<div class="iframe-container" />');
	$j("iframe[src^='http://www.trillhd.com/embed/']").wrap('<div class="iframe-container" />');

	

	$j('#homeslider iframe').each(function() {
		var url = $j(this).attr("src")
		$j(this).attr("src",url+"&amp;wmode=Opaque")
	});

	//pop down ads
	$j('#collapse-link').click(function(){
		if (onOff){
			$j('#top-ad a').html('+ expand')
			$j('#top-ad').css('height','90px');
			$j('#top-ad').css('background-image','url(http://www.elevatormag.com/img/ads/alt-trap-small.jpg)');
			onOff = false;
		}
		else {
			$j('#top-ad a').html('- collapse')
			$j('#top-ad').css('height','300px');
			$j('#top-ad').css('background-image','url(http://www.elevatormag.com/img/ads/alt-trap-large.jpg)');
			onOff = true;
		}	
	});

	//fix search input text alignment on focus
	$j('#desktop-s').focus(function(){
			$j(this).val('');
			$j('#desktop-s').css("text-align","left");
	});
	$j('#desktop-s').blur(function(){
			$j(this).css("text-align","right");
			$j(this).val('Search');
	});

	//add bootstrap classes to dynamic WP menu
	$j('ul.sub-menu').addClass('dropdown-menu');
	$j('ul.sub-menu').removeClass('sub-menu');


	//check for mobile or desktop nav
	function checkMenu(){	
		if($j('#mobile-nav').css("display")=="block"){
			$j('ul.dropdown-menu').prev().addClass('dropdown-toggle');
			$j('ul.dropdown-menu').prev().attr( "data-toggle", "dropdown" );
		} else if($j('#mobile-nav').css("display")=="none"){
			$j('ul.dropdown-menu').prev().removeClass('dropdown-toggle');
			$j('ul.dropdown-menu').prev().removeAttr( "data-toggle", "dropdown" );
		}
	}

	checkMenu();

	$j( window ).resize(function(){
		checkMenu();
	});


});