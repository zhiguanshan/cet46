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
					    考试管理
                        <ul class="ng-sublist">
                            <li onclick="showTable('1')">现有考试</li>
							<li onclick="showTable('5')">添加考试</li>
                            <li onclick="showTable('2')">以往查询</li>
                        </ul>
				    </li> 
				    <li class="ng-list" onclick="showTable('3')">
					    学生管理
				    </li>
				    <li class="ng-list" onclick="showTable('4')">
					    个人资料
				    </li>
				    <li class="ng-list">
					    <a href="../logout.php">注销</a>
				    </li>
                </ul>
            </div>	
		</div>		
        <div id="content">
            <div id="exam-now">
            <?php
				$sql = "SELECT * FROM course WHERE ongoing='1'";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form >
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="25%" height="25px" align="center">考试编号</th>
					<th width="25%" height="25px" align="center">考试名称</th>
					<th width="25%" height="25px" align="center">考试时间</th>
					<th width="25%" height="25px" align="center">考试地点</th>
				</tr>
			<?php 
				while($row=$result->fetch_assoc()){  
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\" onclick=\"showDetails(" . $row["course_id"] . ")\">";  	
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
			<div id="exam-add">
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
            <div id="exam-past">
            <form class="search-box" action="exam_past.php" method="post">
            <input type="text" name="CD" id="CD" placeholder="输入关键词" />
				<input type="submit" value="搜索"/>
            </form>
            <?php
				$sql = "SELECT * FROM course WHERE ongoing='0'";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form >
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="25%" height="25px" align="center">考试编号</th>
					<th width="25%" height="25px" align="center">考试名称</th>
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
        
            <div id="student-manage">
				
			<form class="search-box" action="student_manage.php" method="post">
				<input type="text" name="CD" id="CD" placeholder="按姓名搜索" />
				<input type="submit" value="搜索"/>
			</form>
			
			<?php
				$sql = "SELECT * FROM student";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form>
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="20%" height="25px" align="center">学号</th>
					<th width="20%" height="25px" align="center">姓名</th>
					<th width="20%" height="25px" align="center">年龄</th>
					<th width="20%" height="25px" align="center">性别</th>
					<th width="20%" height="25px" align="center">操作</th>
				</tr>
			<?php 
				while($row=$result->fetch_assoc()){  
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\">";  	
            		echo "<td>";
            		echo $row["stu_id"];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row["user_name"];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row["age"];
            		echo "</td>";
            	                              	                       				
            		echo "<td>";
            		echo $row["sex"];
            		echo "</td>";
            		
            			
            ?>
	            	<td>
	            		<input type="button" name="button" id="button" value="删除" 
	            			onclick="window.location.href='del_stu.php?id=<?=$row['stu_id']?>'"/>
	            	</td>
	            	</tr>
            <?php		
            	}
			?>
				
			</table>
			</form>
            </div>

            <div id="my-info">
            <div style="width: 360px;height: 360px;margin: 0px auto;background-color: whitesmoke;padding: 20px;
				border-radius:20px ;">
				<center><p><h1>用户资料卡</h1></p></center>
				<br /><br />	
				<?php
					$username=$_SESSION['name'];
					//echo $username;
					$sql="select * from admin where admin_name='$username'";
					$result = $db->query($sql);
					
    				if ($result->num_rows > 0) {
    				// 输出数据
    					while($row = $result->fetch_assoc()) {
       					 echo "<b>工号：</b>" . $row["admin_id"]. "<br/><br/>" . "<b>姓名：</b> " . $row["admin_name"].  "<br/><br/>";
       					 echo "<b>身份证号：</b>" . $row["id"] . "<br/><br/>";
    					}
					} 
					else {
    					echo "0 结果";
					}
					$db->close();
				?>
				<div style="height: 40px;text-align: center;">
					<a href="pwd_change.php"><input style="width: 80px;height: 40px;" type="button" id="" name="MM" value="修改密码"/></a>
				</div>
			</div>
            </div>
        </div>

        <script>
        function showTable(page) {
            document.getElementById('exam-now').style.display = 'none';
            document.getElementById('exam-past').style.display = 'none';
            document.getElementById('student-manage').style.display = 'none';
            document.getElementById('my-info').style.display = 'none';
			document.getElementById('exam-add').style.display = 'none';
            switch(page){
                case '1':
                    document.getElementById('exam-now').style.display = 'block';
                    break;
                case '2':
                    document.getElementById('exam-past').style.display = 'block';
                    break;
                case '3':
                    document.getElementById('student-manage').style.display = 'block';
                    break;   
                case '4':
                    document.getElementById('my-info').style.display = 'block';
                    break;  
				case '5':
                    document.getElementById('exam-add').style.display = 'block';
                    break; 
            }
        }

		function showDetails(id) {
            window.location.href = "exam_now.php?id=" + id;
        }
        </script>
    </body>	
</html>