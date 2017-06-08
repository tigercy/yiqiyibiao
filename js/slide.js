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
	var ulstr1="<ul id='imglist' style='width:100%;height:"+this.height+"px;position:absolute;left:0px;top:0px;'>";
	for(var i=0;i<this.imgs.length;i++){
		ulstr1+="<li style='width:100%;height:"+this.height+"px;position:absolute;left:0px;top:0px;z-index:"+(this.imgs.length-i)+";background:url("+this.imgs[i]+")no-repeat center center;'></li>";
	}
	ulstr1+="</ul>";
	$(this.boxId).append(ulstr1);
	//2、让第一张图片显示
	//创建所有按钮
	var ulstr="<ul id='listitem' style='position:absolute;right:550px;bottom:20px;z-index:10;display:flex;justify-content:space-between;'>";
		for(var i=0;i<this.imgs.length;i++){
			ulstr+="<li ord='"+(i+1)+"' style='list-style:none;color:#fff;float:left;margin:5px;width:"+this.btnWidth+"px;height:"+this.btnHeight+"px;border-radius:50%;text-align:center;background-color:"+this.btnColor+";opacity:0.3;-moz-opacity:0.3;filter:alpha(opacity=30);'></li>";
	}
	ulstr+="</ul>";
	$(this.boxId).append(ulstr);	
	$("#listitem li:eq(0)").css({"background-color":this.btnHighColor});
	//上一个
	
	var upnext="<div style='position:relative;z-index:"+(this.imgs.length+1)+";width:1200px;height:"+this.height+"px;margin:0 auto;'><span id='up'></span><span id='next'></span></div>";
	$(this.boxId).append(upnext);
	
	
	var that=this;
	//当鼠标
	$("#listitem li").mouseover(function(){	
		setTimeout(function(){
			that.goImg($(this).attr("ord"));
		},that.timeSpace);
	
	});
	
	
	
    //鼠标移动到框上的时候让轮播图停止
    $(this.boxId).mouseover(function(){
    	$("#up").css({"background-position":"0px 0px"});
    	$("#next").css({"background-position":"-41px 0px"});
    	//当鼠标移动图片上的时候
    	that.stopChange();
    	//让上一个下一个显示

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
		$("#up").css({"background-position":"-85px 0px"});
    	$("#next").css({"background-position":"-120px 0px"});
		//当鼠标移走的时候让图标继续滚动
		that.go();
		//让上一个下一个隐藏
	});
}
//调用go方法设置计时器
Slideshow.prototype.go = function(){
	if(this.timer!=null){
		window.clearInterval(this.timer);
	}
	this.timer=setInterval(()=>this.goStep(),this.timeSpace);
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
	$(this.boxId+" #imglist li:eq("+(this.currInOrd-1)+")").fadeIn(this.fadeInOutTime);//4
	$(this.boxId+" #imglist li:eq("+(this.currOutOrd-1)+")").fadeOut(this.fadeInOutTime);//3
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