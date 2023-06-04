<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:no-cache");
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
					<li id="log"><b href="">英语四六级考试管理系统</b></li>
					<li id="item"><a href="login.html">首页</a></li>
					<li id="item"><a href="exam_infor1.php">考试信息</a></li>
					<li id="item"><a href="../index.php">新闻公告</a></li>
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
				<input style="height: 40px;" type="submit" value="搜索"/>
			</form>
			<form ></form>
			</center>
			
			<?php
				$sql = "SELECT * FROM course";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<form method="post">
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th wwidth="25%" height="25px" align="center">课程编号</th>
					<th width="25%" height="25px" align="center">课程名称</th>
					<th width="25%" height="25px" align="center">考试时间</th>
					<th width="25%" height="25px" align="center">操作</th>
				</tr>
			<?php 
				while($row=$result->fetch_assoc()){ 
			?>
			<?php 
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\">";  	
            		echo "<td>";
            		echo $row["course_id"];
            		echo "<input type=\"hidden\" name=\"course_id\">";
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
            	<input type="button" name="button1" id="button1" value="报考" 
            		onclick="window.location.href='baoming.php?id=<?=$row['course_id']?>'"
            			 <?php if($index2==1)echo "disabled='disabled'"?>/>
            	<input type="button" name="button2" id="button2" value="退考" 
            	onclick="window.location.href='tuikao.php?id=<?=$row['course_id']?>'" 
            		<?php if($index1==0)echo "disabled='disabled'"?>/>
            </td>
            </tr>
            <?php
             	}
			?>	
			</table>
			</form>
		</div>
	</body>	
</html>