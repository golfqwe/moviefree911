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
$mod_id=$_POST['mod_id'];
$cate_id=$_POST['cate_id'];
$sticky=$_POST['sticky'];
$title=htmlspecialchars($_POST['title']);
$short_detail=htmlspecialchars($_POST['short_detail']);
$detail=addslashes($_POST['input']);
$link_youtube=htmlspecialchars($_POST['link_youtube']);
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
$size1=$_FILES['file1']['size'];
$oimg=$_POST['oimg'];
$filevdo=$_FILES['filevdo']['name'];
$tmpvdo=$_FILES['filevdo']['tmp_name'];
$sizevdo=$_FILES['filevdo']['size'];
$ovdo=$_POST['ovdo'];
$post_comment=$_POST['post_comment'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$imdb=$_POST['imdb'];
$link_allplayer=htmlspecialchars($_POST['link_allplayer']);
$link_gdrive=htmlspecialchars($_POST['link_gdrive']);
$meta_tiele=htmlspecialchars($_POST['meta_tiele']);
$meta_description=htmlspecialchars($_POST['meta_description']);
$meta_keyword=htmlspecialchars($_POST['meta_keyword']);
$link_m3u8=htmlspecialchars($_POST['link_m3u8']);
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
//check file vdo
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
//แก้ไขข้อมูล
$update="UPDATE `post` SET `cate_id`='$cate_id' ,`title`='$title' ,`short_detail`='$short_detail' ,`detail`='$detail' ,`img`='$newimg' ,`link_youtube`='$link_youtube' ,`file_vdo`='$newvdo' ,`comment`='$post_comment' ,`sticky`='$sticky' ,`google_drive`='$google_drive' ,`movie`='$movie',`tag`='$tag',`projection`='$projection',`imdb`='$imdb'  ,`link_allplayer`='$link_allplayer' ,`link_gdrive`='$link_gdrive' ,`meta_tiele`='$meta_tiele' ,`meta_description`='$meta_description' ,`meta_keyword`='$meta_keyword' ,`link_m3u8`='$link_m3u8' WHERE id='$id'" or die(mysqli_error());
mysqli_query($con_db, $update);
print "<meta http-equiv=refresh content=0;URL=list-mod-movie.php?mod_id=$mod_id&id=$id>";
?>
