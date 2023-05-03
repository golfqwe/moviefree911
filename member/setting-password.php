<?
session_start();	
if(!isset($_SESSION['member_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ; 
exit() ;
}
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการข้อมูลสมาชิก | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ระบบจัดการข้อมูลสมาชิก <?=$titler[5];?>">
<meta name="robots"  content="index,nofollow">
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "../header.php"; ?></td>
  </tr>
  <tr>
    <td id="bg-main"><table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="730" align="center" valign="top"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
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
                    <td align="left"><img src="//<?=$titler[3];?>/img/title-setting-password.png" width="230" height="25" /></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><form action="p-setting-password.php" method="post" enctype="multipart/form-data" name ="checkForm1" id="checkForm1" onsubmit="return check1()">
                            <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="130" height="25" align="right" id="font-main" style="font-weight:bold;">Email</td>
                                <td width="10" height="25" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="580" height="25" align="left" id="font-main"><input name="email" type="text" id="email" value="<?=$_SESSION['m_email'];?>" style="width:200px;" /></td>
                              </tr>
                              <tr>
                                <td width="130" height="25" align="right" id="font-main" style="font-weight:bold;">รหัสผ่าน</td>
                                <td width="10" height="25" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="580" height="25" align="left" id="font-main"><input name="pass" type="password" id="pass" style="width:200px;" />
                                  *</td>
                              </tr>
                              <tr>
                                <td width="130" height="25" align="right" id="font-main" style="font-weight:bold;">ยืนยันรหัสผ่าน</td>
                                <td width="10" height="25" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="580" height="25" align="left" id="font-main"><input name="repass" type="password" id="repass" style="width:200px;" />
                                  *</td>
                              </tr>
                              <tr>
                                <td width="130" height="25" align="right">&nbsp;</td>
                                <td width="10" height="25" align="center">&nbsp;</td>
                                <td width="580" height="25" align="left"><input type="submit" name="Submit" value="บันทึกข้อมูล" style="width:100px;" /></td>
                              </tr>
                            </table>
                            <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm1.email.value=="") {
alert("กรุณากรอก Email ด้วยนะครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('@')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('.')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(document.checkForm1.pass.value=="") {
alert("กรุณากรอกรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm1.pass.focus() ;
return false ;
}
else if(document.checkForm1.repass.value=="") {
alert("กรุณากรอกยืนยันรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm1.repass.focus() ;
return false ;
}
else if(document.checkForm1.pass.value != document.checkForm1.repass.value) {
alert("รหัสผ่านของคุณกรอกไม่ตรงกันครับ") ;
document.checkForm1.repass.focus() ;
return false ;
}
else 
return true ;
}

                          </script>
                          </form></td>
                        </tr>
                      </table>
</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>

        <td width="10%" align="center" valign="top"><? include "../menu.php"; ?></td>
      </tr>
        <tr width="10%">
    <td height="60" align="center" id="footer"><? include "../footer.php"; ?></td>
  </tr>

    </table></td>
  </tr>

</table>
</body>
</html>


