<?php
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

$new_view=$rpost[11]+1;
$upd_view="UPDATE post SET view='$new_view' WHERE id='$topic_id'" or die("ERROR upd_view");
mysqli_query($con_db, $upd_view);



$tag_member="SELECT exp_date, type FROM `member` where id='".$_SESSION['m_id']."' ORDER BY id DESC";
$re_member=mysqli_query($con_db, $tag_member) or die("ERROR tag_category $tag_cat");
$member_cats=mysqli_fetch_assoc($re_member);
  //$member_exp=$member_cats[0]

  if($member_cats[1]!='1' && $member_cats[1]!='2'){
    $member_exp=$member_cats[0];
  }else{
    $member_exp=date('Y-m-d', strtotime("+1 day"));
  }
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
                <? if(isset($_SESSION['m_vip'])){
                    if($member_exp > date('Y-m-d')){

                 ?>


                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" id="title-movie" style="font-size: 23px;"><?=$rpost[3];?>

                         </td>
                       </tr>
                        <tr>
                          <td height="30" align="center" id="font-main">หมวดหมุ่ :: <span style="background-color: #f1b00d;border-radius: 5px;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=2124626527839517&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>


<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-color="default" data-size="large" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a class="twitter-share-button"
  href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-size="large"
  data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-related="twitterapi,twitter">
</a>




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
                    <td style="color: #FFFFFF; font-size: 15px;"><?=stripslashes($rpost[5]);?></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
	            <?if($rpost[13]=='series'){ ?>
                                        <tr style="font-size: 17px;">
                                          <td>
							<?
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC LIMIT 1";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px;width:100%; float:left;text-align:center">Ep. 1  '.$rpost[3].'<br>';
							echo '</span>';

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[1] == ''){  
							?>
								<tr>
									<td align="center">
										<iframe src="https://drive.google.com/file/d/<?=$r_series[1];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	
									</td>
								</tr>
								<? }  if(!$r_series[2] == ''){?>
								<tr>
									<td align="center">
										<? echo $r_series[2];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
								?>
                                           </td>
                                       </tr>
										
										<tr>
                                          <td>
							<? $ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px 5px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #000000">Ep. '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span><hr>';

								 $ep++;
								} 
								?>
                                  </td>
								</tr>
 						<? }else{ ?>	
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
						  <?}?>
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
                            <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                          </tr>
                        </table>
                      <? }} ?>
                    </td>
                  </tr>
                </table>

              <?}else{?>

                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td bgcolor="#db6300" height="400" align="center" id="font-main"><span style="font-size:45px; color:#FFFF00;">ผู้หมดอายุ!!!</span><br />
                                        <br />
                                        <span style="color:#f1b00d;font-size: 25px;">อ่านวิธีการสมัครสมาชิกวีไอพี</span> <a href="https://<?=$titler[3];?>/how-to-vip.php"style="color:#FFFFFF;font-size: 35px;">คลิกที่นี่</a><br />
                                        <a href="https://<?=$titler[3];?>/forgot-password.php" style="color:#FFFFFF;font-size: 25px; " title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a> | <a href="https://<?=$titler[3];?>/member-condition.php" style="color:#FFFFFF;font-size: 25px;" title="สมัครสมาชิกใหม่">สมัครสมาชิกใหม่</a> </td>
                                  </tr>
                              </table>

              <? } ?>


                <? }else{ ?>

                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center">
                      <? if($rcate[2]==0&&$rcate[3]==0){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><? if(isset($_SESSION['m_vip'])){ ?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center" id="title-movie" style="font-size: 23px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="center" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=2124626527839517&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>


<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-color="default" data-size="large" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a class="twitter-share-button"
  href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-size="large"
  data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-related="twitterapi,twitter">
</a>


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
                                  <td style="color: #FFFFFF; font-size: 15px;"><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
	            <?if($rpost[13]=='series'){ ?>
                                        <tr style="font-size: 17px;">
                                          <td>
							<?
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC LIMIT 1";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px; width:100%; float:left;text-align:center">Ep. 1  '.$rpost[3].'<br>';
							echo '</span>';

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[1] == ''){  
							?>
								<tr>
									<td align="center">
										<iframe src="https://drive.google.com/file/d/<?=$r_series[1];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	
									</td>
								</tr>
								<? }  if(!$r_series[2] == ''){?>
								<tr>
									<td align="center">
										<? echo $r_series[2];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
								?>
                                           </td>
                                       </tr>
                                        </tr>
                                          </td>
							<? $ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px 5px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #000000">Ep. '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span><hr>';

								 $ep++;
								} 
								?>
                                  </td>
								</tr>
 						<? }else{ ?>	 
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
										<?}?>
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
}else if($rpost[10]==3){ 
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
                                          <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <? }else{ ?>
                               <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td bgcolor="#db6300" height="400" align="center" id="font-main"><span style="font-size:45px; color:#FFFF00;">เฉพาะสมาชิกวีไอพีเท่านั้น!!!</span><br />
                                        <br />
                                        <span style="color:#f1b00d;font-size: 25px;">อ่านวิธีการสมัครสมาชิกวีไอพี</span> <a href="https://<?=$titler[3];?>/how-to-vip.php"style="color:#FFFFFF;font-size: 35px;">คลิกที่นี่</a><br />
                                        <a href="https://<?=$titler[3];?>/forgot-password.php" style="color:#FFFFFF;font-size: 25px; " title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a> | <a href="https://<?=$titler[3];?>/member-condition.php" style="color:#FFFFFF;font-size: 25px;" title="สมัครสมาชิกใหม่">สมัครสมาชิกใหม่</a> </td>
                                  </tr>
                                </table>
                            <? } ?>
                            </td>
                          </tr>
                        </table>


                      <? }else if($rcate[2]==1&&$rcate[3]==0){ ?>

                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><?if(isset($_SESSION['member_login'])){?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center" id="title-movie" style="font-size: 23px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="center" id="font-main">หมวดหมุ่ :: <span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=2124626527839517&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>


<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-color="default" data-size="large" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a class="twitter-share-button"
  href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-size="large"
  data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-related="twitterapi,twitter">
</a>

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
                                  <td style="color: #FFFFFF; font-size: 15px;"><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
	            <?if($rpost[13]=='series'){ ?>
                                        <tr style="font-size: 17px;">
                                          <td>
							<?
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC LIMIT 1";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px; width:100%; float:left;text-align:center">Ep. 1  '.$rpost[3].'<br>';
							echo '</span>';

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[1] == ''){  
							?>
								<tr>
									<td align="center">
										<iframe src="https://drive.google.com/file/d/<?=$r_series[1];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	
									</td>
								</tr>
								<? }  if(!$r_series[1] == ''){?>
								<tr>
									<td align="center">
										<? echo $r_series[2];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
								?>
                                           </td>
                                       </tr> 
										<tr>
                                          <td>
							<? $ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px 5px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #000000">Ep. '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span><hr>';

								 $ep++;
								} 
								?>
                                  </td>
								</tr>
 						<? }else{ ?>	
										
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
										<?}?>
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
                                          <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <? }else{ ?>
                               <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td bgcolor="#db6300" height="400" align="center" id="font-main"><span style="font-size:45px; color:#FFFF00;">เฉพาะสมาชิกเท่านั้น!!!</span><br />
                                        <br />
                                        <span style="color:#f1b00d;font-size: 35px;">สมัครสมาชิก</span> <a href="https://<?=$titler[3];?>/member-condition.php"style="color:#FFFFFF;font-size: 35px;">คลิกที่นี่</a><br />
                                        <a href="https://<?=$titler[3];?>/forgot-password.php" style="color:#FFFFFF;font-size: 25px; " title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a> | <a href="https://<?=$titler[3];?>/member-condition.php" style="color:#FFFFFF;font-size: 25px;" title="สมัครสมาชิกใหม่">สมัครสมาชิกใหม่</a> </td>
                                  </tr>
                                </table>
                            <? } ?>

                              </td>
                          </tr>
                        </table>





                      <? }else if($rcate[2]==1&&$rcate[3]==1){ ?>
                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" id="title-movie" style="font-size: 23px;"><?=$rpost[3];?></td>
                              </tr>
                              <tr>
                                <td height="30" align="center" id="font-main">หมวดหมู่ :: <span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง <!--ทั่วไป-->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=2124626527839517&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>


<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-color="default" data-size="large" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a class="twitter-share-button"
  href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-size="large"
  data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-related="twitterapi,twitter">
</a>

          
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
                          <td style="color: #FFFFFF; font-size: 15px;"><?=stripslashes($rpost[5]);?></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
	            <?if($rpost[13]=='series'){ ?>
                                        <tr style="font-size: 17px;">
                                          <td>
							<?
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC LIMIT 1";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px; width:100%; float:left;text-align:center">Ep. 1  '.$rpost[3].'<br>';
							echo '</span>';

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[1] == ''){  
							?>
								<tr>
									<td align="center">
										<iframe src="https://drive.google.com/file/d/<?=$r_series[1];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	
									</td>
								</tr>
								<? }  if(!$r_series[2] == ''){?>
								<tr>
									<td align="center">
										<? echo $r_series[2];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
								?>
                                           </td>
                                       </tr>
										<tr>
                                          <td>
							<? $ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px 5px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #000000">Ep. '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span><hr>';

								 $ep++;
								} 
								?>
                                  </td>
								</tr>
 						<? }else{ ?>			
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
								<?}?>
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
                                  <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                </tr>
                              </table>
                            <? }} ?>
                          </td>
                        </tr>
                      </table>


                      <? }else if($rcate[2]==0&&$rcate[3]==1){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><?if(!isset($_SESSION['member_login'])){?>
                              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center" id="title-movie" style="font-size: 23px;"><?=$rpost[3];?></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="center" id="font-main"><span style="background-color: #f1b00d;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=2124626527839517&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>


<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-color="default" data-size="large" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a class="twitter-share-button"
  href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-size="large"
  data-url="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html"
  data-related="twitterapi,twitter">
</a>

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
                                  <td style="color: #FFFFFF; font-size: 15px;"><?=stripslashes($rpost[5]);?></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

	            <?if($rpost[13]=='series'){ ?>
                                         <tr style="font-size: 17px;">
                                          <td>
							<?
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC LIMIT 1";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px; width:100%; float:left;text-align:center">Ep. 1  '.$rpost[3].'<br>';
							echo '</span>';

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[1] == ''){  
							?>
								<tr>
									<td align="center">
										<iframe src="https://drive.google.com/file/d/<?=$r_series[1];?>/preview" frameborder="0" width="100%" height="550" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"> </iframe>	
									</td>
								</tr>
								<? }  if(!$r_series[2] == ''){?>
								<tr>
									<td align="center">
										<? echo $r_series[2];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
								?>
                                           </td>
                                       </tr>
										<tr>
                                          <td>
							<? $ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['topic_id']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #f1b00d;border-radius: 2px; color:#333333; padding:5px 5px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #000000">Ep. '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span><hr>';

								 $ep++;
								} 
								?>
                                          </td>
                                        </tr>
 						<? }else{ ?>			
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
							<?}?>
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
                                          <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                                        </tr>
                                      </table>
                                    <? }} ?>
                                  </td>
                                </tr>
                              </table>
                              <?}?>
                              </td>
                          </tr>
                        </table>
                      <? } ?>








                    </td>
                  </tr>
                </table>
                <? } ?>



				</td>
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
                                              <td align="right" id="font-main" style="font-size: 12px;color: #ffc582;">ดู <?=$objResult[3];?> ครั้ง</td>
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
