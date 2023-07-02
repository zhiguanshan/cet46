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
            	<span class="text-muted text-xs block">教师</span>
				</div>
			</div>
			<div id="ng-scope">
                <ul>
				    <li class="ng-list">
					<a href="teachers.php">考试查询</a>
                        <ul class="ng-sublist">
                            <li ><a href="teachers.php">报名监考</a></li>
                            <li ><a href="teachers.php">监考查询</a></li>
                        </ul>
				    </li> 
				    <li class="ng-list" >
					<a href="teachers.php">教师阅卷</a>
				    </li>
				    <li class="ng-list">
					<a href="teachers.php">个人资料</a>
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
				$cid=$_GET['id'];
				$sql = "SELECT answers.que_id,stu_id,question,text,score FROM  answers inner join questions WHERE answers.cou_id=questions.cou_id AND answers.cou_id='$cid';";
				$result = $db->query($sql);
				$rows_num=$result->num_rows;
			?>
			<table style="margin:40px auto;opacity: 0.8;" border="1px solid" width="1000px" align="center">
				<tr>
					<th width="20%" height="25px" align="center">题目号</th>
					<th width="20%" height="25px" align="center">问题</th>
					<th width="20%" height="25px" align="center">学生答案</th>
					<th width="20%" height="25px" align="center">总分数</th>
					<th width="20%" height="25px" align="center">给分</th>
				</tr>
			<?php 
				while($row=$result->fetch_assoc()){  
            		echo "<tr width=\"20%\" height=\"25px\" align=\"center\">";  	
            		echo "<td>";
            		echo $row["que_id"];
            		echo "</td>";
            		
            		echo "<td>";
            		echo $row["question"];
            		echo "</td>";
            		            		
            		echo "<td>";
            		echo $row["text"];
            		echo "</td>";
            	                       			
              		echo "<td>";
              		echo $row["score"];
            		echo "</td>";
			?>
				<td>
				<form class="search-box" action="get_score.php" method="post">
				<?php	
					echo "<input type=\"hidden\" name=\"CI\" id=\"CI\" value=\"$cid\">";
					echo "<input type=\"hidden\" name=\"QI\" id=\"QI\" value=\"$row[que_id]\">";
					echo "<input type=\"hidden\" name=\"SI\" id=\"SI\" value=\"$row[stu_id]\">";
					echo "<input type=\"hidden\" name=\"SN\" id=\"SN\" value=\"$row[score]\">";
				?>
				<input type="text" name="CD" id="CD" placeholder="输入应得成绩" />
				<input type="submit" value="提交"/>
				</form>
	            	</td>
	            	</tr>
            <?php		
            	}
			?>
			</table>
            </div>
        </div>
    </body>	
</html>