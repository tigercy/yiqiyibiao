<?php
	$conn=@mysql_connect("127.0.0.1", "root", "root",3306) or die("数据库链接错误");
	mysql_select_db("yqybdb", $conn);
	mysql_query("set names utf8");
?>