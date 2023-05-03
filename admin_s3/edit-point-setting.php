<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_GET['id'];
$s="SELECT * FROM `setting_point` WHERE id='$id'";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$r=mysqli_fetch_row($re);
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;"><a href="point-setting.php">จัดการข้อมูลตั้งค่าการเติมเงิน</a> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลการเติมเงิน</td>
            </tr>
            <tr>
              <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><form action="p-edit-point-setting.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                      <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right" id="font-main">ราคา (บาท)</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><input name="price" type="text" id="price" value="<?=$r[1];?>" style="width:150px;" />
                            <input type="hidden" name="id" id="id" value="<?=$id;?>" /></td>
                        </tr>
                        <tr>
                          <td align="right" id="font-main">จำนวนวัน</td>
                          <td>&nbsp;</td>
                          <td width="440"><input name="number" type="text" id="number" value="<?=$r[2];?>" style="width:150px;" /></td>
                        </tr>
                        <tr>
                          <td align="right" id="font-main">หน่วย</td>
                          <td>&nbsp;</td>
                          <td width="440"><select name="unit" id="unit" style="width:150px;">
                            <option value="1" <? if($r[3]==1){ ?>selected="selected"<? } ?>>วัน</option>
                            <option value="2" <? if($r[3]==2){ ?>selected="selected"<? } ?>>เดือน</option>
                            <option value="3" <? if($r[3]==3){ ?>selected="selected"<? } ?>>ปี</option>
                          </select>
                          </td>
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
if(document.checkForm.price.value=="") {
alert("กรุณาระบุราคาด้วยนะครับ") ;
document.checkForm.price.focus() ;
return false ;
}else if(isNaN(document.checkForm.price.value)) {
alert("กรุณาระบุราคาด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.price.focus() ;
return false ;
}else if(document.checkForm.number.value=="") {
alert("กรุณาระบุจำนวนแต้มด้วยนะครับ") ;
document.checkForm.number.focus() ;
return false ;
}else if(isNaN(document.checkForm.number.value)) {
alert("กรุณาระบุจำนวนแต้มด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.number.focus() ;
return false ;
}
else 
return true ;
}
                      </script>
                  </form></td>
                </tr>
                <tr>
                  <td><table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                      <table width="350" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                        <tr>
                          <td width="75" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">ลำดับที่</td>
                          <td width="100" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">ราคา(บาท)</td>
                          <td width="100" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">จำนวนวัน</td>
                          <td width="75" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">การกระทำ</td>
                        </tr>
                        <?
$s="SELECT * FROM `setting_point` ORDER BY id ASC";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$x=1;
while($r=mysqli_fetch_row($re)){
?>
                        <tr>
                          <td width="75" height="25" align="center" valign="middle" id="font-main"><?=$x;?></td>
                          <td width="100" height="25" align="center" valign="middle" id="font-main"><?=$r[1];?></td>
                          <td width="100" height="25" align="center" valign="middle" id="font-main"><?=$r[2];?>
                              <? if($r[3]==1){ echo "วัน"; }else if($r[3]==2){ echo "เดือน"; }else if($r[3]==3){ echo "ปี"; } ?></td>
                          <td width="75" align="center" valign="middle"><a href="edit-point-setting.php?id=<?=$r[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a></td>
                        </tr>
                        <? $x++;} ?>
                      </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
