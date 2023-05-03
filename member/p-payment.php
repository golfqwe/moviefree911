<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$submit=$_POST['Submit'];
$point_type=htmlspecialchars($_POST['point_type']);
$bank_id=htmlspecialchars($_POST['bank_id']);
$money=htmlspecialchars($_POST['money']);
$dates=htmlspecialchars($_POST['dates']);
$times=htmlspecialchars($_POST['times']);
$detail=htmlspecialchars($_POST['detail']);
if(isset($submit)&&$submit=="แจ้งการชำระเงิน"&&$point_type!=""&&$money!=""&&$dates!=""&&$times!=""){
	$s="INSERT INTO `payment` (`type` ,`point_type` ,`member_id` ,`bank_id` ,`money` ,`date` ,`time` ,`detail` ,`status`)VALUES ('1', '$point_type', '$_SESSION[m_id]', '$bank_id', '$money', '$dates', '$times', '$detail', '0')" or die("ERROR INSERT บรรทัด16");
	mysqli_query($con_db, $s);
?>
	<script language="JavaScript"> 	
		alert('บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ'); 	
		window.location = 'list-member-refill.php'; 
	</script> 
<?
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
		history.back();
	</script> 
<?
}
?>