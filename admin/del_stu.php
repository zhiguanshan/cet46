<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
	$id=$_GET['id'];
	//echo $id;
	$sq1="delete  from student where stu_id='$id'";
	$sq2="delete  from sc where stu_id='$id'";
	$res1=$db->query($sq1);
	$res2=$db->query($sq2);
	if($res1 && $res2){
		exit('学生信息删除成功！点击此处 <a href="admin.php">返回</a>');  
	}	
	else{
		echo '抱歉！删除数据失败：',mysql_error(),'<br />';  
    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
	}
	
	$db->query("delete from sc where stu_id='$id'");
?>