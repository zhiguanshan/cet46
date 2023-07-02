
<?php
	include("../../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php  
$CD=$_POST['CD'];  
$CN=$_POST['CN'];
$CT=$_POST['CT'];
$CA=$_POST['CA'];
$HI=$_POST['HI'];

if($CN<=0||$HI<=0||$CA<0||$CA>4){  
    exit('错误：输入不符合规定。<a href="javascript:history.back(-1);">返回</a>');  
}  
//课程信息判断  

//包含数据库连接文件  	
include('../../conn.php');  

$result = $db->query("select * from questions where cou_id='$CD' AND que_id='$CN';");  

if($result->num_rows > 0){  
    echo '错误：题目 ',$CN,' 已存在。<a href="javascript:history.back(-1);">返回</a>';  
    exit;  
} 


$sql = "INSERT INTO `exam`.`questions` (`cou_id`, `que_id`, `question`, `answer`, `score`) VALUES ('$_POST[CD]','$_POST[CN]','$_POST[CT]','$_POST[CA]','$_POST[HI]')";
if($db->query($sql)){  
    exit("题目添加成功！<a href=\"exam_now.php?id=$CD\">返回</a>");  
} 
else {  
    echo '抱歉！修改数据失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}  
?>  