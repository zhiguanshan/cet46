<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<!DOCTYPE>
<html>
	<head>
		<title>统一考试报名系统</title>
		<meta http-equiv="content-type" charset="utf-8" />
		<link rel="stylesheet" href="../css/muban.css"/>
		<link rel="stylesheet" href="css/login_in.css"/>
	</head>
	<body background="../img/body_bg.jpg">
		<div class="header">
			<div class="nav">
				<ul>
					<li id="log"><a href="login.html">统一考试报名系统</a></li>
					<li id="item"><a href="login.html">首页</a></li>
					<li id="item"><a href="exam_infor1.php">考试信息</a></li>
					<li id="item"><a href="../news_index.html">新闻公告</a></li>
					<li id="item"><a href="../non-ess/contract.html">联系我们</a></li>
				</ul>
			</div>
		</div>
		<div class="left">
			<div class="left-first">
				<div class="left-first-img">
					<div class="photo">
						<img src="../login/img/user_photo.jpg" />
					</div>
					<span class="clear">
            		<span class="block m-t-sm">
              		<strong class="font-bold text-lt"><?php echo $_SESSION['name'];?></strong> 
              		<b class="caret"></b>
            	</span>
            	<span class="text-muted text-xs block">学生</span>
				</div>
				<ul class="ng-scope">
					<li id="ng-list">
						<a href="infor.php">科目信息</a>
					</li>
					<li id="ng-list">
						<a href="already.php">已报科目</a>
					</li>
					<li id="ng-list">
						<a href="information.php">用户信息</a>
					</li>
					<li id="ng-list">
						<a href="logout.php">注销账户</a>
					</li>
				</ul>
			</div>
			
		</div>		
		<div class="right">
			<div style="width: 360px;height: 360px;background-color: whitesmoke;margin: 50px auto;padding: 20px;
				border-radius:20px ;">
				<center><p><h1>用户资料卡</h1></p></center>
				<?php
					$username=$_SESSION['name'];
					//echo $username;
					$sql="select * from student where user_name='$username'";
					$result = $db->query($sql);
					
    				if ($result->num_rows > 0) {
    				// 输出数据
    					while($row = $result->fetch_assoc()) {
       					 echo "<b>学号：</b>" . $row["stu_id"]. "<br/><br/>" . "<b>姓名：</b> " . $row["user_name"].  "<br/><br/>";
       					 echo "<b>性别：</b>" . $row["sex"] . "<br/><br/>" . "<b>年龄：</b>" . $row["age"] ."岁" .  "<br/><br/>";
       					 echo "<b>身份证号：</b>" . $row["id"] . "<br/><br/>";
    					}
					} 
					else {
    					echo "0 结果";
					}
					$db->close();
				?>
				<form style="height: 40px;" action="" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
					<a href="xiugai01.php"><input style="width: 80px;height: 40px;margin-right: 20px;margin-left: 50px;" type="button" id="" name="ZL" value="修改资料" /></a>
					<a href="xiugai02.php"><input style="width: 80px;height: 40px;" type="button" id="" name="MM" value="修改密码"/></a>
					</div>
				</form>
			</div>
		</div>
	</body>	
</html>