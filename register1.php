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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161006242-1">
</script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-161006242-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$check=$_POST['check'];
if($check!=1){
?>
<script language="JavaScript" type="text/javascript"> 	
	alert('ขอโทษครับ ท่านยังไม่ได้ยอมรับเงื่อนไขข้อตกลงในการสมัครสมาชิกครับ'); 	
	window.location = 'member-condition.php'; 
</script>
<? exit(); } ?>
<title>ลงทะเบียนสมัครสมาชิก | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ลงทะเบียนสมัครสมาชิก <?=$titler[5];?>">
<meta name="robots"  content="index,follow">
<link rel="stylesheet" href="//<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="//<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="//<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="//<?=$titler[3];?>/js/coin-slider.js"></script>
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
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
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
$sads2="SELECT * FROM `ads_a2` ORDER BY id ASC";
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
                        <img src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="728" border="0" title="<?=$rads2[8];?>" />
                        <? }else if($rads2[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
              <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left"><img src="img/title-register.png" width="230" height="25" /></td>
                  </tr>
                  <tr>
                    <td align="center"><form action="p-register.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                      <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right" id="font-main">ชื่อที่ใช้เรียก/นามแฝง</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><input name="name" type="text" id="name" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right" id="font-main">Email</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><input name="email" type="text" id="email" /></td>
                        </tr>
                        <tr>
                          <td align="right" id="font-main">รหัสผ่าน</td>
                          <td>&nbsp;</td>
                          <td width="440"><input name="pass" type="password" id="pass" /></td>
                        </tr>
                        <tr>
                          <td align="right" id="font-main" style="font-weight:bold; color:#B00D0E;"><table width="100" border="0" align="right" cellpadding="0" cellspacing="0" style="background:#FFFFFF;">
                            <tr>
                              <td align="center">
<? 
$rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,4);
echo $rand;
?>
                              </td>
                            </tr>
                          </table></td>
                          <td>&nbsp;</td>
                          <td id="font-main"><input name="capcha" type="text" id="capcha" style="width:100px;" /> * &lt;= กรอกรหัสยืนยัน
                            <input type="hidden" name="rands" id="rands" value="<?=$rand;?>" /></td>
                        </tr>
                        <tr>
                          <td width="150">&nbsp;</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><label>
                            <input type="submit" name="Submit" value="บันทึกข้อมูล" />
                          </label></td>
                        </tr>
                      </table>
                      <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.name.value=="") {
alert("กรุณากรอกชื่อที่ใช้เรียก/นามแฝงด้วยนะครับ") ;
document.checkForm.name.focus() ;
return false ;
}else if(document.checkForm.email.value=="") {
alert("กรุณากรอก Email ด้วยนะครับ") ;
document.checkForm.email.focus() ;
return false ;
}else if(document.checkForm.pass.value=="") {
alert("กรุณากรอกรหัสผ่านด้วยนะครับ") ;
document.checkForm.pass.focus() ;
return false ;
}
else 
return true ;
}
                      </script>
                    </form></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="5" align="center" valign="top">&nbsp;</td>
        <td width="250" align="center" valign="top"><? include "menu.php"; ?></td>
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
