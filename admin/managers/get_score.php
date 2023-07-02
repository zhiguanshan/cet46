
<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    
$c_id=$_POST['CI'];
$q_id=$_POST['QI'];
$s_id=$_POST['SI'];
$sn=$_POST['SN'];
$cd=$_POST['CD'];
//课程信息判断  
if($sn<$cd||$cd<0){  
    exit('错误:分值应在0到总分值之间。<a href="javascript:history.back(-1);">返回</a>');  
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
include('../../conn.php');  
//检测用户名是否已经存在  
$sql = "UPDATE `exam`.`answers` SET `get_score` = '$cd' WHERE (`cou_id` = '$c_id') and (`que_id` = '$q_id') and (`stu_id` = '$s_id');";
if($db->query($sql)){  
    exit('提交成功,点击此处 <a href="javascript:history.back(-1);">返回</a>');  
} 
else {  
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  