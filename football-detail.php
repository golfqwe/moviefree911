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


$scate="select * from  `football_league` WHERE id='".$_GET['id']."'";
$recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
$rcate=mysqli_fetch_row($recate);
$file_home=$rcate[4];
$file_visit=$rcate[6];

$date_league=$rcate[1];
$time_league=$rcate[2];
$home_league=$rcate[3];
$visit_league=$rcate[5];
$link_league=$rcate[7];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $home_league;?> พบกับ <? echo $visit_league;?> | รายการถ่ายทอดสดการแข่งขันฟุตบอล</title>
<META NAME="keywords" CONTENT="<? echo $home_league;?> พบกับ <? echo $visit_league;?> | รายการถ่ายทอดสดการแข่งขันฟุตบอล"> 
<META NAME="description" CONTENT="<? echo $home_league;?> พบกับ <? echo $visit_league;?> | รายการถ่ายทอดสดการแข่งขันฟุตบอล">
<meta name="robots"  content="index,follow">


<meta property="og:site_name" content="https://<?=$titler[3];?>" />
  <meta property="og:url"                content="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$rpost[4];?>" />
  <meta property="og:description"        content="<? echo $home_league;?> พบกับ <? echo $visit_league;?> | รายการถ่ายทอดสดการแข่งขันฟุตบอล" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" />
<link rel="canonical" href="https://<?=$titler[3];?>/football-detail.php?id=<?=$rcate[0];?>" />
<meta property="og:image:alt" content="<? echo $home_league;?> พบกับ <? echo $visit_league;?> | รายการถ่ายทอดสดการแข่งขันฟุตบอล" />

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

</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td id="bg-main"style=" background-color: #<?=$bgr[1];?>;
  <? if($bgr[2]!=""){ ?>background-image: url(//<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
  background-repeat: <?=$bgr[3];?>;<? }if($bgr[4]==1){ ?> 
  background-attachment:fixed;
  <? } ?>">
     <table width="1200" border="0" align="center" cellpadding="2" cellspacing="0"bgcolor="#000000"> 
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




          <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                  <td id="rcorners4" align="center" id="title-movie" style="background-color: #<? echo $theme_bgcolor;?>; color: #FFFFFF; font-size: 22px; height: 40px;">รายการถ่ายทอดสดการแข่งขันฟุตบอล
                  </td>
                </tr>
              </table>
              </td>
            </tr>
          </table>
          <table width="730" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#3d3d3d">
            <tr>
              <td align="center" width="40%"><img src="//<?=$titler[3];?>/post-img/<? echo $file_home;?>" width="80" border="0" /></td>
              <td align="center" width="20%"><img src="//<?=$titler[3];?>/img/vs.png" width="80" border="0" /></td>
              <td align="center" width="40%"><img src="//<?=$titler[3];?>/post-img/<? echo $file_visit;?>" width="80" border="0" /></td>
            </tr>
            <tr>
              <td align="center" style="color: #f7b21e;"><? echo $home_league;?></td>
              <td align="center" style="font-size:14px; color: #FFFFFF;"><? echo date("d-m-Y", strtotime($date_league))." ".date("H:i", strtotime($time_league));?></td>
              <td align="center" style="color: #ff8336;"><? echo $visit_league;?></td>
            </tr>
            <tr>
              <td align="center" colspan="3">
<!--
                <iframe width="730" height="424" src="<? echo $link_league;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              -->
<br>
<div id="player">Loading..</div>
<!--<script src="https://content.jwplatform.com/libraries/lqsWlr4Z.js"></script>
<script src="https://jwpsrv.com/library/iCNxUOakEeKTGxIxOQulpA.js"></script> -->
<script src="https://content.jwplatform.com/libraries/KB5zFt7A.js"></script>
<script>
jwplayer("player").setup({
    "file": "<? echo $link_league;?>",
    "width": "100%",
    "aspectratio": "16:9",
    "type": "hls",
    "primary": "html5",
    "autostart": true,
  "hlshtml": true
});
</script>


<!-- code .m3u8
<script src="https://jwpsrv.com/library/iCNxUOakEeKTGxIxOQulpA.js"></script>
    <script>jwplayer.key="IlVNgC+NtBYXe66VHWfLpLzgHU7cOg7MBhdlHA=="; </script>
    <br />
<div id="mediaspace">
</div>
<script>
        var createPlayer = function ()
        {
          jwplayer('mediaspace').setup({
             playlist: [{ file: '<//?=$rpost['pro_link'];?>' }],
             width: '100%',
             height: '650',
             autostart: true,
             aspectratio: '16:9',
             primary: 'html5',
             androidhls: true,
    events:{
    onReady:function(){
     jwplayer().setVolume(100);
    }
   }
          });
        }
        createPlayer();
    </script>
-->




              </td>
            </tr>
          </table>



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
            
        </table></td>
        <td width="10%" align="center" valign="top"><? include "menu.php"; ?></td>
      </tr>
        <tr width="10%">
    <td height="60" align="center" id="footer"><? include "footer.php"; ?></td>
  </tr>

    </table></td>
  </tr>

</table>
</body>
</html>
