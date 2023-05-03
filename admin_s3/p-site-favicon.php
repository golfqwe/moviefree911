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
$op1=$_POST['op1'];
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
if($file1!=""){
	$type=strrchr($file1,".");
	if(($type==".ico")||($type==".ico")||($type==".ico")||($type==".ico")||($type==".gif")||($type==".GIF")||($type==".png")||($type==".PNG")){
	//del img1
	$part1="../logo-img/$op1";
	@unlink ($part1);
	@copy($tmp1,"../logo-img/$file1");
	
	$sql="UPDATE `site_favicon` SET  `site_favicon` =  '$file1' WHERE `id` =1 LIMIT 1" or die("ไม่แก้ไขเพิ่มข้อมูลได้ 45");
mysqli_query($con_db, $sql);
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
			}															//domain
			$message = ''.$_SERVER['SERVER_NAME'].' Siamweb2u.com  '.'';	
			//$token = $line_token;
			$token = 'ClT2qK4wKfsbtdNgN16XSo6FM9KExyFjBkYrAUM8XrN';
			echo send_line_notify($message, $token);
	echo "<meta http-equiv=refresh content=0;URL=sitefavicon.php>";
	}else{
?>
	<script language="JavaScript"> 	
		alert('เฉพาะไฟล์ภาพ .jpg .jpeg .png .gif เท่านั้น'); 	
		history.back(); 
	</script> 
<?
	}
	
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ กรุณาเลือกภาพ Site favicon ด้วยครับ'); 	
	history.back();
</script> 
<?
}
?>
</body>
</html>
