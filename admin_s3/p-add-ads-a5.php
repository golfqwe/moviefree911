<?
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$show=$_POST['show'];
$keyword=$_POST['keyword'];
$url=$_POST['url'];
$start_date=$_POST['start_date'];
$finish_date=$_POST['finish_date'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];

if($file1==""){ 
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ กรุณาเลือกไฟล์โฆษณาด้วยนะครับ'); 	
	history.back();
</script> 
<?
}else{ 
$date=date("dmYHis");
$img="$date$file1";
@copy($tmp1,"../ads-img/$img"); 
$upd="INSERT INTO `ads_a5` (`name` ,`tel` ,`email` ,`url` ,`keyword` ,`img` ,`start_date` ,`finish_date` ,`show`)VALUES ('$name', '$tel', '$email', '$url', '$keyword', '$img', '$start_date', '$finish_date', '$show')" or die("Error $upd");
mysqli_query($con_db, $upd);
}
print "<meta http-equiv=refresh content=0;URL=ads-a5.php>";
?>
