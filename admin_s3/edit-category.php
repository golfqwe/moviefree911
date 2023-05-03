<?php
//session_start();
include "../inc/config.inc.php";
include "../function/function.php";
if(isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_GET['id'];
$s="SELECT * FROM `category` WHERE id='$id'";
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
.style4 {font-size: small; font-weight: bold; }
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

              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;"><a href="category.php">จัดการข้อมูลหมวดหมู่หนัง</a> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลหมวดหมู่หนัง</td>

            </tr>

            <tr>

              <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>

                  <td height="30"><font size="3" color="#333333">:: แก้ไขข้อมูลหมวดหมู่หลัก :: </font></td>

                </tr>

                <tr>

                  <td><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>

                        <td><form method="post" action="p-edit-category.php" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">

                            <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">

                              <tr>

                                <td width="100" align="right"><font size="3" color="#333333">ชื่อหมวดหมู่</font></td>

                                <td width="10">&nbsp;</td>

                                <td width="350" align="left"><input name="name" type="text" id="name" value="<?=$r[1];?>" />

                                  <input type="hidden" name="id" id="id" value="<?=$id;?>" /></td>

                              </tr>

                              <tr>

                                <td width="100" align="right"><font size="3" color="#333333">สมาชิก</font></td>

                                <td width="10">&nbsp;</td>

                                <td width="350" align="left"><font size="3" color="#333333">

                                  <input name="member" type="radio" value="1" <? if($r[2]==1){ ?>checked="checked"<? } ?> />

                                  เข้าดูได้

                                  <input name="member" type="radio" value="0" <? if($r[2]==0){ ?>checked="checked"<? } ?> />

                                  เข้าดูไม่ได้ </font></td>

                              </tr>

                              <tr>

                                <td width="100" align="right"><font size="3" color="#333333">ผู้ใช้ทั่วไป</font></td>

                                <td width="10">&nbsp;</td>

                                <td width="350" align="left"><font size="3" color="#333333">

                                  <input name="user" type="radio" value="1" <? if($r[3]==1){ ?>checked="checked"<? } ?> />

                                  เข้าดูได้

                                  <input name="user" type="radio" value="0" <? if($r[3]==0){ ?>checked="checked"<? } ?> />

                                  เข้าดูไม่ได้ </font></td>

                              </tr>

                              <tr>

                                <td width="100" align="right" valign="top"><font color="#000000" size="3">Title</font></td>

                                <td>&nbsp;</td>

                                <td width="350" align="left"><textarea name="title" cols="50" rows="3" id="title"><?=$r[4];?></textarea></td>

                              </tr>

                              <tr>

                                <td width="100" align="right" valign="top"><font color="#000000" size="3">Description</font></td>

                                <td>&nbsp;</td>

                                <td width="350" align="left"><textarea name="description" cols="50" rows="3" id="textarea2"><?=$r[5];?></textarea></td>

                              </tr>

                              <tr>

                                <td width="100" align="right" valign="top"><font color="#000000" size="3">Keyword</font></td>

                                <td>&nbsp;</td>

                                <td width="350" align="left"><textarea name="keyword" cols="50" rows="3" id="textarea3"><?=$r[6];?></textarea></td>

                              </tr>

                              <tr>

                                <td width="100" align="right">&nbsp;</td>

                                <td width="10">&nbsp;</td>

                                <td width="350" align="left"><input type="submit" name="Submit" value="บักทึกข้อมูล" />

                                </td>

                              </tr>

                            </table>

<script language="JavaScript" type="text/javascript">



function check1() {

if(document.checkForm.brand.value=="") {

alert("กรุณากรอกชื่อหมวดหมู่หนังด้วยนะครับ") ;

document.checkForm.brand.focus() ;

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

                <tr>

                  <td height="30"><font size="3" color="#333333">:: รายการข้อมูลหมวดหมู่หลัก :: </font></td>

                </tr>

                <tr>

                  <td><table width="400" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">

                    <tr>

                      <td width="50" height="25" align="center" valign="middle" bgcolor="#EFEFED"><font size="3" color="#333333">รหัสไอดี</font></td>

                      <td width="250" height="25" align="center" valign="middle" bgcolor="#EFEFED"><font size="3" color="#333333">ชื่อหมวดหมู่หลัก</font></td>

                      <td width="100" height="25" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">การกระทำ</span></td>

                    </tr>

                    <?	

		$strSQL = "SELECT id, name FROM category ";

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



		$strSQL .=" ORDER BY id ASC LIMIT $Page_Start , $Per_Page";

		$objQuery  = mysqli_query($con_db, $strSQL);

		while($objResult = mysqli_fetch_row($objQuery)){

		$cateurl=rewrite($objResult[1]);

?>

                    <tr>

                      <td width="50" align="center" valign="middle"><font size="3">

                        <?=$objResult[0];?>

                      </font></td>

                      <td width="250" align="left" valign="middle">&nbsp;&nbsp;<font size="3"><a href="../cate-<?=$objResult[0];?>/<?=$cateurl;?>" target="_blank";>

                        <?=$objResult[1];?>

                      </a></font></td>

                      <td width="100" align="center" valign="middle"><font size="3"><a href="edit-category.php?id=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-category.php?id=<?=$objResult[0];?>" onclick="javascript:if(!confirm('หากท่านลบข้อมูลหมวดหมู่หลัก ข้อมูลหมวดหมู่ย่อยจะถูกลบไปด้วย ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>

                    </tr>

                    <? } ?>

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

