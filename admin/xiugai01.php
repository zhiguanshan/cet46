
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
		<?php
					$username=$_SESSION['name'];
					//echo $username;
					$sql="select * from student where user_name='$username'";
					$result = $db->query($sql);
					
    				if ($result->num_rows > 0) {
    				// 输出数据
    					$row=$result->fetch_assoc();
					} 
					else {
    					echo "0 结果";
					}
					$db->close();
		?>		
		<div class="right">
			<div style="width: 360px;height: 360px;background-color: whitesmoke;margin: 50px auto;padding: 20px;
				border-radius:20px ;">
				<center><p><h1>修改信息</h1></p></center>
				<br />
				<form style="height: 200px;" action="xiugai01_db.php" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
						<b>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</b>
						<?php	
							$username=$_SESSION['name'];echo "<input type=\"text\" name=\"XM\" id=\"XM\" value=\"$username\">";
						?>
						<br/><br/>
						<b>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</b>
						<?php	
							echo "<input type=\"text\" name=\"XH\" id=\"XH\" value=\"$row[stu_id]\">";
						?>
						<br/><br/>
						<b>身份证号：</b>
						<?php	
							echo "<input type=\"text\" name=\"ID\" id=\"ID\" value=\"$row[id]\">";
						?>
						<br /><br/>
						<!--<b>性别：</b>
						<input type="radio" name="XB" id="XB" value="男" checked="checked"/>男
						<input type="radio" name="XB" id="XB" value="女" checked=""/>女
						<br/><br/>	-->	
						<center><input style="width: 100px;height: 40px;" type="submit" id="submit" name="subit" value="提交"/></center>
					</div>
				</form>
			</div>
		</div>
	</body>	
</html>