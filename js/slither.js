//轮播图对象

//调用go方法设置计时器
	function fromRight(){
		$("#shade").css({left:"360px",top:"0px"});
		$("#shade").animate({left:"0px"},600);
	}
	function toRight(){
		$("#shade").css({left:"0px",top:"0px"});
		$("#shade").animate({left:"360px"},600);
	}
	
	//从左边脸
	function fromLeft(){
		$("#shade").css({left:"-360px",top:"0px"});
		$("#shade").animate({left:"0px"},600);
	}
	function toLeft(){
		$("#shade").css({left:"0px",top:"0px"});
		$("#shade").animate({left:"-360px"},600);
	}
	//从上边来
	function fromTop(){
		$("#shade").css({left:"0px",top:"-256px"});
		$("#shade").animate({top:"0px"},600);
	}
	function toTop(){
		$("#shade").css({left:"0px",top:"0"});
		$("#shade").animate({top:"-256px"},600);
	}
	//从下边来
	function fromBottom(){
		$("#shade").css({left:"0px",top:"256px"});
		$("#shade").animate({top:"0px"},600);
	}
	function toBottom(){
		$("#shade").css({left:"0px",top:"0px"});
		$("#shade").animate({top:"256px"},600);
	}		
	//判断那边的值最小
	function dir(directions){
		let fangx=["上","右","下","左"];
		let minIndex=0;
		for(let i=1;i<directions.length;i++){
			if(directions[i]<directions[minIndex]){
				minIndex=i;
			}
		}
		return fangx[minIndex];
	}