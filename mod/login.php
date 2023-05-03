<?
session_start();
include "../inc/config.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลผู้ช่วยแอดมิน ::.</title>
<style type="text/css">
<!--
a:link {
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: underline;
}
-->
</style></head>

<body>
<?
$email=$_POST['email'];
$pass=$_POST['pass'];
$s="SELECT id, name FROM `member` WHERE email='$email' AND pass='$pass' AND type=2";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$num=mysqli_num_rows($re);

if($num<=0){
?>
	<script language="JavaScript"> 	
		alert("ขออภัยครับ ข้อมูลผู้ช่วยผู้ดูแลระบบ ของท่านไม่มีอยู่ในระบบครับ"); 	
		window.location = '../mod-login.php'; 
	</script> 
<?
}else{
$r=mysqli_fetch_row($re);
$_SESSION['mod_login']="'mod_login'";
$_SESSION['m_id']=$r[0];
$_SESSION['m_name']=$r[1];
$_SESSION['m_vip']="vip";
//mysqli_close();
echo "<meta http-equiv=refresh content=0;URL=index.php>"; 
}
?>
</body>
</html>
