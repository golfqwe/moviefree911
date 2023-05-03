<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
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
$id=$_GET['id'];
//member
$del_member="delete from member where id='$id'" or die("ERROR del_member");
mysqli_query($con_db, $del_member);
//select img, vdo
$sp="SELECT img, file_vdo FROM post WHERE m_id='$id' ";
$rep=mysqli_query($con_db, $sp) or die("ERROR $sp");
while($rp=mysqli_fetch_row($rep)){
//ลบรูป
$partimg="../post-img/$rp[0]";
@unlink ($partimg);
//ลบวีดีโอ
$partvdo="../vdo/$rp[1]";
@unlink ($partvdo);
}		
//del post
$del_post="delete from post where m_id='$id' " or die ("ERROR $del post");
mysqli_query($con_db, $del_post);
echo "<meta http-equiv='refresh' content='0;url=mod.php'>"; 
?>
</body>
</html>
