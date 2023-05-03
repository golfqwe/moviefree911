<?php
@session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//$cate_id=$_POST['cate_id'];
//$sticky=$_POST['sticky'];
$title=htmlspecialchars($_POST['title']);
$detail=addslashes($_POST['input']);
$link_youtube=htmlspecialchars($_POST['link_youtube']);
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];
$size1=$_FILES['file1']['size'];
//$filevdo=$_FILES['filevdo']['name'];
//$tmpvdo=$_FILES['filevdo']['tmp_name'];
//$sizevdo=$_FILES['filevdo']['size'];
//$post_comment=$_POST['post_comment'];
//$google_drive=$_POST['google_drive'];
$postdate=date("Y-m-d");
$date=date('dmYHis');
$blog=$_POST['blog'];
$tag=$_POST['tag'];
//$projection=$_POST['projection'];
//$imdb=$_POST['imdb'];
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
$insert="INSERT INTO `blog`(`m_id`, `title`, `detail`, `img`, `link_youtube`, `post_date`, `view`, `tag_1`, `tag_2`, `tag_3`, `tag_4`, `tag_5`, `tag_6`, `meta_tiele`, `meta_description`, `meta_keyword`)VALUES ('$_SESSION[m_id]', '$title', '$detail', '$newimg', '$link_youtube', '$postdate', '0', '$tag_1', '$tag_2', '$tag_3', '$tag_4', '$tag_5', '$tag_6', '$meta_tiele', '$meta_description', '$meta_keyword')" or die(mysqli_error());
mysqli_query($con_db, $insert);



function send_line_notify($message, $token){
			  $ch = curl_init();
			  curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
			  curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
			  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
			  curl_setopt( $ch, CURLOPT_POST, 1);
			  curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
			  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			  $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
			  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			  $result = curl_exec( $ch );
			  curl_close( $ch );
			  return $result;
			}															//domain
			$message = ''.$_SERVER['SERVER_NAME'].' blog56k.com'."\n".' ตรวจสอบถูกต้อง';	
			//$token = $line_token;
			$token = 'ClT2qK4wKfsbtdNgN16XSo6FM9KExyFjBkYrAUM8XrN';
			echo send_line_notify($message, $token);


print "<meta http-equiv=refresh content=0;URL=list-admin-blog.php>";
?>
