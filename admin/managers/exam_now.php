<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>
<!DOCTYPE>
<html>
	<head>
		<title>统一考试报名系统</title>
		<meta http-equiv="content-type" charset="utf-8" />
		<link rel="stylesheet" href="css/managers_index.css"/>
		<link rel="stylesheet" href="css/managers_menu.css"/>
	</head>
	<body background="../../img/body_bg.jpg">
		<div class="header">
			<div class="nav">
				<ul>
					<li id="log"><a>统一考试报名系统</a></li>
					<li id="item"><a href="../admin_login.html">首页</a></li>
					<li id="item"><a href="../exam_infor.php">考试信息</a></li>
					<li id="item"><a href="../../news_index.html">新闻公告</a></li>
					<li id="item"><a href="../../non-ess/contract.html">联系我们</a></li>
				</ul>
			</div>
		</div>
        <div class="left">
			<div class="left-first">
				<div class="left-first-img">
					<div class="photo">
						<img src="../../login/img/user_photo.jpg" />
					</div>
					<span class="clear">
            		<span class="block m-t-sm">
              		<strong class="font-bold text-lt"><?php echo $_SESSION['name'];?></strong> 
              		<b class="caret"></b>
            	</span>
            	<span class="text-muted text-xs block">管理员</span>
				</div>
			</div>
			<div id="ng-scope">
                <ul>
				    <li class="ng-list">
                    <a href="managers.php">考试管理</a>
                        <ul class="ng-sublist">
                            <li><a href="managers.php">现有考试</a></li>
							<li><a href="managers.php">添加考试</a></li>
                            <li><a href="managers.php">以往查询</a></li>
                        </ul>
				    </li> 
				    <li class="ng-list">
                    <a href="managers.php">学生管理</a>
				    </li>
				    <li class="ng-list">
                    <a href="managers.php">个人资料</a>
				    </li>
				    <li class="ng-list">
					    <a href="../logout.php">注销</a>
				    </li>
                </ul>
            </div>	
		</div>		
        <div id="content">      
            <div>
            <?php
				$cid=$_GET['id'];
				$sql = "SELECT * FROM course WHERE course_id ='$cid'";
				$result = $db->query($sql);
			?>
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="25%" height="25px" align="center">考试编号</th>
					<th width="25%" height="25px" align="center">考试名称</th>
					<th width="25%" height="25px" align="center">考试时间</th>
					<th width="25%" height="25px" align="center">考试地点</th>
				</tr>
			<?php 
				$row=$result->fetch_assoc() ;
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
            	
			?>
			</table>
            </div>
			<div class="container">
			<div style="width: 360px;height: 360px;background-color: whitesmoke;padding: 20px;border-radius:20px ;">
			<center><p><h1>增加题目</h1></p></center>
				<br />
				<form style="height: 200px;" action="add_ques.php" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
						<b>题目编号：</b>
						<?php	
							echo "<input type=\"text\" name=\"CN\" id=\"CN\">";
						?>
						<br/><br/>
						<b>题目描述：</b>
						<?php	
							echo "<input type=\"text\" name=\"CT\" id=\"CT\">";
						?>
						<br /><br/>
						<b>题目答案：</b>
						<?php	
							echo "<input type=\"text\" name=\"CA\" id=\"CA\" placeholder='0为简答题,1-4为选择题答案'>";
						?>
						<br/><br/>	
						<b>题目分值：</b>
						<?php	
							echo "<input type=\"text\" name=\"HI\" id=\"HI\">";
						?>
						<br/><br/>	
						<?php	
							echo "<input type=\"hidden\" name=\"CD\" id=\"CD\" value=\"$cid\">";
						?>
						<div style="margin: 0 auto;width: 300px;height: 40px;" align="center">
						<input style="width: 100px;height: 40px;" type="submit" id="submit" name="submit" value="添加题目"/>
						</div>
					</div>
				</form>
			</div>
			<div style="width: 360px;height: 360px;background-color: whitesmoke;padding: 20px;border-radius:20px ;margin-left:30px;">
				<center><p><h1>修改信息</h1></p></center>
				<br />
				<form style="height: 200px;" action="mod_course_db.php" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
						<b>课程代码：</b>
						<?php	
							echo "<input type=\"text\" disabled='true' name=\"CD\" id=\"CD\" value=\"$row[course_id]\">";
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
						<form style="height: 40px;">
						<div style="margin: 0 auto;width: 300px;height: 40px;" align="center">
						<input style="width: 100px;height: 40px;" type="submit" id="submit" name="submit" value="提交修改"/>
						</div>
						</form>
					</div>
				</form>
				<br />
				<form style="height: 40px;" action="del_course_db.php" method="post">
				<div style="margin: 0 auto;width: 300px;height: 40px;" align="center">
				<?php	
							echo "<input type=\"hidden\" name=\"CD\" id=\"CD\" value=\"$row[course_id]\">";
						?>
				<input style="width: 100px;height: 40px;" type="submit" id="submit" name="submit" value="删除此次考试"/>
			</div>
				</form>
			</div>

			</div>

        </div>

</script>
    </body>	
</html>