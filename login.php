<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$email=$_POST['email'];
$pass=$_POST['pass'];
$ip=$_SERVER['REMOTE_ADDR'];
//echo "$user<br>$pass";
//check ban ip
$sip="SELECT * FROM `ban_ip` WHERE ip='$ip'";
$reip=mysqli_query($con_db, $sip) or die("ERROR $sip");
$nip=mysqli_num_rows($reip);
	if($nip>=1){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ หมายเลข IP ของท่านไม่สามารถใช้งานได้ครับ'); 	
		window.location = 'index.php'; 
	</script> 
<? 
exit();
	}else{
//login
$s="SELECT id, type, name, email, ip FROM `member` WHERE email='$email' AND pass='$pass' AND actived=1 AND type>2";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$num=mysqli_num_rows($re);
if($num<=0){
?>
<script language="JavaScript"> 	
	alert('ไม่พบข้อมูลสมาชิก'); 	
	history.back();
</script>
<?
}else {
$r=mysqli_fetch_row($re);
	if($r[4]==''){
		$sql="UPDATE `member` SET `ip`='$ip' WHERE id='$r[0]'"or die("ERROR $sql บรรทัด67");
		mysqli_query($con_db, $sql);
		}
if($r[1]==4){// && $r[4]==$ip   ไม่เช็ค IP
// if($r[1]==4 && $r[4]==$ip){   สำหรับเช็ค IP

$_SESSION['member_login']="member_login";
$_SESSION['m_id']="$r[0]";
$_SESSION['m_vip']="vip";
$_SESSION['m_name']="$r[2]";
$_SESSION['m_email']="$r[3]";

echo "<meta http-equiv=refresh content=0;URL=member/index.php>"; 

}else if($r[1]==3){
		$_SESSION['member_login']="member_login";
		$_SESSION['m_id']="$r[0]";
		$_SESSION['m_other']="other";	
		$_SESSION['m_name']="$r[2]";
		$_SESSION['m_email']="$r[3]";	
echo "<meta http-equiv=refresh content=0;URL=member/index.php>"; 
	}else{
?>

<script language="JavaScript"> 	
	alert('ไม่พบข้อมูลสมาชิก'); 	
	history.back();
</script>

<?

		}
	}
}
?>