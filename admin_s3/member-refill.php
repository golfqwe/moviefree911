<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_GET['id'];
$member_id=$_GET['member_id'];
$point_type=$_GET['point_type'];
$sp="SELECT type, name, email FROM `member` WHERE id='$member_id'";
$rep=mysqli_query($con_db, $sp) or die("ERROR $sp");
$rp=mysqli_fetch_row($rep);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
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
                <td align="left" id="font-main" style="font-weight:bold; color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                <td width="75" align="right" id="font-main"><a href="logout.php" style="font-weight:bold; color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;"><a href="bank-refill.php">จัดการข้อมูลรายการเติมเงินผ่านธนาคาร</a> <img src="images/arrow.gif" width="7" height="11" /> ปรับระดับสมาชิกทั่วไป เป็น สมาชิกวีไอพี</td>
            </tr>
            <tr>
              <td><form action="p-member-refill.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td></td>
                  </tr>
                </table>
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" align="right" id="font-main">ระดับการเติมเงิน</td>
                    <td width="10">&nbsp;</td>
                    <td width="440">
                      <select name="type" id="type">
<?
$s="SELECT * FROM `setting_point` ORDER BY id ASC";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
while($r=mysqli_fetch_row($re)){
?>
                        <option value="<?=$r[0];?>" <? if($r[0]==$point_type){ ?>selected="selected"<? } ?>>เติมเงิน <?=$r[1];?> บาท ได้ <?=$r[2];?> <? if($r[3]==1){ echo "วัน"; }else if($r[3]==2){ echo "เดือน"; }else if($r[3]==3){ echo "ปี"; } ?></option>
<? } ?>
                      </select>
                      <input type="hidden" name="id" id="id" value="<?=$id;?>" />
					  <input type="hidden" name="member_id" id="member_id" value="<?=$member_id;?>" /></td>
                  </tr>
                  <tr>
                    <td align="right" id="font-main">ชื่อที่ใช้เรียก/นามแฝง</td>
                    <td>&nbsp;</td>
                    <td><input name="name" type="text" id="name" value="<?=$rp[1];?>" disabled="disabled" /></td>
                  </tr>
                  <tr>
                    <td align="right" id="font-main">อีเมล์</td>
                    <td>&nbsp;</td>
                    <td><input name="email" type="text" id="email" value="<?=$rp[2];?>" disabled="disabled" /></td>
                  </tr>
                  
                  <tr>
                    <td width="150">&nbsp;</td>
                    <td width="10">&nbsp;</td>
                    <td width="440"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
