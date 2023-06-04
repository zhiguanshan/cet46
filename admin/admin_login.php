<?php 
	//include("../sqlsafe.php");
	include("../conn.php");
	$_SESSION['user'] = NULL;
	$_SESSION['admin'] = NULL;
	$username = $_POST['XH'];
	//$stu_id=$_POST['XH'];
	//$passwd = $_POST['passwd_1'];
	//echo $username;
	//echo $passwd;
	$passwd = base64_encode($_POST['passwd_1']);
	$sql = "select * from admin where admin_id='$username' and admin_passwd='$passwd'";
	$result = $db->query($sql);
	if($result->num_rows > 0){
		@session_start();
		$row=$result->fetch_assoc();
		$admin_name=$row["admin_name"];
		$_SESSION['name']=$admin_name;
		header("Location:admin.php");
	}
	else{
		echo "<script>alert('账户或密码错误'+$username)</script>";
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=admin_login.html\">";
	}
?>