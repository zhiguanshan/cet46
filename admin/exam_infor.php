<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>
<!DOCTYPE>
<html>
	<head>
		<title>英语四六级考试管理系统</title>
		<meta http-equiv="content-type" charset="utf-8" />
		<link rel="stylesheet" href="../css/muban.css"/>
		<link rel="stylesheet" href="css/login_in.css"/>
	</head>
	<body background="../img/body_bg.jpg">
		<div class="header">
			<div class="nav">
				<ul>
					<li id="log"><b>英语四六级考试管理系统</b></li>
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
		<div class="right">
			<center>
			<form style="margin-top: 15px; width: 300px;height: 40px;" action="course_search.php" method="post">
				<input style="height: 40px;" type="text" name="CD" id="CD" placeholder="按课程代码搜索" />
				<input style="height: 40px;" type="submit" value="搜索"/>
			</form>
			</center>
			<?php
				$sql = "SELECT * FROM course";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form action="admin_manage.php" method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="30%" height="25px" align="center">课程编号</th>
					<th width="40%" height="25px" align="center">课程名称</th>
					<th width="30%" height="25px" align="center">考试时间</th>
				</tr>
			<?php 
				while($row=$result->fetch_assoc()){  
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\">";  	
            		echo "<td>";
            		echo $row["course_id"];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row["course_name"];
            		echo "</td>";
            		            		
            		echo "<td>";
            		echo date('Y-m-d',strtotime($row["time"]));
            		echo "</td>";      
            	}
			?>
			</table
			</form>
		</div>
	</body>	
</html>