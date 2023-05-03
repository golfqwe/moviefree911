<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$s="select * from color where id=1";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด12");
$r=mysqli_fetch_row($re);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
<script type="text/javascript" src="jscolor.js"></script>
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
                <td align="left" style=" font-size:17px;  color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                <td width="175" align="right"><a href="logout.php" style="font-size:17px;  color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" style="font-size:17px;  color:#333333;">จัดการข้อมูลพื้นหลังเว็บไซต์</td><br>
            </tr>
            <tr>
              <td><form action="p-color.php?id=1" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="580" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="250" align="left" valign="top"><font size="4" color="#333333">สีพื้นหลัง  
                          <input name="color" class="color" id="color" value="<?=$r[1];?>" maxlength="6" />ค่าเริ่มต้น FF1008
                        </font></td>
                      </tr>
              <td height="10"></td>
                      <tr>
                        <td width="250" align="left" valign="top"><font size="4" color="#333333">สีพื้น Footer
                          <input name="color_1" class="color" id="color_1" value="<?=$r[2];?>" maxlength="6" />ค่าเริ่มต้น 333333
                        </font></td>
                      </tr>
              <td height="10"></td>
                      <tr>
                        <td width="250" align="left" valign="top"><font size="4" color="#333333">สี Scrollbar
                          <input name="color_2" class="color" id="color_2" value="<?=$r[3];?>" maxlength="6" />ค่าเริ่มต้น 34BA9F
                        </font></td>
                      </tr>
              <!-- <td height="10"></td>
                      <tr>
                        <td width="250" align="left" valign="top"><font size="4" color="#333333">สีเมาส์ Over
                        <input name="color_3" class="color" id="color_3" value="<?=$r[4];?>" maxlength="6" />ค่าเริ่มต้น FF4242
                        </font></td>
                      </tr> 
                    -->
              <td height="20"></td>
                      <tr>
                        <td><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
  
                      </tr>
                    </table>
                    </td>
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
