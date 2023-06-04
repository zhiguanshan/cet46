
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
	$user_name=$_SESSION['name'];
	$passwd_1=$_POST['MM'];
	$passwd_2=$_POST['MM1'];
	$passwd=base64_encode($passwd_1);
	if(strlen($passwd_1) < 6){  
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
	}
	  
	if($passwd_1!=$passwd_2){  
    exit('错误：两次输入的密码不匹配。<a href="javascript:history.back(-1);">返回</a>');  
	}
	
	$sql="update student set stu_passwd='$passwd' where user_name='$user_name'";
	if($db->query($sql))
	{
		exit('用户信息修改成功！点击此处 <a href="login.html">返回</a>');  
	}
	else{
		echo '抱歉！修改失败：',mysql_error(),'<br />';  
    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
	}
	$db->close();
?>