<?php
	header("Content-type:text/html;charset=utf-8");
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];	
	include("conn.php");
	$Sql="insert into usertb(username,pwd) values('".$UserName."','".$Password."')";	
	$result=mysql_query($Sql,$conn);	
	$rows = mysql_affected_rows();
	mysql_close($conn);
	if($rows>0){
		echo "1";
	}else{
		echo "0";
	}
?>