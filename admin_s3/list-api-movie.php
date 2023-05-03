<?php session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/function.php";
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
              <td height="25" align="left" id="font-main" style="color:#333333;"><p>

  <a href="list-admin-movie.php"class="w3-tag"style="background-color: #0fab84;"> รายการหนังแอดมิน</a> 
  <a href="add-movie.php"><span class="w3-tag"style="background-color: green;">เพิ่มหนังใหม่ !</span></a> 
  <a href="list-hot-movie.php" class="w3-tag"style="background-color: orange;">หนังแนะนำ</a>
  <a href="list-allplayer-movie.php" class="w3-tag"style="background-color: #ed6deb;">Allplayer</a>
  <a href="list-api-movie.php" class="w3-tag"style="background-color: #0092ed;">API</a>
  <a href="update_movie.php" class="w3-tag"style="background-color: red;">อัพเดท API</a>

                <p>
<span style="color: red;">***หมายเหตุ</span>: รายการหนัง API เป็นหนังที่ดึงจากเว็บอื่นไม่สามารถกำหนด วัน เวลา หรือ ตัวเล่นหนังได้ ระบบจะทำการดึงหนังที่ต้นทางอัพเดทมาลงที่ฐานข้อมูลเท่านั้น! <span style="color:green;">(เจ้าของเว็บอัพหนังได้ด้วยตัวเองที่ปุ่ม อัพเดท API) </span> อาจจะสัปดาห์ละครั้ง หรือเดือนละครั้ง <span style="color: red;">กรณีหนังดูไม่ได้ลูกค้าแก้ไขหนังเรื่องนั้นๆได้เอง ผู้ให้บริการไม่รับผิดชอบในการปรับปรุงแก้ไขหนังที่ดูไม่ได้</span></p>
              </td>
            </tr>
            <tr>
              <td align="center"><form action="del-admin-movie.php" method="post" name="frmMain" id="frmMain" onsubmit="return onDelete();">
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
                          <td width="350" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">ชื่อเรื่อง</td>
                          <td width="150" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">หมวดหมู่/ID Player</td>
                          <td width="50" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">API</td>
                          <td width="100" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">วันที่โพสต์</td>
                          <td width="60" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">เข้าชม</td>
                          <td width="50" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">แก้ไข</td>
                          <td width="20" height="25" align="center" bgcolor="#E9E9E6"><input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onclick="ClickCheckAll(this);" /></td>
                        </tr>


<?php
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
    global $urlquery_str;
    $pPrev=$chk_page-1;
    $pPrev=($pPrev>=0)?$pPrev:0;
    $pNext=$chk_page+1;
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;     
    $lt_page=$total_p-4;
    if($chk_page>0){  
        echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";
    }
    if($total_p>=11){
        if($chk_page>=4){
            echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";   
        }
        if($chk_page<4){
            for($i=0;$i<$total_p;$i++){  
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                if($i<=4){
                echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
                }
                if($i==$total_p-1 ){ 
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
                }       
            }
        }
        if($chk_page>=4 && $chk_page<$lt_page){
            $st_page=$chk_page-3;
            for($i=1;$i<=5;$i++){
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";    
            }
            for($i=0;$i<$total_p;$i++){  
                if($i==$total_p-1 ){ 
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
                }       
            }                                   
        }   
        if($chk_page>=$lt_page){
            for($i=0;$i<=4;$i++){
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
            }
        }        
    }else{
        for($i=0;$i<$total_p;$i++){  
            $nClass=($chk_page==$i)?"class='selectPage'":"";
            echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";   
        }       
    }   
    if($chk_page<$total_p-1){
        echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";
    }
}	

$q="SELECT id, cate_id, title, post_date, view, sticky, movie, link_allplayer, link_m3u8 FROM `post` WHERE m_id='$_SESSION[m_id]' AND link_m3u8<>''  and google_drive <> 'series' ";
$q.=" ORDER BY id DESC ";
$qr=mysqli_query($con_db, $q);
$total=mysqli_num_rows($qr);
$e_page=100; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
    $_GET['s_page']=0;   
}else{   
    $chk_page=$_GET['s_page'];     
    $_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysqli_query($con_db, $q);
if(mysqli_num_rows($qr)>=1){   
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);   
}else{   
    $plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;



		$i = 0;
		while($objResult = mysqli_fetch_row($qr)){
		$posturl=rewrite($objResult[2]);
		$i++;
		
		$scate="SELECT name FROM `category` WHERE id='$objResult[1]'";
		$recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
		$rcate=mysqli_fetch_row($recate);
		$urlcate=rewrite($rcate[0]);
?>
                        <tr><!-- <div class="movie-corner movie-<?=$objResult[6];?>"><?=$objResult[6];?></div> -->
                          <td width="20" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:15px;"><?=$objResult[0];?></td>
                          <td width="300" height="25" align="left" bgcolor="#FFFFFF" style=" font-size:15px;">&nbsp;&nbsp;<? if($objResult[5]==1){ ?><span style="color:#FF0000;"><span class="w3-tag w3-red"style="background-color: orange;">หนังแนะนำ!</span></span> <? } ?><a href="../post-<?=$objResult[0];?>/<?=$posturl;?>.html" target="_blank"><?=$objResult[2];?></a>  </td>
                          <td width="200" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:14px;"><a href="../cate-<?=$objResult[1];?>/<?=$urlcate;?>" target="_blank"><?=$rcate[0];?></a>
                          <font style="font-size: 11px; color: red;"><?=$objResult[7];?></font>
                          </td>

                          <td width="50" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:12px;">
                            <? if($objResult[8]!=""){ ?>
                               <span class="w3-tag"style="background-color: #0092ed;">API</span> 
                            <? } ?>
                            </td>


                          <td width="100" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:15px;"><?=DateThai($objResult[3]);?>

                          </td>
                          <td width="60" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:15px;"><?=$objResult[4];?></td>
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
                </table>
              </form></td>
            </tr>
            <tr>
              <td align="center"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center"><font size="3" color="#000000">รายการหนังแอดมิน
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
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
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
</table>
</body>
</html>
