
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    
$CD=$_POST['CD'];
$CN=$_POST['CN'];
$CT=$_POST['CT'];
$CA=$_POST['CA'];
$HI=$_POST['HI'];

//课程信息判断  
if(strlen($_POST['CD']) != 6){  
    exit('错误：课程代码不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  

//包含数据库连接文件  	
include('../conn.php');  

$sql = "update course set course_name='$CN',course_id='$CD',time='$CT',addr='$CA' where course_id='$HI'";
if($db->query($sql)){  
    exit('考试科目修改成功！<a href="javascript:history.back(-1);">返回</a>');  
} 
else {  
    echo '抱歉！修改数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  