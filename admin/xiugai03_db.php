
<?php
	include("../conn.php");
	@session_start();
	header("Cache-control:private");
?>

<?php
$username=$_SESSION['name'];
$XM=$_POST['XM'];
$GH=$_POST['GH'];
echo $username;
$sql="update admin set admin_name='$XM',admin_id='$GH'where admin_name='$username'";
if($db->query($sql))
{
	exit('用户信息修改成功！点击此处 <a href="javascript:history.back(-1);">返回</a>');  
}
else{
	 echo '抱歉！修改失败：',mysql_error(),'<br />';  
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';  
}
$db->close();
?>