<?php
	header("Content-type:text/html;charset=utf-8");
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];	
	include("conn.php");
	$Sql="select * from usertb where username='".$UserName."' and pwd='".$Password."'";	
	$result=mysql_query($Sql,$conn);	
	$rows = mysql_num_rows($result);
	mysql_close($conn);
	if($rows>0){
		echo "1";
	}else{
		echo "0";
	}
?>