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

              <td height="25" align="left" id="font-main" style="font-size: 16px; color:#333333;"><a href="list-series.php">รายการซีรี่ย์ทั้งหมด</a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มซีรี่ย์ใหม่  
                <a href="../M.jpg" target="bank" style="color: red;">ดูขั้นตอนการลง</a></td>

            </tr>

            <tr>

              <td align="center" id="font-main"><form method="post" action="p-add-series.php" enctype="multipart/form-data" name="checkForm" id="checkForm" onsubmit="return check1()">

                <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">

<script language="JavaScript" type="text/JavaScript">

<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</script>

                  <tr>

                    <td height="25" align="right" style="font-weight:bold;">เลือกตอนที่แสดง</td>

                    <td height="25" align="center" style="font-weight:bold;">:</td>

                    <td height="25" align="left">

						

							<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">

								<?php

								for($i=1;$i<=100;$i++){

									if($_GET["Line"] == $i)	{

										$sel = "selected";

									}else	{

										$sel = "";

									}

								?>

									<option value="<?php echo $_SERVER["PHP_SELF"];?>?Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?> </option>

								<?	} ?>

							</select>
<span style="color: red">จำเป็น</span>
                    </td>

                  </tr>

                

                  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">หมวดหมู่ซีรี่ย์</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left">

                    <select name="cate_id" id="cate_id" style="width:200px;">
                    	<option value="" >-- หมวดหมู่ซีรี่ย์ --</option>
                    <?

					$s="SELECT id, name FROM `category` ORDER BY id ASC";

					$re=mysqli_query($con_db, $s) or die("ERROR $s");

					while($r=mysqli_fetch_row($re)){

					?>

                      <option value="<?=$r[0];?>"><?=$r[1];?></option>

                    <? } ?>

                    </select></td>

                  </tr>

  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">ประเภทซีรี่ย์</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left">

                    <select name="tag" id="tag" style="width:200px;" required>

                      <option value="" >-- เลือกประเภทซีรี่ย์ --</option>

                    <?

                  $ss="SELECT id, tag_name FROM `tag_category` ORDER BY id ASC";

                  $res=mysqli_query($con_db, $ss) or die("ERROR $s");

                  while($rs=mysqli_fetch_row($res)){

                  ?>

                      <option value="<?=$rs[0];?>"><?=$rs[1];?></option>

                    <? } ?>

                    </select></td>

                  </tr>



                  <tr>

                    <td height="25" align="right" valign="top" style="font-weight:bold;">เลือกประเภท</td>
                    <td height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td height="25" align="left">
      <?
        $s="SELECT id, tag_name FROM `tag_category` ORDER BY id ASC";
        $re=mysqli_query($con_db, $s) or die("ERROR $s");
        while($r=mysqli_fetch_assoc($re)){

      ?>

      <label style="margin: 10px;width: 15%;">
        <input type="checkbox" name="tag_cat[]" id="tag_cat" value="<?=$r['id'];?>"> <?=$r['tag_name'];?>
      </label>
<? } ?>


                    </td>
                  </tr>

                  <tr>

                    <td height="25" align="right" style="font-weight:bold;">ตำแหน่งแสดง</td>

                    <td height="25" align="center" style="font-weight:bold;">:</td>

                    <td height="25" align="left">

					<input name="sticky" type="radio" value="0" checked="checked" /> ซีรี่ย์ทั่วไป  

					<input name="sticky" type="radio" value="1" /> ซีรี่ย์แนะนำ</td>

                  </tr>

                   <tr>

                    <td height="25" align="right" style="font-weight:bold;">ความคมชัด</td>

                    <td height="25" align="center" style="font-weight:bold;">:</td>

                    <td height="25" align="left">

						<input type="radio" name="movie" value="HD"checked="checked" required>หนัง HD&nbsp;&nbsp;

						<input type="radio" name="movie" value="SD" required>หนัง SD&nbsp;&nbsp;

						<input type="radio" name="movie" value="ZM" required>หนัง ZM&nbsp;&nbsp;

						<input type="radio" name="movie" value="SUB" required>หนัง SUB&nbsp;

					</td>

                  </tr>

                  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">ปีที่ฉาย</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left"><input type="text" name="projection" style="width:500px;" /></td>

                  </tr>
                  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">คะแนน IMDB</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left"><input type="text" name="imdb" style="width:500px;" /></td>

                  </tr>
                  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">ชื่อเรื่อง</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left"><input type="text" name="title" id="title" style="width:500px;" /></td>

                  </tr>
<!--
                  <tr>
                    <td width="140" height="60" align="right" valign="top" style="font-weight:bold;">รายละเอียดย่อ<br style="color: red;">2 บรรทัด</td>
                    <td width="10" height="60" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="60" align="left" valign="top"><textarea name="short_detail" id="short_detail" style="width:500px; height:50px;"></textarea></td>
                  </tr>
-->
                  <tr>

                    <td width="140" height="455" align="right" valign="top" style="font-weight:bold;">เรื่องย่อของซีรี่ย์ <br>
<span style="color: red">ใส่เฉพาะรายละเอียดย่อเท่านั้น</span>
                    </td>

                    <td width="10" height="455" align="center" valign="top" style="font-weight:bold;">:</td>

                    <td width="600" height="455" align="left" valign="top"><textarea class="cleditorMain" id="editor" name="input" style="width:600px; height:450px;"></textarea></td>

                  </tr>

                  <tr>

                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ภาพประกอบ</td>

                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>

                    <td width="600" height="35" align="left" valign="top"><input type="file" name="file1" id= "file1" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /> <br />

                    <span style="color:#FF0000">* ขนาดสัดส่วนภาพ 160x240 px ไม่เกิน 200KB รองรับไฟล์ .jpg .jpeg และ .png</span>

<hr>
                  <tr>
                    <td width="140" height="25" align="right" valign="top" style="font-weight:bold;">ID Youtube</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input type="text" name="link_youtube" id="link_youtube" style="width:450px;" /> <br> ตัวอย่างหนังจาก Youtube 
        	
                    </td>
                  </tr>

                </td>

                  </tr>


<tr height="25"></tr>
                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Title</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_tiele" id="meta_tiele" style="width:450px;height:50px;"></textarea></td>
                  </tr>
                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Description</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_description" id="meta_description" style="width:450px;height:50px;"></textarea></td>
                  </tr>  
                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Keyword</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
                      <textarea type="text" name="meta_keyword" id="meta_keyword" style="width:450px;height:50px;">
                      </textarea>
                    </td>
                  </tr>




<?php

  $line = $_GET["Line"];

  if($line == 0){$line=1;}

  for($i=1;$i<=$line;$i++)

  {

  ?>

                  <tr>



                    <td width="140" height="25" align="right">URL .m3u8</td>

                    <td width="10" height="25" align="center">:</td>

                    <td width="600" height="25" align="left"><textarea name="embed[]" style="width:500px; height:50px;"></textarea></td>

                  </tr>

                  <tr>

                    <td align="right">URL IFrame</td>

                    <td>:</td>

                    <td><input type="text" name="google_drive[]"  style="width:500px;" />  ตอนที่ <?=$i;?><hr></td>

                  </tr>





  <?php

  }

  ?>

                  <tr>

                    <td width="140" height="25" align="right" style="font-weight:bold;">สถานะ</td>

                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>

                    <td width="600" height="25" align="left">

                    <input name="post_comment" type="radio" value="1" checked="checked" /> Comment ได้ทุกคน 

                    <input name="post_comment" type="radio" value="2" /> เฉพาะสมาชิก 

                    <input name="post_comment" type="radio" value="3" /> ไม่ให้ Comment

					</td>

                  </tr>

                  <tr>

                    <td height="25" align="right">&nbsp;</td>

                    <td height="25" align="center">&nbsp;</td>

                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" />

					<input type="hidden" name="hdnLine" value="<?php echo $i;?>"></td>

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

