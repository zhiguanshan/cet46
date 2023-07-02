<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
	$cid=$_GET['id'];
	$tid=$_SESSION['admin_id'];
	//echo $id;
	$sq1="DELETE FROM `exam`.`tc`WHERE`tea_id`='$tid' AND`cou_id` ='$cid'";
	$res1=$db->query($sq1);
	if($res1){
		exit('成功取消监考！点击此处 <a href="teachers.php">返回</a>');  
	}	
	else{
		echo '抱歉！取消监考失败：',mysql_error(),'<br />';  
    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
	}
?>