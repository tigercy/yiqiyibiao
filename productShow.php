<?php
$productId=$_GET['SortID'];	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>仪器仪表网</title>
		<meta name="description" content="专业生产研发销售:超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计,泥位,液位差,分体式,便携式,外贴式,防腐,防爆,等测量准确,经久耐用的产品，欢迎拨打17719675981" />
		<meta name="keywords" content="超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计" />
		<link rel="stylesheet" href="css/public.css" />
		<link rel="stylesheet" href="css/index.css" />
		<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	</head>
	<body ord="product">
		<input type="text" value="<?=$productId?>" hidden="hidden"  id="prodcutID"  />
		<?php include "top.php";?>					
		<section id="crumbs">
				<div class="floor1_p clear">
					<h3 class="weizhi">当前位置：<span>></span>产品展示<span>></span>压力仪表<span>></span></h3>
				</div>
		</section>
		<section id="productshow">
			<div class="product-top clear">
				<div class="product-top-left fl">
					<div class="productbox">
						   <div id="suoluetu">
								<img src="images/d1.png" id="imgId"/>
								<div id="kdj"></div>
						   </div>
						   <div id="jingzi">
								<img src="images/d1.png" id="jingziId"/>
						   </div>
					</div>
					<div>
						<span>左</span>
						<ul>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
						<span>右</span>
					</div>
				</div>
				<div class="product-top-right fl">
					<h1  id="ptitle">单晶硅压力变送器 4~20mA 带 RS485通讯 耐高温 防腐型，融入全球最先进的激光焊接,激光调阻,5年质保,服务全球,专业生产</h1>
					<div class="product-minute" id="shuoming">
						单晶硅压力变送器是立格仪表采用世界上最先进的单晶硅压力传感器技术与专利封装工艺，精心研制出的一款国际领先技术的超高性能压力变送器。单晶硅压力传感器位于金属本体最顶部，远离介质接触面，实现机械隔离和热隔离；玻璃烧结一体的传感器引线实现了与金属基体的高强度电气绝缘，提高了电子线路的灵活性能与耐瞬变电压保护的能力。这些独创的单晶硅压力传感器封装技术确保了DMP305X单晶硅压力变送器可从容应对极端的化学场合和机械负荷，同时具备极强的抗电磁干扰能力，足以应对最为苛刻的工业环境应用，是名副其实的隐形仪表。
					</div>
					<div class="product-td">
						<span>测量范围: 200Pa - 10MPa</span>
						<span>输出信号: 4-20mA,4~20mA/HART , customer</span>
						<span>参考精度: 0.075% URL, optional 0.05% URL</span>
						<span>介质温度: -40-120℃,</span>
						<span>测量介质：液体、气体或蒸汽</span>
						<span>电源: 4~20mA两线制,电源: 10.5-55vdc</span>
						<span>4~20mA+HART 两线制,电源: 16.5-55vdc</span>
						<span>膜片材质：316L不锈钢，哈氏合金C</span>
					</div>
					<div class="product-price">￥<span id="productjg">4600</span></div>
					<div class="product-gm">
						<span class="num">
						<i class="jia">+</i><i class="cont">1</i><i class="jian">-</i>
						</span><span class="gwc">加入购物车</span><a href="#" id="zx">在线咨询</a>
					</div>
				</div>
			</div>
			<div class="product-main clear">
				<?php  include "productleft.php"; ?>
				<div class="product-main-right fr">
					<h3><span>商品介绍</span></h3>
					<div id="product-cont"></div>
				</div>
			</div>		
		</section>
		
		<?php  include "bottom.php"; ?>
			<div id="chenggong">成功添加到购物车</div>
	</body>
</html>
<script type="text/javascript" src="js/index.js" ></script>
<script>
	$(function(){
			var userName="";
			var productID="";
			userName=getCookie("userName");
		var goodsID=$("#prodcutID").val();
		$.get("getGoodsInfo.php",{goodsId:goodsID},function(data){
			if(data){	
				var product=eval("("+data+")");
				productID=product.ID;
				$("#ptitle").html(product.Title);
				$("#shuoming").html(product.Ydescription);
				$("#productjg").html(product.Ykeywords);
				$("#product-cont").html(product.Content);
				$("#imgId").attr({"src":product.Upimg});
				$("#jingziId").attr({"src":product.Upimg});
			}else{
				Location.href="404.html";
			}
		});
		new Mirror({mirrorBoxid:"#suoluetu",mirrorid:"#kdj",mirrorjingzi:"#jingzi",showboxid:"#jingziId",beis:2});
	
		$(".gwc").click(function(){
			if(userName==""||userName==null||userName==undefined){
				alert("请先登录");
				location.href="login.html";
			}else{
				$.get("addShoppingCart.php",{vipName:userName,goodsId:productID,goodsCount:$(".cont").html()},function(data){
					if(data){
						$("#chenggong").fadeIn(750,function(){
							$("#chenggong").fadeOut(1000);
						});
					}
				});
			}
		});
		
		$(".jia").click(function(){
			var num=$(".cont").html();  
				num++;	
			$(".cont").html(num);	
			
		});
		
		$(".jian").click(function(){
			var num=$(".cont").html();
			if(num==1){
			}else{
				num--;
				$(".cont").html(num);
			}	
		});
		
		
		var cleft=$(window).width()/2-80;
		var ctop=$(window).height()/2-22+$(document).scrollTop();
		$("#chenggong").css({top:ctop+"px",left:cleft+"px"});
	});
</script>