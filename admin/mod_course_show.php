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
					<li id="item"><a href="admin.php">首页</a></li>
					<li id="item"><a href="exam_infor.php">考试信息</a></li>
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
            	<span class="text-muted text-xs block">管理员</span>
				</div>
				<ul class="ng-scope">
					<li id="ng-list">
						<a href="admin.php">科目信息</a>
					</li>
					<li id="ng-list">
						<a href="add_course.php">添加科目</a>
					</li>
					<li id="ng-list">
						<a href="del_course.php">删除科目</a>
					</li>
					<li id="ng-list">
						<a href="mod_course.php">修改科目</a>
					</li>
				</ul>
			</div>
			
		</div>		
		<?php
			$id=$_POST['CD'];
			//echo $username;
			$sql="select * from course where course_id='$id'";
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
				<form style="height: 200px;" action="mod_course_db.php" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
						<b>课程代码：</b>
						<?php	
							echo "<input type=\"text\" name=\"CD\" id=\"CD\" value=\"$row[course_id]\">";
						?>
						<br/><br/>
						<b>科目名称：</b>
						<?php	
							echo "<input type=\"text\" name=\"CN\" id=\"CN\" value=\"$row[course_name]\">";
						?>
						<br/><br/>
						<b>考试时间：</b>
						<?php	
							echo "<input type=\"text\" name=\"CT\" id=\"CT\" value=\"$row[time]\">";
						?>
						<br /><br/>
						<b>考试地点：</b>
						<?php	
							echo "<input type=\"text\" name=\"CA\" id=\"CA\" value=\"$row[addr]\">";
						?>
						<br/><br/>	
						<?php	
							echo "<input type=\"hidden\" name=\"HI\" id=\"HI\" value=\"$row[course_id]\">";
						?>	
						<center><input style="width: 100px;height: 40px;" type="submit" id="submit" name="submit" value="提交"/></center>
					</div>
				</form>
			</div>
		</div>
	</body>	
</html>