<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$s="select * from statsa where id=1";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด8");
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
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;" >การจัดการ CODE HTML  <font style="color: red">&lt;head&gt;.......&lt;/head&gt; </font><br>
              <font style="color: green">  &lt;!-- Global site tag (gtag.js) - Google Analytics --&gt; </font>

              </td>
            </tr>
            <tr>
              <td><form id="form1" name="form1" method="post" action="p-statsa.php">
                <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left"><font size="3">
                      <input name="online" type="radio" value="1" <? if($r[2]==1){ echo "checked";}?> />
                      แสดง
                      <input name="online" type="radio" value="0" <? if($r[2]==0){ echo "checked";}?> />
                      ไม่แสดง </font></td>
                  </tr>
                  <tr>
                    <td align="center">
                    <textarea name="detail" rows="10" id="detail" style="width:700px"><?=stripslashes($r[1]);?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;" >การจัดการ CODE HTML  <font style="color: red">&lt;body&gt;.......&lt;/body&gt; </font><br>
                    <font style="color: green">  &lt;!-- Global site tag (gtag.js) - Google Analytics --&gt; </font>

                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                    <textarea name="code_body" rows="10" id="code_body" style="width:700px"><?=stripslashes($r[3]);?></textarea>
                    </td>
                  </tr>


                  <tr>
                    <td align="center"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
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
