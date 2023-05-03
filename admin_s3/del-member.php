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
$type=$_GET['type'];
//member
$del_member="delete from member where id='$id'" or die("ERROR del_member");
mysqli_query($con_db, $del_member);
//ลบประวัติการเติมเงิน
$del_payment="delete from payment  where member_id='$id'" or die("ERROR del_payment");
mysqli_query($con_db, $del_payment);
if($type==3){
echo "<meta http-equiv='refresh' content='0;url=list-member.php'>"; 
}else if($type==4){
echo "<meta http-equiv='refresh' content='0;url=list-member-vip.php'>"; 
}else if($type==5){
echo "<meta http-equiv='refresh' content='0;url=search-member.php'>"; 
}
?>
</body>
</html>
