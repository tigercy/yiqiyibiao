"use strict";
$(function(){
	var userName="";
	userName=getCookie("userName");
	if(userName!=""){
		$("#yonghu").html("当前VIP用户:"+userName+" 您好！&nbsp;&nbsp;<a href='#' id='tuichu' >退出</a>");
		$(".denglu").remove();
		$(".zuce").remove();
		$("#tuichu").click(function(){
			removeCookie("userName");
			location.href="index.html";
		});
	}
	//logo:position: fixed;
	var lamp=1;
	$(window).scroll(function() {
		if($(document).scrollTop()>180){
			if(lamp){
				lamp=0
				$("#Sticknav").css({"display":"block"}).animate({top:"0px"},500);
			}
		}else {
			if(lamp==0){
				lamp=1;
				$("#Sticknav").css({"display":"none",top:"-60px"})
			}
		}
	});
	//导航部分切换
    $(".secord-nav-box .secord-nav-a").hover(function(){
        $(this).addClass("current").parent(".secord-nav-box").siblings().children(".secord-nav-a").removeClass("current");
        $(this).siblings(".thrid-nav").show().parent(".secord-nav-box").siblings().children(".thrid-nav").hide();

    });
    $(".secord-nav-box,.thrid-nav").mouseleave(function(){
        $('.thrid-nav').hide();
        $(".secord-nav-box").children(".secord-nav-a").removeClass("current");
    });
	
	//创建轮播图
	new Slideshow(
		{
			boxId:"#banner",
			imgs:["images/banner1.jpg","images/banner2.jpg","images/banner3.jpg"],
			width:0,
			height:458,
			timeSpace:2000,
			fadeInOutTime:1000,
			btnColor:"#444",
			btnHighColor:"#fff",
			btnWidth:10,
			btnHeight:10,
			btnHasOrd:false	
		}
	);
	
	$("#show").delegate("li","mouseenter",function(){
	  	$(this).css({"box-shadow":"0 0 10px #333"});
	  	$(this).animate({"background-color":"#d9002f"},1000);
	});
	$("#show").delegate("li","mouseleave",function(){
	  	$(this).css({"box-shadow":"0 0 0 #fcf"});
	});
	
	$("#show1").delegate("li","mouseenter",function(){
	  	$(this).css({"box-shadow":"0 0 10px #333"});
	  	$(this).animate({"background-color":"#d9002f"},1000);
	});
	$("#show1").delegate("li","mouseleave",function(){
	  	$(this).css({"box-shadow":"0 0 0 #fcf"});
	});
	
	
	$("#floora").delegate("a","mouseenter",function(){
	  	$(this).css({"background":"#d9002f"}).siblings().css({"background":"#ab0126"});
	  	var num=$(this).attr("num");
	  	$(".floor1-left-bottom-nav").css({"display":"none"}).eq(num).css({"display":"block"});	
	});
	
	$("#divbox").delegate("a","mouseenter",function(){
	  	$(this).find("p").animate({bottom:"0px"});
	});	
	
	$("#divbox").delegate("a","mouseleave",function(){
	  	$(this).find("p").animate({bottom:"-200px"});
	});	
	
	//让广告展开


	
	

	
	var page;
	page=$("body").attr("ord")
	if(page=="product"){
		$(".secord-nav").css({"display":"none"});
		
		$(".all-classify").mouseenter(function(){
			$(".secord-nav").css({"display":"block"});
		});
		$(".all-classify").mouseleave(function(){
			$(".secord-nav").css({"display":"none"});
		});
	}
	
	$("#mygwc").click(function(){
		if(userName==""||userName==null){
			alert("您请先登录");
		}else{
			location.href="shopping.html";	
		}
	});
	
	var ctop=$(window).height()-230;
	$("#kefu").css({"top":ctop+"px"});
	$("#kefu .zd").css({"display":"none"});
	
});

function getCookie(key){
//1、获取cookie的内容；//color=red; userName=jzm; password=123; auserName=ppp
var str = decodeURIComponent(document.cookie);
var arr = str.split("; ");
//3、循环数组找key
for(var i=0;i<arr.length;i++){
	if(arr[i].indexOf(key+"=")==0){
		return arr[i].substring((key+"=").length);
	}
}
//4、返回
	return "";
}
function removeCookie(key){
	//借用就是保存。
	setCookie(key,"007",-7);	
}
function setCookie(key,value,dayCount){
	var d = new Date();
	d.setDate(d.getDate()+dayCount);
	document.cookie = encodeURIComponent(key+"="+value)+";expires="+d.toGMTString();
}	