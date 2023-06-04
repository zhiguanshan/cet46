
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    

//课程信息判断  
if(strlen($_POST['CD']) != 6){  
    exit('错误：课程代码不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  

//包含数据库连接文件  	
include('../conn.php');  

$sql = "delete  from course where course_id='$_POST[CD]'";
$sql1 = "delete from sc where course_id='$_POST[CD]'";
if($db->query($sql)&&$db->query($sql1)){  
    exit('考试科目删除成功！点击此处  <a href="javascript:history.back(-1);">返回</a>');  
} 
else {  
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  