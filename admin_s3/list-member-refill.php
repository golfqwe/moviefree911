<?
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
$id=$_GET['id'];
$smem="SELECT name, email FROM `member` WHERE id='$id'  AND actived=1 AND type>2";
$remem=mysqli_query($con_db, $smem) or die("ERROR $smem");
$rmem=mysqli_fetch_row($remem);
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">ประวัติการเติมแต้ม <img src="images/arrow.gif" width="7" height="11" /> <?=$rmem[0];?> [ Email : <?=$rmem[1];?> ]</td>
            </tr>
            <tr>
              <td><table width="728" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                  <td width="200" height="25" align="center" id="font-main" style="background:#E8E8E8; font-weight:bold;">วัน เวลา ที่เติม </td>
                  <td width="200" height="25" align="center" id="font-main" style="background:#E8E8E8; font-weight:bold;">ประเภทการเติม</td>
                  <td width="200" height="25" align="center" id="font-main" style="background:#E8E8E8; font-weight:bold;">ชนิดการเติม</td>
                  <td width="128" height="25" align="center" id="font-main" style="background:#E8E8E8; font-weight:bold;">สถานะ</td>
                </tr>
<?
$strSQL = "SELECT * FROM `payment` WHERE member_id='$id'";
$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQL");
$Num_Rows = mysqli_num_rows($objQuery);		
$Per_Page = 20;   // Per Page

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

$strSQL.=" ORDER BY id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($con_db, $strSQL) or die("ERROR");
while($objResult = mysqli_fetch_row($objQuery)){
?>
                <tr>
                  <td width="200" align="center" valign="top" bgcolor="#F4F4F4" style=" font-size:16px;">
				  <? if($objResult[1]==2){ echo DateThai($objResult[6]); }else{ echo $objResult[6]; } ?>  เวลา <?=$objResult[7];?> น.</td>
                  <td width="200" align="center" valign="top" bgcolor="#F4F4F4" style=" font-size:16px;"><?
							if($objResult[1]==1){
							$sbank="SELECT bankname FROM `bank` WHERE id='$objResult[4]'";
							$rebank=mysqli_query($con_db, $sbank) or die("ERROR $sbank");
							$rbank=mysqli_fetch_row($rebank);
							?>
                      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left">ผ่านธนาคาร
                            <?=$rbank[0];?></td>
                        </tr>
                        <tr>
                          <td align="left">จำนวนเงิน
                            <?=$objResult[5];?>
                            บาท </td>
                        </tr>
                      </table>
                    <? }else if($objResult[1]==2){ ?>
                      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left">ผ่านบัตรทรูมันนี่</td>
                        </tr>
                      </table>
                    <? }else if($objResult[1]==3){ ?>
                      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left">แอดมิน
                            <?=$titler[1];?></td>
                        </tr>
                      </table>
                    <? } ?></td>
                  <td width="200" align="center" valign="top" bgcolor="#F4F4F4" style=" font-size:16px;"><?
	$spoint="SELECT * FROM `setting_point` WHERE id='$objResult[2]'";
	$repoint=mysqli_query($con_db, $spoint) or die("ERROR $spoint");
	$rpoint=mysqli_fetch_row($repoint);
	?>
                    เติมเงิน
                    <?=$rpoint[1];?>
                    บาท ได้
                    <?=$rpoint[2];?>
                    <? if($rpoint[3]==1){ echo "วัน"; }else if($rpoint[3]==2){ echo "เดือน"; }else if($rpoint[3]==3){ echo "ปี"; } ?>                  </td>
                  <td width="128" align="center" valign="top" bgcolor="#F4F4F4" style=" font-size:16px;"><? if($objResult[9]==1){ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#339900;">สำเร็จ</td>
                        </tr>
                        <tr>
                          <td align="center" style="color:#FF0000;"><?=Datetime($objResult[10]);?></td>
                        </tr>
                      </table>
                    <? }else{ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#FF0000;">ตรวจสอบ</td>
                        </tr>
                      </table>
                    <? } ?>
                  </td>
                </tr>
                <? } ?>
              </table>
                <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="30" align="center" valign="middle"></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
