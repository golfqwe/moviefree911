<?
session_start();
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
		font-size: 14pt;
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
                <td align="left" id="font-main" style=" color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                <td width="75" align="right" id="font-main"><a href="logout.php" style=" color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" id="font-main" style=" color:#333333;">รายการซีรี่ย์ทั้งหมด <a href=" add-series.php"><span class="w3-tag w3-red">เพิ่มซีรีย์ !</span></a></td>
            </tr>
            <tr>
              <td align="center"><form action="del-series.php?del=all" method="post" name="frmMain" id="frmMain" onsubmit="return onDelete();">
                <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                          <td width="5%" align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">#</td>
                          <td align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">ชื่อเรื่อง</td>
                          <td width="10%" align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">หมวดหมู่</td>
                          <td width="12%" align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">วันที่โพสต์</td>
                          <td width="8%" align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">เข้าชม</td>
                          <td width="18%" align="center" bgcolor="#E9E9E6" style=" font-size:14px; ">แก้ไข</td>
                          <td width="5%" align="center" bgcolor="#E9E9E6"><input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onclick="ClickCheckAll(this);" /></td>
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

$q="SELECT id, cate_id, title, post_date, view, sticky FROM `post` where  google_drive = 'series' ";
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

$sc_series="SELECT * FROM `movie_series` WHERE movie_id='".$objResult[0]."' ";
$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
$n_series=mysqli_num_rows($re_series);
?>
                        <tr>
                          <td align="center" bgcolor="#FFFFFF" style=" font-size:14px;"><?=$objResult[0];?></td>
                          <td align="left" bgcolor="#FFFFFF" style=" font-size:14px;">&nbsp;&nbsp;<? if($objResult[5]==1){ ?><span style=" color:#FF0000;"><span class="w3-tag w3-red"style="background-color: red">ซีรีย์แนะนำ!</span></span> <? } ?><a href="../post-<?=$objResult[0];?>/<?=$posturl;?>.html" target="_blank"><?=$objResult[2];?></a></td>
                          <td align="center" bgcolor="#FFFFFF" style=" font-size:14px;"><a href="../cate-<?=$objResult[1];?>/<?=$urlcate;?>" target="_blank"><?=$rcate[0];?></a></td>
                          <td align="center" bgcolor="#FFFFFF" style=" font-size:14px;"><?=DateThai($objResult[3]);?></td>
                          <td align="center" bgcolor="#FFFFFF" style=" font-size:14px;"><?=$objResult[4];?></td>
                          <td align="center" bgcolor="#FFFFFF"><a href="edit-series.php?id=<?=$objResult[0];?>"><span class="w3-tag w3-red" style="font-size: 14px;background-color: green;">แก้ไข!</span></a>&nbsp;&nbsp;<a href="edit-series.php?id=<?=$objResult[0];?>&edit_ep"><span class="w3-tag w3-red" style="font-size: 14px;background-color: red;">แก้ไขตอน!</span></a></td>
                          <td align="center" bgcolor="#FFFFFF"><input type="checkbox" name="chkDel[]" id="chkDel<?=$i;?>" value="<?=$objResult[0];?>" /></td>
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
                        <td align="center"><font size="3" color="#000000">รายการหนังทั้งหมด
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
<?php } ?></td>
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
