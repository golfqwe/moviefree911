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
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;">จัดการข้อมูลพื้นที่โฆษณาตำแหน่ง A6 :: [ <a href="add-ads-a6.php">เพิ่มตำแหน่งโฆษณา ADS A6</a> ] :: </td>
            </tr>
            <tr>
              <td align="center"><?
			$strSQL1="SELECT * FROM ads_a6 ORDER BY id ASC";
			$objQuery1 = mysqli_query($con_db, $strSQL1) or die("ERROR $strSQL1");
			while($objResult1 = mysqli_fetch_row($objQuery1)){
			?>
                  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="460" align="center" valign="top">
                          <img src="../ads-img/<?=$objResult1[6];?>" width="450" border="0" />
                      </td>
                    </tr>
                  </table>

                          <table width="490" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">คำอธิบาย</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left">
									<label><input type="radio" <?php  if($objResult1[9]==1){ echo "checked";} ?> disabled>แสดง</label>
									<label><input type="radio" <?php if($objResult1[9]==0){ echo 'checked';}?> disabled>ไม่แสดง</label>

								</td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">คำอธิบาย</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="keyword" type="text" id="keyword" value="<?=$objResult1[5];?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">ลิงค์</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="url" type="text" id="url" value="<?=$objResult1[4];?>" size="50" disabled="disabled" />
                                  <br />
                                  <font size="3" color="#FF0000">ใส่ http:// ด้วย เช่น http://www.domain.com </font></td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">วันที่</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="start_date" type="text" id="start_date" value="<?=$objResult1[7];?>" disabled="disabled" />
                                  <font color="#000000" size="3">ถึง
                                    <input name="finish_date" type="text" id="finish_date" value="<?=$objResult1[8];?>" disabled="disabled" />
                                </font></td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">ชื่อลูกค้า</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="name" type="text" id="name" value="<?=$objResult1[1];?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">เบอร์โทรศัพท์</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="tel" type="text" id="tel" value="<?=$objResult1[2];?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td width="150" align="right"><font color="#000000" size="3">อีเมล์</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><input name="email" type="text" id="email" value="<?=$objResult1[3];?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td width="150" align="right">&nbsp;</td>
                              <td width="10">&nbsp;</td>
                              <td width="330" align="left"><font size="3"><a href="edit-ads-a6.php?id=<?=$objResult1[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-ads6.php?id=<?=$objResult1[0];?>&amp;op=<?=$objResult1[6];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                            </tr>
                          </table>

                <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                <? } ?></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
