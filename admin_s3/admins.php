<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
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
                  <td align="left" id="font-main" style="font-weight:bold; color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
                </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                  <td width="75" align="right" id="font-main"><a href="logout.php" style="font-weight:bold; color:#333333;">ออกจากระบบ</a></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">จัดการข้อมูลแอดมิน</td>
            </tr>
            <tr>
              <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><form action="p-admin.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                      <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right" id="font-main">ชื่อที่ใช้เรียก/นามแฝง</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><input name="name" type="text" id="name" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right" id="font-main">อีเมล์</td>
                          <td width="10">&nbsp;</td>
                          <td width="440"><input name="email" type="text" id="email" /></td>
                        </tr>
                        <tr>
                          <td align="right" id="font-main">รหัสผ่าน</td>
                          <td>&nbsp;</td>
                          <td width="440"><input name="pass" type="password" id="pass" /></td>
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
                <tr>
                  <td><table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                      </tr>
                    </table><center style="color: red;">กรุณาตรวจสอบให้แน่ใจก่อนลบ User Admin เพราะจำทำให้หนังทั้งหมดถูกลบไปด้วย  </center>
                      <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                        <tr>
                          <td width="75" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">ลำดับที่</td>
                          <td width="200" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">ชื่อที่ใช้เรียก/นามแฝง</td>
                          <td width="225" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">อีเมล์</td>
                          <td width="150" height="30" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">รหัสผ่าน</td>
                          <td width="100" align="center" valign="middle" bgcolor="#EFEFED" id="font-main" style="font-weight:bold;">การกระทำ</td>
                        </tr>
<?
$s="SELECT id, name, email, pass FROM `member` WHERE type=1";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$x=1;
while($r=mysqli_fetch_row($re)){
?>
                        <tr>
                          <td width="75" height="25" align="center" valign="middle" id="font-main"><?=$x;?></td>
                          <td width="200" height="25" align="center" valign="middle" id="font-main"><?=$r[1];?></td>
                          <td width="225" height="25" align="center" valign="middle" id="font-main"><?=$r[2];?></td>
                          <td width="150" height="25" align="center" valign="middle" id="font-main"><?=$r[3];?></td>
                          <td width="100" align="center" valign="middle"><a href="edit-admin.php?id=<?=$r[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> 
                         
                            <a href="del-admin.php?id=<?=$r[0];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="images/del.gif" width="40" height="15" border="0" />
                            </a>
                        
                          </td>
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
