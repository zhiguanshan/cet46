
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
$username=$_SESSION['name'];
$XM=$_POST['XM'];
$XH=$_POST['XH'];
$ID=$_POST['ID'];
if((int)($_POST['ID'][16])%2==0)
	{
		$XB="女";
	}
	else
	{
		$XB="男";
	}	

$year=substr($_POST['ID'],6,4);
$age=date('Y')-intval($year);

$sql="update student set user_name='$XM',stu_id='$XH',age='$age', sex='$XB' ,id='$ID' where user_name='$username'";
if($db->query($sql))
{
	exit('用户信息修改成功！点击此处 <a href="javascript:history.back(-1);">返回</a>');  
}
else{
	 echo $username.'同学抱歉！修改信息失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}
$db->close();
?>