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
					<li id="item"><a href="exam.php">考试信息</a></li>
					<li id="item"><a href="../news_index.html">新闻公告</a></li>
					<li id="item"><a href="../non-ess/contract.html">联系我们</a></li>
				</ul>
			</div>
		</div>
		<div class="right" style="margin: 0 150px;">
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