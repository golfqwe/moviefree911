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
$embed=$_POST['embed'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$movie=$_POST['movie'];
$tag=$_POST['tag'];
$projection=$_POST['projection'];
$imdb=$_POST['imdb'];
$series='series';
$meta_tiele=$_POST['meta_tiele'];
$meta_description=$_POST['meta_description'];
$meta_keyword=$_POST['meta_keyword'];
$link_m3u8=$_POST['link_m3u8'];
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
$insert="INSERT INTO `post` (`cate_id`, `m_id`, `title`, `short_detail`, `detail`, `img`, `link_youtube`, `file_vdo`, `post_date`, `comment`, `view`, `sticky`, `google_drive`, `movie`, `tag`, `projection`, `imdb`, `link_allplayer`, `link_gdrive`, `meta_tiele`, `meta_description`, `meta_keyword`, `link_m3u8`, `post_update`)VALUES ('".$cate_id."', '".$_SESSION['m_id']."', '".$title."', '".$short_detail."', '".$detail."', '".$newimg."', '".$link_youtube."', '".$newvdo."', '".$postdate."', '".$post_comment."', '0', '".$sticky."', 'series', '".$movie."', '".$tag."', '".$projection."', '".$imdb."','0','0','0','0','0','0','0')" or die(mysqli_error());
mysqli_query($con_db, $insert);

		$prodoct_list="select * from post order by id DESC LIMIT 1";
		$reads = mysqli_query($con_db, $prodoct_list) or die("ERROR $sads4");
		$list=mysqli_fetch_array($reads);
			$sort = $list['id'] ;


		$update_post="UPDATE `post` SET `post_update`='$sort' WHERE id='".$list['id']."'";
		mysqli_query($con_db, $update_post);

if($file1!=""){

	$spre="SELECT * FROM `post_img` ORDER BY post_id DESC";
	$repre=mysqli_query($con_db, $spre) or die("ERROR $spre");
	$rpre = mysqli_fetch_assoc($repre);
	if($rpre['post_id']){

		$update_img="UPDATE `post_img` SET `post_img`='$newimg' WHERE post_id='".$list['id']."'";
		mysqli_query($con_db, $update_img);
	}else{
		$update_img="insert into `post_img`(`post_id`, `post_img`) values ('".$list['id']."','$newimg')";
		mysqli_query($con_db, $update_img);
	}
}


	for($i=0;$i<count($_POST['google_drive']);$i++){
		$sql_img = "insert into `movie_series`(`movie_id`, `google_drive`, `series_ep`) VALUES ('".$sort."','".$_POST['google_drive'][$i]."','".$_POST['embed'][$i]."')";
		mysqli_query($con_db, $sql_img);
	}




for($i=0;$i<count($_POST['tag_cat']);$i++){
	$tag_cat="INSERT INTO `category_movie` ( `id_movie`, `category_movie`)VALUES ('".$sort."','".$_POST['tag_cat'][$i]."')";
	mysqli_query($con_db, $tag_cat);
}
print "<meta http-equiv=refresh content=0;URL=list-series.php>";
?>
