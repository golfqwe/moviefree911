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
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/bootstrap.min.css">
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:600, height:450, useCSS:true})[0].focus();
      });
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
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" id="font-main" style="font-size: 16px; color:#333333;"><a href="list_football.php">รายการฟุตบอล</a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มใหม่ </td>
            </tr>
            <tr>
              <td align="center" id="font-main">
            <? if(isset($_GET['edit'])){
              $scate="select * from  `football_league` WHERE id='".$_GET['edit']."'";
              $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
              $rcate=mysqli_fetch_row($recate);
              ?>

              <form method="post" action="up_football.php?edit=<? echo $_GET['edit'];?>" enctype="multipart/form-data" name="checkForm">
                <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">

                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">วันที่แข่ง</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="date_league" style="width:500px;" value="<? echo $rcate[1];?>" id="datetimepicker"  autocomplete="off"/></td>
                  </tr>
                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">เวลาแข่งขัน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="time_league" style="width:500px;"  value="<? echo $rcate[2];?>"id="time_in" autocomplete="off"/></td>
                  </tr>                 
                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ทีมเจ้าบ้าน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="home_league" style="width:500px;"  value="<? echo $rcate[3];?>" autocomplete="off"/></td>
                  </tr>                 
                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ไอคอน ทีมเจ้าบ้าน</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><img src="../post-img/<? echo $rcate[4];?>" width="40" border="0" /><br><input type="file" name="file_home" /> <br />
                  </tr>

                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ทีมเยือน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="visit_league" style="width:500px;"  value="<? echo $rcate[5];?>" autocomplete="off"/></td>
                  </tr>                 
                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ไอคอน ทีมเยือน</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><img src="../post-img/<? echo $rcate[6];?>" width="40" border="0" /><br><input type="file" name="file_visit" /> </td >
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ลิงค์</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">

<textarea  name="link_league" style="width:500px; height:100px;"><? echo $rcate[7];?></textarea>

                     <br> ลิงค์ถ่ายทอดสดทาง ออนไลน์ </td>
                  </tr>
                                   

                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>

            <? }else{ ?>

              <form method="post" action="up_football.php?add" enctype="multipart/form-data" name="checkForm" id="checkForm">
                <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">

                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">วันที่แข่ง</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="date_league" style="width:500px;" id="datetimepicker"  autocomplete="off"/></td>
                  </tr>
                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">เวลาแข่งขัน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="time_league" style="width:500px;" id="time_in" autocomplete="off"/></td>
                  </tr>                 
                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ทีมเจ้าบ้าน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="home_league" style="width:500px;" autocomplete="off"/></td>
                  </tr>                 
                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ไอคอน ทีมเจ้าบ้าน</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><input type="file" name="file_home" /> <br />
                  </tr>

                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ทีมเยือน</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="visit_league" style="width:500px;" autocomplete="off" /></td>
                  </tr>                 
                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ไอคอน ทีมเยือน</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><input type="file" name="file_visit" /> </td >
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ลิงค์</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea  name="link_league" style="width:500px; height:100px;"></textarea> <br> ลิงค์ถ่ายทอดสดทาง ออนไลน์ </td>
                  </tr>
                                   

                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>
            <?}?>

            </td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
      <script src="../js/jquery.min.js"></script>  
      <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>
      <script src="../js/jquery.datetimepicker.js"></script>
      <script>/*
            window.onerror = function(errorMsg) {
              $('#console').html($('#console').html()+'<br>'+errorMsg)
            }*/
            $('#datetimepicker').datetimepicker({
              onGenerate:function( ct ){
                $(this).find('.xdsoft_date.xdsoft_weekend')
                  .addClass('xdsoft_disabled');
              },
              weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
              timepicker:false
            });
            $('#time_in').datetimepicker({
              datepicker:false,
              format:'H:i',
              step:10
            });

      </script>
      <style type="text/css">

            .custom-date-style {
              background-color: red !important;
            }

      </style>