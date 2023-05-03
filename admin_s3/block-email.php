<?php 
include "../inc/config.inc.php";
if(isset($_SESSION['admin_login'])) {
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
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/bootstrap.min.css">
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
.style4 {font-size: small; font-weight: bold; }
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
                <td align="left" style=" font-size:16px; font-weight:bold; color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
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
              <td height="25" align="left" style=" font-size:16px; font-weight:bold; color:#333333;"><a href="block-email.php">จัดการข้อมูล Block Email</a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูล Block Email </td>
            </tr>
            <tr>
              <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><form method="post" action="p-block-email.php" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                        <table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="right"><font size="3" color="#333333">Email</font></td>
                            <td width="10">&nbsp;</td>
                            <td width="300" align="left"><input name="brand" type="text" id="brand" style="width:290px;" /></td>
                            </tr>
                          <tr>
                            <td width="150" align="right">&nbsp;</td>
                            <td width="10">&nbsp;</td>
                            <td width="300" align="left"><input type="submit" name="Submit" value="บักทึกข้อมูล" /></td>
                            </tr>
                          </table>
                        <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.brand.value=="") {
alert("กรุณากรอก Email ด้วยนะครับ") ;
document.checkForm.brand.focus() ;
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
                <tr>
                  <td height="30"><font size="3" color="#333333">:: รายการข้อมูล Block Email :: </font></td>
                </tr>
                <tr>
                  <td><table width="656" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                    <tr>
                      <td width="250" height="30" align="center" valign="middle" bgcolor="#EFEFED"><font color="#333333" size="3">Email</font></td>
                      <td width="100" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">การกระทำ</span></td>
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

$q="SELECT * FROM block_email";
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

		while($objResult = mysqli_fetch_row($qr)){
?>
                    <tr>
                      <td width="250" height="25" align="left" valign="middle">&nbsp;&nbsp;<font size="3">
                        <?=$objResult[1];?>
                      </font></td>
                      <td width="100" height="25" align="center" valign="middle"><font size="3"><a href="edit-block-email.php?id=<?=$objResult[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a><a href="del-block-email.php?id=<?=$objResult[0];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                    </tr>
                    <? } ?>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><font size="3" color="#000000">รายการ Block Email
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
    </table></td>
  </tr>
</table>
</body>
</html>
