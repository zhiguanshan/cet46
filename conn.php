<?php
	$servername="localhost";
	$username="root";
	$passwd="";
	$dbname="exam";
	$db = new mysqli($servername,$username,$passwd,$dbname);
	if(mysqli_connect_errno()){
		echo "数据库连接失败";
		exit();
	}
?>
