
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    
$c_id=$_POST['CD'];
$c_name=$_POST['CN'];
$c_time=$_POST['CT'];
$c_addr=$_POST['CA'];
//课程信息判断  
if(strlen($c_id) != 6){  
    exit('错误：课程代码不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  
/*
if($passwd_1!=$passwd_2){  
    exit('错误：两次输入的密码不匹配。<a href="javascript:history.back(-1);">返回</a>');  
} 
*/
//if(!preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/', $email)){  
//    exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');  
//}  
//包含数据库连接文件  
include('../conn.php');  
//检测用户名是否已经存在  
$result = $db->query("select * from course where course_id='$c_id';");  

if($result->num_rows > 0){  
    echo '错误：科目号 ',$c_id,' 号已存在。课程名为'.$row['course_name'].'<a href="javascript:history.back(-1);">返回</a>';  
    exit;  
}  

$sql = "INSERT INTO course(course_name,course_id,time,addr) 
	  VALUES ('$_POST[CN]','$_POST[CD]','$_POST[CT]','$_POST[CA]')";
if($db->query($sql)){  
    exit('考试科目添加成功,点击此处 <a href="javascript:history.back(-1);">返回</a>');  
} 
else {  
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  