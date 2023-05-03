<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$id=$_POST['id'];
$title=htmlspecialchars($_POST['title']);
$detail=addslashes($_POST['input']);
$link_youtube=htmlspecialchars($_POST['link_youtube']);
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
$size1=$_FILES['file1']['size'];
$oimg=$_POST['oimg'];
//$filevdo=$_FILES['filevdo']['name'];
//$tmpvdo=$_FILES['filevdo']['tmp_name'];
//$sizevdo=$_FILES['filevdo']['size'];
//$ovdo=$_POST['ovdo'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$tag_1=htmlspecialchars($_POST['tag_1']);
$tag_2=htmlspecialchars($_POST['tag_2']);
$tag_3=htmlspecialchars($_POST['tag_3']);
$tag_4=htmlspecialchars($_POST['tag_4']);
$tag_5=htmlspecialchars($_POST['tag_5']);
$tag_6=htmlspecialchars($_POST['tag_6']);
$meta_tiele=htmlspecialchars($_POST['meta_tiele']);
$meta_description=htmlspecialchars($_POST['meta_description']);
$meta_keyword=htmlspecialchars($_POST['meta_keyword']);
//check รูปภาพโชว์ส่งมาหรือไม่
if(isset($file1)&&$file1!=""){
	if($size1>904800){
?>
		<script language="JavaScript">
			alert('ขอโทษครับ ขนาดภาพปรพกอบของท่านมีขนาดเกิน 900KB ครับ');
			history.back();
		</script> 
<?
	exit();
	}else{
		$typeshow=strrchr($file1,".");
		if(($typeshow==".jpg")||($typeshow==".JPG")||($typeshow==".jpeg")||($typeshow==".JPEG")||($typeshow==".png")||($typeshow==".PNG")){
		$partimg="../post-img/$oimg";
		@unlink ($partimg);
		$newimg=$date."-".$file1;
		@copy($tmp1,"../post-img/$newimg");
		}else{
?>
		<script language="JavaScript"> 	
			alert('ภาพปรพกอบเฉพาะไฟล์ .jpg .jpeg .png เท่านั้น'); 	
			history.back();
		</script> 
<? 
		exit();
		}
	}
}else{
$newimg=$oimg;
}

/*
if(isset($filevdo)&&$filevdo!=""){
	$typevdo=strrchr($filevdo,".");
	if(($typevdo==".mp4")||($typevdo==".MP4")||($typevdo==".flv")||($typevdo==".FLV")){
	$partvdo="../vdo/$ovdo";
	@unlink ($partvdo);
	$newvdo=$date."-".$filevdo;
	@copy($tmpvdo,"../vdo/$newvdo");
	}else{
?>
	<script language="JavaScript"> 	
		alert('ไฟล์ VDO รองรับเฉพาะไฟล์ .mp4 และ .flv เท่านั้น'); 	
		history.back();
	</script> 
<?	
	exit();
	}
}else{
$newvdo=$ovdo;
}
*/

$update="UPDATE `blog` SET `title`='$title' ,`detail`='$detail' ,`img`='$newimg' ,`link_youtube`='$link_youtube' ,`tag_1`='$tag_1' ,`tag_2`='$tag_2' ,`tag_3`='$tag_3' ,`tag_4`='$tag_4' ,`tag_5`='$tag_5' ,`tag_6`='$tag_6' ,`meta_tiele`='$meta_tiele' ,`meta_description`='$meta_description' ,`meta_keyword`='$meta_keyword' WHERE id='$id'" or die(mysqli_error());
mysqli_query($con_db, $update);
print "<meta http-equiv=refresh content=0;URL=list-admin-blog.php>";
?>
