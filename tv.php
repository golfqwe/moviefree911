<?php
session_start();	
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
$title="SELECT * FROM web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);

$bg="SELECT * FROM bg where id=1";
$bgre=mysqli_query($con_db, $bg) or die("ERROR $bg");
$bgr=mysqli_fetch_row($bgre);

$strSQL="SELECT * FROM `tv_post` where id='".$_GET['id']."' ";
$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQL บรรทัด 248");
$objResult = mysqli_fetch_row($objQuery);
$posturl=rewrite($objResult[2]);

$new_view=$objResult[8]+1;
$upd_view="UPDATE tv_post SET view='".$new_view."' WHERE id='".$_GET['id']."'" or die("ERROR upd_view");
mysqli_query($con_db, $upd_view);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$objResult[2];?></title>
<META NAME="keywords" CONTENT="<?=$objResult[6];?>"> 
<META NAME="description" CONTENT="<?=$objResult[7];?>">
<meta name="robots"  content="index,follow">
<meta property="og:site_name" content="https://<?=$titler[3];?>" />
  <meta property="og:url"                content="https://<?=$titler[3];?>/blog-<?=$objResult[0];?>/<?=$posturl;?>.html" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$objResult[6];?>" />
  <meta property="og:description"        content="<?=$objResult[7];?>" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/post-img/<?=$objResult[2];?>"/>
<link rel="canonical" href="https://<?=$titler[3];?>/blog-<?=$objResult[0];?>/<?=$posturl;?>.html" />
<meta property="og:image:alt" content="<?=$objResult[2];?>" />


<link rel="stylesheet" href="https://<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="https://<?=$titler[3];?>/js/coin-slider.js"></script>
<? } ?>

<style>
.label {
  color: white;
  padding: 4px;
}
.success {background-color: #04AA6D;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 
</style>
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
            <tr width="720">
              <td align="center">
                

                                      <table width="720" border="0" cellpadding="5" cellspacing="0" style="background-color: #7e7e7e;">
                                        <tr>
                                          <td align="center" width="100%"><p>
<span class="label warning" style="border-radius: 4px;margin:2px;font-size: 23px"><?=$objResult[2];?></span><p>
                                            <a href="//<?=$titler[3];?>/tv-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[2];?>">
                                            <? if($objResult[2]!=""){ ?>
                                            <img src="//<?=$titler[3];?>/post-img/<?=$objResult[3];?>" alt="<?=$objResult[2];?>" width="100" border="0" title="<?=$objResult[2];?>" />
                                            <? }else{ ?>
                                            <img src="//<?=$titler[3];?>/post-img/no-img.jpg" alt="<?=$objResult[2];?>"height="250" border="0" title="<?=$objResult[2];?>" />
                                            <? } ?>
                                          </a><br>
                                          <a href="//<?=$titler[3];?>/tv-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[2];?>"style="font-size: 18px"><?=$objResult[2];?></a>
                                          <br>
<!--เนื้อหา-->
<?=$objResult[9];?> 

<? if($objResult[4]){?>    
<!--URL M3U8
<script src="https://jwpsrv.com/library/iCNxUOakEeKTGxIxOQulpA.js"></script>
    <script>jwplayer.key="IlVNgC+NtBYXe66VHWfLpLzgHU7cOg7MBhdlHA=="; </script>
    <br />
<div id="mediaspace">
</div>
<script>
        var createPlayer = function ()
        {
          jwplayer('mediaspace').setup({
             playlist: [{ file: '<//?=$objResult[4];?>' }],
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
    </script>-->
          <div id="player">Loading..</div>
                        <script src="https://content.jwplatform.com/libraries/KB5zFt7A.js"></script>
                        <script>
                            jwplayer("player").setup({
                                "file": "<?=$objResult[4];?>",
                                "width": "100%",
                                "aspectratio": "16:9",
                                "type": "hls",
                                "primary": "html5",
                                "autostart": true,
                                "hlshtml": true
                            });
                        </script>
<? }?>

    ดูแล้ว <?=$objResult[8];?>  ครั้ง
                                          <br>

                                          </td>
                                        </tr>
                                      </table>

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
