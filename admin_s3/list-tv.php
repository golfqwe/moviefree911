<?php session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/function.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}

if(isset($_GET['del'])){

  for($i=0;$i<count($_POST["chkDel"]);$i++){
    if($_POST["chkDel"][$i] != ""){



  $full_img="select tv_img from tv_post where id='".$_POST["chkDel"][$i]."' ";
  $full_plan=mysqli_query($con_db, $full_img);
  $full_quick=mysqli_fetch_row($full_plan);
    @unlink("../post-img/".$full_quick[0]."");        
$del_post="delete from tv_post where id='".$_POST["chkDel"][$i]."'"  or die ("ERROR $del post");
mysqli_query($con_db, $del_post);

    }
  }
print "<meta http-equiv=refresh content=0;URL=list-tv.php>";
}



// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
    global $urlquery_str;
    $pPrev=$chk_page-1;
    $pPrev=($pPrev>=0)?$pPrev:0;
    $pNext=$chk_page+1;
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;     
    $lt_page=$total_p-4;
    if($chk_page>0){  
        echo "<a  href='list-tv.php?s_page=$pPrev' class='naviPN'>Prev</a>";
    }
    if($total_p>=11){
        if($chk_page>=4){
            echo "<a $nClass href='list-tv.php?s_page=0'>1</a><a class='SpaceC'>. . .</a>";   
        }
        if($chk_page<4){
            for($i=0;$i<$total_p;$i++){  
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                if($i<=4){
                echo "<a $nClass href='list-tv.php?s_page=$i'>".intval($i+1)."</a> ";   
                }
                if($i==$total_p-1 ){ 
                echo "<a class='SpaceC'>. . .</a><a $nClass href='list-tv.php?s_page=$i'>".intval($i+1)."</a> ";   
                }       
            }
        }
        if($chk_page>=4 && $chk_page<$lt_page){
            $st_page=$chk_page-3;
            for($i=1;$i<=5;$i++){
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
                echo "<a $nClass href='list-tv.php?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";    
            }
            for($i=0;$i<$total_p;$i++){  
                if($i==$total_p-1 ){ 
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                echo "<a class='SpaceC'>. . .</a><a $nClass href='list-tv.php?s_page=$i'>".intval($i+1)."</a> ";   
                }       
            }                                   
        }   
        if($chk_page>=$lt_page){
            for($i=0;$i<=4;$i++){
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
                echo "<a $nClass href='list-tv.php?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
            }
        }        
    }else{
        for($i=0;$i<$total_p;$i++){  
            $nClass=($chk_page==$i)?"class='selectPage'":"";
            echo "<a href='list-tv.php?s_page=$i' $nClass  >".intval($i+1)."</a> ";   
        }       
    }   
    if($chk_page<$total_p-1){
        echo "<a href='list-tv.php?s_page=$pNext'  class='naviPN'>Next</a>";
    }
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">รายการทีวี [ <a href="tv_post.php">เพิ่มช่องทีวีใหม่</a> ] </td>
            </tr>
            <tr>
              <td align="center"><form action="list-tv.php?del" method="post" name="frmMain" id="frmMain" onsubmit="return onDelete();">
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
                          <td width="300" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">ชื่อเรื่อง</td>
                     
                         
                          <td width="60" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">เข้าชม</td>
                          <td width="50" height="25" align="center" bgcolor="#E9E9E6" style=" font-size:15px; font-weight:bold;">แก้ไข</td>
                          <td width="20" height="25" align="center" bgcolor="#E9E9E6"><input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onclick="ClickCheckAll(this);" /></td>
                        </tr>


<?php

$q="SELECT id, tv_cate, tv_name, tv_url, title, view FROM `tv_post` ORDER BY id DESC ";
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
    $plus_p=($_GET['s_page']*$e_page)+$total;   
}else{   
    $plus_p=($_GET['s_page']*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($_GET['s_page']*$e_page)+1;



		$i = 0;
		while($objResult = mysqli_fetch_row($qr)){
		$posturl=rewrite($objResult[2]);
		$i++;

?>
                        <tr>
                          <td width="20" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:15px;"><?=$objResult[0];?></td>

                          <td width="300" height="25" align="left" bgcolor="#FFFFFF" style=" font-size:15px;">&nbsp;&nbsp;<a href="../tv-<?=$objResult[0];?>/<?=$posturl;?>.html" target="_blank"><?=$objResult[2];?></a>  </td>
            
                          <td width="60" height="25" align="center" bgcolor="#FFFFFF" style=" font-size:15px;"><?=$objResult[5];?> </td>
                          <td width="50" height="25" align="center" bgcolor="#FFFFFF"><a href="tv_post.php?form_edit=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a></td>
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
                    <td align="center"><font size="3" color="#000000">รายการบล็อกแอดมิน
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
</table>
</body>
</html>
