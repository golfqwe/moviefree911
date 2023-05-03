<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$s="SELECT * FROM `web_detail` WHERE id='1'";
$re=mysqli_query($con_db, $s) or die("Error $s");
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">จัดการข้อมูลเว็บไซต์</td>
            </tr>
            <tr>
              <td><form id="form1" name="form1" method="post" action="p-data.php">
                <table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100" height="25" align="left" id="font-main">ชื่อเว็บไซต์</td>
                          <td width="10" height="25">&nbsp;</td>
                          <td width="350" height="25" align="left"><input name="name" type="text" id="name" value="<?=$r[1];?>" style="width:250px;" /></td>
                        </tr>
                        <tr>
                          <td width="100" height="12" align="left" id="font-main">URL </td>
                          <td width="10" height="12">&nbsp;</td>
                          <td width="350" height="12" align="left"><input name="url" type="text" id="url" value="<?=$r[3];?>" style="width:250px;" /><font color="red"> ไม่ต้องใส่ http </font></td>
                        </tr>
                        <tr>
                          <td width="100" height="11" align="left" id="font-main">Email</td>
                          <td width="10" height="11">&nbsp;</td>
                          <td width="350" height="11" align="left"><input name="email" type="text" id="email" value="<?=$r[2];?>" style="width:250px;"  /></td>
                        </tr>
                    <!--
                        <tr>
                          <td height="12" align="left" id="font-main">Link True</td>
                          <td height="12">&nbsp;</td>
                          <td height="12" align="left"><input name="trueurl" type="text" id="trueurl" value="<?=$r[7];?>" style="width:350px;" /></td>
                        </tr>
                    -->
                        <tr>
                          <td align="left" valign="top" id="font-main">Title</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="title" id="title" style="width:350px; height:100px;"><?=$r[4];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Description</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="description" id="description" style="width:350px; height:100px;"><?=$r[5];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Keyword</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="keyword" id="keyword" style="width:350px; height:100px;"><?=$r[6];?></textarea></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="30" align="right"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
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
