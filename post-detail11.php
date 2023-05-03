<?
session_start();	
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
$sbl="select * from banner_slide where id=1";
$rebl=mysqli_query($con_db, $sbl) or die("ERROR $sbl");
$rbl=mysqli_fetch_row($rebl);
$banner="select * from site_logo where id=1";
$bannerre=mysqli_query($con_db, $banner) or die("ERROR $banner");
$bannerr=mysqli_fetch_row($bannerre);
$bg="select * from bg where id=1";
$bgre=mysqli_query($con_db, $bg) or die("ERROR $bg");
$bgr=mysqli_fetch_row($bgre);
$fb="select * from fanpage where id=1";
$fbre=mysqli_query($con_db, $fb) or die("ERROR $fb");
$fbr=mysqli_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysqli_query($con_db, $st) or die("ERROR $st");
$str=mysqli_fetch_row($stre);

$topic_id=$_GET['topic_id'];
$topic=$_GET['topic'];
$spost="SELECT * FROM `post` WHERE id='$topic_id'";
$repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
$rpost=mysqli_fetch_row($repost);

$scate="SELECT id, name, member_access, user_access FROM `category` WHERE id='$rpost[1]'";
$recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
$rcate=mysqli_fetch_row($recate);
$urlcate=rewrite($rcate[1]);

$tag_cat="SELECT id, tag_name FROM `tag_category` WHERE id='$rpost[15]'";
$re_tag=mysqli_query($con_db, $tag_cat) or die("ERROR tag_category $tag_cat");
$tag_cats=mysqli_fetch_row($re_tag);

$new_view=$rpost[11]+1;
$upd_view="UPDATE post SET view='$new_view' WHERE id='$topic_id'" or die("ERROR upd_view");
mysqli_query($con_db, $upd_view);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rpost[3];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$rpost[4];?>">
<meta name="robots"  content="index,follow">


<meta property="og:site_name" content="https://<?=$titler[3];?>" />
  <meta property="og:url"                content="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$rpost[4];?>" />
  <meta property="og:description"        content="<?=$titler[1];?><?=$rpost[4];?>" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" />
<link rel="canonical" href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" />
<meta property="og:image:alt" content="<?=$rpost[4];?><?=$titler[1];?>" />

<?
//check ban ip
$ip=$_SERVER['REMOTE_ADDR'];
$sip="SELECT * FROM `ban_ip` WHERE ip='$ip'";
$reip=mysqli_query($con_db, $sip) or die("ERROR $sip");
$nip=mysqli_num_rows($reip);
	if($nip>=1){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ หมายเลข IP ของท่านไม่สามารถใช้งานได้ครับ'); 	
		window.location = 'https://<?=$titler[3];?>/index.php'; 
	</script> 
<? 
exit();
	}
?>
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="https://<?=$titler[3];?>/js/coin-slider.js"></script>
<? } ?>
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(//<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;<? }if($bgr[4]==1){ ?>	
	background-attachment:fixed;
	<? } ?>
}
-->
</style>
</head>

<body>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td id="bg-main">
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="10%" align="center" valign="top"><? include "menu_a.php"; ?></td>
        <td width="80%" align="center" valign="top">
		
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">
<?
$sads2="SELECT * FROM `ads_a1` ORDER BY id ASC";
$reads2=mysqli_query($con_db, $sads2) or die("Error $sads2");
while($rads2=mysqli_fetch_row($reads2)){
?>
<table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" valign="middle"><? 
						  if($rads2[1]==1){ 
						  $ads2=stripslashes($rads2[3]); 
						  echo $ads2;
						  }else if($rads2[1]==2){ 
						  ?>
                        <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>" target="_blank">
                        <? if($rads2[2]==1){  ?>
                        <img src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="728" border="0" title="<?=$rads2[8];?>" />
                        <? }else if($rads2[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="https://<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high" pluginspage="https://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                        </object>
                        <? }} ?>
                      </a></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
                <? } ?></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <? if(isset($_SESSION['m_vip'])){ ?>
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" id="title-movie" style="font-size: 22px;"><?=$rpost[3];?>

                         </td>
                       </tr>
                        <tr>
                          <td height="30" align="left" id="font-main"><span style="background-color: #f1b00d;border-radius: 5px;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 
          <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>
                          </td>        
                        </tr>
                        <tr>
                          <td height="30" align="left" id="font-main">ประเภท  :: <span style="background-color: #00cc00;border-radius: 5px;"><a href="https://<?=$titler[3];?>/tag-<?=$rpost[15];?>/<?=$tag_cats[1];?>" title="<?=$tag_cats[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$tag_cats[1];?></a></span>
                          </td>        
                        </tr>

                    </table></td>
                  </tr> 
                  <? if($rpost[6]!=""){ ?> 
                  <tr>
                    <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">


                        <tr> 
                          <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>"width="440" height="" align="" title="" /></td>
                        </tr>
                      </table>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                      </table></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td><?=stripslashes($rpost[5]);?></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center">
							<? if($rpost[13]){ ?>
		<!-- <iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" width="100%" height="550"></iframe>  -->

		<iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>


								<?}  if($rpost[7]!=""){ ?>
<div id="show_video_youtube">Loading the player...</div>
<br/>
<?
}
$typevdo=strrchr($rpost[8],".");
if(($typevdo==".mp4")||($typevdo==".MP4")){
?>
<div id="show_video_mp4">Loading the player...</div>
<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
<div id="show_video_flv">Loading the player...</div>
<? } ?>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.js" type="text/javascript"></script>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
<script>jwplayer.key="J24lR5DaMXzI4unx2i4ctgwHDxzNww8sm+IuLw==";</script>
<script type="text/javascript">
<? if($rpost[7]!=""){ ?>
    jwplayer("show_video_youtube").setup({
        file: "<?=$rpost[7];?>",
        width: 640,
        height: 360
    });
	
<? 
}
if(($typevdo==".mp4")||($typevdo==".MP4")){ 
?>
	 jwplayer("show_video_mp4").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });

<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
	 jwplayer("show_video_flv").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });
<? } ?>	
	
</script>
                            </td>
                          </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                        <? if($rpost[10]==1){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div id="fb-root"></div>
                                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                          </tr>
                        </table>
                      <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div id="fb-root"></div>
                                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                          </tr>
                        </table>
                      <? }else{ ?>
                        <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                          <tr>
                            <td height="30" align="center" id="font-main" style="font-weight:bold; color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                          </tr>
                        </table>
                      <? }} ?>
                    </td>
                  </tr>
                </table>
                <? }else{ ?>
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center"><? if($rcate[2]==0&&$rcate[3]==0){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><? if(isset($_SESSION['m_vip'])){ ?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left" id="title-movie" style="font-size: 22px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="left" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

          <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>


                                       </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <? if($rpost[6]!=""){ ?>
                                <tr>
                                  <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" width="440" height="" align="" title="" /></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <? } ?>
                                <tr>
                                  <td><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center">
							<? if($rpost[13]){ ?>

			<iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>			
								<?} if($rpost[7]!=""){ ?>
<div id="show_video_youtube">Loading the player...</div>
<br/>
<?
}
$typevdo=strrchr($rpost[8],".");
if(($typevdo==".mp4")||($typevdo==".MP4")){
?>
<div id="show_video_mp4">Loading the player...</div>
<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
<div id="show_video_flv">Loading the player...</div>
<? } ?>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.js" type="text/javascript"></script>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
<script>jwplayer.key="J24lR5DaMXzI4unx2i4ctgwHDxzNww8sm+IuLw==";</script>
<script type="text/javascript">
<? if($rpost[7]!=""){ ?>
    jwplayer("show_video_youtube").setup({
        file: "<?=$rpost[7];?>",
        width: 640,
        height: 360
    });
	
<? 
}
if(($typevdo==".mp4")||($typevdo==".MP4")){ 
?>
	 jwplayer("show_video_mp4").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });

<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
	 jwplayer("show_video_flv").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });
<? } ?>	
	
</script>
                                          </td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <? if($rpost[10]==1){ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div4"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div4"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? }else{ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                                        <tr>
                                          <td height="30" align="center" id="font-main" style="font-weight:bold; color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <? }else{ ?>
                                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" id="font-main"><span style="font-size:16px; font-weight:bold; color:#FFFF00;">เฉพาะสมาชิกวีไอพีเท่านั้น!!!</span><br />
                                        <br />
                                        <span style="color:#f1b00d;">อ่านวิธีการสมัครสมาชิกวีไอพี</span> <a href="https://<?=$titler[3];?>/how-to-vip.php">คลิกที่นี่</a><br />
                                        <a href="https://<?=$titler[3];?>/forgot-password.php" style="color:#FFFFFF;" title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a> | <a href="https://<?=$titler[3];?>/member-condition.php" style="color:#FFFFFF;" title="สมัครสมาชิกใหม่">สมัครสมาชิกใหม่</a> </td>
                                  </tr>
                                </table>
                            <? } ?></td>
                          </tr>
                        </table>
                      <? }else if($rcate[2]==1&&$rcate[3]==0){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><? if(isset($_SESSION['m_other'])){ ?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left" id="title-movie" style="font-size: 22px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="left" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

                                                 <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>

                                        </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <? if($rpost[6]!=""){ ?>
                                <tr>
                                  <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" width="440" height="" align="" title="" /></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <? } ?>
                                <tr>
                                  <td><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center">
							<? if($rpost[13]){ ?>
		
		<iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	

								<?} if($rpost[7]!=""){ ?>
<div id="show_video_youtube">Loading the player...</div>
<br/>
<?
}
$typevdo=strrchr($rpost[8],".");
if(($typevdo==".mp4")||($typevdo==".MP4")){
?>
<div id="show_video_mp4">Loading the player...</div>
<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
<div id="show_video_flv">Loading the player...</div>
<? } ?>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.js" type="text/javascript"></script>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
<script>jwplayer.key="J24lR5DaMXzI4unx2i4ctgwHDxzNww8sm+IuLw==";</script>
<script type="text/javascript">
<? if($rpost[7]!=""){ ?>
    jwplayer("show_video_youtube").setup({
        file: "<?=$rpost[7];?>",
        width: 640,
        height: 360
    });
	
<? 
}
if(($typevdo==".mp4")||($typevdo==".MP4")){ 
?>
	 jwplayer("show_video_mp4").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });

<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
	 jwplayer("show_video_flv").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });
<? } ?>	
	
</script>
										  </td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <? if($rpost[10]==1){ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div8"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div8"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? }else{ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                                        <tr>
                                          <td height="30" align="center" id="font-main" style="font-weight:bold; color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <? }else{ ?>
                                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" id="font-main"><span style="font-size:16px; font-weight:bold; color:#FFFF00;">เฉพาะสมาชิกเท่านั้น!!!</span><br />
                                        <br />
                                        <a href="https://<?=$titler[3];?>/forgot-password.php" style="color:#FFFFFF;" title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a> | <a href="https://<?=$titler[3];?>/member-condition.php" style="color:#FFFFFF;" title="สมัครสมาชิกใหม่">สมัครสมาชิกใหม่</a> </td>
                                  </tr>
                                </table>
                            <? } ?></td>
                          </tr>
                        </table>
                      <? }else if($rcate[2]==1&&$rcate[3]==1){ ?>
                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="left" id="title-movie" style="font-size: 22px;"><?=$rpost[3];?></td>
                              </tr>
                              <tr>
                                <td height="30" align="left" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง <!--ทั่วไป-->

                                                 <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>

          
                                </td>
                              </tr>
                          </table></td>
                        </tr>
                        <? if($rpost[6]!=""){ ?>
                        <tr>
                          <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" width="440" height="" align="" title="" /></td>
                              </tr>
                            </table>
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                            </table></td>
                        </tr>
                        <? } ?>
                        <tr>
                          <td><?=stripslashes($rpost[5]);?></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center">
							<? if($rpost[13]){ ?>

		<iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>				
								<?} if($rpost[7]!=""){ ?>
<div id="show_video_youtube">Loading the player...</div>
<br/>
<?
}
$typevdo=strrchr($rpost[8],".");
if(($typevdo==".mp4")||($typevdo==".MP4")){
?>
<div id="show_video_mp4">Loading the player...</div>
<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
<div id="show_video_flv">Loading the player...</div>
<? } ?>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.js" type="text/javascript"></script>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
<script>jwplayer.key="J24lR5DaMXzI4unx2i4ctgwHDxzNww8sm+IuLw==";</script>
<script type="text/javascript">
<? if($rpost[7]!=""){ ?>
    jwplayer("show_video_youtube").setup({
        file: "<?=$rpost[7];?>",
        width: 640,
        height: 360
    });
	
<? 
}
if(($typevdo==".mp4")||($typevdo==".MP4")){ 
?>
	 jwplayer("show_video_mp4").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });

<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
	 jwplayer("show_video_flv").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });
<? } ?>	
	
</script>
								  </td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <? if($rpost[10]==1){ ?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><div id="div12"></div>
                                      <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                      <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                </tr>
                              </table>
                            <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><div id="div12"></div>
                                      <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                      <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                </tr>
                              </table>
                            <? }else{ ?>
                              <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                                <tr>
                                  <td height="30" align="center" id="font-main" style="font-weight:bold; color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                </tr>
                              </table>
                            <? }} ?>
                          </td>
                        </tr>
                      </table>
                      <? }else if($rcate[2]==0&&$rcate[3]==1){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><? if(isset($_SESSION['m_other'])){ ?>
                                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center"><span style="font-size:16px; font-weight:bold; color:#FFFF00;">ไม่อนุญาตสมาชิก</span></td>
                                  </tr>
                                </table>
                              <? }else{ ?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left" id="title-movie" style="font-size: 22px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="left" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-weight:bold; color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

                                                 <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>

                                        </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <? if($rpost[6]!=""){ ?>
                                <tr>
                                  <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" width="440" height="" align="" title="" /></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <? } ?>
                                <tr>
                                  <td><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center">
							<? if($rpost[13]){ ?>

		<iframe src="https://drive.google.com/file/d/<?=$rpost[13];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>					
								<?} if($rpost[7]!=""){ ?>
<div id="show_video_youtube">Loading the player...</div>
<br/>
<?
}
$typevdo=strrchr($rpost[8],".");
if(($typevdo==".mp4")||($typevdo==".MP4")){
?>
<div id="show_video_mp4">Loading the player...</div>
<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
<div id="show_video_flv">Loading the player...</div>
<? } ?>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.js" type="text/javascript"></script>
<script src="https://<?=$titler[3];?>/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
<script>jwplayer.key="J24lR5DaMXzI4unx2i4ctgwHDxzNww8sm+IuLw==";</script>
<script type="text/javascript">
<? if($rpost[7]!=""){ ?>
    jwplayer("show_video_youtube").setup({
        file: "<?=$rpost[7];?>",
        width: 640,
        height: 360
    });
	
<? 
}
if(($typevdo==".mp4")||($typevdo==".MP4")){ 
?>
	 jwplayer("show_video_mp4").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });

<? }else if(($typevdo==".flv")||($typevdo==".FLV")){ ?>
	 jwplayer("show_video_flv").setup({
        file: "https://<?=$titler[3];?>/vdo/<?=$rpost[8];?>",
        width: 640,
        height: 360
    });
<? } ?>	
	
</script>
										  </td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <? if($rpost[10]==1){ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div16"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div id="div16"></div>
                                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                              <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                                        </tr>
                                      </table>
                                    <? }else{ ?>
                                      <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                                        <tr>
                                          <td height="30" align="center" id="font-main" style="font-weight:bold; color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <? } ?></td>
                          </tr>
                        </table>
                      <? } ?>
                    </td>
                  </tr>
                </table>
                <? } ?></td>
            </tr>

            <tr>
              <td align="center">
<?
$sads7="SELECT * FROM `ads_a7` ORDER BY id ASC";
$reads7=mysqli_query($con_db, $sads7) or die("Error $sads7");
while($rads7=mysqli_fetch_row($reads7)){
?>
<table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" valign="middle"><? 
              if($rads7[1]==1){ 
              $ads7=stripslashes($rads7[3]); 
              echo $ads7;
              }else if($rads7[1]==2){ 
              ?>
                        <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>" target="_blank">
                        <? if($rads7[2]==1){  ?>
                        <img src="https://<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" alt="<?=$rads7[8];?>" width="728" border="0" title="<?=$rads7[8];?>" />
                        <? }else if($rads7[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="https://<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="https://<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" width="728" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                        </object>
                        <? }} ?>
                      </a></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
                <? } ?>
				
				
				
				
				
				
				
				</td>
            </tr>
            <tr>
				<td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>

<?	
$strSQL="SELECT id, title, img, view, movie, projection FROM `post` WHERE cate_id='$rcate[0]' ";
		$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQ1 บรรทัด 248");
		
		$Per_Page = 12;   // Per Page
		$strSQL .=" ORDER BY id DESC LIMIT $Per_Page";
		$objQuery  = mysqli_query($con_db, $strSQL);
		while($objResult = mysqli_fetch_row($objQuery)){
		$posturl=rewrite($objResult[1]);
			echo "<td width='180' align='center' valign='top'>"; 
			$intRows++;
?>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="10"></td>
                            </tr>
                          </table>
                          <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" id="box-movie" onmouseover="this.style.backgroundColor='#7e7e7e';" onmouseout="this.style.backgroundColor='#333333';"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
                                  <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center"><a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
                                            <? if($objResult[2]!=""){ ?>
                                            <img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="160" height="240" border="0" title="<?=$objResult[1];?>" />
                                            <? }else{ ?>
                                            <img src="//<?=$titler[3];?>/post-img/no-img.jpg" alt="<?=$objResult[1];?>" width="160" height="240" border="0" title="<?=$objResult[1];?>" />
                                            <? } ?>
                                          </a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5" align="center"><div  id="movie-corner" class="movie-<?=$objResult[4];?>"style="color: #ffffff;"><?=$objResult[4];?></div></td>
                                      </tr>
                                        </table>
                                          <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="left" id="font-main" style=""><a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>"><?=$objResult[1];?></a></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                        </table>
                                          <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>

                                                <td  width="50%"  id="font-main" style="font-size: 12px; color: #ffc582;">ปีที่ฉาย <?=$objResult[5];?> </td>

                                              <td align="right" id="font-main" style="font-size: 12px; color: #ffc582;">ดู <?=$objResult[3];?> ครั้ง</td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                  </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                          </table>
<?
			echo"</td>";
			if(($intRows)%4==0)
			{
				echo"</tr>";
			}
		}
		echo"</table>";
?>	


				</td>
            </tr>

            
        </table></td>
        <td width="10%" align="center" valign="top"><? include "menu.php"; ?></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="5"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="60" align="center" id="footer"><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
