var $manufacturerSlider = jQuery.noConflict(); 
$manufacturerSlider(document).ready(function(){
	$manufacturerSlider.easing.backout = function(x, t, b, c, d){
			var s=1.70158;
			return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
		};
		
		$manufacturerSlider('#featured-manu-screen').scrollShow({
			elements:'div.item',
			view:'#featured-manu-view',
			content:'#featured-manu-images',
			easing:'backout',
			wrappers:'link,crop',
			navigators:'a[id]',
			navigationMode:'s',
			circular:true,
			start:0
		});

});