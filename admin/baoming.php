<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>




<?php
	$username=$_SESSION['name'];
	$id=$_GET['id'];

	//获取学生信息
	$sql = "SELECT * FROM student where user_name='$username'";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
    // 输出数据
    	while($row = $result->fetch_assoc()) {
       		$stu_name=$row['user_name'];
       		$stu_id=$row['stu_id'];
    	}
	} 
	else {
    	echo "学生不存在";
	}
	
	
	$sql = "SELECT * FROM course where course_id='$id'";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
    // 输出数据
    	while($row = $result->fetch_assoc()) {
       		$course_id=$row['course_id'];
       		$course_name=$row['course_name'];
       		$time=$row['time'];
       		$addr=$row['addr'];	
    	}
	} 
	else {
    	echo "课程不存在";
	}
	
/*	$res=$db->query("select * from sc where stu_id='$stu_id' and course_id='$course_id';");
	if($res->num_rows>0){
		echo "报名已存在";
		echo '点击此处 <a href="javascript:history.back(-1);">返回</a>';  
	}
	else{*/
		$sq = "INSERT INTO sc (stu_id,stu_name,course_name,course_id,time,addr) VALUES ('$stu_id','$stu_name','$course_name','$course_id','$time','$addr')";
		if($db->query($sq)){  
			echo "报名成功";			
	    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
		} 
		else {  
	    	echo '抱歉！报名失败：',mysql_error(),'<br />';  
	    	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
		}  
	/*}*/
	$db->close();
?>