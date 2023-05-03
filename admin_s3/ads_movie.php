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
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ : โฆษณาก่อนเล่นหนัง</title>
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
            <tr style="font-weight:bold;">
              <td height="25" align="left" id="font-main" style="font-size: 17px; color:#333333;"><a href="ads_movie.php"> หน้าหลัก </a>>> โฆษณาก่อนเล่นหนัง :: <a href="ads_movie.php?edit_vide">คลิปโฆษณา</a> || <a href="ads_movie.php?edit_link">ลิ้งโฆษณา</a> <a href="img/ads_movie.jpg" style="color: red;" target="bank" >คำแนะนำ </a></td>
            </tr>

<?


if(isset($_GET['update'])){
  if ($_FILES["filevdo1"]["name"] != ""){
    @copy($_FILES["filevdo1"]["tmp_name"],"../vdo/".$_FILES['filevdo1']['name']);
  $insert_link1="update ads_video set  `name`='".$_FILES['filevdo1']['name']."',`type`='".$_FILES['filevdo1']['type']."' where  posit='link1' ";
  mysqli_query($con_db, $insert_link1);
  }
  if ($_FILES["filevdo2"]["name"] != ""){
    @copy($_FILES["filevdo2"]["tmp_name"],"../vdo/".$_FILES['filevdo2']['name']);  
  $insert_link2="update ads_video set  `name`='".$_FILES['filevdo2']['name']."',`type`='".$_FILES['filevdo2']['type']."' where  posit='link2' ";  
  mysqli_query($con_db, $insert_link2);
  }
  if ($_FILES["filevdo3"]["name"] != ""){
    @copy($_FILES["filevdo3"]["tmp_name"],"../vdo/".$_FILES['filevdo3']['name']);    
  $insert_link3="update ads_video set  `name`='".$_FILES['filevdo3']['name']."',`type`='".$_FILES['filevdo3']['type']."' where  posit='link3' ";
  mysqli_query($con_db, $insert_link3);
  }
  if ($_FILES["filevdo4"]["name"] != ""){
    @copy($_FILES["filevdo4"]["tmp_name"],"../vdo/".$_FILES['filevdo4']['name']);  
  $insert_link4="update ads_video set  `name`='".$_FILES['filevdo4']['name']."',`type`='".$_FILES['filevdo4']['type']."' where  posit='link4' ";
  mysqli_query($con_db, $insert_link4);
  }

print "<meta http-equiv=refresh content=0;URL=ads_movie.php>";

} elseif(isset($_GET['del_video'])){

	@unlink ("../vdo/".$_GET["vdo"]);
	$del_post="update ads_video set `name`='',`type`='' where posit='".$_GET["posit"]."' ";
	mysqli_query($con_db, $del_post);
print "<meta http-equiv=refresh content=0;URL=ads_movie.php>";



} elseif(isset($_GET['update_link'])){

  $insert_text1="update ads_video set  `name`='".$_POST['link1']."' where  posit='text_link1' ";
  mysqli_query($con_db, $insert_text1);
  $insert_text2="update ads_video set  `name`='".$_POST['link2']."' where  posit='text_link2' ";
  mysqli_query($con_db, $insert_text2);
  $insert_text3="update ads_video set  `name`='".$_POST['link3']."' where  posit='text_link3' ";
  mysqli_query($con_db, $insert_text3);
  $insert_text4="update ads_video set  `name`='".$_POST['link4']."' where  posit='text_link4' ";
  mysqli_query($con_db, $insert_text4);





print "<meta http-equiv=refresh content=0;URL=ads_movie.php>";
  //header("location:ads_movie.php");
} elseif(isset($_GET['edit_vide'])){

?>

          <tr>
            <td align="center" id="font-main">
              <form method="post" action="ads_movie.php?update" enctype="multipart/form-data">
                <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">


                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ไฟล์ VDO link1</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="file" name="filevdo1"  accept="video/*"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ไฟล์ VDO link2</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="file" name="filevdo2"  accept="video/*"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ไฟล์ VDO link3</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="file" name="filevdo3"  accept="video/*"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ไฟล์ VDO link4</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="file" name="filevdo4"  accept="video/*"/></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>
            </td>
          </tr>
<?          
} elseif(isset($_GET['edit_link'])){

?>

          <tr>
            <td align="center" id="font-main">
              <form method="post" action="ads_movie.php?update_link" enctype="multipart/form-data">
                <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">link1</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="link1" value="<? echo $text_link1;?>"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">link2</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="link2" value="<? echo $text_link2;?>"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">link3</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="link3" value="<? echo $text_link3;?>"/></td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">link4</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="link4" value="<? echo $text_link4;?>"/></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>
            </td>
          </tr>


<?
}else{
?>

          <tr>
            <td>
              <hr>
              <a href="ads_movie.php?edit_vide" style="font-size: 18px;font-weight:bold;">แก้ไขคลิปโฆษณา</a>
              <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr>
                    <td align="right" style="font-weight:bold;">คลิปโฆษณา 1 ตั้งชื่อ ads1</td>
                    <td width="5%" align="center" style="font-weight:bold;">:</td>
                    <td width="80%"><? if($link1){ echo 'https://'.$titler[3].'/vdo/'.$link1;?> [ <a href="ads_movie.php?del_video&posit=link1&vdo=<? echo $link1;?>">ลบ</a> ] <?}?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">คลิปโฆษณา 2 ตั้งชื่อ ads2</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? if($link2){ echo 'https://'.$titler[3].'/vdo/'.$link2;?> [ <a href="ads_movie.php?del_video&posit=link2&vdo=<? echo $link2;?>">ลบ</a> ] <?}?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">คลิปโฆษณา 3 ตั้งชื่อ ads3</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? if($link3){ echo 'https://'.$titler[3].'/vdo/'.$link3;?> [ <a href="ads_movie.php?del_video&posit=link3&vdo=<? echo $link3;?>">ลบ</a> ] <?}?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">คลิปโฆษณา 4 ตั้งชื่อ ads4</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? if($link4){echo 'https://'.$titler[3].'/vdo/'.$link4;?> [ <a href="ads_movie.php?del_video&posit=link4&vdo=<? echo $link4;?>">ลบ</a> ] <?}?></td>
                  </tr>
              </table>
              <hr>
              <a href="ads_movie.php?edit_link" style="font-size: 18px;font-weight:bold;">แก้ไขลิ้งโฆษณา</a>
              <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr>
                    <td  align="right" style="font-weight:bold;">ลิงค์โฆษณา 1</td>
                    <td width="5%" align="center" style="font-weight:bold;">:</td>
                    <td width="80%"><? echo $text_link1;?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">ลิงค์โฆษณา 2</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? echo $text_link2;?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">ลิงค์โฆษณา 3</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? echo $text_link3;?></td>
                  </tr>
                  <tr>
                    <td align="right" style="font-weight:bold;">ลิงค์โฆษณา 4</td>
                    <td align="center" style="font-weight:bold;">:</td>
                    <td><? echo $text_link4;?></td>
                  </tr>
              </table>
            </td>
          </tr>

<?}?>



          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
