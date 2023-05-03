<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$capcha=$_POST['capcha'];
$rands=$_POST['rands'];
$date=date("Y-m-d");
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($rands)&&isset($capcha)&&$rands==$capcha){
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
		//check block email
		$sm="SELECT * FROM `block_email` WHERE email='$email'";
		$rem=mysqli_query($con_db, $sm) or die("ERROR $sm");
		$nm=mysqli_num_rows($rem);
		if($nm>=1){
?>
		<script language="JavaScript"> 	
			alert('ขอโทษครับ Email ของท่านไม่สามารถใช้งานได้ครับ'); 	
			window.location = 'index.php'; 
		</script> 
<? 
		exit();
		}else{
			//check ชื่อผู้ใช้ และ email ว่ามีอยู่ในระบบหรือไม่
			$s="SELECT * FROM `member` WHERE name='$name' OR email='$email'";
			$re=mysqli_query($con_db, $s) or die("ERROR $s");
			$n=mysqli_num_rows($re);
			if($n>=1){
?>
			<script language="JavaScript"> 	
				alert('ขอโทษครับ ชื่อที่ใช้เรียก/นามแฝง และ/หรือ Email นี้มีอยู่ในระบบแล้วครับ'); 	
				window.location = 'member-condition.php'; 
			</script> 
<? 
			exit();
			}else{
			//เพิ่มข้อมูล
			$insert_member="INSERT INTO `member` (`fbid`, `type`, `name`, `email`, `pass`, `reg_date`, `exp_date`, `actived`, `ip`)VALUES ('0', '3', '$name', '$email', '$pass', '$date', '0000-00-00', '1', '$ip')" or die ("ERROR1 $insert_member");
			mysqli_query($con_db, $insert_member);
			//login
			$s="SELECT id, name, email FROM `member` WHERE email='$email' ORDER BY id DESC";
			$re=mysqli_query($con_db, $s) or die("ERROR $s");
			$r=mysqli_fetch_row($re);
			$_SESSION['member_login']="member_login";
			$_SESSION['m_id']="$r[0]";
			$_SESSION['m_other']="other";
			$_SESSION['m_name']="$r[1]";
			$_SESSION['m_email']="$r[2]";
			//mysqli_close();
			echo "<meta http-equiv='refresh' content='0;url=member/index.php'>"; 
			}
		}
	}
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
	window.location = 'member-condition.php'; 
</script> 
<? 
	exit();
}
?>