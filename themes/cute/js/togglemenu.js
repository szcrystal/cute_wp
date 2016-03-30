jQuery(document).ready(function($) {
	/* ===================================================================
	 * メニュー開閉
	=================================================================== */
	$("section#categories-4.widget").css("display","none");
    
	$("#menuButton").click(function(){
		$(this).toggleClass("active"); //メニューボタンの切り替え
		/*-- メニューの開閉 --*/
		$("section#categories-4.widget").slideToggle();
		return false;
	});
});