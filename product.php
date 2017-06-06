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
		<?php include "top.php";?>			
		<section id="floor1" style="padding-bottom:50px;">
				<div class="floor1 clear">
					<h3>热门推荐<span>查看全部</span></h3>
					<ul class="clear" id="show1">
					
					</ul>
				</div>
		</section>
		<?php  include "bottom.php"; ?>
	</body>
</html>
<script type="text/javascript" src="js/index.js" ></script>
<script>
	$(function(){
		$.get("getGoodsList.php",function(data){
			var shuju=eval(data);
			var str="";
			for(var i in shuju){
				str+="<li><a href='productShow"+shuju[i].ID+".html'><div class='valign sf'><img src='"+shuju[i].Upimg+"'/></div><p><b>"+shuju[i].Title+"</b>"+shuju[i].Ydescription+"</p></a></li>";
			}
			$("#show1").append(str);
		});
	});
</script>

