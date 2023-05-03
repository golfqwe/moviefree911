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
<title>ติดต่อเรา ติดต่อลงโฆษณา | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ติดต่อเรา ติดต่อลงโฆษณา <?=$titler[5];?>">
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
                    <td  id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px;background-color: #<? echo $theme_bgcolor;?>;"><h1 style="color: #FFFFFF; font-size: 26px; margin-top: 2px;height: 23px;font-weight: 300;">ติดต่อเราที่นี่</h1></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%"border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="100%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="80" align="left" id="font-main" style=""> &nbsp; &nbsp;    หากท่านต้องการติดต่อลงโฆษณา แนะนำ ติชม แจ้งปัญหาการใช้งาน หรือสอบถามข้อมูลการให้บริการ ท่านสามารถติดต่อเราผ่านช่องทาง ดังต่อไปนี้</td>
                            </tr>
                            <tr>
                              <td>
<?
$s9="SELECT * FROM `web_detail`";
$re9=mysqli_query($con_db, $s9)or die("Err $s9 บรรทัด103");
$r9=mysqli_fetch_row($re9);
?>
                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                                    <tr>
                                      <td align="center" id="font-main" style=" color:#FFFF00; font-size: 17px;"><?=$r9[1];?></td>
                                    </tr>

                                    <tr>
                                      <td align="center" id="font-main"style="font-size: 18px;" >Email : <?=$r9[2];?></td>
                                    </tr>
                                    <tr>
                                      <td align="center" id="font-main">หรือ ผ่านฟอร์มการติดต่ออนไลน์ ในหน้านี้</td>
                                    </tr>
                                    <tr>
                                      <td height="30" align="center"></td>
                                    </tr>
                                </table></td>
                            </tr>
                        </table></td>


                        <td width="10" valign="top">&nbsp;</td>
                   
                      </tr>
                    </table>


<!--ตำแหน่ง -->
                                  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="center" id="font-main" style="font-size: 20px;">ฟอร์มการติดต่อออนไลน์</td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><form action="p-contact.php" method="post" name="checkForm" id="checkForm" onsubmit="return check1()" style="height:270px;">
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="200" height="35" align="left" id="font-main">เรื่องที่ติดต่อ</td>
                                              <td width="220" height="35" align="left"><select name="title" id="title" style="background:#c2c2c2;  width:440px; height: 30px; font-size: 17px;">
                                                  <option value="" >-โปรดเลือกหัวข้อที่ติดต่อ-</option>
                                                  <option value="แนะนำ ติชม">แนะนำ ติชม</option>
                                                  <option value="แจ้งปัญหาการใช้งาน">แจ้งปัญหาการใช้งาน</option>
                                                  <option value="ติดต่อลงโฆษณา">ติดต่อลงโฆษณา</option>
                                                  <option value="ติดต่อสอบถามเรื่องอื่นๆ">ติดต่อสอบถามเรื่องอื่นๆ</option>
                                                </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="35" align="left" id="font-main">ชื่อผู้ติดต่อ</td>
                                              <td width="220" height="35" align="left"><input name="name" type="text" id="name" size="30" style="background:#c2c2c2;  width:440px; height: 30px; font-size: 17px;"/></td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="35" align="left" id="font-main">Email</td>
                                              <td width="220" height="35" align="left"><input name="email" type="text" id="email" size="30" style="background:#c2c2c2;  width:440px; height: 30px; font-size: 17px;" /></td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="35" align="left" id="font-main">เบอร์โทรศัพท์</td>
                                              <td width="220" height="35" align="left"><input name="tel" type="text" id="tel" style="background:#c2c2c2;  width:440px; height: 30px; font-size: 17px;" /></td>
                                            </tr>

                                            <tr>
                                              <td width="100" height="35" align="left" id="font-main">รายละเอียด/ข้อความถึงเรา</td>
                                              <td width="220" height="45" align="left"><textarea name="detail" rows="5" id="detail"  style="background:#c2c2c2;  width:440px; height: 130px; font-size: 17px;"></textarea></td>
                                            </tr>


                                              <td width="100" height="35" align="left" id="font-main">หาผลบวกของ
<?
$a=rand(0,9);
$b=rand(0,9);
$s=$a+$b;
echo "$a+$b";
?>
                                              </td>
                                              <td width="220" height="35" align="left" id="font-main" style="color:#FFFF00;"><input name="ans" type="text" id="ans" size="5" maxlength="2"  style="background:#c2c2c2;  width:120px; height: 30px; font-size: 17px;"/> &lt;==ใส่คำตอบ
                                                  <input type="hidden" id="ask" name="ask" value="<?=$s;?>" /></td>
                                            </tr>
                                            <tr>
                                              <td height="35" colspan="2" align="center"><input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล"   /></td>
                                            </tr>
                                          </table>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณาเลือกหัวข้อเรื่องที่ติดต่อด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}
else if(document.checkForm.name.value=="") {
alert("กรุณาระบุชิ่อผู้ติดต่อด้วยนะครับ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.email.value=="") {
alert("กรุณาระบุ Email ด้วยนะครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('@')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('.')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(document.checkForm.tel.value=="") {
alert("กรุณาระบุเบอร์โทรศัพท์ด้วยนะครับ") ;
document.checkForm.tel.focus() ;
return false ;
}
else if(document.checkForm.detail.value=="") {
alert("กรุณาระบุรายละเอียดที่ติดต่อด้วยนะครับ") ;
document.checkForm.detail.focus() ;
return false ;
}
else if(document.checkForm.ans.value=="") {
alert("กรุณากรอกคำตอบด้วยนะครับ") ;
document.checkForm.ans.focus() ;
return false ;
}
else if(isNaN(document.checkForm.ans.value)) {
alert("กรุณากรอกคำตอบด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.ans.focus() ;
return false ;
}
else if(document.checkForm.ans.value != <?=$s;?>) {
alert("คุณบวกเลขไม่ถูกต้องครับ") ;
document.checkForm.ans.focus() ;
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
  <td width="10%" align="center" valign="top"><? include "menu.php"; ?></td>
      </tr>
        <tr width="10%">
    <td height="60" align="center" ><? include "footer.php"; ?></td>
  </tr>

    </table></td>
  </tr>

</table>
</body>
</html>

