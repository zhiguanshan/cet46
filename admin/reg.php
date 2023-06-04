<?php   
$username = $_POST['XM'];  
$passwd_1 = $_POST['passwd_1']; 
$passwd_2 = $_POST['passwd_2']; 
$ID=$_POST['ID'];
//注册信息判断  
if(strlen($passwd_1) < 6){  
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  
if($passwd_1!=$passwd_2){  
    exit('错误：两次输入的密码不匹配。<a href="javascript:history.back(-1);">返回</a>');  
} 
if(strlen($ID) != 18){  
    exit('错误：身份证号码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  
//包含数据库连接文件  
include('../conn.php');  
//检测用户名是否已经存在  
$result = $db->query("select user_name from student where user_name='$username';");  
if($result->num_rows > 0){  
    echo '错误：用户名 ',$username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';  
    exit;  
}  
if(intval($_POST['ID'][16])%2==0)
	{
		$XB="女";
	}
	else
	{
		$XB="男";
	}	
$year=substr($_POST['ID'],6,4);
$age=date('Y')-intval($year);
$base64encode=base64_encode($_POST['passwd_1']);
//写入数据   
$sql = "INSERT INTO student(user_name,stu_id,sex,age,stu_passwd,id) 
	  VALUES ('$_POST[XM]','$_POST[XH]','$XB',$age,'$base64encode','$_POST[ID]')";
if($db->query($sql)){  
    exit('用户注册成功！点击此处 <a href="login.html">登录</a>');  
} else {  
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  