<?
session_start();
include "../inc/config.inc.php";
$email=$_POST['email'];
$pass=$_POST['pass'];
	$strSQL = "SELECT id, name FROM `member` WHERE email='$email' AND pass='$pass' AND type=1";
	$re = mysqli_query($con_db, $strSQL);
	$Num_Rows = mysqli_num_rows($re);

if($Num_Rows <=0) {// ไม่เท่ากับ$Num_Rows<=0 
?>
	<script language="JavaScript"> 	
		alert("ขออภัยครับ ข้อมูลผู้ดูแลระบบ ของท่านไม่มีอยู่ในระบบครับ"); 	
		window.location = 'index.php'; 
	</script> 
<?
}else{
$r=mysqli_fetch_row($re);
$_SESSION['admin_login']="'admin_login'";
$_SESSION['m_id']="$r[0]";
$_SESSION['m_name']="$r[1]";
$_SESSION['m_vip']="vip";
//mysqli_close();
echo "<meta http-equiv=refresh content=0;URL=data.php>"; 
}
?>
