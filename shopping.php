<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>购物车</title>
		<meta name="description" content="专业生产研发销售:超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计,泥位,液位差,分体式,便携式,外贴式,防腐,防爆,等测量准确,经久耐用的产品，欢迎拨打17719675981" />
		<meta name="keywords" content="超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计" />
		<link rel="stylesheet" href="css/public.css" />
		<link rel="stylesheet" href="css/index.css" />
		<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	</head>
	<body ord="product">
	<header>
		<div class="top1">
			<div class="top1c clear">
				<span class="welcome fl">仪表网欢迎您，专注自动化热工仪表交易平台</span>
				<div class="login fr"><span id="yonghu"></span><a href="login.html" class="denglu">请登录</a><a href="register.html" class="zuce">免费注册</a><a href="">收藏本站</a><a href="">帮助中心</a></div>
			</div>
		</div>
		<div class="top2gw clear">
			<div class="logo fl">
				<a href="index.html"></a>
			</div>
		</div>
	</header>	
	<section id="crumbs">
			<div class="floor1_p clear">
				<h3 class="weizhi">当前位置：<span>></span>用户管理<span>></span>我的购物车</h3>
			</div>
	</section>
	<section id="shopcenter">
		<h3>全部商品</h3>
		<div class="shoptitle">
			<div class="qx"><input type="checkbox" />全选</div>
			<div class="pm">商品</div>
			<div class="dj">单价</div>
			<div class="sl">数量</div>
			<div class="xj">小计</div>
			<div class="cz">操作</div>
		</div>
		<div id="neirong">
			
			
		</div>

		<div class="jiesuan clear"><span>去结算</span></div>
	</section>
	<?php  include "bottom.php"; ?>
	</body>
</html>
<script type="text/javascript" src="js/index.js" ></script>
<script>
	var userName="";
	userName=getCookie("userName");
	if(userName==""||userName==null){
		location.href="404.html";	
	}else{
		$.get("getShoppingCart.php",{vipName:userName},function(data){
			if(data){
				var shuju=eval(data);
				var str="";
				for(var i in shuju){
					str+="<div class='productSortID clear'>";
					str+="<div class='qx clear'><input type='checkbox' /><p class='valign'><img src='"+shuju[i].Upimg+"'></p></div>";
					str+="<div class='pm'>"+shuju[i].Title+"</div>";
					str+="<div class='dj'>¥"+shuju[i].Ykeywords+"</div>";
					str+="<div class='sl'><span><i class='jian'>-</i><i class='num'>"+shuju[i].goodsCount+"</i><i class='jia'>+</i></span></div>";
					str+="<div class='xj'>¥"+(shuju[i].Ykeywords*shuju[i].goodsCount)+"</div>";
					str+="<div class='cz'>删除</div>";
					str+="</div>";
				}
				$("#neirong").append(str);
			}
		});
	}
</script>

