<?
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/function.php";
if(!isset($_SESSION['mod_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../mod-login.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mod Panel : ระบบจัดการข้อมูลผู้ช่วยแอดมิน</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
			var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}
</script>
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
              <td height="25" align="left" id="font-main" style="font-size: 16px; color:#333333;">รายการหนังทั้งหมด [ <a href="add-movie.php">เพิ่มหนังใหม่</a> ] </td>
            </tr>
            <tr>
              <td align="center"><form action="del-movie.php" method="post" name="frmMain" id="frmMain" onsubmit="return onDelete();">
                <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                          <td width="20" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">#</td>
                          <td width="300" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">ชื่อเรื่อง</td>
                          <td width="200" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">หมวดหมู่</td>
                          <td width="100" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">วันที่โพสต์</td>
                          <td width="60" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">เข้าชม</td>
                          <td width="50" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">แก้ไข</td>
                          <td width="20" height="25" align="center" bgcolor="#E9E9E6"><input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onclick="ClickCheckAll(this);" /></td>
                        </tr>



<?php


$q="SELECT id, cate_id, title, post_date, view, sticky, movie FROM `post` WHERE m_id='$_SESSION[m_id]' ";
$q.=" ORDER BY id DESC ";
$qr=mysqli_query($con_db, $q);
$total=mysqli_num_rows($qr);
$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
    $_GET['s_page']=0;   
}else{   
    $chk_page=$_GET['s_page'];     
    $_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysqli_query($con_db, $q);
if(mysqli_num_rows($qr)>=1){   
    $plus_p=($_GET['s_page']*$e_page)+$total;   
}else{   
    $plus_p=($_GET['s_page']*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($_GET['s_page']*$e_page)+1;



    
    $i = 0;
    while($objResult = mysqli_fetch_row($qr)){
    $posturl=rewrite($objResult[2]);
    $i++;
    
    $scate="SELECT name FROM `category` WHERE id='$objResult[1]'";
    $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
    $rcate=mysqli_fetch_row($recate);
    $urlcate=rewrite($rcate[0]);
?>
                        <tr>
                          <td width="20" height="25" align="center" bgcolor="#FFFFFF" style="; font-size:15px;"><?=$objResult[0];?></td>
                          <td width="300" height="25" align="left" bgcolor="#FFFFFF" style="; font-size:15px;">&nbsp;&nbsp;<? if($objResult[5]==1){ ?><span style="font-weight:bold; color:#FF0000;">[ หนังแนะนำ ]</span> <? } ?><a href="../post-<?=$objResult[0];?>/<?=$posturl;?>.html" target="_blank"><?=$objResult[2];?></a><div class="movie-<?=$objResult[11];?>"><?=$objResult[6];?></div></td>
                          <td width="200" height="25" align="center" bgcolor="#FFFFFF" style="; font-size:15px;"><a href="../cate-<?=$objResult[1];?>/<?=$urlcate;?>" target="_blank"><?=$rcate[0];?></a></td>
                          <td width="100" height="25" align="center" bgcolor="#FFFFFF" style="; font-size:15px;"><?=DateThai($objResult[3]);?></td>
                          <td width="60" height="25" align="center" bgcolor="#FFFFFF" style="; font-size:15px;"><?=$objResult[4];?></td>
                          <td width="50" height="25" align="center" bgcolor="#FFFFFF"><a href="edit-movie.php?id=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a></td>
                          <td width="20" height="25" align="center" bgcolor="#FFFFFF"><input type="checkbox" name="chkDel[]" id="chkDel<?=$i;?>" value="<?=$objResult[0];?>" /></td>
                        </tr>
                        <? } ?>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30" align="right"><input type="submit" name="Submit" id="Submit" value="ลบข้อมูล" />
                          <input type="hidden" name="hdnCount" value="<?=$i;?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><font size="2" color="#000000">รายการหนังทั้งหมด ทั้งหมด
                         <?=$total;?>
                          รายการ : แสดงผลหน้าละ
                          <?=$e_page;?>
                          รายการ จำนวนทั้งหมด
                          <?=$total_p;?>
                          หน้า</font></td>
                      </tr>
                      <tr>
                        <td height="30" align="center" valign="middle">


<?php if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigator($before_p,$plus_p,$total,$total_p,$_GET['s_page']);    
  ?> 
</div>
<?php } ?>

                        </td>
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
