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
$op1=$_POST['op1'];
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
if($file1!=""){
	//del img1
	$part1="../logo-img/$op1";
	@unlink ($part1);
	@copy($tmp1,"../logo-img/$file1");
	
	$sql="UPDATE `site_logo_share` SET  `site_logo_share`='$file1' WHERE `id`=1 LIMIT 1" or die("ไม่แก้ไขเพิ่มข้อมูลได้ 45");
mysqli_query($con_db, $sql);
	echo "<meta http-equiv=refresh content=0;URL=sitelogo-share.php>";

}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ กรุณาเลือกภาพ Site Logo Share ด้วยครับ'); 	
	history.back();
</script> 
<?
}
?>
</body>
</html>
