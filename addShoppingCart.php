<?php
	header("Content-Type:text/html;charset=utf-8");
	//1、接受客户端的数据（用户输入的数据）
	$vipName   = $_REQUEST['vipName'];
	$goodsId   = $_REQUEST['goodsId'];
	$goodsCount = $_REQUEST['goodsCount'];
	include("conn2.php");
	$Sql="select * from shoppingCart where vipName='".$vipName."' and  goodsId='".$goodsId."'";	
	$result=mysql_query($Sql,$conn);	
	$rows=mysql_fetch_array($result);
	if($rows){
		$count=$rows[goodsCount];
		$goodsCount+=$count;
			//如果有执行添加事件
			$sqlstr = "update shoppingCart set goodsCount=".$goodsCount." where vipName='".$vipName."' and goodsId='".$goodsId."'";			
			$result=true;
			if(!mysql_query($sqlstr,$conn)){
				$result=false;
			}
			mysql_close($conn);
			echo $result;
	}else{
		//如果没有执行添加事件
		$sqlstr = "insert into shoppingCart values('".$vipName."','".$goodsId."',".$goodsCount.")";
		echo $sqlstr;
		$result=true;
		if(!mysql_query($sqlstr,$conn)){
				$result=false;
		}
		mysql_close($conn);
		echo $result;
	}
	
?>