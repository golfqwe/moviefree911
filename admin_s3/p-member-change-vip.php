<?
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
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
$id=$_POST['id'];
$type=$_POST['type'];
//เลือกวันหมดอายุ
$s="SELECT number, unit FROM `setting_point` WHERE id='$type'";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$r=mysqli_fetch_row($re);
if($r[1]==1){
$unit="day";
}else if($r[1]==2){
$unit="month";
}else if($r[1]==3){
$unit="year";
}
$exp_date=date("Y-m-d",strtotime("+ $r[0] $unit"));
//insert payment
$date=DateThai(date("Y-m-d"));
$time=date("H:i");
$datetime=date("Y-n-j H:i:s");
$insert_payment="INSERT INTO `payment` (`type` ,`point_type` ,`member_id` ,`date` ,`time` ,`status` ,`status_date`)VALUES ('3', '$type', '$id', '$date', '$time', '1', '$datetime')" or die("ERROR insert_payment");
mysqli_query($con_db, $insert_payment);//update member
$insert_member="UPDATE `member` SET `type`='4' ,`exp_date`='$exp_date' WHERE id='$id'" or die ("ERROR1 $insert_member");
mysqli_query($con_db, $insert_member);
echo "<meta http-equiv='refresh' content='0;url=list-member-vip.php'>"; 
?>
</body>
</html>
