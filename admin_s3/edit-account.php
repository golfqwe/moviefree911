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
</style>

<style type="text/css"> 
<!--
	.paginate {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	}
	a.paginate {
	border: 1px solid #cccccc;
	background-color: #FFFFFF;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000000;
	}
	h2 {
		font-size: 12pt;
		color: #003366;
		}
		
		 h2 {
		line-height: 1.2em;
		letter-spacing:-1px;
		margin: 0;
		padding: 0;
		text-align: left;
		}
	a.paginate:hover {
	border: 1px solid #cccccc;
	background-color: #cccccc;
	color: #000000;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #cccccc;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#cccccc;
	color: #000000;
	text-decoration: none;
	}
	span.inactive {
	border: 1px solid #999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
	}
-->
</style>
</head>

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
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;"><a href="bank.php">จัดการข้อมูลบัญชีธนาคาร</a>  <img src="images/arrow.gif" width="7" height="11" /> จัดการแก้ไขข้อมูลบัญชีธนาคาร</td>
            </tr>
            <tr>
              <td><?
$id=$_GET['id'];
$s="select * from bank where id='$id'";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด195");
$r=mysqli_fetch_row($re);
?>
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><font size="3" color="#333333">:: แก้ไขรายการบัญชีธนาคาร :: </font></td>
                  </tr>
                  <tr>
                    <td><form action="p-edit-account.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                        <table width="680" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr bgcolor="#FFFFFF">
                            <td><div align="right"><font size="3">ชื่อบัญชี :</font></div></td>
                            <td align="left"><font size="3">
                              <input name="accname" type="text" id="accname" value="<?=$r[1];?>" size="40" />
                              <input type="hidden" id="id" name="id" value="<?=$id;?>" />
                            </font></td>
                          </tr>
                          <tr bgcolor="#FFFFFF">
                            <td width="151"><div align="right"><font size="3">เลขที่บัญชี 
                              :</font></div></td>
                            <td width="558" align="left"><font size="3">
                              <input name="accno" type="text" id="accno" value="<?=$r[3];?>" size="40" />
                            </font></td>
                          </tr>
                          <tr bgcolor="#FFFFFF">
                            <td><div align="right"><font size="3">ธนาคาร 
                              :</font></div></td>
                            <td align="left"><font size="3">
                              <input name="bankname" type="text" id="bankname" value="<?=$r[2];?>" size="40" />
                            </font></td>
                          </tr>
                          <tr bgcolor="#FFFFFF">
                            <td><div align="right"><font size="3">สาขา :</font></div></td>
                            <td align="left"><font size="3">
                              <input name="branch" type="text" id="branch" value="<?=$r[4];?>" size="40" />
                            </font><font size="3">&nbsp; </font></td>
                          </tr>
                          <tr bgcolor="#FFFFFF">
                            <td valign="top"><div align="right"><font size="3">ประเภทบัญชี 
                              :</font></div></td>
                            <td align="left"><font size="3">
                              <input name="acctype" type="text" id="acctype" value="<?=$r[5];?>" size="40" />
                            </font></td>
                          </tr>
                          <tr bgcolor="#FFFFFF">
                            <td><div align="right"><font size="3"></font></div></td>
                            <td align="left"><font size="3">
                              <input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" />
                            </font></td>
                          </tr>
                        </table>
                      <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.accname.value=="") {
alert("กรุณาระบุชื่อบัญชีด้วยนะครับ") ;
document.checkForm.accname.focus() ;
return false ;
}
else if(document.checkForm.accno.value=="") {
alert("กรุณาระบุเลขที่บัญชีด้วยนะครับ") ;
document.checkForm.accno.focus() ;
return false ;
}
else if(document.checkForm.bankname.value=="") {
alert("กรุณาระบุชื่อธนาคารด้วยนะครับ") ;
document.checkForm.bankname.focus() ;
return false ;
}
else if(document.checkForm.branch.value=="") {
alert("กรุณาระบุสาขาด้วยนะครับ") ;
document.checkForm.branch.focus() ;
return false ;
}
else if(document.checkForm.acctype.value=="") {
alert("กรุณาระบุประเภทบัญชีด้วยนะครับ") ;
document.checkForm.acctype.focus() ;
return false ;
} 
return true ;
}
                </script>
                    </form></td>
                  </tr>
                </table>
                <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="30" align="left"><font size="3" color="#333333">:: รายการบัญชีธนาคารทั้งหมด :: </font></td>
                  </tr>
                  <tr>
                    <td><table width="725" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                        <tr>
                          <td width="125" height="30" align="center" bgcolor="#CCCCCC"><font size="3" color="#333333">ธนาคาร</font></td>
                          <td width="125" height="30" align="center" bgcolor="#CCCCCC"><font color="#333333" size="3">สาขา</font></td>
                          <td width="200" height="30" align="center" bgcolor="#CCCCCC"><font size="3" color="#333333">ชื่อบัญชี</font></td>
                          <td width="195" height="30" align="center" bgcolor="#CCCCCC"><font size="3" color="#333333">เลขที่บัญชี</font></td>
                          <td width="125" height="30" align="center" bgcolor="#CCCCCC"><font size="3" color="#333333">ประเภทบัญชี</font></td>
                          <td width="80" align="center" bgcolor="#CCCCCC"><font size="3" color="#333333">การกระทำ</font></td>
                        </tr>
                        <?	
		$strSQL = "SELECT * FROM bank";
		$objQuery = mysqli_query($con_db, $strSQL);
		$Num_Rows = mysqli_num_rows($objQuery);

		$Per_Page = 100;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" order  by id desc LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysqli_query($con_db, $strSQL);
		$x=1;
		while($objResult = mysqli_fetch_row($objQuery)){
		?>
                        <tr>
                          <td width="125" height="25" align="center" bgcolor="#FFFFFF"><font size="3">
                            <?=$objResult[2];?>
                          </font></td>
                          <td width="125" height="25" align="center" bgcolor="#FFFFFF"><font size="3">
                            <?=$objResult[4];?>
                          </font></td>
                          <td width="125" height="25" align="center" bgcolor="#FFFFFF"><font size="3">
                            <?=$objResult[1];?>
                          </font></td>
                          <td width="125" height="25" align="center" bgcolor="#FFFFFF"><font size="3">
                            <?=$objResult[3];?>
                          </font></td>
                          <td width="125" height="25" align="center" bgcolor="#FFFFFF"><font size="3">
                            <?=$objResult[5];?>
                          </font></td>
                          <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font size="3"><a href="edit-account.php?id=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-account.php?id=<?=$objResult[0];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                        </tr>
                        <? $x++; } ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            
                          </tr>
                          <tr>
                            <td height="30" align="center" valign="middle"></td>
                          </tr>
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
