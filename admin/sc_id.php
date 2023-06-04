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
						<a href="sc_id.php">报考信息</a>
					</li>
					<li id="ng-list">
						<a href="stu_infor.php">学生信息</a>
					</li>
					<li id="ng-list">
						<a href="admin_information.php">个人信息</a>
					</li>
					<li id="ng-list">	
						<a href="logout.php">注销用户</a>
					</li>
				</ul>
			</div>
			
		</div>		
		<div class="right">
			<center>
			<form style="margin-top: 15px; width: 300px;height: 40px;" action="record_search.php" method="post">
				<input style="height: 40px;" type="text" name="CD" id="CD" placeholder="按学号或科目代码搜索" />
				<input style="height: 40px;" type="submit" value="搜索"/>
			</form>
			</center>
			<?php
				$sql = "SELECT * FROM sc";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
				if($rows_num<=0){
					echo '0记录：',mysql_error(),'<br />';  
   					echo '点击此处 <a href="javascript:history.back(-1);">返回</a>';  
				}
				else{
			?>
			<form action="" method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="15%" height="25px" align="center">学号</th>
					<th width="10%" height="25px" align="center">姓名</th>
					<th width="15%" height="25px" align="center">科目代码</th>
					<th width="15%" height="25px" align="center">科目名称</th>
					<th width="10%" height="25px" align="center">考试时间</th>
					<th width="20%" height="25px" align="center">考试地点</th>
					<th width="15%" height="25px" align="center">操作</th>
				</tr>
			<?php 
				
				while($row =$result->fetch_assoc()){  
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\">";  	
            		echo "<td>";
            		echo $row['stu_id'];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row['stu_name'];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row['course_id'];
            		echo "</td>";
            	                              	                       				
            		echo "<td>";
            		echo $row['course_name'];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row['time'];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row['addr'];
            		echo "</td>";		
			?>
				<td>
					<input type="button" name="button" id="button" value="删除"  
						onclick="window.location.href='del_record.php?sid=<?=$row['stu_id']?>'+'&&cid=<?=$row['course_id']?>'"/>	
				</td>
				
			<?php            		
            		echo "</tr>";
            	}
            }
			?>
			</table>
			</form>
		</div>
	</body>	
</html>