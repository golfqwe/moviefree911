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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลืมรหัสผ่าน | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ลืมรหัสผ่าน <?=$titler[5];?>">
<meta name="robots"  content="index,follow">
<link rel="stylesheet" href="//<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="//<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="//<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="//<?=$titler[3];?>/js/coin-slider.js"></script>
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
                    <td id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px; background-color: #<? echo $theme_bgcolor;?>;"><h1 style="color: #FFFFFF; font-size: 26px; margin-top: 2px;height: 23px;font-weight: 300;">ลืมรหัสผ่าน</h1></td>
                    
                  </tr>
                  <tr>
                    <td align="center"><form action="p-forgot-pass.php" method="post" enctype="multipart/form-data" name ="checkForm1" id="checkForm1" onsubmit="return check2()">
                      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="100" align="right" id="font-main" style="font-size: 22px;">Email</td>
                                  <td width="10">&nbsp;</td>
                                  <td width="440" align="left"><input name="email" type="text" id="email" style="font-size: 18px; width:440px; height: 35px;"/></td>
                                  <td width="10" align="right">&nbsp;</td>
                                  <td width="90"align="left" ><input type="submit" name="Submit" value="ส่งคำร้อง" /></td>
                                </tr>
                              </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                            </table></td>
                        </tr>
                      </table>
<script language="JavaScript" type="text/javascript">

function check2() {
if(document.checkForm1.email.value=="") {
alert("กรุณากรอกอีเมล์ของคุณด้วยนะครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('@')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('.')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else 
return true ;
}

</script>
                    </form>
				   </td>
                  </tr>
              </table></td>
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

