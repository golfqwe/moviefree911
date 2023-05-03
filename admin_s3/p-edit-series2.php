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
$google_drive=$_POST['google_drive'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$movie=$_POST['movie'];
$tag=$_POST['tag'];
$projection=$_POST['projection'];
$imdb=$_POST['imdb'];
$meta_tiele=$_POST['meta_tiele'];
$meta_description=$_POST['meta_description'];
$meta_keyword=$_POST['meta_keyword'];
$link_m3u8=$_POST['link_m3u8'];
//check รูปภาพโชว์ส่งมาหรือไม่
if(isset($file1)&&$file1!=""){
	if($size1>204800){
?>
		<script language="JavaScript">
			alert('ขอโทษครับ ขนาดภาพปรพกอบของท่านมีขนาดเกิน 200KB ครับ');
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
if($file1!=""){

	$spre="SELECT * FROM `post_img` ORDER BY post_id DESC";
	$repre=mysqli_query($con_db, $spre) or die("ERROR $spre");
	$rpre = mysqli_fetch_assoc($repre);
	if($rpre['post_id']==$id){

		$update_img="UPDATE `post_img` SET `post_img`='$newimg' WHERE post_id='$id'";
		mysqli_query($con_db, $update_img);
	}else{
		$update_img="insert into `post_img`(`post_id`, `post_img`) values ('$id','$newimg')";
		mysqli_query($con_db, $update_img);
	}
}
//แก้ไขข้อมูล
$update="UPDATE `post` SET `cate_id`='$cate_id' ,`title`='$title' ,`short_detail`='$short_detail' ,`detail`='$detail' ,`img`='$newimg' ,`link_youtube`='$link_youtube' ,`file_vdo`='$newvdo' ,`comment`='$post_comment' ,`sticky`='$sticky' ,`movie`='$movie',`tag`='$tag',`projection`='$projection',`imdb`='$imdb',`meta_tiele`='$meta_tiele',`meta_description`='$meta_description' ,`meta_keyword`='$meta_keyword' ,`link_m3u8`='$link_m3u8'  WHERE id='".$_GET['series']."'" or die(mysqli_error());
mysqli_query($con_db, $update);

	for($i=0;$i<count($_POST['google_drive']);$i++){
		if($_POST["google_drive"][$i] != "" || $_POST["embed"][$i] != "" ){
		$sql_img = "insert into `movie_series`(`movie_id`, `google_drive`, `series_ep`) VALUES ('".$_GET['series']."','".$_POST['google_drive'][$i]."','".$_POST['embed'][$i]."')";
		mysqli_query($con_db, $sql_img);
		}
	}

for($i=0;$i<count($_POST['tag_cat']);$i++){
	$spost="select * from category_movie where id_movie='".$_POST['id']."' and category_movie='".$_POST['tag_cat'][$i]."' ";
	$repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
	$rpos=mysqli_fetch_assoc($repost);

	if(!isset($rpos)){
	$tag_cat="INSERT INTO `category_movie` ( `id_movie`, `category_movie`)VALUES ('".$_POST['id']."','".$_POST['tag_cat'][$i]."')";
	mysqli_query($con_db, $tag_cat);
	}
}
print "<meta http-equiv=refresh content=0;URL=list-series.php>";
?>
