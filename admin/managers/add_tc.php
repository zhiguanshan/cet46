<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
	$cid=$_GET['id'];
	$tid=$_SESSION['admin_id'];
	//echo $id;
	$sq1="INSERT INTO `exam`.`tc` (`tea_id`, `cou_id`) VALUES ('$tid', '$cid');";
	$res1=$db->query($sq1);
	if($res1){
		exit('成功报名监考！点击此处 <a href="teachers.php">返回</a>');  
	}	
	else{
		echo '抱歉！报名监考失败：',mysql_error(),'<br />';  
    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
	}
?>