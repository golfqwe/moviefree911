<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$email=$_POST['email'];

if($email==""){
	?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ กรุณากรอกอีเมล์ด้วยครับ'); 	
		history.back();
	</script> 
	<?
}else{
	//check Email
	$s="select email, pass from member where email='$email'";
	$re=mysqli_query($con_db, $s) or die("ERROR $s");
	$n=mysqli_num_rows($re);
	if($n==0){
	?>
	<script language="JavaScript"> 	
		alert('ไม่พบ Email นี้ในระบบ กรุณาเช็ค Email อีกครั้งครับ'); 	
		history.back();
	</script> 
	<?
	}else{
	$r=mysqli_fetch_row($re);

	$title="select * from web_detail where id=1";
	$titlere=mysqli_query($con_db, $title) or die("ERROR $title บรรทัด 29");
	$titler=mysqli_fetch_row($titlere);
	
		$strTo = "$email";
		$strSubject = "=?UTF-8?B?".base64_encode("แจ้งข้อมูลการเข้าสู่ระบบสมาชิก $titler[1]")."?=";
		$strHeader .= "MIME-Version: 1.0' . \r\n";
		$strHeader .= "Content-type: text/html; charset=utf-8\r\n";
		$strHeader .= "From: $titler[1]<$titler[2]>\r\n";
		$strMessage = "ข้อมูลการเข้าสู่ระบบสมาชิก<br><br>
		URL : <a href='//$titler[3]'>//$titler[3]</a><br>
		Email : $r[0]<br>
		Password : $r[1]<br><br>
		ขอบคุณครับ
		";
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
	?>
	<script language="JavaScript"> 	
		alert('ระบบได้ทำการส่งข้อมูลไปให้ท่านแล้วครับ กรุณาเช็คอีเมล์ที่กล่องขาเข้า (Inbex) หรือ กล่องขยะ (Junkbox)'); 	
		window.location = 'index.php'; 
	</script> 
	<?
	}
}
?>