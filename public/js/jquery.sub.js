
function scrHndl(){
	var ww = $(window).width();
	var wh = $(window).height();
	var ch = $("#visual img").height();
	var scrT = $(window).scrollTop();
	if(ww < 1200){
		$("#firstWrap").css({"left":-$(window).scrollLeft()+"px"});
	}else{
		$("#firstWrap").css({"left":"0px"});
	}
	$(".flush").each(function(){
		var pos = $(this).offset().top;
		if (scrT > pos - wh + wh/8){
			$(this).addClass("flushRun");
		} else {
			$(this).removeClass("flushRun");
		}
	});
}
function rszHndl(){
	var wh = window.innerHeight;
	if(wh < 620){
		$("footer").css({"height":"620px"});
	}else{
		$("footer").css({"height":wh+'px'});
	}
}
function no_scroll(){
	var scroll_event = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';
	$(document).on(scroll_event,function(e){e.preventDefault();});
	$(document).on('touchmove.noScroll', function(e) {e.preventDefault();});
}
function return_scroll(){
	var scroll_event = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';
	$(document).off(scroll_event);
	$(document).off('.noScroll');
}
$(function(){
	var scrNow = 0;
	//ANCHOR SMOOTH SCROLL
	$('.anchor').click(function() {
		var speed = 800;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').delay(200).animate({scrollTop:position}, speed, 'easeInOutQuint');
		$('.menu-trigger,nav').removeClass('active');
		return false;
	});
	$('.anchor_k').click(function() {
		var speed = 800;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top-50;
		$('body,html').delay(200).animate({scrollTop:position}, speed, 'easeInOutQuint');
		$('.menu-trigger,nav').removeClass('active');
		return false;
	});
	$('.anchor_kp').click(function() {
		$("#keywordsPopup .flush").removeClass("flushRun");
		$("html").css({"overflow":"hidden"});
		var href = $(this).attr("href");
		$(href).css({"display":"table"});
		$(href).next("dd").css({"display":"table"});
		$("#keywordsPopup").fadeIn(200,'linear',function(){
			$("#keywordsPopup .flush").addClass("flushRun");
		});
		return false;
	});
	$("#keywordsClose a,#keywordsPopupMo").click(function(){
		$("#keywordsPopup dt,#keywordsPopup dd:not(:last-child)").fadeOut(500);
		$("#keywordsPopup").fadeOut(500,'linear',function(){
			$("html").css({"overflow":"visible"});
		});
	});
	$(".menu-trigger").click(function(){
		$(this).toggleClass("active");
		$('nav').toggleClass("active");
	});
	$(".modalClose a").click(function(){
		$("#modalMovie iframe").attr('src','');
		$("#fullWrap").attr("style",'');
		$("html,body").animate({scrollTop:scrNow},10,'linear',function(){
			$("#modalNews").fadeOut(1000);
			$("#modalMovie").fadeOut(500);
		});
	});
	$(".modalNews").click(function(){
		scrNow = $(window).scrollTop();
		$("#modalNews").fadeIn(500,'linear',function(){
			$("#fullWrap").css({"overflow":"hidden","height":"1px","width":"1px","opacity":0});
			$('nav,.menu-trigger').toggleClass("active");
		});
	});
	$(window).on("load scroll resize",scrHndl);
	$(window).on("load resize",rszHndl);
	
	$(".imgClick a").click(function(){
		 var imgsrc = $(this).children("img").attr("src");
		 $(this).parents(".imgBox").find(".detaiImg img").attr("src",imgsrc);
	 });
	
})



