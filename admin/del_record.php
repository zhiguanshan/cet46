
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php    

$cid=$_GET['cid'];
$sid=$_GET['sid'];

$sql = "delete from sc where course_id='$cid' and stu_id='$sid'";
if($db->query($sql)){  
    exit('项目删除成功！点击此处<a href="javascript:history.back(-1);">返回</a>>');  
}
 
else {  
    echo '抱歉！删除失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  