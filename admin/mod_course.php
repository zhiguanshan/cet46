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
					<li id="log"><a href="login.html">统一考试报名系统</a></li>
					<li id="item"><a href="login.html">首页</a></li>
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
			<form action="mod_course_show.php" method="post">
			<div id="del_course">
				<center><p><h1>请输入要修改的课程代码</h1></p></center>
				<br />
				<center>
					<div>
					<b>科目代码：</b>
						<input type="text" name="CD"/>
					<br /><br />
					</div>
				</center>
				<center>
					<input type="submit" name="submit" id="submit" value="确认" />
				</center>
			</div>
			</form>
			<?php
				$sql = "SELECT * FROM course";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form action="admin_manage.php" method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="25%" height="25px" align="center">课程编号</th>
					<th width="25%" height="25px" align="center">课程名称</th>
					<th width="25%" height="25px" align="center">考试时间</th>
					<th width="25%" height="25px" align="center">考试地点</th>
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
            	                       			
              		echo "<td>";
              		echo $row["addr"];
            		echo "</td>";
            		echo "<tr>";
            	}
			?>
			</table>
			</form>
		</div>
	</body>	
</html>