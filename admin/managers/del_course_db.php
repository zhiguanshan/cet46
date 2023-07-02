
<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    


//包含数据库连接文件  	
include('../../conn.php');  
$CD=$_POST['CD'];
$sql = "delete  from course where course_id='$CD'";
$sql1 = "delete from sc where course_id='$CD'";
$sql2 = "delete from tc where course_id='$CD'";
if($db->query($sql)&&$db->query($sql1)&&$db->query($sql2)){  
    exit("考试科目删除成功！点击此处  <a href=\"managers.php\">返回</a>");  
} 
else {  
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  