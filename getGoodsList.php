<?php
	header("Content-Type:text/html;charset=utf-8");	
	include("conn2.php");
	$sqlstr = "select * from product";
	$result = mysql_query($sqlstr,$conn);//执行查询的sql语句后，有返回值，返回的是查询结果
	$query_cols = mysql_num_fields($result);
	//查询行数
    $query_num =mysql_num_rows($result);
    //echo "行数：".$query_num;
	$str="[";
	$query_row = mysql_fetch_array($result);//游标下移,拿出结果集中的某一行，返回值是拿到的行；
	while($query_row){
		$str = $str."{ 'ID':'".$query_row[0]."','Title':'".$query_row[1]."'
		,'Content':'".$query_row[2]."','fenlei':'".$query_row[3]."'
		,'AddDate':'".$query_row[4]."','Hits':'".$query_row[5]."'
		,'YTitle':'".$query_row[6]."','Ykeywords':'".$query_row[7]."'
		,'Ydescription':'".$query_row[8]."','Upimg':'".$query_row[9]."'
		}";
		$query_row = mysql_fetch_array($result);
		if($query_row){
			$str = $str.",";
		}
	}
	$str = $str."]";
	//4、关闭数据库
	mysql_close($conn);
	//3、给客户端返回商品的json数组！
	echo $str;
?>
