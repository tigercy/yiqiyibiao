<?php
	header("Content-Type:text/html;charset=utf-8");
	//1、接受客户端的数据（用户输入的数据）
	$vipName   = $_REQUEST['vipName'];
	$goodsId   = $_REQUEST['goodsId'];
	include("conn2.php");
	//insert语句
	$sqlstr = "delete from  shoppingCart where vipName='".$vipName."' and goodsId='".$goodsId."'";
	$result=true;
	if(!mysql_query($sqlstr,$conn)){
		$result=false;
	}
	//4）、关闭连接（拆桥）
	mysql_close($conn);
	//3、给客户端返回（响应）！
	echo $result;
?>