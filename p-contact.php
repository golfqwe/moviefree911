<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$submit=$_POST['Submit'];
$title=htmlspecialchars($_POST['title']);
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$tel=htmlspecialchars($_POST['tel']);
$detail=htmlspecialchars($_POST['detail']);
$ask=$_POST['ask'];
$ans=$_POST['ans'];
$dm=date("d-m");
$y=date("Y")+543;
$date="$dm-$y";
if(isset($submit)&&$submit=="บันทึกข้อมูล"&&$title!=""&&$name!=""&&$email!=""&&$tel!=""&&$detail!=""&&$ans!=""){
	//check ผลบวก
	if(isset($ask)&&isset($ans)&&$ask==$ans){
	$s="INSERT INTO `contact` (`title` ,`name` ,`email` ,`tel` ,`detail` ,`date`)VALUES ('$title',  '$name',  '$email',  '$tel',  '$detail',  '$date')" or die("ERROR INSERT บรรทัด22");
	mysqli_query($con_db, $s);
	?>
	<script language="JavaScript"> 	
		alert('บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ'); 	
		window.location = 'index.php'; 
	</script> 
	<?
	}else{
	?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณบวกเลขไม่ถูกต้องครับ'); 	
		history.back();
	</script> 
	<?
	}
}else{
	?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
		history.back();
	</script> 
	<?
}
?>