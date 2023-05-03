<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$s="select * from bg where id=1";
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
                <td align="left" style=" font-size:16px;  color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                
                <td width="175" align="right"align="center" ><img src="img/Power-Shutdown.png" width="16" height="16"><a href="logout.php" style=" font-size:16px;  color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" style=" font-size:16px;  color:#333333;">จัดการข้อมูลพื้นหลังเว็บไซต์</td>
            </tr>
            <tr>
              <td><form action="p-bg.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="580" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="250" align="left" valign="top"><font size="3" color="#333333">สีพื้นหลัง
                          <input name="color" class="color" id="color" value="<?=$r[1];?>" maxlength="6" />
                        </font></td>
                      </tr>
                      <td height="10"></td>
                      <tr>
                        <td width="330" align="left" valign="top"><font size="3" color="#333333">ภาพพื้นหลัง</font>
                          <input name="file1" type="file" id= "file1" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" />
                          <br>
                          <? if($r[2]!=""){ ?>
                          <img src="../bg-img/<?=$r[2];?>"width="330" >
                          <? } ?>
                          <br>
                          <font size="3" color="#333333">เลื่อนตาม Scrollbar
                            <input name="fix" type="radio" value="2" <? if($r[4]==2){ echo "checked";} ?> />
                            เลื่อน
                            <input name="fix" type="radio" value="1" <? if($r[4]==1){ echo "checked";} ?> />
                            ไม่เลื่อน</font> <br />
                          <font size="3" color="#333333">repeat
                            <select name="repeat" id="repeat">
                              <option value="no-repeat" <? if($r[3]=="no-repeat"){ echo "selected";} ?>>no-repeat</option>
                              <option value="repeat" <? if($r[3]=="repeat"){ echo "selected";} ?>>repeat</option>
                              <option value="repeat-x" <? if($r[3]=="repeat-x"){ echo "selected";} ?>>repeat-x</option>
                              <option value="repeat-y" <? if($r[3]=="repeat-y"){ echo "selected";} ?>>repeat-y</option>
                            </select>
                            </font>
                          <input type="hidden" id="op" name="op" value="<?=$r[2];?>" />
                          <br />
                          <? if($r[2]!=""){ ?>
                          <font size="3" color="#333333"><a href="../bg-img/<?=$r[2];?>" target="_blank">คลิกที่นี่</a> เพื่อดูภาพพื้นหลัง หรือ <a href="del-bg.php?img=<?=$r[2];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบภาพพื้นหลัง</a></font>
                          <? } ?></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="580" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="250" align="left">&nbsp;</td>
                        <td width="330" align="left"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                      </tr>
                    </table></td>
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
