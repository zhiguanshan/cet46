<?php 
	include("../conn.php");
	$_SESSION['user'] = NULL;
	$username = $_POST['XH'];
	$passwd = base64_encode($_POST['passwd_1']);
	echo $username;
	echo $passwd;
	$sql = "select * from student where stu_id='$username' and stu_passwd='$passwd'";
	$result = $db->query($sql);
	if($result->num_rows > 0){
		@session_start();
		$row=$result->fetch_assoc();
		$stu_name=$row["user_name"];
		$_SESSION['name']=$stu_name;
		header("Location:infor.php");
	}
	else{
		echo "<script>alert($username+' '+'账户或密码错误')</script>";
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=login.html\">";
	}
?>