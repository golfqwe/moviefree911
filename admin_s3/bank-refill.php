<?php
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
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
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">จัดการข้อมูลรายการเติมเงินผ่านธนาคาร</td>
            </tr>
            <tr>
              <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                  <td width="100" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">วัน เวลา ที่เติม </td>
                  <td width="200" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">รายละเอียด</td>
                  <td width="200" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">ชนิดการเติม</td>
                  <td width="130" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">สถานะ</td>
                  <td width="120" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">การจัดการ</td>
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

$q="SELECT * FROM `payment` WHERE type=1 ";
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
                  <td width="100" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><?=$objResult[6];?></td>
                      </tr>
                      <tr>
                        <td align="center">เวลา
                          <?=$objResult[7];?>
                          น.</td>
                      </tr>
                  </table></td>
                  <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>Email :
						<?
						$smem="SELECT email FROM `member` WHERE id='$objResult[3]'";
						$remem=mysqli_query($con_db, $smem) or die("ERROR $smem");
						$rmem=mysqli_fetch_row($remem);
						echo $rmem[0];
						?>
						 </td>
                      </tr>
                    </table>
                      <?
					  $sbank="SELECT bankname FROM `bank` WHERE id='$objResult[4]'";
					  $rebank=mysqli_query($con_db, $sbank) or die("ERROR $sbank");
					  $rbank=mysqli_fetch_row($rebank);
					  ?>
                      <table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="20" align="left">ผ่านธนาคาร
                            <?=$rbank[0];?>
                          </td>
                        </tr>
                        <tr>
                          <td height="20" align="left">จำนวนเงิน
                              <?=$objResult[5];?>
                            บาท </td>
                        </tr>
                        <? if($objResult[8]!=""){ ?>
                        <tr>
                          <td align="left">ข้อความ : 
                              <?=func($objResult[8]);?></td>
                        </tr>
                        <? } ?>
                      </table>
                    </td>
                  <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><?
				  $spoint="SELECT * FROM `setting_point` WHERE id='$objResult[2]'";
				  $repoint=mysqli_query($con_db, $spoint) or die("ERROR $spoint");
				  $rpoint=mysqli_fetch_row($repoint);
				  ?>
				  เติมเงิน <?=$rpoint[1];?> บาท ได้ <?=$rpoint[2];?> <? if($rpoint[3]==1){ echo "วัน"; }else if($rpoint[3]==2){ echo "เดือน"; }else if($rpoint[3]==3){ echo "ปี"; } ?>
                  </td>
                  <td width="130" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><? if($objResult[9]==1){ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#339900;">สำเร็จ</td>
                        </tr>
                        <tr>
                          <td align="center" style="color:#FF0000;"><?=Datetime($objResult[10]);?></td>
                        </tr>
                      </table>
                    <? }else{ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#FF0000;">ตรวจสอบ</td>
                        </tr>
                      </table>
                    <? } ?>
                  </td>
                  <td width="120" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><select name="status" id="status" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                      <option value="" selected="selected">- เลือก -</option>
                      <? if($objResult[9]==0){ ?>
                    <option value="member-refill.php?id=<?=$objResult[0];?>&amp;member_id=<?=$objResult[3];?>&amp;point_type=<?=$objResult[2];?>">ยืนยันการเติมเงิน</option>
                    <? } ?>
                      <option value="del-payment.php?id=<?=$objResult[0];?>">ลบข้อมูล</option>
                  </select></td>
                </tr>
                <? } ?>
              </table>
                <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
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
