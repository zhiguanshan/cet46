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
		<link rel="stylesheet" type="text/css" href="css/add_course.css"/>
	</head>
	<body background="../img/body_bg.jpg">
		<div class="header">
			<div class="nav">
				<ul>
					<li id="log"><a>统一考试报名系统</a></li>
					<li id="item"><a href="admin_login.html">首页</a></li>
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
						<a href="admin_infor.php">科目信息</a>
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
		<div class="right">
			<form action="add_course_db.php" method="post">
			<div id="xx">
				<center><p><h1>科目信息</h1></p></center>
				<br />
				<center>
					<div>
					<b>科目代码：</b>
						<input type="text" name="CD"/>
					<br /><br />
					<b>科目名称：</b>
						<input type="text" name="CN"/>
					<br /><br />
					<b>考试时间：</b>
					<input type="text" name="CT"/>
					<br /><br />
					<b>考试地点：</b>
					<input type="text" name="CA"/>
					<br /><br />
					</div>
				</center>
				<center>
					<input type="submit" name="submit" id="submit" value="添加" />
					<input type="reset" value="重置" />
				</center>
				</form>
			</div>
		</div>
	</body>	
</html>