<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}

if(isset($_GET['register'])){
	$tag="INSERT INTO `register_movie`(`register`,`host`)VALUES('null','".$_GET['register']."')";
	mysqli_query($con_db, $tag);


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
      }	
	$message = 'ลงทะเบียน M5'."\n".' Host: '.$_GET['register'].''."\n".'Domain : '.$_SERVER['HTTP_HOST'].'';	
	$token = 'ClT2qK4wKfsbtdNgN16XSo6FM9KExyFjBkYrAUM8XrN';


	echo send_line_notify($message, $token);
	echo "<meta http-equiv='refresh' content='0;url=list-admin-movie.php'>"; 
} else if(isset($_GET['up_register'])){
	$up_tag="update register_movie set `register`='".$_POST['register']."' where id='".$_GET['up_register']."' ";
	mysqli_query($con_db, $up_tag);

	echo "<meta http-equiv='refresh' content='0;url=list-admin-movie.php'>"; 
} else {


	$check_u="select * from register_movie order by id desc limit 1";
  $check_q=mysqli_query($con_db, $check_u);
	$rpre = mysqli_fetch_assoc($check_q);

if($rpre['host']!='' and $rpre['register']!='null'){
$xml = simplexml_load_file("https://www.movie788.com/movie-aip.php?member=".$rpre['register']."&host=".$rpre['host']."") or die("Error: Cannot create object");
//$xml = simplexml_load_file("https://movie788.com/movie-xml.xml") or die("Error: Cannot create object");
foreach ($xml->children() as $row){

$post_id=$row->post_id;
$cate_id=$row->cate_id;
$title=$row->title;
$projection=$row->projection;
$sticky=$row->sticky;
$movie=$row->movie;

$short_detail=$row->short_detail;
$newimg=$row->image;
$link_youtube=$row->link_youtube;
$google_drive=$row->google_drive;

$post_comment=$row->comment;
$tag=$row->tag;

$meta_title=$row->meta_title;
$meta_description=$row->meta_description;
$meta_keyword=$row->meta_keyword;

$postdate=date("Y-m-d");
$date=date('dmYHis');
$imdb=$row->imdb;
$link_allplayer=$row->link_allplayer;
$link_m3u8=$row->link_m3u8;
$category_tag=$row->tag_id;

	$spre="SELECT * FROM `post` where post_update=".$post_id." ORDER BY post_update DESC";
	$repre=mysqli_query($con_db, $spre) or die("ERROR $spre");
	$rpre_post_update=mysqli_fetch_assoc($repre);
		if(empty($rpre_post_update['post_update'])){
		$insert="insert into `post` (`cate_id`, `m_id`, `title`, `short_detail`, `detail`, `img`, `link_youtube`, `file_vdo`, `post_date`, `comment`, `view`, `sticky`, `google_drive`, `movie`, `tag`, `projection`, `imdb`, `link_allplayer`, `link_gdrive`, `meta_tiele`, `meta_description`, `meta_keyword`, `link_m3u8`,`post_update`)values('$cate_id', '$_SESSION[m_id]', '$title', '$short_detail','', '$newimg', '$link_youtube', '$newvdo', '$postdate', '$post_comment', '0', '$sticky', '', '$movie', '$tag', '$projection', '$imdb', '$link_allplayer','$google_drive', '$meta_title', '$meta_description', '$meta_keyword', '$link_m3u8', '$post_id')" or die(mysqli_error());
		mysqli_query($con_db, $insert);


	//$tag_cat1="INSERT INTO `category_movie` ( `id_movie`, `category_movie`)VALUES ('".$rpre['id']."','".$tag."')";
	//mysqli_query($con_db, $tag_cat1);
	$spres="SELECT * FROM `post` ORDER BY id DESC";
	$repres=mysqli_query($con_db, $spres) or die("ERROR $spre");
	$rpreas = mysqli_fetch_assoc($repres);
		$new_rpost=$rpreas['id'];
		$gory_tag = explode(',', $category_tag);
		for ($i=0; $i<=count($gory_tag); $i++){
			$tag_cat_id="INSERT INTO `category_movie`(`id_movie`, `category_movie`)VALUES ('".$new_rpost."','".$gory_tag[$i]."')";
		mysqli_query($con_db, $tag_cat_id);

		$del_post="delete from category_movie where id_movie='".$new_rpost."' and category_movie=0 ";
		mysqli_query($con_db, $del_post);

		}

	}else{
	    echo "<script>alert('การอัพเดทสำเร็จ! เพิ่มใหม่อีกครั้งหลัง 7-15 วัน');window.location='list-admin-movie.php';</script>";		
	}




}

echo "<meta http-equiv=refresh content=0;URL=list-admin-movie.php>";
}
}
?>
