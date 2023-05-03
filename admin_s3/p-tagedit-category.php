<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$name=htmlspecialchars($_POST['name']);
$title=htmlspecialchars($_POST['title']);
$description=htmlspecialchars($_POST['description']);
$keyword=htmlspecialchars($_POST['keyword']);
if($name!=""){
$sql="UPDATE `tag_category` SET `tag_name`='$name', `title`='$title', `description`='$description', `keyword`='$keyword' WHERE id='".$_GET['id']."'"or die("ERROR $sql บรรทัด67");
mysqli_query($con_db, $sql);
echo "<meta http-equiv='refresh' content='0;url=tag_category.php'>";
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?
}
?>
