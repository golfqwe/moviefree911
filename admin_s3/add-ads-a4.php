<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$type=$_GET['type'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/bootstrap.min.css">
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="220" align="center" valign="top" bgcolor="#222222"><? include "menu.php"; ?></td>
    <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" style="border-bottom:2px solid #FF0000;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="500"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" style=" font-size:16px; font-weight:bold; color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                <td width="75" align="right"><a href="logout.php" style=" font-size:16px; font-weight:bold; color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;"><a href="ads-a4.php">จัดการข้อมูลพื้นที่โฆษณาตำแหน่ง A4 ขนาด 250 px</a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูล พื้นที่โฆษณาตำแหน่ง A4</td>
            </tr>
            <tr>
              <td align="center"><form id="form1" name="form1" method="post" action="p-add-ads-a4.php" enctype="multipart/form-data">
                <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">ประเภทโฆษณา</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500"><select name="type" id="type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                        <option value="">- เลือกประเภทโฆษณา -</option>
                        <option value="add-ads-a4.php?type=1" <? if($type==1){ echo "selected"; }?>>HTML CODE</option>
                        <option value="add-ads-a4.php?type=2" <? if($type==2){ echo "selected"; }?>>ผู้ลงโฆษณาทั่วไป</option>
                      </select>
                    </td>
                  </tr>
                </table>
                <? 
if(isset($_GET['type'])){
if($type==1){ 
?>
                <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="660" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="3">โค๊ด Google Adsense </font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500"><input type="hidden" name="type_id" id="type_id" value="1" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><textarea name="adsense" rows="10" id="adsense" style="width: 630px;"></textarea></td>
                  </tr>
                  <tr>
                    <td align="center"><input type="submit" name="Submit2" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
                <? }else if($type==2){ ?>
                <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">เลือกประเภท</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="type_ads" type="radio" value="1" checked="checked"/>
                        <font color="#000000" size="3">รูปภาพ
                          <input name="type_ads" type="radio" value="2"/>
                          แฟลช </font>
                        <input type="hidden" name="type_id" id="type_id" value="2" /></td>
                  </tr>
                  <tr>
                    <td align="right"><font color="#000000" size="3">ไฟล์โฆษณา</font></td>
                    <td>&nbsp;</td>
                    <td align="left"><input name="file1" type="file" id= "file1" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">คำอธิบาย</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="keyword" type="text" id="keyword" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">ลิงค์</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="url" type="text" id="url" size="50" />
                        <br />
                        <font size="3" color="#FF0000">ใส่ http:// ด้วย เช่น http://www.domain.com </font></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">วันที่</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="start_date" type="text" id="start_date" />
                        <font color="#000000" size="3">ถึง
                          <input name="finish_date" type="text" id="finish_date" />
                      </font></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">ชื่อลูกค้า</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="name" type="text" id="name" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">เบอร์โทรศัพท์</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="tel" type="text" id="tel" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right"><font color="#000000" size="3">อีเมล์</font></td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="email" type="text" id="email" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right">&nbsp;</td>
                    <td width="10">&nbsp;</td>
                    <td width="500" align="left"><input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
                <? }}else{ echo "<br>เลือกประเภทโฆษณาก่อนนะครับ";} ?>
                            </form></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
