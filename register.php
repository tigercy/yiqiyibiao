<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>仪器仪表网-注册页面</title>
		<meta name="description" content="专业生产研发销售:超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计,泥位,液位差,分体式,便携式,外贴式,防腐,防爆,等测量准确,经久耐用的产品，欢迎拨打17719675981" />
		<meta name="keywords" content="超声波液位计,明渠流量计,超声波液位差计,超声波泥位计,超声波水位计" />
		<link rel="stylesheet" href="css/public.css" />
		<link rel="stylesheet" href="css/login.css" />
		<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	</head>
	<body>
		<header>
			<?php include "top2.php";?>
		</header>
		<section id="main" class="bg2">
			<div class="main_c clear">
				<div id="login">
					<h3><span>账号注册</span></h3>
					<ul>
						<li><input id="userName" type="text"  placeholder="用户名" />
							<label id="userNamelb"></label>
						</li>
						<li><input id="pwd" type="password" placeholder="密码"/>
							<label id="pwdlb"></label>
						</li>
						<li><input id="pwdyz" type="password" placeholder="再次输入密码"/>
							<label id="pwdyzlb"></label>
						</li>
						<li><input name="yzm" id="yzm" type="text" placeholder="验证码"/>
							<label id="yzmlb"></label><label id="yzmnum">1234</label>
						</li>

						<li><input type="button" id="btn" value="注册"/></li>
					</ul>
					<div class="clear"><span class="zhuce">已经注册</span><a href="login.php" class="wjmm">登录</a></div>
				</div>				
			</div>
		</section>
		<footer>
				<p>仪器仪表自动化&nbsp;&nbsp;版权所有 Copyright&nbsp;©&nbsp;2008-2017&nbsp;1718ZDH&nbsp;Corporation,&nbsp;All&nbsp;Rights&nbsp;Reserved
               &nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="index.php">仪表首页</a><span>|</span>
                <a target="_blank" href="#">官方微博</a><span>|</span>
                <a target="_blank" href="#">意见反馈</a><span>|</span>
				<a target="_blank" href="#">意见反馈</a><span>|</span>
				</p>
		</footer>
	</body>
</html>
<script>
$(function(){
	var code = Math.floor(Math.random()*9000)+1000; //随机一个4位数
	$("#yzmnum").html(code);
	//按钮点击事件
	$("#btn").click(function(){
		if($("#userName").val()==""){
			$("#userNamelb").html("用户名不能为空");
		}else if($("#pwd").val()==""){
			$("#pwdlb").html("密码不能为空");
		}else if($("#pwdyz").val()==""){
			$("#pwdyzlb").html("两次输入的密码不正确");
		}else if($("#pwdyz").val()!=$("#pwd").val()){
			$("#pwdyzlb").html("两次输入的密码不相同");
		}else if($("#yzm").val()==""){
			$("#yzmlb").html("验证码不能为空");
		}else if($("#yzm").val()!=code){
			$("#yzmlb").html("验证码输入不正确");
		}else{
			$.post("userSeve.php",{UserName:$("#userName").val(),Password:$("#pwd").val()},function(data){
				if(data=="1"){
					alert("添加成功,快去登录了吧");
					location.href="login.php";
				}else{
					alert("添加失败");
				}
			});
		}
	});
	//验证用户名不能为空
	$("#userName").blur(function(){
		if($("#userName").val()==""){
			$("#userNamelb").html("用户名不能为空");
		}else{$("#userNamelb").html("");}
	});
	//验证密码不能为空
	$("#pwd").blur(function(){
		if($("#pwd").val()==""){
			$("#pwdlb").html("密码不能为空");
		}else{$("#pwdlb").html("");}
	});
	//2次验证密码不能为空
	$("#pwdyz").blur(function(){
		if($("#pwdyz").val()==""){
			$("#pwdyzlb").html("两次输入的密码不正确");
		}else{
			if($("#pwdyz").val()==$("#pwd").val()){
				$("#pwdyzlb").html("");
			}else{
				$("#pwdyzlb").html("两次输入的密码不正确");
			}
		}
	});
	//判断验证码不能为空，且要等于code值
	$("#yzm").blur(function(){
		if($("#yzm").val()==""){
			$("#yzmlb").html("验证码不能为空");
		}else{
			if($("#yzm").val()==code){
				$("#yzmlb").html("");
			}else{
				$("#yzmlb").html("验证码输入不正确");
			}
		}
	});
});
</script>