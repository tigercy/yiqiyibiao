<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>仪器仪表网-登录页面</title>
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
		<section id="main" class="bg1">
			<div class="main_c clear">
				<div id="login">
					<h3><span>账号登录</span></h3>
					<ul>
						<li><input id="userName" type="text"  placeholder="用户名/手机号/邮箱" />
							<label id="userNamelb"></label>
						</li>
						<li><input id="pwd" type="password" placeholder="密码"/>
							<label id="pwdlb"></label>
						</li>
						<li class="zddl"><input type="checkbox" id="zddl"/>自动登录</li>
						<li><input type="button" id="btn" value="登录"/></li>
					</ul>
					<div class="clear"><a href="register.html" class="zhuce">注册</a><a href="#" class="wjmm">忘记密码</a></div>
					<div class="fenxiang clear">
						<div class="zhuce kuaiji1">
								<dl>
                                    <dt>使用合作账号登录：</dt>
                                    <dd class="other-login">
                                        <a class="i-qq Left" href="#"></a>
                                        <a class="i-weibo Left" href="#"></a>
                                        <a class="i-weixin Left" href="#"></a>
                                        <a class="i-zhifubao Left" href="#"></a>
                                    </dd>
                               </dl>
						</div>
						<div class="wjmm kuaiji2">
								<dl>
                                    <dt>您还可以选择：</dt>
                                    <dd class="other-login shouji">
                                        <a class="i-mobile Left" href="#"></a>手机快捷登录
                                    </dd>
                              </dl>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer>
				<p>仪器仪表自动化&nbsp;&nbsp;版权所有 Copyright&nbsp;©&nbsp;2008-2017&nbsp;1718ZDH&nbsp;Corporation,&nbsp;All&nbsp;Rights&nbsp;Reserved
               &nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="index.html">仪表首页</a><span>|</span>
                <a target="_blank" href="#">官方微博</a><span>|</span>
                <a target="_blank" href="#">意见反馈</a><span>|</span>
				<a target="_blank" href="#">意见反馈</a><span>|</span>
				</p>
		</footer>
	</body>
</html>
<script>
$(function(){
		$("#btn").click(function(){
		if($("#userName").val()==""){
			$("#userNamelb").html("用户名不能为空");
		}else if($("#pwd").val()==""){
			$("#pwdlb").html("密码不能为空");
		}else{
				$.post("logingo.php",{UserName:$("#userName").val(),Password:$("#pwd").val()},function(data){
					if(data=="1"){
						alert("登录成功");
						location.href="index.php";
						 setCookie("userName",$("#userName").val(),5);
					}else{
						$("#userNamelb").html("用户名名或密码错误");
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
	
});
	
function setCookie(key,value,dayCount){
	var d = new Date();
	d.setDate(d.getDate()+dayCount);
	document.cookie = encodeURIComponent(key+"="+value)+";expires="+d.toGMTString();
}
</script>