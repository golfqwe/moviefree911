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
$s="select * from tag_category where tag_name='$name'";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด39");
$num=mysqli_num_rows($re);
if($num>=1){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ หมวดหมู่หลักนี้มีอยู่แล้วครับ'); 	
	history.back();
</script> 
<?
}else{
if($name!=""){
$sql="INSERT INTO `tag_category` (`tag_name`, `title`, `description`, `keyword`)VALUES ('$name', '$title', '$description', '$keyword')"or die("ERROR sql บรรทัด 53");
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
}
?>

