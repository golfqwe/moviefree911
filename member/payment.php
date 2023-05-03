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
<title>แจ้งโอนเงินผ่านธนาคาร | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> แจ้งโอนเงินผ่านธนาคาร <?=$titler[5];?>">
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
                    <td id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px; background-color: <? echo $theme_bgcolor;?>;">แจ้งโอนเงินผ่านธนาคาร</td>
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
                          <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="30" align="center" id="font-main" style="font-size: 22px; color:#f1b00d;">ช่องทางการชำระเงิน</td>
                                  </tr>
                                  <tr>
                                    <td><table width="500" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="16" align="center" valign="top"><img src="../img/arr.png" width="16" height="16" /></td>
                                          <td width="10" valign="top">&nbsp;</td>
                                          <td width="464" align="left" valign="top" id="font-main">เมื่อแจ้งการชำระเงินเข้ามาแล้ว โปรดรอสักครู่ เพื่อให้เจ้าหน้าที่ทำการตรวจสอบ</td>
                                        </tr>

                                        <tr>
                                          <td width="16" align="center" valign="top"><img src="../img/arr.png" width="16" height="16" /></td>
                                          <td width="10" valign="top">&nbsp;</td>
                                          <td width="464" align="left" valign="top" id="font-main">ช่องทางการชำระเงิน ผ่านทาง ธนาคาร ตู้ ATM หรือ Internet ตามธนาคารที่ระบุไว้ด้านล่างนี้</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
<?
$s9="SELECT * FROM `bank` ORDER BY id ASC";
$re9=mysqli_query($con_db, $s9)or die("Err select bank บรรทัด89");
while($r9=mysqli_fetch_row($re9)){
?>
                                        <table width="430" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left" id="font-main">ธนาคาร<?=$r9[2];?> ชื่อบัญชี <?=$r9[1];?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" id="font-main">สาขา <?=$r9[4];?> เลขที่บัญชี <?=$r9[3];?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" id="font-main">ประเภทบัญชี <?=$r9[5];?></td>
                                          </tr>
                                          <tr>
                                            <td height="10" align="left"></td>
                                          </tr>
                                        </table>
                                      <? } ?></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td><form action="p-payment.php" method="post" name="checkForm" id="checkForm" onsubmit="return check1()">
                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="10"></td>
                                    </tr>
                                  </table>
                                <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td id="font-main" align="center" style="font-size: 20px; color:#f1b00d;">ฟอร์มแจ้งการชำระเงิน</td>
                                    </tr>
                                    <tr>
                                      <td><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="150" height="40" align="left" id="font-main">ประเภทการเติมเงิน</td>
                                            <td width="350" height="40" align="left"><select name="point_type" id="point_type" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 16px;" >
                                                <option value="" selected="selected" >โปรดเลือก</option>
                                                <?
												$s="SELECT * FROM `setting_point` ORDER BY id ASC";
												$re=mysqli_query($con_db, $s) or die("ERROR $s");
												while($r=mysqli_fetch_row($re)){
												?>
                                                <option value="<?=$r[0];?>" >เติมเงิน <?=$r[1];?> บาท ได้ <?=$r[2];?> <? if($r[3]==1){ echo "วัน"; }else if($r[3]==2){ echo "เดือน"; }else if($r[3]==3){ echo "ปี"; } ?></option>
                                                <? } ?>
                                              </select>                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="150" height="40" align="left"  id="font-main">บัญชีธนาคารที่โอนเข้า</td>
                                            <td width="350" height="40" align="left"><select name="bank_id" id="bank_id" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 16px;">
											<?
											$sbank="SELECT * FROM `bank` ORDER BY id ASC";
											$rebank=mysqli_query($con_db, $sbank) or die("ERROR $sbank");
											while($rbank=mysqli_fetch_row($rebank)){
											?>
                                                <option value="<?=$rbank[0];?>">ธนาคาร<?=$rbank[2];?></option>
                                            <? } ?>
                                            </select>                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="150" height="40" align="left" id="font-main">จำนวนเงินที่โอนเข้า</td>
                                            <td width="350" height="40" align="left" ><input name="money" type="text" id="money" size="10" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 16px;" /></td>
                                          </tr>
                                          <tr>
                                            <td width="150" height="40" align="left" id="font-main">วันที่โอนเงิน</td>
                                            <td width="350" align="left"><?
											$dm=date("Y-m-d");
											$payDate = $dm;
											?>
                                                <input name="dates" type="text" id="dates" value="<? echo DateThai($payDate);?>" style="background:#FFFFFF;  width:340px; height: 30px; font-size: 16px;" /></td>
                                          </tr>
                                          <tr>
                                            <td width="150" height="40" align="left" id="font-main">เวลาโดยประมาณ</td>
                                            <td width="350" align="left"><?
											$time=date("H:i");
											?>
                                                <input name="times" type="text" id="times" value="<?=$time;?>"  style="background:#FFFFFF;  width:340px; height: 30px; font-size: 16px;"/></td>
                                          </tr>
                                          <tr>
                                            <td height="40" colspan="2" align="left" id="font-main">รายละเอียดเพิ่มเติม/ข้อความถึงเรา</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2" align="center"><textarea name="detail" cols="75" rows="5" id="detail"></textarea></td>
                                          </tr>

                                          <tr>
                                            <td height="40" colspan="2" align="center"><input type="submit" name="Submit" value="แจ้งการชำระเงิน" /></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                  </table>
                              </form></td>
                            </tr>
                          </table></td>
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


