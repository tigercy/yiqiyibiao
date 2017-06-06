<?php
	header("Content-Type:text/html;charset=utf-8");
	
	$goodsId   = $_REQUEST['goodsId'];	
	//2、数据保存在数据库中
	//1）、建立连接（搭桥）
	include("conn2.php");
	//3）、传输数据（过桥）
	$sqlstr = "select * from product where ID='".$goodsId."'";
	$result = mysql_query($sqlstr,$conn);//执行查询的sql语句后，有返回值，返回的是查询结果
	//查询列数
	 $query_cols = mysql_num_fields($result);
	 //echo "列数：".$query_cols;
	//查询行数
    $query_num =mysql_num_rows($result);
    //echo "行数：".$query_num;
	$str="";
	$query_row = mysql_fetch_array($result);
	if($query_row){
		$str = $str.'{"ID":"'.$query_row[0].'","Title":"'.$query_row[1].'"
		,"Content":"'.$query_row[2].'","fenlei":"'.$query_row[3].'"
		,"AddDate":"'.$query_row[4].'","Hits":"'.$query_row[5].'"
		,"YTitle":"'.$query_row[6].'","Ykeywords":"'.$query_row[7].'"
		,"Ydescription":"'.$query_row[8].'","Upimg":"'.$query_row[9].'"}';		
	}
	//4、关闭数据库
	mysql_close($conn);
	//3、给客户端返回商品的json数组！
	echo $str;
?>
