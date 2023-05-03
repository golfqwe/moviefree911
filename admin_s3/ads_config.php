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
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ : ปิด-เปิดโฆษณา</title>
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
        <td><table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr style="font-weight:bold; font-size: 17px; color:#333333;">
              >> ปิด-เปิดโฆษณาหน้าแรก
            </tr>

<?


if(isset($_GET['up_ping'])){
  $insert_link1="update ads_config set  `sets`='".$_GET['pin']."' where  id='".$_GET['up_ping']."' ";
  mysqli_query($con_db, $insert_link1);

print "<meta http-equiv=refresh content=0;URL=ads_config.php>";

}
?>

          <tr>
            <td>
              <hr>
              <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr align="center" style="font-weight:bold; "> สถานะการใช้งานของโฆษณาหน้าแรก
                    <td align="right" style="font-weight:bold;"></td>
                    <td width="" align="center" style="font-weight:bold;"></td>
                    <td width="55%"style="font-weight:bold;"> </td>
                  </tr>
                <?
                  $s="SELECT * FROM `ads_config` order by id asc";
                  $re=mysqli_query($con_db, $s) or die("Error $s");
                  while ($r_config=mysqli_fetch_array($re)){
                ?>

                  <tr>
                    <td align="right" style="font-weight:bold;">สถานะการใช้งานขณะนี้</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td>
                      
      <? if($r_config['sets']=='0'){?>
            <a href="ads_config.php?up_ping=<? echo $r_config['id'];?>&pin=1"><i class="fa fa-times-circle" title="ปิดโฆษณา" style="color: red; font-weight:bold;"></i> ปิดโฆษณา</a>
        <?}else{?>
            <a href="ads_config.php?up_ping=<? echo $r_config['id'];?>&pin=0"><i class="fa fa-map-marker" title="เปิดโฆษณา" style="color: green; font-weight:bold;"></i> เปิดโฆษณา</a>
        <?}?>


                    </td>
                  </tr>
                <?}?>

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
