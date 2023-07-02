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
            	
				</div>
			</div>
			<div id="ng-scope">
                <ul>
				    <li class="ng-list">
					    <a href="../logout.php">注销</a>
				    </li>
                </ul>
            </div>	
		</div>		
        <div id="content">      
        <div>
        <div style="width: 360px;height: 360px;margin: 0px auto;background-color: whitesmoke;padding: 20px;
				border-radius:20px ;">
				<center><p><h1>修改密码</h1></p></center>
				<br />
				<form style="height: 200px;" action="xiugai04_db.php" method="post">
					<div style="margin: 0 auto;width: 300px;height: 40px;">
						<b>新&nbsp;密&nbsp;码：&nbsp;</b>
						<input type="password" name="MM" id="MM" value="" />
						<br /><br />
						<b>确认密码：</b>
						<input type="password" name="MM1" id="MM1" value="" />
						<br /><br />
						<center><input style="width: 100px;height: 40px;" type="submit" id="submit" name="submit" value="提交"/></center>
					</div>
				</form>
			</div>
            </div>
        </div>

    </body>	
</html>