<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:no-cache");
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
					<li id="log"><a href="">统一考试报名系统</a></li>
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
			<center>
				<form style="margin-top: 15px; width: 300px;height: 40px;" action="stu_course_search.php" method="post">
				<input style="height: 40px;" type="text" name="CD" id="CD" placeholder="按课程代码搜索" />
				<input style="height: 40px;" type="submit" value="搜索" />
			</form>
		</center>
		
		<?php
		$sql = "select * from sc where stu_name='$_SESSION[name]'";
		$result = $db->query($sql);
		$rows_num = $result->num_rows;
		?>
		<form action="user_action.php" method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
			<?php if ($rows_num > 0) { ?>
				<tr>
                    <th width="20%" height="25px" align="center">课程编号</th>
                    <th width="20%" height="25px" align="center">课程名称</th>
                    <th width="20%" height="25px" align="center">考试时间</th>
                    <th width="20%" height="25px" align="center">考试地点</th>
                    <th width="20%" height="25px" align="center">操作</th>
                </tr>
				
				<?php while ($row = $result->fetch_assoc()) { ?>
					<tr width="20%" height="25px" align="center">
						<td><?php echo $row["course_id"]; ?></td>

                        <td><?php echo $row["course_name"]; ?></td>

                        <td><?php echo date('Y-m-d', strtotime($row["time"])); ?></td>

                        <td><?php echo $row['addr']; ?></td>

                        <td>
                            <input type="button" name="button1" id="button1" value="开始考试" onclick="window.location.href='start_course.php?id=<?= $row['course_id'] ?>'" />
                        </td>

                        <td>
                            <input type="button" name="button2" id="button2" value="退考" onclick="window.location.href='tuikao.php?id=<?= $row['course_id'] ?>'" />
                        </td>
                    </tr>
					<?php } ?>
					
					<?php } else {
						echo "<tr><td colspan='5'>您还未报名任何科目</td></tr>";
						} ?>
						</table>
					</form>
				</div>
	</body>	
</html>