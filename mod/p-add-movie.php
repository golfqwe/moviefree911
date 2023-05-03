<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['mod_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../mod-login.php'>" ; 
exit() ;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$cate_id=$_POST['cate_id'];
$sticky=$_POST['sticky'];
$title=htmlspecialchars($_POST['title']);
$short_detail=htmlspecialchars($_POST['short_detail']);
$detail=addslashes($_POST['input']);
$link_youtube=htmlspecialchars($_POST['link_youtube']);
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
$size1=$_FILES['file1']['size'];
$filevdo=$_FILES['filevdo']['name'];
$tmpvdo=$_FILES['filevdo']['tmp_name'];
$sizevdo=$_FILES['filevdo']['size'];
$post_comment=$_POST['post_comment'];
$google_drive=$_POST['google_drive'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$movie=$_POST['movie'];
$tag=$_POST['tag'];
$projection=$_POST['projection'];
$imdb=$_POST['imdb'];
$link_allplayer=htmlspecialchars($_POST['link_allplayer']);
$link_gdrive=htmlspecialchars($_POST['link_gdrive']);
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
$newimg="";
}
//check file vdo
if(isset($filevdo)&&$filevdo!=""){
	$typevdo=strrchr($filevdo,".");
	if(($typevdo==".mp4")||($typevdo==".MP4")||($typevdo==".flv")||($typevdo==".FLV")){
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
$newvdo="";
}
//เพิ่มข้อมูล
//$insert="INSERT INTO `post` (`cate_id` ,`m_id` ,`title` ,`short_detail` ,`detail` ,`img` ,`link_youtube` ,`file_vdo` ,`post_date` ,`comment` ,`view` ,`sticky` ,`google_drive`,`movie`,`tag`,`projection`,`imdb`   )VALUES ('$cate_id', '$_SESSION[m_id]', '$title', '$short_detail', '$detail', '$newimg', '$link_youtube', '$newvdo', '$postdate', '$post_comment', '0', '$sticky', '$google_drive', '$movie', '$tag', '$projection', '$imdb')" or die(mysqli_error());

$insert="INSERT INTO `post`(`cate_id`, `m_id`, `title`, `short_detail`, `detail`, `img`, `link_youtube`, `file_vdo`, `post_date`, `comment`, `view`, `sticky`, `google_drive`, `movie`, `tag`, `projection`, `imdb`, `link_allplayer`, `link_gdrive`)VALUES ('$cate_id', '$_SESSION[m_id]', '$title', '$short_detail', '$detail', '$newimg', '$link_youtube', '$newvdo', '$postdate', '$post_comment', '0', '$sticky', '$google_drive', '$movie', '$tag', '$projection', '$imdb', '$link_allplayer', '$link_gdrive')" or die(mysqli_error());

mysqli_query($con_db, $insert);
print "<meta http-equiv=refresh content=0;URL=list-movie.php>";
?>
