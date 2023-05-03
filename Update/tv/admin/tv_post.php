<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
if(isset($_GET['add'])){

    if($_FILES["tv_img"]["name"] != ""){
    $file_upload=uniqid()."_".preg_replace('/[[:space:]]+/', '', trim($_FILES["tv_img"]["name"]));
      @copy($_FILES["tv_img"]["tmp_name"],"../post-img/".$file_upload);
    }

$insert_member="INSERT INTO `tv_post` (`tv_cate`, `tv_name`, `tv_img`, `tv_url`, `title`, `description`, `keyword`, `detail`)VALUES ('".$_POST['tv_cate']."', '".$_POST['tv_name']."', '".$file_upload."', '".$_POST['tv_url']."', '".$_POST['title']."', '".$_POST['description']."', '".$_POST['keyword']."', '".$_POST['detail']."')" or die ("ERROR1 $insert_member");
mysqli_query($con_db, $insert_member);
echo "<meta http-equiv='refresh' content='0;url=list-tv.php'>"; 

} else if(isset($_GET['edit'])){
    if($_FILES["tv_img"]["name"] != ""){
    $file_upload=uniqid()."_".preg_replace('/[[:space:]]+/', '', trim($_FILES["tv_img"]["name"]));
      @copy($_FILES["tv_img"]["tmp_name"],"../post-img/".$file_upload);
$upd="UPDATE `tv_post` SET `tv_cate`='".$_POST['tv_cate']."', `tv_name`='".$_POST['tv_name']."', `tv_img`='".$file_upload."', `tv_url`='".$_POST['tv_url']."', `title`='".$_POST['title']."', `description`='".$_POST['description']."', `keyword`='".$_POST['keyword']."', `detail`='".$_POST['detail']."' WHERE `id` ='".$_GET['edit']."'" or die("Error $upd");
mysqli_query($con_db, $upd);

    }else{

$upd="UPDATE `tv_post` SET `tv_cate`='".$_POST['tv_cate']."', `tv_name`='".$_POST['tv_name']."', `tv_url`='".$_POST['tv_url']."', `title`='".$_POST['title']."', `description`='".$_POST['description']."', `keyword`='".$_POST['keyword']."', `detail`='".$_POST['detail']."' WHERE `id` ='".$_GET['edit']."'" or die("Error $upd");
mysqli_query($con_db, $upd);
  }

print "<meta http-equiv=refresh content=0;URL=list-tv.php>";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/bootstrap.min.css">
<link rel='stylesheet' type='text/css' href='styles.css' />
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:580, height:450, useCSS:true})[0].focus();
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
                <td align="left" style=" font-size:16px; font-weight:bold; color:#333333;">Admin Panel : จัดการข้อมูลรายการทีวี </td>
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">จัดการข้อมูลรายการทีวี</td>
            </tr>
            <tr>
              <td>

            <? if(isset($_GET['form_edit'])){ 
              $full_tv="select tv_cate, tv_name, tv_img, tv_url, title, description, keyword, detail from tv_post where id='".$_GET['form_edit']."' ";
              $full_tvs=mysqli_query($con_db, $full_tv);
              $tv_quick=mysqli_fetch_row($full_tvs);

              ?>
              <form id="form1" name="form1" method="post" action="tv_post.php?edit=<? echo $_GET['form_edit'];?>" enctype="multipart/form-data">
                <table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100" height="25" align="left" id="font-main">หมวดหมู่</td>
                          <td width="10" height="25">&nbsp;</td>
                          <td width="350" height="25" align="left">

                          <select name="tv_cate" id="tv_cate" style="width:200px;" required>
                         <option value="" >-- เลือกหมวดหมู่ --</option>
                          <?
                            $ss="SELECT id, name FROM `tv_cate` ORDER BY id ASC";
                            $res=mysqli_query($con_db, $ss) or die("ERROR $s");
                            while($rs=mysqli_fetch_row($res)){
                            ?>

                            <option value="<?=$rs[0];?>"<? if($rs[0]==$tv_quick[0]){ echo 'selected';} ?>><?=$rs[1];?></option>
                            <? } ?>
                          </select>



                            </td>
                        </tr>
                        <tr>
                          <td width="100" height="12" align="left" id="font-main">ชื่อช่องทีวี </td>
                          <td width="10" height="12">&nbsp;</td>
                          <td width="350" height="12" align="left"><input name="tv_name" type="text" id="tv_name" value="<?=$tv_quick[1];?>"></td>
                        </tr>
                        <tr>
                          <td width="100" height="11" align="left" id="font-main">Logo ช่องทีวี</td>
                          <td width="10" height="11">&nbsp;</td>
                          <td width="350" height="11" align="left"><input type="file" name="tv_img" id= "tv_img" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /></td>
                        </tr>
                        <tr>
                          <td width="100" height="11" align="left" id="font-main">URL</td>
                          <td width="10" height="11">&nbsp;</td>
                          <td width="350" height="11" align="left"><input name="tv_url" type="text" id="tv_url" value="<?=$tv_quick[3];?>" style="width:250px;"  /></td>
                        </tr>
                    <!--
                        <tr>
                          <td height="12" align="left" id="font-main">Link True</td>
                          <td height="12">&nbsp;</td>
                          <td height="12" align="left"><input name="trueurl" type="text" id="trueurl" value="<?=$r[7];?>" style="width:350px;" /></td>
                        </tr>
                    -->
                            <tr>
                          <td align="left" valign="top" id="font-main">รายละเอียด</td>
                           <td>&nbsp;</td>
                          <td align="left">
                          <textarea class="cleditorMain" id="editor" name="detail" style="width:580px; height:450px;"><?=stripslashes($tv_quick[7]);?></textarea></td>
                          </tr>          
                     
                        <tr>
                          <td align="left" valign="top" id="font-main">Title</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="title" id="title" style="width:350px; height:100px;"><?=$tv_quick[4];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Description</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="description" id="description" style="width:350px; height:100px;"><?=$tv_quick[5];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Keyword</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="keyword" id="keyword" style="width:350px; height:100px;"><?=$tv_quick[6];?></textarea></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="30" align="right"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>
            <? }else{ ?>
              <form id="form1" name="form1" method="post" action="tv_post.php?add" enctype="multipart/form-data">
                <table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100" height="25" align="left" id="font-main">หมวดหมู่</td>
                          <td width="10" height="25">&nbsp;</td>
                          <td width="350" height="25" align="left">

                          <select name="tv_cate" id="tv_cate" style="width:200px;" required>
                         <option value="" >-- เลือกหมวดหมู่ --</option>
                          <?
                            $ss="SELECT id, name FROM `tv_cate` ORDER BY id ASC";
                            $res=mysqli_query($con_db, $ss) or die("ERROR $s");
                            while($rs=mysqli_fetch_row($res)){
                            ?>

                            <option value="<?=$rs[0];?>"><?=$rs[1];?></option>
                            <? } ?>
                          </select>



                            </td>
                        </tr>
                        <tr>
                          <td width="100" height="12" align="left" id="font-main">ชื่อช่องทีวี </td>
                          <td width="10" height="12">&nbsp;</td>
                          <td width="350" height="12" align="left"><input name="tv_name" type="text" id="tv_name" value="<?=$r[2];?>"></td>
                        </tr>
                        <tr>
                          <td width="100" height="11" align="left" id="font-main">Logo ช่องทีวี</td>
                          <td width="10" height="11">&nbsp;</td>
                          <td width="350" height="11" align="left"><input type="file" name="tv_img" id= "tv_img" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /></td>
                        </tr>
						            <tr>
                          <td width="100" height="11" align="left" id="font-main">URL</td>
                          <td width="10" height="11">&nbsp;</td>
                          <td width="350" height="11" align="left"><input name="tv_url" type="text" id="tv_url" value="<?=$r[4];?>" style="width:250px;"  /></td>
                        </tr>
                    <!--
                        <tr>
                          <td height="12" align="left" id="font-main">Link True</td>
                          <td height="12">&nbsp;</td>
                          <td height="12" align="left"><input name="trueurl" type="text" id="trueurl" value="<?=$r[7];?>" style="width:350px;" /></td>
                        </tr>
                    -->
                        <tr>
                          <td align="left" valign="top" id="font-main">รายละเอียด</td>
                          <td>&nbsp;</td>
                          <td align="left">
                          <textarea class="cleditorMain" id="editor" name="detail" style="width:580px; height:450px;"><?=stripslashes($r[7]);?></textarea></td>
                          </tr>              
                        <tr>
                          <td align="left" valign="top" id="font-main">Title</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="title" id="title" style="width:350px; height:100px;"><?=$r[4];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Description</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="description" id="description" style="width:350px; height:100px;"><?=$r[5];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" id="font-main">Keyword</td>
                          <td>&nbsp;</td>
                          <td align="left"><textarea name="keyword" id="keyword" style="width:350px; height:100px;"><?=$r[6];?></textarea></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="30" align="right"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                  </tr>
                </table>
              </form>
            <? } ?>


                </td>
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
    CKEDITOR.replace ( 'editor',{toolbar: 'full' ,height: 450,
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