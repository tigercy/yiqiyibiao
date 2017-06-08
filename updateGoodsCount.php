<?php
	header("Content-Type:text/html;charset=utf-8");
	//1、接受客户端的数据（用户输入的数据）
	$vipName   = $_REQUEST['vipName'];
	$goodsId   = $_REQUEST['goodsId'];
	$goodsCount = $_REQUEST['goodsCount'];
	
	include("conn2.php");
	$sqlstr = "update shoppingCart set goodsCount='".$goodsCount."' where vipName='".$vipName."' and goodsId='".$goodsId."'";
	//echo($sqlstr);
	$result=true;
	if(!mysql_query($sqlstr,$conn)){
		$result=false;
	}
	//4）、关闭连接（拆桥）
	mysql_close($conn);
	
	//3、给客户端返回（响应）一个注册成功！
	echo $result;
?>