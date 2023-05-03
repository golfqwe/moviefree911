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
$Submit=$_POST['Submit'];
$id=$_POST['id'];
$accname=htmlspecialchars($_POST['accname']);
$accno=htmlspecialchars($_POST['accno']);
$bankname=htmlspecialchars($_POST['bankname']);
$branch=htmlspecialchars($_POST['branch']);
$acctype=htmlspecialchars($_POST['acctype']);
if($accname!=""&&$accno!=""&&$bankname!=""&&$branch!=""&&$acctype!=""){
$sql="UPDATE `bank` SET `accname`='$accname' ,`bankname`='$bankname' ,`accno`='$accno' ,`branch`='$branch' ,`acctype`='$acctype' WHERE id='$id'"or die("ERROR $sql บรรทัด42");
mysqli_query($con_db, $sql);
echo "<meta http-equiv='refresh' content='0;url=edit-account.php?id=$id'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?
}
?>
</body>
</html>
