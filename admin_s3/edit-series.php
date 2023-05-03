<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
if(isset($_GET['del_cat'])){
    $del_post="delete from category_movie where id='".$_GET['del_cat']."' " or die ("ERROR $del post");
    mysqli_query($con_db, $del_post);
    echo "<meta http-equiv='refresh' content='0;url=edit-movie.php?id=".$_GET['movie']."'>"; 
}
$id=$_GET['id'];
$spost="SELECT * FROM `post` WHERE id='$id'";
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>


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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333; font-size: 17px;" ><a href="list-series.php">รายการซีรี่ย์ทั้งหมด</a> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขซีรี่ย์แต่ละตอน<?php if(isset($_GET['edit_ep'])) { echo '';}else	{ echo 'Series';}?> <center><br>แก้ไขเรื่อง :: <?=$rpost[3];?>
</center>

            </td>
            </tr>

            <tr>
              <td align="center" id="font-main">
	
<?php if(isset($_GET['edit_ep'])) {?>
<table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
<?php $ep=1;
		$sc_series="SELECT id_series, movie_id, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['id']."' ORDER BY id_series ASC";
		$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
		while($r_series=mysqli_fetch_row($re_series)){
		?>

                  <tr>
                    <td width="140" height="25" align="right">URL .m3u8</td>
                    <td width="10" height="25" align="center">:</td>
                    <td width="600" height="25" align="left">
                      <input  type="text" value="<?=$r_series[3];?>" style="width:500px;" disabled></td>
                  </tr>
                  <tr>
                    <td align="right">URL IFrame</td>
                    <td>:</td>
                    <td><input type="text"  value="<?=$r_series[2];?>"  style="width:400px;" disabled/>ตอนที่ : <?=$ep;?>   <a href="del-series.php?del=<?=$r_series[0];?>&series=<?=$_GET['id'];?>&edit_ep"><span class="w3-tag w3-red" style="font-size: 14px;background-color: red;">ลบ!</span></a> <a href="#" data-toggle="modal" data-target="#contact<?=$r_series[0];?>"><span class="w3-tag w3-red" style="font-size: 14px;background-color: green;">แก้ไข!</span></a><hr></td>
                  </tr>


		<div id="contact<?=$r_series[0];?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" name="checkForm" id="checkForm"  action="p-edit-series.php?ep=<?=$r_series[0];?>&series=<?=$_GET['id'];?>">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">×</a>
						<h3>คุณกำลังเข้าแก้ไข ตอนที่ : <?=$ep;?> </h3>
					</div>
						<div class="modal-body">	
							<div class="form-group">
								<p  align="left">URL .m3u8
									<input type="text" name="embed" style="width:100%;"value="<?=$r_series[3];?>">
								</p>
							</div>					
							<div class="form-group">
								<p  align="left">URL IFrame
									<input type="text" name="google_drive"  style="width:100%;" value="<?=$r_series[2];?>">
								</p>
							</div>
						</div>
						<div class="modal-footer">					
							<input type="submit" class="btn btn-success" value="บันทึกข้อมูล">
							<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php $ep++;
		}
		?>
          </table>
<br><br>
	<?}else	{?>
			  
			  
			  <form method="post" action="p-edit-series2.php?series=<?=$_GET['id'];?>" enctype="multipart/form-data" name="checkForm" id="checkForm" onsubmit="return check1()">
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
                    <td height="25" align="right" style="font-weight:bold;">เพิ่มตอนที่นี่</td>
                    <td height="25" align="center" style="font-weight:bold;">:</td>
                    <td height="25" align="left">
						
							<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
								<?php
								for($i=1;$i<=50;$i++){
									if($_GET["Line"] == $i)	{
										$sel = "selected";
									}else	{
										$sel = "";
									}
								?>
									<option value="<?php echo $_SERVER["PHP_SELF"];?>?id=<?=$_GET["id"];?>&Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
								<?	} ?>
							</select>
                    </td>
                  </tr>



				        <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">หมวดหมู่หนัง</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
                    <select name="cate_id" id="cate_id" style="width:200px;">
                    <?
					$s="SELECT id, name FROM `category` ORDER BY id ASC";
					$re=mysqli_query($con_db, $s) or die("ERROR $s");
					while($r=mysqli_fetch_row($re)){
					?>
                      <option value="<?=$r[0];?>" <? if($r[0]==$rpost[1]){ ?>selected="selected"<? } ?>><?=$r[1];?></option>
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
                      <option value="<?=$rs[0];?>" <? if($rs[0]==$rpost[15]){ ?>selected="selected"<? } ?>><?=$rs[1];?></option>
                    <? } ?>
                    </select></td>
                  </tr>



                  <tr>

                    <td height="25" align="right" valign="top" style="font-weight:bold;">ประเภทหนัง</td>
                    <td height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td height="25" align="left">

<?
    $spost="select * from category_movie where id_movie='".$_GET['id']."'order by category_movie asc";
    $repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
    while($rpos=mysqli_fetch_assoc($repost)){
      $s="SELECT * FROM `tag_category` where id='".$rpos['category_movie']."'";
      $re=mysqli_query($con_db, $s) or die("ERROR $s");
      $r=mysqli_fetch_assoc($re);
?>
      <label>                                                    
        <a href='edit-series.php?del_cat=<? echo $rpos['id'];?>&movie=<? echo $_GET['id'];?>'><? echo $r['tag_name'];?>:<span class="w3-tag w3-red" style="font-size: 14px;background-color: red;">ลบ!</span></a>
      </label> 
<? } ?>
                    </td>
                  </tr>

                  <tr>

                    <td height="25" align="right" valign="top" style="font-weight:bold;">เลือกประเภท</td>
                    <td height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td height="25" align="left">
      <?
        $s="SELECT id, tag_name FROM `tag_category` ORDER BY id ASC";
        $re=mysqli_query($con_db, $s) or die("ERROR $s");
        while($r=mysqli_fetch_assoc($re)){
          $spost="select * from category_movie where id_movie='".$_GET['id']."' and category_movie='".$r['id']."' ";
          $repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
          $rpos=mysqli_fetch_assoc($repost);

      ?>

      <label style="margin: 10px;width: 15%;">
        <input type="checkbox" name="tag_cat[]" id="tag_cat" value="<?=$r['id'];?>"<? if($rpos['category_movie']==$r['id']){ echo 'checked'; } ?>> <?=$r['tag_name'];?>
      </label>
<? } ?>


                    </td>
                  </tr>

                  <tr>
                    <td height="25" align="right" style="font-weight:bold;">ตำแหน่งแสดง</td>
                    <td height="25" align="center" style="font-weight:bold;">:</td>
                    <td height="25" align="left">
					<input name="sticky" type="radio" value="0" <? if($rpost[12]==0){ ?>checked="checked"<? } ?> /> หนังทั่วไป  
					<input name="sticky" type="radio" value="1" <? if($rpost[12]==1){ ?>checked="checked"<? } ?> /> หนังแนะนำ</td>
                  </tr>
                  <tr>
                    <td height="25" align="right" style="font-weight:bold;">ความคมชัด</td>
                    <td height="25" align="center" style="font-weight:bold;">:</td>
                    <td height="25" align="left">
					<input type="radio" name="movie" value="HD" <? if($rpost[14]=='HD'){ ?>checked="checked"<? } ?> required>หนัง HD&nbsp;&nbsp;
					<input type="radio" name="movie" value="SD" <? if($rpost[14]=='SD'){ ?>checked="checked"<? } ?> required>หนัง SD&nbsp;&nbsp;
					<input type="radio" name="movie" value="ZM" <? if($rpost[14]=='ZM'){ ?>checked="checked"<? } ?> required>หนัง ZM&nbsp;&nbsp;
					<input type="radio" name="movie" value="SUB" <? if($rpost[14]=='SUB'){ ?>checked="checked"<? } ?> required>หนัง SUB&nbsp;
						</td>
                  </tr>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ปีที่ฉาย</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
          					<input name="projection" type="text" style="width:500px;" value="<?=$rpost[16];?>" />
          					<input type="hidden" name="id" id="id" value="<?=$id;?>" />
          					</td>
                  </tr>

                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">คะแนน IMDB</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
                    <input name="imdb" type="text" style="width:500px;" value="<?=$rpost[17];?>" />
                    <input type="hidden" name="id" id="id" value="<?=$id;?>" />
                    </td>
                  </tr>

                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">ชื่อเรื่อง</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
					<input name="title" type="text" id="title" style="width:500px;" value="<?=$rpost[3];?>" />
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
                    <td width="140" height="455" align="right" valign="top" style="font-weight:bold;">เรื่องย่อของหนัง</td>
                    <td width="10" height="455" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="455" align="left" valign="top"><textarea class="cleditorMain" id="editor" name="input" style="width:600px; height:450px;"><?=stripslashes($rpost[5]);?></textarea></td>
                  </tr>
                  <tr>
                    <td width="140" height="35" align="right" valign="top" style="font-weight:bold;">ภาพประกอบ</td>
                    <td width="10" height="35" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="35" align="left" valign="top"><input type="file" name="file1" id= "file1" multiple="true" class="filestyle" data-buttonName="btn-primary" accept=".jpg,.JPEG,.gif,.GIF,.png,.PNG" /> 
					<?
    $spre_imgs="SELECT * FROM `post_img` where post_id='".$_GET['id']."'";
    $repre_img=mysqli_query($con_db, $spre_imgs) or die("ERROR $spre");
    $rpre_img = mysqli_fetch_assoc($repre_img);

        if($rpre_img['post_id']!=$rpost['id']){ ?>
					<img src="../post-img/<?=$rpost[6];?>" width="50" height="75" /> <a href="del-file.php?id=<?=$id;?>&type=1&filedel=<?=$rpost[6];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบภาพประกอบ</a>
          <? }else{ ?>
          <br><img src="<?=$rpost[6];?>" width="150" height="220" /> <a href="del-file.php?id=<?=$id;?>&type=1&filedel=<?=$rpost[6];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบภาพประกอบ</a>
          <? } ?>
          <input type="hidden" name="oimg" id="oimg" value="<?=$rpost[6];?>" />


          <br />
                    <span style="color:#FF0000">* ขนาดสัดส่วนภาพ 160x240 px ไม่เกิน 200KB รองรับไฟล์ .jpg .jpeg และ .png</span>
<hr>

                  <tr>
                    <td width="140" height="25" align="right" valign="top" style="font-weight:bold;">ID Youtube</td>
                    <td width="10" height="25" align="center" valign="top" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><input name="link_youtube" type="text" id="link_youtube" style="width:450px;" value="<?=$rpost[7];?>" /><br> ตัวอย่างหนังจาก Youtube
                    </td>
                  </tr>
<br>
                  </td>
                  </tr>
            
                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Title</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_tiele" id="meta_tiele" style="width:450px;height:50px;"><?=$rpost[20];?></textarea></td>
                  </tr>

                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Description</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_description" id="meta_description" style="width:450px;height:50px;"><?=$rpost[21];?></textarea></td>
                  </tr>  

                  <tr style="background-color: #decaca;">
                    <td width="140" height="25" align="right" style="font-weight:bold;">Meta Keyword</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left"><textarea type="text" name="meta_keyword" id="meta_keyword" style="width:450px;height:50px;"><?=$rpost[22];?></textarea> </td>
                  </tr>



<?php
		$sc_series="SELECT id_series, movie_id, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$_GET['id']."' ORDER BY id_series ASC";
		$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
		$n_series=mysqli_num_rows($re_series);

 $epx=$n_series+1;
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
                    <td><input type="text" name="google_drive[]"  style="width:500px;"/>ตอนที่: <?=$epx;?><hr></td>
                  </tr>


  <?php  $epx++;
  }
  ?>
                  <tr>
                    <td width="140" height="25" align="right" style="font-weight:bold;">สถานะ</td>
                    <td width="10" height="25" align="center" style="font-weight:bold;">:</td>
                    <td width="600" height="25" align="left">
                    <input name="post_comment" type="radio" value="1" <? if($rpost[10]==1){ ?>checked="checked"<? } ?> /> Comment ได้ทุกคน 
                    <input name="post_comment" type="radio" value="2" <? if($rpost[10]==2){ ?>checked="checked"<? } ?> /> เฉพาะสมาชิก 
                    <input name="post_comment" type="radio" value="3" <? if($rpost[10]==3){ ?>checked="checked"<? } ?> /> ไม่ให้ Comment
					</td>
                  </tr>
                  <tr>
                    <td height="25" align="right">&nbsp;</td>
                    <td height="25" align="center">&nbsp;</td>
                    <td height="25" align="left"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" /></td>
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
              </form>
			  </td>
            </tr>
          </table>

<?}?>

			</td>
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