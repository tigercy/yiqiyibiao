"use strict";
$(function(){
	new Slideshow(
		{
			boxId:"#banner",
			imgs:["images/banner1.jpg","images/banner2.jpg","images/banner3.jpg","images/banner4.jpg","images/banner5.jpg"],
			width:1200,
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
	
	$("#floora").delegate("a","mouseenter",function(){
	  	$(this).css({"background":"#d9002f"}).siblings().css({"background":"#ab0126"});
	  	var num=$(this).attr("num");
	  	$(".floor1-left-bottom-nav").css({"display":"none"}).eq(num).css({"display":"block"});	
	});
});
//轮播图对象
function Slideshow(obj){
	this.boxId=obj.boxId;	//所在容器的id；
	this.imgs=obj.imgs;//图片数组中保存着每张图片的路径
	this.width =obj.width;//对象的宽
	this.height =obj.height;//对象的高
	this.timeSpace=obj.timeSpace;//大定时间的3000;
	this.currInOrd =1;//淡入图片序号
	this.currOutOrd =0;//淡出图片序号
	this.timer =null;//大定时器（）
	this.fadeInOutTime =obj.fadeInOutTime;//小定时器的时间2000
	this.fadeInOutTimer =null;//淡入淡出效果的时间
	this.btnColor =obj.btnColor;//原始颜色
	this.btnHighColor =obj.btnHighColor;//高亮颜色
	this.btnWidth =obj.btnWidth;//按钮的宽
	this.btnHeight =obj.btnHeight;//ann
	this.btnHasOrd =obj.btnHasOrd;//按钮上是否有序号；
	this.initUI();
	this.go();
}

Slideshow.prototype.initUI=function(){
	//1、btnColor所有图片的创建
	for(var i=0;i<this.imgs.length;i++){
		var str="<img src='"+this.imgs[i]+"' style=' width:"+this.width+"px;height:"+this.height+"px;position:absolute;z-index:"+(this.imgs.length-i)+";display:none;'/>";
		$(this.boxId).append(str);	
	}
	//2、让第一张图片显示
	$(this.boxId+" img:eq(0)").css({"display":"block"})	;
	//创建所有按钮
	var ulstr="<ul id='listitem' style='position:absolute;right:410px;bottom:20px;z-index:999;display:flex;justify-content:space-between;'>";
		for(var i=0;i<this.imgs.length;i++){
			ulstr+="<li ord='"+(i+1)+"' style='list-style:none;color:#fff;float:left;margin:5px;width:"+this.btnWidth+"px;height:"+this.btnHeight+"px;border-radius:50%;text-align:center;background-color:"+this.btnColor+";opacity:0.3;-moz-opacity:0.3;filter:alpha(opacity=30);'></li>";
	}
	ulstr+="</ul>";
	$(this.boxId).append(ulstr);	
	$("#listitem li:eq(0)").css({"background-color":this.btnHighColor});
	//上一个
	var up="<span id='up'></span>";
	$(this.boxId).append(up);	
	//下一个
	var next="<span id='next'></span>";
	$(this.boxId).append(next);
	
	
	var that=this;
	//当鼠标
	$("#listitem li").mouseover(function(){	
		
		setTimeout(function(){
			that.goImg($(this).attr("ord"));
		},that.timeSpace);
	
	});
    //鼠标移动到框上的时候让轮播图停止
    $(this.boxId).mouseover(function(){
    	//当鼠标移动图片上的时候
    	that.stopChange();
    	//让上一个下一个显示

    });
    
      	$("#up").mouseover(function(){
    		$(this).css({"background-position":"0px 0px"});
    	});
    	$("#next").mouseover(function(){
    		$(this).css({"background-position":"-41px 0px"});
    	});
    	
    	$("#up").mouseout(function(){
    		$(this).css({"background-position":"-85px 0px"});
    	});
    	$("#next").mouseout(function(){
    		$(this).css({"background-position":"-120px 0px"});
    	});
    	
    	$("#up").click(function(){
    		that.currInOrd=that.currInOrd-2;
			if(that.timer!=null){
			window.clearInterval(that.timer);
			}
    		that.goStep();
    	});
    	$("#next").click(function(){
    		if(that.timer!=null){
			window.clearInterval(that.timer);
			}
    		that.goStep();
    	});
    	
    	
	//当鼠标移走时让轮播继续
	$(this.boxId).mouseout(function(){
		//当鼠标移走的时候让图标继续滚动
		that.go();
		//让上一个下一个隐藏

	});
}
//调用go方法设置计时器
Slideshow.prototype.go = function(){
	var that = this;
	if(this.timer!=null){
		window.clearInterval(this.timer);
	}
	this.timer = setInterval(function(){
		that.goStep();
	},this.timeSpace);
}

//改变图片。
Slideshow.prototype.goStep = function(){
	this.currInOrd++;//淡入图片的序号    1
	this.currOutOrd=this.currInOrd-1;//淡出图片的序号5
	if(this.currInOrd>this.imgs.length){ //如果
		this.currInOrd=1;
	}
	//2）、图片淡入淡出效果
	this.fadeInOut();
	//调用圆按钮也跟着渐变
	this.changeBtnColor();
}
//淡入淡出效果
Slideshow.prototype.fadeInOut=function(){
	$(this.boxId+" img:eq("+(this.currInOrd-1)+")").fadeIn(this.fadeInOutTime);//4
	$(this.boxId+" img:eq("+(this.currOutOrd-1)+")").fadeOut(this.fadeInOutTime);//3
}
//让复选框变颜色
Slideshow.prototype.changeBtnColor=function(){
	$("#listitem li:eq("+(this.currInOrd-1)+")").css({"background-color":this.btnHighColor}).siblings().css({"background-color":this.btnColor});
}	
//让轮播停止
Slideshow.prototype.stopChange=function(){
	window.clearInterval(this.timer);
}
//鼠标按到某个图片的按钮上的特效
Slideshow.prototype.goImg=function(ord){
	this.currOutOrd=this.currInOrd;
	this.currInOrd=ord;
	//调用当前图选择
	if(this.timer!=null){
		window.clearInterval(this.timer);
	}
	this.fadeInOut();
	//调用圆按钮也跟着渐变
	this.changeBtnColor();
}