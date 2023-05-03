<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_GET['id'];
$payment="delete from payment where id='$id'" or die("Error payment");
mysqli_query($con_db, $payment);
?>
	<script language="JavaScript"> 	
		alert('ลบข้อมูล เสร็จสมบูรณ์'); 	
		window.location = 'bank-refill.php'; 
	</script> 