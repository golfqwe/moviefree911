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
<title>แก้ไขข้อมูลส่วนตัว | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> แก้ไขข้อมูลส่วนตัว <?=$titler[5];?>">
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
        <td id="bg-main">
     <table width="1200" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="10%" align="center" valign="top"><? include "../menu_a.php"; ?></td>
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
                    <td id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px; background-color: <? echo $theme_bgcolor;?>;">แก้ไขข้อมูลส่วนตัว</td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<?
$s="SELECT pass FROM `member` WHERE id='$_SESSION[m_id]'  AND actived=1";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$r=mysqli_fetch_row($re);
if($r[0]==""){
echo "<meta http-equiv='refresh' content='0;url=setting-password.php'>" ; 
}else{
?>
                      <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><form action="p-edit-personal.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="150" height="35" align="right" id="font-main">ชื่อที่ใช้เรียก/นามแฝง</td>
                                <td width="10" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="440" height="35"><input name="name" type="text" id="name" value="<?=$_SESSION['m_name'];?>"style="background:#FFFFFF;  width:340px; height: 30px; font-size: 18px;" /></td>
                              </tr>
                              <tr>
                                <td width="150" height="35" align="right" id="font-main">Email</td>
                                <td width="10" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="440" height="35"><input name="email" type="text" id="email" value="<?=$_SESSION['m_email'];?>" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 18px;" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="right" id="font-main">รหัสผ่าน</td>
                                <td width="10" align="center" id="font-main" style="font-weight:bold;">:</td>
                                <td width="440" height="20" id="font-main" style="color:#FFFF00;"><input name="pass" type="password" id="pass" value="<?=$r[0];?>" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 18px;" /> <?=$r[0];?></td>
                              </tr>

                              <tr>
                                <td width="150" height="20">&nbsp;</td>
                                <td width="10" align="center">&nbsp;</td>
                                <td width="440" height="20"><label>
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
                      </table>
<? } ?>
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

