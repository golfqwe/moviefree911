<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_GET['id'];
$spost="SELECT * FROM `blog` WHERE id='$id'";
$repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
$rpost=mysqli_fetch_row($repost);
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;"><a href="list-admin-blog.php">รายการบล็อก</a> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลบล็อก</td>
            </tr>
            <tr>
              <td align="center" id="font-main"><form method="post" action="p-edit-blog.php" enctype="multipart/form-data" name="checkForm" id="checkForm" onsubmit="return check1()">
                <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">



                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ชื่อเรื่อง</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
					<input name="title" type="text" id="title" style="width:500px;" value="<?=$rpost[2];?>" />
					</td>
                  </tr>
<!--

                  <tr>
                    <td width="140" height="60" align="right" valign="top" style="font-weight:bold;">รายละเอียดย่อ <br>2 บรรทัด</td>
                    <td width="10" height="60" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="60" align="left" valign="top"><textarea name="short_detail" id="short_detail" style="width:500px; height:50px;"><//?=$rpost[4];?></textarea></td>
                  </tr>
-->


                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ภาพประกอบ</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><input type="file" name="file1" id= "file1" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /> 
					<? if($rpost[4]!=""){ ?>
					<br><img src="../post-img/<?=$rpost[4];?>" width="250"/> <!--<a href="del-file.php?id=<?=$id;?>&type=1&filedel=<?=$rpost[4];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบภาพประกอบ</a> -->
					<input type="hidden" name="oimg" id="oimg" value="<?=$rpost[4];?>" />
					<? } ?><br />
                    <span style="color:#FF0000">* ขนาดกว้าง 880px ไม่เกิน 900KB รองรับไฟล์ .jpg .jpeg </span></td>
                  </tr>

                  <tr>
                    <td width="140" height="455" align="right" valign="top" style="font-weight:bold;">เรื่องย่อของหนัง</td>
                    <td width="10" height="455" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="455" align="left" valign="top"><textarea class="cleditorMain" id="editor" name="input" style="width:600px; height:450px;"><?=stripslashes($rpost[3]);?></textarea></td>
                  </tr>



                  <tr>
                    <td width="140" height="25"align="right" valign="top" style="font-weight:bold;">ID Youtube</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="link_youtube" type="text" id="link_youtube" style="width:450px;" value="<?=$rpost[5];?>" /><br> ตัวอย่างหนังจาก Youtube</td>
                  </tr> 
<tr height="25"></tr>                  
                  <tr>
                    <td width="140" height="25"align="right" valign="top" style="font-weight:bold;">tag_1</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_1" type="text" id="tag_1" style="width:450px;" value="<?=$rpost[8];?>" /> </td>
                  </tr>                   
<tr height="25"></tr>                  
                  <tr>
                    <td width="140" height="25"align="right" valign="top" style="font-weight:bold;">tag_2</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_2" type="text" id="tag_2" style="width:450px;" value="<?=$rpost[9];?>" /> </td>
                  </tr>
<tr height="25"></tr>                  
                  <tr>
                    <td width="140" height="25"align="right" valign="top" style="font-weight:bold;">tag_3</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_3" type="text" id="tag_3" style="width:450px;" value="<?=$rpost[10];?>" /> </td>
                  </tr>
<tr height="25"></tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">tag_4</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_4" type="text" id="tag_4" style="width:450px;" value="<?=$rpost[11];?>" /></td>
                  </tr> 
<tr height="25"></tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">tag_5</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_5" type="text" id="tag_5" style="width:450px;" value="<?=$rpost[12];?>" /></td>
                  </tr>
<tr height="25"></tr> 
                   <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">tag_6</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="tag_6" type="text" id="tag_6" style="width:450px;" value="<?=$rpost[13];?>" /></td>
                  </tr>
<tr height="25"></tr>             
                  <tr style="background-color: #ded9d9;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Title</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_tiele" id="meta_tiele" style="width:450px;height:100px;" /><?=$rpost[14];?></textarea></td>
                  </tr>
<tr height="25"></tr> 
                  <tr style="background-color: #ded9d9;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Description</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_description" id="meta_description" style="width:450px;height:100px;" /><?=$rpost[15];?></textarea></td>
                  </tr>  
<tr height="25"></tr> 
                  <tr style="background-color: #ded9d9;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Keyword</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_keyword" id="meta_keyword" style="width:450px;height:100px;"/><?=$rpost[16];?></textarea> </td>
                  </tr>                   
<!--
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ไฟล์ VDO</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="file" name="filevdo" id="filevdo" /> 
					<? if($rpost[8]!=""){ ?>
					<a href="del-file.php?id=<?=$id;?>&type=2&filedel=<?=$rpost[8];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบไฟล์ VDO</a>
					<input type="hidden" name="ovdo" id="ovdo" value="<?=$rpost[8];?>" />
					<? } ?> 
					<span style="color:#FF0000">* รองรับไฟล์ .mp4 และ .flv</span></td>
                  </tr>
                -->

                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left">
                      <input type="hidden" name="id" value="<? echo $_GET['id'];?>">
                      <input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณาระบุชื่อเรื่องด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}else if(document.checkForm.short_detail.value=="") {
alert("กรุณาระบุรายละเอียดย่อด้วยนะครับ") ;
document.checkForm.short_detail.focus() ;
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
    </table></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      CKEDITOR.env.isCompatible = true;
    CKEDITOR.replace ( 'editor',{toolbar: 'full' ,height: 200,
      fullPage: true,
      allowedContent: true,
      extraPlugins: 'wysiwygarea', 
      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Image',
            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=File',
            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Image',
            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});</script>