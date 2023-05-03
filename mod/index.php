<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['mod_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../mod-login.php'>" ; 
exit() ;
}
$sp="SELECT name, email, pass FROM `member` WHERE type=2 AND id='$_SESSION[m_id]'";
$rep=mysqli_query($con_db, $sp) or die("ERROR $sp");
$rp=mysqli_fetch_row($rep);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mod Panel : ระบบจัดการข้อมูลผู้ช่วยแอดมิน</title>
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
                <td align="left" id="font-main" style="font-weight:bold; color:#333333;">Mod Panel : ระบบจัดการข้อมูลผู้ช่วยแอดมิน</td>
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
              <td height="25" align="left" id="font-main" style="font-size: 16px; color:#333333;">จัดการข้อมูลส่วนตัว</td>
            </tr>
            <tr>
              <td><form action="p-edit-personal.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td></td>
                  </tr>
                </table>
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" align="right" id="font-main" style="font-size: 15px;">ชื่อที่ใช้เรียก/นามแฝง</td>
                    <td width="10">&nbsp;</td>
                    <td width="440"><input name="name" type="text" id="name" value="<?=$rp[0];?>" /></td>
                  </tr>
                  <tr>
                    <td width="150" align="right" id="font-main"style="font-size: 15px;">อีเมล์</td>
                    <td width="10">&nbsp;</td>
                    <td width="440"><input name="email" type="text" id="email" value="<?=$rp[1];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right" id="font-main"style="font-size: 15px;">รหัสผ่าน</td>
                    <td>&nbsp;</td>
                    <td width="440" id="font-main" style="font-size: 15px; color:#FF0000;"><input name="pass" type="password" id="pass" value="<?=$rp[2];?>" />
                        <?=$rp[2];?></td>
                  </tr>
                  <tr>
                    <td width="150">&nbsp;</td>
                    <td width="10">&nbsp;</td>
                    <td width="440"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.name.value=="") {
alert("กรุณากรอกชื่อที่ใช้เรียก/นามแฝงด้วยนะครับ") ;
document.checkForm.name.focus() ;
return false ;
}else if(document.checkForm.email.value=="") {
alert("กรุณากรอกอีเมล์ด้วยนะครับ") ;
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
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
