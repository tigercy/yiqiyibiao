<?php
	$conn = @ mysql_connect("127.0.0.1", "root", "root") or die("数据库链接错误");
	mysql_select_db("shopDB", $conn);
	mysql_query("set names utf8"); 
?>