<?php
include "../inc/config.inc.php";
include "../function/function.php";
if(isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}

if(isset($_GET['add'])){
$insert_member="INSERT INTO `tv_cate` (`name`, `status`)VALUES ('".$_POST['name']."', '0')" or die ("ERROR1 $insert_member");
mysqli_query($con_db, $insert_member);
echo "<meta http-equiv='refresh' content='0;url=tv_cate.php'>"; 
} else if(isset($_GET['edit'])){
$upd="UPDATE `tv_cate` SET `name`='".$_POST['name']."' WHERE `id` ='".$_GET['edit']."'" or die("Error $upd");
mysqli_query($con_db, $upd);
print "<meta http-equiv=refresh content=0;URL=tv_cate.php>";
} else if(isset($_GET['del'])){
$del_post="delete from tv_cate where id='".$_GET['del']."'"  or die ("ERROR $del post");
mysqli_query($con_db, $del_post);
print "<meta http-equiv=refresh content=0;URL=tv_cate.php>";
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
.style4 {font-size: small; font-weight: bold; }
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
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;">จัดการข้อมูลหมวดรายการทีวี<img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูลหมวดรายการทีวี</td>
            </tr>
            <tr>
              <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30"><font size="3" color="#333333">:: เพิ่มข้อมูลหมวดหมู่หลัก :: </font></td>
                </tr>
                <tr>
                  <td><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                      <? if(isset($_GET['form_edit'])){
                        $sp="SELECT id, name FROM `tv_cate` where id='".$_GET['form_edit']."'";
                        $rep=mysqli_query($con_db, $sp) or die("ERROR $sp");
                        $rp=mysqli_fetch_row($rep);
                        ?>
                        <form method="post" action="tv_cate.php?edit=<? echo $_GET['form_edit'];?>" name ="checkForm">
                            <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="3" color="#333333">ชื่อหมวดหมู่</font></td>
                                <td width="10">&nbsp;</td>
                                <td width="350" align="left"><input name="name" type="text" id="name" autocomplete="off" value="<? echo $rp[1]?>" /></td>
                              </tr>

                              <tr>
                                <td width="100" align="right">&nbsp;</td>
                                <td width="10">&nbsp;</td>
                                <td width="350" align="left"><input type="submit" name="Submit" value="บักทึก แก้ไข" />
                                </td>
                              </tr>
                            </table>
                        </form>

                      <? }else{ ?>
                        <form method="post" action="tv_cate.php?add" name ="checkForm">
                            <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="3" color="#333333">ชื่อหมวดหมู่</font></td>
                                <td width="10">&nbsp;</td>
                                <td width="350" align="left"><input name="name" type="text" id="name" autocomplete="off" /></td>
                              </tr>

                              <tr>
                                <td width="100" align="right">&nbsp;</td>
                                <td width="10">&nbsp;</td>
                                <td width="350" align="left"><input type="submit" name="Submit" value="บักทึกข้อมูล" />                                </td>
                              </tr>
                            </table>
                        </form>
                      <? } ?>

                      </td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="30"><font size="3" color="#333333">:: รายการข้อมูลหมวดหมู่หลัก :: </font></td>
                </tr>
                <tr>
                  <td><table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                      <tr>
                        <td width="100" height="25" align="center" valign="middle" bgcolor="#EFEFED"><font size="3" color="#333333">รหัสไอดี</font></td>
                        <td width="350" height="25" align="center" valign="middle" bgcolor="#EFEFED"><font size="3" color="#333333">ชื่อหมวดหมู่หลัก</font></td>
                        <td width="100" height="25" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">การกระทำ</span></td>
                      </tr>
 

<?php


$q="SELECT id, name FROM tv_cate ";
$q.=" ORDER BY id ASC ";
$qr=mysqli_query($con_db, $q);
$total=mysqli_num_rows($qr);
$e_page=50; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
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


		while($objResult = mysqli_fetch_row($qr)){
		$cateurl=rewrite($objResult[1]);
?>
                      <tr>
                        <td width="50" align="center" valign="middle"><font size="3"><?=$objResult[0];?></font></td>
                        <td width="250" align="left" valign="middle">&nbsp;&nbsp;<font size="3"><a href="../cate-<?=$objResult[0];?>/<?=$cateurl;?>" target="_blank";><?=$objResult[1];?></a></font></td>
                        <td width="100" align="center" valign="middle"><font size="3"><a href="tv_cate.php?form_edit=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="tv_cate.php?del=<?=$objResult[0];?>" onclick="javascript:if(!confirm('หากท่านลบข้อมูลหมวดหมู่หลัก ข้อมูลหมวดหมู่ย่อยจะถูกลบไปด้วย ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
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
                    <td align="center"><font size="3" color="#000000">รายการหมวดหมู่ทั้งหมด
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
              </table></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
