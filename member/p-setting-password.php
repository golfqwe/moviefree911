<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$email=htmlspecialchars($_POST['email']);
$pass=htmlspecialchars($_POST['pass']);
$repass=htmlspecialchars($_POST['repass']);
if($email!=""&&$pass!=""&&$repass!=""){
$upd_member="UPDATE `member` SET `email`='$email', `pass`='$pass' WHERE id='$_SESSION[m_id]'" or die ("ERROR upd_member");
mysqli_query($con_db, $upd_member);
$_SESSION['m_email']="$email";
//mysqli_close();
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ท่านกรอกข้อมูลไม่ครบครับ'); 	
		window.location = 'setting-password.php'; 
	</script> 
<?
exit(); 
}
?>