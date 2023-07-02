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
            <form id="search-box" action="exam_past.php" method="post">
            <input type="text" name="CD" id="CD" placeholder="输入关键词" />
				<input type="submit" value="搜索"/>
            </form>
            <?php
				$sql = "SELECT * FROM course WHERE ongoing='0' AND course_name LIKE '%$_POST[CD]%'";
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
        </div>

    </body>	
</html>