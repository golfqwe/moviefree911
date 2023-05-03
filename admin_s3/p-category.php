<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการร้านค้า ::.</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style4 {font-size: small; font-weight: bold; }
-->
</style></head>

<body>
<?
$name=htmlspecialchars($_POST['name']);
$member=$_POST['member'];
$user=$_POST['user'];
$title=htmlspecialchars($_POST['title']);
$description=htmlspecialchars($_POST['description']);
$keyword=htmlspecialchars($_POST['keyword']);
$s="select * from category where name='$name' AND title='$title' AND description='$description' AND keyword='$keyword'";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด39");
$num=mysqli_num_rows($re);
if($num>=1){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ หมวดหมู่หลักนี้มีอยู่แล้วครับ'); 	
	history.back();
</script> 
<?
}else{
if($name!=""){
$sql="INSERT INTO `category` (`name`, `member_access`, `user_access`, `title`, `description`, `keyword`)VALUES ('$name', '$member', '$user', '$title', '$description', '$keyword')"or die("ERROR sql บรรทัด 53");
mysqli_query($con_db, $sql);
echo "<meta http-equiv='refresh' content='0;url=category.php'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?
}
}
?>
</body>
</html>