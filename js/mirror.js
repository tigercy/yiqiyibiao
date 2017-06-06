function Mirror(obj){
	this.mirrorBoxid=obj.mirrorBoxid;//缩略图ID
	this.mirrorid=obj.mirrorid;//镜子的ID
	this.mirrorjingzi=obj.mirrorjingzi;//放大效果狂的ID
	this.showboxid=obj.showboxid;//放大图片效果的ID
	this.beis=obj.beis;
	this.init();
}
Mirror.prototype.init=function(){
	var that=this;
	$(this.showboxid).css({width:($(that.mirrorBoxid).outerWidth()*this.beis)+"px",height:($(that.mirrorBoxid).outerHeight()*this.beis)+"px"});
	$(this.mirrorBoxid).mousemove(function(event){
		$(that.mirrorid).css({"display":"block"});
		$(that.mirrorjingzi).css({"display":"block"});
		let e=event||window.event;
		let left1=e.clientX-$(this).offset().left-($(that.mirrorid).outerWidth()/2);
		let top1=e.clientY-$(this).offset().top+$(document).scrollTop()-($(that.mirrorid).outerHeight()/2);
		let sylft=$(that.mirrorBoxid).outerWidth()-$(that.mirrorid).outerWidth();
		let sytop=$(that.mirrorBoxid).outerHeight()-$(that.mirrorid).outerHeight();
		if(left1>=sylft){left1=sylft;}else if(left1<=0){left1=0;}//left不让过界
		if(top1>=sytop){top1=sytop;}else if(top1<=0){top1=0;}//top不让过界
		$(that.mirrorid).css({left:left1+"px",top:top1+"px"});
		$(that.showboxid).css({left:-1*left1*that.beis+"px",top:-1*top1*that.beis+"px"});
	});
	$(this.mirrorBoxid).mouseleave(function(event){
		$(that.mirrorid).css({"display":"none"});
		$(that.mirrorjingzi).css({"display":"none"});
	});
	
}