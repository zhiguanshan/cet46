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
					<li id="item"><a href="exam_infor1.php">考试信息</a></li>
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
						<a href="logout.php">注销</a>
					</li>
				</ul>
			</div>
			
		</div>		
		<div class="right">
			<?php
				$sql = "SELECT * FROM course where course_id='$_POST[CD]'";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
				if($rows_num==0)
					exit('错误：数据无搜索记录。<a href="javascript:history.back(-1);">返回</a>'); 
			?>
			<form action="baoming.php" method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="25%" height="25px" align="center">课程编号</th>
					<th width="25%" height="25px" align="center">课程名称</th>
					<th width="25%" height="25px" align="center">考试时间</th>
					<th width="25%" height="25px" align="center">操作</th>
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
            		$sq = "select * from sc where stu_name='$_SESSION[name]' and course_id='$row[course_id]'";	
					$res = $db->query($sq);
					$index1=0;
					$index2=0;
					while($rr=$res->fetch_assoc()){
						if($res->num_rows > 0){
							$index1 = 1;   //已报考
						}           
						else{
							$index1 = 0;   //未报考
						}
						$re=$db->query("select * from sc where stu_id='$rr[stu_id]' and course_id='$rr[course_id]';");
						if($re->num_rows>0){
							$index2 = 1;          //已报考
						}				
						else{
							$index2 = 0;          //未报考
						}	
					}			
            ?>
            		<td>
            			<input type="button" name="button1" id="button1" value="报考" onclick="window.location.href='baoming.php?id=<?=$row['course_id']?>'" <?php if($index2==1)echo "disabled='disabled'"?>/>
            			<input type="button" name="button2" id="button2" value="退考" onclick="window.location.href='tuikao.php?id=<?=$row['course_id']?>'" <?php if($index1==0)echo "disabled='disabled'"?>/>
            		</td>
            <?php
            	}
			?>
			</table>
			</form>
		</div>
	</body>	
</html>